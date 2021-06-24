<?php

    require('conexao.php');

    $municipio = filter_input(INPUT_POST, 'selectMunicipio');

    if(!isset($municipio))
    {
        echo "Favor, escolher um munícipio";
    }
    else
    {
        $consultaQuery = "SELECT MERCADO, :municipio FROM CPL_MERCADO as MERC
        INNER JOIN CPL_MUNICIPIO AS MUN 
        ON MERC.ID_MUNICIPIO = MUN.ID_MUNICIPIO";

        $stmt = $conexao->prepare($consultaQuery);
        $stmt->bindParam(":municipio" , $municipio);

        $stmt->execute();

    }

    



