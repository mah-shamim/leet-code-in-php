869\. Reordered Power of 2

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `Sorting`, `Counting`, `Enumeration`, `Weekly Contest 93`

You are given an integer `n`. We reorder the digits in any order (including the original order) such that the leading digit is not zero.

Return `true` _if and only if we can do this so that the resulting number is a power of two_.

**Example 1:**

- **Input:** n = 1
- **Output:** true

**Example 2:**

- **Input:** n = 10
- **Output:** false

**Constraints:**

- <code>1 <= n <= 10<sup>9</sup></code>






**Solution:**

We need to determine if we can reorder the digits of a given integer `n` such that the resulting number (with no leading zeros) is a power of two. The solution involves checking all possible powers of two that have the same number of digits as `n` and comparing their digit frequencies with that of `n`. If any power of two matches the digit frequency of `n`, then it's possible to reorder `n` to form that power of two.

### Approach
1. **Convert the integer to a string**: This allows us to easily access each digit and determine the length of the number.
2. **Count digit frequencies**: Create a frequency array for the digits in `n` to compare with potential powers of two.
3. **Generate powers of two**: Starting from 1 (2<sup>0</sup>), generate subsequent powers of two as strings. For each generated power:
    - **Check the length**: If the length matches the length of `n`, count its digit frequencies.
    - **Compare frequencies**: If the digit frequencies match those of `n`, return `true`.
4. **Terminate early**: If the generated power of two exceeds the length of `n`, terminate the loop since further powers will only have more digits.
5. **Return result**: If no matching power of two is found after checking all relevant powers, return `false`.

Let's implement this solution in PHP: **[869. Reordered Power of 2](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000869-reordered-power-of-2/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function reorderedPowerOf2($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @return array
 */
function count_frequency($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @return string
 */
function multiply_by_2($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(reorderedPowerOf2(1));  // true
var_dump(reorderedPowerOf2(10)); // false
?>
```

### Explanation:

1. **Digit Frequency Check**: The `count_frequency` function creates an array of size 10 (for digits 0-9) and counts occurrences of each digit in the input string.
2. **Power of Two Generation**: The `multiply_by_2` function takes a string representation of a number and multiplies it by 2, handling carry-over to produce the result as a string.
3. **Main Loop**: Starting from "1" (2<sup>0</sup>), the loop generates each subsequent power of two. For each power:
    - If its length matches `n`'s length, its digit frequencies are compared with `n`'s.
    - If frequencies match, `true` is returned immediately.
    - The loop terminates when a power of two exceeds the length of `n`.
4. **Result**: If no matching power is found after all relevant checks, the function returns `false`.

This approach efficiently checks all possible powers of two with the same digit length as `n` by leveraging digit frequency comparison, ensuring optimal performance even for large values of `n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**