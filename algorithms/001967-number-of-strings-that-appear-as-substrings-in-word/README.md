1967\. Number of Strings That Appear as Substrings in Word

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `String`, `Weekly Contest 254`

Given an array of strings `patterns` and a string `word`, return _the **number** of strings in `patterns` that exist as a **substring** in `word`_.

A **substring** is a contiguous sequence of characters within a string.

**Example 1:**

- **Input:** patterns = ["a","abc","bc","d"], word = "abc"
- **Output:** 3
- **Explanation:**
  - "a" appears as a substring in "<ins>a</ins>bc".
  - "abc" appears as a substring in "<ins>abc</ins>".
  - "bc" appears as a substring in "a<ins>bc</ins>".
  - "d" does not appear as a substring in "abc".
  - 3 of the strings in patterns appear as a substring in word.

**Example 2:**

- **Input:** patterns = ["a","b","c"], word = "aaaaabbbbb"
- **Output:** 2
- **Explanation:**
  - "a" appears as a substring in "a<ins>a</ins>aaabbbbb".
  - "b" appears as a substring in "aaaaabbbb<ins>b</ins>".
  - "c" does not appear as a substring in "aaaaabbbbb".
  - 2 of the strings in patterns appear as a substring in word.

**Example 3:**

- **Input:** patterns = ["a","a","a"], word = "ab"
- **Output:** 3
- **Explanation:** Each of the patterns appears as a substring in word "<ins>a</ins>b".

**Example 4:**

- Input: patterns = ["abcd"], word = "abc"
- Output: 0

**Example 5:**

- Input: patterns = ["hello"], word = "hello"
- Output: 1

**Example 6:**

- Input: patterns = ["x","y","z"], word = "xyz"
- Output: 3

**Example 7:**

- Input: patterns = ["p","q","r"], word = "abc"
- Output: 0

**Example 8:**

- Input: patterns = ["a","b"], word = "a"
- Output: 1

**Constraints:**

- `1 <= patterns.length <= 100`
- `1 <= patterns[i].length <= 100`
- `1 <= word.length <= 100`
- `patterns[i]` and `word` consist of lowercase English letters.


**Hint:**
1. Deal with each of the patterns individually.
2. Use the built-in function in the language you are using to find if the pattern exists as a substring in `word`.


**Solution:**

We need to count how many strings from the given `patterns` array appear as substrings within the `word` string. The solution iterates through each pattern, checks if it exists in `word` using PHP's built-in `str_contains()` function, and increments a counter for each match.

## Approach

- Initialize a counter variable to 0.
- Loop through each `$pattern` in the `$patterns` array.
- For each pattern, use PHP's `str_contains($word, $pattern)` to check if the pattern is a substring of `word`.
- If the pattern is found, increment the counter.
- After processing all patterns, return the counter.

Let's implement this solution in PHP: **[1967. Number of Strings That Appear as Substrings in Word](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001967-number-of-strings-that-appear-as-substrings-in-word/solution.php)**

```php
<?php
/**
 * @param String[] $patterns
 * @param String $word
 * @return Integer
 */
function numOfStrings(array $patterns, string $word): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numOfStrings(["a","abc","bc","d"], "abc") .  "\n";         // Output: 3
echo numOfStrings(["a","b","c"], "aaaaabbbbb") .  "\n";         // Output: 2
echo numOfStrings(["a","a","a"], "ab") .  "\n";                 // Output: 3
echo numOfStrings(["abcd"], "abc") .  "\n";                     // Output: 0
echo numOfStrings(["hello"], "hello") .  "\n";                  // Output: 1
echo numOfStrings(["x","y","z"], "xyz") .  "\n";                // Output: 3
echo numOfStrings(["p","q","r"], "abc") .  "\n";                // Output: 0
echo numOfStrings(["a","b"], "a") .  "\n";                      // Output: 1
?>
```

### Explanation:

- **Simple iteration:** The solution iterates over each pattern in the input array.
- **Built‑in substring check:** PHP's `str_contains()` function efficiently checks whether a string contains a given substring.
- **Case sensitivity:** Since both `patterns` and `word` consist of lowercase letters, case sensitivity is not an issue.
- **Duplicates handled naturally:** Each occurrence in the `patterns` array is checked independently, so duplicate patterns are counted separately (as required by the problem).
- **Early exit not needed:** Since we must check all patterns, we simply accumulate the result.

## Complexity Analysis

- **Time Complexity:** _**O(n * m)**_ in the worst case, where:
   - `n` = number of patterns (≤ 100)
   - `m` = length of `word` (≤ 100)
   - The actual substring search is handled by PHP's internal implementation, which is generally efficient (typically _**O(n*m)**_ worst-case, but optimized).
- **Space Complexity:** _**O(1)**_ – only a single integer counter is used, regardless of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**