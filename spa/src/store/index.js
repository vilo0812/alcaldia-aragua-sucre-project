import Vue from 'vue'
import Vuex from 'vuex'
import config from './modules/config'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  modules: {
  	config,
  	auth
  }
})