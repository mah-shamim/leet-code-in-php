2529\. Maximum Count of Positive Integer and Negative Integer

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Counting`

Given an array `nums` sorted in **non-decreasing** order, return _the maximum between the number of positive integers and the number of negative integers_.

- In other words, if the number of positive integers in `nums` is `pos` and the number of negative integers is `neg`, then return the maximum of `pos` and `neg`.

**Note** that `0` is neither positive nor negative.

**Example 1:**

- **Input:** nums = [-2,-1,-1,1,2,3]
- **Output:** 3
- **Explanation:** There are 3 positive integers and 3 negative integers. The maximum count among them is 3.

**Example 2:**

- **Input:** nums = [-3,-2,-1,0,0,1,2]
- **Output:** 3
- **Explanation:** There are 2 positive integers and 3 negative integers. The maximum count among them is 3.


**Example 3:**

- **Input:** nums = [5,20,66,1314]
- **Output:** 4
- **Explanation:** There are 4 positive integers and 0 negative integers. The maximum count among them is 4.



**Constraints:**

- `1 <= nums.length <= 2000`
- `-2000 <= nums[i] <= 2000`
- `nums` is sorted in a **non-decreasing order**.


**Hint:**
1. Count how many positive integers and negative integers are in the array.
2. Since the array is sorted, can we use the binary search?



**Solution:**

We need to determine the maximum count between positive and negative integers in a given sorted array. The array is sorted in non-decreasing order, which allows us to efficiently find the counts using binary search.

### Approach
1. **Binary Search for First Non-Negative Element**: We use binary search to find the first index where the element is greater than or equal to zero. This index helps us determine the count of negative numbers, as all elements before this index are negative.
2. **Binary Search for First Positive Element**: Similarly, we use binary search to find the first index where the element is strictly positive. This index helps us determine the count of positive numbers, as all elements from this index to the end of the array are positive.
3. **Calculate Counts**: Using the indices found from the binary searches, we compute the counts of negative and positive integers. The count of negative integers is the index of the first non-negative element, and the count of positive integers is the total length of the array minus the index of the first positive element.
4. **Return Maximum Count**: Finally, we return the maximum of the counts of negative and positive integers.

Let's implement this solution in PHP: **[2529. Maximum Count of Positive Integer and Negative Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002529-maximum-count-of-positive-integer-and-negative-integer/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumCount($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @return int
 */
function findFirstNonNegative($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @return int
 */
function findFirstPositive($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$test1 = [-2,-1,-1,1,2,3]; 
$test2 = [-3,-2,-1,0,0,1,2]; 
$test3 = [5,20,66,1314]; 

echo maximumCount($test1) . "\n"; // Output: 3
echo maximumCount($test2) . "\n"; // Output: 3
echo maximumCount($test3) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Binary Search for First Non-Negative Element**: This function (`findFirstNonNegative`) uses binary search to locate the first index where the element is non-negative (>= 0). All elements before this index are negative, so the index directly gives the count of negative integers.
2. **Binary Search for First Positive Element**: This function (`findFirstPositive`) uses binary search to locate the first index where the element is positive (> 0). The count of positive integers is the total number of elements from this index to the end of the array.
3. **Efficiency**: Both binary searches operate in O(log n) time, making the solution efficient even for the upper constraint of 2000 elements. The overall time complexity is O(log n) due to the two binary searches, and the space complexity is O(1) as we use only a few extra variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**