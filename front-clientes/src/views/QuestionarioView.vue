<template>
  <div class="fundo">
    <q-card>
      <img src="@/assets/douranovo1.svg" alt="">
      <p class="q-card-subtitle"><span class="nome-cliente">Questão 1</span>
      </p>
      <div v-for="pergunta in perguntas" :key="pergunta.id">
        <p>{{pergunta.texto_pergunta}}</p>
      </div>
    </q-card>
  </div>
</template>

<script>

import getPerguntas from '../api/index.js';

export default {
  name: 'QuestionarioView',
  data(){
    return {
      perguntas: []
    }
  },
  computed: {
    nome(){
      return this.$store.state.clienteAtual.nome;
    }
  },
  async mounted(){
    const data = await getPerguntas();
    if(!data){
      console.error('Não foi possível carregar as perguntas');
      return;
    }
    this.perguntas = data;
  }

}
</script>

<style scoped>
  .fundo {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('@/assets/fundo-cadastro.jpg');
  background-size: cover;
  background-position: center;
  overflow: hidden;
}

.q-card{
  width: 300px;
  height: 300px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  color: black;
  text-align: center;
}

img{
  height: 70px;
}

.q-card-title{
  font-size: 20px;
  display: inline-block;
  padding-top: 5px;
}

.q-card-subtitle{
  font-size: 16px;
  display: inline-block;
  padding-top: 20px;
}
</style>