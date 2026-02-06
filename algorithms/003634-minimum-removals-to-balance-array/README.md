3634\. Minimum Removals to Balance Array

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Sliding Window`, `Sorting`, `Biweekly Contest 162`

You are given an integer array `nums` and an integer `k`.

An array is considered **balanced** if the value of its **maximum** element is **at most** `k` times the **minimum** element.

You may remove **any** number of elements from `nums` without making it **empty**.

Return the **minimum** number of elements to remove so that the remaining array is balanced.

**Note:** An array of size 1 is considered balanced as its maximum and minimum are equal, and the condition always holds true.

**Example 1:**

- **Input:** nums = [2,1,5], k = 2
- **Output:** 1
- **Explanation:**
  - Remove `nums[2] = 5` to get `nums = [2, 1]`.
  - Now `max = 2`, `min = 1` and `max <= min * k` as `2 <= 1 * 2`. Thus, the answer is `1`.


**Example 2:**

- **Input:** nums = [1,6,2,9], k = 3
- **Output:** 2
- **Explanation:**
  - Remove `nums[0] = 1` and `nums[3] = 9` to get `nums = [6, 2]`.
  - Now `max = 6`, `min = 2` and `max <= min * k` as `6 <= 2 * 3`. Thus, the answer is `2`.


**Example 3:**

- **Input:** nums = [4,6], k = 2
- **Output:** 0
- **Explanation:** Since `nums` is already balanced as `6 <= 4 * 2`, no elements need to be removed.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `1 <= k <= 10⁵`



**Hint:**
1. Sort `nums` and use two pointers `i` and `j` so that the window's minimum is `nums[i]` and maximum is `nums[j]`.
2. Expand `j` while `nums[j] <= k * nums[i]` to maximize the balanced window; answer = `n - (j - i + 1)`.






**Solution:**

We are given an array nums and integer k. We need to remove the minimum number of elements so that the remaining array is balanced, i.e., `max(remaining) <= k * min(remaining)`.

### Approach:

- **Sort the array** to bring elements into increasing order
- Use a **sliding window technique** with two pointers:
   - `i` represents the minimum element of our window
   - `j` represents the maximum element of our window
- For each possible minimum `nums[i]`, find the largest `j` such that `nums[j] <= k * nums[i]`
- Track the **maximum window length** where the condition holds
- The minimum removals = total elements - maximum window length

Let's implement this solution in PHP: **[3634. Minimum Removals to Balance Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003634-minimum-removals-to-balance-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minRemoval(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minRemoval([2,1,5], 2) . "\n";         // Output: 1
echo minRemoval([1,6,2,9], 3) . "\n";       // Output: 2
echo minRemoval([4,6], 2) . "\n";           // Output: 0
?>
```

### Explanation:

Let me break down the solution in detail:

**1. Why sorting works:**
- The balance condition only depends on the min and max values
- After sorting, any subarray will have its leftmost element as min and rightmost as max
- This allows us to use a sliding window on the sorted array

**2. Sliding window logic:**
- Fix `i` as the left pointer (minimum of current window)
- Move `j` rightwards while `nums[j] <= k * nums[i]`
- When condition breaks, we've found the largest valid window with `nums[i]` as min
- The window `[i, j)` is balanced (j exclusive)

**3. Optimization:**
- We don't need to reset `j` to `i` each time
- Since array is sorted, when `i` increases (min becomes larger), the condition `nums[j] <= k * nums[i]` becomes easier to satisfy
- So `j` only moves forward, giving us O(n) time for the sliding window

**4. Why this finds minimal removals:**
- The largest valid window requires fewest removals
- Any element outside this window must be removed
- Removals = n - max_window_length

### Complexity
- **Time Complexity**: O(n log n) for sorting + O(n) for sliding window = O(n log n)
- **Space Complexity**: O(1) if we sort in-place (or O(n) if we need to preserve original)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**