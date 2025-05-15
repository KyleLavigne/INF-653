<?php
require('../config/database.php');
require('../models/vehicle_db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    delete_vehicle($_POST['vehicle_id']);
}
header('Location: index.php');
exit();
