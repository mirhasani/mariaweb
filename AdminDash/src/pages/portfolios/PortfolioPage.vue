<template>
  <q-page padding="">
    <div class="row justify-center">
      <div class="col-auto text-center">
        <h1 class="text-h4 q-ma-none q-mt-lg">نمونه کارهای من</h1>
      </div>
    </div>
    <br /><br />
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
          <q-tab name="portfolios" label="نمونه کارها" />
          <q-tab name="liked" label="لایک شده ها" />
          <q-tab name="views" label="بازدید شده ها" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated >
          <q-tab-panel name="portfolios">
            <div class="text-h6">نمونه کارها</div>
            <div class="text-grey-8 text-h6 text-center">شما هیج نمونه کاری ندارید!</div>
            <br>
            <q-btn
            class="full-width text-h6"
             label="افزودن اولین نمونه کار "
              outline rounded
              @click="$router.push('/portfolios/create')"
              />
          </q-tab-panel>

          <q-tab-panel name="liked">
            <div class="text-h6">لایک شده ها</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </q-tab-panel>

          <q-tab-panel name="views">
            <div class="text-h6">بازدید شده ها</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </q-tab-panel>
        </q-tab-panels>
      </div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "IndexPage",
  setup() {
    const tab = ref("portfolios");
    function send() {}
    return {
      tab,
    };
  },
});
</script>
