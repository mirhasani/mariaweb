<template>
  <q-page padding>
    <!-- content -->
    <div class="row login justify-center">
      <div
        class="col-xs-12 col-sm-10 col-md-8 col-lg-6 text-h5 text-grey-8 text-left q-gutter-y-md text-weight-bold"
      >
        ورود
        <q-btn flat round @click="$router.push('/')" class="float-right">
          <q-icon name="arrow_back" color="primary" size="sm" />
        </q-btn>
        <h6 class="text-grey-6 text-left text-secondary">تلفن همراه</h6>
        <q-input
          placeholder="شماره همراه خود را وارد کنید"
          class="full-width"
          rounded
          bg-color="grey-3"
          outlined
          ref="usernameRef"
          type="tel"
          input-class="text-center"
          v-model="mobile"
          autocomplete="off"
          :rules="[
            (val) => !!val || 'وارد کردن این فیلد الزامی است',
            (val) => val.length > 9 || 'شماره تلفن رو 10 عدد وارد کن!',
            (val) => /^[9]{1}[0-9]{9}$/.test(val) || 'شماره تلفن بدرستی وارد نشده است!',
          ]"
        />
        <q-btn
          outline
          class="full-width q-mt-md q-py-sm text-weight-bold"
          color="light-blue-6"
          label="بزن بریم"
          icon="send"
          rounded
          outlined
          @click="login"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import { useQuasar } from "quasar";
import { useAppDataStore } from "src/stores/appData";
import { ref } from "vue";
import { api } from "src/boot/axios";
import { useRouter } from "vue-router";
import { storeToRefs } from "pinia";
export default {
  // name: 'PageName',
  setup() {
    const appData = useAppDataStore();
    const { mobile } = storeToRefs(appData);
    const usernameRef = ref(null);
    const router = useRouter();
    const q = useQuasar();
    function login() {
      if (mobile.value){
        usernameRef.value.validate();
      if (usernameRef.value.hasError) {
        q.notify({
          color: "negative",
          position: "top",
          message: "لطفا چک کنید شماره مبایل به درستی وارد نشده است!",
        });
      } else {
        api
          .post("api/admin/send-vc", {
            mobile: mobile.value,
          })
          .then((r) => {
            console.log(r.data);
            if (r.data.status) {
              router.push("/confirm");
            } else {
              alert("مشکلی پیش آمده");
            }
          });
      }
      }else{
        alert('Enter Data');
      }
    }
    return {
      login,
      usernameRef,
      mobile,
    };
  },
};
</script>

<style>
.login {
  position: absolute;
  top: 30%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
</style>
