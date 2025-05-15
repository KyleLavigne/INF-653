<?php
$sort = $_GET['sort'] ?? 'price';
$filterType = $_GET['filterType'] ?? '';
$filterValue = $_GET['filterValue'] ?? '';
?>

<form method="GET">
    <label>Sort by:</label>
    <select name="sort" onchange="this.form.submit()">
        <option value="price" <?= $sort === 'price' ? 'selected' : '' ?>>Price (High to Low)</option>
        <option value="year" <?= $sort === 'year' ? 'selected' : '' ?>>Year (Newest to Oldest)</option>
    </select>

    <label>Filter by:</label>
    <select name="filterType" onchange="this.form.submit()">
        <option value="">None</option>
        <option value="make" <?= $filterType === 'make' ? 'selected' : '' ?>>Make</option>
        <option value="type" <?= $filterType === 'type' ? 'selected' : '' ?>>Type</option>
        <option value="class" <?= $filterType === 'class' ? 'selected' : '' ?>>Class</option>
    </select>

    <?php if (!empty($filterType)): ?>
        <select name="filterValue" onchange="this.form.submit()">
            <?php
            $list = ${$filterType . 's'};
            foreach ($list as $item): ?>
                <option value="<?= $item['id'] ?>" <?= $filterValue == $item['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($item['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</form>

<table>
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Class</th>
        <th>Price</th>
    </tr>
    <?php foreach ($vehicles as $v): ?>
        <tr>
            <td><?= htmlspecialchars($v['year']) ?></td>
            <td><?= htmlspecialchars($v['make_name']) ?></td>
            <td><?= htmlspecialchars($v['model']) ?></td>
            <td><?= htmlspecialchars($v['type_name']) ?></td>
            <td><?= htmlspecialchars($v['class_name']) ?></td>
            <td>$<?= number_format($v['price'], 2) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
