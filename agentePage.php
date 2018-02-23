<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllAgentes(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>


    <div class="container mt-5">
        <h1 class="display-4 mt-5 mb-5 pt-5">Agentes</h1>
        <div class="row justify-content-center">
                <a class="btn btn-primary" href="insertAgente.php">Adicionar Agente</a>
        </div>
        <div class="row mb-5 justify-content-center">
            <?php
            if($grupo){
                foreach ($grupo as $agente){ ?>
            <div class="col-sm-11 col-md-6 col-lg-4 mt-4">
                <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-inline font-weight-bold">Código:</div>                                         
                                <div class="d-inline"> <?=$agente["codigo"]?> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-inline font-weight-bold">Nome:</div>                                         
                                <div class="d-inline"> <?=$agente["nome"]?> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-inline font-weight-bold">Porto:</div>                                         
                                <div class="d-inline"> <?=$agente["nome_porto"]?> </div>
                            </li>
                        </ul>
                    <div class="card-body ml-auto">
                        <div class="row">
                            <form class="mr-3 mt-1" name="alterar" action="updateAgente.php" method="POST">
                                <input type="hidden" name="codigo" value='<?=$agente["codigo"]?>'/>
                                <input class="btn btn-warning" type="submit" value="Editar" name="editar" />
                            </form>
                            <form class="mr-3 mt-1" name="excluir" action="connection.php" method="POST">
                                <input type="hidden" name="codigo" value='<?=$agente["codigo"]?>' />
                                <input type="hidden" name="action" value="excluirAgente" />
                                <input class="btn btn-danger" type="submit" value="Excluir" name="excluir" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>
        </div>
    </div>
    
    
<?php include (FOOTER_TEMPLATE);?>