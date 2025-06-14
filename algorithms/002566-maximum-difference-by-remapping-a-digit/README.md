2566\. Maximum Difference by Remapping a Digit

**Difficulty:** Easy

**Topics:** `Math`, `Greedy`

You are given an integer `num`. You know that Bob will sneakily **remap** one of the `10` possible digits (`0` to `9`) to another digit.

Return _the difference between the maximum and minimum values Bob can make by remapping **exactly one** digit in `num`_.

**Notes**:

- When Bob remaps a digit d1 to another digit d2, Bob replaces all occurrences of `d1` in `num` with `d2`.
- Bob can remap a digit to itself, in which case `num` does not change.
- Bob can remap different digits for obtaining minimum and maximum values respectively.
- The resulting number after remapping can contain leading zeroes.


**Example 1:**

- **Input:** num = 11891
- **Output:** 99009
- **Explanation:**
  To achieve the maximum value, Bob can remap the digit 1 to the digit 9 to yield 99899.
  To achieve the minimum value, Bob can remap the digit 1 to the digit 0, yielding 890.
  The difference between these two numbers is 99009.

**Example 2:**

- **Input:** num = 90
- **Output:** 99
- **Explanation:**
  The maximum value that can be returned by the function is 99 (if 0 is replaced by 9) and the minimum value that can be returned by the function is 0 (if 9 is replaced by 0).
  Thus, we return 99.

**Constraints:**

- <code>1 <= num <= 10<sup>8</sup></code>

**Hint:**
1. Try to remap the first non-nine digit to 9 to obtain the maximum number.
2. Try to remap the first non-zero digit to 0 to obtain the minimum number.






**Solution:**

We need to determine the difference between the maximum and minimum values Bob can obtain by remapping exactly one digit in the given integer `num`. The remapping involves replacing all occurrences of a chosen digit with another digit. The solution involves two main steps: finding the maximum possible value after remapping and finding the minimum possible value after remapping, then computing their difference.

### Approach
1. **Convert the number to a string**: This allows us to process each digit individually.
2. **Find the maximum value**:
   - Traverse the string from left to right until the first non-'9' digit is encountered.
   - Replace all occurrences of this digit with '9' to maximize the number.
   - If all digits are '9', the number remains unchanged.
3. **Find the minimum value**:
   - Replace all occurrences of the first digit with '0' to minimize the number. This works because leading zeros are allowed, and replacing the first digit (which is non-zero) with '0' effectively reduces the number's value.
4. **Compute the difference**: Convert the modified strings for maximum and minimum values back to integers and return their difference.

Let's implement this solution in PHP: **[2566. Maximum Difference by Remapping a Digit](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002566-maximum-difference-by-remapping-a-digit/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @return Integer
 */
function minMaxDifference($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
echo minMaxDifference(11891) . "\n"; // Output: 99009
echo minMaxDifference(90) . "\n";    // Output: 99
?>
```

### Explanation:

1. **Convert the number to a string**: This step facilitates processing each digit individually.
2. **Finding the maximum value**:
   - Iterate through each digit of the string from left to right.
   - The first non-'9' digit encountered is replaced with '9' in the entire string. This replacement maximizes the number because replacing a digit with '9' at the earliest possible position increases the number's value the most.
   - If all digits are '9', the number remains the same since replacing '9' with '9' doesn't change anything.
3. **Finding the minimum value**:
   - The first digit of the string is chosen for replacement because replacing it with '0' minimizes the number. Leading zeros are allowed, so replacing the first digit (which is non-zero) with '0' reduces the number's value significantly.
   - All occurrences of this first digit are replaced with '0'.
4. **Compute the difference**: The modified strings for maximum and minimum values are converted back to integers. The difference between these integers is returned as the result.

This approach efficiently computes the desired difference by leveraging simple string manipulation and arithmetic operations, ensuring optimal performance even for large numbers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**