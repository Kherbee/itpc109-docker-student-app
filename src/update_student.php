<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = filter_input(
    INPUT_POST,
    'id',
    FILTER_VALIDATE_INT
);

$sn = trim($_POST['student_number'] ?? '');
$fn = trim($_POST['first_name'] ?? '');
$ln = trim($_POST['last_name'] ?? '');
$c = trim($_POST['course'] ?? '');

if (!$id || $sn === '' || $fn === '' || $ln === '' || $c === '') {
    exit('All fields are required.');
}

$stmt = $pdo->prepare(
    'UPDATE students
    SET student_number = :sn,
        first_name = :fn,
        last_name = :ln,
        course = :c
    WHERE id = :id'
);

$stmt->execute([
    ':sn' => $sn,
    ':fn' => $fn,
    ':ln' => $ln,
    ':c' => $c,
    ':id' => $id
]);

header('Location: index.php');
exit;