2311\. Longest Binary Subsequence Less Than or Equal to K

**Difficulty:** Medium

**Topics:** `String`, `Dynamic Programming`, `Greedy`, `Memoization`

You are given a binary string `s` and a positive integer `k`.

Return _the length of the **longest** subsequence of `s` that makes up a **binary** number less than or equal to `k`_.

Note:

- The subsequence can contain **leading zeroes**.
- The empty string is considered to be equal to `0`.
- A **subsequence** is a string that can be derived from another string by deleting some or no characters without changing the order of the remaining characters.


**Example 1:**

- **Input:** s = "1001010", k = 5
- **Output:** 5
- **Explanation:** The longest subsequence of s that makes up a binary number less than or equal to 5 is "00010", as this number is equal to 2 in decimal.
  Note that "00100" and "00101" are also possible, which are equal to 4 and 5 in decimal, respectively.
  The length of this subsequence is 5, so 5 is returned.

**Example 2:**

- **Input:** s = "00101001", k = 1
- **Output:** 6
- **Explanation:** "000001" is the longest subsequence of s that makes up a binary number less than or equal to 1, as this number is equal to 1 in decimal.
  The length of this subsequence is 6, so 6 is returned.

**Constraints:**

- `1 <= s.length <= 1000`
- `s[i]` is either `'0'` or `'1'`.
- <code>1 <= k <= 10<sup>9</sup></code>


**Hint:**
1. Choosing a subsequence from the string is equivalent to deleting all the other digits.
2. If you were to remove a digit, which one should you remove to reduce the value of the string?


**Similar Questions:**
1. [1702. Maximum Binary String After Change](https://leetcode.com/problems/maximum-binary-string-after-change/description/)






**Solution:**

We need to find the length of the longest subsequence of a given binary string that forms a binary number less than or equal to a positive integer _**k**_. The solution involves efficiently exploring possible subsequences while maximizing their length under the constraint that their numeric value does not exceed _**k**_.

### Approach
1. **Problem Analysis**: The problem requires selecting a subsequence (not necessarily contiguous) from the binary string such that the binary number formed by the subsequence is _**≤ k**_. The subsequence can include leading zeros, which do not affect the numeric value but contribute to the length. The challenge is to maximize the length of such a subsequence.

2. **Key Insight**: The solution involves two main parts:
   - **Leading Zeros**: All zeros before the first '1' in the chosen subsequence can be included without affecting the numeric value, as they only contribute to the length.
   - **Significant Part**: The part starting from the first '1' in the subsequence must form a binary number _**≤ k**_. The length of this part is limited by the number of bits in _**k**_ (denoted as _**m0**_), since any longer binary number would inherently exceed _**k**_.

3. **Algorithm Selection**:
   - **Precomputation**: Count the total zeros in the string and precompute a prefix zeros array to quickly access the count of zeros before any index.
   - **Iterate Over Potential Starts**: For each '1' in the string (potential start of the significant part), compute the maximum valid subsequence length starting at that position:
      - Initialize the current value to 1 (the first '1') and current length to 1.
      - Traverse the remaining string, updating the current value by including subsequent bits (if they keep the value _**≤ k**_).
      - Break early if the current value exceeds _**k**_ to optimize performance.
   - **Update Result**: For each candidate, the total subsequence length is the sum of leading zeros (before the start) and the length of the significant part. Track the maximum length encountered.

4. **Complexity Analysis**:
   - **Time Complexity**: _**O(n<sup>2</sup>)**_ in the worst case, but optimized by early termination when the current value exceeds _**k**_. The inner loop runs at most 31 times per '1' (since _**2<sup>31</sup> > 10<sup>9</sup>**_), leading to an effective _**O(n × 31)**_ complexity.
   - **Space Complexity**: _**O(n)**_ for storing the prefix zeros array.

Let's implement this solution in PHP: **[2311. Longest Binary Subsequence Less Than or Equal to K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002311-longest-binary-subsequence-less-than-or-equal-to-k/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function longestSubsequence($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
echo longestSubsequence("1001010", 5) . "\n";      // Output: 5
echo longestSubsequence("00101001", 1) . "\n";     // Output: 6
?>
```

### Explanation:

1. **Initialization**: The code starts by counting the total zeros in the string and precomputing a prefix zeros array. This array helps in quickly determining the number of zeros before any given index, which is crucial for calculating the length of leading zeros in potential subsequences.
2. **Iterate Over Potential Starts**: For each '1' in the string, the algorithm initializes the current value (of the binary number) to 1 and current length (of the significant part) to 1.
3. **Traverse Remaining String**: The algorithm processes each subsequent character in the string:
   - For '0', it checks if doubling the current value keeps it _**≤ k**_. If so, it updates the current value and length.
   - For '1', it checks if doubling the current value and adding 1 keeps it _**≤ k**_. If so, it updates the current value and length.
   - If at any point the current value exceeds _**k**_, the loop breaks early to save computations.
4. **Update Result**: The total length for each candidate subsequence is the sum of leading zeros (before the start index) and the length of the significant part. The maximum length encountered during the iteration is returned as the result.

This approach efficiently explores all potential subsequences, leveraging early termination to optimize performance, and ensures the solution meets the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**