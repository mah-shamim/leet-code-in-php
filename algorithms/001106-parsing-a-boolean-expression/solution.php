<?php

class Solution {

    /**
     * @param String $expression
     * @return Boolean
     */
    function parseBoolExpr($expression) {
        $stack = [];

        for ($i = 0; $i < strlen($expression); $i++) {
            $char = $expression[$i];

            if ($char == ')') {
                // Process until we find a matching open parenthesis
                $subExpr = [];
                while ($stack && end($stack) != '(') {
                    array_unshift($subExpr, array_pop($stack));
                }
                array_pop($stack); // Remove the '('

                // The operation comes before the '('
                $operation = array_pop($stack);

                // Evaluate the sub-expression
                if ($operation == '&') {
                    $result = $this->parse_and($subExpr);
                } elseif ($operation == '|') {
                    $result = $this->parse_or($subExpr);
                } elseif ($operation == '!') {
                    $result = $this->parse_not($subExpr);
                }

                // Push the result back to the stack as 't' or 'f'
                $stack[] = $result ? 't' : 'f';
            } elseif ($char != ',') {
                // Push characters except ',' into the stack
                $stack[] = $char;
            }
        }

        // The result should be the final element in the stack
        return $stack[0] == 't';
    }

    /**
     * @param $subExpr
     * @return bool
     */
    function parse_and($subExpr) {
        foreach ($subExpr as $expr) {
            if ($expr == 'f') {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $subExpr
     * @return bool
     */
    function parse_or($subExpr) {
        foreach ($subExpr as $expr) {
            if ($expr == 't') {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $subExpr
     * @return bool
     */
    function parse_not($subExpr) {
        // subExpr contains only one element for NOT operation
        return $subExpr[0] == 'f';
    }
}