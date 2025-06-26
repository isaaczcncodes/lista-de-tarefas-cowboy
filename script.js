// Função para adicionar uma nova compra à lista
function adicionarcompra() {
  const input = document.getElementById("novacompra");
  const compra = input.value.trim(); // Remove espaços em branco

  // Impede o envio se o campo estiver vazio
  if (compra === "") return;

  // Envia a compra para o PHP usando método POST
  fetch("salvar.php", {
    method: "POST",
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      acao: "adicionar",
      compra: compra
    })
  })
  .then(response => {
    if (!response.ok) throw new Error("Erro ao adicionar");
    // Atualiza apenas o DOM sem recarregar (opcional, aqui recarrega)
    location.reload();
  })
  .catch(error => {
    alert("Erro ao salvar compra: " + error.message);
  });
}

// Função para remover uma compra da lista
function removercompra(botao) {
  const li = botao.parentElement;
  const compra = li.firstChild.textContent.trim(); // Pega o texto da <li>

  fetch("salvar.php", {
    method: "POST",
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      acao: "remover",
      compra: compra
    })
  })
  .then(response => {
    if (!response.ok) throw new Error("Erro ao remover");
    location.reload();
  })
  .catch(error => {
    alert("Erro ao remover compra: " + error.message);
  });
}
