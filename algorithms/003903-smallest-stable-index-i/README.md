3903\. Smallest Stable Index I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Prefix Sum`, `Weekly Contest 498`

You are given an integer array `nums` of length `n` and an integer `k`.

For each index `i`, define its **instability score** as `max(nums[0..i]) - min(nums[i..n - 1])`.

In other words:

- `max(nums[0..i])` is the **largest** value among the elements from index 0 to index `i`.
- `min(nums[i..n - 1])` is the **smallest** value among the elements from index `i` to index `n - 1`.

An index `i` is called **stable** if its instability score is **less than or equal to** `k`.

Return the **smallest** stable index. If no such index exists, return -1.

**Example 1:**

- **Input:** nums = [5,0,1,4], k = 3
- **Output:** 3
- **Explanation:**
  - At index 0: The maximum in ``[5]`` is 5, and the minimum in ``[5, 0, 1, 4]`` is 0, so the instability score is `5 - 0 = 5`.
  - At index 1: The maximum in ``[5, 0]`` is 5, and the minimum in ``[0, 1, 4]`` is 0, so the instability score is `5 - 0 = 5`.
  - At index 2: The maximum in ``[5, 0, 1]`` is 5, and the minimum in ``[1, 4]`` is 1, so the instability score is `5 - 1 = 4`.
  - At index 3: The maximum in ``[5, 0, 1, 4]`` is 5, and the minimum in ``[4]`` is 4, so the instability score is `5 - 4 = 1`.
  - This is the first index with an instability score less than or equal to `k = 3`. Thus, the answer is 3.


**Example 2:**

- **Input:** nums = [3,2,1], k = 1
- **Output:** -1
- **Explanation:**
  - At index 0, the instability score is `3 - 1 = 2`.
  - At index 1, the instability score is `3 - 1 = 2`.
  - At index 2, the instability score is `3 - 1 = 2`.
  - None of these values is less than or equal to `k = 1`, so the answer is -1.


**Example 3:**

- **Input:** nums = [0], k = 0
- **Output:** 0
- **Explanation:** At index 0, the instability score is `0 - 0 = 0`, which is less than or equal to `k = 0`. Therefore, the answer is 0.


**Example 4:**

- **Input:** nums = [1,2,3], k = 0
- **Output:** -1


**Example 5:**

- **Input:** nums = [10,1,5,2], k = 5
- **Output:** 1


**Example 6:**

- **Input:** nums = [4,2,2,4], k = 2
- **Output:** 1


**Example 7:**

- **Input:** nums = [100], k = 50
- **Output:** 0


**Example 8:**

- **Input:** nums = [5,5,5,5], k = 0
- **Output:** 0


**Constraints:**

- `1 <= nums.length <= 100`
- `0 <= nums[i] <= 10⁹`
- `0 <= k <= 10⁹`


**Hint:**
1. Simulate as described


**Solution:**

We solve the problem by precomputing prefix maximums and suffix minimums for the given array, then scanning from left to right to find the first index where the instability score `(max(0..i) - min(i..n-1))` is ≤ `k`. This allows us to evaluate each index in constant time after an _**O(n)**_ preprocessing step.

## Approach

- Precompute a `prefixMax` array where `prefixMax[i]` = maximum value in `nums[0..i]`.
- Precompute a `suffixMin` array where `suffixMin[i]` = minimum value in `nums[i..n-1]`.
- Iterate over all indices from `0` to `n-1`.
- For each index `i`, compute the instability score as `prefixMax[i] - suffixMin[i]`.
- Return the first index where this score ≤ `k`. If none, return `-1`.

Let's implement this solution in PHP: **[3903. Smallest Stable Index I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003903-smallest-stable-index-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function firstStableIndex(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo firstStableIndex([5,0,1,4], 3) .  "\n"; // Output: 3
echo firstStableIndex([3,2,1], 1) .  "\n"; // Output: -1
echo firstStableIndex([0], 0) .  "\n"; // Output: 0
echo firstStableIndex([1,2,3], 0) .  "\n"; // Output: -1
echo firstStableIndex([10,1,5,2], 5) .  "\n"; // Output: 1
echo firstStableIndex([4,2,2,4], 2) .  "\n"; // Output: 1
echo firstStableIndex([100], 50) .  "\n"; // Output: 0
echo firstStableIndex([5,5,5,5], 0) .  "\n"; // Output: 0
?>
```

### Explanation:

- **Prefix maximums** are built left-to-right: `prefixMax[i] = max(prefixMax[i-1], nums[i])`.
- **Suffix minimums** are built right-to-left: `suffixMin[i] = min(suffixMin[i+1], nums[i])`.
- **Instability score** for index `i` is simply the difference between the precomputed prefix max and suffix min at that index.
- Since we process indices in increasing order, the first one satisfying the condition is the smallest stable index.
- This method handles all edge cases, including single‑element arrays and negative results, without needing nested loops.

## Complexity Analysis

- **Time Complexity:** ***O(n)*** – we do three linear passes (prefix, suffix, and scanning) over the array.
- **Space Complexity:** ***O(n)*** – we store two auxiliary arrays of size `n` for prefix max and suffix min.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**