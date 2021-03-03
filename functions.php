<?php
$is_auth = rand(0, 1);

$user_name = 'Aer0m';
$user_avatar = 'img/user.jpg';

$categories = [

    "boardsAndSki" => "Доски и лыжи",
    "fastenings" => "Крепления",
    "boots" => "Ботнки",
    "clothes" => "Одежда",
    "other" => "Разное"
];

$goods = [

    [
        "name" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => 10999,
        "URL_gif" => "img/lot-1.jpg"
    ],

    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "URL_gif" => "img/lot-2.jpg"
    ],

    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "URL_gif" => "img/lot-3.jpg"
    ],

    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботнки",
        "price" => 10999,
        "URL_gif" => "img/lot-4.jpg"
    ],

    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "URL_gif" => "img/lot-5.jpg"
    ],

    [
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "URL_gif" => "img/lot-6.jpg"
    ]

];

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
?>
