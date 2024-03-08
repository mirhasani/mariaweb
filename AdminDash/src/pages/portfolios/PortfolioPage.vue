<template>
  <q-page padding="">
    <div class="row justify-center">
      <div class="col-auto text-center">
        <h1 class="text-h4 q-ma-none q-mt-lg">نمونه کارها</h1>
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
         <q-tab name="discover" label="  نمونه کارهای دوستان" />
          <q-tab name="portfolios" label=" نمونه کارهای من" />
          <q-tab name="liked" label="لایک شده ها" />
          <q-tab name="views" label="بازدید شده ها" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated >
          <q-tab-panel name="portfolios">
            <div class="text-h6">نمونه کارهای من</div>
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
                        <q-icon size="25px" @click="$router.push(`/portfolios/edit/${portfolio.id}`)"  name="edit" />
                      </q-item-section>
                    </q-item>
                    <q-separator />
                    <q-item clickable>
                      <q-item-section>
                        <q-icon size="25px" @click="showConfirmation(portfolio.id , index)" color="pink-6" name="delete" />
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
             label="افزودن نمونه کار "
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

        <q-tab-panels v-model="tab" animated >
          <q-tab-panel name="discover">
            <div class="text-h6">نمونه کارهای دوستان </div>
            <div v-if="AllPortfolios.length < 1" class="text-grey-8 text-h6 text-center"
            >شما هیج نمونه کاری ندارید!
          </div>
          <div v-else class="row q-col-gutter-md">
            <div class="col-6" v-for="(portfolio , index) in AllPortfolios" :key="'portfolio'+index+1">
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
                        <q-icon size="25px" @click="$router.push(`/portfolios/edit/${portfolio.id}`)"  name="edit" />
                      </q-item-section>
                    </q-item>
                    <q-separator />
                    <q-item clickable>
                      <q-item-section>
                        <q-icon size="25px" @click="showConfirmation(portfolio.id , index)" color="pink-6" name="delete" />
                      </q-item-section>
                    </q-item>
                  </q-list>
                </q-menu>
              </q-btn>
              <q-btn  @click="likeToggle(portfolio.id , index)" class="" flat :color="portfolio.liked? 'red':'grey-7'"  :icon="portfolio.liked?'favorite':'favorite_outline'"  />
            </q-card-section>
           </q-card>
            </div>
          </div>
            <br>
            <q-btn
            class="full-width text-h6"
             label="افزودن نمونه کار "
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
    <q-dialog v-model="taeed" persistent>
      <q-card>
        <q-card-section class="row items-center">
          <span class="q-ml-sm">  {{ selectedPortfolio.title}}  رو مطمئنی که می خواهی حذفش کنی؟  </span>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat label="لغو" color="grey-7" v-close-popup />
          <q-btn flat label="بله" @click="deletePortfolio" color="pink-6" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import { api } from "src/boot/axios";
import { onMounted, ref } from "vue";

export default {
  name: "IndexPage",
  setup() {
    const tab = ref("discover");
    const portfolios = ref([]);
    const AllPortfolios = ref([]);
    const taeed = ref(false);
    const selectedPortfolio = ref(null);
    const selectedPortfolioIndex = ref(null);
    function deletePortfolio(){
api.delete('api/admin/portfolios/'+ selectedPortfolio.value.id)
.then(r=>{
  if(r.data.status){
    portfolios.value.splice(selectedPortfolioIndex.value , 1)
    taeed.value = false ;
  }
});
    }
    function fetchPortfolio() {
  api.get('api/admin/portfolios')
  .then((r) => {
    portfolios.value = r.data
    console.log(r.data);
  });
    }
    function fetchAllPortfolios() {
  api.get('api/admin/public/portfolios')
  .then((r) => {
   AllPortfolios.value = r.data;
    console.log(r.data);
  });
    }
    fetchAllPortfolios()
    function editPortfolio(){

    }

    function likeToggle (portfolioId , index){
      api.post('api/admin/likes/' + portfolioId)
      .then(r=>{
        AllPortfolios.value[index].liked = r.data.liked
      })
    }
    function showConfirmation(id , index){
      selectedPortfolio.value = portfolios.value[index];
      selectedPortfolioIndex.value = index ;
      taeed.value = true ;
    }
     //fetchPortfolio()
     onMounted(() => {
      fetchPortfolio();
     })
    return {
      tab,
      portfolios,
      fetchPortfolio ,
      showConfirmation ,
      taeed ,
      selectedPortfolio ,
      deletePortfolio ,
      selectedPortfolioIndex ,
      editPortfolio ,
      AllPortfolios ,
      fetchAllPortfolios ,
      likeToggle
    };
  },
};
</script>
