<template>
  <router-view />
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'App'
})
</script>
<style>
.bgHeader  , .bgFooter , .text-h3 , h5{
  background-color: #232222;
  color: #fcfcfc;
}
*{
  font-family: Morabba;
}
#portfolio{
  background-color: #232222;
}
#portfolio a{
  color: rgba(224, 224, 5, 0.678);
}

</style>

