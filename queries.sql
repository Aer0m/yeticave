INSERT INTO categories set categ_id = "1", categ_name ="Доски и лыжи";
INSERT INTO categories set categ_id = "2", categ_name ="Крепления";
INSERT INTO categories set categ_id = "3", categ_name ="Ботинки";
INSERT INTO categories set categ_id = "4", categ_name ="Одежда";
INSERT INTO categories set categ_id = "5", categ_name ="Инструменты";
INSERT INTO categories set categ_id = "6", categ_name ="Разное";

INSERT INTO users set user_id = "67458", user_name = "Александр", user_email = "shdkfjh123@gamil.com", user_password = "Sjdflkj36743", user_signup_date = "17.03.2021", user_image = "img/user.png", user_contact = "qweqweasd";
INSERT INTO users set user_id = "78905", user_name = "Елена", user_email = "Sergey12@mail.ru", user_password = "Aaasdasd6845", user_signup_date = "17.03.2021", user_image = "img/user.png", user_contact = "qwerty";

INSERT INTO lots set lot_name = "2014 Rossignol District Snowboard", lot_descr_text = "текст номер 1", lot_image = "img/lot-1.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "10999";
INSERT INTO lots set lot_name = "DC Ply Mens 2016/2017 Snowboard", lot_descr_text = "текст номер 2", lot_image = "img/lot-2.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "159999";
INSERT INTO lots set lot_name = "Крепления Union Contact Pro 2015 года размер L/XL", lot_descr_text = "текст номер 3", lot_image = "img/lot-3.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "8000";
INSERT INTO lots set lot_name = "Ботинки для сноуборда DC Mutiny Charocal", lot_descr_text = "текст номер 4", lot_image = "img/lot-4.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "10999";
INSERT INTO lots set lot_name = "Куртка для сноуборда DC Mutiny Charocal", lot_descr_text = "текст номер 5", lot_image = "img/lot-5.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "7500";
INSERT INTO lots set lot_name = "Маска Oakley Canopy", lot_descr_text = "текст номер 6", lot_image = "img/lot-6.jpg", lot_cr_date = "03.03.2021", lot_comp_date = "04.03.2021", lot_start_price = "5400";

INSERT INTO rate set rate_id = "1", lot_id="1", rate_date = "04.03.2021", rate_price = "15000";
INSERT INTO rate set rate_id = "2", lot_id="1", rate_date = "04.03.2021", rate_price = "19000";

SELECT * FROM lots WHERE lot_cr_date > SUBDATE(now(),0);
UPDATE lots SET lot_name = "update lots name" WHERE lot_id="1";
SELECT lot_id FROM rate WHERE rate_date > SUBDATE(now(),0);
