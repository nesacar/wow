
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Slug = require('slug');
Slug.defaults.mode = 'rfc3986';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/** NAVIGATION **/
Vue.component('side-bar', require('./components/nav/sideBar.vue'));
Vue.component('top-bar', require('./components/nav/topBar.vue'));
Vue.component('left-bar', require('./components/nav/leftBar.vue'));

/** HELPER **/
Vue.component('paginate-helper', require('./components/helper/PaginateHelper.vue'));
Vue.component('search-helper', require('./components/helper/SearchHelper.vue'));
Vue.component('font-awesome-icon', require('@fortawesome/vue-fontawesome'));
Vue.component('upload-pdf-helper', require('./components/helper/UploadPdfHelper.vue'));
Vue.component('select2-helper', require('./components/helper/Select2Helper.vue'));

// Vue.component('position', require('./components/positions/Position.vue'));


import { store } from './store/store';
import { router } from './routes';
import Auth from './packages/auth/Auth';
//var VueTruncate = require('vue-truncate-filter');


import fontawesome from '@fortawesome/fontawesome';
import faPlus from '@fortawesome/fontawesome-free-solid/faPlus';
import faEnvelope from '@fortawesome/fontawesome-free-solid/faEnvelope';
import faBell from '@fortawesome/fontawesome-free-solid/faBell';
import faCommentAlt from '@fortawesome/fontawesome-free-solid/faCommentAlt';
import faChevronCircleDown from '@fortawesome/fontawesome-free-solid/faChevronCircleDown';
import faCogs from '@fortawesome/fontawesome-free-solid/faCogs';
import faAngleRight from '@fortawesome/fontawesome-free-solid/faAngleRight';
import faHome from '@fortawesome/fontawesome-free-solid/faHome';
import faUsers from '@fortawesome/fontawesome-free-solid/faUsers';
import faPaste from '@fortawesome/fontawesome-free-solid/faPaste';
import faShoppingCart from '@fortawesome/fontawesome-free-solid/faShoppingCart';
import faAlignJustify from '@fortawesome/fontawesome-free-solid/faAlignJustify';
import faPencilAlt from '@fortawesome/fontawesome-free-solid/faPencilAlt';
import faTimes from '@fortawesome/fontawesome-free-solid/faTimes';
import faLink from '@fortawesome/fontawesome-free-solid/faLink';
import faBars from '@fortawesome/fontawesome-free-solid/faBars';
import faAmountUp from '@fortawesome/fontawesome-free-solid/faSortAmountUp';
import faImages from '@fortawesome/fontawesome-free-solid/faImages';
import faRandom from '@fortawesome/fontawesome-free-solid/faRandom';
import faTags from '@fortawesome/fontawesome-free-solid/faTags';
import faCheck from '@fortawesome/fontawesome-free-solid/faCheck';
import faChartArea from '@fortawesome/fontawesome-free-solid/faChartArea';

fontawesome.library.add(
    faPlus, faEnvelope, faBell, faCommentAlt, faChevronCircleDown, faCogs, faAngleRight, faHome, faUsers, faPaste, faShoppingCart, faAlignJustify, faPencilAlt, faTimes,
    faLink, faBars, faAmountUp, faImages, faRandom, faTags, faCheck, faChartArea
);

//Vue.use(VueTruncate);
Vue.use(Auth);

axios.defaults.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();

router.beforeEach(
    (to, from, next) => {
        if(to.matched.some(record => record.meta.forVisitors)){
            if(Vue.auth.isAuth()){
                next({ path: "/home" });
            } else next();
        }
        else if(to.matched.some(record => record.meta.forAuth)){
            if(!Vue.auth.isAuth()){
                next({ path: "/login" });
            } else next();
        }
        else next();
    }
);

const app = new Vue({
    el: '#app',
    store: store,
    router: router
});
