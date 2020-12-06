import axios from 'axios'

export default {
  state: {
    user: null,
    token: null
  },
  mutations: {
    SET_TOKEN (state,token) {
      state.token = token
    },
    SET_USER(state, user) {
      state.user = user
    }
  },
  getters: {
    user: (state) => state.user,
    token: state => state.token,
    role: state => state.user ? state.user.rol_id : null,
    check: state => state.user !== null && state.user !== undefined,
  },
  actions: {
    async login({ commit }, { email, password }) {
      const resp = await axios.post('/api/auth/login', { email, password })
      commit('SET_USER', resp.data.user)
      commit('SET_TOKEN', resp.data.access_token)
      return resp
    },
    async logout({state}) {
      const resp = await axios.post('/api/logout')
      state.user = null
      state.token = null
      return resp
    },
    async fetchUser({ commit }) {
        const resp = await axios.get('/api/me')
        commit('SET_USER', resp.data)
        return resp
    }
  }
}
