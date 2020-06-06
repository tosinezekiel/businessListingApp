import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import createPersistedState from "vuex-persistedstate";

export default new Vuex.Store({
    plugins: [createPersistedState()],
    state: {
        id: '',
        token: '',
        name: '',
        isSignedin: false,
    },
    getters: {
        isLogged: state => state.isSignedin,
        name: state => state.name,
        userToken: state => state.token,
    },
    mutations: {
        init(state, data) {
            state.id = data.user_id
            state.token = data.token
            state.name = data.name
            state.isSignedin = true
        },
        LOGOUT(state) {
            state.id = ''
            state.token = ''
            state.name = ''
            state.isSignedin = !state.isSignedin
        }
    },
    actions: {
        logout({ commit }) {
            commit('LOGOUT');
          }
    }
})