export default {
  state: {
    overlay: false,
  },
  mutations: {
    SET_OVERLAY (state, payload) {
        state.overlay = payload
    },
  },
  getters: {
    overlay: state => state.overlay,
  },
  actions: {
    setOverlay({ commit },state){
      commit('SET_OVERLAY', state)
    } 
  }
}