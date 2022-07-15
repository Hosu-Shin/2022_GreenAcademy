import { createRouter, createWebHashHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import StoreAccess from '../views/StoreAccess.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/StoreAccess',
    name: 'StoreAccess',
    component: StoreAccess,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
