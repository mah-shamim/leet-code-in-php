2048\. Next Greater Numerically Balanced Number

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `Backtracking`, `Counting`, `Enumeration`, `Weekly Contest 264`

An integer `x` is **numerically balanced** if for every digit `d` in the number `x`, there are **exactly** `d` occurrences of that digit in `x`.

Given an integer `n`, return _the **smallest numerically balanced** number **strictly greater** than `n`_.

**Example 1:**

- **Input:** n = 1
- **Output:** 22
- **Explanation:**
  - 22 is numerically balanced since:
    - The digit 2 occurs 2 times.
  - It is also the smallest numerically balanced number strictly greater than 1.

**Example 2:**

- **Input:** n = 1000
- **Output:** 1333
- **Explanation:**
  - 1333 is numerically balanced since:
    - The digit 1 occurs 1 time.
    - The digit 3 occurs 3 times.
  - It is also the smallest numerically balanced number strictly greater than 1000.
  - Note that 1022 cannot be the answer because 0 appeared more than 0 times.

**Example 3:**

- **Input:** n = 3000
- **Output:** 3133
- **Explanation:**
  - 3133 is numerically balanced since:
    - The digit 1 occurs 1 time.
    - The digit 3 occurs 3 times.
  - It is also the smallest numerically balanced number strictly greater than 3000.

**Constraints:**
- `0 <= n <= 10⁶`


**Hint:**
1. How far away can the next greater numerically balanced number be from n?
2. With the given constraints, what is the largest numerically balanced number?



**Similar Questions:**
1. [2639. Find the Width of Columns of a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002639-find-the-width-of-columns-of-a-grid)






**Solution:**

We need to find the smallest numerically balanced number strictly greater than the given integer `n`. A number is numerically balanced if for every digit `d` present in the number, it appears exactly `d` times.

### Approach:

1. Start checking numbers from `n + 1` onwards.
2. For each number, check if it is numerically balanced.
3. To check if a number is balanced:
   - Count the occurrences of each digit in the number.
   - Ensure that for every digit `d` that appears in the number, the count of `d` is exactly `d`. If any digit violates this condition, the number is not balanced.
4. The first number that satisfies this condition is returned as the result.

This method efficiently checks each subsequent number until the condition is met. Given the constraints (`n ≤ 10^6`), this approach is feasible as the next balanced number is typically not too far from `n`.

Let's implement this solution in PHP: **[2048. Next Greater Numerically Balanced Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002048-next-greater-numerically-balanced-number/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function nextBeautifulNumber($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}


/**
 * Check if a number is numerically balanced
 *
 * @param $num
 * @return bool
 */
function isBalanced($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo nextBeautifulNumber(1) . "\n";     // Output: 22
echo nextBeautifulNumber(1000) . "\n";  // Output: 1333
echo nextBeautifulNumber(3000) . "\n";  // Output: 3133
?>
```

### Explanation:

1. **Initialization**: We start by initializing `candidate` to `n + 1`, the first number to check.
2. **Checking Loop**: We enter a loop that continues until a balanced number is found. For each `candidate`, we check if it is balanced using the helper function `isBalanced`.
3. **Balanced Check**: The `isBalanced` function counts the occurrences of each digit in the number. It then checks if every digit that appears does so exactly as many times as its value. If any digit fails this check, the function returns `false`; otherwise, it returns `true`.
4. **Result**: Once a balanced number is found, it is returned immediately.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**