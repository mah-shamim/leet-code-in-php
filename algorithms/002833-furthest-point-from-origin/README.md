2833\. Furthest Point From Origin

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Counting`, `Weekly Contest 360`

You are given a string `moves` of length `n` consisting only of characters `'L'`, `'R'`, and `'_'`. The string represents your movement on a number line starting from the origin `0`.

In the `iᵗʰ` move, you can choose one of the following directions:

- move to the left if `moves[i] = 'L'` or `moves[i] = '_'`
- move to the right if `moves[i] = 'R'` or `moves[i] = '_'`

Return _the **distance from the origin** of the **furthest** point you can get to after `n` moves_.

**Example 1:**

- **Input:** moves = "L_RL__R"
- **Output:** 3
- **Explanation:** The furthest point we can reach from the origin 0 is point -3 through the following sequence of moves "LLRLLLR".

**Example 2:**

- **Input:** moves = "_R__LL_"
- **Output:** 5
- **Explanation:** The furthest point we can reach from the origin 0 is point -5 through the following sequence of moves "LRLLLLL".

**Example 3:**

- **Input:** moves = "_______"
- **Output:** 7
- **Explanation:** The furthest point we can reach from the origin 0 is point 7 through the following sequence of moves "RRRRRRR".

**Example 4:**

- **Input:** moves = "R"
- **Output:** 1

**Example 5:**

- **Input:** moves = "_"
- **Output:** 1

**Constraints:**

- `1 <= moves.length == n <= 50`
- `moves` consists only of characters `'L'`, `'R'` and `'_'`.



**Hint:**
1. In an optimal answer, all occurrences of `'_’` will be replaced with the same character.
2. Replace all characters of `'_’` with the character that occurs the most.



**Similar Questions:**
1. [657. Robot Return to Origin](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000657-robot-return-to-origin)






**Solution:**

The goal is to find the furthest possible distance from the origin after processing a series of moves where `'L'` and `'R'` are fixed, and `'_'` can be chosen as either `'L'` or `'R'`. The solution calculates the net position range based on fixed moves and then uses all underscores to maximize distance in one direction.

### Approach:

- Count the number of `'L'`, `'R'`, and `'_'` in the input string.
- Compute the net position after all fixed moves: `net = count('R') - count('L')`.
- The underscores can be used entirely as `'R'` (to increase net position) or as `'L'` (to decrease net position).
- Calculate the two possible final positions:
   - All underscores as `'R'`: `maxPos = net + underscoreCount`
   - All underscores as `'L'`: `minPos = net - underscoreCount`
- The answer is the maximum absolute value of these two positions, representing the furthest distance from origin.

Let's implement this solution in PHP: **[2833. Furthest Point From Origin](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002833-furthest-point-from-origin/solution.php)**

```php
<?php
/**
 * @param String $moves
 * @return Integer
 */
function furthestDistanceFromOrigin(string $moves): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo furthestDistanceFromOrigin("L_RL__R") . "\n";              // Output: 3
echo furthestDistanceFromOrigin("_R__LL_") . "\n";              // Output: 5
echo furthestDistanceFromOrigin("_______") . "\n";              // Output: 7
echo furthestDistanceFromOrigin("R") . "\n";                    // Output: 1
echo furthestDistanceFromOrigin("_") . "\n";                    // Output: 1
?>
```

### Explanation:

- **Step 1 — Count moves:**  
  - `$r = substr_count($moves, 'R')`  
  - `$l = substr_count($moves, 'L')`  
  - `$underscore = substr_count($moves, '_')`  
  - This gives us the fixed net movement and flexibility.

- **Step 2 — Net from fixed moves:** `$net = $r - $l` represents the position after fixed moves only.

- **Step 3 — Two extreme final positions:**
   - If all `'_'` move right: `$maxPos = $net + $underscore`
   - If all `'_'` move left: `$minPos = $net - $underscore`

- **Step 4 — Furthest point:** The furthest distance from origin is the larger absolute value of `$maxPos` and `$minPos`.

### Complexity
- **Time Complexity**: _**O(n)**_, Counting takes linear time based on string length.
- **Space Complexity**: _**O(1)**_, Only a few integer variables are used.
- **Algorithmic efficiency:** Optimal — no sorting or extra data structures needed.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**