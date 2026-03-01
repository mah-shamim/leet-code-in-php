1689\. Partitioning Into Minimum Number Of Deci-Binary Numbers

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Greedy`, `Weekly Contest 219`

A decimal number is called **deci-binary** if each of its digits is either `0` or `1` without any leading zeros. For example, `101` and `1100` are **deci-binary**, while `112` and `3001` are not.

Given a string `n` that represents a positive decimal integer, return _the **minimum** number of positive **deci-binary** numbers needed so that they sum up to `n`_.

**Example 1:**

- **Input:** n = "32"
- **Output:** 3
- **Explanation:** 10 + 11 + 11 = 32

**Example 2:**

- **Input:** n = "82734"
- **Output:** 8

**Example 3:**

- **Input:** n = "27346209830709182346"
- **Output:** 9

**Constraints:**

- `1 <= n.length <= 10⁵`
- `n` consists of only digits.
- `n` does not contain any leading zeros and represents a positive integer.


**Hint:**
1. Think about if the input was only one digit. Then you need to add up as many ones as the value of this digit.
2. If the input has multiple digits, then you can solve for each digit independently, and merge the answers to form numbers that add up to that input.
3. Thus, the answer is equal to the max digit.






**Solution:**

The problem asks for the minimum number of positive deci‑binary numbers (numbers consisting only of digits 0 and 1) that sum to a given positive decimal integer `n`. The key insight is that each digit of the result can be built independently: for any column (place value), the sum of the digits from the deci‑binary numbers must equal the digit of `n` in that column. Since each deci‑binary number contributes at most 1 to any column, the minimum number of such numbers needed is simply the maximum digit appearing in `n`. The solution therefore scans the string representation of `n`, tracks the largest digit encountered, and returns that value.

### Approach:

- **Key observation:** Every deci‑binary number contributes at most a `1` in any given decimal position.
- **Greedy reasoning:** To achieve a digit `d` in a specific column, we need at least `d` deci‑binary numbers that have a `1` in that column (because each can provide at most one `1`).
- **Independence of columns:** Different columns can be handled simultaneously—we can think of constructing the deci‑binary numbers column by column.
- **Minimum number = max digit:** The overall minimum number of deci‑binary numbers required is therefore the largest digit present in the input string.
- **Optimisation:** As soon as the digit `9` is found, we can stop because no digit can be larger.

Let's implement this solution in PHP: **[1689. Partitioning Into Minimum Number Of Deci-Binary Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001689-partitioning-into-minimum-number-of-deci-binary-numbers/solution.php)**

```php
<?php
/**
 * @param String $n
 * @return Integer
 */
function minPartitions(string $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minPartitions("32") . "\n";                                // Output: 3
echo minPartitions("82734") . "\n";                             // Output: 8
echo minPartitions("27346209830709182346") . "\n";              // Output: 9
echo minPartitions("1") . "\n";                                 // Output: 1
echo minPartitions("999") . "\n";                               // Output: 9
?>
```

### Explanation:

- Initialize a variable `$maxDigit = 0` to store the highest digit seen so far.
- Determine the length of the input string `$n` using `strlen($n)`.
- Iterate over each character of the string (each digit):
   - Convert the character to an integer with `(int) $n[$i]`.
   - If the current digit is greater than the current `$maxDigit`, update `$maxDigit`.
   - If `$maxDigit` reaches `9`, break the loop early because no larger digit exists.
- After the loop, return `$maxDigit` as the minimum number of deci‑binary numbers required.

### Complexity
- **Time Complexity**: O(L) where L is the length of the input string. In the worst case we examine every digit once; if a `9` is found early, we stop sooner.
- **Space Complexity**: O(1) because we only use a few scalar variables, regardless of the input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**