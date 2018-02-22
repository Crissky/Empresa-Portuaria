<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllPortos(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1>Portos</h1> 
    <p id="addlink">
        <a class="btn btn-primary" href="insertPorto.php">Adicionar Porto</a>
    </p>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Tipo</th>
                <th>Cap. Estocagem (Ton)</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($grupo){
                    foreach ($grupo as $porto){ 
                        $nRow += 1;?>
                        <tr>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$porto["nome"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$porto["endereco"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?php
                                        if($porto["tipo"] == "fluvial"){
                                            echo 'Fluvial';
                                        } else {
                                            echo 'Marítimo';
                                        }
                                    ?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$porto["capacidade_estocagem"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <form name="alterar" action="updatePorto.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$porto["nome"]?>'/>
                                    <input class="btn btn-warning btn-sm" type="submit" value="Editar" name="editar" />
                                </form>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <form name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="nome" value='<?=$porto["nome"]?>' />
                                    <input type="hidden" name="action" value="excluirPorto" />
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
