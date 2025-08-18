679\. 24 Game

**Difficulty:** Hard

**Topics:** `Array`, `Math`, `Backtracking`

You are given an integer array `cards` of length `4`. You have four cards, each containing a number in the range `[1, 9]`. You should arrange the numbers on these cards in a mathematical expression using the operators` ['+', '-', '*', '/']` and the parentheses `'('` and `')'` to get the value 24.

You are restricted with the following rules:

- The division operator `'/'` represents real division, not integer division.
  - For example, `4 / (1 - 2 / 3) = 4 / (1 / 3) = 12`.
- Every operation done is between two numbers. In particular, we cannot use `'-'` as a unary operator.
  - For example, if `cards = [1, 1, 1, 1]`, the expression `"-1 - 1 - 1 - 1"` is **not allowed**.
- You cannot concatenate numbers together
  - For example, if `cards = [1, 2, 1, 2]`, the expression `"12 + 12"` is not valid.

Return _`true` if you can get such expression that evaluates to `24`, and `false` otherwise_.

**Example 1:**

- **Input:** cards = [4,1,8,7]
- **Output:** true
- **Explanation:** (8-4) * (7-1) = 24

**Example 2:**

- **Input:** cards = [1,2,1,2]
- **Output:** false

**Constraints:**

- `cards.length == 4`
- `1 <= cards[i] <= 9`







**Solution:**

We need to determine if we can use four given numbers (each between 1 and 9) and the operators '+', '-', '*', '/' along with parentheses to form an expression that evaluates to 24. The solution involves exploring all possible combinations of these numbers and operations using a backtracking approach.

### Approach
1. **Problem Analysis**: The problem requires combining four numbers using binary operations (+, -, *, /) in such a way that the final expression equals 24. The operations must respect mathematical precedence and parentheses can be used to alter the order of operations. The challenge is to explore all possible ways to combine the numbers and operations to achieve the target value.
2. **Intuition**: The solution involves recursively reducing the problem size by combining two numbers at a time using all possible operations. For each combination, the result replaces the two numbers, and the process repeats with the reduced set of numbers until only one number remains. If this number is approximately 24 (within a small tolerance to handle floating-point precision), the solution exists.
3. **Algorithm Selection**: A backtracking algorithm is suitable here because it systematically explores all possible combinations of numbers and operations. For each pair of numbers in the current set, we apply all valid operations (considering commutativity and division by zero) and recursively check if the resulting set can evaluate to 24.
4. **Optimization**: The algorithm avoids redundant checks by processing each pair of numbers only once (using indices to ensure uniqueness) and skips operations that would lead to division by zero.
5. **Complexity Analysis**: The algorithm's complexity is manageable due to the small input size (four numbers). For each pair of numbers, up to six operations are considered. The recursion depth is at most four (from four numbers down to one), leading to a total of around 6<sup>3</sup> = 216 operations per initial pair, which is feasible.

Let's implement this solution in PHP: **[679. 24 Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000679-24-game/solution.php)**

```php
<?php
/**
 * @param Integer[] $cards
 * @return Boolean
 */
function judgePoint24($cards) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @return bool
 */
function judge($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$cards1 = [4, 1, 8, 7];
var_dump(judgePoint24($cards1)); // true

$cards2 = [1, 2, 1, 2];
var_dump(judgePoint24($cards2)); // false
?>
```

### Explanation:

1. **Base Case Handling**: The recursion stops when only one number remains. If this number is approximately 24 (within a tolerance of 1e-6 to account for floating-point precision), the function returns true.
2. **Pair Selection**: For each recursive call, the algorithm selects all unique pairs of numbers from the current set. The indices `i` and `j` ensure each pair is processed only once.
3. **Operation Application**: For each selected pair, the algorithm applies all valid operations (addition, subtraction, multiplication, and both divisions, avoiding division by zero). The result of each operation is added to a new set of numbers, replacing the original pair.
4. **Recursion**: The algorithm recursively processes the new set of numbers. If any combination leads to 24, the function returns true immediately.
5. **Termination**: If no combination of operations and numbers yields 24, the function returns false after exploring all possibilities.

This approach efficiently explores all potential expressions by leveraging recursion and backtracking, ensuring correctness while handling floating-point precision and division constraints appropriately.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**