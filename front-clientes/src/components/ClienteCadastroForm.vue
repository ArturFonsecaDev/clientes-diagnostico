<template>
  <q-page>
    <q-form @submit.prevent="submitForm" ref="form">
      <q-input
        v-model="cliente.nome"
        label="Nome"
        :rules="[val => !!val || 'Nome é obrigatório']"
        outlined
        lazy-rules
        autofocus
      />

      <q-input
        v-model="cliente.email"
        label="Email"
        :rules="[val => !!val || 'Email é obrigatório', val => /.+@.+\..+/.test(val) || 'Email inválido']"
        outlined
        lazy-rules
      />

      <q-input
        v-model="cliente.telefone"
        label="Telefone"
        :rules="[val => !!val || 'Telefone é obrigatório', val => /^\(?\d{2}\)?\s?\d{4,5}-\d{4}$/.test(val) || 'Telefone inválido']"
        outlined
        lazy-rules
      />

      <q-btn
        label="Cadastrar"
        type="submit"
        color="primary"
        class="q-mt-md"
      />
    </q-form>
  </q-page>
</template>

<script>
export default {
  name: "ClienteCadastroForm",
  data() {
    return {
      cliente: {
        nome: "",
        email: "",
        telefone: "",
      },
    };
  },
  methods: {
    async submitForm() {
      if (!this.$refs.form.validate()) {
        return; // Se o formulário não for válido, não envia
      }

      const url = 'http://127.0.0.1:8000/api/clientes';

      const response = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          nome: this.cliente.nome,
          email: this.cliente.email,
          telefone: this.cliente.telefone,
        })
      });
      if(response.status == 201) {
        const cliente = {
          id: (await response.json()).id,
          nome: this.cliente.nome,
          email: this.cliente.email,
          telefone: this.cliente.telefone,
        }
        this.$store.dispatch('atualizarClienteAtual', cliente);
        this.$router.push('/perguntas');
      }
    }
  }
}

</script>

<style scoped>
.q-form {
  max-width: 400px;
  margin: auto;
}
</style>
