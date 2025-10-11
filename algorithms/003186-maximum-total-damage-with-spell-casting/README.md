3186\. Maximum Total Damage With Spell Casting

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Two Pointers`, `Binary Search`, `Dynamic Programming`, `Sorting`, `Counting`, `Weekly Contest 402`

A magician has various spells.

You are given an array `power`, where each element represents the damage of a spell. Multiple spells can have the same damage value.

It is a known fact that if a magician decides to cast a spell with a damage of `power[i]`, they **cannot** cast any spell with a damage of `power[i] - 2`, `power[i] - 1`, `power[i] + 1`, or `power[i] + 2`.

Each spell can be cast **only once**.

Return the **maximum** possible _total damage_ that a magician can cast.

**Example 1:**

- **Input:** power = [1,1,3,4]
- **Output:** 6
- **Explanation:** The maximum possible damage of 6 is produced by casting spells 0, 1, 3 with damage 1, 1, 4.

**Example 2:**

- **Input:** power = [7,1,6,6]
- **Output:** 13
- **Explanation:** The maximum possible damage of 13 is produced by casting spells 1, 2, 3 with damage 1, 6, 6.

**Constraints:**

- `1 <= power.length <= 10⁵`
- `1 <= power[i] <= 10⁹`



**Hint:**
1. If we ever decide to use some spell with power `x`, then we will use all spells with power `x`.
2. Think of dynamic programming.
3. `dp[i][j]` represents the maximum damage considering up to the `iᵗʰ` unique spell and `j` represents the number of spells skipped (up to 3 as per constraints).






**Solution:**

We need to find the maximum total damage a magician can achieve while respecting the constraint that casting a spell with damage `x` prevents casting spells with damage `x-2`, `x-1`, `x+1`, or `x+2`.

## Approach

1. **Count Frequencies**: First, I'll count how many times each damage value appears, since if we use a damage value, we might as well use all instances of it.

2. **Sort Unique Damages**: I'll get all unique damage values and sort them to process in order.

3. **Dynamic Programming**: I'll use a DP approach where:
   - `dp[i]` represents the maximum damage achievable considering the first `i` unique damage values
   - At each step, I can either skip the current damage or take it
   - If I take current damage `x`, I cannot take damages `x-2`, `x-1`, `x+1`, `x+2`

4. **Binary Search**: To efficiently find which previous damages are allowed when taking current damage, I'll use binary search to find the largest damage that is at least 3 less than current damage.

Let's implement this solution in PHP: **[3186. Maximum Total Damage With Spell Casting](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003186-maximum-total-damage-with-spell-casting/solution.php)**

```php
<?php
/**
 * @param Integer[] $power
 * @return Integer
 */
function maxTotalDamage($power) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxTotalDamage([1,1,3,4]) . "\n"; // Output: 6
echo maxTotalDamage([7,1,6,6]) . "\n"; // Output: 13
?>
```

### Explanation:

1. **Frequency Counting**: I count how many times each damage value appears using a hash map.

2. **Sorting**: I extract the unique damage values and sort them to process in increasing order.

3. **DP Transition**: For each unique damage value at position `i`:
   - **Skip**: The maximum damage without using current damage is `dp[i-1]`
   - **Take**: The damage from using all instances of current damage plus the maximum damage from allowed previous damages

4. **Binary Search**: When taking current damage `x`, I need to find the largest damage that is ≤ `x-3` (ensuring no conflict with `x-2` and `x-1`). I use binary search for efficiency.

5. **Conflict Handling**: The constraints `x+1` and `x+2` are automatically handled because we process damages in sorted order - when we reach `x+1` or `x+2`, we'll check if `x` was taken and skip if necessary.

## Complexity Analysis
- **Time Complexity**: O(n log n) where n is the number of unique damage values
   - Sorting: O(n log n)
   - DP with binary search: O(n log n)
- **Space Complexity**: O(n) for frequency map, unique array, and DP array

The solution efficiently handles the constraints by leveraging sorting, dynamic programming, and binary search to find the optimal combination of spells while respecting the casting restrictions.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**