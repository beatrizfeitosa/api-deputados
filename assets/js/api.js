$(document).ready(function () {
  const URL_TO_FETCH =
    "https://dadosabertos.camara.leg.br/api/v2/deputados?ordem=ASC&ordenarPor=nome";

  fetch(URL_TO_FETCH)
    .then(function (response) {
      response.json().then(function (data) {
        console.log(data);

        data.dados.forEach((element) => {

          var html =
            "<tr>"+
              "<td>" + element.nome + "</td>"+
              "<td>" + element.siglaPartido + "</td>"+
              "<td>" + element.siglaUf + "</td>"+
              "<td>"+
                  "<div class='btn-group' role='group'>" +
                    "<a href='despesas.php?id="+element.id+"&nome="+element.nome+"' type='button' class='btn btn-outline-primary'>Despesas</a>" +
                    "<a href='discursos.php?id="+element.id+"&nome="+element.nome+"' type='button' class='btn btn-outline-primary'>Discursos</button></a>" +
                    "<a href='frentes.php?id="+element.id+"&nome="+element.nome+"' type='button' class='btn btn-outline-primary'>Frentes</button>" +
                  "</div>" +
                  "</td>"
                  
          $("#tableDeputados>tbody").append(html);
        });
      });
    })
    .catch(function (err) {
      console.error("Erro", err);
    });
});
