3147\. Taking Maximum Energy From the Mystic Dungeon

**Difficulty:** Medium

**Topics:** `Array`, `Prefix Sum`, `Weekly Contest 397`

In a mystic dungeon, `n` magicians are standing in a line. Each magician has an attribute that gives you energy. Some magicians can give you negative energy, which means taking energy from you.

You have been cursed in such a way that after absorbing energy from magician `i`, you will be instantly transported to magician `(i + k)`. This process will be repeated until you reach the magician where `(i + k)` does not exist.

In other words, you will choose a starting point and then teleport with `k` jumps until you reach the end of the magicians' sequence, **absorbing all the energy** during the journey.

You are given an array `energy` and an integer `k`. Return the **maximum** possible energy you can gain.

**Note** that when you are reach a magician, you must take energy from them, whether it is negative or positive energy.

**Example 1:**

- **Input:**  energy = [5,2,-10,-5,1], k = 3
- **Output:** 3
- **Explanation:** We can gain a total energy of 3 by starting from magician 1 absorbing 2 + 1 = 3.

**Example 2:**

- **Input:** energy = [-2,-3,-1], k = 2
- **Output:** -1
- **Explanation:** We can gain a total energy of -1 by starting from magician 2.

**Constraints:**

- `1 <= energy.length <= 10⁵`
- `-1000 <= energy[i] <= 1000`
- `1 <= k <= energy.length - 1`



**Hint:**
1. Let `dp[i]` denote the energy we gain starting from index `i`.
2. We can notice, that  `dp[i] = dp[i + k] + energy[i]`.






**Solution:**

We need to determine the maximum energy we can gain by starting at any magician in a line and then teleporting with jumps of size `k` until we reach the end of the line. Each magician provides a certain amount of energy (positive or negative), and we must absorb energy from every magician we land on during the journey.

### Approach
1. **Problem Analysis**: The problem involves traversing the array in steps of `k` starting from any index. The goal is to find the starting index that maximizes the sum of energies collected during such a traversal.
2. **Key Insight**: The indices can be grouped based on their remainders when divided by `k`. Each group forms a separate sequence of indices that we traverse when starting from any index in that group. The sum of energies for each starting index in a group can be efficiently computed using a suffix sum approach.
3. **Algorithm Selection**: We use dynamic programming to compute the cumulative energy from the end of the array backwards. For each index `i`, the energy gained starting from `i` is the energy at `i` plus the energy gained starting from `i + k` (if within bounds). This allows us to compute the maximum energy efficiently.

Let's implement this solution in PHP: **[3147. Taking Maximum Energy From the Mystic Dungeon](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003147-taking-maximum-energy-from-the-mystic-dungeon/solution.php)**

```php
<?php
/**
 * @param Integer[] $energy
 * @param Integer $k
 * @return Integer
 */
function maximumEnergy($energy, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$energy = [5, 2, -10, -5, 1];
$k = 3;
echo maximumEnergy($energy, $k) . "\n"; // Output: 3

// Example 2
$energy = [-2, -3, -1];
$k = 2;
echo maximumEnergy($energy, $k) . "\n"; // Output: -1
?>
```

### Explanation:

1. **Initialization**: We initialize an array `dp` of the same length as `energy` to store the cumulative energy starting from each index.
2. **Backward Pass**: We iterate from the end of the array to the start. For each index `i`, we set `dp[i]` to the energy at `i`. If `i + k` is within bounds, we add `dp[i + k]` to `dp[i]`, which represents the energy gained from subsequent jumps.
3. **Track Maximum**: During the backward pass, we keep track of the maximum value in `dp`, which gives the maximum energy achievable from any starting index.
4. **Result**: The maximum value found during the iteration is returned as the result.

This approach efficiently computes the solution by leveraging dynamic programming to avoid redundant calculations, ensuring optimal performance even for large input sizes. The time complexity is O(n), where n is the length of the energy array, and the space complexity is O(n) for the dp array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**