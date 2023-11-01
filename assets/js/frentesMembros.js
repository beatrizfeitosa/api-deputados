$(document).ready(function () {
    const PARAMETROS = new URLSearchParams(location.search)
    var idFrente = PARAMETROS.get("idFrente")
    var nomeFrente = PARAMETROS.get("nomeFrente")
    console.log(idFrente)
    console.log(nomeFrente)
    const URL_TO_FETCH =
      "https://dadosabertos.camara.leg.br/api/v2/frentes/"+idFrente+"/membros";
  
    fetch(URL_TO_FETCH)
      .then(function (response) {
        response.json().then(function (data) {
          console.log(data);
          $("#frente").append("<td>" + nomeFrente + "<font size='5' color='gray'> Deputados</font></td>");
          data.dados.forEach((element) => {
            var html =
            "<a href='frentes.php?id="+element.id+"&nome="+element.nome+"' div class='card'>" +
            "<div class='card-body'>" +
            "<font color='black'><label>" + element.nome + "</label></font>" +
            "</div>" +
            "</div></a>"

        $("#membros").append(html);

          });
        });
      })
      .catch(function (err) {
        console.error("Erro", err);
      });
  });