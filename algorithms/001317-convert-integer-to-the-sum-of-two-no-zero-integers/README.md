1317\. Convert Integer to the Sum of Two No-Zero Integers

**Difficulty:** Easy

**Topics:** `Math`, `Weekly Contest 171`

**No-Zero integer** is a positive integer that **does not contain any** `0` in its decimal representation.

Given an integer `n`, return a list of two integers `[a, b]` where:

- `a` and `b` are **No-Zero integers**.
- `a + b = n`

The test cases are generated so that there is at least one valid solution. If there are many valid solutions, you can return any of them.

**Example 1:**

- **Input:** n = 2
- **Output:** [1,1]
- **Explanation:** Let a = 1 and b = 1.
  Both a and b are no-zero integers, and a + b = 2 = n.

**Example 2:**

- **Input:** n = 11
- **Output:** [2,9]
- **Explanation:** Let a = 2 and b = 9.
  Both a and b are no-zero integers, and a + b = 11 = n.
  Note that there are other valid answers as [8, 3] that can be accepted.

**Constraints:**

- <code>2 <= n <= 10<sup>4</sup></code>


**Hint:**
1. Loop through all elements from 1 to n.
2. Choose A = i and B = n - i then check if A and B are both No-Zero integers.






**Solution:**

We need to find two integers `a` and `b` such that their sum equals the given integer `n`, and neither `a` nor `b` contains the digit '0' in their decimal representation. The solution involves checking pairs of integers that sum to `n` until we find a pair where both integers are no-zero integers.

### Approach
1. **Iterate through possible pairs**: For each integer `i` from 1 to `n/2`, check if both `i` and `n - i` are no-zero integers. This range ensures we cover all possible pairs without redundancy.
2. **Check for no-zero integers**: For each candidate integer, check if it contains the digit '0' by repeatedly examining its last digit and removing it. If any digit is '0', the integer is invalid.
3. **Return the first valid pair**: As soon as we find a pair where both integers are no-zero, return them. The problem guarantees at least one such pair exists.

Let's implement this solution in PHP: **[1317. Convert Integer to the Sum of Two No-Zero Integers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001317-convert-integer-to-the-sum-of-two-no-zero-integers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer[]
 */
function getNoZeroIntegers($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $num
 * @return bool
 */
function isNoZero($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(getNoZeroIntegers(2));   // Output: [1,1]
print_r(getNoZeroIntegers(11));  // Output: [2,9] or [8,3]
print_r(getNoZeroIntegers(101)); // Output: e.g. [2,99]
?>
```

### Explanation:

1. **Main Function (`getNoZeroIntegers`)**: This function iterates through integers from 1 to `n/2`. For each integer `i`, it checks if both `i` and `n - i` are no-zero integers using the helper function `isNoZero`. If a valid pair is found, it returns them as an array.
2. **Helper Function (`isNoZero`)**: This function checks if a number contains the digit '0'. It does this by repeatedly checking the last digit of the number (using modulo 10) and then removing the last digit (by integer division by 10). If any digit is '0', it returns false; otherwise, it returns true after processing all digits.

This approach efficiently checks all possible pairs of integers that sum to `n`, ensuring that both integers in the pair do not contain the digit '0'. The solution is optimal due to the constraints and guarantees finding a valid pair.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**