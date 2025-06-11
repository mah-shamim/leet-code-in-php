3445\. Maximum Difference Between Even and Odd Frequency II

**Difficulty:** Hard

**Topics:** `String`, `Sliding Window`, `Enumeration`, `Prefix Sum`

You are given a string `s` and an integer `k`. Your task is to find the **maximum** difference between the frequency of **two** characters, `freq[a] - freq[b]`, in a substring[^1] `subs` of `s`, such that:

- `subs` has a size of **at least** `k`.
- Character `a` has an odd frequency in `subs`.
- Character `b` has an even frequency in `subs`.

Return _the **maximum** difference_.

**Note** that `subs` can contain more than 2 **distinct** characters.

**Example 1:**

- **Input:** s = "12233", k = 4
- **Output:** -1
- **Explanation:** For the substring `"12233"`, the frequency of `'1'` is 1 and the frequency of `'3'` is 2. The difference is `1 - 2 = -1`.

**Example 2:**

- **Input:** s = "1122211", k = 3
- **Output:** 1
- **Explanation:** For the substring `"11222"`, the frequency of `'2'` is 3 and the frequency of `'1'` is 2. The difference is `3 - 2 = 1`.

**Example 3:**

- **Input:** s = "110", k = 3
- **Output:** -1


**Constraints:**

- <code>3 <= s.length <= 3 * 10<sup>4</sup></code>
- `s` consists only of digits `'0'` to `'4'`.
- The input is generated that at least one substring has a character with an even frequency and a character with an odd frequency.
- `1 <= k <= s.length`


**Hint:**
1. Fix the two characters.
2. Use prefix sum (maintain 2 characters' parities as status).






**Solution:**

We need to find the maximum difference between the frequency of two characters, `a` and `b`, in any substring of the given string `s` such that:
1. The substring has a size of at least `k`.
2. The frequency of character `a` is odd.
3. The frequency of character `b` is even.

### Approach
1. **Problem Analysis**: The problem requires examining all possible substrings of `s` with length at least `k` to find the maximum difference between the frequency of a character with an odd count and another character with an even count. Given the constraints, a brute-force approach is infeasible. Instead, we use a sliding window technique combined with prefix sums and state enumeration for efficiency.

2. **Key Insight**: For each pair of distinct characters `(a, b)` from the set `{'0', '1', '2', '3', '4'}`, we can use prefix sums to track the cumulative counts of `a` and `b` as we iterate through the string. We maintain a sliding window to ensure the substring length is at least `k` and contains both characters.

3. **State Management**: We use a 2x2 matrix `minDiff` to store the minimum difference between the prefix counts of `a` and `b` for each possible parity combination (even or odd) of their counts. This helps in efficiently computing the required difference for valid substrings.

4. **Sliding Window**: As we iterate through each character in the string, we expand the window to include the current character and adjust the left boundary of the window to maintain the constraints (substring length ≥ `k` and presence of both `a` and `b`). For each valid window, we update the `minDiff` matrix based on the parities of the prefix counts at the left boundary.

5. **Candidate Calculation**: For each position, we compute the potential maximum difference by considering the current counts of `a` and `b` and the stored minimum differences from `minDiff` for the required parities (odd for `a` and even for `b`).

Let's implement this solution in PHP: **[3445. Maximum Difference Between Even and Odd Frequency II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003445-maximum-difference-between-even-and-odd-frequency-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function maxDifference($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDifference("12233", 4) . "\n";     // Output: -1
echo maxDifference("1122211", 3) . "\n";   // Output: 1
echo maxDifference("110", 3) . "\n";       // Output: -1
?>
```

### Explanation:

1. **Generating Permutations**: We generate all distinct pairs of characters from the set `{'0', '1', '2', '3', '4'}` to consider all possible combinations of characters `a` and `b`.
2. **Prefix Arrays**: For each character pair, we maintain two prefix arrays, `prefixA` and `prefixB`, which store the cumulative counts of characters `a` and `b` up to each position in the string.
3. **Sliding Window**: We use a sliding window approach to ensure the substring length is at least `k` and contains both characters `a` and `b`. The left boundary `l` is adjusted dynamically to maintain these conditions.
4. **State Management**: The `minDiff` matrix tracks the minimum difference between the prefix counts of `a` and `b` for each possible parity combination (even or odd). This helps in efficiently computing the required difference for valid substrings.
5. **Candidate Calculation**: For each position, we calculate the potential maximum difference by considering the current counts of `a` and `b` and the relevant entry from the `minDiff` matrix, updating the global maximum difference (`ans`) whenever a larger value is found.

This approach efficiently narrows down the problem to manageable computations by leveraging sliding windows, prefix sums, and state enumeration, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**