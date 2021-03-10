import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter);

const guest = (to, from, next) => {
    if (!localStorage.getItem("token")) {
        return next();
    } else {
        return next("/login");
    }
};
const auth = (to, from, next) => {
    if (localStorage.getItem("token")) {
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
    // books
    {
        path: '/books/{id}',
        name: 'books.show',
        component: () =>
            import ( /* webpackChunkName: "books show" */ '../views/Books/Show.vue')
    },

    //admin

    //authors
    {
        path: '/admin/authors/create',
        name: 'admin.authors.create',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin authors create" */ '../views/Admin/Authors/Create.vue')
    },
    {
        path: '/admin/authors/edit/{id}',
        name: 'admin.authors.edit',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin authors edit" */ '../views/Admin/Authors/Edit.vue')
    },
    {
        path: '/admin/authors/',
        name: 'admin.authors.index',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin authors index" */ '../views/Admin/Authors/Index.vue')
    },
    //admin books
    {
        path: '/admin/books/',
        name: 'admin.books.index',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin books index" */ '../views/Admin/Books/Index.vue')
    },
    //admin books pending
    {
        path: '/admin/books/pending',
        name: 'admin.books.pending',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin books pending" */ '../views/Admin/Books/Pending.vue')
    },
    //admin books show
    {
        path: '/admin/books/{id}',
        name: 'admin.books.show',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin books show" */ '../views/Admin/Books/Show.vue')
    },
    //genres
    {
        path: '/admin/genres/create',
        name: 'admin.genres.create',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin genres create" */ '../views/Admin/Genres/Create.vue')
    },
    {
        path: '/admin/genres/edit/{id}',
        name: 'admin.genres.edit',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin genres edit" */ '../views/Admin/Genres/Edit.vue')
    },
    {
        path: '/admin/genres/',
        name: 'admin.genres.index',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin genres index" */ '../views/Admin/Genres/Index.vue')
    },
    //reports
    {
        path: '/admin/reports/',
        name: 'admin.reports.index',
        beforeEnter: auth,
        component: () =>
            import ( /* webpackChunkName: "admin reports index" */ '../views/Admin/Reports/Index.vue')
    },

];
const router = new VueRouter({
    mode: 'history',
    base: process.env.APP_URL,
    routes
});

export default router;
