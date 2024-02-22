<template>
  <q-layout view="hHh LpR fFf">
    <q-header elevated class="bgHeader ">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title class="text-weight-bold" >
          مدیریت داشبورد
        </q-toolbar-title  >
        <div class="text-weight-bold text-h5 "> mariaweb </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list>
        <q-item-label
          header
        >
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [
  {
    title: " صفحه اصلی",
    icon: "home",
    link: "/#/",
  },

  {
    title: "پروفایل",
    icon: "person",
    link: "/#/profile",
  },

  {
    title: "مهارت ها",
    icon: "code",
    link: "/#/skils",
  },

  {
    title: " تجربه کاری",
    icon: "work",
    link: "/#/work",
  },
  {
    title: "نمونه کارها",
    icon: "collections",
    link: "/#/portfolios",
  },

  {
    title: "تحصیلات",
    icon: "school",
    link: "/#/educations",
  },
  {
    title: "اطلاعات تماس",
    icon: "call",
    link: "/#/contact",
  },
   {
    title: " درباره ما",
    icon: "info",
    link: "/#/about",
  },
  {
    title: "رزومه",
    icon: "download",
    link: "/#/resume",
  },
  {
    title: "بیوگرافی",
    icon: "info",
    link: "/#/biography",
  },
  {
    title: "پیام‌ها",
    icon: "message",
    link: "/#/messages",
  },

  {
    title: "تنظیمات",
    icon: "settings",
    link: "/#/settings",
  },
];

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
          toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }

    }
  }
})
</script>
