<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include 'connection.php';
    /* var_dump($_POST["nome"]); */
    $porto = selectPortoByNome($_POST["nome"]);
    /*var_dump($porto);*/
?>
<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<h2>Editar Porto</h2>

<form name="dadosPorto" action="connection.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value='<?=$porto["nome"]?>' /></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" value='<?=$porto["endereco"]?>' /></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td>
                    <select name="tipo">
                        <option value="fluvial" <?php if ($porto["tipo"] == "fluvial") echo "selected='selected'";?> >Fluvial</option>
                        <option value="maritimo" <?php if ($porto["tipo"] == "maritimo") echo "selected='selected'";?> >Marítimo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Capacidade Estocagem:</td>
                <td><input type="text" name="capacidade_estocagem" value='<?=$porto["capacidade_estocagem"]?>' /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="action" value="alterarPorto" />
                    <input type="hidden" name="originalNome" value='<?=$porto["nome"]?>' />
                </td>
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>