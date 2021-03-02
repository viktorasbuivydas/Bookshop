import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const routes = [
    {
    path: '/',
    name: 'index',
    component: () =>
        import ( /* webpackChunkName: "index" */ '../views/Index.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () =>
            import ( /* webpackChunkName: "login" */ '../views/Auth/Login.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () =>
            import ( /* webpackChunkName: "register" */ '../views/Auth/Register.vue')
    },


];
const router = new VueRouter({
    mode: 'history',
    base: process.env.APP_URL,
    routes
});

export default router;
