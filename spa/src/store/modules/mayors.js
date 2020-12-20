import axios from 'axios'
export default {
  state: {
    mayors: [],
  },
  mutations: {
    SET_MAYORS (state, mayors) {
        state.mayors = mayors
    },
    SET_NEW_MAYOR(state, mayor) {
      state.mayors.push(mayor)
    },
    UPDATE_MAYOR(state, { id, name }) {
      let index = state.mayors.findIndex((o) => o.id === id)
      state.mayors[index].name = name
    },
    SPLICE_MAYOR_DELETED(state, id) {
      let index = state.mayors.findIndex((o) => o.id === id)
      state.mayors.splice(index, 1)
    }
  },
  getters: {
    mayors: state => state.mayors,
  },
  actions: {
    async getMayors({ commit }) {
      const resp = (
        await axios.get(`/api/mayors`)
      ).data
      commit('SET_MAYORS', resp)
      return resp
    },
    async updateOrCreateMayors({ commit }, { mayor, id }) {
      if (!id) {
        const resp = (await axios.post('/api/mayors',{ name : mayor})).data
        commit('SET_NEW_MAYOR', resp.data)
        return resp
      } else {
        const resp = (await axios.put(`/api/mayors/${id}`, { name : mayor}))
          .data
        commit('UPDATE_MAYOR', resp.data)
        return resp
      }
    },
    async deleteMayor({ commit }, id) {
      const resp = (await axios.delete(`/api/mayors/${id}`)).data
      commit('SPLICE_MAYOR_DELETED', id)
      return resp
    }
  }
}