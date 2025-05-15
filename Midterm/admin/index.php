<?php
require('../config/database.php');
require('../models/vehicle_db.php');

$vehicles = get_all_vehicles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zippy Admin - Vehicles</title>
</head>
<body>

<h1>Admin - Vehicle List</h1>
<a href="add_vehicle.php">➕ Add Vehicle</a>

<table border="1">
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Class</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($vehicles as $v): ?>
        <tr>
            <td><?= htmlspecialchars($v['year']) ?></td>
            <td><?= htmlspecialchars($v['make_name']) ?></td>
            <td><?= htmlspecialchars($v['model']) ?></td>
            <td><?= htmlspecialchars($v['type_name']) ?></td>
            <td><?= htmlspecialchars($v['class_name']) ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
            <td>
                <form action="delete_vehicle.php" method="POST">
                    <input type="hidden" name="vehicle_id" value="<?= $v['id'] ?>">
                    <button type="submit">🗑️ Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>

</body>
</html>
