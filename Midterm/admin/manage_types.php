<?php
require('../config/database.php');
require('../models/type_db.php');

$types = get_all_types();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        add_type($_POST['name']);
    } elseif (isset($_POST['delete_id'])) {
        delete_type($_POST['delete_id']);
    }
    header('Location: manage_types.php');
    exit();
}
?>

<h2>Manage Types</h2>

<form method="POST">
    <input name="name" placeholder="New type name" required>
    <button type="submit">Add Type</button>
</form>

<ul>
<?php foreach ($types as $type): ?>
    <li>
        <?= htmlspecialchars($type['name']) ?>
        <form method="POST" style="display:inline">
            <input type="hidden" name="delete_id" value="<?= $type['id'] ?>">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>

<?php include 'footer.php'; ?>
