<?php

namespace App;

class StudentGradeCalculations
{

    /**
     * The ID of the student
     * 
     * @var $id
     */
    private $id;

    /**
     * Student parameters
     * 
     * @var $name
     * @var $result
     * @var $remark
     * @var $grade
     * @var $avg
     * @var $total
     * 
     */
    private $name, $result, $remark, $grade, $avg, $total;

    /**
     * The grade parameters for the student
     * 
     * @var $sub1
     * @var $sub2
     * @var $sub3
     * @var $sub4
     * @var $sub5
     * 
     */
    private $sub1, $sub2, $sub3, $sub4, $sub5;

    /**
     * Construct: Create a new Students object with the specified name and id
     * 
     * @param int $id The name of the student as a string
     * @param string $nameThe ID number of the student as int
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the student name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the student ID
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the marks for the subjects
     * 
     * @param float $sub1
     * @param float $sub2
     * @param float $sub3
     * @param float $sub4
     * @param float $sub5
     * 
     */
    public function setMarks(float $sub1, float $sub2, float $sub3, float $sub4, float $sub5)
    {
        $this->sub1 = $sub1;
        $this->sub2 = $sub2;
        $this->sub3 = $sub3;
        $this->sub4 = $sub4;
        $this->sub5 = $sub5;
    }

    /**
     * Calculate total score 
     * 
     * @return float
     */
    public function totalScore(): float
    {
        return $this->total = $this->sub1 + $this->sub2 + $this->sub3 + $this->sub4 + $this->sub5;
    }

    /**
     * Calculate average score
     * 
     * @return float
     */
    public function averageScore(): float
    {
        return $this->avg = $this->total / 5;
    }

    /**
     * Calculate grade for a student
     * 
     * @return string
     */
    public function grade(): string
    {
        if (70 < $this->avg && 100 >= $this->avg) {
            return $this->grade = 'A';
        }
        if (60 < $this->avg && 69.9 >= $this->avg) {
            return $this->grade = 'B';
        }
        if (50 < $this->avg && 59.9 >= $this->avg) {
            return $this->grade = 'C';
        }
        if (40 < $this->avg && 49.9 >= $this->avg) {
            return $this->grade = 'D';
        }
        if (0 < $this->avg && 39.9 >= $this->avg) {
            return $this->grade = 'F';
        }

        return $this->grade = 'unknown';
    }

    /**
     * Set and return a remark for a student 
     * 
     * @return string
     */
    public function remark(): string
    {
        switch ($this->grade) {
            case 'A':
                $this->remark = 'Excellent';
                break;
            case 'B':
                $this->remark = 'Good';
                break;
            case 'C':
                $this->remark = 'Good';
                break;
            case 'D':
                $this->remark = 'Fair';
            default:
                $this->remark = 'Very Poor';
        }

        return $this->remark;
    }

    /**
     * Set and return the final result for a student
     * Student must have at least a score of 40 to pass
     * 
     * @return string
     */
    public function finalResult(): string
    {
        if (40 > $this->sub1 || 40 > $this->sub2 || 40 > $this->sub3 || 40 > $this->sub4 || 40 > $this->sub5) {
            $this->result = "Fail";
        } else {
            $this->result = "Pass";
        }

        return $this->result;
    }
}
