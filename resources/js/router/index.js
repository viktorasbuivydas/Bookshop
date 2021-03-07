import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter);

const guest = (to, from, next) => {
    if (localStorage.getItem("authToken")) {
        return next();
    } else {
        return next("/login");
    }
};
const auth = (to, from, next) => {
    if (localStorage.getItem("authToken")) {
        return next();
    } else {
        return next("/login");
    }
};
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
        beforeEnter: guest,
        component: () =>
            import ( /* webpackChunkName: "login" */ '../views/Auth/Login.vue')
    },
    {
        path: '/register',
        name: 'register',
        beforeEnter: guest,
        component: () =>
            import ( /* webpackChunkName: "register" */ '../views/Auth/Register.vue')
    },
    {
        path: '/home',
        name: 'home',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "home" */ '../views/Home/Index.vue')
    },


];
const router = new VueRouter({
    mode: 'history',
    base: process.env.APP_URL,
    routes
});

export default router;
