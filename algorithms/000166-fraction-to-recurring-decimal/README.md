166\. Fraction to Recurring Decimal

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `String`

Given two integers representing the `numerator` and `denominator` of a fraction, return _the fraction in string format_.

If the fractional part is repeating, enclose the repeating part in parentheses.

If multiple answers are possible, return **any of them**.

It is **guaranteed** that the length of the answer string is less than <code>10<sup>4</sup></code> for all the given inputs.

**Example 1:**

- **Input:** numerator = 1, denominator = 2
- **Output:** "0.5"

**Example 2:**

- **Input:** numerator = 2, denominator = 1
- **Output:** "2"

**Example 3:**

- **Input:** numerator = 4, denominator = 333
- **Output:** "0.(012)"

**Constraints:**

- <code>-2<sup>31</sup> <= numerator, denominator <= 2<sup>31</sup> - 1</code>
- `denominator != 0`



**Hint:**
1. No scary math, just apply elementary math knowledge. Still remember how to perform a _long division_?
2. Try a long division on 4/9, the repeating part is obvious. Now try 4/333. Do you see a pattern?
3. Notice that once the remainder starts repeating, so does the divided result.
4. Be wary of edge cases! List out as many test cases as you can think of and test your code thoroughly.






**Solution:**

We need to convert a fraction into its string representation, handling repeating decimals by enclosing the repeating part in parentheses. The solution involves simulating the long division process while keeping track of remainders to detect cycles.

### Approach
1. **Handle Edge Cases**: If the numerator is zero, return "0" immediately.
2. **Determine Sign**: Check if the result should be negative by examining the signs of the numerator and denominator.
3. **Integer Part**: Compute the integer part of the division by dividing the absolute values of the numerator and denominator.
4. **Fractional Part**: Use long division to compute the fractional part. Keep track of remainders using a hash map to detect repeating cycles. If a remainder repeats, enclose the repeating part in parentheses.

Let's implement this solution in PHP: **[166. Fraction to Recurring Decimal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000166-fraction-to-recurring-decimal/solution.php)**

```php
<?php
/**
 * @param Integer $numerator
 * @param Integer $denominator
 * @return String
 */
function fractionToDecimal($numerator, $denominator) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo fractionToDecimal(1, 2) . "\n";     // "0.5"
echo fractionToDecimal(2, 1) . "\n";     // "2"
echo fractionToDecimal(4, 333) . "\n";   // "0.(012)"
echo fractionToDecimal(1, 6) . "\n";     // "0.1(6)"
echo fractionToDecimal(-50, 8) . "\n";   // "-6.25"
echo fractionToDecimal(7, -12) . "\n";   // "-0.58(3)"
?>
```

### Explanation:

1. **Edge Case Handling**: If the numerator is zero, the result is immediately "0".
2. **Sign Determination**: The sign of the result is determined by checking if either the numerator or denominator is negative, but not both.
3. **Integer Part Calculation**: The integer part is computed by dividing the absolute values of the numerator and denominator.
4. **Fractional Part Calculation**: The fractional part is computed using long division. Remainders are tracked in a hash map. If a remainder repeats, the fractional part is split at the position of the first occurrence of the remainder, and the repeating part is enclosed in parentheses.
5. **Result Construction**: The final result is constructed by combining the sign, integer part, and fractional part (if any).

This approach efficiently handles both non-repeating and repeating decimals by leveraging the properties of long division and cycle detection using a hash map. The solution ensures that all edge cases, including negative numbers and zero, are handled correctly.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**