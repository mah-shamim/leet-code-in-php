2379\. Minimum Recolors to Get K Consecutive Black Blocks

**Difficulty:** Easy

**Topics:** `String`, `Sliding Window`

You are given a **0-indexed** string `blocks` of length `n`, where `blocks[i]` is either `'W'` or `'B'`, representing the color of the <code>i<sup>th</sup></code> block. The characters `'W'` and `'B'` denote the colors white and black, respectively.

You are also given an integer `k`, which is the desired number of **consecutive** black blocks.

In one operation, you can **recolor** a white block such that it becomes a black block.

Return _the **minimum** number of operations needed such that there is at least **one** occurrence of `k` consecutive black blocks_.

**Example 1:**

- **Input:** blocks = "WBBWWBBWBW", k = 7
- **Output:** 3
- **Explanation:**
  One way to achieve 7 consecutive black blocks is to recolor the 0th, 3rd, and 4th blocks
  so that blocks = "BBBBBBBWBW".
  It can be shown that there is no way to achieve 7 consecutive black blocks in less than 3 operations.
  Therefore, we return 3.

**Example 2:**

- **Input:** blocks = "WBWBBBW", k = 2
- **Output:** 0
- **Explanation:**
  No changes need to be made, since 2 consecutive black blocks already exist.
  Therefore, we return 0.



**Constraints:**

- `n == blocks.length`
- `1 <= n <= 100`
- `blocks[i]` is either `'W'` or `'B'`.
- `1 <= k <= n`


**Hint:**
1. Iterate through all possible consecutive substrings of k characters.
2. Find the number of changes for each substring to make all blocks black, and return the minimum of these.



**Solution:**

We need to determine the minimum number of operations required to convert a substring of length `k` in the given string `blocks` into consecutive black blocks ('B'). Each operation involves changing a white block ('W') to a black block.

### Approach
1. **Sliding Window Technique**: We will use a sliding window of length `k` to traverse the string `blocks`. This allows us to efficiently check each possible substring of length `k`.
2. **Count White Blocks**: For each window, count the number of white blocks ('W'). The minimum number of white blocks in any window will be our answer, as each white block in the window needs to be recolored.

Let's implement this solution in PHP: **[2379. Minimum Recolors to Get K Consecutive Black Blocks](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002379-minimum-recolors-to-get-k-consecutive-black-blocks/solution.php)**

```php
<?php
/**
 * @param String $blocks
 * @param Integer $k
 * @return Integer
 */
function minimumRecolors($blocks, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

//Example 1
$blocks = "WBBWWBBWBW", $k = 7;
echo minimumRecolors($blocks, $k); // Output: 3

//Example 2
$blocks = "WBWBBBW", $k = 2;
echo minimumRecolors($blocks, $k); // Output: 0
?>
```

### Explanation:

1. **Initialization**: We start by initializing `min_ops` to the maximum possible value, which is `k` (if all blocks in the window were 'W').
2. **Iterate Through Windows**: We iterate through each possible starting index of the window using a loop. For each index `i`, we extract the substring of length `k` starting at `i`.
3. **Count White Blocks**: For each extracted substring, we count the number of 'W' characters using `substr_count`.
4. **Update Minimum**: We update `min_ops` whenever we find a window with fewer 'W' characters than the current minimum.
5. **Return Result**: After checking all possible windows, the minimum count of 'W' characters found is returned as the result.

This approach efficiently checks all possible substrings of length `k` using a sliding window, ensuring we find the optimal solution with a time complexity of O(n), where n is the length of the string `blocks`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**