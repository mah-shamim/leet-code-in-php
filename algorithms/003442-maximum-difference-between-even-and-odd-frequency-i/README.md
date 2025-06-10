3442\. Maximum Difference Between Even and Odd Frequency I

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Counting`

You are given a string `s` consisting of lowercase English letters.

Your task is to find the **maximum** <code>difference diff = freq(a<sup>1</sup>) - freq(a<sup>2</sup>)</code> between the frequency of characters <code>a<sup>1</sup></code> and <code>a<sup>2</sup></code> in the string such that:

- <code>a<sup>1</sup></code> has an **odd frequency** in the string.
- <code>a<sup>2</sup></code> has an **even frequency** in the string.

Return _this **maximum** difference_.

**Example 1:**

- **Input:** s = "aaaaabbc"
- **Output:** 3
- **Explanation:**
  - The character `'a'` has an **odd frequency** of `5`, and `'b'` has an **even frequency** of `2`.
  - The maximum difference is `5 - 2 = 3`.


**Example 2:**

- **Input:** s = "abcabcab"
- **Output:** 1
- **Explanation:**
  - The character `'a'` has an **odd frequency** of `3`, and `'c'` has an **even frequency** of `2`.
  - The maximum difference is `3 - 2 = 1`.



**Constraints:**

- `3 <= s.length <= 100`
- `s` consists only of lowercase English letters.
- `s` contains at least one character with an odd frequency and one with an even frequency.


**Hint:**
1. Use a frequency map to identify the maximum odd and minimum even frequencies. Then, calculate their difference.






**Solution:**

We need to find the maximum difference between the frequency of a character with an odd frequency and a character with an even frequency in a given string. The solution involves counting the frequencies of each character, categorizing them based on whether their frequencies are odd or even, and then computing the maximum difference between the highest odd frequency and the lowest even frequency.

### Approach
1. **Frequency Counting**: First, we count the frequency of each character in the string using a hash table (or an associative array in PHP). This helps us know how many times each character appears.
2. **Categorize Frequencies**: We separate the frequencies into two groups: one for characters with odd frequencies and another for characters with even frequencies.
3. **Find Maximum Odd and Minimum Even**: From the odd frequencies group, we find the highest frequency. From the even frequencies group, we find the lowest frequency.
4. **Compute Maximum Difference**: The result is obtained by subtracting the smallest even frequency from the largest odd frequency.

Let's implement this solution in PHP: **[3442. Maximum Difference Between Even and Odd Frequency I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003442-maximum-difference-between-even-and-odd-frequency-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxDifference($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$s1 = "aaaaabbc";
echo "Input: $s1\n";
echo "Output: " . maxDifference($s1) . "\n"; // Output: 3

// Example 2
$s2 = "abcabcab";
echo "Input: $s2\n";
echo "Output: " . maxDifference($s2) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Frequency Counting**: The function `array_count_values` is used to count the occurrences of each character in the string. This returns an associative array where keys are characters and values are their respective counts.
2. **Categorization**: We iterate through the frequency counts. For each count, we check if it is odd or even. Odd counts are added to the `$odd_freqs` array, and even counts are added to the `$even_freqs` array.
3. **Finding Extremes**: Using the `max` function, we find the largest value in the `$odd_freqs` array. Similarly, using the `min` function, we find the smallest value in the `$even_freqs` array.
4. **Result Calculation**: The result is computed as the difference between the largest odd frequency and the smallest even frequency, which is returned as the solution.

This approach efficiently categorizes the frequencies and leverages simple arithmetic operations to derive the solution, ensuring optimal performance with a time complexity of O(n), where n is the length of the string. The space complexity is O(1) since the number of distinct characters is bounded by the alphabet size (26 lowercase English letters).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**