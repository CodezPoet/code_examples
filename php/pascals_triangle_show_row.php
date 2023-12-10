<?php

/* 
* Generates and returns values of the nth row of Pascal's Triangle.
* For more info about Pascal's Triangle please see: https://en.wikipedia.org/wiki/Pascal%27s_triangle
*/
function outputNthRowPascalsTriangle($row_number)
{
    if (0 <= $row_number && 100 >= $row_number) {
        $row = array(1);
        for ($i = 1; $i <= $row_number; $i++) {
            $next_in_row = ($row[$i - 1] * ($row_number - $i + 1)) / $i;
            $row[] = $next_in_row;
        }
        return implode(' ', $row);
    } else {
        return 'Invalid input given. The row number must be 0 or greater and 100 or smaller.';
    }
}