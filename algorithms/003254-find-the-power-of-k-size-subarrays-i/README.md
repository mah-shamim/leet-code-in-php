3254\. Find the Power of K-Size Subarrays I

**Difficulty:** Medium

**Topics:** `Array`, `Sliding Window`

You are given an array of integers `nums` of length `n` and a _positive_ integer `k`.

The **power** of an array is defined as:

- Its **maximum** element if all of its elements are **consecutive** and sorted in **ascending** order.
- `-1` otherwise.

You need to find the **power** of all subarrays[^1] of nums of size k.

Return an integer array `results` of size `n - k + 1`, where `results[i]` is the _power_ of `nums[i..(i + k - 1)]`.

**Example 1:**

- **Input:** nums = [1,2,3,4,3,2,5], k = 3
- **Output:** [3,4,-1,-1,-1]
- **Explanation:** There are 5 subarrays of `nums` of size 3:
  - `[1, 2, 3]` with the maximum element 3.
  - `[2, 3, 4]` with the maximum element 4.
  - `[3, 4, 3]` whose elements are **not** consecutive.
  - `[4, 3, 2]` whose elements are **not** sorted.
  - `[3, 2, 5]` whose elements are **not** consecutive.


**Example 2:**

- **Input:** nums = [2,2,2,2,2], k = 4
- **Output:** [-1,-1]


**Example 3:**

- **Input:** nums = [3,2,3,2,3,2], k = 2
- **Output:** [-1,3,-1,3,-1]



**Constraints:**

- `1 <= n == nums.length <= 500`
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- `1 <= k <= n`


**Hint:**
1. Can we use a brute force solution with nested loops and HashSet?

[^1]: **Subarray**: 
A subarray is a contiguous non-empty sequence of elements within an array.



**Solution:**

We can break down the task as follows:

### Problem Breakdown:
1. We are given an array `nums` of length `n`, and a positive integer `k`. We need to consider all subarrays of size `k` and compute their **power**.
2. The **power** of a subarray is:
    - The **maximum** element of the subarray if all the elements are **consecutive** and sorted in **ascending** order.
    - `-1` otherwise.
3. We need to return an array of size `n - k + 1`, where each element corresponds to the power of the respective subarray.

### Plan:
1. **Sliding Window Approach**: We will slide over the array and check each subarray of length `k`.
2. **Check if the Subarray is Sorted**: We need to check if the subarray has elements that are consecutive and sorted in ascending order.
3. **Return Maximum or -1**: If the subarray is valid, we return the maximum element. Otherwise, return `-1`.

### Steps:
1. **Check if the subarray is sorted**:
    - A sorted subarray with consecutive elements should have the property: `nums[i+1] - nums[i] == 1` for every `i` in the subarray.
2. **Sliding Window**:
    - For each subarray of length `k`, check if it is sorted and return the maximum element if valid, otherwise return `-1`.

Let's implement this solution in PHP: **[3254. Find the Power of K-Size Subarrays I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003254-find-the-power-of-k-size-subarrays-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function resultsArray($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(resultsArray([1, 2, 3, 4, 3, 2, 5], 3));  // Output: [3, 4, -1, -1, -1]
print_r(resultsArray([2, 2, 2, 2, 2], 4));  // Output: [-1, -1]
print_r(resultsArray([3, 2, 3, 2, 3, 2], 2));  // Output: [-1, 3, -1, 3, -1]
?>
```

### Explanation:

- **Sliding Window**: We use a `for` loop from `i = 0` to `i = n - k` to consider all subarrays of size `k`. For each subarray, we use `array_slice()` to extract the subarray.
- **Sorting Check**: For each subarray, we check if it is sorted with consecutive elements by iterating through the subarray and checking if each pair of consecutive elements has a difference of `1`.
- **Result**: If the subarray is valid, we append the maximum value of the subarray to the result. Otherwise, we append `-1`.

### Time Complexity:
- We are iterating over `n - k + 1` subarrays.
- For each subarray, we check if the elements are consecutive, which takes `O(k)` time.
- Thus, the overall time complexity is `O((n - k + 1) * k)` which simplifies to `O(n * k)`.

### Edge Case Considerations:
- If `k = 1`, every subarray is trivially sorted (it only contains one element), and the power of each subarray will be the element itself.
- If the subarray is not consecutive, it will immediately return `-1`.

### Example Outputs:
1. For `nums = [1, 2, 3, 4, 3, 2, 5], k = 3`, the output is `[3, 4, -1, -1, -1]`.
2. For `nums = [2, 2, 2, 2, 2], k = 4`, the output is `[-1, -1]`.
3. For `nums = [3, 2, 3, 2, 3, 2], k = 2`, the output is `[-1, 3, -1, 3, -1]`.

This solution should efficiently work for the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
