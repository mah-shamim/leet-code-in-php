273\. Integer to English Words

Hard

**Topics** : `Math`, `String`, `Recursion`

Convert a non-negative integer `num` to its English words representation.

**Example 1:**

- **Input:** num = 123
- **Output:** "One Hundred Twenty Three"

**Example 2:**

- **Input:** num = 12345
- **Output:** "Twelve Thousand Three Hundred Forty Five" 

**Example 3:**

- **Input:** num = 1234567
- **Output:** "One Million Two Hundred Thirty Four Thousand Five Hundred Sixty Seven"

**Constraints:**

- <code>0 <= num <= 2<sup>31</sup> - 1</code>

**Hint:**
1. Did you see a pattern in dividing the number into chunk of words? For example, 123 and 123000.
2. Group the number by thousands (3 digits). You can write a helper function that takes a number less than 1000 and convert just that chunk to words.
3. There are many edge cases. What are some good test cases? Does your code work with input such as 0? Or 1000010? (middle chunk is zero and should not be printed out)


**Solution:**


To solve this problem, we can follow these steps:

1. **Define the words for numbers:** We need arrays for the words representing single digits, teens, tens, and the thousands groupings.

2. **Create a helper function:** This function will handle numbers less than 1000, converting them to English words.

3. **Recursive function:** The main function will recursively process chunks of the number, adding the appropriate thousand group label (e.g., Thousand, Million, Billion).

4. **Edge cases:** Handle edge cases like `0` and numbers where intermediate chunks are zero.


Let's implement this solution in PHP: **[273. Integer to English Words](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000273-integer-to-english-words/solution.php)**

```php
<?php
// Test cases
echo numberToWords(123) . "\n"; // Output: "One Hundred Twenty Three"
echo numberToWords(12345) . "\n"; // Output: "Twelve Thousand Three Hundred Forty Five"
echo numberToWords(1234567) . "\n"; // Output: "One Million Two Hundred Thirty Four Thousand Five Hundred Sixty Seven"
?>
```

### Explanation:

1. **Main Function (`numberToWords`):**
   - Checks if the input number is `0` and returns "Zero".
   - Initializes the `thousands` array with the labels for a thousand groupings.
   - Iteratively processes the number in chunks of thousands, using the helper function to convert each chunk to words.
   - Constructs the final result string by combining the words for each chunk with the appropriate thousand group label.

2. **Helper Function (`helper`):**
   - Uses predefined arrays for numbers below 20 and for the tens multiples.
   - Recursively constructs the English words for numbers less than 1000:
      - For numbers less than 20, directly returns the corresponding word.
      - For numbers less than 100, combines the word for the tens place with the result of a recursive call for the units place.
      - For numbers 100 and above, combines the word for the hundreds place with the result of a recursive call for the remainder.

This solution handles the constraints and edge cases effectively, providing the correct English words representation for any number within the given range.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
