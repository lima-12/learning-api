<?php

$api = new ApiConsumerFilmes();

$aFilme = $api->get_film($_POST['filme']);

// echo "<pre>"; print_r($aFilme); echo "</pre>"; exit;
?>

<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-8 card p-5'>
            <h3 class='text-center'> 
                <?= $aFilme["Title"] ?>
            </h3>



            <div class='container mt-5 mb-5'>
                <div class='row'>
                    <div class='col'>
                        <img src='<?= $aFilme["Poster"] ?>' alt=''>
                    </div>
                    <div class='col text-right'>
                        <p>Ano: <?= $aFilme["Year"]; ?></p>
                        <p>Duração: <?= $aFilme["Runtime"]; ?></p>
                        <p>Nota <?= $aFilme["Ratings"][1]["Source"]; ?>: <?= $aFilme["Ratings"][1]["Value"];?></p>
                    </div>                    
                </div>
            </div>

            <div class='text-center'>
            FINISH
            </div>
        </div>
    </div>
</div>