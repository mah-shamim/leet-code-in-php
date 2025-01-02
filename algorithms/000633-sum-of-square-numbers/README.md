633\. Sum of Square Numbers

**Difficulty:** Medium

**Topics:** `Math`, `Two Pointers`, `Binary Search`

Given a non-negative integer `c`, decide whether there're two integers `a` and `b` such that `a2 + b2 = c`.

**Example 1:**

- **Input:** c = 5
- **Output:** true
- **Explanation:** 1 * 1 + 2 * 2 = 5

**Example 2:**

- **Input:** c = 3
- **Output:** false

**Constraints:**

- <code>0 <= c <= 2<sup>31</sup> - 1</code>



**Solution:**

We can utilize a two-pointer approach. Here's how we can approach the problem:

### Explanation:

1. **Constraints**:
    - We're given a non-negative integer `c`.
    - We need to find two integers `a` and `b` such that `a² + b² = c`.

2. **Two-pointer Approach**:
    - Start with two pointers: `a` initialized to 0, and `b` initialized to the square root of `c`.
    - The idea is to check the sum of the squares of `a` and `b`. If `a² + b²` equals `c`, return `true`.
    - If `a² + b²` is less than `c`, increment `a` to increase the sum.
    - If `a² + b²` is greater than `c`, decrement `b` to decrease the sum.
    - Continue this process until `a` is less than or equal to `b`.
    - If no such pair is found, return `false`.

Let's implement this solution in PHP: **[633. Sum of Square Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000633-sum-of-square-numbers/solution.php)**

```php
<?php
/**
 * @param Integer $c
 * @return Boolean
 */
function judgeSquareSum($c) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$c1 = 5;
$c2 = 3;

echo "Result for c = $c1: " . (judgeSquareSum($c1) ? "true" : "false") . "\n"; // Output: true
echo "Result for c = $c2: " . (judgeSquareSum($c2) ? "true" : "false") . "\n"; // Output: false
?>
```

### Explanation:

1. **Initialization**:
    - `$a = 0`: The left pointer starts from 0.
    - `$b = (int) sqrt($c)`: The right pointer starts from the integer value of the square root of `c`, as `b²` cannot exceed `c`.

2. **Loop**:
    - The loop continues as long as `a <= b`.
    - If `a² + b²` equals `c`, the function returns `true`.
    - If `a² + b²` is less than `c`, it means we need a larger sum, so we increment `a`.
    - If `a² + b²` is greater than `c`, we need a smaller sum, so we decrement `b`.

3. **End Condition**:
    - If no such integers `a` and `b` are found, return `false`.

### Time Complexity:

- The time complexity is `O(sqrt(c))` because we iterate through the integers from `0` to `sqrt(c)`.

### Example Outputs:

- For `c = 5`, the function will return `true` because `1² + 2² = 5`.
- For `c = 3`, the function will return `false` because no integers satisfy the equation `a² + b² = 3`.

This approach efficiently checks for two integers whose squares sum up to `c` using a two-pointer technique.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
