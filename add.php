<?php

require_once('functions.php');
require ('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $required_fields = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = [];
    $lot_name = $_POST['lot-name'] ? : '';
    $category = $_POST['category'] ? : 'Выберите категорию';
    $message = $_POST['message'] ? : '';
    $lot_rate = $_POST['lot-rate'] ? : '';
    $lot_step = $_POST['lot-step'] ? : '';

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "form__item--invalid";
            $form_error = 'form--invalid';
        }

        if ($field == 'lot-rate') {
            if (!filter_var($_POST[$field], FILTER_VALIDATE_INT))
                $errors[$field] = 'начальная цена должна быть корректной';

            if (intval($_POST[$field]) < 0)
                $errors[$field] = 'начальная цена должна быть корректной';

            if ($field == 'lot-step') {
                if (!filter_var($_POST[$field], FILTER_VALIDATE_INT))
                    $errors[$field] = 'Шаг ставки должен быть корректным';
                if (intval($_POST[$field]) < 0)
                    $errors[$field] = 'Начальная цена должна быть корректной';
              }
        }

        if(isset($_FILES['lotPhotos'])) {
            $finfo = finfo_open(FILEINFO_MINE_TYPE);
            $file_name = $_FILES['lotPhotos']['names'];
            $file_path = __DIR__ . '/img/';
            $file_tmpname = $_FILES['lotPhotos']['tmp_name'];
            $file_type = finfo_file($finfo, $file_tmpname);

            if($file_type == 'image/gif')
                move_uploaded_file($_FILES['lotPhotos'][tmp_name], $file_path.$file_name);

            $file_url = '/img' . $file_name;
        }
    }

        if(count($errors) !== 0){
            $page_content = include_template('add.php',
                ['errors' => $errors,
                    'categories' => $categories]);
        } else{
            $lot = [
                "image" => $file_url ? 'img/user.jpg' : '',
                "name" => $_POST['lot-name'],
                "start_price" => $_POST['lot-rate'],
                "rate" => $_POST['lot-step'],
                "timer" => $_POST['lot-date'],
                "category" => $_POST['category'],
                "description" => $_POST['message'],
                "account_id" => $_SESSION['auth']['account_id']
            ];
            $page_content = include_template('add.php',
                [
                    'lot' => $lot,
                    'categories' => $categories,
                    'goods' => $goods,
                    'time_left' => $time_counter]);

            $link =  mysqli_connect('localhost', 'asdasd', 'sdghSDkj34', 'yeticave');
            mysqli_set_charset($link, 'utf8');
            $sql = "SELECT category_id FROM Categories WHERE name = '{$lot['category']}'";
            $result = mysqli_query($link, $sql);
            $lot['category'] = mysqli_fetch_assoc($result)['category_id'];

            $sql = "INSERT INTO lots(lot_user_id, lot_winner_id, lot_name, lot_categ_id, lot_descr_text, lot_image, lot_cr_date,  lot_comp_date, lot_start_price, lot_step)

        VALUE ('12345', '12345','{$lot['name']}', '{$lot['category']}', '{$lot['description']}', '{$lot['image']}', '24.03.2021',  '{$lot['timer']}',  '{$lot['start_price']}', '{$lot['rate']}')";
            $result = mysqli_query($con, $sql);

            if(!$result)
                echo mysqli_error($con);

        }

    }

else{
        $page_content = include_template('add.php',
            [
                'errors' => $errors ?? []
            ]);
    }

    $layout_content = include_template('layout.php',
        [  'content' => $page_content,
            'categories' => $categories
        ]);

    print($layout_content);
