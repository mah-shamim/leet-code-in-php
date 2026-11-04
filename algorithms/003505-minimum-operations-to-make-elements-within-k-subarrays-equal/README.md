3505\. Minimum Operations to Make Elements Within K Subarrays Equal

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Hash Table`, `Math`, `Dynamic Programming`, `Sliding Window`, `Heap (Priority Queue)`, `Weekly Contest 443`

You are given an integer array `nums` and two integers, `x` and `k`. You can perform the following operation any number of times (**including zero**):

- Increase or decrease any element of `nums` by 1.

Return the **minimum** number of operations needed to have **at least** `k` _non-overlapping_ **subarrays[^1]** of size **exactly** `x` in `nums`, where all elements within each subarray are equal.

[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [5,-2,1,3,7,3,6,4,-1], x = 3, k = 2
- **Output:** 8
- **Explanation:**
  - Use 3 operations to add 3 to `nums[1]` and use 2 operations to subtract 2 from `nums[3]`. The resulting array is `[5, 1, 1, 1, 7, 3, 6, 4, -1]`.
  - Use 1 operation to add 1 to `nums[5]` and use 2 operations to subtract 2 from `nums[6]`. The resulting array is `[5, 1, 1, 1, 7, 4, 4, 4, -1]`.
  - Now, all elements within each subarray `[1, 1, 1]` (from indices 1 to 3) and `[4, 4, 4]` (from indices 5 to 7) are equal. Since 8 total operations were used, 8 is the output.


**Example 2:**

- **Input:** nums = [9,-2,-2,-2,1,5], x = 2, k = 2
- **Output:** 3
- **Explanation:**
  - Use 3 operations to subtract 3 from `nums[4]`. The resulting array is `[9, -2, -2, -2, -2, 5]`.
  - Now, all elements within each subarray `[-2, -2]` (from indices 1 to 2) and `[-2, -2]` (from indices 3 to 4) are equal. Since 3 operations were used, 3 is the output.
    **Example 3:**

- **Input:** nums = [1,1,1,1,1], x = 2, k = 2
- **Output:** 0

**Example 4:**

- **Input:** nums = [-5,-5,-5,-5,-5], x = 2, k = 2
- **Output:** 0

**Example 5:**

- **Input:** nums = [1,2,3,4], x = 2, k = 2
- **Output:** 2

**Example 6:**

- **Input:** nums = [5,1,3], x = 3, k = 1
- **Output:** 4

**Example 7:**

- **Input:** nums = [3,1,2,4,5,6], x = 2, k = 3
- **Output:** 5

**Example 8:**

- **Input:** nums = [1,2,3,4,5,6,7,8], x = 4, k = 2
- **Output:** 8

**Example 9:**

- **Input:** nums = [-1000000,1000000,-1000000,1000000], x = 2, k = 2
- **Output:** 4000000

**Example 10:**

- **Input:** nums = [0,0,0,100,100,0,0,0], x = 3, k = 2
- **Output:** 0

**Example 11:**

- **Input:** nums = [10,-10,10,-10,10,-10], x = 2, k = 3
- **Output:** 60

**Example 12:**

- **Input:** nums = [1,1,2,2,3,3,4,4], x = 4, k = 2
- **Output:** 8


**Constraints:**

- `2 <= nums.length <= 10⁵`
- `-10⁶ <= nums[i] <= 10⁶`
- `2 <= x <= nums.length`
- `1 <= k <= 15`
- `2 <= k * x <= nums.length`


**Hint:**

1. Making every element of an x-sized window equal to its median is optimal.
2. Precalculate this for each window.


**Similar Questions:**

1. [295. Find Median from Data Stream](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000295-find-median-from-data-stream)
2. [462. Minimum Moves to Equal Array Elements II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000462-minimum-moves-to-equal-array-elements-ii)


**Solution:**

We solve this problem by first precomputing the minimum cost to make every `x`-sized window uniform (using the median as target), then applying a prefix DP to select `k` non-overlapping windows with minimum total cost. Window costs are computed in `O(log n)` per position using two Fenwick trees (BITs) — one for counts, one for sums — over coordinate-compressed values, enabling efficient sliding-window median and cost queries.

## Approach

- **Coordinate compress** all `nums` values so BIT indices are bounded by `m ≤ n`.
- **Two Fenwick trees** (`bitCount`, `bitSum`) maintain the multiset of values inside the current window of size `x`.
- **Initial window fill**: insert the first `x` elements into both BITs.
- **Sliding window**: for each start index `0 … n-x`, do:
  - Find the **lower median** (`(x+1)/2`-th smallest) via BIT `kth` query.
  - Compute `sum |aᵢ − median|` using prefix count/sum at the median rank.
  - Slide: remove `nums[start]`, insert `nums[start+x]`, updating both BITs and the running window sum.
- **DP for window selection**: `prev[i]` = min cost using `chosen-1` windows among first `i` elements.
  - Transition: `cur[i] = min(cur[i-1], prev[i-x] + cost[i-x])`.
  - Iterate `chosen = 1…k`, return `prev[n]`.

Let's implement this solution in PHP: **[3505. Minimum Operations to Make Elements Within K Subarrays Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003505-minimum-operations-to-make-elements-within-k-subarrays-equal/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $x
 * @param Integer $k
 * @return Integer
 */
function minOperations(array $nums, int $x, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $bitCount
 * @param $bitSum
 * @param $idx
 * @param $deltaCount
 * @param $deltaSum
 * @param $m
 * @return void
 */
function add(&$bitCount, &$bitSum, $idx, $deltaCount, $deltaSum, $m): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $bitCount
 * @param $k
 * @param $m
 * @param $highestPower
 * @return int|mixed
 */
function kth($bitCount, $k, $m, $highestPower): mixed
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minOperations([5,-2,1,3,7,3,6,4,-1], 3, 2) . "\n";               // Output: 8
echo minOperations([9,-2,-2,-2,1,5], 2, 2) . "\n";                    // Output: 3
echo minOperations([1,1,1,1,1], 2, 2) . "\n";                         // Output: 0
echo minOperations([-5,-5,-5,-5,-5], 2, 2) . "\n";                    // Output: 0
echo minOperations([1,2,3,4], 2, 2) . "\n";                           // Output: 2
echo minOperations([5,1,3], 3, 1) . "\n";                             // Output: 4
echo minOperations([3,1,2,4,5,6], 2, 3) . "\n";                       // Output: 5
echo minOperations([1,2,3,4,5,6,7,8], 4, 2) . "\n";                   // Output: 8
echo minOperations([-1000000,1000000,-1000000,1000000], 2, 2) . "\n"; // Output: 4000000
echo minOperations([0,0,0,100,100,0,0,0], 3, 2) . "\n";               // Output: 0
echo minOperations([10,-10,10,-10,10,-10], 2, 3) . "\n";              // Output: 60
echo minOperations([1,1,2,2,3,3,4,4], 4, 2) . "\n";                   // Output: 4
?>
```

## Explanation

- **Why median?** For a fixed window, `sum |aᵢ − m|` is minimized at the median (hint 1). Any even-sized window can use the lower median without loss.
- **Why BIT?** We need the median and the count/sum split around it in `O(log n)` while sliding. Two BITs give count and sum for the rank query, and prefix sums up to the median let us split the window into left/right halves.
- **Cost formula:**
  - `cost = median * cntLE − sumLE + (windowSum − sumLE) − median * (x − cntLE)`
  - First half: elements ≤ median — sum of `(median − aᵢ)`.
  - Second half: elements > median — sum of `(aᵢ − median)`.
- **Non-overlap enforcement in DP:** Placing a window ending at `i−1` (starting at `i−x`) consumes exactly those `x` slots, so `prev[i−x]` uses positions before the window starts — guaranteeing non-overlap by construction.
- **"At least k" vs "exactly k":** Since each window cost is non-negative, `min` over exactly `k` equals `min` over `≥ k`. The constraint `k*x ≤ n` guarantees feasibility.
- **Lower median handling for even `x`:** Using the lower median still yields the minimum L1 cost, so `medianRank = (x+1)/2` is correct for both odd and even window sizes.

## Complexity Analysis

• **Time Complexity**:
  - Coordinate compression: `O(n log n)`
  - Initial window fill: `O(x log n)`
  - Sliding window (`n − x + 1` steps, each `O(log n)`): `O(n log n)`
  - DP: `O(k · n)` ≤ `O(15 · 10⁵)`
  - **Total: `O(n log n + nk)`**
• **Space Complexity**:
  - `bitCount`, `bitSum` arrays of size `m + 1`: `O(n)`
  - `vals`, `map`, `nums`, `prev`, `cur`, `cost`: `O(n)`
  - **Total: `O(n)`**

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**