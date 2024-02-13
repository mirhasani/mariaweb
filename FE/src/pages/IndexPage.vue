<template>
  <q-page padding>
<div class="row justify-center bg-grey-4" id="#Home">
  <div class="col-auto text-center">
    <q-avatar size="200px">
      <q-img  src="/img/man.webp" />
    </q-avatar>

  </div>
</div>
<div class="row justify-center bg-grey-5" id="#about">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">ABOUT</h2>
  </div>
</div>
<div class="row justify-center bg-grey-4" id="#skils">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">SKILS</h2>
  </div>
</div>
<div class="row justify-center bg-grey-5" id="#resume">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">RESUME</h2>
  </div>
</div>
<div class="row justify-center bg-grey-4" id="#portfolio">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">PORTFOLIO</h2>
  </div>
</div>
<div class="row justify-center bg-grey-5" id="#contact">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">CONTACT</h2>
  </div>
</div>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'IndexPage'
})
</script>
