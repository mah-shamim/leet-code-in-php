1320\. Minimum Distance to Type a Word Using Two Fingers

**Difficulty:** Hard

**Topics:** `Principal`, `String`, `Dynamic Programming`, `Weekly Contest 171`

![leetcode_keyboard](https://assets.leetcode.com/uploads/2020/01/02/leetcode_keyboard.png)

You have a keyboard layout as shown above in the **X-Y** plane, where each English uppercase letter is located at some coordinate.

- For example, the letter `'A'` is located at coordinate `(0, 0)`, the letter `'B'` is located at coordinate `(0, 1)`, the letter `'P'` is located at coordinate `(2, 3)` and the letter `'Z'` is located at coordinate `(4, 1)`.

Given the string `word`, return _the minimum total **distance** to type such string using only two fingers_.

The **distance** between coordinates `(x₁, y₁)` and `(x₂, y₂)` is `|x₁ - x₂| + |y₁ - y₂|`.

**Note** that the initial positions of your two fingers are considered free so do not count towards your total distance, also your two fingers do not have to start at the first letter or the first two letters.

**Example 1:**

- **Input:** word = "CAKE"
- **Output:** 3
- **Explanation:**
  - Using two fingers, one optimal way to type "CAKE" is:
    - Finger 1 on letter `'C' -> cost = 0`
    - Finger 1 on letter `'A' -> cost = Distance` from letter `'C'` to letter `'A' = 2`
    - Finger 2 on letter `'K' -> cost = 0`
    - Finger 2 on letter `'E' -> cost = Distance` from letter `'K'` to letter `'E' = 1`
    - Total distance = `3`

**Example 2:**

- **Input:** word = "HAPPY"
- **Output:** 6
- **Explanation:**
  - TUsing two fingers, one optimal way to type "HAPPY" is:
    - Finger 1 on letter `'H' -> cost = 0`
    - Finger 1 on letter `'A' -> cost = Distance` from letter `'H'` to letter `'A' = 2`
    - Finger 2 on letter `'P' -> cost = 0`
    - Finger 2 on letter `'P' -> cost = Distance` from letter `'P'` to letter `'P' = 0`
    - Finger 1 on letter `'Y' -> cost = Distance` from letter `'A'` to letter `'Y' = 4`
    - Total distance = `6`

**Constraints:**

- `2 <= word.length <= 300`
- `word` consists of uppercase English letters.



**Hint:**
1. Use dynamic programming.
2. `dp[i][j][k]`: smallest movements when you have one finger on `i-th` char and the other one on `j-th` char already having written `k` first characters from word.



**Similar Questions:**
1. [1974. Minimum Time to Type Word Using Special Typewriter](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001974-minimum-time-to-type-word-using-special-typewriter)






**Solution:**

This solution uses **dynamic programming** to minimize the total distance when typing a word with two fingers on a QWERTY-style keyboard.  
It keeps track of the position of one finger (the "free" finger) while the other finger types the current character.  
The DP state is `dp[f]` = minimum total distance so far, with one finger at the last typed character and the other finger at position `f`.  
At each step, we decide which finger moves to the next character.

### Approach:

- **Precompute distances** between all 26 letters based on their (row, column) coordinates on the keyboard.
- **DP definition**: `dp[f]` = minimum total distance after typing up to the current character, where one finger is at the last typed character and the other finger is at letter index `f`.
- **Initial state**: After typing the first character, one finger is on it, the other can be anywhere (cost 0 for all `f`).
- **Transition for each new character** `currChar`:
    1. Move the finger that was on `lastChar` to `currChar` → cost = `dist[lastChar][currChar]`, other finger stays at `f`.
    2. Move the finger that was on `f` to `currChar` → cost = `dist[f][currChar]`, other finger becomes `lastChar`.
- **Update DP** accordingly, tracking the new last character.
- **Final answer** = minimum value in `dp` after processing all characters.

Let's implement this solution in PHP: **[1320. Minimum Distance to Type a Word Using Two Fingers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001320-minimum-distance-to-type-a-word-using-two-fingers/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return Integer
 */
function minimumDistance(string $word): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDistance("CAKE") . "\n";            // Output: 3
echo minimumDistance("HAPPY") . "\n";           // Output: 6
?>
```

### Explanation:

- **Step 1 — Precompute distances**:  
  - Each letter is mapped to a coordinate: `(row = index / 6, col = index % 6)`.  
  - Manhattan distance between two letters is precomputed and stored in a 26×26 array.

- **Step 2 — Initialize DP**: After first character `word[0]`, one finger is on it, the other finger could be anywhere with zero distance so far.

- **Step 3 — Iterate through remaining characters**: For each new character `currChar`, compute a new DP table `nextDp` with `PHP_INT_MAX` initial values.

- **Step 4 — Transition logic**:  
  - For each possible `f` (position of the other finger):
    - **Case 1**: Move the finger at `lastChar` to `currChar` →  
      `nextDp[f] = min(nextDp[f], dp[f] + dist[lastChar][currChar])`
    - **Case 2**: Move the finger at `f` to `currChar` →  
      `nextDp[lastChar] = min(nextDp[lastChar], dp[f] + dist[f][currChar])`

- **Step 5 — Update state**: Set `dp = nextDp` and `lastChar = currChar`.

- **Step 6 — Return result**: Minimum value in `dp` after processing all characters.

### Complexity
- **Time Complexity**:
    - Precomputation: `O(26²) = O(1)`
    - DP: `O(n × 26)` where `n` is word length, because for each of `n-1` steps, we iterate over 26 possible finger positions.
    - Total: **O(26n) = O(n)** with a small constant factor.
- **Space Complexity**:
    - `dist` array: `O(26²) = O(1)`
    - DP arrays: `O(26)`
    - Total: **O(1)** extra space beyond input.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**