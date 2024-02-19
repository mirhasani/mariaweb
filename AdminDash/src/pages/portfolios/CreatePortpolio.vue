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
        class="full-width" size="lg"
        @click="CreatePortfolio"
         />
    </div>
  </q-page>
</template>

<script>
import { reactive, toRefs } from 'vue'
import { api } from 'src/boot/axios'
export default {
  // name: 'PageName',
  setup (){
    const props=reactive({
      title: null,
      caption:null,
    })
    function CreatePortfolio(){
      api.post('api/admin/portfolios' ,{
        title: props.title,
        caption:props.caption
      })
      .then(r =>{
        console.log(r.data);
      })
    }
    return{
      ...toRefs(props),
      CreatePortfolio ,
    }
  }
}
</script>
