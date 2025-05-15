<?php
require('config/database.php');
$controller = $_GET['controller'] ?? 'vehicles';
require("controllers/$controller.php");
