<?php

class Solution {

    /**
     * @var array
     */
    private $memo = [];

    /**
     * @param String $expression
     * @return Integer[]
     */
    function diffWaysToCompute($expression) {
        // Call the recursive function to compute results
        return $this->compute($expression);
    }

    /**
     * @param $expression
     * @return array|mixed
     */
    private function compute($expression) {
        // Check if the result for this expression is already computed
        if (isset($this->memo[$expression])) {
            return $this->memo[$expression];
        }

        $results = [];

        // Check if the expression is a single number
        if (is_numeric($expression)) {
            $results[] = (int)$expression;
        } else {
            // Iterate through the expression
            for ($i = 0; $i < strlen($expression); $i++) {
                $char = $expression[$i];

                // If the character is an operator
                if ($char == '+' || $char == '-' || $char == '*') {
                    // Split the expression into two parts
                    $left = substr($expression, 0, $i);
                    $right = substr($expression, $i + 1);

                    // Compute all results for left and right parts
                    $leftResults = $this->compute($left);
                    $rightResults = $this->compute($right);

                    // Combine the results based on the operator
                    foreach ($leftResults as $leftResult) {
                        foreach ($rightResults as $rightResult) {
                            if ($char == '+') {
                                $results[] = $leftResult + $rightResult;
                            } elseif ($char == '-') {
                                $results[] = $leftResult - $rightResult;
                            } elseif ($char == '*') {
                                $results[] = $leftResult * $rightResult;
                            }
                        }
                    }
                }
            }
        }

        // Memoize the result for the current expression
        $this->memo[$expression] = $results;
        return $results;
    }
}