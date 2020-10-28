import axios from 'axios'

export default {
  state: {
    user: null
  },
  mutations: {
    SET_USER(state, user) {
      state.user = user
    }
  },
  getters: {
    userAuth: (state) => state.user,
    isAdmin: (state) => state.user?.rol_id === 1
  },
  actions: {
    async login({ commit }, { email, password }) {
      const resp = await axios.post('/api/auth/login', { email, password })
      console.log(resp.data)
      commit('SET_USER', resp.data)
      return resp.data
    },
    async logout({ commit }) {
      const resp = await axios.post('/api/logout')
      commit('SET_USER', null)
      return resp.data
    },
    async register({ commit }, { name, lastname, email, password, password_confirm }) {
      const resp = await axios.post('/api/register', {
        name,
        lastname,
        password,
        email,
        password_confirm
      })
      // commit('SET_USER', null)
      return resp.data
    },
    async getUserAuth({ commit }) {
      try {
        const resp = await axios.get('/api/user')
        commit('SET_USER', resp.data)
      } catch (error) {
        commit('SET_USER', null)
      }
    }
  }
}
