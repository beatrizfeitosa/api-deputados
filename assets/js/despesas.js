$(document).ready(function () {
    const PARAMETROS = new URLSearchParams(location.search)
    var id = PARAMETROS.get("id")
    var nome = PARAMETROS.get("nome")
    console.log(id)
    console.log(nome)
    const URL_TO_FETCH =
      "https://dadosabertos.camara.leg.br/api/v2/deputados/"+id+"/despesas?ordem=ASC&ordenarPor=ano";
  
    fetch(URL_TO_FETCH)
      .then(function (response) {
        response.json().then(function (data) {
          console.log(data);
          $("#deputado").append("<td>" + nome + "<font size='5' color='gray'> Despesas</font></td>");
          data.dados.forEach((element) => {
            var html =
            "<div class='card'>" +
            "<div class='card-body'>" +
            "<label>" + element.tipoDespesa + "</label><br>" +
            "<label>" + element.dataDocumento + "</label><br>" +
            "<label>R$ " + element.valorDocumento + "</label>" +
            "</div>" +
            "</div>"

        $("#conteudo").append(html);
          });
        });
      })
      .catch(function (err) {
        console.error("Erro", err);
      });
  });