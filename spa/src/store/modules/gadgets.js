import axios from 'axios'
export default {
  state: {
    gadgets: [],
  },
  mutations: {
    SET_GADGETS (state, gadgets) {
        state.gadgets = gadgets
    },
    SET_NEW_GADGET(state, gadget) {
      state.gadgets.push(gadget)
    },
    UPDATE_GADGET(state, { id, name, code, status, departament_id }) {
      let index = state.gadgets.findIndex((o) => o.id === id)
      state.gadgets[index].name = name
      state.gadgets[index].code = code
      state.gadgets[index].status = status
      state.gadgets[index].departament_id = departament_id
    },
    SPLICE_GADGET_DELETED(state, id) {
      let index = state.gadgets.findIndex((o) => o.id === id)
      state.gadgets.splice(index, 1)
    }
  },
  getters: {
    gadgets: state => state.gadgets,
  },
  actions: {
    async getGadgets({ commit }) {
      const resp = (
        await axios.get(`/api/gadgets`)
      ).data
      commit('SET_GADGETS', resp.data)
      return resp
    },
    async updateOrCreateGadgets({ commit }, { gadget, code, departament_id, status = 1, user, id }) {
      console.log({ 
          name : gadget,
          status : status,
          code : code,
          departament_id : departament_id,
       })
      if (!id) {
        const resp = (await axios.post('/api/gadgets',{ 
          user_id : user.id,
          name : gadget,
          status : status,
          code : code,
          departament_id : departament_id,
        })).data
        commit('SET_NEW_GADGET', resp.data)
        return resp
      } else {
        const resp = (await axios.put(`/api/gadgets/${id}`,{ 
          name : gadget,
          status : status,
          code : code,
          departament_id : departament_id,
        })).data
        commit('UPDATE_GADGET', resp.data)
        return resp
      }
    },
    async deleteGadget({ commit }, id) {
      const resp = (await axios.delete(`/api/gadgets/${id}`)).data
      commit('SPLICE_GADGET_DELETED', id)
      return resp
    }
  }
}