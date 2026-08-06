3345\. Smallest Divisible Digit Product I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Enumeration`, `Biweekly Contest 143`

You are given two integers `n` and `t`. Return the **smallest** number greater than or equal to `n` such that the **product of its digits** is divisible by `t`.

**Example 1:**

- **Input:** n = 10, t = 2
- **Output:** 10
- **Explanation:** The digit product of 10 is 0, which is divisible by 2, making it the smallest number greater than or equal to 10 that satisfies the condition.

**Example 2:**

- **Input:** n = 15, t = 3
- **Output:** 16
- **Explanation:** The digit product of 16 is 6, which is divisible by 3, making it the smallest number greater than or equal to 15 that satisfies the condition.

**Example 3:**

- **Input:** n = 15, t = 3
- **Output:** 16

**Example 4:**

- **Input:** n = 1, t = 1
- **Output:** 1

**Example 5:**

- **Input:** n = 25, t = 5
- **Output:** 25

**Example 6:**

- **Input:** n = 99, t = 9
- **Output:** 99

**Example 7:**

- **Input:** n = 100, t = 7
- **Output:** 100

**Constraints:**

- `1 <= n <= 100`
- `1 <= t <= 10`


**Hint:**

1. You have to check at most 10 numbers.
2. Apply a brute-force approach by checking each possible number.


**Similar Questions:**
1. [2847. Smallest Number With Given Digit Product](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002847-smallest-number-with-given-digit-product)


**Solution:**

We approached the problem using a brute-force enumeration strategy, leveraging the constraint that `n ≤ 100` and the guarantee that a valid answer will be found within at most 10 iterations. By incrementally checking each number starting from `n`, we compute the product of its digits and test divisibility by `t` until we find the smallest valid number.

## Approach

- **Start from `n`** and check each integer sequentially.
- For each candidate number, compute the product of its digits:
   - Initialize `product = 1`.
   - Extract digits one by one using modulo and integer division.
   - Multiply each digit into `product`.
   - If `product` becomes `0`, break early (since the final product is `0`, which is divisible by any `t`).
- Check if `product % t == 0`; if true, return the current number.
- If not, increment the number and repeat.
- Stop when the condition is met (guaranteed within a few steps due to constraints).

Let's implement this solution in PHP: **[3345. Smallest Divisible Digit Product I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003345-smallest-divisible-digit-product-i/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $t
 * @return Integer
 */
function smallestNumber(int $n, int $t): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestNumber(10, 2) .  "\n";         // Output: 10
echo smallestNumber(15, 3) .  "\n";         // Output: 16
echo smallestNumber(1, 1) .  "\n";          // Output: 1
echo smallestNumber(9, 10) .  "\n";         // Output: 10
echo smallestNumber(99, 9) .  "\n";         // Output: 99
echo smallestNumber(100, 7) .  "\n";        // Output: 100
?>
```

### Explanation:

- **Why at most 10 numbers?** The hint assures us that checking a small range of numbers is sufficient. This is because digit products change rapidly and 0 appears frequently, making divisibility easy to achieve.
- **Early exit optimization** If any digit is `0`, the entire product becomes `0`. Since `0` is divisible by any `t` (because `0 % t == 0`), we can immediately return the number when we encounter a `0` digit during the product calculation. This avoids unnecessary multiplication.
- **Brute-force is acceptable** With `n` up to `100`, even if we had to check more numbers, it would still be trivial. However, the problem guarantees quick termination.
- **Integer division** We use `intdiv($temp, 10)` to strip the last digit, ensuring clean integer arithmetic.
- **Product reset** For each new number, we reset `product = 1` to start fresh.

## Complexity Analysis

- **Time Complexity:** _**O(k * d)**_ where `k` is the number of iterations (`≤ 10`) and `d` is the number of digits (`≤ 3` for `n ≤ 100`). In practice, this is constant time.
- **Space Complexity:** _**O(1)**_ — only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**