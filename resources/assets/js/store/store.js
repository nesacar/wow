import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        /** auth **/
        user: null,

        /** show nav bars **/
        showRightBar: false,
        hideLeftBar: false,

        /** nav settings **/
        settingsItemActive: false,
        showSettingsItem: true,

        /** nav users **/
        showUsersItem: true,
        usersItemActive: false,

        /** nav posts **/
        showPostsItem: true,
        postsItemActive: false,

        /** nav newsletters **/
        showNewslettersItem: true,
        newslettersItemActive: false,
    },
    getters: {
        /** auth **/
        getUser: state => {
            return state.user;
        },

        /** show nav bars **/
        getShowRightBar: state => {
            return state.showRightBar;
        },
        getHideLeftBar: state => {
            return state.hideLeftBar;
        },

        /** nav settings **/
        getShowSettingsItem: state => {
            return state.showSettingsItem;
        },
        getSettingsItemActive: state => {
            return state.settingsItemActive;
        },

        /** nav users **/
        getShowUsersItem: state => {
            return state.showUsersItem;
        },
        getUsersItemActive: state => {
            return state.usersItemActive;
        },

        /** nav posts **/
        getShowPostsItem: state => {
            return state.showPostsItem;
        },
        getPostsItemActive: state => {
            return state.postsItemActive;
        },

        /** nav newsletters **/
        getShowNewslettersItem: state => {
            return state.showNewslettersItem;
        },
        getNewslettersItemActive: state => {
            return state.newslettersItemActive;
        },
    },
    mutations: {
        /** auth **/
        changeUser: (state, callback) => {
            state.user = callback;
        },

        /** show nav bars **/
        changeShowRightBar: state => {
            state.showRightBar = !state.showRightBar;
        },
        changeHideLeftBar: state => {
            state.hideLeftBar = !state.hideLeftBar;
        },

        /** nav settings **/
        changeSettingsItemActive: state => {
            state.settingsItemActive = !state.settingsItemActive;
        },

        /** nav users **/
        changeUsersItemActive: state => {
            state.usersItemActive = !state.usersItemActive;
        },

        /** nav posts **/
        changePostsItemActive: state => {
            state.postsItemActive = !state.postsItemActive;
        },

        /** nav newsletters **/
        changeNewslettersItemActive: state => {
            state.newslettersItemActive = !state.newslettersItemActive;
        },
    },
    actions: {
        /** auth **/
        changeUser: (context, callback) => {
            context.commit('changeUser', callback);
        },

        /** show nav bars **/
        changeShowRightBar: context => {
            context.commit('changeShowRightBar');
        },
        changeHideLeftBar: context => {
            context.commit('changeHideLeftBar');
        },

        /** nav settings **/
        changeSettingsItemActive: context => {
            context.commit('changeSettingsItemActive');
        },

        /** nav users **/
        changeUsersItemActive: context => {
            context.commit('changeUsersItemActive');
        },

        /** nav posts **/
        changePostsItemActive: context => {
            context.commit('changePostsItemActive');
        },

        /** nav newsletters **/
        changeNewslettersItemActive: context => {
            context.commit('changeNewslettersItemActive');
        },
    }
});