<?php
require_once('../_config/config.php');
unset($_SESSION['user']);
session_destroy();
header("location: login.php ");
