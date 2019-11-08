<?php

class Weather {

    function getWeather()
    {
        $api = new RestClient([
            'base_url' => "https://api.openweathermap.org/data/2.5",
        ]);
        $result = $api->get("weather", ['q' => "Kyiv", 'appid' => 'ec79dba7b928f241635e07f39711994c', 'units' => 'metric']);
        if($result->info->http_code == 200) {
            $response = $result->decode_response();
            file_put_contents('weather.txt', 'Kyiv ' . $response->main->temp . '°C' . PHP_EOL);
        }

    }
}
