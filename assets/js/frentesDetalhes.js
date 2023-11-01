$(document).ready(function () {
    const PARAMETROS = new URLSearchParams(location.search)
    var idFrente = PARAMETROS.get("idFrente")
    var nomeFrente = PARAMETROS.get("nomeFrente")
    console.log(idFrente)
    console.log(nomeFrente)
    const URL_TO_FETCH =
      "https://dadosabertos.camara.leg.br/api/v2/frentes/"+idFrente;
  
    fetch(URL_TO_FETCH)
      .then(function (response) {
        response.json().then(function (data) {
          console.log(data);

          $("#frente").append(nomeFrente);
          $("#telefone").append("<input type='text' readonly class='form-control-plaintext' value='"+data.dados.telefone+"'>");
          $("#situacao").append("<textarea readonly class='form-control-plaintext' rows='4'>"+data.dados.situacao+"</textarea>");
          $("#documento").append("<input type='text' readonly class='form-control-plaintext' value='"+data.dados.urlDocumento+"'>");
          $("#nome").append("<input type='text' readonly class='form-control-plaintext' value='"+data.dados.coordenador.nome+"'>");
          $("#partido").append("<input type='text' readonly class='form-control-plaintext' value='"+data.dados.coordenador.siglaPartido+"'>");

        });
      })
      .catch(function (err) {
        console.error("Erro", err);
      });
  });