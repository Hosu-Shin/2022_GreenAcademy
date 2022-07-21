
import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate';


export default createStore ({
  state() {
    return {
      user: {},
      sellerSelectedProduct: {},
    }
  },
  mutations: {
    user: (state, data) => {
      state.user = data;
    },
    sallerSelectedProduct: (state, data) => {
      state.sallerSelectedProduct = data;
    }
  },
  plugins: [
    createPersistedState({
      paths: ['user'] //path에 user가 들어갈 때만 정보를 저장한다
    })
  ],
});