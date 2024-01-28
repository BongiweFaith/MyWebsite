<?php
// Function to add a student to the file
function addStudent($studentNumber, $studentName, $courseName) {
    $studentData = "$studentNumber|$studentName|$courseName";
    file_put_contents('students.txt', $studentData . PHP_EOL, FILE_APPEND);
}

// Function to get the list of students
function getStudents() {
    $students = [];
    $lines = file('students.txt', FILE_IGNORE_NEW_LINES);
    
    foreach ($lines as $line) {
        $studentInfo = explode('|', $line);
        $students[] = [
            'studentNumber' => $studentInfo[0],
            'studentName' => $studentInfo[1],
            'courseName' => $studentInfo[2]
        ];
    }

    return $students;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student data from the form
    $studentNumber = $_POST['student_number'];
    $studentName = $_POST['student_name'];
    $courseName = $_POST['course_name'];

    // Add the student
    addStudent($studentNumber, $studentName, $courseName);
}

// Display the list of students
echo "Student List:<br>";

$students = getStudents();

foreach ($students as $student) {
    echo "Student Number: " . htmlspecialchars($student['studentNumber']) . ", ";
    echo "Name: " . htmlspecialchars($student['studentName']) . ", ";
    echo "Course: " . htmlspecialchars($student['courseName']) . "<br>";
}
?>