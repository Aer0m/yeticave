<?php
require_once ('functions.php');
require ('data.php');

$lotID = intval($_GET['id']);

echo $lotID;

$currentLot = null;
if (isset($_Get['id'])) {
    $lotID = intval($_GET['id']);
    foreach ($goods as $lot) {
        if (intval($lot['id']) === $lotID) {
            $currentLot = $lot;
            break;
        }
    }
}
if (!$goods[$lotID]){
http_response_code(404);
    exit;
}

$page_content = compile_template('lot.php',
    [   'categories' => $categories,
        'lot' => $currentLot,
        'lotID' => $lotID,
        'goods' => $goods,
        'time_left' => $time_left]);
$layout_content = compilte_template('lot.php',
    [   'page_title' => 'Главная страница',
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'page_content' => $page_content,
        'categories' => $categories]);

print($layout_content);
