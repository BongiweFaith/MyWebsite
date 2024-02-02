<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #28002E;
            color: #FFFFFF;
            text-align: center;
            margin: 0;
        }

        .quiz-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #410041;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-family: 'Orbitron', sans-serif;
            color: #B10DC9;
        }

        form {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #8E44AD;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Roboto', sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #6C3483;
        }

        p {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <title>Galactic Quiz App</title>
</head>
<body>

<?php
// Array of quizzes
$quizzes = array(
    array(
        'title' => 'Quiz 1: Galactic Capitals',
        'questions' => array(
            array(
                'question' => 'What is the capital of Mars?',
                'options' => array('Mars City', 'Redopolis', 'Olympus Mons', 'Phobopolis'),
                'correct_answer' => 'Mars City'
            ),
            array(
                'question' => 'Which moon is known for its mysterious monoliths?',
                'options' => array('Titan', 'Europa', 'Phobos', 'Io'),
                'correct_answer' => 'Phobos'
            ),
            // Add more questions as needed
        )
    ),
    array(
        'title' => 'Quiz 2: Galactic Planets',
        'questions' => array(
            array(
                'question' => 'Which planet is known as the "Gas Giant"?',
                'options' => array('Earth', 'Jupiter', 'Mars', 'Venus'),
                'correct_answer' => 'Jupiter'
            ),
            array(
                'question' => 'How many rings does Saturn have?',
                'options' => array('None', 'One', 'Three', 'Seven'),
                'correct_answer' => 'Seven'
            ),
            // Add more questions as needed
        )
    )
);

// Function to display a question
function displayQuestion($questionData, $questionNumber) {
    echo "<p>Question $questionNumber: {$questionData['question']}</p>";
    echo "<ul>";
    foreach ($questionData['options'] as $option) {
        echo "<li><input type='radio' name='q$questionNumber' value='$option'> $option</li>";
    }
    echo "</ul>";
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $totalScore = 0;

    // Loop through each quiz
    foreach ($quizzes as $quiz) {
        $score = 0;

        // Loop through each question in the quiz and check answers
        foreach ($quiz['questions'] as $key => $questionData) {
            $userAnswer = $_POST['q' . ($key + 1)];
            $correctAnswer = $questionData['correct_answer'];

            if ($userAnswer === $correctAnswer) {
                $score++;
            }
        }

        // Display the score for each quiz
        echo "<div class='quiz-container'>";
        echo "<h2>{$quiz['title']}</h2>";
        echo "<p>Your score: $score out of " . count($quiz['questions']) . "</p>";
        echo "</div>";

        // Accumulate total score
        $totalScore += $score;
    }

    // Display the total score
    echo "<div class='quiz-container'>";
    echo "<h2>Total Score</h2>";
    echo "<p>Your total score: $totalScore out of " . (count($quizzes[0]['questions']) + count($quizzes[1]['questions'])) . "</p>";
    echo "</div>";
} else {
    // Display the quiz forms
    foreach ($quizzes as $quiz) {
        echo "<div class='quiz-container'>";
        echo "<h2>{$quiz['title']}</h2>";
        echo "<form method='post'>";
        foreach ($quiz['questions'] as $key => $questionData) {
            displayQuestion($questionData, $key + 1);
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        echo "</div>";
    }
}
?>

</body>
</html>
