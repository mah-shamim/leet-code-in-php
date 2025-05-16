2901\. Longest Unequal Adjacent Groups Subsequence II

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Dynamic Programming`

You are given a string array `words`, and an array `groups`, both arrays having length `n`.

The **hamming distance** between two strings of equal length is the number of positions at which the corresponding characters are **different**.

You need to select the **longest** subsequence[^1] from an array of indices `[0, 1, ..., n - 1]`, such that for the subsequence denoted as <code>[i<sub>0</sub>, i<sub>1</sub>, ..., i<sub>k-1</sub>]</code> having length `k`, the following holds:

- For **adjacent** indices in the subsequence, their corresponding groups are **unequal**, i.e., <code>groups[i<sub>j</sub>] != groups[i<sub>j+1</sub>]</code>, for each `j` where `0 < j + 1 < k`.
- <code>words[i<sub>j</sub>]</code> and <code>words[i<sub>j+1</sub>]</code> are **equal** in length, and the **hamming distance** between them is `1`, where `0 < j + 1 < k`, for all indices in the subsequence.

Return _a string array containing the words corresponding to the indices (**in order**) in the selected subsequence. If there are multiple answers, return any of them_.

**Note**: strings in `words` may be **unequal** in length.

**Example 1:**

- **Input:** words = ["bab","dab","cab"], groups = [1,2,2]
- **Output:** ["bab","cab"]
- **Explanation:** 
  - A subsequence that can be selected is `[0,2]`.
    - `groups[0] != groups[2]`
    - `words[0].length == words[2].length`, and the hamming distance between them is `1`.
  - So, a valid answer is `[words[0],words[2]] = ["bab","cab"]`.
  
  - Another subsequence that can be selected is `[0,1]`.
    - `groups[0] != groups[1]`
    - `words[0].length == words[1].length`, and the hamming distance between them is `1`.
  
  - So, another valid answer is `[words[0],words[1]] = ["bab","dab"]`.
  - It can be shown that the length of the longest subsequence of indices that satisfies the conditions is `2`.

**Example 2:**

- **Input:** words = ["a","b","c","d"], groups = [1,2,3,4]
- **Output:** ["a","b","c","d"]
- **Explanation:** 
  - We can select the subsequence `[0,1,2,3]`.
  - It satisfies both conditions.
  - Hence, the answer is `[words[0],words[1],words[2],words[3]] = ["a","b","c","d"]`.
  - It has the longest length among all subsequences of indices that satisfy the conditions.
  - Hence, it is the only answer.



**Constraints:**

- `1 <= n == words.length == groups.length <= 1000`
- `1 <= words[i].length <= 10`
- `1 <= groups[i] <= n`
- `words` consists of **distinct** strings.
- `words[i]` consists of lowercase English letters.


**Hint:**
1. Let `dp[i]` represent the length of the longest subsequence ending with `words[i]` that satisfies the conditions.
2. `dp[i] =` (maximum value of `dp[j]`) `+ 1` for indices `j < i`, where `groups[i] != groups[j]`, `words[i]` and `words[j]` are equal in length, and the hamming distance between `words[i]` and `words[j]` is exactly `1`.
3. Keep track of the `j` values used to achieve the maximum `dp[i]` for each index `i`.
4. The expected array's length is `max(dp[0:n])`, and starting from the index having the maximum value in `dp`, we can trace backward to get the words.

[^1]: **Subsequence**: `A subsequence is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.`

**Solution:**

We need to find the longest subsequence of indices from given arrays `words` and `groups` such that adjacent elements in the subsequence have different groups and their corresponding words have a Hamming distance of 1. The solution involves dynamic programming to track the longest valid subsequence ending at each index and backtracking to reconstruct the subsequence.

### Approach
1. **Dynamic Programming (DP) Setup**: Use a DP array where `dp[i]` represents the length of the longest valid subsequence ending at index `i`. Initialize each element of `dp` to 1 since each element by itself is a valid subsequence of length 1.
2. **Track Previous Indices**: Maintain a `prev` array to track the previous index in the subsequence for each element, allowing us to reconstruct the path later.
3. **Conditions Check**: For each index `i`, check all previous indices `j` to see if they can form a valid subsequence with `i` by ensuring:
   - Different groups.
   - Words of the same length.
   - Hamming distance of exactly 1 between the words.
4. **Update DP and Previous Indices**: If the conditions are met, update the DP value and previous index for `i` based on the longest valid subsequence found.
5. **Find Maximum Length Subsequence**: Identify the maximum value in the DP array and backtrack from the corresponding index to reconstruct the subsequence using the `prev` array.

Let's implement this solution in PHP: **[2901. Longest Unequal Adjacent Groups Subsequence II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002901-longest-unequal-adjacent-groups-subsequence-ii/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param Integer[] $groups
 * @return String[]
 */
function getWordsInLongestSubsequence($words, $groups) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$words1 = array("bab", "dab", "cab");
$groups1 = array(1, 2, 2);
print_r(getWordsInLongestSubsequence($words1, $groups1)); // Possible output: ["bab", "cab"] or ["bab", "dab"]

$words2 = array("a", "b", "c", "d");
$groups2 = array(1, 2, 3, 4);
print_r(getWordsInLongestSubsequence($words2, $groups2)); // Output: ["a", "b", "c", "d"]
?>
```

### Explanation:

1. **Dynamic Programming Initialization**: The `dp` array starts with each element as 1, and the `prev` array is initialized to -1 to indicate no previous elements initially.
2. **Check Valid Pairs**: For each index `i`, iterate over all previous indices `j` to check if they can form a valid pair with `i` based on group differences, word length equality, and Hamming distance.
3. **Update DP Values**: If a valid pair is found, update the DP value for `i` and set the previous index to `j` to track the path.
4. **Find Longest Subsequence**: After processing all indices, determine the maximum length of valid subsequences and backtrack from the corresponding index to reconstruct the subsequence using the `prev` array.
5. **Reconstruct Result**: The result is built by backtracking from the index with the maximum DP value, ensuring the subsequence is in the correct order.

This approach efficiently computes the longest valid subsequence using dynamic programming and ensures correctness by adhering to the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**