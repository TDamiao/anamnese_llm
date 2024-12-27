<?php
// processa_anamnese.php

session_start(); // Inicia a sessão para armazenar os resultados

// Verifica se o formulário foi submetido via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome_paciente = htmlspecialchars($_POST['nome_paciente']);
    $queixas_principais = htmlspecialchars($_POST['queixas_principais']);
    $tempo_de_dor = htmlspecialchars($_POST['tempo_de_dor']);
    $historico_medico = htmlspecialchars($_POST['historico_medico']);

    // Concatena os dados para enviar à LLM Groq
    $anamnese = "Paciente: $nome_paciente\nQueixas: $queixas_principais\nTempo de Dor: $tempo_de_dor\nHistórico Médico: $historico_medico";

    // Configurações da API da LLM Groq
    $api_url = "https://api.groq.com/openai/v1/chat/completions"; // Verifique a URL correta da API
    $api_key = "SEU TOKEN"; // **⚠️ IMPORTANTE: Use sua nova chave de API segura**

    // Configura o payload para enviar à API
    $payload = json_encode([
        "model" => "llama3-8b-8192",
        "messages" => [
            ["role" => "system", "content" => "Você é um assistente médico que ajuda a diagnosticar condições de saúde com base nas informações fornecidas."],
            ["role" => "user", "content" => $anamnese]
        ],
        "n" => 1, // Número de respostas desejadas
        "max_tokens" => 500, // Limite de tokens para a resposta
        "temperature" => 0.7 // Grau de criatividade na resposta
    ]);

    // Inicializa o cURL
    $ch = curl_init($api_url);

    // Configurações do cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        "Authorization: Bearer $api_key"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    // Especifica o caminho para o arquivo cacert.pem
    curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . '/certs/cacert.pem'); // Ajuste o caminho conforme necessário

    // Executa a requisição
    $response = curl_exec($ch);

    // Verifica se houve erro na requisição
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        // Log do erro
        $log_entry = date('Y-m-d H:i:s') . " - Erro na requisição: $error_msg\n";
        file_put_contents(__DIR__ . '/logs/api_response.log', $log_entry, FILE_APPEND);
        die("Erro na requisição: $error_msg");
    }

    // Fecha a conexão cURL
    curl_close($ch);

    // Decodifica a resposta JSON
    $resultado = json_decode($response, true);

    // Log da resposta da API
    $log_entry = date('Y-m-d H:i:s') . " - Resposta da API: " . $response . "\n";
    file_put_contents(__DIR__ . '/logs/api_response.log', $log_entry, FILE_APPEND);

    // Verifica se a resposta contém escolhas
    if (isset($resultado['choices']) && count($resultado['choices']) > 0) {
        $diagnosticos = $resultado['choices'][0]['message']['content']; // Ajuste conforme a estrutura da resposta
        // Supondo que o conteúdo inclui tanto diagnósticos quanto tratamentos, você pode precisar processar o texto
        // Para simplificar, vamos armazenar todo o conteúdo na sessão
        $_SESSION['diagnosticos'] = $diagnosticos;
        $_SESSION['tratamentos'] = $diagnosticos; // Ajuste se a resposta separar diagnósticos e tratamentos
    } else {
        $diagnosticos = "";
        $tratamentos = "";
    }

    // Redireciona para a página de resultados
    header("Location: resultados.php");
    exit();
} else {
    // Se o acesso não for via POST, redireciona para o formulário
    header("Location: index.php");
    exit();
}
?>
