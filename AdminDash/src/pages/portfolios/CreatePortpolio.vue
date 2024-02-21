<template>
  <q-page padding class="row">
    <!-- content -->
    <div class="col-12 text-center  q-gutter-y-md ">
      <h1 class="text-h4 q-ma-none q-mt-lg">افزودن نمونه کار جدید</h1>
      <!-- <q-uploader
      style="width:100% "
      url="http://localhost:4444/upload"
      label="آپلود فایل"
      accept=".jpg, image/*"
    /> -->
      <q-input
      label="عنوان  "
      autofocus
      rounded
      outlined
      v-model="title"
      />
       <q-input
      label=" توضیح "
      type="textarea"
      rounded
      outlined
      v-model="caption"
      />
      <q-btn
       icon="send" label=" ذخیره کن"
        outlined rounded
        :loading="loading"
        :disable="loading"
        class="full-width" size="lg"
        @click="CreatePortfolio"
         />
    </div>
  </q-page>
</template>

<script>
import { reactive, toRefs } from 'vue'
import { api } from 'src/boot/axios'
import { useQuasar } from 'quasar'
import { useRouter } from 'vue-router'
export default {
  // name: 'PageName',
  setup (){
    const q = useQuasar();
    const router = useRouter();
    const props=reactive({
      title: null,
      caption:null,
      loading:false
    })
    function CreatePortfolio(){
      props.loading = true
      api.post('api/admin/portfolios' ,{
        title: props.title,
        caption:props.caption
      })
      .then(r =>{
        props.loading = false
        console.log(r.data);
        if (r.data.status){
          q.notify({
              color: "light-blue-6",
              position: "top",
              message: "نممونه کار با موفیت اضافه شد.",
              icon: "done_all",
            });
            router.push('/portfolios');
        }else{
          q.notify({
              color: "orange-6",
              position: "top",
              message: "Error!",
            });
        }
      })
      .catch(e => {
        props.loading =false
        console.log(e);
      })
    }
    return{
      ...toRefs(props),
      CreatePortfolio ,
    }
  }
}
</script>
