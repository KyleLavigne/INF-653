<?php
function get_all_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY name';
    return $db->query($query)->fetchAll();
}

function add_class($name) {
    global $db;
    $stmt = $db->prepare('INSERT INTO classes (name) VALUES (:name)');
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_class($id) {
    global $db;
    $stmt = $db->prepare('DELETE FROM classes WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
