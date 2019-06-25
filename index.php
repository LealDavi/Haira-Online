<html>
  <head>
    <meta charset="utf-8" />
    <title>Haira Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

<div class="card-group">
  <div class="card"width="20%">
    <img class="card-img-top" src="imagens/h.jpg" alt="Card image cap">
    
  </div>
  <div class="card"width="20%">
    <img class="card-img-top" src="imagens/a.jpg" alt="Card image cap">
    
  </div>

  <div class="card"width="20%">
    <img class="card-img-top" src="imagens/i.jpg" alt="Card image cap">
    
  </div>

  <div class="card"width="20%">
    <img class="card-img-top" src="imagens/r.jpg" alt="Card image cap">
    
  </div>

  <div class="card"width="20%">
    <img class="card-img-top" src="imagens/a.jpg" alt="Card image cap">
    
  </div>
</div>

    <div class="container">    
      <div class="row">
        <div class="card-login">
          <div class="card">
            <div class="card-header">
             	Crie seu Clube de Futebol
            </div>

            <div class="card-body">
              <form action="valida_login.php" method="post">
              	<div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="Nome do clube">
                </div>

                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="Login">
                </div>

                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <button class="btn btn-lg btn-info btn-block" type="submit">
                	Cadastrar-se
            	</button>

                <p><a href="login.php" class="text-dark">
                	Possui uma conta?
                </a></p>

              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>