3105\. Longest Strictly Increasing or Strictly Decreasing Subarray

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Weekly Contest 392`

You are given an array of integers `nums`. Return _the length of the **longest** **subarray[^1]** of `nums` which is either strictly **increasing[^2]** or **strictly decreasing[^3]**_.

**Example 1:**

- **Input:** nums = [1,4,3,3,2]
- **Output:** 2
- **Explanation:**
   - The strictly increasing subarrays of `nums` are `[1]`, `[2]`, `[3]`, `[3]`, `[4]`, and `[1,4]`.
   - The strictly decreasing subarrays of `nums` are `[1]`, `[2]`, `[3]`, `[3]`, `[4]`, `[3,2]`, and `[4,3]`.
   - Hence, we return `2`.

**Example 2:**

- **Input:** nums = [3,3,3,3]
- **Output:** 1
- **Explanation:**
   - The strictly increasing subarrays of `nums` are `[3]`, `[3]`, `[3]`, and `[3]`.
   - The strictly decreasing subarrays of `nums` are `[3]`, `[3]`, `[3]`, and `[3]`.
   - Hence, we return `1`.


**Example 3:**

- **Input:** nums = [3,2,1]
- **Output:** 3
- **Explanation:**
   - The strictly increasing subarrays of `nums` are `[3]`, `[2]`, and `[1]`.
   - The strictly decreasing subarrays of `nums` are `[3]`, `[2]`, `[1]`, `[3,2]`, `[2,1]`, and `[3,2,1]`.
   - Hence, we return `3`.

**Example 4:**

- **Input:** nums = [1]
- **Output:** 1

**Example 5:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 5

**Example 6:**

- **Input:** nums = [5,4,3,2,1]
- **Output:** 5

**Example 7:**

- **Input:** nums = [1,3,2,4,3]
- **Output:** 2

**Example 8:**

- **Input:** nums = [2,2,1,2,3]
- **Output:** 3

**Example 9:**

- **Input:** nums = [1,2,1,2,3,4]
- **Output:** 4

**Example 10:**

- **Input:** nums = [10,9,8,7,1,2]
- **Output:** 4



**Constraints:**

- `1 <= nums.length <= 50`
- `1 <= nums[i] <= 50`


[^1]: **Subarray** `A subarray is a contiguous non-empty sequence of elements within an array`.
[^2]: **Strictly Increasing Array** `An array is said to be strictly increasing if each element is strictly greater than its previous one (if exists)`.
[^3]: **Strictly Decreasing Array** `An array is said to be strictly decreasing if each element is strictly smaller than its previous one (if exists)`.


**Solution:**

We use a single left-to-right pass over `nums`, maintaining the current length of a strictly increasing run and a strictly decreasing run. Whenever a comparison breaks a run, the corresponding counter resets to `1`. The answer is the maximum run length seen.

## Approach

- Initialize `inc = 1` and `dec = 1` because every single element is a valid monotonic subarray of length `1`.
- Initialize `ans = 1` for the same reason.
- Iterate from index `1` to `n - 1`:
  - If `nums[i] > nums[i - 1]`, extend the increasing run: `inc++`, and reset `dec = 1`.
  - If `nums[i] < nums[i - 1]`, extend the decreasing run: `dec++`, and reset `inc = 1`.
  - If `nums[i] == nums[i - 1]`, both strict runs are broken: reset `inc = 1` and `dec = 1`.
- After each step, update `ans = max(ans, inc, dec)`.
- Return `ans`.

Let's implement this solution in PHP: **[3105. Longest Strictly Increasing or Strictly Decreasing Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003105-longest-strictly-increasing-or-strictly-decreasing-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestMonotonicSubarray(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo longestMonotonicSubarray([1, 4, 3, 3, 2]);     // Output: 2
echo longestMonotonicSubarray([3, 3, 3, 3]);        // Output: 1
echo longestMonotonicSubarray([3, 2, 1]);           // Output: 3
echo longestMonotonicSubarray([1]);                 // Output: 1
echo longestMonotonicSubarray([1, 2, 3, 4, 5]);     // Output: 5
echo longestMonotonicSubarray([5, 4, 3, 2, 1]);     // Output: 5
echo longestMonotonicSubarray([1, 3, 2, 4, 3]);     // Output: 2
echo longestMonotonicSubarray([2, 2, 1, 2, 3]);     // Output: 3
echo longestMonotonicSubarray([1, 2, 1, 2, 3, 4]);  // Output: 4
echo longestMonotonicSubarray([10, 9, 8, 7, 1, 2]); // Output: 4
?>
```

### Explanation:

- A strictly increasing subarray can only continue when each next element is greater than the previous element.
- A strictly decreasing subarray can only continue when each next element is smaller than the previous element.
- Equal adjacent elements break both strict conditions, so both counters must reset.
- The variable `ans` always stores the longest valid run found so far.
- The algorithm handles the entire array in one pass and does not need extra storage.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of `nums`. The array is scanned once.
- **Space Complexity:** `O(1)`, because only a constant number of counters are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**