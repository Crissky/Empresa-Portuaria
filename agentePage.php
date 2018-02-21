<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    try {
       $grupo = selectAllAgentes(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1>Agentes</h1>

    <p id="addlink">
        <a id="link" href="insertAgente.php">Adicionar Agente</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Porto</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($grupo){
                    foreach ($grupo as $agente){ ?>
                        <tr>
                            <td><?=$agente["codigo"]?></td>
                            <td><?=$agente["nome"]?></td>
                            <td><?=$agente["nome_porto"]?></td>
                            <td>
                                <form name="alterar" action="updateAgente.php" method="POST">
                                    <input type="hidden" name="codigo" value='<?=$agente["codigo"]?>'/>
                                    <input type="submit" value="Editar" name="editar" />
                                </form>
                            </td>
                            <td><form name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="codigo" value='<?=$agente["codigo"]?>' />
                                    <input type="hidden" name="action" value="excluirAgente" />
                                    <input type="submit" value="Excluir" name="excluir" />
                                </form>
                            </td>
                        </tr>
                    <?php }
                }
                ?>

        </tbody>
    </table>
<?php include (FOOTER_TEMPLATE);?>