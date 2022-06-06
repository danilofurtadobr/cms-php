<?php

function setFlash($key, $message, $style) {
    if (!isset($_SESSION['flash'][$key])) {
        $_SESSION['flash'][$key] = $message;
        $_SESSION['flash']['style'] = $style;
    }
}

function getFlash($key) {
    if (isset($_SESSION['flash'][$key])) {
        $flash = $_SESSION['flash'][$key];

        unset($_SESSION['flash'][$key]);

        $style = $_SESSION['flash']['style'];

        $template = "<div class='$style' role='alert'>$flash</div>";
        return $template;
    }
}

function setFlashException($key, $message) {
    setFlash(
        key: $key,
        message: $message,
        style: 'alert alert-danger'
    );
}

function setFlashSucess($key, $message) {
    setFlash(
        key: $key,
        message: $message,
        style: 'alert alert-success'
    );
}
