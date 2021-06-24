<?php
    require('conexao.php');

    try
    {
        $minQuery = "SELECT MUNICIPIO FROM cpl_MUNICIPIO ORDER BY MUNICIPIO";

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
            
        .bg-gradient
        {
            background-image: linear-gradient(to top, rgb(114, 27, 100), rgb(184, 13, 87), rgb(248, 97, 90));
            background-attachment: fixed; 
        }
        
        .card
        {
            background-color: white;
            height: auto;
            padding: 16px;
            width: auto;
            margin-top: 115px;
            z-index: 1;
            box-shadow: 10px 5px 10px 5px rgba(0, 0, 0, 0.2);
             
        }
            
            
            
        /*Container*/
             
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
                
            
            
        /*Fim Container*/
            
        /*Bordas*/
            
        .sqr-border
        {
            border: 1px solid #000;
        }
            
        .card>.card-divider
        {
            border: 1px solid #c6c6c6;
            margin-left: 16px;
            margin-right: 16px;
            
        }
            
        .round-border
        {
            border: solid 1px #000;
            border-radius: 16px;
        }
            
            
            
        @media (min-width: 1350px)
        {
             
            .card{
                width: auto;;
            }
        }
            
        .botao
        {
            height: 35px;
            border: none;
            font-weight: bold;
            font-size: 18px;
        }
            
        .botao-padrao
        {
            background-color: #FFF;
            border: 1px solid #000;
            
        }
        
        .botao-home
        {
            border: none;
            background-color: rgb(248,97,90);
            color: white;
            
        }
            
        .botao-home:hover
        {
            background-color: rgb(248, 150, 90);
            transition-duration: 1s;
            
        }
            
        .botao-padrao:hover
        {
            background-color: #000;
            border: 1px solid #FFF;
            font-weight: bold;
            color: #FFF;
            transition-duration: 1s;
            
        }
            
        .form-grupo
        {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }
            
        .form-grupo>label
        {
            margin-bottom: 1rem;
                
        }
            
        select.input-select
        {
            padding: 8px;
            text-transform: uppercase;
            border: 1px solid #FFF;
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
            
            .
        
        .logo
        {
            
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: 50px;
            
        }
            
        .logo>img
        {
            width: 120px;    
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
                
                <div class="logo">
                    <img src="balanca.png">
                </div>
                
                <div class="card-header">
                    <h3 class="card-title">Compare Preços - Litoral </h3>
                    
                </div>
                
                
                <div class="card-body">
                    <form method="post" action="mercados-encontrados.php">
                        <div class="form-grupo">
                        

                            <select name="selectMunicipio" class="input-select">
                                <option value="">Selecione um município...</option>
                                <?php if($stmt->rowCount() > 0) { ?>
                                <?php foreach( $stmt as $row ) { ?>
                                <option value="<?php echo $row['MUNICIPIO']; ?>"><?php echo $row['MUNICIPIO']; ?></option>
                                <?php } } ?>
                                <option value="Todos">Todos</option>
                                
                                
                            </select>
                        </div>
                        
                        <div class="form-grupo">
                        <button type="submit" class="botao botao-home" type="submit">
                            Pesquisar
                        </button>
                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
            
        </div>
        
    </body>
</html>
