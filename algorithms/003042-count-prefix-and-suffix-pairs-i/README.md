3042\. Count Prefix and Suffix Pairs I

**Difficulty:** Easy

**Topics:** `Array`, `String`, `Trie`, `Rolling Hash`, `String Matching`, `Hash Function`

You are given a **0-indexed** string array words.

Let's define a **boolean** function `isPrefixAndSuffix` that takes two strings, `str1` and `str2`:

- `isPrefixAndSuffix(str1, str2)` returns `true` if `str1` is **both** a prefix[^1] and a suffix[^2] of `str2`, and `false` otherwise.

For example, `isPrefixAndSuffix("aba", "ababa")` is `true` because `"aba"` is a prefix of `"ababa"` and also a suffix, but `isPrefixAndSuffix("abc", "abcd")` is `false`.

Return an integer denoting the **number** of index pairs `(i, j)` such that `i < j`, and `isPrefixAndSuffix(words[i], words[j])` is `true`.

**Example 1:**

- **Input:** words = ["a","aba","ababa","aa"]
- **Output:** 4
- **Explanation:** In this example, the counted index pairs are:
  i = 0 and j = 1 because isPrefixAndSuffix("a", "aba") is true.
  i = 0 and j = 2 because isPrefixAndSuffix("a", "ababa") is true.
  i = 0 and j = 3 because isPrefixAndSuffix("a", "aa") is true.
  i = 1 and j = 2 because isPrefixAndSuffix("aba", "ababa") is true.
  Therefore, the answer is 4.

**Example 2:**

- **Input:** words = ["pa","papa","ma","mama"]
- **Output:** 2
- **Explanation:** In this example, the counted index pairs are:
  i = 0 and j = 1 because isPrefixAndSuffix("pa", "papa") is true.
  i = 2 and j = 3 because isPrefixAndSuffix("ma", "mama") is true.
  Therefore, the answer is 2.


**Example 3:**

- **Input:** words = ["abab","ab"]
- **Output:** 0
- **Explanation:** In this example, the only valid index pair is i = 0 and j = 1, and isPrefixAndSuffix("abab", "ab") is false.
  Therefore, the answer is 0.



**Constraints:**

- `1 <= words.length <= 50`
- `1 <= words[i].length <= 10`
- `words[i]` consists only of lowercase English letters.


**Hint:**
1. Iterate through all index pairs `(i, j)`, such that `i < j`, and check `isPrefixAndSuffix(words[i], words[j])`.
2. The answer is the total number of pairs where `isPrefixAndSuffix(words[i], words[j]) == true`.

[^1]: **Prefix** `A prefix of a string is a substring that starts from the beginning of the string and extends to any point within it.`
[^2]: **Suffix** `A suffix of a string is a substring that begins at any point in the string and extends to its end.`

**Solution:**

We need to iterate through all index pairs `(i, j)` where `i < j` and check whether the string `words[i]` is both a prefix and a suffix of `words[j]`. For each pair, we can use PHP's built-in functions `substr()` to check for prefixes and suffixes.

Let's implement this solution in PHP: **[3042. Count Prefix and Suffix Pairs I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003042-count-prefix-and-suffix-pairs-i/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @return Integer
 */
function countPrefixAndSuffixPairs($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Function to check if str1 is both a prefix and a suffix of str2
 *
 * @param $str1
 * @param $str2
 * @return bool
 */
function isPrefixAndSuffix($str1, $str2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$words1 = ["a", "aba", "ababa", "aa"];
$words2 = ["pa", "papa", "ma", "mama"];
$words3 = ["abab", "ab"];

echo countPrefixAndSuffixPairs($words1) . "\n";  // Output: 4
echo countPrefixAndSuffixPairs($words2) . "\n";  // Output: 2
echo countPrefixAndSuffixPairs($words3) . "\n";  // Output: 0
?>
```

### Explanation:

1. **countPrefixAndSuffixPairs($words):**
   - This function loops through all possible index pairs `(i, j)` such that `i < j`.
   - It calls `isPrefixAndSuffix()` to check if `words[i]` is both a prefix and a suffix of `words[j]`.
   - If the condition is true, it increments the count.

2. **isPrefixAndSuffix($str1, $str2):**
   - This helper function checks whether `str1` is both a prefix and a suffix of `str2`.
   - It uses `substr()` to extract the prefix and suffix of `str2` and compares them with `str1`.
   - If both conditions are true, it returns `true`, otherwise, it returns `false`.

### Time Complexity:
- The time complexity is _**O(n<sup>2</sup> x m)**_, where `n` is the length of the `words` array, and `m` is the average length of the strings in the array. This is due to the nested loops and the `substr()` operations.

### Example Output:
For the given input arrays:
- `["a", "aba", "ababa", "aa"]` -> Output: `4`
- `["pa", "papa", "ma", "mama"]` -> Output: `2`
- `["abab", "ab"]` -> Output: `0`

This solution should work efficiently within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
