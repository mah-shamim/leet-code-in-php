3754\. Concatenate Non-Zero Digits and Multiply by Sum I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Weekly Contest 477`

You are given an integer `n`.

Form a new integer `x` by concatenating all the **non-zero digits** of `n` in their original order. If there are no **non-zero** digits, x = 0.

Let `sum` be the **sum of digits** in `x`.

Return _an integer representing the value of `x * sum`_.

**Example 1:**

- **Input:** n = 10203004
- **Output:** 12340
- **Explanation:**
  - The non-zero digits are 1, 2, 3, and 4. Thus, `x = 1234`.
  - The sum of digits is `sum = 1 + 2 + 3 + 4 = 10`.
  - Therefore, the answer is x` * sum = 1234 * 10 = 12340`.


**Example 2:**

- **Input:** n = 1000
- **Output:** 1
- **Explanation:**
  - The non-zero digit is 1, so `x = 1` and `sum = 1`.
  - Therefore, the answer is `x * sum = 1 * 1 = 1`.


**Example 3:**

- **Input:** n = 0
- **Output:** 0


**Example 4:**

- **Input:** n = 5
- **Output:** 25


**Example 5:**

- **Input:** n = 123456789
- **Output:** 5555555505


**Example 6:**

- **Input:** n = 101010
- **Output:** 333


**Example 7:**

- **Input:** n = 1000000000
- **Output:** 1


**Constraints:**

- `0 <= n <= 10⁹`


**Hint:**
1. Simulate as described


**Solution:**

We implement a straightforward solution that processes the input integer `n` by extracting all non-zero digits, constructing a new number from them, calculating their sum, and returning their product. Our approach handles the edge case where no non-zero digits exist by returning 0.

## Approach

- **Digit Extraction**: Convert the integer `n` to a string and split it into an array of individual digit characters
- **Filter Non-Zero Digits**: Remove all digit characters equal to '0' using array filtering
- **Edge Case Handling**: If no non-zero digits remain, return 0 immediately
- **Construct x**: Join the filtered digit characters into a string and convert to integer
- **Calculate Sum**: Sum the numeric values of all non-zero digits
- **Compute Result**: Return the product of `x` and `sum`

Let's implement this solution in PHP: **[3754. Concatenate Non-Zero Digits and Multiply by Sum I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003754-concatenate-non-zero-digits-and-multiply-by-sum-i/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function sumAndMultiply(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumAndMultiply(10203004) .  "\n";          // Output: 12340
echo sumAndMultiply(1000) .  "\n";              // Output: 1
echo sumAndMultiply(0) .  "\n";                 // Output: 0
echo sumAndMultiply(5) .  "\n";                 // Output: 25
echo sumAndMultiply(123456789) .  "\n";         // Output: 5555555505
echo sumAndMultiply(101010) .  "\n";            // Output: 333
echo sumAndMultiply(1000000000) .  "\n";        // Output: 1
?>
```

### Explanation:

- **String Conversion**: We treat the number as a string to easily access each digit individually without complex arithmetic operations
- **Zero Filtering**: We filter out '0' characters since they contribute nothing to either `x` (they don't change the numeric value when concatenated with other digits) or the sum
- **Empty Array Check**: When all digits are zero, we return 0 early to avoid processing an empty array
- **Number Reconstruction**: Joining the filtered digits creates the number formed by all non-zero digits in their original order
- **Sum Calculation**: Using `array_sum` on the digit characters automatically converts them to integers, giving us the digit sum
- **Final Multiplication**: Multiplying `x` by `sum` yields the required result per the problem specification

## Complexity Analysis

- **Time Complexity**: _**O(d)**_ where d is the number of digits in `n` (maximum `10` digits since `n ≤ 10⁹`)
   - String conversion and splitting: _**O(d)**_
   - Array filtering: _**O(d)**_
   - Array summing: _**O(d)**_
   - Join and integer conversion: _**O(d)**_

- **Space Complexity**: _**O(d)**_ for storing the digit arrays
   - The split array stores _**d**_ characters
   - The filtered array stores at most _**d**_ characters
   - Both are negligible as _**d ≤ 10**_

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**