<?php
function get_all_types() {
    global $db;
    $query = 'SELECT * FROM types ORDER BY name';
    return $db->query($query)->fetchAll();
}

function add_type($name) {
    global $db;
    $stmt = $db->prepare('INSERT INTO types (name) VALUES (:name)');
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_type($id) {
    global $db;
    $stmt = $db->prepare('DELETE FROM types WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
