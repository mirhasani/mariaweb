<template>
  <q-page padding>
    <!-- content -->
    <div class="row confirm justify-center">
      <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 text-h5 text-grey-8 text-left q-gutter-y-md text-weight-bold">
        تایید شماره موبایل
        <q-btn
        flat
        round
        @click="$router.push('/admin')"
        class="float-right"
      >
        <q-icon name="arrow_back" color="primary" size="sm" />
      </q-btn>
      <h6 class="text-grey-6  text-left text-secondary "> کد تایید دریافتی را وارد کنید </h6>
        <q-input
        placeholder="وارد کردن کد 6 رقمی"
        class="full-width "
        rounded
        bg-color="grey-3"
        outlined
        ref="passwordRef"
        type="password"
        input-class="text-center"
        v-model="password"
        autocomplete="off"
        :rules="[
          (val) => !!val || 'وارد کردن این فیلد الزامی است',
          //(val) => val.length > 3 ||  `کد وارد شده اشتباه است!`',
        ]"
     />
     <q-btn
     outline
     class="full-width q-mt-md q-py-sm"
     color="light-blue-6"
     label="شروع کن "
     icon="security"
     rounded
     outlined
     @click="verify"
   />
   <div class="text-grey-8 text-center text-h6">شماره همراه خود را اشتباه وارد کردید؟</div>
   <q-btn
   outline
   class=" underline full-width q-mt-md q-py-sm"
   color="blue"
   flat
   @click="$router.push('/admin')"
   >اصلاح شماره همراه</q-btn
 >
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";
export default {
  // name: 'PageName',
  setup(){
    const passwordRef = ref(null);
    const password = ref();
    function  verify() {}

    return {
      verify,
      password,
      passwordRef,
    };
  },
};
</script>

<style>
.confirm{
  position: absolute;
  top: 30%;
  width: 100%;
  text-align: center;
  font-size: 18px;
}
.underline {
  text-decoration: underline;
  justify-content: center;
}
</style>
