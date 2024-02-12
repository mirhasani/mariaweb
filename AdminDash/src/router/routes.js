
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
  {
    path: '/admin',
    component: () => import('src/layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/auth/LoginPage.vue') ,
      meta: {
        requireAuth: false,
        admin: true,
      },
    }
    ]
  },
   {
    path: '/confirm',
    component: () => import('src/layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/auth/ConfirmPage.vue'),
      meta: {
        requireAuth: false,
        confirm: true,
      },
    }
    ]
  },

  {
    path: '/profile',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ProfilePage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
   {
    path: '/work',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/WorkPage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
  {
    path: '/skils',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/SkilsPage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
   {
    path: '/portfolio',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/PortfolioPage.vue') ,
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/educations',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/EducationsPage.vue') ,
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/contact',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ContactPage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/resume',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/ResumePage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/settings',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/SettingsPage.vue') ,
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/biography',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/BiographyPage.vue'),
      meta: {
        requireAuth: true,
      },
    }
    ]
  },
     {
    path: '/messages',
    component: () => import('src/layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/MessagePage.vue') ,
      meta: {
        requireAuth: true,
      },
    }
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
