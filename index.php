<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
</head>
<body>
    <h2>Student Registration</h2>

    <?php
    $name = $email = $course = '';
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        if (empty($name) || empty($email) || empty($course) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<p style="color: red;">Please fill out all fields correctly.</p>';
        } else {
            $data = "Name: $name\nEmail: $email\nCourse: $course\n\n";
            file_put_contents('student_data.txt', $data, FILE_APPEND);

            echo '<p style="color: green;">Registration successful!</p>';

            $name = $email = $course = '';
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>

        <label for="course">Course:</label>
        <input type="text" name="course" value="<?php echo $course; ?>"><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
