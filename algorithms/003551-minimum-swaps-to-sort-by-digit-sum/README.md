3551\. Minimum Swaps to Sort by Digit Sum

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Sorting`, `Weekly Contest 450`

You are given an array `nums` of **distinct** positive integers. You need to sort the array in **increasing** order based on the sum of the digits of each number. If two numbers have the same digit sum, the **smaller** number appears first in the sorted order.

Return the **minimum** number of swaps required to rearrange `nums` into this sorted order.

A **swap** is defined as exchanging the values at two distinct positions in the array.

**Example 1:**

- **Input:** nums = [37,100]
- **Output:** 1
- **Explanation:**
  - Compute the digit sum for each integer: `[3 + 7 = 10, 1 + 0 + 0 = 1] → [10, 1]`
  - Sort the integers based on digit sum: `[100, 37]`. Swap `37` with `100` to obtain the sorted order.
  - Thus, the minimum number of swaps required to rearrange `nums` is 1.

**Example 2:**

- **Input:** nums = [22,14,33,7]
- **Output:** 0
- **Explanation:**
  - Compute the digit sum for each integer: `[2 + 2 = 4, 1 + 4 = 5, 3 + 3 = 6, 7 = 7] → [4, 5, 6, 7]`
  - Sort the integers based on digit sum: `[22, 14, 33, 7]`. The array is already sorted.
  - Thus, the minimum number of swaps required to rearrange `nums` is 0.

**Example 3:**

- **Input:** nums = [18,43,34,16]
- **Output:** 2
- **Explanation:**
  - Compute the digit sum for each integer: `[1 + 8 = 9, 4 + 3 = 7, 3 + 4 = 7, 1 + 6 = 7] → [9, 7, 7, 7]`
  - Sort the integers based on digit sum: `[16, 34, 43, 18]`. Swap `18` with `16`, and swap `43` with `34` to obtain the sorted order.
  - Thus, the minimum number of swaps required to rearrange `nums` is 2.

**Example 4:**

- **Input:** nums = [1]
- **Output:** 0

**Example 5:**

- **Input:** nums = [5,3,1]
- **Output:** 1

**Example 6:**

- **Input:** nums = [10,1]
- **Output:** 1

**Example 7:**

- **Input:** nums = [1000000000,1]
- **Output:** 1

**Example 8:**

- **Input:** nums = [9,8,7,6,5,4,3,2,1]
- **Output:** 4

**Example 9:**

- **Input:** nums = [11,20,2]
- **Output:** 1

**Example 10:**

- **Input:** nums = [100,10,1]
- **Output:** 1


**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `nums` consists of **distinct** positive integers.


**Hint:**

1. First, sort the array based on digit sum (and value as a tiebreaker). Then, map each original value to its index in the sorted array.
2. Now, the problem reduces to finding the minimum number of swaps to sort this mapped array. The answer is `n - number_of_cycles` in the permutation.


**Solution:**

We solve this problem by first determining the target sorted order (by digit sum, tie-broken by value), then reducing the problem to "minimum swaps to sort a permutation." Using the classic cycle-decomposition technique, the answer is `n - number_of_cycles`. The provided PHP implementation is correct and optimal.

## Approach

- **Compute target order:** For each number, calculate its digit sum and sort the array by `(digit_sum, value)` to obtain the desired final arrangement.
- **Map values to target positions:** Since all numbers are distinct, build a hash map `value → target_index`.
- **Build the permutation array:** For each position `i` in the original array, `perm[i]` = the index in the sorted array where `nums[i]` belongs.
- **Count cycles in the permutation:** Traverse the permutation using a `visited` array; every unvisited node starts a new cycle.
- **Apply the formula:** Minimum swaps = `n − number_of_cycles`.

Let's implement this solution in PHP: **[3551. Minimum Swaps to Sort by Digit Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003551-minimum-swaps-to-sort-by-digit-sum/solution.php)**

```php
<?php
/**
 * Compute the sum of digits of a positive integer
 *
 * @param int $num
 * @return int
 */
function digitSum(int $num): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param Integer[] $nums
 * @return Integer
 */
function minSwaps(array $nums): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minSwaps([37,100]) .  "\n";                        // Output: 1
echo minSwaps([22,14,33,7]) .  "\n";                    // Output: 0
echo minSwaps([18,43,34,16]) .  "\n";                   // Output: 2
echo minSwaps([1]) .  "\n";                             // Output: 0
echo minSwaps([5, 3, 1]) .  "\n";                       // Output: 1
echo minSwaps([10, 1]) .  "\n";                         // Output: 1
echo minSwaps([1000000000, 1]) .  "\n";                 // Output: 1
echo minSwaps([9, 8, 7, 6, 5, 4, 3, 2, 1]) .  "\n";     // Output: 4
echo minSwaps([11, 20, 2]) .  "\n";                     // Output: 1
echo minSwaps([100, 10, 1]) .  "\n";                    // Output: 1
?>
```

## Explanation:

- **Why cycle decomposition works:**
    - A permutation decomposes into disjoint cycles.
    - A cycle of length `k` requires exactly `k − 1` swaps to resolve.
    - Summing over all cycles gives `(k₁−1) + (k₂−1) + … = n − c`, where `c` is the cycle count.
- **Digit sum computation:**
    - Repeatedly take `num % 10` and divide by 10 — O(digits) per number.
- **Sorting tiebreaker:**
    - When digit sums match, the smaller number must come first (e.g., `16 < 34 < 43` in Example 3).
- **Distinctness of values:**
    - Guaranteed by the constraints, so a `value → index` map is safe and uniquely defined.
- **Traversal correctness:**
    - Following `j = perm[j]` from any node visits exactly its cycle before returning to the start, so marking `visited[j] = true` is sound.
- **Early exit:**
    - Arrays of length 0 or 1 need zero swaps (handled by the `n <= 1` guard).

## Complexity Analysis

- **Time:** `O(n log n)`
    - Digit sum computation: `O(n · log₁₀(max))` ≈ `O(n)`
    - Sorting: `O(n log n)`
    - Building maps + permutation + cycle counting: `O(n)`
- **Space:** `O(n)`
    - `$pairs`, `$valueToTargetIndex`, `$perm`, `$visited` each use `O(n)` extra space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**