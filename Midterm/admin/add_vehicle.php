<?php
require('../config/database.php');
require('../models/vehicle_db.php');
require('../models/make_db.php');
require('../models/type_db.php');
require('../models/class_db.php');

$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $make_id = $_POST['make_id'];
    $type_id = $_POST['type_id'];
    $class_id = $_POST['class_id'];

    add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
    header('Location: index.php');
    exit();
}
?>

<h2>Add New Vehicle</h2>

<form method="POST">
    <label>Year:</label>
    <input name="year" required><br>

    <label>Model:</label>
    <input name="model" required><br>

    <label>Price:</label>
    <input name="price" required><br>

    <label>Make:</label>
    <select name="make_id" required>
        <?php foreach ($makes as $m): ?>
            <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Type:</label>
    <select name="type_id" required>
        <?php foreach ($types as $t): ?>
            <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Class:</label>
    <select name="class_id" required>
        <?php foreach ($classes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Add Vehicle</button>
</form>

<?php include 'footer.php'; ?>
