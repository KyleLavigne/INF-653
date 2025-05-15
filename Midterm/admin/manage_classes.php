<?php
require('../config/database.php');
require('../models/class_db.php');

$classes = get_all_classes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        add_class($_POST['name']);
    } elseif (isset($_POST['delete_id'])) {
        delete_class($_POST['delete_id']);
    }
    header('Location: manage_classes.php');
    exit();
}
?>

<h2>Manage Classes</h2>

<form method="POST">
    <input name="name" placeholder="New class name" required>
    <button type="submit">Add Class</button>
</form>

<ul>
<?php foreach ($classes as $class): ?>
    <li>
        <?= htmlspecialchars($class['name']) ?>
        <form method="POST" style="display:inline">
            <input type="hidden" name="delete_id" value="<?= $class['id'] ?>">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>

<?php include 'footer.php'; ?>
