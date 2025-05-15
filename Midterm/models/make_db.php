<?php
function get_all_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY name';
    return $db->query($query)->fetchAll();
}
function add_make($name) {
    global $db;
    $stmt = $db->prepare('INSERT INTO makes (name) VALUES (:name)');
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}
function delete_make($id) {
    global $db;
    $stmt = $db->prepare('DELETE FROM makes WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
