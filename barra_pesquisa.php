
<style>

    /*sobrescrita do css input autocomplete*/
    ul {
        list-style-type: none;
        border: 1px solid #DCDCDC;
        margin: 0px;
        padding: 6px 4px;
    }

    li {
        border-bottom: 1px solid #DCDCDC;
        display: block;
        text-align: left;
        cursor: pointer;
    }

    /*fim sobrescrita do css input autocomplete*/

    #fieldset {
        padding: 30px 15px 10px 15px;
        background: #fff;

        <?php if(basename($_SERVER['PHP_SELF'],'.php') == 'index') { ?>
            border-radius: 10px;
        <?php } ?>

        <?php if(basename($_SERVER['PHP_SELF'],'.php') != 'index') { ?>
            background: #f8ede2;
        <?php } ?>
    }

    @media (max-width: 575.9px) {
        #menu-filtro {
            margin-bottom: 20px;
        }

        #tipo_imovel, #autoComplete {
            width: 100%;
            margin-bottom: 7px;
        }

        .input-group {
            display: block;
        }
    }

    @media (min-width: 576px) {
        #menu-filtro {
            margin-bottom: 20px;
        }

        #autoComplete {
            width: 240px;
            border-radius: 0px 0.25rem 0.25rem 0px;
        }
    }

    @media (min-width: 768px) {
        #autoComplete {
            width: 330px;
        }
    }

    @media (min-width: 992px) {
        #autoComplete {
            width: 450px;
        }
    }

    @media (min-width: 1200px) {
        #autoComplete {
            width: 540px;
        }
    }

</style>

<!--autocomplete API-->
<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/autoComplete.min.js"></script>

<fieldset id="fieldset">
    <?php if(basename($_SERVER['PHP_SELF'],'.php') != 'index') { ?>
        <div class="container">
    <?php } ?>
    <form method="post" action="#">
        
        <div class="input-group mb-3">
            <select name="tipo_imovel" id="tipo_imovel" class="form-control" aria-describedby="button-addon2" onchange="callFilter(this.value)">
			<?

                echo "<option value=\"0\">Todos</option>";
                $qtipoImovel = mysqli_query($conn, "SELECT * FROM tipoImovel order by prioridade desc, nome asc");

                while($tipoImovel = mysqli_fetch_object($qtipoImovel)) {

                    echo "<option value=\"$tipoImovel->codTipoImovel\"";
                    if ($_POST[tipo_imovel]==$tipoImovel->codTipoImovel) {echo " selected";}
                    echo ">$tipoImovel->nome</option>";
            
                }
			
			?>               
            </select>

            <input type="text" name="localizacao_imovel" id="autoComplete" class="form-control" placeholder="Cidade, bairro ou código" aria-describedby="button-addon2" onkeyup="callFilterTwo(this.value)">

        </div>
    </form>
    <?php if(basename($_SERVER['PHP_SELF'],'.php') != 'index') { ?>
    </div>
    <?php } ?>
</fieldset>
