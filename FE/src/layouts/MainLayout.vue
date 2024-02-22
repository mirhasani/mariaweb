<template>
  <q-layout view="hHh Lpr fFf"> <!-- Be sure to play with the Layout demo on docs -->

    <!-- (Optional) The Header -->
    <q-header elevated class="bgHeader text-center ">
      <div class="row">
        <div class="col-3">
          <q-btn
            flat
            round
            dense
            icon="menu"
            float="right"
            @click="toggleLeftDrawer"
          />
        </div>
      <div class="col-6" >
        <q-tabs >
          <q-route-tab
            to="/"
            replace
            label="خانه"
          />
          <q-route-tab
            to="/#about"
            replace
            label="درباره ما"
          />

              <q-route-tab
            to="/#skils"
            replace
            label="مهارت ها"
          />
              <q-route-tab
            to="/#resume"
            replace
            label="رزومه"
          />
          <q-route-tab
          to="/#portfolio"
          replace
          label="نمونه کارها"
        />
        <q-route-tab
        to="/#contact"
        replace
        label="تماس با ما"
      />
        </q-tabs>
      </div>
          <div class="col-3 text-h5" >
          MariaWeb
          </div>
      </div>
    </q-header>

    <!-- (Optional) The Footer -->
    <q-footer class="bgFooter">
      <q-tabs switch-indicator>
        <q-route-tab
          icon="map"
          to="/your/route"
          replace
          label="One Tab"
        />
        <q-route-tab
          icon="assignment"
          to="/some/other/route"
          replace
          label="Other Tab"
        />
      </q-tabs>

      <q-toolbar>
        <q-btn
          flat
          round
          dense
          icon="menu"
          @click="toggleLeftDrawer"
        />
        <q-toolbar-title>
          Footer
        </q-toolbar-title>
      </q-toolbar>
    </q-footer>

    <!-- (Optional) A Drawer; you can add one more with side="right" or change this one's side -->
    <q-drawer
      v-model="leftDrawerOpen"
      side="left"
      bordered
      class="bg-grey-2"
    >
      <!-- QScrollArea is optional -->
      <q-scroll-area class="fit q-pa-sm">
        <!-- Content here -->
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <!-- This is where pages get injected -->
      <router-view />
    </q-page-container>

  </q-layout>
</template>

<script>
import { ref } from 'vue'

export default {
  // name: 'LayoutName',

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
}
</script>
