<?php

function sumFormat($value)
{

    $value = ceil($value);

    if ($value < 1000)
        return $value . '<b class=\"rub\">₽</b>';

    elseif ($value >= 1000) {

        $value = number_format($value, 0, '.', ' ');
        return $value . '<b class=\"rub\">₽</b>';
    }

}

function time_counter() {

    $time_left = strtotime("tomorrow") - strtotime("now");
    $hours = floor($time_left/3600);
    $minutes = floor(($time_left%3600)/60);
    $time_left = sprintf("%02d:%02d",$hours,$minutes);

    return $time_left;
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}

