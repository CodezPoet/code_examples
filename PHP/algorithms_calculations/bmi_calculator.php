<?php

// file with height and weight
require_once('measurements.php');
 
/**
 * Function to calculate BMI
 * 
 * @param float|null $weightMetric
 * @param float|null $heightMetric
 * 
 * @return float
 */
function calculateBMI(?float $weightMetric = null, ?float $heightMetric = null): float
{
    $bmi = $weightMetric / ($heightMetric * $heightMetric);
    $bmi = number_format($bmi, 2);

    return $bmi;
}

/**
 * Determine BMI Category
 * 
 * @param float|null $bmi
 * 
 * @return string
 */
function bmiCategory(?float $bmi = null): string
{
    $bmiCategory = '';

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

/**
 * BMI result
 * 
 * @param float|null $heightMetric
 * @param float|null $weightMetric
 * 
 * @return array
 */
function bmiResultMetric(?float $heightMetric = null, ?float $weightMetric = null): array
{
    $bmiResult = [];
    if (0 < $heightMetric && 4 > $heightMetric && 0 < $weightMetric && 1000 > $weightMetric) {
        $bmi = calculateBMI($weightMetric, $heightMetric);
        $bmiCategory = bmiCategory($bmi);
        $bmiResult = [
            'weight_metric' => $weightMetric,
            'height_metric' => $heightMetric,
            'bmi' => $bmi,
            'bmi_category' => $bmiCategory,
        ];

        return $bmiResult;
    }
}
