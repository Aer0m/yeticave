<?php
require_once ('functions.php');
require 'data.php';
$link = mysqli_connect('127.0.0.1', 'root', '','schema2');
mysqli_set_charset($link,'utf8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];
    $required_fields = ['email', 'password', 'name', 'message'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = 'Пустое поле';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Неверный формат поля';
            $formItemsInvalid['email'] = 'form__item--invalid';
        }
    }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Неверный формат поля';
            $formItemsInvalid['email'] = 'form__item--invalid';
        }
            if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $file_name = $_FILES['avatar']['name'];
                $file_tmpname = $_FILES['avatar']['tmp_name'];
                $file_path = __DIR__ . '/img/';
                $file_type = finfo_file($finfo, $file_tmpname);
                if ($file_type !== 'image/gif') {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $file_path . $file_name);
                }
                $file_url = '/img/' . $file_name;
            }

            if(count($errors!==0)){
            $user = [
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'name' => $_POST['name'],
                'contact' => $_POST['message'],
                'avatar' => $file_url ? 'img/user.jpg' : ''
            ];

                $page_content = include_template('SignUp.php',
                    [
                        'errors' => $errors,
                        'categories' => $categories,
                        'goods' => $goods
                    ]);
    }
            else {
                $sql = "INSERT INTO users(user_name, user_email, user_password, user_signup_date, user_image, user_contact)
        VALUE ('{$user['name']}', '{$user['email']}', '{$user['password']}', '2021.03.26',   '{$user['avatar']}' '{$user['message']}')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header('Location: index.php');
                } else {
                    $errors['email'] = "уже существует";
                    $formItemsInvalid['email'] = 'form__item--invalid';
                    $formInvalid = 'form--invalid';
                }
            }


    header('Location: SignUp.php');
}

else{
     $page_content = include_template('SignUp.php',
        [
            'categories' => $categories,
            'goods' => $goods
        ]);

}

$layout_content = include_template('layout.php',
    [   'page_title' => 'Главная страница',
        'page_content'=>$page_content,
        'categories' =>$categories
    ]);

print($layout_content);

?>