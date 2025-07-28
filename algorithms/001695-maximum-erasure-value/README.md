1695\. Maximum Erasure Value

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sliding Window`, `Weekly Contest 220`

You are given an array of positive integers `nums` and want to erase a subarray containing **unique elements**. The **score** you get by erasing the subarray is equal to the **sum** of its elements.

Return the **maximum score** you can get by erasing **exactly one** subarray.

An array `b` is called to be a subarray of `a` if it forms a contiguous subsequence of `a`, that is, if it is equal to `a[l],a[l+1],...,a[r]` for some `(l,r)`.

**Example 1:**

- **Input:** nums = [4,2,4,5,6]
- **Output:** 17
- **Explanation:** The optimal subarray here is [2,4,5,6].

**Example 2:**

- **Input:** nums = [5,2,1,2,5,2,1,2,5]
- **Output:** 8
- **Explanation:** The optimal subarray here is [5,2,1] or [1,2,5].

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>4</sup></code>


**Hint:**
1. The main point here is for the subarray to contain unique elements for each index. Only the first subarrays starting from that index have unique elements.
2. This can be solved using the two pointers technique


**Similar Questions:**
1. [3. Longest Substring Without Repeating Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000003-longest-substring-without-repeating-characters)






**Solution:**

We need to find the maximum sum of a contiguous subarray where all elements are unique. The solution involves efficiently scanning the array while maintaining a sliding window that ensures all elements within the window are distinct.

### Approach
1. **Sliding Window Technique**: We use two pointers, `left` and `right`, to represent the current window of elements. The `right` pointer expands the window by including new elements, while the `left` pointer contracts the window when a duplicate element is encountered.
2. **Frequency Tracking**: A frequency array keeps track of the count of each element within the current window. This helps in quickly identifying duplicates.
3. **Sum Maintenance**: As we expand the window by moving the `right` pointer, we add the current element to a running sum. If adding an element causes a duplicate (its frequency exceeds 1), we move the `left` pointer to the right, subtracting elements from the running sum until the duplicate is removed.
4. **Max Sum Update**: After ensuring all elements in the current window are unique, we compare the running sum with the maximum sum encountered so far and update it if necessary.

This approach efficiently processes the array in O(n) time with O(1) space for the frequency array (since the maximum value of elements is constrained to <code>10<sup>4</sup></code>).

Let's implement this solution in PHP: **[1695. Maximum Erasure Value](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001695-maximum-erasure-value/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumUniqueSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = array(4, 2, 4, 5, 6);
echo maximumUniqueSubarray($nums1) . "\n"; // Output: 17

$nums2 = array(5, 2, 1, 2, 5, 2, 1, 2, 5);
echo maximumUniqueSubarray($nums2) . "\n"; // Output: 8
?>
```

### Explanation:

1. **Initialization**: We start by initializing variables to keep track of the maximum sum (`$max_sum`), the current sum of the window (`$current_sum`), and a frequency array (`$freq`) to count occurrences of each number in the current window. The `$left` pointer starts at 0.
2. **Expanding the Window**: For each element (using the `$right` pointer), we add the element to `$current_sum` and increment its count in `$freq`.
3. **Handling Duplicates**: If the count of the current element exceeds 1, we move the `$left` pointer to the right, subtracting elements from `$current_sum` and decrementing their counts in `$freq` until the current element's count drops to 1.
4. **Updating Maximum Sum**: After ensuring all elements in the window are unique, we compare `$current_sum` with `$max_sum` and update `$max_sum` if necessary.
5. **Result**: After processing all elements, `$max_sum` holds the maximum sum of any contiguous subarray with all unique elements, which is returned as the result.

This approach efficiently processes the array in linear time, making it optimal for large input sizes as specified in the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**