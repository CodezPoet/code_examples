<?php 

// file with height and weight
require_once('measurements.php');

// Function to calculate BMI
function calculateBMI($weightMetric, $heightMetric)
{
    $bmi = $weightMetric / ($heightMetric * $heightMetric);
    $bmi = number_format($bmi, 2);
    return $bmi;
}

// Determine BMI Category
function bmiCategory($bmi)
{
    switch (true) {
        case ($bmi < 18.5):
            $bmiCategory = 'Underweight';
            break;
        case ($bmi >= 18.5 && $bmi < 25):
            $bmiCategory = 'Normal Weight';
            break;
        case ($bmi >= 25 && $bmi < 30):
            $bmiCategory = 'Overweight';
            break;
        case ($bmi > 30):
            $bmiCategory = 'Obese';
            break;
    }
    return $bmiCategory;
}

// BMI result
function bmiResultMetric($heightMetric = '', $weightMetric = '')
{
    if (0 < $heightMetric && 4 > $heightMetric && 0 < $weightMetric && 1000 > $weightMetric) {
        $bmi = calculateBMI($weightMetric, $heightMetric);
        $bmiCategory = bmiCategory($bmi);
        $bmiResult = array(
            'weight_metric' => $weightMetric,
            'height_metric' => $heightMetric,
            'bmi'           => $bmi,
            'bmi_category'  => $bmiCategory,
        );
        return $bmiResult;
    } else {
        return false;
    }
}
