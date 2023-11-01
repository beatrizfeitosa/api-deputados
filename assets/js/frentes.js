$(document).ready(function () {
    const PARAMETROS = new URLSearchParams(location.search)
    var id = PARAMETROS.get("id")
    var nome = PARAMETROS.get("nome")
    console.log(id)
    console.log(nome)
    const URL_TO_FETCH =
      "https://dadosabertos.camara.leg.br/api/v2/deputados/"+id+"/frentes";
  
    fetch(URL_TO_FETCH)
      .then(function (response) {
        response.json().then(function (data) {
          console.log(data);
          $("#deputado").append("<td>" + nome + "<font size='5' color='gray'> Frentes</font></td>");
          data.dados.forEach((element) => {
            var html =
            "<div class='card'>" +
            "<div id='ajustar' class='card-body'>" +
            "<font color='black'><label>" + element.titulo + "</label></font>" +
            "<div id='botoes' class='btn-group' role='group'>" +
                "<a href='frentesMembros.php?idFrente="+element.id+"&nomeFrente="+element.titulo+"' type='button' class='btn btn-outline-primary'>Membros</a>" +
                "<a href='frentesDetalhes.php?idFrente="+element.id+"&nomeFrente="+element.titulo+"' type='button' class='btn btn-outline-primary'>Detalhes</button></a>" +
            "</div>" + 
            "</div>" +
            "</div></a>"

        $("#frentes").append(html);

          });
        });
      })
      .catch(function (err) {
        console.error("Erro", err);
      });
  });