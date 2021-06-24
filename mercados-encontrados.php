<?php 

require('conexao.php');

ini_set("display_errors", 0);

$municipio = filter_input(INPUT_POST, 'selectMunicipio');

if($municipio == null)
{
    $error =  "Favor, escolher um munícipio";
}
else
{
    try
    {
        $consultaQuery = "SELECT ID_MERCADO, MERCADO, MUNICIPIO FROM CPL_MERCADO as MERC
        INNER JOIN CPL_MUNICIPIO AS MUN 
        ON MERC.ID_MUNICIPIO = MUN.ID_MUNICIPIO
        WHERE MUNICIPIO = :municipio;";

        $stmt = $conexao->prepare($consultaQuery);

        $stmt->bindParam(':municipio', $municipio);

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->execute();

       

    }
    catch(PDOException $ex)
    {
        echo "Erro: ".$ex->getMessage();
    }
    
}

    

if($municipio == "Todos")
{
    try
    {
        $consultaQuery = "SELECT ID_MERCADO, MERCADO, MUNICIPIO FROM CPL_MERCADO as MERC
        INNER JOIN CPL_MUNICIPIO AS MUN 
        ON MERC.ID_MUNICIPIO = MUN.ID_MUNICIPIO ORDER BY MERC.MERCADO;";

        $stmt = $conexao->prepare($consultaQuery);


        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->execute();

       

    }
    catch(PDOException $ex)
    {
        echo "Erro: ".$ex->getMessage();
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title></title>
        <style>
        *
        {
            margin: 0;
            padding: 0;
            font-family: Arial;
        }
            
        a
        {
            text-decoration: none;        
        }
            
        .bg-gradient
        {
            background-image: linear-gradient(to top, rgb(114, 27, 100), rgb(184, 13, 87), rgb(248, 97, 90));
            background-attachment: fixed; 
        }
        
             
        .container
        {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
                
        }
            
        @media(min-width: 319px)
        {
            .container
            {
                width: 230px;
            }
        }
            
        
          @media(min-width: 360px)
            {
                .container
                {
                    width: 290px;
                }
                
                .card
                {
                    width: 100%;
                }
            }
            
            @media(min-width: 565px)
            {
                .container
                {
                    width: 478px;
                    margin-top: -70px;
                }
            }
            
            @media(min-width: 665px)
            {
                .container
                {
                    width: 590px;
                    margin-top: -70px;
                }
            }
            
            @media (min-width: 730px)
           {
                .container 
                {
                    width: 645px;
                }
            }
            
           @media (min-width: 768px)
           {
                .container 
                {
                    width: 675px;
                }
            }
            
            @media (min-width: 800px)
           {
                .container 
                {
                    width: 720px;
                }
            }
            
            @media (min-width: 992px) 
            {
              .container 
                {
                width: 930px;
                }
            }
            @media (min-width: 1360px) 
            {
                .container 
                {
                    width: 1250px;
                }
            }

            
            @media(min-width: 730px)
            {
                .card
                {
                    width: 100%;
                }
            }
        
            
        .h-card /*Card horizontal*/
        {
            border-radius: 8px;
            border: solid;
            padding: 16px;
            border-width: 1px 1px 1px 10px;
            background-color: white;
            width: auto;
            margin:16px;
            z-index: 5;
            box-shadow: 2px 2px 15px 5px rgba(0, 0, 0, 0.2);
        }
            
        
        .bd-green
        {
            border-color: green;
        }
            
        .bd-red
        {
            border-color: red;
        }
        
        .h-card-header
        {
            background-color: red;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-basis: auto;
            margin-bottom: 16px;
        }
            
        .h-card>.h-card-header>.h-card-title
        {
            background-color: green;
            display: block;
            position: sticky;
            ;
            
        }
            
         .h-card>.h-card-header>.h-card-subtitle
        {
             display: flex;
            flex-direction: column;
            justify-content: end;
            
            background-color: aqua;
            margin-top: 5px;
            margin-left: 50px;
            
        }

        table
        {
            width: 100%;
            padding: 7px;
            border-collapse: collapse;
            
        }
         
        th, td
        {
            text-align: left;
            padding: 7px;
            border-bottom: 1px solid #FFF;
            height: 25px;
        }
            
        tr:hover:not(th)
            {
                background-color: rgb(114, 27, 100);
                color: white;
                font-weight: bold;
            }
            
        tr:nth-child(even)
        {
            background-color: wheat;
        }
            
        
        .card>.card-header
        {
            height: 75px;
            padding: 16px;
        }
            
        .card>.card-header>.card-title
        {
            font-style: italic;
            color: darkmagenta;
            font-size: 25px;
            text-align: center
        }
            
        .card>.card-header>.card-subtitle
        {
            margin-top: 10px;
            color: #c1c1c1;
            text-align: justify;
        }
            
        .card>.card-body
        {
            text-transform: uppercase;
            padding: 16px;
        }
        
    
            
            .card
            {
                background-color: white;
                height: auto;
                padding: 16px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                margin-top: 80px;
                z-index: 5;
                box-shadow: 10px 5px 10px 5px rgba(0, 0, 0, 0.2)
            }
            
        .botao
        {
            display: inline-block;
            padding: 6px 12px;
            height: auto;
            border: none;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            line-height: auto;
            
        }
            
        .botao-link
        {
            background-color: rgb(248, 97, 90);
            color: white;
            
        }
            
        .aviso
        {
            border: 1px solid #000; 
            width: auto;
            padding: 7px;
            text-align: center;
            border-radius: 6px;
            height: auto;
            line-height: 25px;
            margin-top: 20px;
            font-weight: bold;
        }
            
        .aviso-gt-zero
        {
            border: 2px solid green;
            color: green;
            background-color: rgb(125, 200, 100);
        }
        
        .aviso-lt-um
        {
            border: 2px solid red;
            color: red;
            background-color: rgb(230, 100, 100);
        }
            
            .linha
            {
                margin-left: -15px;
                margin-right: 15px;
                
            }
        </style>
    </head>
    <body class="bg-gradient">
        
        <div class="container">
            <div class="linha">
            
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Lista de Mercados </h3>
                    
            </div>
            <table>
                <tr>
                    <th>Mercado</th>
                    <th>Munícipio</th>
                    <th>Acessar</th>
                </tr>
                <?php if($stmt->rowCount() > 0) { ?>
                <?php foreach( $stmt as $row ) { ?>
                    
                    <tr>
                        <td><?php echo $row['MERCADO']; ?></td>
                        <td><?php echo $row['MUNICIPIO']; ?></td>
                        <td><a class="botao botao-link" href="dados-mercado.php?id_mercado=<?php echo $row['ID_MERCADO']; ?>">Ver Mercado</a></td>
                    </tr>
                
                   
                <?php } ?>
                    
                <?php } else { 
                    $error;
                 } ?>
                <tr>
                    
                </tr>
            </table>
            <?php if($stmt->rowCount() > 0) { ?>
                <div class="aviso aviso-gt-zero" >Encontrado(s) ao todo <?php echo $stmt->rowCount(); ?> registro(s).</div>
            <?php } else { ?>
                <div class="aviso aviso-lt-um" > Não foram encontrados registros para esse munícipio.</div>
                <?php } ?>
            </div>
        </div>
        </div>
        
    </body>
</html>