<?php
function get_all_vehicles() {
    global $db;
    $query = 'SELECT 
            vehicles.id,
            vehicles.year,
            vehicles.model,
            vehicles.price,
            makes.name AS make_name,
            types.name AS type_name,
            classes.name AS class_name
        FROM vehicles
        JOIN makes ON vehicles.make_id = makes.id
        JOIN types ON vehicles.type_id = types.id
        JOIN classes ON vehicles.class_id = classes.id
        ORDER BY vehicles.price DESC
    ';
    return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $stmt = $db->prepare('INSERT INTO vehicles (year, model, price, make_id, type_id, class_id) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$year, $model, $price, $make_id, $type_id, $class_id]);
}

function delete_vehicle($id) {
    global $db;
    $stmt = $db->prepare('DELETE FROM vehicles WHERE id = ?');
    $stmt->execute([$id]);
}

function get_filtered_vehicles($sortBy = 'price', $filterType = null, $filterValue = null) {
    global $db;

    $validSort = in_array($sortBy, ['price', 'year']) ? $sortBy : 'price';

    $sql = "SELECT 
            vehicles.year,
            vehicles.model,
            vehicles.price,
            makes.name AS make_name,
            types.name AS type_name,
            classes.name AS class_name
        FROM vehicles
        JOIN makes ON vehicles.make_id = makes.id
        JOIN types ON vehicles.type_id = types.id
        JOIN classes ON vehicles.class_id = classes.id
    ";

    if ($filterType && $filterValue) {
        switch ($filterType) {
            case 'make':
                $sql .= ' WHERE makes.id = :value';
                break;
            case 'type':
                $sql .= ' WHERE types.id = :value';
                break;
            case 'class':
                $sql .= ' WHERE classes.id = :value';
                break;
        }
    }

    $sql .= " ORDER BY vehicles.$validSort DESC";

    $stmt = $db->prepare($sql);

    if ($filterType && $filterValue) {
        $stmt->bindValue(':value', $filterValue);
    }

    $stmt->execute();
    return $stmt->fetchAll();
}

