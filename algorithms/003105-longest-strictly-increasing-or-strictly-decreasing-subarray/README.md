3105\. Longest Strictly Increasing or Strictly Decreasing Subarray

**Difficulty:** Easy

**Topics:** `Array`

You are given an array of integers nums. Return the length of the longest subarray[^1] of nums which is either strictly increasing[^2] or strictly decreasing[^3].

**Example 1:**

- **Input:** nums = [1,4,3,3,2]
- **Output:** 2
- **Explanation:**
   The strictly increasing subarrays of `nums` are `[1]`, `[2]`, `[3]`, `[3]`, `[4]`, and `[1,4]`.
   The strictly decreasing subarrays of `nums` are `[1]`, `[2]`, `[3]`, `[3]`, `[4]`, `[3,2]`, and `[4,3]`.
   Hence, we return `2`.

**Example 2:**

- **Input:** nums = [3,3,3,3]
- **Output:** 1
- **Explanation:**
   The strictly increasing subarrays of `nums` are `[3]`, `[3]`, `[3]`, and `[3]`.
   The strictly decreasing subarrays of `nums` are `[3]`, `[3]`, `[3]`, and `[3]`.
   Hence, we return `1`.


**Example 3:**

- **Input:** nums = [3,2,1]
- **Output:** 3
- **Explanation:**
   The strictly increasing subarrays of `nums` are `[3]`, `[2]`, and `[1]`.
   The strictly decreasing subarrays of `nums` are `[3]`, `[2]`, `[1]`, `[3,2]`, `[2,1]`, and `[3,2,1]`.
   Hence, we return `3`.



**Constraints:**

- `1 <= nums.length <= 50`
- `1 <= nums[i] <= 50`


[^1]: **Subarray** `A subarray is a contiguous non-empty sequence of elements within an array`.
[^2]: **Strictly Increasing Array** `An array is said to be strictly increasing if each element is strictly greater than its previous one (if exists)`.
[^3]: **Strictly Decreasing Array** `An array is said to be strictly decreasing if each element is strictly smaller than its previous one (if exists)`.


**Solution:**

We need to find the length of the longest subarray that is either strictly increasing or strictly decreasing. Here's a step-by-step approach to achieve this:

1. **Initialize Variables**: We'll need variables to keep track of the lengths of the current increasing and decreasing subarrays, as well as the maximum length found so far.

2. **Iterate Through the Array**: We'll loop through the array and compare each element with the previous one to determine if the current subarray is increasing, decreasing, or neither.

3. **Update Lengths**: Depending on the comparison, we'll update the lengths of the current increasing or decreasing subarrays.

4. **Update Maximum Length**: After each comparison, we'll update the maximum length if the current subarray length is greater than the previously recorded maximum.

5. **Return the Result**: Finally, we'll return the maximum length found.

Let's implement this solution in PHP: **[3105. Longest Strictly Increasing or Strictly Decreasing Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003105-longest-strictly-increasing-or-strictly-decreasing-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestMonotonicSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1, 4, 3, 3, 2];
echo longestMonotonicSubarray($nums1); // Output: 2

$nums2 = [3, 3, 3, 3];
echo longestMonotonicSubarray($nums2); // Output: 1

$nums3 = [3, 2, 1];
echo longestMonotonicSubarray($nums3); // Output: 3
?>
```

### Explanation:

- **Initialization**: We start by checking if the array is empty. If it is, we return 0. Otherwise, we initialize `maxLen`, `incLen`, and `decLen` to 1.
- **Loop Through Array**: We loop through the array starting from the second element. For each element, we compare it with the previous element.
   - If the current element is greater than the previous, it means the subarray is increasing, so we increment `incLen` and reset `decLen`.
   - If the current element is less than the previous, it means the subarray is decreasing, so we increment `decLen` and reset `incLen`.
   - If the current element is equal to the previous, we reset both `incLen` and `decLen`.
- **Update Maximum Length**: After each comparison, we check if the current `incLen` or `decLen` is greater than `maxLen` and update `maxLen` accordingly.
- **Return Result**: Finally, we return `maxLen`, which holds the length of the longest strictly increasing or decreasing subarray.

This approach ensures that we efficiently find the longest subarray that is either strictly increasing or strictly decreasing in linear time complexity, O(n), where n is the length of the array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**