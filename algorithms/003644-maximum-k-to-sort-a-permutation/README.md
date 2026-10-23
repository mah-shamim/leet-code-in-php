3644\. Maximum K to Sort a Permutation

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Bit Manipulation`, `Weekly Contest 462`

You are given an integer array `nums` of length `n`, where `nums` is a **permutation[^1]** of the numbers in the range `[0..n - 1]`.

You may swap elements at indices `i` and `j` **only if** `nums[i] AND nums[j] == k`, where `AND` denotes the bitwise AND operation and `k` is a **non-negative** integer.

Return the **maximum** value of `k` such that the array can be sorted in **non-decreasing** order using any number of such swaps. If `nums` is already sorted, return 0.

[^1]: **Permutation:** A permutation is a rearrangement of all the elements of an array.

**Example 1:**

- **Input:** nums = [0]
- **Output:** 0
- **Explanation:** The array is already sorted, so no swaps are needed and the answer is `0`.

**Example 2:**

- **Input:** nums = [0,3,2,1]
- **Output:** 1
- **Explanation:** Choose `k = 1`. Swapping `nums[1] = 3` and `nums[3] = 1` is allowed since `nums[1] AND nums[3] == 1`, resulting in a sorted permutation: `[0, 1, 2, 3]`.

**Example 3:**

- **Input:** nums = [0,1,3,2]
- **Output:** 2
- **Explanation:** Choose `k = 2`. Swapping `nums[2] = 3` and `nums[3] = 2` is allowed since `nums[2] AND nums[3] == 2`, resulting in a sorted permutation: `[0, 1, 2, 3]`.

**Example 4:**

- **Input:** nums = [3,2,1,0]
- **Output:** 0
- **Explanation:** The misplaced values are `3, 2, 1, 0`, and `3 AND 2 AND 1 AND 0 == 0`. Only `k = 0` allows the required swaps, so the answer is `0`.

**Example 5:**

- **Input:** nums = [1,0]
- **Output:** 0
- **Explanation:** The only misplaced values are `1` and `0`. Since `1 AND 0 == 0`, only `k = 0` allows the swap, so the answer is `0`.

**Example 6:**

- **Input:** nums = [0,5,2,3,4,1]
- **Output:** 1
- **Explanation:** Choose `k = 1`. Swapping `nums[1] = 5` and `nums[5] = 1` is allowed since `5 AND 1 == 1`, resulting in a sorted permutation: `[0, 1, 2, 3, 4, 5]`.

**Example 7:**

- **Input:** nums = [0,1,2,6,4,5,3]
- **Output:** 2
- **Explanation:** Choose `k = 2`. Swapping `nums[3] = 6` and `nums[6] = 3` is allowed since `6 AND 3 == 2`, resulting in a sorted permutation: `[0, 1, 2, 3, 4, 5, 6]`.

**Example 8:**

- **Input:** nums = [0,1,2,3,4,5,6,11,8,9,10,13,12,7]
- **Output:** 1
- **Explanation:** Choose `k = 1`. The misplaced values are `11`, `13`, and `7`. Using value `1` as a buffer, swaps such as `11 AND 1 == 1`, `13 AND 1 == 1`, and `7 AND 1 == 1` are allowed, so the permutation can be sorted. Since `11 AND 13 AND 7 == 1`, no larger `k` works, so the answer is `1`.

**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= n - 1`
- `nums` is a permutation of integers from `0` to `n - 1`.


**Hint:**

1. Take the bitwise AND of all elements that are not in their correct position.


**Solution:**

We compute the bitwise AND of every position/value that is not already in its correct place. For a permutation, the set of misplaced indices is the same as the set of misplaced values, so the provided PHP code can safely AND the indices `i` where `nums[i] != i`. If the array is already sorted, we return `0`; otherwise, the maximum valid `k` is that AND mask.

## Approach

- Traverse the permutation once.
- Track whether the array is already sorted.
- For every index `i` where `nums[i] != i`, include `i` in the answer mask using bitwise AND.
- If no mismatch is found, return `0`.
- Otherwise, return the accumulated AND mask.

Let's implement this solution in PHP: **[3644. Maximum K to Sort a Permutation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003644-maximum-k-to-sort-a-permutation/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function sortPermutation(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sortPermutation([0]) . "\n";                                   // Output: 0
echo sortPermutation([0,3,2,1]) . "\n";                             // Output: 1
echo sortPermutation([0,1,3,2]) . "\n";                             // Output: 2
echo sortPermutation([3,2,1,0]) . "\n";                             // Output: 0
echo sortPermutation([1,0]) . "\n";                                 // Output: 0
echo sortPermutation([0,5,2,3,4,1]) . "\n";                         // Output: 1
echo sortPermutation([0,1,2,6,4,5,3]) . "\n";                       // Output: 2
echo sortPermutation([0,1,2,3,4,5,6,11,8,9,10,13,12,7]) . "\n";     // Output: 1
?>
```

### Explanation:

- A value not in its correct position must participate in at least one swap.
- If a swap between values `x` and `y` is allowed for a given `k`, then `x AND y == k`, so every bit of `k` must also be present in both `x` and `y`.
- Therefore, `k` must be a `submask` of every misplaced value, meaning `k` cannot exceed the bitwise AND of all misplaced values.
- Let `M` be the bitwise AND of all misplaced values. Then `M` is a `submask` of every misplaced value, so `M AND x == M` for every misplaced `x`.
- The value `M` always exists in the permutation and can act as a connector/buffer for all misplaced values, so `k = M` is always achievable.
- Since no larger `k` is possible, the maximum valid `k` is exactly `M`.
- In a permutation, the set of misplaced indices equals the set of misplaced values, so the code can AND the indices `i` where `nums[i] != i`.

## Complexity Analysis

- **Time Complexity:** `O(n)`, because we scan the array once.
- **Space Complexity:** `O(1)`, because only a few scalar variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**