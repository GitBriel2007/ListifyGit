<?php

session_start();

    include_once __DIR__ . "/../../Configs/Database.php";
    include_once __DIR__ . "/../../Objects/Usuario.php";
    include_once __DIR__ . "/../../Controllers/UsuarioController.php";

    $controller = new UsuarioController();

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../../Css/IndexHome.css"/>
    <title>Listify</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  </head>
  <body>

  <header>
      <div id="divLogo">
          <img
                  id="imgPrincipalListify"
                  class="img-fluid"
                  src="../../Images/Logo/imgPrincipalListify.png"
          />
      </div>
      <div class="menuDropdown" id="menuDropdown">


          <ul
                  class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center"
          >
              <li class="nav-item dropdown">
                  <a
                          href="#"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                  >
                      <i class="bi bi-caret-left-fill"></i>
                  </a>

                  <ul class="dropdown-menu">
                      <li>

                          <a class="dropdown-item"
                             href="UsuarioClienteEditarPerfil.php?editarPerfil=<?= $_SESSION['usuario']->id ?>">Editar
                              Perfil</a>
                      </li>
                      <li>
                          <hr class="dropdown-divider"/>
                      </li>
                      <li>
                          <a class="dropdown-item" href="/Login/Logout.php">Sair</a>
                      </li>

                  </ul>

              </li>
          </ul>

          <img
                  id="img-perfil-padrao"
                  class="img-fluid"
                  src="../../Images/Icons/PerfilPadrao.png"
          />
      </div>
  </header>

  <aside class="categorias-home">
      <ul>
        <li class="nav-item dropdown">
          <a
            href="#"
            class="btn btn-dark dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            >Categoria</a
          >

          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>

        </li>
      </ul>

      <a href="ListaProdutosCliente.php">Lista de Produtos</a>
      <a href="PainelVerFabricantes.php">Fabricantes</a>
  </aside>

  <main>

      <section class="letra-destaque">
          <h1><span>Produto</span> <span>Lançamento</span></h1>
          <button>Ver Lista</button>
      </section>

      <section class="img-produto">
          <article>
              <img src="#" >
              <p>Descricao</p>
              <button><a href="../Produto#"></a></button>
          </article>
      </section>

  </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
