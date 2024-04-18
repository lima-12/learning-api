<?php
defined('CONTROL') or die('acesso inválido');

$api = new ApiConsumer();
// $name = $api->get_film("hulk");
// $brazil = $api->get_country('brazil');   

// echo'<pre>'; print_r($name); exit;

?>

<div class="container mt-5">

    <div class="row">
        <div class="col text-center">
            <h3>FILMES</h3>
            <hr>
        </div>
    </div>


            <p class="text-center">pesquise um filme</p>

            <form onsubmit="return false">

                <div class="row justify-content-center">
                    <div class="col-4">
                        <input class="form-control" id="filme" name="filme" type="search" placeholder="Digite o nome do Filme">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" id="pesquisar" type="submit">Pesquisar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="row" id="resultadoDiv">

    </div>

</div>

<script>

    $(document).ready(function() {

        $("#pesquisar").click(function(){

            const filme = $("#filme").val()

            // Chama a função AJAX apenas se o país for válido (não vazio)
            if (filme) {
                $.ajax({
                    type: "POST",
                    url: "?route=ajax_resultado",
                    data: { 
                        filme: filme 
                    },
                    dataType:"html",
                    success: function(response) {
                        // Verifica se a resposta não está vazia antes de atualizar o conteúdo
                        if (response.trim() !== "") {
                            $("#resultadoDiv").html(response);
                        } else {
                            console.error("A resposta da solicitação AJAX está vazia.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Erro na solicitação AJAX:", error);
                    }
                });
            }

        });

    });



</script>