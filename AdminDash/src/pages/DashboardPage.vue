<template>
  <q-page padding >
    <div class="row justify-center">
      <div  class="col-auto text-center">
        <q-avatar size="80px">
          <q-img v-if="userData" src="/img/man.webp" />
          <q-skeleton v-else type="circle" />
        </q-avatar>
        <h1 v-if="userData"  class="text-h4 q-ma-none q-mt-lg"> {{ userData.profile.full_name }}</h1>
        <q-skeleton v-else type="text" />
        <h5>به داشبورد مدیریت خوش آمدید </h5>
      </div>
    </div>
   </q-page>
</template>

<script>
import { api } from 'src/boot/axios'
import { defineComponent, ref } from 'vue'
import { onMounted } from "vue";

export default defineComponent({
  name: 'IndexPage',
  setup(){
    const userData = ref(null);
    function fetchUser(){
      api.get('api/user')
      .then(r => {
        userData.value = r.data ;
      })
    }
    onMounted(() => {
      fetchUser();
     })
    return {
      fetchUser ,
      userData
    }
  }
})
</script>
