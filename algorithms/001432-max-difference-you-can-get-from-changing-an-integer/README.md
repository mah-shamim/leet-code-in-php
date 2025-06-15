1432\. Max Difference You Can Get From Changing an Integer

**Difficulty:** Medium

**Topics:** `Math`, `Greedy`

You are given an integer `num`. You will apply the following steps to `num` **two** separate times:

- Pick a digit `x (0 <= x <= 9)`.
- Pick another digit `y (0 <= y <= 9)`. Note `y` can be equal to `x`.
- Replace all the occurrences of `x` in the decimal representation of `num` by `y`.

Let `a` and `b` be the two results from applying the operation to `num` _independently_.

Return _the max difference between `a` and `b`_.

**Note** that neither `a` nor `b` may have any leading zeros, and **must not** be 0.

**Example 1:**

- **Input:** num = 555
- **Output:** 888
- **Explanation:** The first time pick x = 5 and y = 9 and store the new integer in a.
  The second time pick x = 5 and y = 1 and store the new integer in b.
  We have now a = 999 and b = 111 and max difference = 888

**Example 2:**

- **Input:** num = 9
- **Output:** 8
- **Explanation:** The first time pick x = 9 and y = 9 and store the new integer in a.
  The second time pick x = 9 and y = 1 and store the new integer in b.
  We have now a = 9 and b = 1 and max difference = 8

**Constraints:**

- <code>1 <= num <= 10<sup>8</sup></code>


**Hint:**
1. We need to get the max and min value after changing num and the answer is max - min.
2. Use brute force, try all possible changes and keep the minimum and maximum values.






**Solution:**

We need to find the maximum possible difference between two numbers derived from the given integer `num` by applying two separate operations. Each operation involves replacing all occurrences of a chosen digit `x` with another digit `y` (which can be the same as `x`). The resulting numbers must not have leading zeros and must not be zero.

### Approach
1. **Problem Analysis**: The goal is to generate all possible valid numbers by replacing every occurrence of a digit `x` in `num` with another digit `y`. The constraints are that the resulting number must not have leading zeros (unless it's a single zero, which is also invalid) and must not be zero.
2. **Brute Force Generation**: We generate all possible numbers by iterating over all possible values of `x` (0 to 9) and `y` (0 to 9). For each pair `(x, y)`, we construct a new number by replacing every occurrence of `x` in `num` with `y`.
3. **Validation Checks**: For each generated number, we check:
   - **Leading Zeros**: If the number has more than one digit and starts with '0', it is invalid.
   - **Zero Check**: If the number is "0", it is invalid.
4. **Tracking Valid Numbers**: Valid numbers are stored in a set to avoid duplicates.
5. **Result Calculation**: The maximum difference is obtained by subtracting the smallest valid number from the largest valid number in the set.

Let's implement this solution in PHP: **[1432. Max Difference You Can Get From Changing an Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001432-max-difference-you-can-get-from-changing-an-integer/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @return Integer
 */
function maxDiff($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo maxDiff(555); // Output: 888
echo "\n";
echo maxDiff(9);   // Output: 8
?>
```

### Explanation:

1. **Initialization**: Convert the input number `num` to a string to process each digit individually.
2. **Generating Candidates**: For each digit `x` (0-9) and each replacement digit `y` (0-9):
   - Construct a new string by replacing every occurrence of `x` in the original string with `y`.
3. **Validation**:
   - Skip candidates that start with '0' and have more than one digit (leading zeros).
   - Skip the candidate "0" as it is invalid.
4. **Storing Valid Numbers**: Convert valid candidate strings to integers and store them in a set to avoid duplicates.
5. **Result Calculation**: The maximum difference is computed as the difference between the largest and smallest numbers in the set. If no valid numbers are generated (though constraints ensure at least one), return 0.

This approach efficiently explores all possible valid transformations of the input number, ensuring the solution meets the problem constraints and requirements. The use of a set ensures optimal storage and retrieval of unique valid numbers, and the final difference is straightforward to compute.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**