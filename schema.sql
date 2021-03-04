CREATE TABLE categories(
                           categ_id int AUTO_INCREMENT PRIMARY KEY,
                           categ_name varchar(50)
);
create UNIQUE INDEX categ_name on categories(categ_name);

CREATE TABLE lots(
                     lot_id int AUTO_INCREMENT PRIMARY KEY,
                     lot_user_id int,
                     lot_winner_id int,
                     lot_name varchar(100),
                     lot_categ_id int,
                     lot_descr_text text,
                     lot_image text,
                     lot_cr_date datetime,
                     lot_comp_date datetime,
                     lot_start_price int,
                     lot_step int
);
create UNIQUE INDEX categ_index on lots(lot_categ_id);
create UNIQUE INDEX user_index on lots(lot_user_id);
create UNIQUE INDEX winner_index on lots(lot_winner_id);

CREATE TABLE  users(
                       user_id int AUTO_INCREMENT PRIMARY KEY,
                       user_name varchar(100),
                       user_email varchar(100),
                       user_password varchar(50),
                       user_signup_date date,
                       user_image text,
                       user_contact varchar(18)
);
create UNIQUE INDEX user_name on users(user_name);
create UNIQUE INDEX user_email on users(user_email);

CREATE TABLE rate(
                     rate_id int PRIMARY KEY AUTO_INCREMENT,
                     lot_id int,
                     user_id int,
                     rate_date datetime,
                     rate_price int
);
CREATE INDEX rate_lot_index on rate(lot_id);
CREATE INDEX rate_user_index on rate(user_id);

ALTER TABLE lots
    ADD CONSTRAINT lots_fk1 FOREIGN KEY (lot_user_id) REFERENCES users(user_id);
ALTER TABLE lots
    ADD CONSTRAINT lots_fk2 FOREIGN KEY (lot_categ_id) REFERENCES categories(categ_id);
ALTER TABLE lots
    ADD CONSTRAINT lots_fk3 FOREIGN KEY (lot_winner_id) REFERENCES users(user_id);

ALTER TABLE rate
    ADD CONSTRAINT rate_fk1 FOREIGN KEY (user_id) REFERENCES users(user_id);
