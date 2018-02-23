<!DOCTYPE hmtl>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link href="css/inicialPage.css" rel="stylesheet">
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery/jquery-3.3.1.min.js"></script>
        <script src="js/popper/popper.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <title>Empresa Portuaria</title>
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
            
            <div class="container">
                <!--"navbar-brand" É A LOGO A ESQUENA NA NAVBAR-->
                <a class="navbar-brand" href="index.php">
                    <img src="css/rudder.svg" width="30" height="30" class="d-inline-block align-top" alt="Logo"> EP
                </a>

                <!--BOTÃO ONDE TODOS OS ITENS DICAM OCULTOS. SÓ É MOSTRADO NA DEFINIÇÃO DO "navbar-expand-lg" REALIXADA ANTERIORMENTE-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--LISTA COM OS ITENS DO NAVBAR. "mr-auto" ALINHA OS ITENS A ESQUERDA-->
                <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if(basename($_SERVER['SCRIPT_FILENAME'])=='navioPage.php'){echo'active';}?>" href="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=='navioPage.php'){echo'#';}else{echo'navioPage.php';}?>">Navios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(basename($_SERVER['SCRIPT_FILENAME'])=='agentePage.php'){echo'active';}?>" href="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=='agentePage.php'){echo'#';}else{echo'agentePage.php';}?>">Agentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(basename($_SERVER['SCRIPT_FILENAME'])=='portoPage.php'){echo'active';}?>" href="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=='portoPage.php'){echo'#';}else{echo'portoPage.php';}?>">Portos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(basename($_SERVER['SCRIPT_FILENAME'])=='rotaPage.php'){echo'active';}?>" href="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=='rotaPage.php'){echo'#';}else{echo'rotaPage.php';}?>">Rotas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(basename($_SERVER['SCRIPT_FILENAME'])=='cargaPage.php'){echo'active';}?>" href="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=='cargaPage.php'){echo'#';}else{echo'cargaPage.php';}?>">Cargas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
        
<!--        <nav id="menu">
            <h1>Menu Principal</h1>
            <ul type="square">
                <a href="index.php"><li>Home</li></a>
                <a href="navioPage.php"><li>Navios</li></a>
                <a href="agentePage.php"><li>Agentes</li></a>
                <a href="portoPage.php"><li>Portos</li></a>
                <a href="rotaPage.php"><li>Rotas</li></a>
                <a href="cargaPage.php"><li>Cargas</li></a>
            </ul>
        </nav>-->
        <section>
