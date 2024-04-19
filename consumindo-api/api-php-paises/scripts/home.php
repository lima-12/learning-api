<?php
defined('CONTROL') or die('acesso inválido');
// die("teste");
$api = new ApiConsumer();
$all_countries = $api->get_all_countries();
// $brazil = $api->get_country('brazil');   

// echo'<pre>'; print_r($all_countries); die();

?>

<div class="container mt-5">

    <div class="row">
        <div class="col text-center">
            <h3>PAÍSES DO MUNDO</h3>
            <hr>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-4">
            <p class="text-center">Lista de países</p>
            <form action="ajax_resultado.php" method="post" id="myForm">
                <select id="select_country" class="form-select">
                    <option value=""> selecione um país </option>
                    <?php foreach($all_countries as $country){ ?>
                            <option value="<?= $country ?>"> <?= $country ?> </option>
                    <?php } ?>
                </select>

                <!-- <div class="text-center">
                    <button type="submit" id="btnPesquisar" class="btn btn-success mt-2 p-1 w-25"><i class="bi bi-search"></i> Pesquisar</button>
                </div> -->
            </form>
        </div>
    </div>

    <div class="row" id="resultadoDiv">

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    const select_country = document.querySelector("#select_country");

    // Manipulador de mudança de país
    select_country.addEventListener('change', () => {
        const country = select_country.value;
        console.log(country);

        // Chama a função AJAX apenas se o país for válido (não vazio)
        if (country) {
            $.ajax({
                type: "POST",
                url: "?route=ajax_resultado",
                data: { country: country },
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