$(document).ready(function () {
    const PARAMETROS = new URLSearchParams(location.search)
    var id = PARAMETROS.get("id")
    var nome = PARAMETROS.get("nome")
    console.log(id)
    console.log(nome)
    const URL_TO_FETCH =
      "https://dadosabertos.camara.leg.br/api/v2/deputados/"+id+"/discursos?dataInicio=2010-01-01&ordenarPor=dataHoraInicio&ordem=ASC";
  
    fetch(URL_TO_FETCH)
      .then(function (response) {
        response.json().then(function (data) {
          console.log(data);
  			  $("#deputado").append("<td>" + nome + "<font size='5' color='gray'> Discursos</font></td>");
          data.dados.forEach((element) => {
            var html =
            
            "<div class='card'><div class='card-header'>" +
              element.tipoDiscurso + "</div>" +
            "<div class='card-body'>" +
              element.sumario + "</div>"

        $("#discursos").append(html);
          });
        });
      })
      .catch(function (err) {
        console.error("Erro", err);
      });
  });