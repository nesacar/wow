import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes: [
        { path: "/", component: require('./components/home/Home.vue'), meta: { forAuth: true } },
        { path: "/home", component: require('./components/home/Home.vue'), meta: { forAuth: true } },

        { path: "/login", component: require('./components/auth/Login.vue'), meta: { forVisitors: true } },
        { path: "/register", component: require('./components/auth/Register.vue'), meta: { forVisitors: true } },
        { path: "/logout", component: require('./components/auth/Logout.vue'), meta: { forAuth: true } },

        { path: "/users", component: require('./components/users/UserList.vue'), meta: { forAuth: true } },
        { path: "/users/create", component: require('./components/users/UserCreate.vue'), meta: { forAuth: true } },
        { path: "/users/:id/edit", component: require('./components/users/UserEdit.vue'), meta: { forAuth: true } },
        { path: "/users/change-password", component: require('./components/users/UserChangePassword.vue'), meta: { forAuth: true } },

        { path: "/categories", component: require('./components/categories/CategoryList.vue'), meta: { forAuth: true } },
        { path: "/categories/create", component: require('./components/categories/CategoryCreate.vue'), meta: { forAuth: true } },
        { path: "/categories/:id/edit", component: require('./components/categories/CategoryEdit.vue'), meta: { forAuth: true } },

        { path: "/posts", component: require('./components/posts/PostList.vue'), meta: { forAuth: true } },
        { path: "/posts/create", component: require('./components/posts/PostCreate.vue'), meta: { forAuth: true } },
        { path: "/posts/:id/edit", component: require('./components/posts/PostEdit.vue'), meta: { forAuth: true } },

        { path: "/settings/:id/edit", component: require('./components/settings/SettingEdit.vue'), meta: { forAuth: true } },

        { path: "/themes", component: require('./components/themes/ThemeList.vue'), meta: { forAuth: true } },
        { path: "/themes/create", component: require('./components/themes/ThemeCreate.vue'), meta: { forAuth: true } },
        { path: "/themes/:id/edit", component: require('./components/themes/ThemeEdit.vue'), meta: { forAuth: true } },

        { path: "/galleries", component: require('./components/galleries/GalleryList.vue'), meta: { forAuth: true } },
        { path: "/galleries/create", component: require('./components/galleries/GalleryCreate.vue'), meta: { forAuth: true } },
        { path: "/galleries/:id/edit", component: require('./components/galleries/GalleryEdit.vue'), meta: { forAuth: true } },

        { path: "/subscribers", component: require('./components/subscribers/SubscriberList.vue'), meta: { forAuth: true } },
        { path: "/subscribers/create", component: require('./components/subscribers/SubscriberCreate.vue'), meta: { forAuth: true } },
        { path: "/subscribers/:id/edit", component: require('./components/subscribers/SubscriberEdit.vue'), meta: { forAuth: true } },

        { path: "/banners", component: require('./components/banners/BannerList.vue'), meta: { forAuth: true } },
        { path: "/banners/create", component: require('./components/banners/BannerCreate.vue'), meta: { forAuth: true } },
        { path: "/banners/:id/edit", component: require('./components/banners/BannerEdit.vue'), meta: { forAuth: true } },

        { path: "/newsletters", component: require('./components/newsletters/NewsletterList.vue'), meta: { forAuth: true } },
        { path: "/newsletters/create", component: require('./components/newsletters/NewsletterCreate.vue'), meta: { forAuth: true } },
        { path: "/newsletters/:id/edit", component: require('./components/newsletters/NewsletterEdit.vue'), meta: { forAuth: true } },

        { path: "/towns", component: require('./components/towns/TownList.vue'), meta: { forAuth: true } },
        { path: "/towns/create", component: require('./components/towns/TownCreate.vue'), meta: { forAuth: true } },
        { path: "/towns/:id/edit", component: require('./components/towns/TownEdit.vue'), meta: { forAuth: true } },

        { path: "/tags", component: require('./components/tags/TagList.vue'), meta: { forAuth: true } },
        { path: "/tags/create", component: require('./components/tags/TagCreate.vue'), meta: { forAuth: true } },
        { path: "/tags/:id/edit", component: require('./components/tags/TagEdit.vue'), meta: { forAuth: true } },

        { path: "/positions", component: require('./components/positions/PositionList.vue'), meta: { forAuth: true } },
        { path: "/positions/create", component: require('./components/positions/PositionCreate.vue'), meta: { forAuth: true } },
        { path: "/positions/:id/edit", component: require('./components/positions/PositionEdit.vue'), meta: { forAuth: true } },

        { path: "/statistics/:id/day", component: require('./components/newsletters/statistics/TodayNewsletter.vue'), meta: { forAuth: true } },
        { path: "/statistics/:id/month", component: require('./components/newsletters/statistics/MonthNewsletter.vue'), meta: { forAuth: true } },
        { path: "/statistics/:id/year", component: require('./components/newsletters/statistics/YearNewsletter.vue'), meta: { forAuth: true } },

        { path: "/clicks/:newsletter/posts/:post", component: require('./components/newsletters/clicks/ClickPost.vue'), meta: { forAuth: true } },
        { path: "/clicks/:newsletter/banners/:banner", component: require('./components/newsletters/clicks/ClickBanner.vue'), meta: { forAuth: true } },
    ],

    linkActiveClass: 'active'
});