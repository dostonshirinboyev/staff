<?php

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == TRUE) {
    die(header('Location: user.php'));
}

define('BOT_TOKEN', '6414932243:AAFKz9WwdG2ukHSr9alpkl_d2deujBBl2i8');

if (!isset($_GET['hash'])) {
    die('Telegram hash not found');
}

try {
    echo "<pre>";
    print_r($_GET);
    die();
} catch (Exception $e) {
    die($e->getMessage());
}
