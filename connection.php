<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST["action"])){    
    if($_POST["action"]=="inserirNavio"){
        insertNavio();
    }
    if($_POST["action"]=="alterarNavio"){
        updateNavio();
    }
    if($_POST["action"]=="excluirNavio"){
        deleteNavio();
    }
    if($_POST["action"]=="inserirPorto"){
        insertPorto();
    }
    if($_POST["action"]=="alterarPorto"){
        updatePorto();
    }
    if($_POST["action"]=="excluirPorto"){
        deletePorto();
    }
    if($_POST["action"]=="inserirAgente"){
        insertAgente();
    }
    if($_POST["action"]=="alterarAgente"){
        updateAgente();
    }
    if($_POST["action"]=="excluirAgente"){
        deleteAgente();
    }
    if($_POST["action"]=="inserirRota"){
        insertRota();
    }
    if($_POST["action"]=="alterarRota"){
        updateRota();
    }
    if($_POST["action"]=="excluirRota"){
        deleteRota();
    }
    if($_POST["action"]=="inserirCarga"){
        insertCarga();
    }
    if($_POST["action"]=="alterarCarga"){
        updateCarga();
    }
    if($_POST["action"]=="excluirCarga"){
        deleteCarga();
    }
}

function open_database(){
    try{
        header('Content-Type: text/html; charset=utf-8');
        $connection = new mysqli("localhost", "root", "root", "empresa_portuaria");
        $connection->query("SET NAMES 'utf8'");
        /*$connection->query('SET character_set_connection=utf8');
        $connection->query('SET character_set_client=utf8');
        $connection->query('SET character_set_results=utf8');*/
        return $connection;
    } catch (Exception $ex) {
        echo $ex->getMessage();
        return null;
    }
}

function lauchQuery($sql){
    try {
        $database = open_database();
        $database->query($sql);
        $database->close();    
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function selectAll($sql){
    $database = open_database();
    $result = $database->query($sql);
    $database->close();
    
    while($row = mysqli_fetch_array($result)){
        $grupo[] = $row;
    }
    
    return $grupo;
}

function selectOneLine($sql){
    $database = open_database();
    $result = $database->query($sql);
    $database->close();
    
    $line = mysqli_fetch_assoc($result);
    
    return $line;
}


function insertNavio(){
    $nome = filter_input(INPUT_POST, "nome");
    $capacidade = filter_input(INPUT_POST, "capacidade");
    $comprimento = filter_input(INPUT_POST, "comprimento");
    $calado = filter_input(INPUT_POST, "calado");
    
    $sql = "INSERT INTO navio(nome, capacidade, comprimento, calado) "
            . "VALUES ('$nome','$capacidade','$comprimento','$calado')";
    
    lauchQuery($sql);
    voltarNavioPage();
}

function updateNavio(){
    $nome = filter_input(INPUT_POST, "nome");
    $capacidade = filter_input(INPUT_POST, "capacidade");
    $comprimento = filter_input(INPUT_POST, "comprimento");
    $calado = filter_input(INPUT_POST, "calado");
    $originalNome = filter_input(INPUT_POST, "originalNome");
    
    $sql = "UPDATE IGNORE navio SET "
            . "nome='$nome',capacidade='$capacidade',"
            . "comprimento='$comprimento',calado='$calado' "
            . "WHERE nome='$originalNome'";
    
    lauchQuery($sql);
    voltarNavioPage();
}

function deleteNavio(){
    $nome = filter_input(INPUT_POST, "nome");
    $sql = "DELETE FROM navio WHERE nome='$nome'";
    
    lauchQuery($sql);
    voltarNavioPage();
}

function insertPorto(){
    $nome = filter_input(INPUT_POST, "nome");
    $endereco = filter_input(INPUT_POST, "endereco");
    $tipo = filter_input(INPUT_POST, "tipo");
    $capacidade_estocagem = filter_input(INPUT_POST, "capacidade_estocagem");
    
    $sql = "INSERT INTO porto (nome, endereco, tipo, capacidade_estocagem) "
            . "VALUES ('$nome','$endereco','$tipo','$capacidade_estocagem')";
    
    lauchQuery($sql);
    voltarPortoPage();
}

function updatePorto(){
    $nome = filter_input(INPUT_POST, "nome");
    $endereco = filter_input(INPUT_POST, "endereco");
    $tipo = filter_input(INPUT_POST, "tipo");
    $capacidade_estocagem = filter_input(INPUT_POST, "capacidade_estocagem");
    $originalNome = filter_input(INPUT_POST, "originalNome");
    
    $sql = "UPDATE IGNORE porto SET "
            . "nome='$nome',endereco='$endereco',"
            . "tipo='$tipo',capacidade_estocagem='$capacidade_estocagem' "
            . "WHERE nome='$originalNome'";
    
    lauchQuery($sql);
    voltarPortoPage();
}

function deletePorto(){
    $nome = filter_input(INPUT_POST, "nome");
    $sql = "DELETE FROM porto WHERE nome='$nome'";
    
    lauchQuery($sql);
    voltarPortoPage();
}

function insertAgente(){
    $nome = filter_input(INPUT_POST, "nome");
    $porto = filter_input(INPUT_POST, "nome_porto");
    
    $sql = "INSERT INTO agente (nome, nome_porto) "
            . "VALUES ('$nome','$porto')";
    
    lauchQuery($sql);
    voltarAgentePage();
}

function updateAgente(){
    $nome = filter_input(INPUT_POST, "nome");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    $codigo = filter_input(INPUT_POST, "codigo");
    
    $sql = "UPDATE IGNORE agente SET "
            . "nome='$nome',nome_porto='$nome_porto' "
            . "WHERE codigo='$codigo'";
    
    lauchQuery($sql);
    voltarAgentePage();
}

function deleteAgente(){
    $codigo = filter_input(INPUT_POST, "codigo");
    $sql = "DELETE FROM agente WHERE codigo='$codigo'";
    
    lauchQuery($sql);
    voltarAgentePage();
}

function insertRota(){
    $nome_navio = filter_input(INPUT_POST, "nome_navio");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    
    $sql = "INSERT INTO rota(nome_navio, nome_porto) "
            . "VALUES ('$nome_navio','$nome_porto')";
    
    lauchQuery($sql);
    voltarRotaPage();
}

function updateRota(){
    $nome_navio = filter_input(INPUT_POST, "nome_navio");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    $originalNome_navio = filter_input(INPUT_POST, "originalNome_navio");
    $originalNome_porto = filter_input(INPUT_POST, "originalNome_porto");
    
    $sql = "UPDATE IGNORE rota SET "
            . "nome_navio='$nome_navio',nome_porto='$nome_porto' "
            . "WHERE nome_navio='$originalNome_navio' AND nome_porto='$originalNome_porto'";
    
    lauchQuery($sql);
    voltarRotaPage();
}

function deleteRota(){
    $nome_navio = filter_input(INPUT_POST, "nome_navio");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    $sql = "DELETE FROM rota WHERE nome_navio='$nome_navio' AND nome_porto='$nome_porto'";
    
    lauchQuery($sql);
    voltarRotaPage();
}

function insertCarga(){
    $peso = filter_input(INPUT_POST, "peso");
    $codigo = filter_input(INPUT_POST, "codigo");
    $tipo = filter_input(INPUT_POST, "tipo");
    $data_validade = filter_input(INPUT_POST, "data_validade");
    $temperatura_maxima = filter_input(INPUT_POST, "temperatura_maxima");
    $nome_navio = filter_input(INPUT_POST, "nome_navio");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    $data_maxima_desembarque = filter_input(INPUT_POST, "data_maxima_desembarque");
    
    if($tipo == "perecivel"){
        $sql = "INSERT INTO carga(peso, codigo, tipo, data_validade, nome_navio, nome_porto, data_maxima_desembarque) "
            . "VALUES ('$peso','$codigo','$tipo','$data_validade','$nome_navio','$nome_porto','$data_maxima_desembarque')";
    } else {
        $sql = "INSERT INTO carga(peso, codigo, tipo, temperatura_maxima, nome_navio, nome_porto, data_maxima_desembarque) "
            . "VALUES ('$peso','$codigo','$tipo','$temperatura_maxima','$nome_navio','$nome_porto','$data_maxima_desembarque')";
    }
    //$sql = "INSERT INTO carga(peso, codigo, tipo, data_validade, temperatura_maxima, nome_navio, nome_porto, data_maxima_desembarque) "
    //. "VALUES ('$peso','$codigo','$tipo','$data_validade', '$temperatura_maxima', '$nome_navio', '$nome_porto', '$data_maxima_desembarque')";
    
    lauchQuery($sql);
    voltarCargaPage();
}

function updateCarga(){
    $numero = filter_input(INPUT_POST, "numero");
    $peso = filter_input(INPUT_POST, "peso");
    $codigo = filter_input(INPUT_POST, "codigo");
    $tipo = filter_input(INPUT_POST, "tipo");
    $data_validade = filter_input(INPUT_POST, "data_validade");
    $temperatura_maxima = filter_input(INPUT_POST, "temperatura_maxima");
    $nome_navio = filter_input(INPUT_POST, "nome_navio");
    $nome_porto = filter_input(INPUT_POST, "nome_porto");
    $data_maxima_desembarque = filter_input(INPUT_POST, "data_maxima_desembarque");
    
    if($tipo == "perecivel"){
        $sql = "UPDATE IGNORE carga SET "
            . "peso='$peso',codigo='$codigo',"
            . "tipo='$tipo',data_validade='$data_validade',"
            . "temperatura_maxima=NULL,nome_navio='$nome_navio',"
            . "nome_porto='$nome_porto',data_maxima_desembarque='$data_maxima_desembarque' "
            . "WHERE numero='$numero'";
    } else {
        $sql = "UPDATE IGNORE carga SET "
            . "peso='$peso',codigo='$codigo',"
            . "tipo='$tipo',data_validade=NULL,"
            . "temperatura_maxima='$temperatura_maxima',nome_navio='$nome_navio',"
            . "nome_porto='$nome_porto',data_maxima_desembarque='$data_maxima_desembarque' "
            . "WHERE numero='$numero'";
    }
    
    lauchQuery($sql);
    voltarCargaPage();
}

function deleteCarga(){
    $numero = filter_input(INPUT_POST, "numero");
    $sql = "DELETE FROM carga WHERE numero='$numero'";
    
    lauchQuery($sql);
    voltarCargaPage();
}

function selectAllNavios(){
    $sql = "SELECT * FROM navio ORDER BY nome";
    
    return selectAll($sql);
}

function selectNavioByNome($nome){
    $sql = "SELECT * FROM navio WHERE nome='$nome'";
    
    return selectOneLine($sql);
}

function selectAllPortos(){
    $sql = "SELECT * FROM porto ORDER BY nome";
    
    return selectAll($sql);
}

function selectPortoByNome($nome){
    $sql = "SELECT * FROM porto WHERE nome='$nome'";
    
    return selectOneLine($sql);
}

function selectAllAgentes(){
    $sql = "SELECT * FROM agente ORDER BY nome";
    
    return selectAll($sql);
}

function selectAgenteByNome($codigo){
    $sql = "SELECT * FROM agente WHERE codigo='$codigo'";
    
    return selectOneLine($sql);
}

function selectAllRotas(){
    $sql = "SELECT * FROM rota ORDER BY nome_navio";
    
    return selectAll($sql);
}

function selectRotaByNomes($nome_navio, $nome_porto){
    $sql = "SELECT * FROM rota WHERE nome_navio='$nome_navio' AND nome_porto='$nome_porto'";
    
    return selectOneLine($sql);
}

function selectAllCargas(){
    $sql = "SELECT * FROM carga ORDER BY numero";
    
    return selectAll($sql);
}

function selectCargasByNumero($numero){
    $sql = "SELECT * FROM carga WHERE numero='$numero'";
    
    return selectOneLine($sql);
}

function selectAllTiposCargas(){
    $sql = "SELECT DISTINCT tipo FROM carga ORDER BY tipo";
    
    return selectAll($sql);
}

function voltarIndex(){
    header("Location:index.php");
}

function voltarNavioPage(){
    header("Location:navioPage.php");
}

function voltarPortoPage(){
    header("Location:portoPage.php");
}

function voltarAgentePage(){
    header("Location:agentePage.php");
}

function voltarRotaPage(){
    header("Location:rotaPage.php");
}

function voltarCargaPage(){
    header("Location:cargaPage.php");
}