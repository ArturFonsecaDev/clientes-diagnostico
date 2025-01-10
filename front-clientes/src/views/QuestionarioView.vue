<template>
  <div class="fundo">
    <q-card>
      <img src="@/assets/douranovo1.svg" alt="Logo">
      <p class="q-card-subtitle" v-if="!descricao && isThereAnyPergunta">
        <span class="nome-cliente">Questão {{perguntaAtual}}</span>
      </p>
      
      <!-- Pergunta -->
      <div v-if="isThereAnyPergunta && !descricao">
        <div v-for="pergunta in perguntas" :key="pergunta.id">
          <p>{{pergunta.texto_pergunta}}</p>
        </div>
      </div>

      <!-- Else !Pergunta -->
      <div v-else-if="!descricao">
        <p>Sem perguntas disponíveis</p>
      </div>

      <!-- Respostas -->
      <div v-if="isThereAnyPergunta && !descricao" class="respostas">
        <p 
          v-for="(resposta, index) in respostas" 
          :key="resposta.id" 
          class="resposta"
          @click="registrarResposta(index)"
        >
          {{ resposta.texto_resposta }}
        </p>
      </div>

      <!-- Descrição -->
      <div v-if="descricao" class="descricao">
        <p>Texto da Categoria {} : {{ descricao }}</p>
      </div>
    </q-card>
  </div>
</template>



<script>
import { getPerguntas, getRespostas } from '../api/index.js';

export default {
  name: 'QuestionarioView',
  data() {
    return {
      perguntas: [],
      respostas: [],
      respostasCliente: [],
      perguntaAtual: 1,
      descricao: '',
      categoriaIdPredominante: ''
    };
  },
  methods: {
    async registrarResposta(index) {
      console.log(this.respostas[index]);
      const clienteId = this.$store.getters.getClienteAtual.id;
      const respostaId = this.respostas[index].id;
      console.log(clienteId);
      console.log(respostaId);
      
      // Adiciona a resposta à lista de respostas
      this.respostasCliente.push({ 
        cliente_id: clienteId,
        resposta_id: respostaId,
      });

      // Se for a última resposta, envia as respostas
      if (this.perguntaAtual === this.totalPerguntas) {
        await this.enviarRespostas();
      } else {
        this.perguntaAtual++;
      }
    },

    async enviarRespostas() {
      const url = 'http://127.0.0.1:8000/api/respostas-clientes';
      try {
        const respostasParaMandar = this.respostasCliente.length === 1 ? [this.respostasCliente[0]] : this.respostasCliente;
        console.log('Respostas para enviar:', respostasParaMandar);
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({ respostas: respostasParaMandar })
        });
        const data = await response.json();
        console.log('Resposta da API:', data);
        this.descricao = data.descricao_categoria;
        this.categoriaIdPredominante = data.categoria_predominante
      } catch (e) {
        console.error('Erro ao enviar respostas:', e);
        return;
      }
    }
  },
  computed: {
    nome() {
      return this.$store.state.clienteAtual.nome;
    },
    isThereAnyPergunta() {
      return this.perguntas.length > 0;
    },
    totalPerguntas() {
      return this.perguntas.length;
    }
  },
  async mounted() {
    try {
      const [dataPerguntas, dataRespostas] = await Promise.all([getPerguntas(), getRespostas()]);
      this.perguntas = dataPerguntas;
      this.respostas = dataRespostas;

      console.log('Perguntas:', dataPerguntas);
      console.log('Respostas:', dataRespostas);
    } catch (error) {
      console.error('Erro ao carregar perguntas ou respostas:', error);
    }
  },
};
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

.q-card {
  width: 600px;
  height: auto;
  max-height: 80vh; /* Limita a altura máxima do card */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  background-color: rgba(255, 255, 255, 0.8);
  padding: 15px;
  color: black;
  text-align: center;
}

img {
  height: 70px;
}

.q-card-title {
  font-size: 20px;
  display: inline-block;
  padding-top: 5px;
}

.q-card-subtitle {
  font-size: 16px;
  display: inline-block;
  padding-top: 20px;
}

.respostas {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px; /* Diminui o espaçamento entre as respostas */
  margin-top: 20px;
}

.resposta {
  background-color: rgba(0, 0, 0, 0.1); /* Fundo leve para as respostas */
  padding: 8px 12px; /* Ajusta o padding */
  border-radius: 8px; /* Bordas arredondadas */
  font-size: 14px; /* Tamanho da fonte ajustado */
  color: #333; /* Cor do texto */
  text-align: center; /* Centraliza o texto dentro da resposta */
  max-width: 150px; /* Largura máxima para as respostas */
  min-width: 120px; /* Largura mínima */
  box-sizing: border-box; /* Garante que o padding não afete o tamanho */
  word-wrap: break-word; /* Quebra palavras longas para não ultrapassar a largura */
  transition: background-color 0.3s ease; /* Transição suave no hover */
}

.resposta:hover {
  background-color: rgba(0, 0, 0, 0.2); /* Mudança de cor no hover */
}

</style>