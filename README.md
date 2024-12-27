# Anamnese App

![Anamnese App Logo](assets/logo.png) <!-- Opcional: Adicione um logo se disponível -->

## Índice

- [Descrição](#descrição)
- [Recursos](#recursos)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Uso](#uso)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Segurança](#segurança)
- [Logs](#logs)
- [Contribuição](#contribuição)
- [Licença](#licença)
- [Contato](#contato)

## Descrição

O **Anamnese App** é uma aplicação web desenvolvida em PHP que auxilia médicos no processo de coleta e análise de informações clínicas dos pacientes. Utilizando uma integração com a **LLM Groq** (modelo de linguagem avançado), a aplicação sugere diagnósticos e tratamentos baseados nos dados fornecidos pelo médico.

## Recursos

- **Formulário de Anamnese:** Interface intuitiva para entrada de informações clínicas.
- **Integração com LLM Groq:** Processamento avançado de linguagem natural para geração de diagnósticos e tratamentos.
- **Armazenamento de Dados:** Sessões PHP para gerenciar informações entre páginas.
- **Logs de Depuração:** Registro das respostas da API para facilitar a manutenção e resolução de problemas.
- **Segurança Básica:** Implementação de práticas para proteger informações sensíveis.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação back-end.
- **cURL**: Biblioteca para fazer requisições HTTP.
- **Bootstrap**: Framework CSS para estilização responsiva.
- **Apache/Nginx**: Servidor web recomendado.
- **MySQL** *(Opcional)*: Banco de dados para armazenamento persistente.

## Pré-requisitos

Antes de iniciar, certifique-se de que você possui os seguintes componentes instalados:

- **PHP** (versão 7.4 ou superior)
- **Servidor Web** (como Apache ou Nginx)
- **Git** (para controle de versão, opcional)

## Instalação

### 1. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/anamnese_app.git
cd anamnese_app
````

### 2. Configure o Servidor Web
Usando PHP Built-in Server (para desenvolvimento)

```bash
php -S localhost:8000
````


