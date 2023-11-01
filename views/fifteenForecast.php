<?php

include("../controller/fifteenForecastController.php");
include("header.html");
include("menu.html");

echo 
"
<div class='container'>
<div class='padding-top'>
<h2>$forecast->name / $forecast->state - $forecast->country (Previsão para os próximos 15 dias)</h2>";

foreach ($forecast->data as $day) {

    echo 
    "
    <table class=\"forecast table\">
        <caption>
            $day->date_br -  ".$day->text_icon->text->pt."  
        </caption>
        <thead>
            <tr>
                <th>Resumo</th>
                <th>Humidade</th>
                <th>Chuva</th>
                <th>Vento</th>
                <th>UV</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan=\"3\" class=\"resume\">
                <img src='../assets/images/".$day->text_icon->icon->day.".png' /> <br>

                    <b class=\"temp-min\">".$day->temperature->min." °C</b> - 
                    <b class=\"temp-max\">".$day->temperature->max." °C</b> <br>
                    <br>
                    Sensação Térmica <br>
                    <br>
                    <b class=\"temp-min\">".$day->thermal_sensation->min." °C</b> - 
                    <b class=\"temp-max\">".$day->thermal_sensation->max ." °C</b> <br>
                    
                   ". $day->text_icon->text->pt ."
                </td>
                <td>
                    Min: ".$day->humidity->min."% <br>
                    Max: ".$day->humidity->max."%
                </td>
                <td>
                    ".($day->rain->probability ? '<abbr title="Probabilidade de chuva">Prob.</abbr>: '.$day->rain->probability .'% <br>' : '')."
                    ".($day->rain->precipitation  ? '<abbr title="Preciptação">Precip.</abbr>: '.$day->rain->precipitation .'mm' : '')."
                </td>
                <td>
                    Min: ". $day->wind->velocity_min ." km/h <br>
                    Max: ". $day->wind->velocity_max ." km/h <br>
                    Avg: ". $day->wind->velocity_avg ." km/h <br>
                    Rajada max:  ". $day->wind->gust_max ." km/h <br>
                    Direção: ".$day->wind->direction_degrees." ° ( ".$day->wind->direction.") <br>
                </td>
                <td>
                    ".( $day->uv->max ? $day->uv->max : '' )."
                </td> 
            </tr>
            <tr>
                <th>Madrugada</th>
                <th>Manhã</th>
                <th>Tarde</th>
                <th>Noite</th>
            </tr>
            <tr>
                <td>
                    <img src='../assets/images/".$day->text_icon->icon->dawn.".png' /> <br>

                    <b class=\"temp-min\">".$day->temperature->dawn->min." °C</b> - 
                    <b class=\"temp-max\">".$day->temperature->dawn->max."  °C</b> <br>

                    ". $day->text_icon->text->phrase->dawn ."
                </td>
                <td>
                    <img src='../assets/images/".$day->text_icon->icon->morning.".png' /> <br>
                    
                    <b class=\"temp-min\">".$day->temperature->morning->min." °C</b> - 
                    <b class=\"temp-max\">".$day->temperature->morning->max."  °C</b> <br>

                    ". $day->text_icon->text->phrase->morning ."
                   
                </td>
                <td>
                    <img src='../assets/images/".$day->text_icon->icon->afternoon.".png' /> <br>

                    <b class=\"temp-min\">".$day->temperature->afternoon->min."  °C</b> - 
                    <b class=\"temp-max\">".$day->temperature->afternoon->max."  °C</b> <br>

                    ". $day->text_icon->text->phrase->afternoon ."
                </td>
                <td>
                    <img src='../assets/images/".$day->text_icon->icon->night.".png' /> <br>

                    <b class=\"temp-min\">".$day->temperature->night->min."°C</b> - 
                    <b class=\"temp-max\">".$day->temperature->night->max." °C</b> <br>

                    ". $day->text_icon->text->phrase->night ."
                </td>
            </tr>
        </tbody>
    </table> ";
}

" </div>
</div>";
