<?
include('./includes/conectaUai.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>UaiVendi Imóveis</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

        <style>
            
            @keyframes animacaoCard {
                from {opacity: 0.1;}
                to {opacity: 1;}
            }

            .carde {
                animation-name: animacaoCard;
                animation-duration: 4s;
            }

            .fonte-small {
                font-size: 0.9em;
                color: #808080;
            }

            .ocultar {
                border: none;
                padding-right: 22px;
                background: url('imagens/seta_baixo.png') no-repeat right center;
                background-size: 20px;
                color: #b59e7a;
                cursor: pointer;
            }

            .ocultar:hover {
                color: #808080;
                text-decoration: none;
            }

            .card {
                border-radius: 0px;
            }

            .card:hover {
                box-shadow:20px 20px 50px grey;
            }
			
            #cidades {
                height: 65px;
            }
			
			#bairros {
                height: 65px;
            }
			
			#tipos {
                height: 65px;
            }
			
			#areas {
                height: 65px;
            }
			
			#dormitorios {
                height: 65px;
            }
			
			#suites {
                height: 65px;
            }
			
			#vagas {
                height: 65px;
            }

            #sessao_primaria {
                background: url('imagens/gyn.jpg') no-repeat center center; 
                background-size: cover;
                height: 500px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            @media (max-width: 575.9px) {

                .subtitulo {
                    font-size: 1.3em;
                }

                #cidades {
                    display: none;
                }
				
				#bairros {
                    display: none;
                }
				
				#tipos {
                    display: none;
                }
				
				#areas {
                    display: none;
                }
				
				#dormitorios {
                    display: none;
                }
				
				#suites {
                    display: none;
                }
				
				#vagas {
                    display: none;
                }

                .titulo-principal {
                    font-size: 1.8em;
                }

            }

            @media (min-width: 576px) {

                .subtitulo {
                    font-size: 1.5em;
                }

                .titulo-principal {
                    font-size: 2.1em;
                }

            }

            @media (min-width: 768px) {

                .subtitulo {
                    font-size: 1.8em;
                }

                .titulo-principal {
                    font-size: 2.5em;
                }
                
            }

            @media (min-width: 992px) {

                .subtitulo {
                    font-size: 2em;
                }

                .titulo-principal {
                    font-size: 3em;
                }

            }

        </style>
    </head>

    <body>

        <?php require "includes/menu_superior_imobiliaria.php"; ?>

        <section id="sessao_primaria">
            <div class="container">
                <p class="text-center display-4 text-white titulo-principal">Vendemos rápido seu imóvel em Goiânia</p>
                <?php require "includes/barra_pesquisa.php"; ?>
            </div>
        </section>

        <!--sessão principal-->
        <section class="pt-4">
            <div class="container-fluid">

                <div class="row">
				<!--Inicio Menu-->
                <div class="col-md-3 col-sm-12">

                    <aside class="border p-3" id="menu-filtro">
                        <p class="display-4 subtitulo" style="font-weight: 380;">Filtrar por</p>
						
						<!--##############Inicio Sessao Cidade###########-->
                        <!--##############Inicio Sessao Cidade###########-->
						<!--##############Inicio Sessao Cidade###########-->
                        <span class="d-block" style="color: #696969">Cidade:</span>

                        <!--mudar id fieldset para outras caixas-->
						
                        <fieldset class="bg-light p-2 mt-1" id="cidades" style="overflow: hidden;">
						
						
					   <?
                            $qmcidade = mysqli_query($conn, "SELECT cidade, count(cidade) as qnt  FROM imoveis where ativo = '1' group by cidade order by qnt desc");
                            while($mcidade = mysqli_fetch_object($qmcidade)) {

                                $qcidade = mysqli_query($conn, "SELECT cod_cidade, nome, codigo_uf FROM cidades where cod_cidade='$mcidade->cidade'");
                                $cidade = mysqli_fetch_object($qcidade);
                        ?>

							<span class="d-block">
                                <input type="checkbox" class="btn-filtro cidades" name="#<?= $mcidade->cidade ?>" id="<?= $mcidade->cidade ?>" value="<?= $cidade->cod_cidade ?>" onclick="filtro(this, 'cidade', <?= $mcidade->cidade ?>), disabilita('cidades', this)">
                                <label for="<?= $mcidade->cidade ?>" class="fonte-small">&nbsp;<?= $cidade->nome ?></label>
                                <label for="<?= $mcidade->cidade ?>" class="float-right fonte-small">(<?= $mcidade->qnt ?>)</label>
                            </span>

                        <?php						
						    }
						?>
						
                            <div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar1" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('cidades', 1)">Ver mais</span>
                        </div>
                        <!--##############FIM Sessao Cidade###########-->
						<!--##############FIM Sessao Cidade###########-->
						<!--##############FIM Sessao Cidade###########-->
                        
                        
                        <!--##############Inicio Sessao Bairro###########-->
                        <!--##############Inicio Sessao Bairro###########-->
						<!--##############Inicio Sessao Bairro###########-->
                        <span class="d-block" style="color: #696969">Bairros:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="bairros" style="overflow: hidden;">
						
					    <?php

                            $qmbairro = mysqli_query($conn, "SELECT bairro, count(bairro) as qnt FROM imoveis where ativo = '1' group by bairro order by qnt desc");
                            while($mbairro = mysqli_fetch_object($qmbairro)) {

                        ?>

							<span class="d-block">
                                <input type="checkbox" class="btn-filtro bairros" name="#<?= $mbairro->bairro ?>" id="<?= $mbairro->bairro ?>" value="<?= $mbairro->bairro ?>" onclick="filtro(this, 'bairro', '<?= $mbairro->bairro ?>'), disabilita('bairros', this)">
                                <label for="<?= $mbairro->bairro ?>" class="fonte-small">&nbsp;<?= $mbairro->bairro ?></label>
                                <label for="<?= $mbairro->bairro ?>" class="float-right fonte-small">(<?= $mbairro->qnt ?>)</label>
                            </span>
                        <?php 						
						    }
						?>

                            <div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar2" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('bairros', 2)">Ver mais</span>
                        </div>
						<!--##############FIM Sessao Bairro###########-->
                        <!--##############FIM Sessao Bairro###########-->
						<!--##############FIM Sessao Bairro###########-->
                        
                        
                        <!--##############Inicio Sessao Tipos###########-->
                        <!--##############Inicio Sessao Tipos###########-->
						<!--##############Inicio Sessao Tipos###########-->
                        <span class="d-block" style="color: #696969">Tipo:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="tipos" style="overflow: hidden;">
						
						
						<?php
                            $qmtipo = mysqli_query($conn, "SELECT tipoImovel, count(tipoImovel) as qnt FROM imoveis where ativo = '1' group by tipoImovel order by qnt desc");
                            while($mtipo = mysqli_fetch_object($qmtipo)) {

                                $qtipo = mysqli_query($conn, "SELECT nome FROM tipoImovel where codTipoImovel='$mtipo->tipoImovel'");
                                $tipo = mysqli_fetch_object($qtipo);
                        ?>
							<span class="d-block">
                            <input type="checkbox" class="btn-filtro tipos" name="#<?= $mtipo->tipoImovel ?>" id="<?= $mtipo->tipoImovel ?>" value="<?= $mtipo->tipoImovel ?>" onclick="filtro(this, 'tipo', <?= $mtipo->tipoImovel ?>), disabilita('tipos', this)">
                                <label for="<?= $mtipo->tipoImovel ?>" class="fonte-small">&nbsp;<?= $tipo->nome ?></label>
                                <label for="<?= $mtipo->tipoImovel ?>" class="float-right fonte-small">(<?= $mtipo->qnt ?>)</label>
                            </span>
                        <?php					
						    }
						?>
						
							<div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar3" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('tipos', 3)">Ver mais</span>
                        </div>
						<!--##############FIM Sessao Bairro###########-->
                        <!--##############FIM Sessao Bairro###########-->
						<!--##############FIM Sessao Bairro###########-->
                        
                        
						<!--##############Início Sessao Areas###########-->
                        <!--##############Início Sessao Areas###########-->
						<!--##############Início Sessao Areas###########-->
                        <span class="d-block" style="color: #696969">Área m²:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="areas" style="overflow: hidden;">
						
						<?
                            $qmarea = mysqli_query($conn, "SELECT codArea, count(codArea) as qnt  FROM imoveis where ativo = '1' group by codArea order by qnt desc");
                            while($marea = mysqli_fetch_object($qmarea)) {

                                $qarea = mysqli_query($conn, "SELECT descricao FROM imoveisAreas where codArea='$marea->codArea'");
                                $area = mysqli_fetch_object($qarea);
                        ?>
							<span class="d-block">
                                <input type="checkbox" class="btn-filtro area" name="#<?= $marea->codArea ?>" id="area<?= $marea->codArea ?>" value="<?= $marea->codArea ?>" onclick="filtro(this, 'area', '<?php echo 'area' . $marea->codArea ?>'), disabilita('area', this)">
                                <label for="area<?= $marea->codArea ?>" class="fonte-small">&nbsp;<?= $area->descricao ?> m²</label>
                                <label for="area<?= $marea->codArea ?>" class="float-right fonte-small">(<?= $marea->qnt ?>)</label>
                            </span>
                        <?php						
						    }
						?>
						
						
                            <div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar4" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('areas', 4)">Ver mais</span>
                        </div>
						<!--##############FIM Sessao Areas###########-->
                        <!--##############FIM Sessao Areas###########-->
						<!--##############FIM Sessao Areas###########-->
                        
                        
                        <!--##############Inicio Sessao Quartos###########-->
                        <!--##############Inicio Sessao Quartos###########-->
						<!--##############Inicio Sessao Quartos###########-->
                        <span class="d-block" style="color: #696969">Quartos:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="dormitorios" style="overflow: hidden;">
						
						
						<?php
                            $qmquartos = mysqli_query($conn, "SELECT quartos, count(quartos) as qnt FROM imoveis where ativo = '1' group by quartos order by qnt desc");
                            while($mquartos = mysqli_fetch_object($qmquartos)) {
                        ?>
							<span class="d-block">
                                <input type="checkbox" class="btn-filtro quartos" name="#<?= $mquartos->quartos ?>quartos" id="<?= $mquartos->quartos ?>quartos" value="<?= $mquartos->quartos ?>" onclick="filtro(this, 'quartos', '<?php echo $mquartos->quartos . 'quartos' ?>'), disabilita('quartos', this)">
                                <label for="<?= $mquartos->quartos ?>quartos" class="fonte-small">&nbsp;<?= $mquartos->quartos ?> quartos</label>
                                <label for="<?= $mquartos->quartos ?>quartos" class="float-right fonte-small">(<?= $mquartos->qnt ?>)</label>
                            </span>
                        <?php					
						    }
						?>
						
						
                            <div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar5" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('dormitorios', 5)">Ver mais</span>
                        </div>
					    <!--##############FIM Sessao Quartos###########-->
                        <!--##############FIM Sessao Quartos###########-->
						<!--##############FIM Sessao Quartos###########-->
                        
                        
                        
                        <!--##############Inicio Sessao Suites###########-->
                        <!--##############Inicio Sessao Suites###########-->
						<!--##############Inicio Sessao Suites###########-->
                        <span class="d-block" style="color: #696969">Suite:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="suites" style="overflow: hidden;">
						
						
						<?php
                            $qmsuites = mysqli_query($conn, "SELECT suites, count(suites) as qnt FROM imoveis where ativo = '1' group by suites order by qnt desc");
                            while($msuites = mysqli_fetch_object($qmsuites)) {
                        ?>
							<span class="d-block">
                                <input type="checkbox" class="btn-filtro suites" name="#<?= $msuites->suites ?>suites" id="<?= $msuites->suites ?>suites" value="<?= $msuites->suites ?>" onclick="filtro(this, 'suite', '<?php echo $msuites->suites.'suites' ?>'), disabilita('suites', this)">
                                <label for="<?= $msuites->suites ?>suites" class="fonte-small">&nbsp;<?= $msuites->suites ?> suites</label>
                                <label for="<?= $msuites->suites ?>suites" class="float-right fonte-small">(<?= $msuites->qnt ?>)</label>
                            </span>
                        <?php
						    }
						?>
						
							<div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar6" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('suites', 6)">Ver mais</span>
                        </div>
						<!--##############FIM Sessao Suites###########-->
                        <!--##############FIM Sessao Suites###########-->
						<!--##############FIM Sessao Suites###########-->
                    
					    <!--##############Início Sessao Vagas###########-->
                        <!--##############Início Sessao Vagas###########-->
						<!--##############Início Sessao Vagas###########-->
                        <span class="d-block" style="color: #696969">Vaga:</span>

                        <!--mudar id fieldset para outras caixas-->
                        <fieldset class="bg-light p-2 mt-1" id="vagas" style="overflow: hidden;">
						
						
						<?php 
                            $qmvagas = mysqli_query($conn, "SELECT vagas, count(vagas) as qnt FROM imoveis where ativo = '1' group by vagas order by qnt desc");
                            while($mvagas = mysqli_fetch_object($qmvagas)) {
                        ?>
							<span class="d-block">
                                <input type="checkbox" class="btn-filtro vagas" name="#<?= $mvagas->vagas ?>vagas" id="<?= $mvagas->vagas ?>vagas" value="<?= $mvagas->vagas ?>" onclick="filtro(this, 'vaga', '<?php echo $mvagas->vagas.'vagas' ?>'), disabilita('vagas', this)">
                                <label for="<?= $mvagas->vagas ?>vagas" class="fonte-small">&nbsp;<?= $mvagas->vagas ?> vagas</label>
                                <label for="<?= $mvagas->vagas ?>vagas" class="float-right fonte-small">(<?= $mvagas->qnt ?>)</label>
                            </span>
                        <?php					
						    }
						?>
						
                            <div class="clearfix"></div>
                        </fieldset>
                        <div class="text-right pt-2">
                            <span id="ocultar7" class="ocultar" style="font-size: 0.9em;" onclick="ocultacao('vagas', 7)">Ver mais</span>
                        </div>
                        <!--##############FIM Sessao Vagas###########-->
                        <!--##############FIM Sessao Vagas###########-->
						<!--##############FIM Sessao Vagas###########-->
                    
                    </aside>

                </div>
				<!--Fim Menu-->

				<!--Inicio Card-->
                <div class="col-md-9 col-sm-12">

                    <!--row cards-->
                    <div class="row" id="linha_cards">

                        <?php
                            $qImoveis = mysqli_query($conn, "SELECT * FROM imoveis order by relevancia desc, dataAtualizacao desc");
                            while($imovel = mysqli_fetch_object($qImoveis)) {

                                $qtipoImovel = mysqli_query($conn, "SELECT nome FROM tipoImovel where codTipoImovel='$imovel->tipoImovel'");
                                $tipoImovel = mysqli_fetch_object($qtipoImovel); 
                        ?>
                
                                <div class="col-lg-4 col-md-6 col-sm-12 pb-3">
                                    <span class="d-inline-block" style="position: relative; top: 36px; z-index: 1; padding: 10px 12px 4px 12px; margin-left: 20px; color: #fff; background: #b59e7a; font-size: 0.9em;"><?= $tipoImovel->nome ?></span>
                                    <div class="card mx-auto" style="width: 100%;">
                                        <img class="card-img-top" src="imovel1.jpg">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: 400;"><?= $imovel->bairro ?></h5>
                                            <h6 class="card-title h4">R$ <?= $imovel->preco ?></h6>
                                            <p class="card-text" style="font-size: 0.9em; color: #808080;"><?= $imovel->tituloImovel ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush" style="font-size: 1em; color: #808080; border: none;">
                                            <li class="list-group-item" style="border: none; padding: 0.10rem 1.25rem;">
                                                <i class="fas fa-bed"></i> <span><?= $imovel->quartos ?></span>
                                                <i class="fas fa-bath ml-2"></i> <span><?= $imovel->banheiros ?></span>
                                                <i class="fas fa-car ml-2"></i> <span><?= $imovel->vagas ?></span>
                                                <i class="fas fa-car ml-2"></i> <span><?= $imovel->area ?>m²</span>
                                            </li>
                                        </ul>
                                        <div class="card-body text-right">
                                            <hr>
                                            <a href="detalhes.php?cod=<?= $imovel->codImovel ?>" class="btn btn-outline-dark" style="font-weight: 500; border: none;">Detalhes <i class="fas fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        ?>
                    
                    </div>

                </div>
                <!--Fim Card-->
				
                </div>
                
            </div>
        </section>

        <?php require "includes/menu_inferior_imobiliaria.php"; ?>

        <script>

            var arrayAutoComplete = Array()

            const autoCompleteJS = new autoComplete({

                placeHolder: "Cidade, bairro ou código",
                threshold: 3,
                data: {
                    src: arrayAutoComplete,
                    cache: true,
                },
                resultItem: {
                    highlight: true,
                    id: "autoComplete_result_[index]",
                },
                events: {

                    input: {
                        selection: (event) => {
                            const selection = event.detail.selection.value;
                            autoCompleteJS.input.value = selection;
                            callFilterTwo(document.getElementById('autoComplete').value)
                        }
                    }
                }

            });

            let ocultacao = (attr, id) => {

                if (attr == 'cidades' || attr == 'bairros' || attr == 'tipos' || attr == 'areas' || attr == 'dormitorios'|| attr == 'suites'|| attr == 'vagas') {
                    
                    if (document.getElementById(attr).offsetHeight == 65 || document.getElementById(attr).offsetHeight == 0) {
                        document.getElementById(attr).style.display = 'block'
                        document.getElementById(attr).style.height = '230px'
                        document.getElementById(attr).style.overflow = 'auto'
                        document.getElementById('ocultar' + id).innerHTML = 'Ver menos'
                        document.getElementById('ocultar' + id).style.background = "url('imagens/seta_cima.png') no-repeat right center";
                        document.getElementById('ocultar' + id).style.backgroundSize = '20px';
                    }

                    else {

                        if (navigator.userAgent.match(/Android/i)
                        || navigator.userAgent.match(/webOS/i)
                        || navigator.userAgent.match(/iPhone/i)
                        || navigator.userAgent.match(/iPad/i)
                        || navigator.userAgent.match(/iPod/i)
                        ){
                            document.getElementById(attr).style.display = 'none'
                        }

                        document.getElementById(attr).style.height = '65px'
                        document.getElementById(attr).style.overflow = 'hidden'
                        document.getElementById('ocultar' + id).innerHTML = 'Ver mais'
                        document.getElementById('ocultar' + id).style.background = "url('imagens/seta_baixo.png') no-repeat right center";
                        document.getElementById('ocultar' + id).style.backgroundSize = '20px';
                    }


                }

            }

            let callFilter = (value) => {

                let filtros = document.getElementsByClassName('tipos')

                for (let x in filtros) {

                    if (filtros[x].checked == true) {
                        filtros[x].click()
                    }

                    setTimeout(function() {

                        if (filtros[x].value == value) {
                            filtros[x].click()
                        }

                    }, 500);
                    
                }

            }

            let callFilterTwo = (value) => {

                if (value.length >= 3 || !isNaN(value)) {

                    let XMLHttp = new XMLHttpRequest()
                    XMLHttp.open('GET', 'includes/retornaFiltro.php?busca=true&valor=' + value)

                    XMLHttp.onreadystatechange = () => {

                        if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {

                            try {

                                let JSONImoveis = XMLHttp.responseText
                                let objJSONImoveis = JSON.parse(JSONImoveis)

                                arrayAutoComplete.length = 0
                            
                                if (objJSONImoveis.length > 0) {
                                    document.getElementById('linha_cards').innerHTML = ''
                                    criaCard(objJSONImoveis)
                                }

                            }

                            catch (error) {
                                console.log('falha na requisição específica, pois o campo está vazio')
                            }

                        }

                    }

                    XMLHttp.send()

                }

                if (value.length == '') {
                    
                    let XMLHttp = new XMLHttpRequest()
                    XMLHttp.open('GET', 'includes/retornaFiltro.php?busca=total&valor=total')

                    XMLHttp.onreadystatechange = () => {

                        if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {

                            let JSONImoveis = XMLHttp.responseText
                            let objJSONImoveis = JSON.parse(JSONImoveis)
                        
                            if (objJSONImoveis.length > 0) {
                                document.getElementById('linha_cards').innerHTML = ''
                                criaCard(objJSONImoveis)
                            }

                        }

                    }

                    XMLHttp.send()
                    
                }

            }
            
            var filtros = Array()
            var tiposFiltros = Array()

            let filtro = (filtro, tipoFiltro, id) => {

                document.getElementById('autoComplete').value = ''

                if (filtro && tipoFiltro && document.getElementById(id).checked) {

                    if (filtros.indexOf(filtro.value) == -1 && tiposFiltros.indexOf(tipoFiltro) == -1) {
                        filtros.push(filtro.value)
                        tiposFiltros.push(tipoFiltro)
                    }

                    let XMLHttp = new XMLHttpRequest()
                    XMLHttp.open('GET', 'includes/retornaFiltro.php?tipoFiltro=' + tiposFiltros + '&filtro=' + filtros)

                    XMLHttp.onreadystatechange = () => {

                        if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {

                            let JSONImoveis = XMLHttp.responseText
                            let objJSONImoveis = JSON.parse(JSONImoveis)

                            if (objJSONImoveis.length > 0) {

                                document.getElementById('linha_cards').innerHTML = ''
                                criaCard(objJSONImoveis)

                            }

                            else {
                                document.getElementById('linha_cards').innerHTML = ''

                                let p = document.createElement('p')
                                p.className = 'text-center display-4 pt-4'
                                p.style.fontSize = '1.4em'
                                p.style.color = '#cccccc'
                                p.style.fontWeight = '400'
                                p.innerHTML = 'Desculpe, nada encontrado no nosso banco de dados com este filtro.'

                                document.getElementById('linha_cards').appendChild(p)

                            }
                            

                        }

                    }

                    XMLHttp.send()

                }

                else if (filtro && tipoFiltro && document.getElementById(id).checked == false) {

                    if (filtros.indexOf(filtro.value) != -1 && tiposFiltros.indexOf(tipoFiltro) != -1) {
                        filtros.splice(filtros.indexOf(filtro.value), 1)
                        tiposFiltros.splice(tiposFiltros.indexOf(tipoFiltro), 1)
                    }

                    let btns = document.getElementsByClassName('btn-filtro')
                    let retorno = true

                    for (let i in btns) {

                        if (btns[i].checked == true) {
                            retorno = false
                            break 
                        }

                    }

                    if (retorno) {
                        filtros.push('retornoTotal')
                        tiposFiltros.push('retornoTotal')
                    }
                    
                    let XMLHttp = new XMLHttpRequest()
                    XMLHttp.open('GET', 'includes/retornaFiltro.php?tipoFiltro=' + tiposFiltros + '&filtro=' + filtros)

                    XMLHttp.onreadystatechange = () => {
                        
                        if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {

                            try {
                                let JSONImoveis = XMLHttp.responseText
                                let objJSONImoveis = JSON.parse(JSONImoveis)

                                if (objJSONImoveis.length > 0) {
                                    document.getElementById('linha_cards').innerHTML = ''
                                    criaCard(objJSONImoveis)
                                }
                            }

                            catch (erro) {
                                console.log(erro + ': Sem retorno JSON para esta requisição.')
                            }
                            
                        }

                    }

                    XMLHttp.send()

                }

            }

            let criaCard = (objJSONImoveis) => {

                for (let x in objJSONImoveis) {

                    if (arrayAutoComplete.indexOf(objJSONImoveis[x].cidade) == -1) {
                        arrayAutoComplete.push(objJSONImoveis[x].cidade)                        
                    }

                    if (arrayAutoComplete.indexOf(objJSONImoveis[x].bairro) == -1) {
                        arrayAutoComplete.push(objJSONImoveis[x].bairro)
                    }

                    if (arrayAutoComplete.indexOf(objJSONImoveis[x].codImovel) == -1) {
                        arrayAutoComplete.push(objJSONImoveis[x].codImovel)
                    }

                    let divCol = document.createElement('div')
                    divCol.className = 'col-lg-4 col-md-6 col-sm-12 pb-3'

                    let span = document.createElement('span')
                    span.className = 'd-inline-block carde'
                    span.style.position = 'relative'
                    span.style.top = '36px'
                    span.style.zIndex = '1'
                    span.style.padding = '10px 12px 4px 12px'
                    span.style.marginLeft = '20px'
                    span.style.color = '#fff'
                    span.style.background = '#b59e7a'
                    span.style.fontSize = '0.9em'
                    span.innerHTML = objJSONImoveis[x].tipo

                    let divCard = document.createElement('div')
                    divCard.className = 'card mx-auto carde'
                    divCard.style.width = '100%'

                    divCol.appendChild(span)
                    divCol.appendChild(divCard)

                    let img = document.createElement('img')
                    img.className = 'card-img-top'
                    img.src = 'imovel1.jpg' //IMAGEM SERÁ ALTERADA PARA DINÂMICA

                    let cardBody = document.createElement('div')
                    cardBody.className = 'card-body'

                    divCard.appendChild(img)
                    divCard.appendChild(cardBody)

                    let h5 = document.createElement('h5')
                    h5.className = 'card-title'
                    h5.style.fontWeight = '400'
                    h5.innerHTML = objJSONImoveis[x].bairro

                    let h6 = document.createElement('h6')
                    h6.className = 'card-title h4'
                    h6.innerHTML = 'R$ ' + objJSONImoveis[x].preco

                    let p = document.createElement('p')
                    p.className = 'card-text'
                    p.style.fontSize = '0.9em'
                    p.style.color = '#808080'
                    p.innerHTML = objJSONImoveis[x].tituloImovel

                    cardBody.appendChild(h5)
                    cardBody.appendChild(h6)
                    cardBody.appendChild(p)

                    let ul = document.createElement('ul')
                    ul.className = 'list-group list-group-flush'
                    ul.style.fontSize = '1em'
                    ul.style.color = '#808080'
                    ul.style.border = 'none'

                    divCard.appendChild(ul)

                    let li = document.createElement('li')
                    li.className = 'list-group-item'
                    li.style.border = 'none'
                    li.style.padding = '0.10rem 1.25rem'

                    ul.appendChild(li)

                    let i1 = document.createElement('i')
                    i1.className = 'fas fa-bed'

                    let s1 = document.createElement('span')
                    s1.innerHTML = ' ' + objJSONImoveis[x].quartos

                    let i2 = document.createElement('i')
                    i2.className = 'fas fa-bath ml-2'

                    let s2 = document.createElement('span')
                    s2.innerHTML = ' ' + objJSONImoveis[x].banheiros                                

                    let i3 = document.createElement('i')
                    i3.className = 'fas fa-car ml-2'

                    let s3 = document.createElement('span')
                    s3.innerHTML = ' ' + objJSONImoveis[x].vagas

                    let i4 = document.createElement('i')
                    i4.className = 'fas fa-car ml-2'

                    let s4 = document.createElement('span')
                    s4.innerHTML = ' ' + objJSONImoveis[x].area + 'm²'

                    li.appendChild(i1)
                    li.appendChild(s1)

                    li.appendChild(i2)
                    li.appendChild(s2)

                    li.appendChild(i3)
                    li.appendChild(s3)

                    li.appendChild(i4)
                    li.appendChild(s4)

                    let divBotao = document.createElement('div')
                    divBotao.className = 'card-body text-right'

                    divCard.appendChild(divBotao)

                    let hr = document.createElement('hr')

                    let a = document.createElement('a')
                    a.href = 'detalhes.php?cod=' + objJSONImoveis[x].codImovel
                    a.className = 'btn btn-outline-dark'
                    a.style.fontWeight = '500'
                    a.style.border = 'none'
                    a.innerHTML = 'Detalhes '

                    divBotao.appendChild(hr)
                    divBotao.appendChild(a)

                    let iA = document.createElement('i')
                    iA.className = 'fas fa-angle-right'

                    a.appendChild(iA)

                    document.getElementById('linha_cards').appendChild(divCol)
                }
            }

            let disabilita = (classe, id) => {

                let btns = document.getElementsByClassName(classe)

                if (id.checked == true) {
                    for (let x in btns) {
                        btns[x].disabled = true
                    }

                    document.getElementById(id.id).disabled = false
                }

                else {
                    for (let x in btns) {
                        btns[x].disabled = false
                    }
                }

            }

        </script>

    </body>

</html>