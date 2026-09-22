3535\. Find X Value of Array II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Segment Tree`, `Weekly Contest 446`

You are given an array of **positive** integers `nums` and a **positive** integer `k`. You are also given a 2D array `queries`, where `queries[i] = [indexᵢ, valueᵢ, startᵢ, xᵢ]`.

You are allowed to perform an operation **once** on `nums`, where you can remove any **suffix** from `nums` such that `nums` remains **non-empty**.

The **x-value** of `nums` **for a given** `x` is defined as the number of ways to perform this operation so that the **product** of the remaining elements leaves a remainder of `x` **modulo** `k`.

For each query in `queries` you need to determine the **x-value** of `nums` for `xᵢ` after performing the following actions:

- Update `nums[indexᵢ]` to `valueᵢ`. Only this step persists for the rest of the queries.
- **Remove** the prefix `nums[0..(startᵢ - 1)]` (where `nums[0..(-1)]` will be used to represent the **empty** prefix).

Return an array `result` of size `queries.length` where `result[i]` is the answer for the `iᵗʰ` query.

A **prefix** of an array is a **subarray[^1]** that starts from the beginning of the array and extends to any point within it.

A **suffix** of an array is a **subarray[^1]** that starts at any point within the array and extends to the end of the array.

**Note** that the prefix and suffix to be chosen for the operation can be **empty**.

**Note** that x-value has a _different_ definition in this version.

**Example 1:**

- **Input:** nums = [1,2,3,4,5], k = 3, queries = [[2,2,0,2],[3,3,3,0],[0,1,0,1]]
- **Output:** [2,2,2]
- **Explanation:**
  - For query 0, `nums` becomes `[1, 2, 2, 4, 5]`, and the empty prefix **must** be removed. The possible operations are:
    - Remove the suffix `[2, 4, 5]`. nums becomes `[1, 2]`.
    - Remove the empty suffix. `nums` becomes `[1, 2, 2, 4, 5]` with a product 80, which gives remainder 2 when divided by 3.
  - For query 1, `nums` becomes `[1, 2, 2, 3, 5]`, and the prefix `[1, 2, 2]` **must** be removed. The possible operations are:
    - Remove the empty suffix. `nums` becomes `[3, 5]`.
    - Remove the suffix `[5]`. `nums` becomes `[3]`.
  - For query 2, `nums` becomes `[1, 2, 2, 3, 5]`, and the empty prefix **must** be removed. The possible operations are:
    - Remove the suffix `[2, 2, 3, 5]`. `nums` becomes `[1]`.
    - Remove the suffix `[3, 5]`. `nums` becomes `[1, 2, 2]`.


**Example 2:**

- **Input:** nums = [1,2,4,8,16,32], k = 4, queries = [[0,2,0,2],[0,2,0,1]]
- **Output:** [1,0]
- **Explanation:**
  - For query 0, `nums` becomes `[2, 2, 4, 8, 16, 32]`. The only possible operation is:
    - Remove the suffix `[2, 4, 8, 16, 32]`.
  - For query 1, `nums` becomes `[2, 2, 4, 8, 16, 32]`. There is no possible way to perform the operation.


**Example 3:**

- **Input:** nums = [1,1,2,1,1], k = 2, queries = [[2,1,0,1]]
- **Output:** [5]


**Example 4:**

- **Input:** nums = [5], k = 2, queries = [[0,1,0,1]]
- **Output:** [1]


**Example 5:**

- **Input:** nums = [2,2], k = 3, queries = [[0,2,0,0]]
- **Output:** [0]


**Example 6:**

- **Input:** nums = [1,2,3], k = 2, queries = [[1,2,0,0],[1,1,0,1]]
- **Output:** [2,3]

**Constraints:**

- `1 <= nums[i] <= 10⁹`
- `1 <= nums.length <= 10⁵`
- `1 <= k <= 5`
- `1 <= queries.length <= 2 * 10⁴`
- `queries[i] == [indexᵢ, valueᵢ, startᵢ, xᵢ]`
- `0 <= indexᵢ <= nums.length - 1`
- `1 <= valueᵢ <= 10⁹`
- `0 <= startᵢ <= nums.length - 1`
- `0 <= xᵢ <= k - 1`


**Hint:**

1. Use a segment tree to efficiently maintain and merge product prefix information for the array `nums`.
2. In each segment tree node, store a frequency count of prefix product remainders for every `x` in the range [0, k - 1].
3. For each query, update `nums[index]` to `value`, then merge the segments corresponding to `nums[start..n - 1]` to compute the `x`-value for `xᵢ`.


**Similar Questions:**
1. [2424. Longest Uploaded Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002424-longest-uploaded-prefix)
2. [3117. Minimum Sum of Values by Dividing Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003117-minimum-sum-of-values-by-dividing-array)


**Solution:**

We maintain a segment tree where each node stores the product modulo `k` of its segment and a frequency array of non-empty prefix product remainders. After each point update, a range query over `nums[start..n-1]` merges segment nodes in order, and the answer is the frequency of remainder `x`.

## Approach

- Removing prefix `nums[0..start-1]` leaves the subarray `nums[start..n-1]`.
- Removing a suffix while keeping the array non-empty is equivalent to choosing a non-empty prefix of this remaining subarray.
- So the task becomes: count non-empty prefixes of `nums[start..n-1]` whose product modulo `k` equals `x`.
- Each segment-tree node stores:
    - `prod`: product of the whole segment modulo `k`.
    - `cnt[r]`: number of non-empty prefixes of this segment whose product modulo `k` is `r`.
- Merge two adjacent segments `L` then `R`:
    - New product = `prodL * prodR % k`.
    - Prefixes are either from `L`, or the whole `L` followed by a prefix of `R`.
    - For every remainder `y` with `cntR[y] > 0`, add it to remainder `(prodL * y) % k`.
- Build the tree bottom-up.
- For each query:
    - Update `nums[index] = value` in the tree and recompute ancestors.
    - Query range `[start, n - 1]` by merging segment nodes in left-to-right order.
    - Return `mergedCnt[x]`.

Let's implement this solution in PHP: **[3535. Find X Value of Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003525-find-x-value-of-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer[][] $queries
 * @return Integer[]
 */
function resultArray(array $nums, int $k, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $prod
 * @param $cnt
 * @param $i
 * @param $k
 * @return void
 */
function pull(&$prod, &$cnt, $i, $k): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $leftProd
 * @param $leftCnt
 * @param $rightProd
 * @param $rightCnt
 * @param $k
 * @return void
 */
function mergeLeft(&$leftProd, &$leftCnt, $rightProd, $rightCnt, $k): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nodeProd
 * @param $nodeCnt
 * @param $rightProd
 * @param $rightCnt
 * @param $k
 * @return void
 */
function mergeRight($nodeProd, $nodeCnt, &$rightProd, &$rightCnt, $k): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo resultArray([1,2,3,4,5], 3, [[2,2,0,2],[3,3,3,0],[0,1,0,1]]) .  "\n";      // Output: [2, 2, 2]
echo resultArray([1,2,4,8,16,32], 4, [[0,2,0,2],[0,2,0,1]]) .  "\n";            // Output: [1, 0]
echo resultArray([1,1,2,1,1], 2, [[2,1,0,1]]) .  "\n";                          // Output: [5]
echo resultArray([5], 2, [[0,1,0,1]]) .  "\n";                                  // Output: [1]
echo resultArray([2,2], 3, [[0,2,0,0]]) .  "\n";                                // Output: [0]
echo resultArray([1,2,3], 2, [[1,2,0,0],[1,1,0,1]]) .  "\n";                    // Output: [2,3]
?>
```

### Explanation:

- The segment tree avoids recomputing prefix products from scratch for every query.
- Since `k <= 5`, each merge only loops over at most `5` remainders, making merges very cheap.
- The update is persistent because the tree is updated before processing the next query.
- The range query preserves order using left and right accumulators:
    - Left accumulator collects segments from the left side.
    - Right accumulator collects segments from the right side.
    - Finally, they are merged in the correct order.
- The provided PHP code implements exactly this logic.

## Complexity Analysis

- Let `n = nums.length`, `q = queries.length`, and `k <= 5`.
- Build: `O(n * k)`
- Each update: `O(k log n)`
- Each query: `O(k log n)`
- Total time: `O(k * (n + q log n))`
- Space: `O(k * n)` for the segment tree frequency arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**