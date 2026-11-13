3420\. Count Non-Decreasing Subarrays After K Operations

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Stack`, `Segment Tree`, `Queue`, `Sliding Window`, `Monotonic Stack`, `Monotonic Queue`, `Weekly Contest 432`

You are given an array `nums` of `n` integers and an integer `k`.

For each subarray of `nums`, you can apply **up to** `k` operations on it. In each operation, you increment any element of the subarray by 1.

**Note** that each subarray is considered independently, meaning changes made to one subarray do not persist to another.

Return the number of subarrays that you can make **non-decreasing** after performing at most `k` operations.

An array is said to be **non-decreasing** if each element is greater than or equal to its previous element, if it exists.

**Example 1:**

- **Input:** nums = [6,3,1,2,4,4], k = 7
- **Output:** 17
- **Explanation:** 
  - Out of all 21 possible subarrays of `nums`, only the subarrays `[6, 3, 1]`, `[6, 3, 1, 2]`, `[6, 3, 1, 2, 4]` and `[6, 3, 1, 2, 4, 4]` cannot be made non-decreasing after applying up to `k = 7` operations. 
  - Thus, the number of non-decreasing subarrays is `21 - 4 = 17`.

**Example 2:**

- **Input:** nums = [6,3,1,3,6], k = 4
- **Output:** 12
- **Explanation:** The subarray `[3, 1, 3, 6]` along with all subarrays of `nums` with three or fewer elements, except `[6, 3, 1]`, can be made non-decreasing after `k` operations. There are 5 subarrays of a single element, 4 subarrays of two elements, and 2 subarrays of three elements except `[6, 3, 1]`, so there are `1 + 5 + 4 + 2 = 12` subarrays that can be made non-decreasing.

**Example 3:**

- **Input:** nums = [1], k = 1
- **Output:** 1

**Example 4:**

- **Input:** nums = [1,2,3,4], k = 1
- **Output:** 10

**Example 5:**

- **Input:** nums = [5,4,3,2,1], k = 1000000000
- **Output:** 15

**Example 6:**

- **Input:** nums = [1,1,1,1], k = 1
- **Output:** 10

**Example 7:**

- **Input:** nums = [6,3,1,2,4,4], k = 0
- **Output:** 12

**Example 8:**

- **Input:** nums = [3,1,2], k = 1
- **Output:** 4

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `1 <= k <= 10⁹`


**Hint:**

1. Use a sparse table.
2. Compute `sp[e][i] = [lastElement, operations]` where `operations` is the number of `operations` required to make the subarray `nums[i...i + 2ᵉ - 1]` non-decreasing, and `lastElement` be the value of the last element after the operations were applied on it.
3. How can we combine `sp[a][i]` with `sp[b][i + 2ᵃ]` to find the answer for the subarray `nums[i...i + 2ᵃ + 2ᵇ - 1]`?


**Similar Questions:**

1. [665. Non-decreasing Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000665-non-decreasing-array)


**Solution:**

We solve this by iterating a right-to-left sliding window `[left, right]` and maintaining the exact minimum cost to make the window non-decreasing. A monotonic deque stores "block starts" of the prefix-maximum profile — groups of positions that share the same running maximum — so each element is pushed and popped O(1) amortized times, giving a linear-time solution.

## Approach

- **Key observation:** To make `nums[l..r]` non-decreasing with the fewest increments, set `b[i] = max(nums[l..i])`. The cost is `Σ (max(nums[l..i]) − nums[i])`.
- **Sliding window, right-to-left:** For each `left` from `n−1` down to `0`, extend the window leftward and shrink `right` until the cost fits within `k`.
- **Monotonic deque of block starts:** Because the prefix maximum is non-increasing as we move right from `left`, the window partitions into blocks with equal prefix max. Front of deque = rightmost block (its max is the prefix max at `right`); back = leftmost block.
- **Adding `nums[left]`:** Pop every leftward block whose max `≤ nums[left]`; each absorbed block of size `s` contributes `s × (nums[left] − blockMax)` to the cost.
- **Shrinking on overflow:** While `cost > k`, remove `nums[right]`. Its prefix max equals `nums[dq[head]]` (head block's max), so cost drops by `nums[dq[head]] − nums[right]`.
- **Count valid subarrays:** All subarrays `[left..e]` for `e ∈ [left, right]` are valid; add `right − left + 1`.

Let's implement this solution in PHP: **[3420. Count Non-Decreasing Subarrays After K Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003420-count-non-decreasing-subarrays-after-k-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countNonDecreasingSubarrays(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countNonDecreasingSubarrays([6,3,1,2,4,4], 7) .  "\n";         // Output: 17
echo countNonDecreasingSubarrays([6,3,1,3,6], 4) .  "\n";           // Output: 12
echo countNonDecreasingSubarrays([1], 1) .  "\n";                   // Output: 1
echo countNonDecreasingSubarrays([1,2,3,4], 1) .  "\n";             // Output: 10
echo countNonDecreasingSubarrays([5,4,3,2,1], 1000000000) .  "\n";  // Output: 15
echo countNonDecreasingSubarrays([1,1,1,1], 1) .  "\n";             // Output: 10
echo countNonDecreasingSubarrays([6,3,1,2,4,4], 0) .  "\n";         // Output: 7
echo countNonDecreasingSubarrays([3,1,2], 1) .  "\n";               // Output: 5
?>
```

## Explanation

- **Prefix-max trick:** Raising each element to the running maximum is provably the minimal-increment way to make a sequence non-decreasing.
- **Block decomposition:** Positions with the same running maximum form contiguous "blocks"; each block is identified by its start index stored in the deque.
- **Merging when adding `left`:** Any block with max `≤ nums[left]` is fully raised to `nums[left]`; multiplying block size by the max-difference updates the total cost in O(1) per popped block.
- **Shrinking from the right:** The rightmost element lies in the front block; its prefix max is that block's max. Removing it decrements cost by `blockMax − nums[right]`; when the block shrinks to a single element removed, advance `head`.
- **Amortization:** Each index enters the deque once (when `left` visits it) and is removed at most once from the back (merge) and once from the front (shrink) — O(n) total.

## Complexity Analysis

- **Time Complexity:** `O(n)` — each index is pushed once, popped at most twice; the outer loop runs `n` times and the two `while` loops are amortized O(1) per iteration.
- **Space Complexity:** `O(n)` — the deque array `dq` of size `n`, plus `O(1)` scalars.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**