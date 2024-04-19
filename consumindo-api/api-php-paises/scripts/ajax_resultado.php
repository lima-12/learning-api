<?php
// header("Content-Type: text/html; charset=ISO-8859-1");

$api = new ApiConsumer();
$country = $_POST['country'];
$info_country = $api->get_country($country);

// echo "<pre>"; print_r($info_country); echo "</pre>"; exit;  

$r = "";
$r .= "
<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-8 card p-5'>
            <h3 class='text-center'> 
                ". $info_country[0]['name']['common'] ." - ". $info_country[0]['capital'][0] ." 
            </h3>



            <div class='container mt-5 mb-5'>
                <div class='row'>
                    <div class='col'>
                        <img src='". $info_country[0]['flags']['png'] ."' alt=''>
                    </div>
                    <div class='col text-right'>
                        <p>região: ".$info_country[0]['region']."</p>
                        <p>sub-região: ".$info_country[0]['subregion']."</p>
                    </div>                    
                </div>
            </div>

            <div class='text-center'>
            FINISH
            </div>
        </div>
    </div>
</div>
";

echo $r;
?>