<?php 

    if (isset($_GET) && !empty($_GET['tipoFiltro']) && !empty($_GET['filtro'])) {

        $filtros = explode(",", $_GET['filtro']);
        $tipoFiltros = explode(",", $_GET['tipoFiltro']);

        require "conectaUai.php";
        
        $query = 'SELECT 
            tipoImovel.nome, imoveis.codImovel, imoveis.bairro, imoveis.preco, imoveis.tituloImovel, imoveis.quartos, 
            imoveis.banheiros, imoveis.vagas, imoveis.area 
            FROM imoveis 
            LEFT JOIN tipoImovel ON (tipoImovel.codTipoImovel = imoveis.tipoImovel) 
            WHERE ativo = 1 ';


        for ($j = 0; $j < count($tipoFiltros); $j++) {

            switch($tipoFiltros[$j]) {

                case 'cidade':
                    $query = $query . "AND imoveis.cidade = $filtros[$j] ";
                    break;

                case 'bairro':
                    $query = $query . "AND imoveis.bairro LIKE '%$filtros[$j]%' ";
                    break;

                case 'tipo':
                    $query = $query . "AND imoveis.tipoImovel LIKE '%$filtros[$j]%' ";
                    break;

                case 'area':
                    $query = $query . "AND imoveis.codArea = $filtros[$j] ";
                    break;

                case 'quartos':
                    $query = $query . "AND imoveis.quartos = $filtros[$j] ";
                    break;

                case 'suite':
                    $query = $query . "AND imoveis.suites = $filtros[$j] ";
                    break;
                
                case 'vaga':
                    $query = $query . "AND imoveis.vagas = $filtros[$j] ";
                    break;

                case 'retornoTotal':
                    $query = $query;
                    break;

            }  

        }      
            
        $conexao = mysqli_query($conn, $query);
        $arrayImoveis = Array();

        while ($imoveis = mysqli_fetch_object($conexao)) {

            array_push($arrayImoveis, Array('codImovel' => $imoveis->codImovel, 'tipo' => $imoveis->nome, 'bairro' => $imoveis->bairro, 
            'preco' => $imoveis->preco, 'tituloImovel' => $imoveis->tituloImovel, 'quartos' => $imoveis->quartos, 
            'banheiros' => $imoveis->banheiros, 'vagas' => $imoveis->vagas, 'area' => $imoveis->area));

        }

        $conn->close();

        echo json_encode($arrayImoveis);

    }

    else if (isset($_GET) && !empty($_GET['busca']) && !empty($_GET['valor'])) {

        require "conectaUai.php";

        $arrayImoveisFiltro = Array();

        try {

            if ($_GET['busca'] == 'total' && $_GET['valor'] == 'total') {

                $query2 = "SELECT 
                    tipoImovel.nome, imoveis.codImovel, imoveis.bairro, imoveis.preco, imoveis.tituloImovel, imoveis.quartos, 
                    imoveis.banheiros, imoveis.vagas, imoveis.area 
                    FROM imoveis 
                    LEFT JOIN tipoImovel ON (tipoImovel.codTipoImovel = imoveis.tipoImovel) 
                    LEFT JOIN cidades ON (cidades.cod_cidade = imoveis.cidade)
                    WHERE ativo = 1
                ";

            }

            else {

                $query2 = "SELECT 
                    cidades.nome as nomeCidade, tipoImovel.nome, imoveis.codImovel, imoveis.bairro, imoveis.preco, imoveis.tituloImovel, imoveis.quartos, 
                    imoveis.banheiros, imoveis.vagas, imoveis.area 
                    FROM imoveis 
                    LEFT JOIN tipoImovel ON (tipoImovel.codTipoImovel = imoveis.tipoImovel) 
                    LEFT JOIN cidades ON (cidades.cod_cidade = imoveis.cidade)
                    WHERE ativo = 1
                    AND cidades.nome LIKE '%{$_GET['valor']}%' 
                    OR imoveis.bairro LIKE '%{$_GET['valor']}%' 
                    OR imoveis.codImovel LIKE '%{$_GET['valor']}%'
                ";

            }

            $conexao2 = mysqli_query($conn, $query2);

        }

        catch (Error $e) {
            echo $e;
        }

        while ($imoveisFiltro = mysqli_fetch_object($conexao2)) {
            array_push($arrayImoveisFiltro, Array('codImovel' => $imoveisFiltro->codImovel, 'tipo' => $imoveisFiltro->nome, 'bairro' => $imoveisFiltro->bairro, 
            'preco' => $imoveisFiltro->preco, 'tituloImovel' => $imoveisFiltro->tituloImovel, 'quartos' => $imoveisFiltro->quartos, 
            'banheiros' => $imoveisFiltro->banheiros, 'vagas' => $imoveisFiltro->vagas, 'area' => $imoveisFiltro->area, 'cidade' => $imoveisFiltro->nomeCidade));
        }

        $conn->close();

        echo json_encode($arrayImoveisFiltro);

    }