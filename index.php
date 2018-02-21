<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

        <h1 id="mainscreen">Empresa Portuaria</h1>

        <div class="cima">
            <a href="navioPage.php"> <div class="btNavio"> </div> </a>
            <a href="agentePage.php"> <div class="btAgente"> </div> </a>
            <a href="portoPage.php"> <div class="btPorto"> </div> </a>
        </div>
        <div class="baixo">
            <a href="rotaPage.php"> <div class="btRota"> </div> </a>
            <a href="cargaPage.php"> <div class="btCarga"> </div> </a>
        </div>
        <?php include (FOOTER_TEMPLATE);?>
    </body>

</html>
