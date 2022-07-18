
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate';


export default new Vuex.Store({
  state: {
    iuser: 0
  },
  mutations: {
    setIuser: (state, iuser) => {
      state.iuser = iuser;
    }
  },
  plugins: [
    createPersistedState()
  ],
});