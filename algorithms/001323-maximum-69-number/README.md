1323\. Maximum 69 Number

**Difficulty:** Easy

**Topics:** `Math`, `Greedy`, `Weekly Contest 172`

You are given a positive integer `num` consisting only of digits `6` and `9`.

Return _the maximum number you can get by changing **at most** one digit (`6` becomes `9`, and `9` becomes `6`)_.

**Example 1:**

- **Input:** num = 9669
- **Output:** 9969
- **Explanation:**
  Changing the first digit results in 6669.
  Changing the second digit results in 9969.
  Changing the third digit results in 9699.
  Changing the fourth digit results in 9666.
  The maximum number is 9969.

**Example 2:**

- **Input:** num = 9996
- **Output:** 9999
- **Explanation:** Changing the last digit 6 to 9 results in the maximum number.

**Example 3:**

- **Input:** num = 9999
- **Output:** 9999
- **Explanation:** It is better not to apply any change.

**Constraints:**

- <code>1 <= num <= 10<sup>4</sup></code>
- `num` consists of only `6` and `9` digits.



**Hint:**
1. Convert the number in an array of its digits.
2. Brute force on every digit to get the maximum number.






**Solution:**

We need to find the maximum number achievable by changing at most one digit in a given positive integer composed only of digits '6' and '9'. The key observation here is that changing a '6' to '9' increases the number's value, while changing a '9' to '6' decreases it. Therefore, the optimal strategy is to change the leftmost '6' to '9' to maximize the increase in the number's value. If there are no '6's, the number is already at its maximum value.

### Approach
1. **Convert the number to a string**: This allows easy traversal and manipulation of each digit.
2. **Traverse the digits from left to right**: For each digit in the string:
    - If the digit is '6', change it to '9' and break out of the loop immediately. This ensures only the leftmost '6' is changed, maximizing the increase in the number's value.
3. **Convert the modified string back to an integer**: Return this integer as the result.

This approach efficiently finds the optimal digit to change in a single pass through the digits, leveraging the fact that changing the leftmost '6' yields the highest possible value.

Let's implement this solution in PHP: **[1323. Maximum 69 Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001323-maximum-69-number/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @return Integer
 */
function maximum69Number ($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximum69Number(9669) . "\n"; // Output: 9969
echo maximum69Number(9996) . "\n"; // Output: 9999
echo maximum69Number(9999) . "\n"; // Output: 9999
?>
```

### Explanation:

1. **Convert the number to a string**: The integer `num` is converted to a string to facilitate character-by-character processing.
2. **Process each character**: The loop checks each character from left to right:
    - Upon encountering the first '6', it is changed to '9', and the loop terminates immediately. This change ensures the largest possible increase in the number's value since the leftmost digit has the highest place value.
3. **Return the result**: The modified string is converted back to an integer and returned. If no '6' is found, the original number is returned unchanged, as it is already the maximum possible.

This approach efficiently maximizes the number's value with minimal operations, leveraging a greedy strategy to prioritize the leftmost '6' for conversion. The time complexity is O(n), where n is the number of digits in `num`, as it involves a single pass through the digits. The space complexity is O(n) to store the string representation of the number.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**