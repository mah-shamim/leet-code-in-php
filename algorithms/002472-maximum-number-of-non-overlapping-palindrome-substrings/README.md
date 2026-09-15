2472\. Maximum Number of Non-overlapping Palindrome Substrings

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Two Pointers`, `String`, `Dynamic Programming`, `Greedy`, `Weekly Contest 319`

You are given a string `s` and a **positive** integer `k`.

Select a set of **non-overlapping** substrings from the string `s` that satisfy the following conditions:

- The **length** of each substring is **at least** `k`.
- Each substring is a **palindrome**.

Return _the **maximum** number of substrings in an optimal selection_.

A **substring** is a contiguous sequence of characters within a string.

**Example 1:**

- **Input:** s = "abaccdbbd", k = 3
- **Output:** 2
- **Explanation:** 
  - We can select the substrings underlined in s = "<ins>**aba**</ins>cc<ins>**dbbd**</ins>". Both "aba" and "dbbd" are palindromes and have a length of at least k = 3.
  - It can be shown that we cannot find a selection with more than two valid substrings.

**Example 2:**

- **Input:** s = "adbcda", k = 2
- **Output:** 0
- **Explanation:** There is no palindrome substring of length at least 2 in the string.

**Example 3:**

- **Input:** s = "a", k = 1
- **Output:** 1

**Example 4:**

- **Input:** s = "aa", k = 2
- **Output:** 1

**Example 5:**

- **Input:** s = "aaa", k = 2
- **Output:** 1

**Example 6:**

- **Input:** s = "ababa", k = 3
- **Output:** 1

**Example 7:**

- **Input:** s = "abccba", k = 3
- **Output:** 1

**Example 8:**

- **Input:** s = "racecar", k = 3
- **Output:** 1

**Example 9:**

- **Input:** s = "abcde", k = 1
- **Output:** 5

**Example 10:**

- **Input:** s = "aabbaa", k = 2
- **Output:** 2

**Example 11:**

- **Input:** s = "aabbaa", k = 3
- **Output:** 1

**Example 12:**

- **Input:** s = "abacaba", k = 3
- **Output:** 2

**Constraints:**

- `1 <= k <= s.length <= 2000`
- `s` consists of lowercase English letters.


**Hint:**
1. Try to use dynamic programming to solve the problem.
2. let `dp[i]` be the answer for the prefix `s[0…i]`.
3. The final answer to the problem will be `dp[n-1]`. How do you compute this dp?


**Similar Questions:**
1. [5. Longest Palindromic Substring](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000005-longest-palindromic-substring)
2. [131. Palindrome Partitioning](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000131-palindrome-partitioning)
3. [132. Palindrome Partitioning II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000132-palindrome-partitioning-ii)
4. [1278. Palindrome Partitioning III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001278-palindrome-partitioning-iii)
5. [1520. Maximum Number of Non-Overlapping Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001520-maximum-number-of-non-overlapping-substrings)
6. [1745. Palindrome Partitioning IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001745-palindrome-partitioning-iv)



**Solution:**

We solve the problem by using **dynamic programming** combined with **palindrome precomputation** via the expand-around-center technique. We first identify all palindromic substrings of length at least `k`, recording their start and end positions. Then, using DP where `dp[i]` represents the maximum number of non-overlapping palindromes in the prefix `s[0...i]`, we iteratively build the optimal solution by either skipping the current character or ending a valid palindrome at the current position.

## Approach

- **Precompute palindromes:** Use expand-around-center for both odd and even length centers to find all palindromic substrings with length ≥ `k`.
- **Store palindromes by end index:** For each ending position `i`, store a list of valid start positions `j` such that `s[j...i]` is a palindrome of length ≥ `k`.
- **Dynamic Programming:**
    - Define `dp[i]` as the maximum number of non-overlapping valid palindromes in prefix `s[0...i-1]`.
    - Base case: `dp[0] = 0`.
    - Transition:
        - Option 1: Skip character at `i-1`, so `dp[i] = dp[i-1]`.
        - Option 2: For each palindrome ending at index `i-1` starting at `j`, take `dp[j] + 1`.
    - Take the maximum over all options.
- **Return `dp[n]`** as the final answer.

Let's implement this solution in PHP: **[2472. Maximum Number of Non-overlapping Palindrome Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002472-maximum-number-of-non-overlapping-palindrome-substrings/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function maxPalindromes(string $s, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Expand around center to find all palindromes with length >= k
 *
 * @param string $s
 * @param int $left
 * @param int $right
 * @param int $k
 * @param array $palindromesEndingAt
 * @param int $n
 * @return void
 */
function expandAroundCenter(string $s, int $left, int $right, int $k, array &$palindromesEndingAt, int $n): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxPalindromes("abaccdbbd", 3) . "\n";         // Output: 2
echo maxPalindromes("adbcda", 2) . "\n";            // Output: 0
echo maxPalindromes("a", 1) . "\n";                 // Output: 1
echo maxPalindromes("aa", 2) . "\n";                // Output: 1
echo maxPalindromes("aaa", 2) . "\n";               // Output: 1
echo maxPalindromes("ababa", 3) . "\n";             // Output: 1
echo maxPalindromes("abccba", 3) . "\n";            // Output: 1
echo maxPalindromes("racecar", 3) . "\n";           // Output: 1
echo maxPalindromes("abcde", 1) . "\n";             // Output: 5
echo maxPalindromes("aabbaa", 2) . "\n";            // Output: 2
echo maxPalindromes("aabbaa", 3) . "\n";            // Output: 1
echo maxPalindromes("abacaba", 3) . "\n";           // Output: 2
?>
```

### Explanation:

- **Why expand-around-center?** It efficiently finds all palindromes in `O(n²)` time by expanding from each possible center (odd and even).
- **Why DP?** Greedy selection of palindromes doesn't always yield the optimal count because choosing a shorter palindrome early might allow more palindromes later. DP explores all valid combinations.
- **DP state meaning:** 
  - `dp[i]` = max palindromes in first `i` characters (`s[0...i-1]`). 
  - This makes transitions natural: either we don't use the `i-1`-th character, or we use a palindrome ending exactly at `i-1`.
- **Non-overlapping guarantee:** When we end a palindrome at `i-1` starting at `j`, we add 1 to `dp[j]`, which only considers characters before index `j`. Hence, no overlap.
- **Time efficiency:** Precomputation takes `O(n²)`, DP takes `O(n²)` in worst case (if many palindromes), but overall feasible for `n ≤ 2000`.

## Complexity Analysis

- **Time Complexity:**
    - Expand-around-center: `O(n²)`
    - DP transitions: `O(n²)` in worst case (each position can have up to `O(n)` palindromes ending at it).
    - **Total: `O(n²)`**

- **Space Complexity:**
    - `palindromesEndingAt`: `O(n²)` in worst case (storing all palindromes).
    - `dp` array: `O(n)`
    - **Total: `O(n²)`**

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**