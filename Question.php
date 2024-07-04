<?php
// Array of questions, options, and correct answers
$questions = array(
    0 => array(
        "question" => "What is the capital of France?",
        "options" => array("Paris", "Berlin", "London", "Rome"),
        "correct_answer" => "Paris"
    ),
    1 => array(
        "question" => "What is the largest planet in our solar system?",
        "options" => array("Jupiter", "Saturn", "Neptune", "Mars"),
        "correct_answer" => "Jupiter"
    )
);

$action = $_POST['action'];
$questionNumber = 0;
$flag=false;

if ($action === "start") {
    echoQuestion($questions[$questionNumber]);
    $questionNumber++;
}


if ($action === "flag") {
    $flag=true;
}

if ($action === "next") {
    echoQuestion($questions[$questionNumber]);
}

if ($action === "fetch") {
    if($flag === true){
    echoQuestion($questions[$questionNumber]);
        $flag=false;
    }
}

if ($action === "check") {
    $selectedAnswer = $_POST['answer'];
    $correctAnswer = $questions[$questionNumber]['correct_answer'];
    if ($selectedAnswer === $correctAnswer) {
        echo "Correct!";
    } else {
        echo "Incorrect!";
    }
}

function echoQuestion($question) {
    echo "<p>{$question['question']}</p>";
    foreach ($question['options'] as $option) {
        echo "<input type='radio' name='option' value='$option'> $option<br>";
    }
}
?>
