<?php
require_once('model/course_db.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
if ($course_id === null || $course_id === false) {
    $error = "Invalid course ID.";
    include('error.php');
    exit();
}

$course_name = get_course_name($course_id);
if ($course_name === "Unknown Course") {
    $error = "Course not found.";
    include('error.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_course_name = filter_input(INPUT_POST, 'course_name', FILTER_SANITIZE_STRING);
    if ($new_course_name) {
        update_course($course_id, $new_course_name);
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid course name.";
        include('error.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
</head>
<body>
    <h1>Update Course</h1>
    <form action="update_course.php?course_id=<?php echo $course_id; ?>" method="post">
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($course_name); ?>" required>
        <input type="submit" value="Update Course">
    </form>
</body>
</html>
