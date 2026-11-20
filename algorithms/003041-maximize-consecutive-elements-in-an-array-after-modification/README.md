3041\. Maximize Consecutive Elements in an Array After Modification

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Dynamic Programming`, `Sorting`, `Biweekly Contest 124`

You are given a **0-indexed** array `nums` consisting of **positive** integers.

Initially, you can increase the value of **any** element in the array by **at most** 1.

After that, you need to select **one or more** elements from the final array such that those elements are **consecutive** when sorted in increasing order. For example, the elements `[3, 4, 5]` are consecutive while `[3, 4, 6]` and `[1, 1, 2, 3]` are not.

Return _the **maximum** number of elements that you can select_.

**Example 1:**

- **Input:** nums = [2,1,5,1,1]
- **Output:** 3
- **Explanation:** 
  - We can increase the elements at indices 0 and 3. The resulting array is nums = [3,1,5,2,1].
  - We select the elements [<ins>**3**</ins>,<ins>**1**</ins>,5,<ins>**2**</ins>,1], and we sort them to obtain [1,2,3], which are consecutive.
  - It can be shown that we cannot select more than 3 consecutive elements.

**Example 2:**

- **Input:** nums = [1,4,7,10]
- **Output:** 1
- **Explanation:** The maximum consecutive elements that we can select is 1.

**Example 3:**

- **Input:** nums = [1,2,3]
- **Output:** 3

**Example 4:**

- **Input:** nums = [1,1,1,1]
- **Output:** 2

**Example 5:**

- **Input:** nums = [2,2,2,2]
- **Output:** 2

**Example 6:**

- **Input:** nums = [3,4,5,6]
- **Output:** 4

**Example 7:**

- **Input:** nums = [1,3,5,7]
- **Output:** 2

**Example 8:**

- **Input:** nums = [1,2,2,3,3,4]
- **Output:** 5

**Example 9:**

- **Input:** nums = [5]
- **Output:** 1

**Example 10:**

- **Input:** nums = [1,1,2,2,3,3]
- **Output:** 4

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁶`


**Hint:**

1. Sort the array and try using dynamic programming.
2. Let `dp[i]` be the length of the longest consecutive elements ending at element at index `i` in the sorted array.


**Solution:**

We sort the array and use a hash-map-based dynamic programming approach where `dp[v]` stores the maximum length of a consecutive sequence ending at value `v`. For each element, we try two choices: keep it as-is, or increase it by 1, and update the DP state accordingly while ensuring the same element is never reused in the same sequence.

## Approach

- **Sort** `nums` so that we process values in increasing order, guaranteeing that any consecutive sequence we build is contiguous in value space.
- Maintain a map `dp` where `dp[v]` = maximum length of a consecutive selected sequence whose last (largest) value is `v`.
- For each element `x` in sorted order, consider two options (each element can be increased by at most 1):
  - **Keep as `x`:** extend the best sequence ending at `x-1`, giving length `dp[x-1] + 1`. Update `dp[x]`.
  - **Increase to `x+1`:** extend the best sequence ending at `x` (captured *before* the current element is applied), giving length `oldX + 1`. Update `dp[x+1]`.
- Snapshot `oldX = dp[x]` and `oldPrev = dp[x-1]` before any writes, so the two options cannot double-use the current element.
- Track the global maximum across all updates.

Let's implement this solution in PHP: **[3041. Maximize Consecutive Elements in an Array After Modification](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003041-maximize-consecutive-elements-in-an-array-after-modification/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxSelectedElements(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSelectedElements([2,1,5,1,1]) . "\n";    // Output: 3
echo maxSelectedElements([1,4,7,10]) . "\n";     // Output: 1
echo maxSelectedElements([1,2,3]) . "\n";        // Output: 3
echo maxSelectedElements([1,1,1,1]) . "\n";      // Output: 2
echo maxSelectedElements([2,2,2,2]) . "\n";      // Output: 2
echo maxSelectedElements([3,4,5,6]) . "\n";      // Output: 4
echo maxSelectedElements([1,3,5,7]) . "\n";      // Output: 2
echo maxSelectedElements([1,2,2,3,3,4]) . "\n";  // Output: 5
echo maxSelectedElements([5]) . "\n";            // Output: 1
echo maxSelectedElements([1,1,2,2,3,3]) . "\n";  // Output: 4
?>
```

## Explanation

- **Why `oldX` matters:** When increasing `x` to `x+1`, we want to append to a sequence that ended at value `x` *before* the current element was used. If we read `dp[x]` after the "keep as `x`" update, we would be extending a sequence that already includes the current element — violating "each element used once." Hence we snapshot `oldX` first.
- **Why `dp[x-1]` is safe to read directly:** `dp[x-1]` is only modified when processing elements of value `x-2` (which increase to `x-1`) or `x-1` itself. Since the array is sorted, an element of value `x-1` has already been processed and `dp[x-1]` now reflects the best achievable state — exactly what we need.
- **Why we take `max` when writing:**
  - `dp[x]` may already hold a sequence built by a previous element `x-1` increased to `x`. We keep whichever is longer.
  - `dp[x+1]` may already hold a sequence built by a previous element `x` increased to `x+1`. We keep whichever is longer.
- **Why sorting is essential:** It ensures that when we consider extending a sequence ending at `x-1` or `x`, all candidate predecessors have already been processed and their DP values are final.
- **Why the answer is `max(dp[x], dp[x+1])` after each element:** These are the only two entries touched for the current `x`, so the running maximum correctly captures the longest sequence across all values.

## Complexity Analysis

- **Time Complexity:** `O(n log n)` — dominated by sorting `nums`. The DP pass is `O(n)` with hash map operations averaging `O(1)`.
- **Space Complexity:** `O(n)` — the `dp` map holds at most `O(n)` distinct keys (values and value+1 for each element).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**