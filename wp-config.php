<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'newcity');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WlXa[6;f0_-gt8UEV8ft>pn*f9n}WF,5EH$n[m61f{*s;gbsb3H0^!MP)>2d+k&&');
define('SECURE_AUTH_KEY',  '>sASiu]j/_SD}Qh=Hs#.[j?@wGsjq=~.Q6>%`-Ssyk.aX(vv.`/S[(nT`TdQbtDt');
define('LOGGED_IN_KEY',    'Xcv-^5Ysr,`G2h9h`-m+:0TSB.)VZ-SZc:{ti0r, {r3}K@]u|;_=1v+ 6][}mlL');
define('NONCE_KEY',        'ea#W`%L#Sl5H0$]}7YKhA)+/rUR/ap7=BcrWL^fn(rV>POD:I[kgW9gBB )/CiI_');
define('AUTH_SALT',        'C)|!xZJ.MI=0 e ;MOiWs/dat(MxH+|!8.u&wgkk{6(E]GIf^o+lUH.>e,Q2dcYt');
define('SECURE_AUTH_SALT', '-3h!a%l%UAo4.AWs9eK-z7_.JUGH]ErA_eE$a9!:J@`idU~~abeL?Kw4B*oZ?s_{');
define('LOGGED_IN_SALT',   'T6|@-l|UN+,:kf; 0&,Ll9Su7i?LOefIkNIK>hu+lVr1.p}I7BR?^-]_l@lSQLDJ');
define('NONCE_SALT',       '@i|m7$aUEMyZQU5]Z)PA5+onocT^tKvQ}h],a2~nHduhH%P%{.1TH34n84SB5V^?');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
