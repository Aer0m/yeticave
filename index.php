<?php
require_once('functions.php');
require_once('data.php');

$page_content = include_template('index.php',
    ['categories' => $categories,
        'goods' => $goods]);

$layout_content = include_template('layout.php',
    [
        'title_name' => 'Главная',
        'is_auth'=> $is_auth,
        'user_name'=> $user_name,
        'page_content' => $page_content,
        'categories'=> $categories,
        'user_avatar' => $user_avatar
    ]);

print($layout_content);

?>


