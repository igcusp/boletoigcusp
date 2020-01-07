<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>IGc-USP :: Gerador de Boletos</title>
  </head>
  <body class="bg-secondary pt-1">
    
      <div class="container bg-white p-3">
      
          <nav class="navbar navbar-light bg-white">
              <img src="logo_IGc_colorido.png" class="img-fluid mx-auto d-block" width="400px">
          </nav>
          
          <h3>Pós-Graduação - IGc-USP</h3>
          <h2>Inscrição Aluno Especial</h2>
          
          <form method="post" action="geraBoleto.php" class="mt-5">
              <div class="form-group">
                  <label for="tipoSacado">Pessoa Física ou Jurídica??</label>
                  <select id="tipoSacado" name="tipoSacado" class="custom-select">
                      <option value="PF" selected>Pessoa Física</option>
                      <option value="PJ">Pessoa Jurídica</option>
                  </select>                
              </div>
              <div class="form-group">
                  <label for="nomeSacado">Nome Completo</label>
                  <input type="text" class="form-control" id="nomeSacado" name="nomeSacado" placeholder="Digite aqui seu nome completo">
              </div>
              <div class="form-group">
                  <label for="cpfCnpj">CPF/CNPJ</label>
                  <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="Digite somente os números!">
              </div>
              <div class="form-group">
                  <label for="codigoEmail">Email address</label>
                  <input type="email" class="form-control" id="codigoEmail" name="codigoEmail" placeholder="nome@examplo.com">
              </div>
              <button type="submit" class="btn btn-primary mt-2">Gerar boleto</button>
              <input type="hidden" id="inscricaoPara" name="inscricaoPara" value="MESTRADO">
          </form>
      
      </div>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>