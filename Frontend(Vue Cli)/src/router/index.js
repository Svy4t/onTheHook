import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('../views/HomeView.vue')
  },
  {
    path: '/advertisements',
    name: 'advertisements',
    component: () => import('../views/AdvtsView.vue')
  },
  {
    path: '/advertisements/:date',
    name: 'advertisementsWithDate',
    component: () => import('../views/AdvtsView.vue')
  },
  {
    path: '/profile/:id',
    name: 'profile',
    component: () => import('../views/ProfileView.vue')
  },
  {
    path: '/profileUser/:token',
    name: 'profileUser',
    component: () => import('../views/ProfileUserView.vue')
  },
  {
    path: '/addAdvt',
    name: 'addAdvt',
    component: () => import('../views/AddAdvtView.vue')
  },
  {
    path: '/UserAdvt',
    name: 'UserAdvt',
    component: () => import('../views/UserAdvtView.vue')
  },
  {
    path: '/UserProfileAdvt',
    name: 'UserProfileAdvt',
    component: () => import('../views/ProfileUserAdvtView.vue')
  },
  {
    path: '/register',
    name: 'RegisterView',
    component: () => import('../views/RegisterView.vue')
  },
  {
    path: '/addComment',
    name: 'AddComment',
    component: () => import('../components/AddComment.vue')
  },
  {
    path: '/events',
    name: 'events',
    component: () => import('../views/EventsView.vue')
  },
  {
    path: '/event/:id',
    name: 'event',
    component: () => import('../views/CurrentEventView.vue')
  },
  {
    path: '/dialog/:id',
    name: 'dialog',
    component: () => import('../views/DialogView.vue')
  },
  {
    path: '/policy',
    name: 'policy',
    component: () => import('../views/PrivacyPolicyView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
