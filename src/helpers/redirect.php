<?php

function redirect($to) {
    return header('Location: ' . $to);
}

function setExceptionMessageAndRedirect($key, $message, $redirectTo) {
    setFlashException($key, $message);
    return redirect($redirectTo);
}
