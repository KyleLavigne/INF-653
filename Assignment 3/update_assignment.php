<?php
require_once('model/assignment_db.php');
require_once('model/course_db.php');

$assignment_id = filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);
if ($assignment_id == NULL || $assignment_id == FALSE) {
    $error = "Invalid assignment ID.";
    include('error.php');
    exit();
}

$assignment = get_assignment($assignment_id);
$courses = get_courses();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);

    if ($description == NULL || $description == FALSE || $course_id == NULL || $course_id == FALSE) {
        $error = "Invalid assignment data. Check all fields and try again.";
        include('error.php');
    } else {
        update_assignment($assignment_id, $description, $course_id);
        header("Location: .");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Assignment</title>
</head>
<body>
    <h1>Update Assignment</h1>
    <form action="update_assignment.php" method="post">
        <input type="hidden" name="assignment_id" value="<?php echo $assignment['ID']; ?>">
        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $assignment['Description']; ?>"><br>
        <label>Course:</label>
        <select name="course_id">
            <?php foreach ($courses as $course) : ?>
                <option value="<?php echo $course['courseID']; ?>" <?php if ($course['courseID'] == $assignment['courseID']) echo 'selected'; ?>>
                    <?php echo $course['courseName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Update Assignment">
    </form>
</body>
</html>
