2707\. Extra Characters in a String

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Dynamic Programming`, `Trie`

You are given a **0-indexed** string `s` and a dictionary of words `dictionary`. You have to break `s` into one or more **non-overlapping** substrings such that each substring is present in `dictionary`. There may be some **extra characters** in `s` which are not present in any of the substrings.

Return _the **minimum** number of extra characters left over if you break up `s` optimally_.

**Example 1:**

- **Input:** s = "leetscode", dictionary = ["leet","code","leetcode"]
- **Output:** 1
- **Explanation:** We can break s in two substrings: "leet" from index 0 to 3 and "code" from index 5 to 8. There is only 1 unused character (at index 4), so we return 1.

**Example 2:**

- **Input:** s = "sayhelloworld", dictionary = ["hello","world"]
- **Output:** 3
- **Explanation:** We can break s in two substrings: "hello" from index 3 to 7 and "world" from index 8 to 12. The characters at indices 0, 1, 2 are not used in any substring and thus are considered as extra characters. Hence, we return 3.



**Constraints:**

- `1 <= s.length <= 50`
- `1 <= dictionary.length <= 50`
- `1 <= dictionary[i].length <= 50`
- `dictionary[i]` and `s` consists of only lowercase English letters
- `dictionary` contains distinct words


**Hint:**
1. Can we use Dynamic Programming here?
2. Define DP[i] as the min extra character if breaking up s[0:i] optimally.



**Solution:**

We can define a `dp` array where `dp[i]` represents the minimum number of extra characters in the substring `s[0:i]` after optimal segmentation.

### Approach:
1. **Dynamic Programming Definition:**
   - Let `dp[i]` be the minimum number of extra characters in the substring `s[0:i]`.
   - To calculate `dp[i]`, we can:
      - Either consider the character `s[i-1]` as an extra character and move to the next index.
      - Or check if some substring ending at index `i` exists in the dictionary, and if it does, then use it to reduce extra characters.

2. **Transition:**
   - For each index `i`, we either:
      - Add one to `dp[i-1]` if we treat `s[i]` as an extra character.
      - Check every possible substring `s[j:i]` (for `j < i`) and if `s[j:i]` is in the dictionary, we update `dp[i]` based on `dp[j]`.

3. **Result:**
   - The value of `dp[len(s)]` will give us the minimum number of extra characters in the entire string `s`.

Let's implement this solution in PHP: **[2707. Extra Characters in a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002707-extra-characters-in-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String[] $dictionary
 * @return Integer
 */
function minExtraChar($s, $dictionary) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minExtraChar("leetscode", ["leet","code","leetcode"]); // Output: 1
echo "\n";
echo minExtraChar("sayhelloworld", ["hello","world"]); // Output: 3
?>
```

### Explanation:

1. **Base Case:**
   - `dp[0] = 0` since no extra characters exist in an empty string.

2. **Dictionary Lookup:**
   - We store the dictionary words in a hash map using `array_flip()` for constant-time lookup.

3. **Transition:**
   - For each position `i`, we check all possible substrings `s[j:i]`. If a substring exists in the dictionary, we update the `dp[i]` value.

4. **Time Complexity:**
   - The time complexity is `O(n^2)` where `n` is the length of the string `s` because for each index, we check all previous indices to form substrings.

### Test Results:
For the input `"leetscode"` with dictionary `["leet","code","leetcode"]`, the function correctly returns `1`, as only 1 extra character (`"s"`) remains.

For the input `"sayhelloworld"` with dictionary `["hello","world"]`, the function returns `3`, as the first three characters (`"say"`) are extra.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
