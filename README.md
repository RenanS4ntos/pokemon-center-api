# Pokémon Center API

A API do Pokémon Center é projetada para gerenciar agendamentos de consultas médicas para Pokémons. Ela oferece funcionalidades para criar, listar, atualizar e deletar registros de médicos, treinadores, Pokémons e agendamentos.

## Tecnologias Utilizadas

- Laravel: Framework PHP utilizado para construir a API.
- SQLite: Banco de dados utilizado para armazenar os dados.
- Mailtrap: Ferramenta utilizada para testar o envio de e-mails.

## Principais Funcionalidades

### Gerenciamento de Médicos (Doctors)

- Criação de Médicos: Permite criar novos registros de médicos com informações como nome e especialização.
- Listagem de Médicos: Permite listar todos os médicos cadastrados.

### Gerenciamento de Treinadores (Trainers):

- Criação de Treinadores: Permite criar novos registros de treinadores com informações como nome e e-mail.
- Listagem de Treinadores: Permite listar todos os treinadores cadastrados.
- Atualização de Treinadores: Permite atualizar informações de treinadores existentes.
- Exclusão de Treinadores: Permite excluir registros de treinadores.

### Gerenciamento de Pokémons:

- Criação de Pokémons: Permite criar novos registros de Pokémons com informações como nome e treinador associado.
- Listagem de Pokémons: Permite listar todos os Pokémons cadastrados.
- Atualização de Pokémons: Permite atualizar informações de Pokémons existentes.
- Exclusão de Pokémons: Permite excluir registros de Pokémons.

### Agendamentos (Appointments)

- Criação de Agendamentos: Permite criar novos agendamentos de consultas médicas para Pokémons, associando um Pokémon e um médico, além de definir a data e hora do agendamento.
- Listagem de Agendamentos: Permite listar todos os agendamentos cadastrados.

### Processamento de Agendamentos

- Job de Processamento: Um job é disparado automaticamente 30 segundos após a criação de um agendamento, atualizando o status do agendamento para "processed" e enviando um e-mail de confirmação para o treinador do Pokémon.
