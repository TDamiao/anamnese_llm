<?php
// resultados.php
session_start();

// Verifica se há resultados na sessão
if (!isset($_SESSION['diagnosticos']) || !isset($_SESSION['tratamentos'])) {
    header("Location: index.php");
    exit();
}

$diagnosticos = $_SESSION['diagnosticos'];
$tratamentos = $_SESSION['tratamentos'];

// Limpa os resultados da sessão para evitar exibição repetida
unset($_SESSION['diagnosticos']);
unset($_SESSION['tratamentos']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Anamnese</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div class="container mt-5">
    <h2>Resultados da Anamnese</h2>
    <p class="text-danger"><strong>A LLM Groq é uma ferramenta de auxílio e não substitui o julgamento clínico. As sugestões fornecidas devem ser utilizadas como suporte e não para tomada de decisões médicas.</strong></p>
    
    <?php if (!empty($diagnosticos)): ?>
        <div class="mt-4">
            <h4>Diagnósticos e Tratamentos Sugeridos:</h4>
            <div class="card">
                <div class="card-body">
                    <p><?php echo nl2br(htmlspecialchars($diagnosticos)); ?></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning mt-4">
            Não foram encontrados diagnósticos baseados nas informações fornecidas.
        </div>
    <?php endif; ?>

    <a href="index.php" class="btn btn-secondary mt-4">Registrar Nova Anamnese</a>
</div>
</body>
</html>
