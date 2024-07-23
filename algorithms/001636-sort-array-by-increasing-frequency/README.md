1636\. Sort Array by Increasing Frequency

Easy

Given an array of integers `nums`, sort the array in **increasing** order based on the frequency of the values. If multiple values have the same frequency, sort them in **decreasing** order.

_Return the sorted array_.

**Example 1:**

- **Input:** nums = [1,1,2,2,2,3]
- **Output:** [3,1,1,2,2,2]
- **Explanation:** '3' has a frequency of 1, '1' has a frequency of 2, and '2' has a frequency of 3.

**Example 2:**

- **Input:** nums = [2,3,1,3,2]
- **Output:** [1,3,3,2,2]
- **Explanation:** '2' and '3' both have a frequency of 2, so they are sorted in decreasing order.

**Example 3:**

- **Input:** nums = [-1,1,-6,4,5,-6,1,4,1]
- **Output:** [5,-1,4,4,-6,-6,1,1,1]

**Constraints:**

- <code>1 <= nums.length <= 100</code>
- <code>-100 <= nums[i] <= 100</code>

**Hint:**
1. Count the frequency of each value.
2. Use a custom comparator to compare values by their frequency. If two values have the same frequency, compare their values.


**Solution:**


To solve this problem, we can follow these steps:

1. Count the frequency of each value in the input array.
2. Use a custom comparator to sort the values based on their frequency first, and if the frequencies are the same, sort by value in decreasing order.

Let's implement this solution in PHP: **[1636. Sort Array by Increasing Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001636-sort-array-by-increasing-frequency/solution.php)**

```php
<?php
// Test cases
$nums1 = [1,1,2,2,2,3];
$nums2 = [2,3,1,3,2];
$nums3 = [-1,1,-6,4,5,-6,1,4,1];

print_r(frequencySort($nums1)); // Output: [3, 1, 1, 2, 2, 2]
print_r(frequencySort($nums2)); // Output: [1, 3, 3, 2, 2]
print_r(frequencySort($nums3)); // Output: [5, -1, 4, 4, -6, -6, 1, 1, 1]
?>
```

### Explanation:

1. array_count_values($nums):
   - This function counts the frequency of each value in the array. It returns an associative array where the keys are the values from the input array and the values are their respective counts.
2. usort($nums, function($a, $b) use ($frequency)):
   - This function sorts the array using a custom comparator.
   - if ($frequency[$a] == $frequency[$b]): If the frequency of a and b is the same, compare their values directly. Return ($b - $a) to sort in decreasing order.
   - return $frequency[$a] - $frequency[$b]: If the frequency is not the same, return the difference to sort by frequency in increasing order.

This approach ensures that the array is sorted according to the specified rules.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
