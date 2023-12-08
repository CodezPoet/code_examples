<?php

require_once('measurements.php');

// Function to calculate BMI
function calculateBMI($metricWeight, $metricHeight)
{
    $bmi = $metricWeight / ($metricHeight * $metricHeight);
    $bmi = number_format($bmi, 2);
    return $bmi;
}

// Determine BMI Category
function bmiCategory($bmi)
{
    switch (true) {
        case ($bmi < 18.5):
            $bmiCategory =  'Underweight';
            break;
        case ($bmi >= 18.5 && $bmi < 25):
            $bmiCategory =  'Normal weightE';
            break;
        case ($bmi >= 25 && $bmi < 30):
            $bmiCategory =  'Overweight';
            break;
        case ($bmi > 30):
            $bmiCategory =  'ObeseW';
            break;
    }
    return $bmiCategory;
}

// Output as HTML block
function displayBmiResult($bmi, $bmiCategory, $metricHeight, $metricWeight)
{
    $html = '<div class="bmi-result">';
    $html .= '<h2>BMI Result</h2>';
    $html .= '<dl>';
    $html .= '<dt>Weight:</dt>';
    $html .= '<dd>' . $metricWeight . 'kg</dd>';
    $html .= '<dt>Height:</dt>';
    $html .= '<dd>' . $metricHeight . 'cm</dd>';
    $html .= '<dt>BMI:</dt>';
    $html .= '<dd>' . $bmi . '</dd>';
    $html .= '<dt>BMI Category:</dt>';
    $html .= '<dd>' . $bmiCategory . '</dd>';
    $html .= '</div>';
    return $html;
}
