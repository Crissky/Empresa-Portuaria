<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'connection.php';
    try {
       $grupo = selectAllPortos(); 
   } catch (Exception $ex) {
       echo $ex->getMessage();
   }
    // var_dump($grupo);
?>

<?php require_once 'config.php'; ?>
<?php include (HEADER_TEMPLATE); ?>

<!-- <html>
    <head>
        <meta charset="UTF-8">
        <title>Portos</title>
    </head>
    <body> -->

        <h1>Portos</h1>
        
        <p>
            <a id="link" href="insertPorto.php">Adicionar Porto</a>
        </p>
        
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Tipo</th>
                    <th>Cap. Estocagem</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($grupo){
                        foreach ($grupo as $porto){ ?>
                            <tr>
                                <td><?=$porto["nome"]?></td>
                                <td><?=$porto["endereco"]?></td>
                                <td><?=$porto["tipo"]?></td>
                                <td><?=$porto["capacidade_estocagem"]?></td>
                                <td>
                                    <form name="alterar" action="updatePorto.php" method="POST">
                                        <input type="hidden" name="nome" value='<?=$porto["nome"]?>'/>
                                        <input type="submit" value="Editar" name="editar" />
                                    </form>
                                </td>
                                <td><form name="excluir" action="connection.php" method="POST">
                                        <input type="hidden" name="nome" value='<?=$porto["nome"]?>' />
                                        <input type="hidden" name="action" value="excluirPorto" />
                                        <input type="submit" value="Excluir" name="excluir" />
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                
            </tbody>
        </table>
    </body>
</html>
