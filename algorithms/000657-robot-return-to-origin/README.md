657\. Robot Return to Origin

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Simulation`

There is a robot starting at the position `(0, 0)`, the origin, on a 2D plane. Given a sequence of its moves, judge if this robot **ends up at** `(0, 0)` after it completes its moves.

You are given a string `moves` that represents the move sequence of the robot where `moves[i]` represents its `iᵗʰ` move. Valid moves are `'R'` (right), `'L'` (left), `'U'` (up), and `'D'` (down).

Return _`true` if the robot returns to the origin after it finishes all of its moves, or `false` otherwise._

**Note:** The way that the robot is "facing" is irrelevant. `'R'` will always make the robot move to the right once, `'L'` will always make it move left, etc. Also, assume that the magnitude of the robot's movement is the same for each move.

**Example 1:**

- **Input:** moves = "UD"
- **Output:** true
- **Explanation:** The robot moves up once, and then down once. All moves have the same magnitude, so it ended up at the origin where it started. Therefore, we return true.

**Example 2:**

- **Input:** moves = "LL"
- **Output:** false
- **Explanation:** The robot moves left twice. It ends up two "moves" to the left of the origin. We return false because it is not at the origin at the end of its moves.

**Example 3:**

- **Input:** moves = "RRDD"
- **Output:** false

**Example 4:**

- **Input:** moves = "LDRL"
- **Output:** false

**Example 5:**

- **Input:** moves = "RLUDRLD"
- **Output:** true

**Example 6:**

- **Input:** moves = ""
- **Output:** true

**Constraints:**

- `1 <= moves.length <= 2 * 10⁴`
- `moves` only contains the characters `'U'`, `'D'`, `'L'` and `'R'`.



**Similar Questions:**
1. [547. Number of Provinces](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000547-number-of-provinces)
2. [2120. Execution of All Suffix Instructions Staying in a Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002120-execution-of-all-suffix-instructions-staying-in-a-grid)
3. [2833. Furthest Point From Origin](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002833-furthest-point-from-origin)






**Solution:**

The robot starts at the origin `(0, 0)`. After a series of moves (`U`, `D`, `L`, `R`), it returns to the origin **if and only if** the number of up moves equals the number of down moves **and** the number of left moves equals the number of right moves. The solution counts each move type and compares the counts.

### Approach:

- Count the frequency of each move character in the string.
- Compare the count of `'U'` with `'D'` — they must be equal to cancel vertical movement.
- Compare the count of `'L'` with `'R'` — they must be equal to cancel horizontal movement.
- Return `true` if both conditions hold, otherwise `false`.

Let's implement this solution in PHP: **[657. Robot Return to Origin](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000657-robot-return-to-origin/solution.php)**

```php
<?php
/**
 * @param String $moves
 * @return Boolean
 */
function judgeCircle(string $moves): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo judgeCircle("UD") . "\n";              // Output: true
echo judgeCircle("LL") . "\n";              // Output: false
echo judgeCircle("RRDD") . "\n";            // Output: false
echo judgeCircle("LDRL") . "\n";            // Output: false
echo judgeCircle("RLUDRLD") . "\n";         // Output: true
echo judgeCircle("") . "\n";                // Output: true
?>
```

### Explanation:

- The robot’s position changes by `(x, y)` where:
   - `'U'` increments `y`
   - `'D'` decrements `y`
   - `'R'` increments `x`
   - `'L'` decrements `x`
- To end at `(0, 0)`, total change in `x` must be 0 and total change in `y` must be 0.
- This is equivalent to:  
  `count('U') == count('D')` and `count('L') == count('R')`.
- The solution uses `array_count_values` to get counts, then checks these equalities with null coalescing to handle missing moves.

### Complexity
- **Time Complexity**: _**O(n)**_, `str_split` and `array_count_values` each traverse the string once.
- **Space Complexity**: _**O(1)**_, Only stores counts for 4 possible characters.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**