<?php

define('MAX_QUESTION_NUMBER', 50);

function retrieve_questions() {
    // 1. Open the questions/triviaquiz.json file
    $json_string = file_get_contents("./questions/triviaquiz.json");
    
    // 2. Convert it the array
    $json_data = json_decode($json_string, true);
    
    // 3. Return the trivia questions array data
    return $json_data;
}

function get_current_question($answers = '') {
    $number_of_answers = strlen($answers);
    $questions = retrieve_questions();
    return $questions['questions'][$number_of_answers];
}

function get_current_question_number($answers = '') {
    return strlen($answers) + 1;
}

function get_options_for_question_number($number = 0) {
    $questions = retrieve_questions();
    return $questions['questions'][$number - 1]['options'];
}

function compute_score($answers = []) {
    $questions = retrieve_questions();
    $correct_answers = $questions['answers'];

    $score = 0;
    for ($i = 0; $i < MAX_QUESTION_NUMBER; $i++) {
        if ($correct_answers[$i] == $answers[$i]) {
            $score += 100;
        }
    }
    return $score;
}

function get_answers() {
    $questions = retrieve_questions();
    return $questions['answers'];
}
