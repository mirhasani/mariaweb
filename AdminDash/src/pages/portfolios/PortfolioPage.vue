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
            <div v-if="portfolios.length < 1" class="text-grey-8 text-h6 text-center"
            >شما هیج نمونه کاری ندارید!
          </div>
          <div v-else class="row q-col-gutter-md">
            <div class="col-6" v-for="(portfolio , index) in portfolios" :key="'portfolio'+index+1">
           <q-card>
            <q-card-section>
              <h6 class="q-ma-none">{{portfolio.title}}</h6>
              <p>{{portfolio.caption}}</p>
            </q-card-section>
            <q-card-section align="around">
              <q-btn class="" flat color="grey-8" icon="more_horiz" >
                <q-menu fit>
                  <q-list>
                    <q-item clickable>
                      <q-item-section>
                        <q-icon size="25px" name="edit" />
                      </q-item-section>
                    </q-item>
                    <q-separator />
                    <q-item clickable>
                      <q-item-section>
                        <q-icon size="25px" color="pink-6" name="delete" />
                      </q-item-section>
                    </q-item>
                  </q-list>
                </q-menu>
              </q-btn>
              <q-btn class="" flat color="pink-7" icon="visibility" />
            </q-card-section>
           </q-card>
            </div>
          </div>
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
import { api } from "src/boot/axios";
import { onMounted, ref } from "vue";

export default {
  name: "IndexPage",
  setup() {
    const tab = ref("portfolios");
    const portfolios = ref([]);
    function fetchPortfolio() {
  api.get('api/admin/portfolios')
  .then((r) => {
    portfolios.value = r.data
    console.log(r.data);
  });
    }
     //fetchPortfolio()
     onMounted(() => {
      fetchPortfolio()
     })
    return {
      tab,
      portfolios,
      fetchPortfolio
    };
  },
};
</script>
