<?php

global $isLoggedIn;
global $_PROFILE;

$isLoggedIn = false;

if (isset($_COOKIE['CHAT_SESSION_TOKEN'])) {
    if (!(str_contains($_COOKIE['CHAT_SESSION_TOKEN'], ".") || str_contains($_COOKIE['CHAT_SESSION_TOKEN'], "/") || trim($_COOKIE["CHAT_SESSION_TOKEN"]) === "")) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['CHAT_SESSION_TOKEN'])))) {
            $_PROFILE = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/tokens/" . str_replace(".", "", str_replace("/", "", $_COOKIE['CHAT_SESSION_TOKEN']))), true);

            $isLoggedIn = true;
        }
    }
}

if (!$isLoggedIn) {
    header("Location: /auth/init");
    die();
}