<?php
require_once dirname(__FILE__).'/../config.php';

//zakonczenie sesji
session_start();
session_destroy();

//przekierowanie na strone glowna
header("Location: "._APP_URL);