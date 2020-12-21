import axios from 'axios'
export default {
  state: {
    departaments: [],
  },
  mutations: {
    SET_DEPARTAMENTS (state, departaments) {
        state.departaments = departaments
    },
    async SET_NEW_DEPARTAMENT(state, departament) {
      // departament.mayor_id = (await axios.get(`/api/mayors/${departament.mayor_id}`)).data
      state.departaments.push(departament)
    },
    UPDATE_DEPARTAMENT(state, { id, name }) {
      let index = state.departaments.findIndex((o) => o.id === id)
      state.departaments[index].name = name
    },
    SPLICE_DEPARTAMENT_DELETED(state, id) {
      let index = state.departaments.findIndex((o) => o.id === id)
      state.departaments.splice(index, 1)
    }
  },
  getters: {
    departaments: state => state.departaments,
  },
  actions: {
    async getDepartaments({ commit }) {
      const resp = (
        await axios.get(`/api/departaments`)
      ).data
      commit('SET_DEPARTAMENTS', resp.data)
      return resp
    },
    async updateOrCreateDepartaments({ commit }, { departament, mayor_id = 1, id }) {
      if (!id) {
        const resp = (await axios.post('/api/departaments',{ name : departament, mayor_id : mayor_id})).data
        commit('SET_NEW_DEPARTAMENT', resp.data)
        return resp
        return
      } else {
        const resp = (await axios.put(`/api/departaments/${id}`, { name : departament, mayor_id}))
          .data
        commit('UPDATE_DEPARTAMENT', resp.data)
        return resp
      }

    },
    async deleteDepartament({ commit }, id) {
      const resp = (await axios.delete(`/api/departaments/${id}`)).data
      commit('SPLICE_DEPARTAMENT_DELETED', id)
      return resp
    }
  }
}