<!-- templates/anamnese_form.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registro de Anamnese</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div class="container mt-5">
    <h2>Registro de Anamnese</h2>
    <p class="text-danger"><strong>A LLM Groq é uma ferramenta de auxílio e não substitui o julgamento clínico. As sugestões fornecidas devem ser utilizadas como suporte e não para tomada de decisões médicas.</strong></p>
    <form action="processa_anamnese.php" method="POST">
        <div class="form-group">
            <label for="nome_paciente">Nome do Paciente</label>
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" required>
        </div>
        <div class="form-group">
            <label for="queixas_principais">Queixas Principais</label>
            <textarea class="form-control" id="queixas_principais" name="queixas_principais" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="tempo_de_dor">Tempo de Dores</label>
            <input type="text" class="form-control" id="tempo_de_dor" name="tempo_de_dor">
        </div>
        <div class="form-group">
            <label for="historico_medico">Histórico Médico</label>
            <textarea class="form-control" id="historico_medico" name="historico_medico" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success mt-3">
            Anamnese registrada com sucesso!
        </div>
    <?php endif; ?>
</div>
</body>
</html>
