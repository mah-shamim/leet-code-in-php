594\. Longest Harmonious Subsequence

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sliding Window`, `Sorting`, `Counting`

We define a harmonious array as an array where the difference between its maximum value and its minimum value is **exactly** `1`.

Given an integer array `nums`, return the length of its longest harmonious subsequence[^1] among all its possible subsequences.

**Example 1:**

- **Input:** nums = [1,3,2,2,5,2,3,7]
- **Output:** 5
- **Explanation:** The longest harmonious subsequence is `[3,2,2,2,3]`.

**Example 2:**

- **Input:** nums = [1,2,3,4]
- **Output:** 2
- **Explanation:** he longest harmonious subsequences are `[1,2]`, `[2,3]`, and `[3,4]`, all of which have a length of 2.

**Example 3:**

- **Input:** n = 4, edges = [[3,2,3],[1,1,2],[2,3,4]]
- **Output:** 0
- **Explanation:** No harmonic subsequence exists.

**Constraints:**

- <code>1 <= nums.length <= 2 * 10<sup>4</sup></code>
- <code>-10<sup>9</sup> <= nums[i] <= 10<sup>9</sup></code>

[^1]: **Subsequence:** A subsequence is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.




**Solution:**

We need to find the length of the longest harmonious subsequence in an array. A harmonious subsequence is defined as a subsequence where the difference between the maximum and minimum elements is exactly 1.

### Approach
1. **Frequency Count**: First, we count the frequency of each number in the array using a hash table (or a frequency map). This helps us quickly access how many times each number appears in the array.
2. **Check Consecutive Numbers**: For each unique number in the frequency map, we check if the next consecutive number (i.e., `num + 1`) exists in the map. If it does, the length of the harmonious subsequence formed by these two numbers is the sum of their frequencies.
3. **Track Maximum Length**: We keep track of the maximum length encountered during the iteration over the frequency map. This maximum length is our answer.

The key insight here is that any harmonious subsequence can only consist of two distinct numbers that are consecutive integers. By leveraging the frequency map, we efficiently compute the longest such subsequence without explicitly generating all possible subsequences.

Let's implement this solution in PHP: **[594. Longest Harmonious Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000594-longest-harmonious-subsequence/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findLHS($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(findLHS([1, 3, 2, 2, 5, 2, 3, 7])); // Output: 5
print_r(findLHS([1, 2, 3, 4]));            // Output: 2
print_r(findLHS([1, 1, 1, 1]));            // Output: 0
?>
```

### Explanation:

1. **Frequency Map Creation**: The `array_count_values` function is used to create a frequency map where keys are the unique numbers in the input array and values are their respective counts.
2. **Iterate Over Unique Numbers**: For each unique number in the frequency map, we check if the next consecutive number (i.e., `num + 1`) exists in the map.
3. **Calculate Length**: If the next consecutive number exists, the length of the harmonious subsequence formed by these two numbers is the sum of their frequencies.
4. **Update Maximum Length**: We update the maximum length whenever we find a longer harmonious subsequence.
5. **Return Result**: After processing all numbers, the maximum length found is returned as the result.

This approach efficiently checks all possible pairs of consecutive numbers in linear time relative to the number of unique elements, making it optimal for large input sizes as specified in the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**