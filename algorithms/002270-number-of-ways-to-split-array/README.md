2270\. Number of Ways to Split Array

**Difficulty:** Medium

**Topics:** `Array`, `Prefix Sum`

You are given a **0-indexed** integer array `nums` of length `n`.

`nums` contains a **valid split** at index `i` if the following are true:

- The sum of the first `i + 1` elements is **greater than or equal to** the sum of the last `n - i - 1` elements.
- There is **at least one** element to the right of `i`. That is, `0 <= i < n - 1`.

Return _the number of **valid splits** in `nums`_.

**Example 1:**

- **Input:** nums = [10,4,-8,7]
- **Output:** 2
- **Explanation:** There are three ways of splitting nums into two non-empty parts:
  - Split nums at index `0`. Then, the first part is `[10]`, and its sum is `10`. The second part is `[4,-8,7]`, and its sum is `3`. Since `10 >= 3`, `i = 0` is a valid split.
  - Split nums at index `1`. Then, the first part is `[10,4]`, and its sum is `14`. The second part is `[-8,7]`, and its sum is `-1`. Since `14 >= -1`, `i = 1` is a valid split.
  - Split nums at index `2`. Then, the first part is `[10,4,-8]`, and its sum is `6`. The second part is `[7]`, and its sum is `7`. Since `6 < 7`, `i = 2` is not a valid split.
    Thus, the number of valid splits in nums is `2`.

**Example 2:**

- **Input:** nums = [2,3,1,0]
- **Output:** 2
- **Explanation:** There are two valid splits in nums:
  - Split nums at index `1`. Then, the first part is `[2,3]`, and its sum is `5`. The second part is `[1,0]`, and its sum is `1`. Since `5 >= 1`, `i = 1` is a valid split.
  - Split nums at index `2`. Then, the first part is `[2,3,1]`, and its sum is `6`. The second part is `[0]`, and its sum is `0`. Since `6 >= 0`, `i = 2` is a valid split.



**Constraints:**

- <code>2 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>5</sup> <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. For any index `i`, how can we find the `sum` of the first `(i+1)` elements from the `sum` of the first `i` elements?
2. If the total `sum` of the array is known, how can we check if the `sum` of the first `(i+1)` elements `greater than or equal to` the remaining elements?



**Solution:**

We can approach it using the following steps:

### Approach:

1. **Prefix Sum**: First, we compute the cumulative sum of the array from the left, which helps in checking the sum of the first `i+1` elements.
2. **Total Sum**: Compute the total sum of the array, which is useful in checking if the sum of the remaining elements is less than or equal to the sum of the first `i+1` elements.
3. **Iterate over the array**: For each valid index `i` (where `0 <= i < n-1`), we check if the sum of the first `i+1` elements is greater than or equal to the sum of the last `n-i-1` elements.
4. **Efficiency**: Instead of recalculating the sums repeatedly, use the prefix sum and the total sum for efficient comparisons.

Let's implement this solution in PHP: **[2270. Number of Ways to Split Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002270-number-of-ways-to-split-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function waysToSplitArray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [10, 4, -8, 7];
echo waysToSplitArray($nums1); // Output: 2

$nums2 = [2, 3, 1, 0];
echo waysToSplitArray($nums2); // Output: 2
?>
```

### Explanation:

1. **$totalSum**: This variable stores the sum of all elements in the `nums` array.
2. **$prefixSum**: This variable keeps track of the cumulative sum of elements from the left (up to index `i`).
3. **$remainingSum**: This is the sum of the remaining elements from index `i+1` to the end of the array. It is calculated by subtracting `$prefixSum` from `$totalSum`.
4. **Valid Split Check**: For each index `i`, we check if the prefix sum is greater than or equal to the remaining sum.

### Time Complexity:
- **O(n)**: We loop through the array once to compute the sum and once again to check for valid splits. Therefore, the time complexity is linear with respect to the length of the array.

### Space Complexity:
- **O(1)**: We are using only a few extra variables (`$totalSum`, `$prefixSum`, `$remainingSum`), so the space complexity is constant.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
