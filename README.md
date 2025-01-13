# Dashboard de Respostas por Cliente

Este projeto tem como objetivo exibir gráficos interativos com o número de respostas dos clientes, agrupadas por categorias. O gráfico de barras é gerado com base nas respostas dos clientes, e as informações adicionais sobre o cliente, como nome, email e telefone, são exibidas ao selecionar um cliente.

## Tecnologias Utilizadas

- **Vue.js** (Versão 2.6)
- **Vuex** (Para gerenciamento de estado)
- **ApexCharts** (Para renderização de gráficos)
- **Quasar** (Estilização)
- **Laravel 10** (API Backend)
- **API RESTful** (Para comunicação entre frontend e backend)

## Funcionalidades

- **Seleção de Cliente**: O usuário pode escolher um cliente da lista.
- **Exibição do Gráfico**: Após selecionar um cliente, o gráfico de barras é atualizado com o total de respostas por categoria.
- **Exibição das Informações do Cliente**: Nome, email e telefone do cliente selecionado são exibidos abaixo do gráfico.
- **Zoom Interativo no Gráfico**: O gráfico possui funcionalidades de zoom para facilitar a visualização.

## Requisitos

- **Node.js** (Para desenvolvimento do frontend)
- **PHP** (Para rodar o servidor Laravel)
- **MySQL ou outro banco de dados** (Para armazenar os dados das respostas e clientes)
