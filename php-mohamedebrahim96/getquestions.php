<?php

include "connection.php";
header('Content-Type: application/json');


$getQuestions = $conn->prepare("SELECT * FROM questions inner join answers on questions.id = answers.questions_id ORDER BY questions.id ASC");



$getQuestions->execute();
$questions = $getQuestions->fetchAll();


//echo json_encode($questions);

	$rows = array();
    foreach($questions as $row) {

        $rows[] = array('questions_id' => $row['questions_id'],
            'question' => $row['question'],
            'ans1' => $row['ans1'],
            'ans2' => $row['ans2'],
            'ans3' => $row['ans3'],
            'ans4' => $row['ans4'],
            'correct_ans' => $row['correct_ans']);
    }
    //echo json_encode($rows);
 	echo json_encode(array('QuestionModel' => $rows));


?>