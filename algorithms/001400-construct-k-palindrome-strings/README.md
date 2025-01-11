1400\. Construct K Palindrome Strings

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Greedy`, `Counting`

Given a string `s` and an integer `k`, return _`true` if you can use all the characters in `s` to construct `k` palindrome strings or `false` otherwise_.

**Example 1:**

- **Input:** s = "annabelle", k = 2
- **Output:** true
- **Explanation:** You can construct two palindromes using all characters in s.
  Some possible constructions "anna" + "elble", "anbna" + "elle", "anellena" + "b"

**Example 2:**

- **Input:** s = "leetcode", k = 3
- **Output:** false
- **Explanation:** It is impossible to construct 3 palindromes using all the characters of s.


**Example 3:**

- **Input:** s = "true", k = 4
- **Output:** true
- **Explanation:** The only possible solution is to put each character in a separate string.



**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists of lowercase English letters.
- <code>1 <= k <= 10<sup>5</sup></code>


**Hint:**
1. If the s.length < k we cannot construct k strings from s and answer is false.
2. If the number of characters that have odd counts is > k then the minimum number of palindrome strings we can construct is > k and answer is false.
3. Otherwise you can construct exactly k palindrome strings and answer is true (why ?).



**Solution:**

We need to consider the following points:

### Key Observations:
1. **Palindrome Characteristics**:
   - A palindrome is a string that reads the same forwards and backwards.
   - For an even-length palindrome, all characters must appear an even number of times.
   - For an odd-length palindrome, all characters except one must appear an even number of times (the character that appears an odd number of times will be in the center).

2. **Necessary Conditions**:
   - If the length of `s` is less than `k`, it's impossible to form `k` strings, so return `false`.
   - The total number of characters that appear an odd number of times must be at most `k` to form `k` palindromes. This is because each palindrome can have at most one character with an odd count (the center character for odd-length palindromes).

### Approach:
1. Count the frequency of each character in the string.
2. Count how many characters have an odd frequency.
3. If the number of odd frequencies exceeds `k`, return `false` (because it's impossible to form `k` palindromes).

Let's implement this solution in PHP: **[1400. Construct K Palindrome Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001400-construct-k-palindrome-strings/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Boolean
 */
function canConstruct($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(canConstruct("annabelle", 2)); // Output: true
var_dump(canConstruct("leetcode", 3)); // Output: false
var_dump(canConstruct("true", 4));      // Output: true
?>
```

### Explanation:

1. **Frequency Count**: We use an associative array `$freq` to count the occurrences of each character in the string.
2. **Odd Count**: We check how many characters have odd occurrences. This will help us determine if we can form palindromes.
3. **Condition Check**: If the number of characters with odd frequencies is greater than `k`, it's impossible to form `k` palindromes, so we return `false`. Otherwise, we return `true`.

### Time Complexity:
- Counting the frequencies takes `O(n)`, where `n` is the length of the string.
- Checking the odd frequencies takes `O(m)`, where `m` is the number of distinct characters (at most 26 for lowercase English letters).
- The overall time complexity is `O(n + m)`, which simplifies to `O(n)` in this case.

### Edge Cases:
1. If `k` is greater than the length of `s`, we return `false`.
2. If all characters have even frequencies, we can always form a palindrome, so the result depends on whether `k` is possible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
