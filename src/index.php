<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM students ORDER BY id DESC');
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Information</title>

    <style>
        body {
            font-family: Arial;
            max-width: 1000px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>

<body>

    <h1>Student Information Management</h1>

    <h2>Add Student</h2>

    <form action="save_student.php" method="POST">
        <input name="student_number"
               placeholder="Student Number" required>

        <input name="first_name"
               placeholder="First Name" required>

        <input name="last_name"
               placeholder="Last Name" required>

        <input name="course"
               placeholder="Course" required>

        <button type="submit">Save Student</button>
    </form>

    <h2>Student Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Student Number</th>
            <th>Name</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td>
                <?= htmlspecialchars((string)$s['id']) ?>
            </td>

            <td>
                <?= htmlspecialchars($s['student_number']) ?>
            </td>

            <td>
                <?= htmlspecialchars(
                    $s['first_name'] . ' ' . $s['last_name']
                ) ?>
            </td>

            <td>
                <?= htmlspecialchars($s['course']) ?>
            </td>

            <td>
                <a href="edit_student.php?id=<?= $s['id'] ?>">
                    Edit
                </a>

                |

                <a href="delete_student.php?id=<?= $s['id'] ?>"
                   onclick="return confirm('Delete this record?')">
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>