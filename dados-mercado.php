<?php
    
    require('conexao.php');

    $idMercado = filter_input(INPUT_GET, 'id_mercado');

    try
    {
        $consultaQuery = "SELECT PRODUTO, PRECO, CATEGORIA, MERCADO FROM cpl_produto as PROD
        INNER JOIN CPL_CATEGORIA AS CAT
        inner JOIN cpl_mercado as MERC
        on prod.ID_MERCADO = MERC.ID_MERCADO AND PROD.ID_CATEGORIA = CAT.ID_CATEGORIA
        WHERE MERC.ID_MERCADO = :idMercado;";

        $stmt = $conexao->prepare($consultaQuery);

        $stmt->bindParam(':idMercado', $idMercado);

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->execute();

       

    }
    catch(PDOException $ex)
    {
        echo "Erro: ".$ex->getMessage();
    }

    
    try
    {
        $minQuery = "SELECT PRODUTO, PRECO, CATEGORIA, MERCADO FROM cpl_produto as PROD
        INNER JOIN CPL_CATEGORIA AS CAT
        inner JOIN cpl_mercado as MERC
        on prod.ID_MERCADO = MERC.ID_MERCADO AND PROD.ID_CATEGORIA = CAT.ID_CATEGORIA
        WHERE MERC.ID_MERCADO = :idMercado;";

        $stmt = $conexao->prepare($minQuery);

        $stmt->bindParam(':idMercado', $idMercado);

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->execute();

       

    }
    catch(PDOException $ex)
    {
        echo "Erro: ".$ex->getMessage();
    }

    

    
?>

<html>



    <body>
    
        <table>
                <tr>
                    <th>Produto</th>
                    <th>Preço (R$)</th>
                    <th>Categoria</th>
                    <th>Mercado</th>
                </tr>
                <?php if($stmt->rowCount() > 0) { ?>
                <?php foreach( $stmt as $row ) { ?>
                    
                    <tr>
                        <td><?php echo $row['PRODUTO']; ?></td>
                        <td><?php echo number_format($row['PRECO'], "2", ",", ""); ?></td>
                        <td><?php echo $row['CATEGORIA']; ?></td>
                        <td><?php echo $row['MERCADO']; ?></td>
                    </tr>
                
                   
                <?php } ?>
                    
                <?php } else { 
                    $error;
                 } ?>
                <tr>
                    
                </tr>
            </table>
    
    </body>
</html>