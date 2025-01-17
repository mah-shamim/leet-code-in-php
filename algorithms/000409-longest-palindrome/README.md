409\. Longest Palindrome

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Greedy`

Given a string `s` which consists of lowercase or uppercase letters, return the length of the **longest** palindrome[^1]
that can be built with those letters.

Letters are **case sensitive**, for example, `"Aa"` is not considered a palindrome.

**Example 1:**

- **Input:** s = "abccccdd"
- **Output:** 7
- **Explanation:** One longest palindrome that can be built is "dccaccd", whose length is 7.

**Example 2:**

- **Input:** s = "a"
- **Output:** 1
- **Explanation:** The longest palindrome that can be built is "a", whose length is 1.

**Constraints:**

- <code>1 <= s.length <= 2000</code>
- `s` consists of lowercase **and/or** uppercase English letters only.

[^1]: **Palindrome** `A palindrome is a string that reads the same forward and backward.`



**Solution:**

We can use a hash table to count the occurrences of each character. The key insight here is:

1. Characters that appear an even number of times can fully contribute to the palindrome.
2. Characters that appear an odd number of times can contribute up to the largest even number that is less than or equal to their count. However, you can use one odd character as the center of the palindrome, so we can add 1 to the final length if there's at least one character with an odd count.


Let's implement this solution in PHP: **[409. Longest Palindrome](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000409-longest-palindrome/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function longestPalindrome($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$solution = new Solution();
echo $solution->longestPalindrome("abccccdd");  // Output: 7
echo $solution->longestPalindrome("a");  // Output: 1
?>
```

### Explanation:

1. **Character Counting:** We use an associative array `$charCount` to keep track of the number of occurrences of each character in the string.

2. **Calculate the Palindrome Length:**
    - We iterate through the count of each character:
        - If the count is even, we add the full count to the palindrome length.
        - If the count is odd, we add the largest even portion (`$count - 1`) to the palindrome length and mark that we have found an odd count.
    - If there was at least one character with an odd count, we add `1` to the length to account for the middle character of the palindrome.

3. **Edge Cases:** The solution handles cases with strings of length 1 and mixed case sensitivity.

This approach ensures an optimal solution with a time complexity of O(n), where n is the length of the string `s`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**




