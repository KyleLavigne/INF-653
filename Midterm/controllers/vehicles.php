<?php
require('models/vehicle_db.php');
require('models/make_db.php');
require('models/type_db.php');
require('models/class_db.php');

// Handle sort and filter
$sort = $_GET['sort'] ?? 'price';
$sortColumn = $sort === 'year' ? 'year' : 'price';

$filterType = $_GET['filterType'] ?? null;
$filterValue = $_GET['filterValue'] ?? null;

$vehicles = get_filtered_vehicles($sortColumn, $filterType, $filterValue);
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

include('views/vehicle_list.php');
