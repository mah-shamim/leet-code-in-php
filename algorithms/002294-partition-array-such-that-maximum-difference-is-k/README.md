2294\. Partition Array Such That Maximum Difference Is K

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`

You are given an integer array `nums` and an integer `k`. You may partition `nums` into one or more **subsequences** such that each element in `nums` appears in **exactly** one of the subsequences.

Return _the **minimum** number of subsequences needed such that the difference between the maximum and minimum values in each subsequence is **at most** `k`_.

A **subsequence** is a sequence that can be derived from another sequence by deleting some or no elements without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [3,6,1,2,5], k = 2
- **Output:** 2
- **Explanation:**
  We can partition nums into the two subsequences [3,1,2] and [6,5].
  The difference between the maximum and minimum value in the first subsequence is 3 - 1 = 2.
  The difference between the maximum and minimum value in the second subsequence is 6 - 5 = 1.
  Since two subsequences were created, we return 2. It can be shown that 2 is the minimum number of subsequences needed.

**Example 2:**

- **Input:** nums = [1,2,3], k = 1
- **Output:** 2
- **Explanation:**
  We can partition nums into the two subsequences [1,2] and [3].
  The difference between the maximum and minimum value in the first subsequence is 2 - 1 = 1.
  The difference between the maximum and minimum value in the second subsequence is 3 - 3 = 0.
  Since two subsequences were created, we return 2. Note that another optimal solution is to partition nums into the two subsequences [1] and [2,3].

**Example 3:**

- **Input:** nums = [2,2,4,5], k = 0
- **Output:** 3
- **Explanation:**
  We can partition nums into the three subsequences [2,2], [4], and [5].
  The difference between the maximum and minimum value in the first subsequences is 2 - 2 = 0.
  The difference between the maximum and minimum value in the second subsequences is 4 - 4 = 0.
  The difference between the maximum and minimum value in the third subsequences is 5 - 5 = 0.
  Since three subsequences were created, we return 3. It can be shown that 3 is the minimum number of subsequences needed.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>5</sup></code>
- <code>0 <= k <= 10<sup>5</sup></code>


**Hint:**
1. Which values in each subsequence matter? The only values that matter are the maximum and minimum values.
2. Let the maximum and minimum values of a subsequence be Max and Min. It is optimal to place all values in between Max and Min in the original array in the same subsequence as Max and Min.
3. Sort the array.

**Similar Questions:**
1. [1438. Longest Continuous Subarray With Absolute Diff Less Than or Equal to Limit](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001438-longest-continuous-subarray-with-absolute-diff-less-than-or-equal-to-limit/solution.php)
2. [2779. Maximum Beauty of an Array After Applying Operation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002779-maximum-beauty-of-an-array-after-applying-operation/solution.php)




**Solution:**

We need to partition an array into the minimum number of subsequences such that in each subsequence, the difference between the maximum and minimum elements is at most a given integer `k`.

### Approach
1. **Sorting the Array**: The first step is to sort the array in ascending order. Sorting helps in efficiently grouping elements into subsequences where the difference between the maximum and minimum elements is minimized.
2. **Greedy Partitioning**: After sorting, we traverse the array from left to right. For each element, we start a new subsequence and include as many subsequent elements as possible such that the difference between the current element and the starting element of the subsequence does not exceed `k`. This greedy approach ensures that each subsequence is as long as possible, minimizing the total number of subsequences.
3. **Counting Subsequences**: Each time we start a new subsequence, we increment a counter. The counter at the end of the traversal gives the minimum number of subsequences required.

Let's implement this solution in PHP: **[2294. Partition Array Such That Maximum Difference Is K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002294-partition-array-such-that-maximum-difference-is-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function partitionArray($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1:
echo partitionArray([3,6,1,2,5], 2) . "\n"; // Output: 2

// Example 2:
echo partitionArray([1,2,3], 1) . "\n"; // Output: 2

// Example 3:
echo partitionArray([2,2,4,5], 0) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Sorting**: The array is sorted to facilitate the grouping of elements into valid subsequences. Sorting ensures that elements in each subsequence are contiguous in the sorted array, which simplifies the process of checking the difference condition.
2. **Traversal and Grouping**: We traverse the sorted array using a while loop. For each element, we initiate a new subsequence (incrementing the counter). Within this subsequence, we include all subsequent elements that satisfy the condition `current_element - start_element <= k`. This is done by moving the index `i` forward until the condition is violated.
3. **Efficiency**: The algorithm efficiently processes each element exactly once during the traversal. The sorting step has a time complexity of O(n log n), and the traversal is O(n), resulting in an overall time complexity of O(n log n). The space complexity is O(1) as no additional space is used apart from a few variables.

This approach ensures that we minimize the number of subsequences by greedily including as many elements as possible in each subsequence while adhering to the given constraint. The solution efficiently handles the constraints and provides the optimal partitioning.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**