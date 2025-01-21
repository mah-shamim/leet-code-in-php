241\. Different Ways to Add Parentheses

**Difficulty:** Medium

**Topics:** `Math`, `String`, `Dynamic Programming`, `Recursion`, `Memoization`

Given a string `expression` of numbers and operators, return _all possible results from computing all the different possible ways to group numbers and operators_. You may return the answer in **any order**.

The test cases are generated such that the output values fit in a 32-bit integer and the number of different results does not exceed <code>10<sup>4</sup></code>.

**Example 1:**

- **Input:** expression = "2-1-1"
- **Output:** [0,2]
- **Explanation:**\
  ((2-1)-1) = 0\
  (2-(1-1)) = 2

**Example 2:**

- **Input:** expression = "2*3-4*5"
- **Output:** [-34,-14,-10,-10,10]
- **Explanation:**\
  (2*(3-(4*5))) = -34\
  ((2*3)-(4*5)) = -14\
  ((2*(3-4))*5) = -10\
  (2*((3-4)*5)) = -10\
  (((2*3)-4)*5) = 10


**Constraints:**

- <code>1 <= expression.length <= 20</code>
- `expression` consists of digits and the operator `'+'`, `'-'`, and `'*'`.
- All the integer values in the input expression are in the range `[0, 99]`.
- The integer values in the input expression do not have a leading `'-'` or `'+'` denoting the sign.


**Solution:**

We can use **recursion** combined with **memoization** to store previously computed results for sub-expressions, as this avoids redundant calculations and optimizes the solution.

### Approach:
1. **Recursion**:
   - For each operator in the string (`+`, `-`, `*`), we split the expression at that operator.
   - Recursively compute the left and right parts of the expression.
   - Combine the results of both parts using the operator.

2. **Memoization**:
   - Store the results of sub-expressions in an associative array to avoid recalculating the same sub-expression multiple times.

3. **Base Case**:
   - If the expression contains only a number (i.e., no operators), return that number as the result.

### Example Walkthrough:
For the input `"2*3-4*5"`:
- Split at `*` -> `2` and `3-4*5`
   - Recursively compute `3-4*5` and `2`, then combine.
- Split at `-` -> `2*3` and `4*5`
   - Recursively compute each and combine.
- Similarly for other splits.

Let's implement this solution in PHP: **[241. Different Ways to Add Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000241-different-ways-to-add-parentheses/solution.php)**

```php
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
    public function diffWaysToCompute($expression) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $expression
     * @return array|mixed
     */
    private function compute($expression) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage
$solution = new Solution();
$expression1 = "2-1-1";
$expression2 = "2*3-4*5";
print_r($solution->diffWaysToCompute($expression1)); // Output: [0, 2]
print_r($solution->diffWaysToCompute($expression2)); // Output: [-34, -14, -10, -10, 10]
?>
```

### Explanation:

1. **Memoization**: The `$memo` array stores the computed results for each expression to avoid redundant calculations.
2. **Base Case**: When the expression is numeric, it’s converted to an integer and added to the results.
3. **Recursive Splitting**: For each operator in the expression, split it into left and right parts, recursively compute the results for both parts, and then combine them based on the operator.
4. **Example Usage**: The `diffWaysToCompute` function is tested with example expressions to verify the solution.

This approach ensures that you efficiently compute all possible results by leveraging memoization to avoid redundant computations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
