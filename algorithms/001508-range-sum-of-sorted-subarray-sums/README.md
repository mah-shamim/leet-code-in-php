1508\. Range Sum of Sorted Subarray Sums

Medium

You are given the array `nums` consisting of `n` positive integers. You computed the sum of all non-empty continuous subarrays from the array and then sorted them in non-decreasing order, creating a new array of `n * (n + 1) / 2` numbers.

Return _the sum of the numbers from index `left` to index `right` (**indexed from 1**), inclusive, in the new array_. Since the answer can be a huge number return it modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** nums = [1,2,3,4], n = 4, left = 1, right = 5
- **Output:** 13
- **Explanation:** All subarray sums are 1, 3, 6, 10, 2, 5, 9, 3, 7, 4. After sorting them in non-decreasing order we have the new array [1, 2, 3, 3, 4, 5, 6, 7, 9, 10]. The sum of the numbers from index le = 1 to ri = 5 is 1 + 2 + 3 + 3 + 4 = 13.

**Example 2:**

- **Input:** nums = [1,2,3,4], n = 4, left = 3, right = 4
- **Output:** 6
- **Explanation:** The given array is the same as example 1. We have the new array [1, 2, 3, 3, 4, 5, 6, 7, 9, 10]. The sum of the numbers from index le = 3 to ri = 4 is 3 + 3 = 6.

**Example 3:**

- **Input:** nums = [1,2,3,4], n = 4, left = 1, right = 10
- **Output:** 50

**Constraints:**

- <code>n == nums.length</code>
- <code>1 <= nums.length <= 1000</code>
- <code>1 <= nums[i] <= 100</code>
- <code>1 <= left <= right <= n * (n + 1) / 2</code>

**Hint:**
1. Compute all sums and save it in array.
2. Then just go from LEFT to RIGHT index and calculate answer modulo 1e9 + 7.


**Solution:**


To solve this problem, we can follow these steps:

1. Generate all possible sums of non-empty continuous subarrays.
2. Sort the resulting array of sums.
3. Calculate the sum of the elements from the `left` index to the `right` index (1-based).
4. Return the result modulo \(10^9 + 7\).


Let's implement this solution in PHP: **[1508. Range Sum of Sorted Subarray Sums](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001508-range-sum-of-sorted-subarray-sums/solution.php)**

```php
<?php
// Example usage
$nums = array(1, 2, 3, 4);
$n = 4;
$left = 1;
$right = 5;

echo rangeSum($nums, $n, $left, $right); // Output: 13

$left = 3;
$right = 4;
echo rangeSum($nums, $n, $left, $right); // Output: 6

$left = 1;
$right = 10;
echo rangeSum($nums, $n, $left, $right); // Output: 50

?>
```

### Explanation:

1. **Generating Subarray Sums:**
   - Iterate through each starting index `i` of the subarray.
   - For each starting index `i`, compute the sum of subarrays ending at index `j` (where `j >= i`).
   - Append each computed subarray sum to the `$sums` array.

2. **Sorting the Sums:**
   - Use PHP's `sort()` function to sort the `$sums` array in non-decreasing order.

3. **Summing the Required Range:**
   - Iterate from the `left-1` index to the `right-1` index (since the problem uses 1-based indexing).
   - Accumulate the sum of the elements in this range, taking care to use modulo \(10^9 + 7\) to avoid overflow.

This solution efficiently generates all subarray sums, sorts them, and computes the required range sum as specified.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
