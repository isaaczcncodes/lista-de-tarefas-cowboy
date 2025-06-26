<?php
$arquivo = 'compras.json';

// Verifica se o arquivo existe e carrega as compras, ou inicia array vazio
$compras = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $compra = trim($_POST['compra'] ?? '');

    if ($acao === 'adicionar' && $compra !== '') {
        $compras[] = $compra;
    } elseif ($acao === 'remover') {
        // Remove todas as ocorrências iguais à compra
        $compras = array_filter($compras, fn($t) => $t !== $compra);
    }

    // Salva o novo conteúdo no JSON
    if (file_put_contents($arquivo, json_encode(array_values($compras))) === false) {
        http_response_code(500);
        echo "Erro ao salvar dados.";
    } else {
        echo "OK";
    }
}
?>