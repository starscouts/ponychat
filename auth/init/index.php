<?php

$server = "auth.equestria.horse";

header("Location: https://$server/hub/api/rest/oauth2/auth?client_id=" . json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/app.json"), true)["oauth"]["id"] . "&response_type=code&redirect_uri=https://chat.equestria.dev/auth/callback&scope=Hub&request_credentials=default&access_type=offline");
die();
