2185\. Counting Words With a Given Prefix

**Difficulty:** Easy

**Topics:** `Array`, `String`, `tring Matching`

You are given an array of strings `words` and a string `pref`.

Return _the number of strings in `words` that contain `pref` as a **prefix**_.

A **prefix** of a string `s` is any leading contiguous substring of `s`.

**Example 1:**

- **Input:** words = ["pay","**at**tention","practice","**at**tend"], pref = "at"
- **Output:** 2
- **Explanation:** The 2 strings that contain "at" as a prefix are: "**at**tention" and "**at**tend".

**Example 2:**

- **Input:** words = ["leetcode","win","loops","success"], pref = "code"
- **Output:** 0
- **Explanation:** There are no strings that contain "code" as a prefix.



**Constraints:**

- `1 <= words.length <= 100`
- `1 <= words[i].length, pref.length <= 100`
- `words[i]` and `pref` consist of lowercase English letters.


**Hint:**
1. Go through each word in words and increment the answer if `pref` is a **prefix** of the word.



**Solution:**

We can iterate through the `words` array and check if the given `pref` is a prefix of each word. You can use the `substr` function to check the beginning part of each string and compare it with `pref`. If they match, you increment the count.

Let's implement this solution in PHP: **[2185. Counting Words With a Given Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002185-counting-words-with-a-given-prefix/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param String $pref
 * @return Integer
 */
function countWordsWithPrefix($words, $pref) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$words1 = ["pay", "attention", "practice", "attend"];
$pref1 = "at";
echo countWordsWithPrefix($words1, $pref1); // Output: 2

$words2 = ["leetcode", "win", "loops", "success"];
$pref2 = "code";
echo countWordsWithPrefix($words2, $pref2); // Output: 0
?>
```

### Explanation:

1. **Function Definition:**
   - The function `countWordsWithPrefix` accepts an array `$words` and a string `$pref`.
   - A counter `$count` is initialized to 0, which will hold the number of words that match the given prefix.

2. **Loop Through Words:**
   - The function loops through each word in the `$words` array.

3. **Check for Prefix:**
   - The `substr($word, 0, strlen($pref))` function extracts the first `strlen($pref)` characters from the word.
   - If this substring matches `$pref`, the count is incremented.

4. **Return Count:**
   - Finally, the function returns the total count of words that contain the prefix.

### Time Complexity:
- The time complexity is O(n * m), where:
   - `n` is the number of words in the array.
   - `m` is the length of the prefix.
   - For each word, we check the first `m` characters.

This solution is efficient for the input constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
