3904\. Smallest Stable Index II

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Prefix Sum`, `Weekly Contest 498`

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
  - At index 0: The maximum in `[5]` is 5, and the minimum in `[5, 0, 1, 4]` is 0, so the instability score is `5 - 0 = 5`.
  - At index 1: The maximum in `[5, 0]` is 5, and the minimum in `[0, 1, 4]` is 0, so the instability score is `5 - 0 = 5`.
  - At index 2: The maximum in `[5, 0, 1]` is 5, and the minimum in `[1, 4]` is 1, so the instability score is `5 - 1 = 4`.
  - At index 3: The maximum in `[5, 0, 1, 4]` is 5, and the minimum in `[4]` is 4, so the instability score is `5 - 4 = 1`.
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

- **Input:** nums = [5,5,5], k = 0
- **Output:** 0


**Example 5:**

- **Input:** nums = [1000000000,0,1000000000], k = 500000000
- **Output:** 1


**Example 6:**

- **Input:** nums = [1,2,3,4], k = 0
- **Output:** -1


**Example 7:**

- **Input:** nums = [4,3,2,1], k = 2
- **Output:** 1


**Example 8:**

- **Input:** nums = [10], k = 5
- **Output:** 0


**Example 9:**

- **Input:** nums = [0,5,0,5], k = 0
- **Output:** 0


**Example 10:**

- **Input:** nums = [100,1,50,2], k = 50
- **Output:** 1


**Constraints:**

- `1 <= nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁹`
- `0 <= k <= 10⁹`


**Hint:**
1. Precompute prefix maximums in an array `prefMax`, where `prefMax[i]` is the maximum of `nums[0..i]`
2. Precompute suffix minimums in an array `suffMin`, where `suffMin[i]` is the minimum of `nums[i..n-1]`
3. For each index `i`, compute the instability score as `prefMax[i] - suffMin[i]`
4. Return the smallest index where the instability score is `<= k`. If no such index exists, return `-1`


**Solution:**

We present an efficient solution for finding the smallest stable index in an array based on prefix maximums and suffix minimums. Our approach precomputes two auxiliary arrays in _**O(n)**_ time, allowing us to evaluate each index's instability score in constant time and return the first valid index or `-1` if none exists.

## Approach

- **Prefix Maximum Array**: We create an array where each position `i` stores the maximum value from `nums[0]` to `nums[i]`. This allows _**O(1)**_ retrieval of the maximum in the left subarray for any index.
- **Suffix Minimum Array**: We create another array where each position `i` stores the minimum value from `nums[i]` to `nums[n-1]`. This enables _**O(1)**_ retrieval of the minimum in the right subarray.
- **Single Pass Check**: We iterate through each index from `0` to `n-1`, compute the instability score as `prefMax[i] - suffMin[i]`, and return the first index where this value `≤ k`.
- **Early Termination**: Since we check indices in ascending order, the first match is guaranteed to be the smallest stable index.

Let's implement this solution in PHP: **[3904. Smallest Stable Index II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003904-smallest-stable-index-ii/solution.php)**

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
echo firstStableIndex([5,0,1,4], 3) .  "\n";                                // Output: 3
echo firstStableIndex([3,2,1], 1) .  "\n";                                  // Output: -1
echo firstStableIndex([0], 0) .  "\n";                                      // Output: 0
echo firstStableIndex([5,5,5], 0) .  "\n";                                  // Output: 0
echo firstStableIndex([1000000000,0,1000000000], 500000000) .  "\n";        // Output: 1
echo firstStableIndex([1,2,3,4], 0) .  "\n";                                // Output: -1
echo firstStableIndex([4,3,2,1], 2) .  "\n";                                // Output: 1
echo firstStableIndex([10], 5) .  "\n";                                     // Output: 0
echo firstStableIndex([0,5,0,5], 0) .  "\n";                                // Output: 0
echo firstStableIndex([100,1,50,2], 50) .  "\n";                            // Output: 1
?>
```

### Explanation:

- **Prefix Maximum Computation**: We start with `prefMax[0] = nums[0]`, then for each subsequent index `i`, we set `prefMax[i] = max(prefMax[i-1], nums[i])`. This maintains the running maximum from the start.
- **Suffix Minimum Computation**: We start with `suffMin[n-1] = nums[n-1]`, then iterate backwards setting `suffMin[i] = min(suffMin[i+1], nums[i])`. This maintains the running minimum from the end.
- **Instability Score Calculation**: For each index `i`, the left maximum is `prefMax[i]` and the right minimum is `suffMin[i]`. Their difference gives the instability score as defined in the problem.
- **Result Determination**: We check indices sequentially. The first index with score `≤ k` is returned. If we complete the loop without finding any, we return `-1`.
- **Edge Cases**: For `n=1`, both prefix maximum and suffix minimum are the single element, making the score `0`, which works with our algorithm.

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ where n is the length of the array. We make two passes for precomputation and one pass for checking, resulting in 3n operations.
- **Space Complexity**: _**O(n)**_ for storing the prefix maximum and suffix minimum arrays. Each array uses _**O(n)**_ space.
- **Optimization Note**: While we use two auxiliary arrays for clarity, we could reduce space to _**O(n)**_ by computing suffix minimums first, then doing a single pass from left to right maintaining prefix maximum. However, the current implementation is more readable and still meets the constraints efficiently.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**