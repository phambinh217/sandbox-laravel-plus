import Vue from 'vue'
import Vuex from 'vuex'
import createMutationsSharer from 'vuex-shared-mutations'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

const store = new Vuex.Store({
    state () {
        return {
        }
    },

    getters: {

    },

    mutations: {

    },

    actions: {

    },

    plugins: [
        createMutationsSharer({ predicate: [] }),
        createPersistedState()
    ]
})

export default store
