3333\. Find the Original Typed String II

**Difficulty:** Hard

**Topics:** `String`, `Dynamic Programming`, `Prefix Sum`

Alice is attempting to type a specific string on her computer. However, she tends to be clumsy and **may** press a key for too long, resulting in a character being typed **multiple** times.

You are given a string `word`, which represents the **final** output displayed on Alice's screen. You are also given a **positive** integer `k`.

Return the total number of possible original strings that Alice might have intended to type, if she was trying to type a string of size **at least** `k`.

Since the answer may be very large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** word = "aabbccdd", k = 7
- **Output:** 5
- **Explanation:** The possible strings are: `"aabbccdd"`, `"aabbccd"`, `"aabbcdd"`, `"aabccdd"`, and `"abbccdd"`.

**Example 2:**

- **Input:** word = "aabbccdd", k = 8
- **Output:** 1
- **Explanation:** The only possible string is `"aabbccdd"`.

**Example 3:**

- **Input:** word = "aaabbb", k = 3
- **Output:** 8


**Constraints:**

- <code>1 <= word.length <= 5 * 10<sup>5</sup></code>
- `word` consists only of lowercase English letters.
- `1 <= k <= 2000`


**Hint:**
1. Instead of solving for at least `k`, can we solve for at most `k - 1` length?


**Similar Questions:**
1. [500. Keyboard Row](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000500-keyboard-row)
2. [2810. Faulty Keyboard](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002810-faulty-keyboard)





**Solution:**

We need to determine the number of possible original strings Alice might have intended to type, given the final output string displayed on her screen and a positive integer `k`. The original string must be of length at least `k`. Alice may have pressed a key for too long, resulting in multiple consecutive characters in the output. The solution involves breaking down the problem into manageable parts and using dynamic programming to count valid configurations efficiently.

### Approach
1. **Problem Analysis**:
   - The output string is formed by Alice possibly pressing keys for too long, leading to consecutive duplicate characters.
   - The original string is derived by reducing each consecutive run of identical characters in the output string to at least one character (but possibly more).
   - The goal is to count all such original strings where the total length is at least `k`.

2. **Key Insight**:
   - The problem can be decomposed by breaking the output string into consecutive runs of identical characters.
   - For each run of length `l`, the original string can have between 1 and `l` characters of that run.
   - The total number of possible original strings without any length constraint is the product of the lengths of all runs.
   - We need to subtract those original strings where the total length is less than `k`.

3. **Dynamic Programming**:
   - Use dynamic programming to count the number of original strings with total length less than `k`.
   - Initialize a DP array where `dp[t]` represents the number of ways to achieve a total length `t` after processing some runs.
   - For each run, update the DP array by considering all possible contributions (1 to `l_i` characters) from the current run.
   - Utilize prefix sums to optimize the DP updates, ensuring efficient computation.

4. **Complexity Analysis**:
   - **Time Complexity**: O(n * k), where `n` is the number of runs and `k` is the given constraint. This is because for each run, we process up to `k` elements in the DP array.
   - **Space Complexity**: O(k), as we maintain a DP array of size `k` and a prefix array of the same size.

Let's implement this solution in PHP: **[3333. Find the Original Typed String II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003333-find-the-original-typed-string-ii/solution.php)**

```php
<?php
/**
 * @param String $word
 * @param Integer $k
 * @return Integer
 */
function possibleStringCount($word, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $word
 * @return array
 */
function getRuns($word) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo possibleStringCount("aabbccdd", 7) . "\n"; // Output: 5
echo possibleStringCount("aabbccdd", 8) . "\n"; // Output: 1
echo possibleStringCount("aaabbb", 3) . "\n";    // Output: 8
?>
```

### Explanation:

1. **Breaking into Runs**: The function `getRuns` processes the input string to break it into consecutive runs of identical characters, storing the length of each run.
2. **Total Ways Calculation**: The total number of possible original strings without any length constraint is computed as the product of the lengths of all runs.
3. **Dynamic Programming Setup**: If `k` is less than or equal to the number of runs, the answer is simply the total ways since the minimum possible length of the original string is the number of runs.
4. **DP Array Initialization**: The DP array is initialized to keep track of the number of ways to achieve each possible total length up to `k-1`.
5. **Processing Runs**: For each run, the DP array is updated using prefix sums to efficiently compute the number of ways to form each possible total length by considering contributions from the current run.
6. **Result Calculation**: The result is obtained by subtracting the count of invalid strings (total length < `k`) from the total ways, ensuring the result is non-negative and modulo _**10<sup>9</sup> + 7**_.

This approach efficiently handles the constraints by leveraging dynamic programming and prefix sums to count valid configurations, ensuring optimal performance even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**