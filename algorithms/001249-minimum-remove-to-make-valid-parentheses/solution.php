<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid(string $s): string
    {
        // Stack to keep track of characters that lead to a valid string
        $stack = [];

        // Counter to track the balance of parentheses
        $openCount = 0;

        // First pass to remove invalid closing parentheses
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            // If a closing parenthesis is encountered with no matching open, skip it
            if ($char == ')' && $openCount == 0) {
                continue;
            }
            // If an opening parenthesis is found, increment the open count
            if ($char == '(') {
                $openCount++;
            } // If a closing parenthesis is found and there is a matching open, decrement the open count
            elseif ($char == ')') {
                $openCount--;
            }
            // Add the character to the stack as it's part of valid substring so far
            $stack[] = $char;
        }

        // Reset the open counter for the second pass
        $openCount = 0;
        // List to store the characters for the final answer
        $answer = [];

        // Second pass to remove invalid opening parentheses; process characters in reverse
        for ($i = count($stack) - 1; $i >= 0; $i--) {
            $char = $stack[$i];
            // If an opening parenthesis is encountered with no matching close, skip it
            if ($char == '(' && $openCount == 0) {
                continue;
            }
            // If a closing parenthesis is found, increment the open count
            if ($char == ')') {
                $openCount++;
            } // If an opening parenthesis is found and there is a matching close, decrement the open count
            elseif ($char == '(') {
                $openCount--;
            }
            // Add the character to the answer as it is part of a valid substring
            $answer[] = $char;
        }

        // The characters in answer are in reverse order, reverse them back to the correct order
        return implode('', array_reverse($answer));
    }
}