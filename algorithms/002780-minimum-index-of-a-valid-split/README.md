2780\. Minimum Index of a Valid Split

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sorting`

An element `x` of an integer array `arr` of length `m` is **dominant** if **more than half** the elements of `arr` have a value of `x`.

You are given a **0-indexed** integer array `nums` of length `n` with one **dominant** element.

You can split `nums` at an index `i` into two arrays `nums[0, ..., i]` and `nums[i + 1, ..., n - 1]`, but the split is only **valid** if:

- `0 <= i < n - 1`
- `nums[0, ..., i]`, and `nums[i + 1, ..., n - 1]` have the same dominant element.

Here, `nums[i, ..., j]` denotes the subarray of `nums` starting at index `i` and ending at index `j`, both ends being inclusive. Particularly, if `j < i` then `nums[i, ..., j]` denotes an empty subarray.

Return the **minimum** index of a **valid split**. If no valid split exists, return `-1`.

**Example 1:**

- **Input:** nums = [1,2,2,2]
- **Output:** 2
- **Explanation:** We can split the array at index 2 to obtain arrays [1,2,2] and [2].
  In array [1,2,2], element 2 is dominant since it occurs twice in the array and 2 * 2 > 3.
  In array [2], element 2 is dominant since it occurs once in the array and 1 * 2 > 1.
  Both [1,2,2] and [2] have the same dominant element as nums, so this is a valid split.
  It can be shown that index 2 is the minimum index of a valid split.

**Example 2:**

- **Input:** nums = [2,1,3,1,1,1,7,1,2,1]
- **Output:** 4
- **Explanation:** We can split the array at index 4 to obtain arrays [2,1,3,1,1] and [1,7,1,2,1].
  In array [2,1,3,1,1], element 1 is dominant since it occurs thrice in the array and 3 * 2 > 5.
  In array [1,7,1,2,1], element 1 is dominant since it occurs thrice in the array and 3 * 2 > 5.
  Both [2,1,3,1,1] and [1,7,1,2,1] have the same dominant element as nums, so this is a valid split.
  It can be shown that index 4 is the minimum index of a valid split.


**Example 3:**

- **Input:** nums = [3,3,3,3,7,2,2]
- **Output:** -1
- **Explanation:** It can be shown that there is no valid split.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- `nums` has exactly one dominant element.


**Hint:**
1. Find the dominant element of nums by using a hashmap to maintain element frequency, we denote the dominant element as x and its frequency as f.
2. For each index in [0, n - 2], calculate f1, x’s frequency in the subarray [0, i] when looping the index. And f2, x’s frequency in the subarray [i + 1, n - 1] which is equal to f - f1. Then we can check whether x is dominant in both subarrays.



**Solution:**

We need to find the minimum index at which we can split the array such that both resulting subarrays have the same dominant element as the original array. A dominant element is one that appears more than half the time in the array.

### Approach
1. **Identify the Dominant Element**: Use the Boyer-Moore Voting Algorithm to efficiently determine the dominant element in the array. This element appears more than half the time.
2. **Compute Frequencies**: Calculate the total frequency of the dominant element in the entire array. Then, build a prefix array to store the cumulative count of the dominant element up to each index.
3. **Check Valid Splits**: For each possible split index, determine if both resulting subarrays have the dominant element as their dominant element. This is done by checking if the count of the dominant element in each subarray exceeds half the length of that subarray.

Let's implement this solution in PHP: **[2780. Minimum Index of a Valid Split](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002780-minimum-index-of-a-valid-split/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumIndex($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @return mixed|null
 */
function findDominant($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$test1 = [1, 2, 2, 2];
$test2 = [2, 1, 3, 1, 1, 1, 7, 1, 2, 1];
$test3 = [3, 3, 3, 3, 7, 2, 2];

echo minimumIndex($test1) . "\n"; // Output: 2
echo minimumIndex($test2) . "\n"; // Output: 4
echo minimumIndex($test3) . "\n"; // Output: -1
?>
```

### Explanation:

1. **Finding the Dominant Element**: The Boyer-Moore Voting Algorithm efficiently identifies the dominant element by maintaining a count and candidate, ensuring linear time complexity.
2. **Prefix Array Construction**: This array helps quickly determine the count of the dominant element up to any index, allowing constant-time lookups during the split checks.
3. **Checking Splits**: For each potential split index, we check if the dominant element's count in both subarrays meets the required condition (more than half the subarray's length). The first valid split found is returned as the result, ensuring the minimum index is found efficiently.

This approach ensures that we efficiently determine the valid split with a time complexity of O(n) and space complexity of O(n), making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**