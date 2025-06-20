3443\. Maximum Manhattan Distance After K Changes

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `String`, `Counting`

You are given a string `s` consisting of the characters `'N'`, `'S'`, `'E'`, and `'W'`, where `s[i]` indicates movements in an infinite grid:

- `'N'` : Move north by 1 unit.
- `'S'` : Move south by 1 unit.
- `'E'` : Move east by 1 unit.
- `'W'` : Move west by 1 unit.

Initially, you are at the origin `(0, 0)`. You can change **at most** `k` characters to any of the four directions.

Find the **maximum Manhattan distance** from the origin that can be achieved at any time while performing the movements **in order**.
The **Manhattan Distance** between two cells <code>(x<sub>i</sub>, y<sub>i</sub>)</code> and <code>(x<sub>j</sub>, y<sub>j</sub>)</code> is <code>|x<sub>i</sub> - x<sub>j</sub>| + |y<sub>i</sub> - y<sub>j</sub>|</code>.

**Example 1:**

- **Input:** s = "NWSE", k = 1
- **Output:** 3
- **Explanation:** Change `s[2]` from `'S'` to `'N'`. The string s becomes `"NWNE"`.

| Movement	   | Position (x, y)	 | Manhattan Distance	 | Maximum |
|-------------|------------------|---------------------|---------|
| s[0] == 'N' | 	(0, 1)          | 0 + 1 = 1           | 1       |
| s[1] == 'W' | 	(-1, 1)         | 	1 + 1 = 2          | 	2      |
| s[2] == 'N' | 	(-1, 2)         | 	1 + 2 = 3          | 	3      |
| s[3] == 'E' | 	(0, 2)          | 	0 + 2 = 2          | 	3      |
   - The maximum Manhattan distance from the origin that can be achieved is 3. Hence, 3 is the output.

**Example 2:**

- **Input:** s = "NSWWEW", k = 3
- **Output:** 6
- **Explanation:**
  - Change `s[1]` from `'S'` to `'N'`, and `s[4]` from `'E'` to `'W'`. The string s becomes `"NNWWWW"`.
  - The maximum Manhattan distance from the origin that can be achieved is 6. Hence, 6 is the output.

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `0 <= k <= s.length`
- `s` consists of only `'N'`, `'S'`, `'E'`, and `'W'`.


**Hint:**
1. We can brute force all the possible directions (NE, NW, SE, SW).
2. Change up to `k` characters to maximize the distance in the chosen direction.

**Similar Questions:**
1. [1162. As Far from Land as Possible](https://leetcode.com/problems/as-far-from-land-as-possible/description/)






**Solution:**

We need to find the maximum Manhattan distance from the origin (0, 0) achievable at any point during the sequence of movements, given that we can change at most `k` characters in the string `s` to any of the four directions ('N', 'S', 'E', 'W'). The Manhattan distance is defined as the sum of the absolute differences in the x and y coordinates, i.e., |x| + |y|.

### Approach
1. **Initialization**: Start at the origin (0, 0). Initialize variables to track the current position (x, y) and the maximum Manhattan distance encountered (`ans`).
2. **Iterate through the string**: For each character in the string, update the current position (x, y) based on the movement direction:
   - 'N' increments the y-coordinate.
   - 'S' decrements the y-coordinate.
   - 'E' increments the x-coordinate.
   - 'W' decrements the x-coordinate.
3. **Calculate possible Manhattan distance**: At each step, compute the current Manhattan distance as |x| + |y|. The number of changes allowed at this step is the minimum of the remaining changes (`k`) and the number of movements processed so far (`i + 1`).
4. **Update maximum distance**: The maximum achievable Manhattan distance at this step is constrained by two factors:
   - The current Manhattan distance plus twice the number of changes allowed (since each change can potentially add 2 to the Manhattan distance by aligning movements optimally).
   - The total number of movements processed so far (i + 1), as the Manhattan distance cannot exceed this value (each movement contributes at most 1 to the distance).
5. **Track the maximum distance**: Compare the computed value at each step with the current maximum and update if a larger value is found.

Let's implement this solution in PHP: **[3443. Maximum Manhattan Distance After K Changes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003443-maximum-manhattan-distance-after-k-changes/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function maxDistance($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDistance("NWSE", 1) . PHP_EOL;   // 3
echo maxDistance("NSWWEW", 3) . PHP_EOL; // 6
?>
```

### Explanation:

- **Initialization**: The variables `x` and `y` are initialized to 0 to represent the starting position at the origin. The variable `ans` keeps track of the maximum Manhattan distance encountered during the movements.
- **Processing Movements**: For each character in the string `s`, the current position (x, y) is updated based on the direction of movement.
- **Current Manhattan Distance**: The Manhattan distance at each step is computed as the sum of the absolute values of the current coordinates, i.e., |x| + |y|.
- **Changes Allowed**: The number of changes allowed at each step is the lesser of the remaining changes (`k`) and the number of movements processed so far (`i + 1`).
- **Optimal Distance Calculation**: The potential maximum Manhattan distance at each step is calculated by adding twice the number of allowed changes to the current distance. This accounts for the possibility that each change can align movements to increase the distance by up to 2 units. However, the Manhattan distance cannot exceed the total number of movements (i + 1), so the minimum of these two values is taken.
- **Tracking Maximum Distance**: The maximum distance encountered during the iteration is stored in `ans` and returned as the result.

This approach efficiently computes the maximum Manhattan distance by leveraging the observation that each change can contribute up to 2 units to the distance, while ensuring the solution remains within feasible bounds by considering the number of movements processed. The algorithm runs in linear time, O(n), where n is the length of the string, making it suitable for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**