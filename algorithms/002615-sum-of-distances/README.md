2615\. Sum of Distances

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Prefix Sum`, `Weekly Contest 340`

You are given a **0-indexed** integer array `nums`. There exists an array `arr` of length `nums.length`, where `arr[i]` is the sum of `|i - j|` over all `j` such that `nums[j] == nums[i]` and `j != i`. If there is no such `j`, set `arr[i]` to be `0`.

Return _the array `arr`_.

**Example 1:**

- **Input:** nums = [1,3,1,1,2]
- **Output:** [5,0,3,4,0]
- **Explanation:**
  - When `i = 0`, `nums[0] == nums[2]` and `nums[0] == nums[3]`. Therefore, `arr[0] = |0 - 2| + |0 - 3| = 5`.
  - When `i = 1`, `arr[1] = 0` because there is no other index with value `3`.
  - When `i = 2`, `nums[2] == nums[0]` and `nums[2] == nums[3]`. Therefore, `arr[2] = |2 - 0| + |2 - 3| = 3`.
  - When `i = 3`, `nums[3] == nums[0]` and `nums[3] == nums[2]`. Therefore, `arr[3] = |3 - 0| + |3 - 2| = 4`.
  - When `i = 4`, `arr[4] = 0` because there is no other index with value `2`.

**Example 2:**

- **Input:** nums = [0,5,3]
- **Output:** [0,0,0]
- **Explanation:** Since each element in nums is distinct, `arr[i] = 0` for all `i`.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁹`

Note: This question is the same as [2121: Intervals Between Identical Elements](https://leetcode.com/problems/intervals-between-identical-elements/description/).


**Hint:**
1. Can we use the prefix sum here?
2. For each number `x`, collect all the indices where `x` occurs, and calculate the prefix sum of the array.
3. For each occurrence of `x`, the indices to the right will be regular subtraction while the indices to the left will be reversed subtraction.


**Similar Questions:**
1. [26. Remove Duplicates from Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000026-remove-duplicates-from-sorted-array)
2. [442. Find All Duplicates in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000442-find-all-duplicates-in-an-array)
3. [2602. Minimum Operations to Make All Array Elements Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002602-minimum-operations-to-make-all-array-elements-equal)






**Solution:**

The solution computes, for each index `i`, the sum of absolute differences `|i - j|` for all `j ≠ i` where `nums[j] == nums[i]`.  
It groups indices by value, then uses **prefix sums** to efficiently calculate the total distance to all other same-valued indices in **O(n)** time.

### Approach:

- **Group indices by value** — create a mapping from each unique number to a list of indices where it appears.
- **For each group of indices** (already sorted by the order they appear in `nums`):
   - Compute the **prefix sums** of the indices.
   - For each index `pos` at position `j` in the group:
      - Split the group into **left** and **right** parts relative to `pos`.
      - Use the formula:
        ```
        arr[pos] = (pos * leftCount - leftSum) + (rightSum - pos * rightCount)
        ```
        where:
         - `leftCount = j`, `rightCount = k - j - 1`
         - `leftSum` = sum of indices to the left of `pos`
         - `rightSum` = sum of indices to the right of `pos`
- This avoids an **O(k²)** per-group computation.

Let's implement this solution in PHP: **[2615. Sum of Distances](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002615-sum-of-distances/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function distance(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo distance([1,3,1,1,2]) . "\n";          // Output: [5,0,3,4,0]
echo distance([0,5,3]) . "\n";              // Output: [0,0,0]
echo distance([1, 2, 3]) . "\n";            // Output: 0
?>
```

### Explanation:

- **Why grouping?**  
  The problem only requires distances to indices with the same value. Grouping allows us to process all same-value indices together.

- **Why prefix sums?**  
  If we have sorted indices `[i₀, i₁, ..., iₖ₋₁]` for a value, then for index `iⱼ`:
   - Distance to all left indices = `iⱼ * j - sum(i₀..iⱼ₋₁)`
   - Distance to all right indices = `sum(iⱼ₊₁..iₖ₋₁) - iⱼ * (k - j - 1)`
   - Prefix sums let us compute `sum(i₀..iⱼ₋₁)` and `sum(iⱼ₊₁..iₖ₋₁)` in **O(1)**.

- **Why efficient?**  
  Each index is processed once, and prefix sums are computed in **O(k)** per group, so total **O(n)**.

### Complexity
- **Time Complexity**: _**O(n)**_ — We iterate through the array to group indices, then process each group with prefix sums. Each index’s distance is computed in constant time after prefix sums.
- **Space Complexity**: _**O(n)**_ — For storing the groups of indices and prefix sums.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**