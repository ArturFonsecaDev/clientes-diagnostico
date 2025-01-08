<template>
  <div class="fundo-cadastro">
    <q-layout view="lHh Lpr lFf">
      <q-page-container class="q-page-container">
        <q-card style="width: 400px" class="q-pa-md">
          <img src="@/assets/douranovo1.svg">
          <q-card-section>
            <ClienteCadastroForm />
          </q-card-section>
        </q-card>
      </q-page-container>
    </q-layout>
  </div>
</template>

<script>
import ClienteCadastroForm from '../components/ClienteCadastroForm.vue';

export default {
  name: 'HomeView',
  components: {
    ClienteCadastroForm,
  },
};
</script>

<style scoped>
.fundo-cadastro {
  height: 100vh; /* Garantir que a altura ocupe toda a tela */
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('@/assets/fundo-cadastro.jpg');
  background-size: cover;
  background-position: center;
  overflow: hidden; /* Evita rolagem no fundo */
}

.q-page-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Faz o container ocupar toda a altura da tela */
  width: 100%;
  overflow: hidden; /* Evita rolagem no container */
}

.q-card {
  max-width: 400px;
  width: 100%;
  margin: 20px;
  display: flex;
  flex-direction: column;
  height: 450px;
  overflow: hidden; /* Impede o scroll dentro do card */
}

img {
  width: 100px;
  height: 75px;
  margin: 0 auto; /* Centraliza a imagem */
}

.q-card-section {
  overflow-y: auto; /* Permite rolagem interna, caso o conteúdo seja maior */
}

</style>
