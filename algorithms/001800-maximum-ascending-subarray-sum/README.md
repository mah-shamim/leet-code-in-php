1800\. Maximum Ascending Subarray Sum

**Difficulty:** Easy

**Topics:** `Array`

Given an array of positive integers `nums`, return _the maximum possible sum of an **ascending** subarray in `nums`_.

A subarray is defined as a contiguous sequence of numbers in an array.

A subarray <code>[numsl, nums<sub>l+1</sub>, ..., nums<sub>r-1</sub>, nums<sub>r</sub>]</code> is **ascending** if for all `i` where `l <= i < r`, <code>nums<sub>i</sub>  < nums<sub>i+1</sub></code>. Note that a subarray of size `1` is **ascending**.

**Example 1:**

- **Input:** nums = [10,20,30,5,10,50]
- **Output:** 65
- **Explanation:** [5,10,50] is the ascending subarray with the maximum sum of 65.

**Example 2:**

- **Input:** nums = [10,20,30,40,50]
- **Output:** 150
- **Explanation:** [10,20,30,40,50] is the ascending subarray with the maximum sum of 150.


**Example 3:**

- **Input:** nums = [12,17,15,13,10,11,12]
- **Output:** 33
- **Explanation:** [10,11,12] is the ascending subarray with the maximum sum of 33.



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. It is fast enough to check all possible subarrays
2. The end of each ascending subarray will be the start of the next



**Solution:**

We need to find the maximum possible sum of an ascending subarray in a given array of positive integers. An ascending subarray is defined as a contiguous sequence where each element is strictly larger than the previous one.

### Approach
1. **Initialization**: Start by initializing two variables, `max_sum` and `current_sum`, to the value of the first element in the array. These will track the maximum sum found so far and the sum of the current ascending subarray, respectively.
2. **Iterate through the array**: For each subsequent element in the array, check if it is greater than the previous element.
   - If it is greater, add the current element to `current_sum`.
   - If it is not greater, reset `current_sum` to the current element as it starts a new ascending subarray.
3. **Update maximum sum**: After each update to `current_sum`, compare it with `max_sum` and update `max_sum` if `current_sum` is larger.
4. **Edge Cases**: The algorithm handles edge cases such as single-element arrays and arrays where all elements are in descending order by design, as it always checks and updates the maximum sum during each iteration.

Let's implement this solution in PHP: **[1800. Maximum Ascending Subarray Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001800-maximum-ascending-subarray-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxAscendingSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [10,20,30,5,10,50];
$nums2 = [10,20,30,40,50];
$nums3 = [12,17,15,13,10,11,12];

echo maxAscendingSum($nums1) . "\n"; // Output: 65
echo maxAscendingSum($nums2) . "\n"; // Output: 150
echo maxAscendingSum($nums3) . "\n"; // Output: 33
?>
```

### Explanation:

- **Initialization**: The variables `max_sum` and `current_sum` are initialized to the first element of the array. This handles the case where the array has only one element.
- **Loop through elements**: Starting from the second element, each element is checked against the previous one to determine if it continues an ascending subarray or starts a new one.
- **Update sums**: The `current_sum` is updated either by adding the current element (if ascending) or resetting to the current element. After each update, `max_sum` is checked and updated if necessary to ensure it always holds the maximum sum encountered.

This approach efficiently tracks the maximum sum of ascending subarrays in a single pass through the array, resulting in a time complexity of O(n), where n is the length of the array. This ensures optimal performance even for the upper constraint of the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**