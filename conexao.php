<?php
    try {
        $conexao = new PDO("mysql:host=localhost;dbname=compara_preco_litoral", "root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $erro) {
        
        echo "Erro: ".$erro->getMessage();
    }