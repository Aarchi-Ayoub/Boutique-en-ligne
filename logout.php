<?php
require_once('_config/config.php');
unset($_SESSION['customer']);
session_destroy();
header("location: login.php ");
