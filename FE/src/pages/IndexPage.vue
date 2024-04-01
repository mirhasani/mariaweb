<template>
  <q-page  >
<div class="row  justify-center  " id="Home">
      <div class="col-6"></div>
      <div class="col-6 maria">
          <h3> سلام   </h3>
          <h3 class="d-flex"> من ماریا  <span>
                  <h2> یک برنامه نویس فرانت اند هستم</h2>
              </span> </h3>
          <a class="btn btn-primary" href="#portfolio">  نمونه کارهای من   </a>
      </div>
      <div class="col-6"></div>
  </div>

<div class="row justify-center " id="about">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">ABOUT</h2>
  </div>
</div>
<div class="row justify-center " id="skils">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">SKILS</h2>
  </div>
</div>
<div class="row justify-center " id="resume">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">RESUME</h2>
  </div>
</div>
<div class="row justify-center " id="portfolio">
  <div class="col-4 text-center">
    <h2 class="text-h3"> نمونه کارهای من </h2>
    <h5> <a href="/" > maria  </a>  >> portfolio </h5>

    <div class="row ">
      <div class="col-12 q-gutter-y-md">
        <q-tabs
          v-model="tab"
          dense
          class="text-grey"
          active-color="primary"
          indicator-color="primary"
          align="justify"
          narrow-indicator
        >
         <q-tab name="portfolios" label="همه نمونه کارها" />
          <q-tab name="bootstrap-p" label="بوت استرپ" />
          <q-tab name="quasar-p" label="کویزار" />
          <q-tab name="html-p" label="اچ تی ام ال" />
        </q-tabs>

        <q-separator  />
<br>
      </div>
    </div>
          <div class="row q-col-gutter-md">
            <div class="col-md-4 col-sm-6 " v-for="(portfolio , index) in portfolios" :key="'portfolio'+index+1">
                  <q-card>
                    <q-card-section>
                      <h6 class="q-ma-none">{{portfolio.title}}</h6>
                      <p>{{portfolio.caption}}</p>
                    </q-card-section>
                  </q-card>

            </div>

          </div>
          <br><br>
  </div>
</div>
<div class="row justify-center " id="contact">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">CONTACT</h2>
  </div>
</div>
<div class="row justify-center " id="blog">
  <div class="col-4 text-center">
    <h2 class="text-h3 ">BLOG</h2>
  </div>
</div>
  </q-page>
</template>

<script>
import { api } from "src/boot/axios";
import {  ref } from "vue";
export default {
  name: 'IndexPage',
  setup(){
    const portfolios = ref([]);
    function fetchPortfolio() {
    api.get('api/portfolios')
    .then((r) => {
      portfolios.value = r.data
      console.log(r.data);
    });
    };
    fetchPortfolio()
    return {
      fetchPortfolio,
      portfolios,
  };
  },
};
</script>

