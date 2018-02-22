<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllRotas(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1>Rotas</h1>
    <p id="addlink">
        <a class="btn btn-primary" href="insertRota.php">Adicionar Rota</a>
    </p>
    <table border="1">
        <thead>
            <tr>
                <th>Navio</th>
                <th>Porto</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($grupo){
                    foreach ($grupo as $rota){ 
                        $nRow += 1;?>
                        <tr>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$rota["nome_navio"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$rota["nome_porto"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <form name="alterar" action="updateRota.php" method="POST">
                                    <input type="hidden" name="nome_navio" value='<?=$rota["nome_navio"]?>'/>
                                    <input type="hidden" name="nome_porto" value='<?=$rota["nome_porto"]?>'/>
                                    <input class="btn btn-warning btn-sm" type="submit" value="Editar" name="editar" />
                                </form>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <form name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="nome_navio" value='<?=$rota["nome_navio"]?>'/>
                                    <input type="hidden" name="nome_porto" value='<?=$rota["nome_porto"]?>'/>
                                    <input type="hidden" name="action" value="excluirRota" />
                                    <input class="btn btn-danger btn-sm" type="submit" value="Excluir" name="excluir" />
                                </form>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
        </tbody>
    </table>
<?php include (FOOTER_TEMPLATE);?>
