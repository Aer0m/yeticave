<nav class="nav">
    <ul class="nav__list container">


            <!--заполните этот список из массива категорий-->
            <?php foreach ($categories as $item): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="pages/all-lots.html"><?=$item['categ_name'];?></a>
                </li>
            <?php endforeach; ?>

    </ul>
</nav>
<form class="form form--add-lot container  <?=$form_error; ?>" action="add.php" enctype="multipart/form-data" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?=$name_error; ?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$lot_name; ?>" required>
            <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?= empty($errors['category'])? "" : "form__item--invalid"  ?>">
            <label for="category">Категория <sup>*</sup></label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <?php foreach ($categories as $val):?>
                <option><?=$val['categ_name'];?></option>
                <?php endforeach;?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <div class="form__item form__item--wide <?= empty($errors['message'])? "" : "form__item--invalid"?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" ></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="lot-img" value="">
            <label for="lot-img">
                Добавить
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= empty($errors['lot-rate'])? "" : "form__item--invalid"  ?>">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="lot-rate" type="text" name="lot-rate" placeholder="0">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small <?= empty($errors['lot-step'])? "" : "form__item--invalid"  ?>">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="lot-step" type="text" name="lot-step" placeholder="0">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?= empty($errors['lot-date'])? "" : "form__item--invalid"  ?>">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
