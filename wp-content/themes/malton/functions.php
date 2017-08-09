<?php
//Скрываем админ панель на сайте
show_admin_bar(false);
//Разрешаем ниниатюры
add_theme_support( 'post-thumbnails');
//Разные настройки темы
require_once('setting/settings.php');
//Конфигурация размеров загружаемых изображений
require_once('setting/image-sizes.php');
//Регистрация и работы с меню
require_once('setting/menu.php');
//Подключаем стили и скрипты
require_once('setting/styles_and_scripts.php');
//Настройка acf (advanced custom fields)
require_once('setting/acf-init.php');
//Хлебные крошки
require_once('setting/kama_breadcrumbs.php');
//Настройк cf7
require_once('setting/cf7.php');
?>