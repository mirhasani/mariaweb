
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') }
    ]
  },
  {
    path: '/admin',
    component: () => import('src/layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/auth/LoginPage.vue') }
    ]
  },
   {
    path: '/confirm',
    component: () => import('src/layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/auth/ConfirmPage.vue') }
    ]
  },
   {
    path: '/',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') }
    ]
  },
  {
    path: '/profile',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ProfilePage.vue') }
    ]
  },
   {
    path: '/work',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/WorkPage.vue') }
    ]
  },
  {
    path: '/skils',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/SkilsPage.vue') }
    ]
  },
   {
    path: '/portfolio',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/PortfolioPage.vue') }
    ]
  },
     {
    path: '/educations',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/EducationsPage.vue') }
    ]
  },
     {
    path: '/contact',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ContactPage.vue') }
    ]
  },
     {
    path: '/resume',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ResumePage.vue') }
    ]
  },
     {
    path: '/settings',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/SettingsPage.vue') }
    ]
  },
     {
    path: '/biography',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/BiographyPage.vue') }
    ]
  },
     {
    path: '/messages',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/MessagePage.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
