# Anamnese App

![Anamnese App print](/assets/Captura%20de%20tela%202024-12-27%20091245.png?raw=true) <!-- Opcional: Adicione um logo se disponível -->

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

## Pré-requisitos

Antes de iniciar, certifique-se de que você possui os seguintes componentes instalados:

- **PHP** (versão 7.4 ou superior)
- **Servidor Web** (como Apache ou Nginx)
- **Git** (para controle de versão, opcional)

### 1.Estrutura do Projeto

```bash
anamnese_app/
├── certs/
│   └── cacert.pem
├── templates/
│   └── anamnese_form.php
├── assets/
│   └── styles.css
├── index.php
├── processa_anamnese.php
├── resultados.php
└── README.md
````

- certs/: Contém o arquivo cacert.pem necessário para validação de certificados SSL.
- templates/: Contém os templates HTML/PHP para o formulário de anamnese.
- assets/: Armazena arquivos estáticos como CSS, imagens e scripts.
- index.php: Página inicial que exibe o formulário de anamnese.
- processa_anamnese.php: Processa os dados do formulário e interage com a API da LLM Groq.
- resultados.php: Exibe os diagnósticos e tratamentos sugeridos.
- README.md: Este arquivo de documentação.

## Instalação

### 1. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/anamnese_app.git
cd anamnese_app
````

### 2. Configuração
 **Adicione Sua Chave de API no Código**
Como você não está utilizando um arquivo .env, a chave de API está diretamente no código. ⚠️ Atenção: Essa prática não é recomendada para ambientes de produção. Considere implementar métodos mais seguros para armazenar credenciais sensíveis.

Abra o arquivo processa_anamnese.php e localize a linha onde a chave de API está definida:

```bash
$api_key = "SEU TOKEN"; // Substitua pela sua chave de API
````

### 3. Configure o Servidor Web
Usando Apache
Habilite o Módulo Rewrite (se ainda não estiver habilitado):
Acesse a aplicação no navegador em http://localhost:8000/anamnese_app/index.php.

### 4. Opcional Proteja o Diretório certs/ e o Arquivo cacert.pem  
Assegure-se de que o diretório certs/ e o arquivo cacert.pem não sejam acessíveis publicamente. Configure o servidor web para negar acesso a esses arquivos, se necessário.

Exemplo para Apache (.htaccess):

Crie um arquivo .htaccess dentro do diretório certs/ e adicione:

```apache
Order allow,deny
Deny from all
````

## Uso
### 1. Acesse a Aplicação
Abra o navegador e vá para http://localhost/anamnese_app/index.php (ajuste conforme sua configuração).

### 2. Preencha o Formulário de Anamnese
Insira as informações do paciente:

Nome do Paciente (Obrigatório)
Queixas Principais (Obrigatório)
Tempo de Dores
Histórico Médico

### 3. Submeta o Formulário
Clique no botão "Enviar" para processar a anamnese. A aplicação enviará os dados para a API da LLM Groq e redirecionará para a página de resultados.

### 4. Visualize os Resultados
Na página resultados.php, você verá os diagnósticos e tratamentos sugeridos com base nas informações fornecidas.

### 5. Registrar Nova Anamnese
Clique no botão "Registrar Nova Anamnese" para voltar ao formulário e registrar outro paciente.

⚠️ Importante: A LLM Groq é uma ferramenta de auxílio e não substitui o julgamento clínico. As sugestões fornecidas pela LLM devem ser utilizadas como suporte e não para a tomada de decisões médicas.
