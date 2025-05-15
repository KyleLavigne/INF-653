<?php
require('../config/database.php');
require('../models/make_db.php');

$makes = get_all_makes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        add_make($_POST['name']);
    } elseif (isset($_POST['delete_id'])) {
        delete_make($_POST['delete_id']);
    }
    header('Location: manage_makes.php');
    exit();
}
?>

<h2>Manage Makes</h2>

<form method="POST">
    <input name="name" placeholder="New make name" required>
    <button type="submit">Add Make</button>
</form>

<ul>
<?php foreach ($makes as $make): ?>
    <li>
        <?= htmlspecialchars($make['name']) ?>
        <form method="POST" style="display:inline">
            <input type="hidden" name="delete_id" value="<?= $make['id'] ?>">
            <button type="submit">Delete</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>

<?php include 'footer.php'; ?>
