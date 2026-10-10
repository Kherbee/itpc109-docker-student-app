<?php
require 'db.php';

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$id) {
    exit('Invalid student ID.');
}

$stmt = $pdo->prepare(
    'SELECT * FROM students WHERE id = :id'
);

$stmt->execute([
    ':id' => $id
]);

$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    exit('Student not found.');
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Student</title>

    <style>
        body {
            font-family: Arial;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        form {
            display: grid;
            gap: 10px;
            max-width: 500px;
        }

        input, button {
            padding: 10px;
        }
    </style>
</head>

<body>

    <h1>Edit Student</h1>

    <form action="update_student.php" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars((string)$student['id']) ?>"
        >

        <label>Student Number</label>
        <input
            name="student_number"
            value="<?= htmlspecialchars($student['student_number']) ?>"
            required
        >

        <label>First Name</label>
        <input
            name="first_name"
            value="<?= htmlspecialchars($student['first_name']) ?>"
            required
        >

        <label>Last Name</label>
        <input
            name="last_name"
            value="<?= htmlspecialchars($student['last_name']) ?>"
            required
        >

        <label>Course</label>
        <input
            name="course"
            value="<?= htmlspecialchars($student['course']) ?>"
            required
        >

        <button type="submit">Update Student</button>

    </form>

    <p>
        <a href="index.php">Back to Student Records</a>
    </p>

</body>
</html>