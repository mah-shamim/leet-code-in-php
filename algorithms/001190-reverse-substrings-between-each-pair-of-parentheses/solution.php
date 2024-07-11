<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseParentheses($s) {
        $stack = [];

        // Traverse each character in the string
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == ')') {
                $temp = '';

                // Pop from stack until an opening parenthesis is found
                while (end($stack) != '(') {
                    $temp .= array_pop($stack);
                }

                // Pop the opening parenthesis
                array_pop($stack);

                // Push the reversed substring back to the stack
                for ($j = 0; $j < strlen($temp); $j++) {
                    array_push($stack, $temp[$j]);
                }
            } else {
                // Push current character to the stack
                array_push($stack, $s[$i]);
            }
        }

        // Concatenate the stack to form the result string
        return implode('', $stack);

    }
}