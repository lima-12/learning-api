<?php

class ApiConsumer
{
    private function api($endpoint, $method = 'GET', $post_filds = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://www.omdbapi.com/?t=".$endpoint."+&apikey=5c1b28a9",
            // CURLOPT_URL => "https://api.themoviedb.org/3/movie/".$endpoint."?api_key=67f661592fbeff837924d14167099dfe",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            die(0);
        } else {
            return json_decode($response, true);
        }
    }

    public function get_film($name)
    {
        return $this->api($name);
    }

}