2014\. Longest Subsequence Repeated k Times

**Difficulty:** Hard

**Topics:** `String`, `Backtracking`, `Greedy`, `Counting`, `Enumeration`

You are given a string `s` of length `n`, and an integer `k`. You are tasked to find the **longest subsequence repeated** `k` times in string `s`.

A **subsequence** is a string that can be derived from another string by deleting some or no characters without changing the order of the remaining characters.

A subsequence `seq` is **repeated** `k` times in the string `s` if `seq * k` is a subsequence of `s`, where `seq * k` represents a string constructed by concatenating `seq` `k` times.

- For example, `"bba"` is repeated `2` times in the string `"bababcba"`, because the string `"bbabba"`, constructed by concatenating `"bba"` `2` times, is a subsequence of the string "<ins>**b**</ins>a<ins>**bab**</ins>c<ins>**ba**</ins>".

Return _the **longest subsequence repeated** `k` times in string `s`. If multiple such subsequences are found, return the **lexicographically largest** one. If there is no such subsequence, return an **empty** string_.

**Example 1:**

![longest-subsequence-repeat-k-times](https://assets.leetcode.com/uploads/2021/08/30/longest-subsequence-repeat-k-times.png)

- **Input:** s = "letsleetcode", k = 2
- **Output:** "let"
- **Explanation:** There are two longest subsequences repeated 2 times: "let" and "ete". "let" is the lexicographically largest one.

**Example 2:**

- **Input:** s = "bb", k = 2
- **Output:** "b"
- **Explanation:** The longest subsequence repeated 2 times is "b".

**Example 3:**

- **Input:** s = "ab", k = 2
- **Output:** ""
- **Explanation:** There is no subsequence repeated 2 times. Empty string is returned.

**Constraints:**

- `n == s.length`
- `2 <= n, k <= 2000`
- `2 <= n < k * 8`
- `s` consists of lowercase English letters.


**Hint:**
1. The length of the longest subsequence does not exceed n/k. Do you know why?
2. Find the characters that could be included in the potential answer. A character occurring more than or equal to k times can be used in the answer up to (count of the character / k) times.
3. Try all possible candidates in reverse lexicographic order, and check the string for the subsequence condition.


**Similar Questions:**
1. [395. Longest Substring with At Least K Repeating Characters](https://leetcode.com/problems/longest-substring-with-at-least-k-repeating-characters/description/)






**Solution:**

We need to find the longest subsequence repeated `k` times in a given string `s`. A subsequence is a sequence that can be derived from another sequence by deleting some or no elements without changing the order of the remaining elements. The solution involves generating potential subsequences in descending lexicographical order and checking if they can be repeated `k` times within `s`.

### Approach
1. **Frequency Analysis**: First, we count the frequency of each character in the string. Only characters that appear at least `k` times can be part of the solution.
2. **Valid Characters**: We collect characters that meet the frequency requirement and sort them in descending order to prioritize lexicographically larger candidates.
3. **Depth-First Search (DFS)**: For each possible subsequence length from the maximum possible (7, as per constraints) down to 1, we generate candidate subsequences in descending lexicographical order. This ensures that the first valid candidate found for a given length is the lexicographically largest.
4. **Validation Check**: For each candidate subsequence, we check if it can be repeated `k` times within `s` by verifying that the concatenated subsequence appears as a subsequence in `s`.
5. **Early Termination**: The search starts from the longest possible subsequence length. Once a valid candidate is found, it is immediately returned, ensuring efficiency by avoiding unnecessary checks for shorter lengths.

Let's implement this solution in PHP: **[2014. Longest Subsequence Repeated k Times](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002014-longest-subsequence-repeated-k-times/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function longestSubsequenceRepeatedK($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $len
 * @param $path
 * @param $valid
 * @param $freq
 * @param $k
 * @param $s
 * @return array|bool|int|int[]|mixed|string|null
 */
private function dfs($len, $path, $valid, $freq, $k, $s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @param $seq
 * @param $k
 * @return bool
 */
private function isKSub($s, $seq, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestSubsequenceRepeatedK("letsleetcode", 2); // Output: "let"
echo longestSubsequenceRepeatedK("bb", 2);           // Output: "b"
echo longestSubsequenceRepeatedK("ab", 2);           // Output: ""
?>
```

### Explanation:

1. **Frequency Analysis**: The code starts by counting the occurrences of each character in the string `s` to determine which characters can potentially form the subsequence (those appearing at least `k` times).
2. **Valid Characters**: Characters meeting the frequency threshold are collected and sorted in descending order to prioritize lexicographically larger candidates during subsequence generation.
3. **DFS for Subsequence Generation**: The algorithm uses a depth-first search to generate subsequences of lengths from the maximum possible (7) down to 1. For each length, it builds candidates by appending valid characters to the current path, ensuring character usage does not exceed `floor(frequency / k)`.
4. **Validation Check**: For each generated candidate, the algorithm checks if the candidate repeated `k` times forms a valid subsequence in `s` by traversing `s` and matching characters in order.
5. **Early Termination**: The search terminates as soon as the longest valid subsequence is found, ensuring efficiency by leveraging the sorted order of valid characters and descending length prioritization.

This approach efficiently narrows down potential candidates while ensuring optimality by leveraging sorting and early termination strategies.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


