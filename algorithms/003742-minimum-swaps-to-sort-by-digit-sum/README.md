3742\. Minimum Swaps to Sort by Digit Sum

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


**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `nums` consists of **distinct** positive integers.


**Hint:**

1. First, sort the array based on digit sum (and value as a tiebreaker). Then, map each original value to its index in the sorted array.
2. Now, the problem reduces to finding the minimum number of swaps to sort this mapped array. The answer is `n - number_of_cycles` in the permutation.


**Solution:**

we are given an array of distinct positive integers and need to sort them by digit sum (with value as a tiebreaker), then compute the minimum number of swaps to reach that target order. We treat the problem as a permutation cycle decomposition: each element knows where it needs to go, and the minimum swaps equal `n` minus the number of cycles in the permutation.

## Approach

- Compute the digit sum for each number in the array.
- Create pairs of `[digit_sum, value]` and sort them by digit sum in ascending order, using the value as a tiebreaker when digit sums are equal.
- Map each original value to its target index in the sorted array using a hash table.
- Build a permutation array where `perm[i]` is the target index of the element currently at position `i`.
- Count the number of cycles in the permutation by traversing each unvisited position and following the permutation chain until returning to the start.
- Return `n - cycles` as the minimum number of swaps, since each cycle of length `k` requires `k - 1` swaps.

Let's implement this solution in PHP: **[3742. Minimum Swaps to Sort by Digit Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003742-minimum-swaps-to-sort-by-digit-sum/solution.php)**

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
function minimumSwaps(array $nums): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumSwaps([37, 100]);           // Output: 1
echo minimumSwaps([22, 14, 33, 7]);     // Output: 0
echo minimumSwaps([18, 43, 34, 16]);    // Output: 2
?>
```

### Explanation:

- The `digitSum()` function extracts each digit using modulo and integer division, accumulating the sum until the number becomes zero.
- We create pairs of `[digit_sum, value]` for all elements, allowing us to sort by digit sum while preserving the original values.
- `usort()` sorts the pairs by digit sum first, then by value as a tiebreaker, producing the target sorted order.
- A hash map `$valueToTargetIndex` stores the target position of each distinct value in the sorted array.
- The permutation array `$perm` maps each current position to its target position, forming a permutation of `0` to `n-1`.
- Cycle detection uses a visited array: for each unvisited index, we follow the permutation chain, marking positions as visited, and increment the cycle count.
- The formula `n - cycles` gives the minimum swaps because a cycle of length `k` needs exactly `k - 1` swaps to resolve.

## Complexity Analysis

- **Time Complexity:** `O(n log n)` — Sorting the pairs dominates with `O(n log n)`. Digit sum computation takes `O(n * d)` where `d` is the number of digits (at most 10 for `10⁹`), and cycle detection runs in `O(n)`. Overall: `O(n log n)`.
- **Space Complexity:** `O(n)` — We store pairs, a value-to-index hash map, a permutation array, and a visited array, each of size `O(n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
