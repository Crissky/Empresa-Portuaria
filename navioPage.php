<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    try {
       $grupo = selectAllNavios(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1>Navios</h1>

    <p id="addlink">
        <a id="link" href="insertNavio.php">Adicionar Navio</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Capacidade</th>
                <th>Comprimento</th>
                <th>Calado</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($grupo){
                    foreach ($grupo as $navio){ ?>
                        <tr>
                            <td><?=$navio["nome"]?></td>
                            <td><?=$navio["capacidade"]?></td>
                            <td><?=$navio["comprimento"]?></td>
                            <td><?=$navio["calado"]?></td>
                            <td>
                                <form name="alterar" action="updateNavio.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$navio["nome"]?>'/>
                                    <input type="submit" value="Editar" name="editar" />
                                </form>
                            </td>
                            <td><form name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$navio["nome"]?>' />
                                    <input type="hidden" name="action" value="excluirNavio" />
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