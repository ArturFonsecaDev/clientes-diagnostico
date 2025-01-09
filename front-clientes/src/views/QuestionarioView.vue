<template>
  <div class="fundo">
    <q-card>
      <img src="@/assets/douranovo1.svg" alt="">
      <p class="q-card-subtitle"><span class="nome-cliente">Questão 1</span>
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor lacus vel velit pellentesque, ac hendrerit velit commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
    </q-card>
  </div>
</template>

<script>
export default {
  name: 'QuestionarioView',
  computed: {
    nome(){
      return this.$store.state.clienteAtual.nome;
    }
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