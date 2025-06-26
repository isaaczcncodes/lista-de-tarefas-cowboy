<!-- NOME: Isaac José Ferreria da Silva -->
<!-- NOME: Arthur Ladeia Sousa dos Santos  -->
 
<?php
// Carrega o conteúdo do arquivo compras.json, se existir; senão cria um array vazio
$compras = file_exists('compras.json') ? json_decode(file_get_contents('compras.json'), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Compras</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>🔫 Vai comprar o que hoje, cowboy?</h1>

    <!-- Campo de texto e botão para adicionar nova compra -->
    <input type="text" id="novacompra" placeholder="Compras de um FORA DA LEI 🤠">
    <button onclick="adicionarcompra()">+</button>

    <!-- Lista de compras ou mensagem de vazio -->
    <?php if (empty($compras)): ?>
      <p class="vazio">Nenhuma compra por enquanto, cowboy... 🐎</p>
    <?php else: ?>

      <ul id="listacompras">
        <?php foreach ($compras as $compra): ?>
          <li>
            <?= htmlspecialchars($compra) ?>
            <button class="remover" onclick="removercompra(this)">-</button>
          </li>
        <?php endforeach; ?>
      </ul>

    <?php endif; ?>
  </div>

  <script src="script.js"></script>
</body>
</html>
