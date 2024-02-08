<template>
  <q-page padding>
    <!-- content -->
    <div class="row login justify-center">
      <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 text-h5 text-grey-8 text-left q-gutter-y-md text-weight-bold">
        ورود
        <q-btn
        flat
        round
        @click="$router.push('/')"
        class="float-right"
      >
        <q-icon name="arrow_back" color="primary" size="sm" />
      </q-btn>
      <h6 class="text-grey-6  text-left text-secondary  "> تلفن همراه</h6>
        <q-input
        placeholder="شماره همراه خود را وارد کنید"
        class="full-width "
        rounded
        bg-color="grey-3"
        outlined
        ref="usernameRef"
        type="tel"
        input-class="text-center"
        v-model="username"
        autocomplete="off"
        :rules="[
          (val) => !!val || 'وارد کردن این فیلد الزامی است',
          (val) => val.length > 9 || 'شماره تلفن بدرستی وارد نشده است!',
        ]"
     />
     <q-btn
     outline
     class="full-width q-mt-md q-py-sm"
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
import { ref } from "vue";
export default {
  // name: 'PageName',
  setup(){
    const usernameRef = ref(null);
    const username = ref();
    function login() {}

    return {
      login,
      usernameRef,
      username,
    };
  },
};
</script>

<style>
.login{
  position: absolute;
  top: 30%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
</style>
