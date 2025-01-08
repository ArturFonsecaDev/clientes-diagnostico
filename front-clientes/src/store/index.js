import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    clienteAtual: {
      id: null,
      nome: '',
      email: '',
      telefone: ''
    }
  },
  getters: {
    // Para acessar o cliente atual em qualquer componente
    getClienteAtual(state) {
      return state.clienteAtual;
    },
  },
  mutations: {
    // Para definir o cliente atual
    SET_CLIENTE_ATUAL(state, cliente) {
      state.clienteAtual = cliente;
    },
  },
  actions: {
    // Ação para atualizar o cliente atual (pode ser chamada de qualquer componente)
    atualizarClienteAtual({ commit }, cliente) {
      commit('SET_CLIENTE_ATUAL', cliente);
    },
  },
  modules: {
  }
});
