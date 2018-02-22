<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    $nRow = 0;
    try {
       $grupo = selectAllCargas(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>
<?php
    function formataData($data){
        $array = explode("-", $data);
        $novaData = $array[2]."/".$array[1]."/".$array[0];

        return $novaData;
    }
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

    <h1>Cargas</h1>

    <p id="addlink">
        <a class="btn btn-primary" href="insertCarga.php">Adicionar Carga</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Peso (Ton)</th>
                <th>Cód</th>
                <th>Tipo</th>
                <th>Validade</th>
                <th>Temperatura</th>
                <th>Navio</th>
                <th>Porto</th>
                <th>Desembarque</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($grupo){
                    foreach ($grupo as $carga){ 
                        $nRow += 1;?>
                        <tr>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$carga["numero"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$carga["peso"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$carga["codigo"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?php
                                        if($carga["tipo"] == "perecivel"){
                                            echo 'Perecível';
                                        } else{
                                            echo 'Sensível';
                                        }
                                    ?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <?php 
                                    if($carga["data_validade"]){
                                        echo formataData($carga["data_validade"]);
                                    } else {
                                        echo 'N/A';
                                    }
                                ?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <?php 
                                    if($carga["temperatura_maxima"]){
                                        echo $carga["temperatura_maxima"]."C";
                                    } else {
                                        echo 'N/A';
                                    }
                                ?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$carga["nome_navio"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                    <?=$carga["nome_porto"]?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <?php 
                                    if($carga["data_maxima_desembarque"]){
                                        echo formataData($carga["data_maxima_desembarque"]);
                                    } else {
                                        echo 'N/A';
                                    }
                                ?>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> >
                                <form name="alterar" action="updateCarga.php" method="POST">
                                    <input type="hidden" name="numero" value='<?=$carga["numero"]?>'/>
                                    <input class="btn btn-warning btn-sm" type="submit" value="Editar" name="editar" />
                                </form>
                            </td>
                            <td id=<?php echo($nRow%2==0 ? 'light' : 'dark')?> ><form name="excluir" action="connection.php" method="POST">
                                    <input type="hidden" name="numero" value='<?=$carga["numero"]?>' />
                                    <input type="hidden" name="action" value="excluirCarga" />
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