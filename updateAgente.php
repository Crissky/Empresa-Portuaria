<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include 'connection.php';
    /* var_dump($_POST["nome"]); */
    try {
        $grupo = selectAllPortos(); 
        $agente = selectAgenteByNome($_POST["codigo"]);
        /*var_dump($agente);*/
   } catch (Exception $ex) {
        echo $ex->getMessage();
   }
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2>Editar Agente</h2>

<form name="dadosAgente" action="connection.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value='<?=$agente["nome"]?>' /></td>
            </tr>
            <tr>
                <td>Porto:</td>
                <td>
                    <select name="nome_porto">
                        <?php
                            if($grupo){
                                foreach ($grupo as $porto){ ?>
                                    <option value="<?=$porto["nome"]?>" <?php if ($agente["nome_porto"] == $porto["nome"]) echo "selected='selected'";?> ><?=$porto["nome"]?></option>
                            <?php }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="action" value="alterarAgente" />
                    <input type="hidden" name="codigo" value='<?=$agente["codigo"]?>' />
                </td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>
