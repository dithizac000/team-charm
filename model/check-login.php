<?php

$inputEmail = $_POST['inputEmail'] ?? '';
$inputPassword = $_POST['inputPassword'] ?? '';

$ok = true;
$messages = array();

if ( !isset($inputEmail) || empty($inputEmail) ) {
    $ok = false;
    $messages[] = 'inputEmail cannot be empty!';
}

if ( !isset($inputPassword) || empty($inputPassword) ) {
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}

if ($ok) {
    if ($inputEmail === 'dcode' && $inputPassword === 'dcode') {
        $ok = true;
        $messages[] = 'Successful login!';
    } else {
        $ok = false;
        $messages[] = 'Incorrect email/password combination!';
    }
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);

