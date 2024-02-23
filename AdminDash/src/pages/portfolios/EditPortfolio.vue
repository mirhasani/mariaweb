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
       icon="send" label=" ویرایش"
        outlined rounded
        :loading="loading"
        :disable="loading"
        class="full-width" size="lg"
        @click="updatePortfolio"
         />
    </div>
  </q-page>
</template>

<script>
import { reactive, toRefs } from 'vue'
import { api } from 'src/boot/axios'
import { useQuasar } from 'quasar'
import { useRouter, useRoute } from 'vue-router'
export default {
  // name: 'PageName',
  setup (){
    const q = useQuasar();
    const router = useRouter();
    const route = useRoute();
    const props=reactive({
      title: null,
      caption:null,
      loading:false
    })
    function getPortfolio(){
      api.get(`api/admin/portfolios/${route.params.id}`)
      .then(r=>
      {
        console.log(r.data);
        props.title = r.data.title ,
        props.caption = r.data.caption
      })
    }
     getPortfolio()
    function updatePortfolio(){
      props.loading = true
      api.put('api/admin/portfolios/' + route.params.id ,{
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
              message: "نممونه کار با موفیت ویرایش شد.",
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
      updatePortfolio ,
      getPortfolio
    }
  }
}
</script>
