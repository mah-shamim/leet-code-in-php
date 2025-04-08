3396\. Minimum Number of Operations to Make Elements in Array Distinct

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`

You are given an integer array `nums`. You need to ensure that the elements in the array are **distinct**. To achieve this, you can perform the following operation any number of times:

- Remove 3 elements from the beginning of the array. If the array has fewer than 3 elements, remove all remaining elements.

**Note** that an empty array is considered to have distinct elements. Return the **minimum** number of operations needed to make the elements in the array distinct.

**Example 1:**

- **Input:** nums = [1,2,3,4,2,3,3,5,7]
- **Output:** 2
- **Explanation:**
  - In the first operation, the first 3 elements are removed, resulting in the array [4, 2, 3, 3, 5, 7].
  - In the second operation, the next 3 elements are removed, resulting in the array [3, 5, 7], which has distinct elements.
  Therefore, the answer is 2.

**Example 2:**

- **Input:** nums = [4,5,6,4,4]
- **Output:** 2
- **Explanation:**
  - In the first operation, the first 3 elements are removed, resulting in the array [4, 4].
  - In the second operation, all remaining elements are removed, resulting in an empty array.
  Therefore, the answer is 2.


**Example 3:**

- **Input:** nums = [6,7,8,9]
- **Output:** 0
- **Explanation:** The array already contains distinct elements. Therefore, the answer is 0.



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. The constraints are small. Try brute force.



**Solution:**

We need to determine the minimum number of operations required to make all elements in an array distinct. Each operation involves removing the first three elements from the array, or all remaining elements if there are fewer than three.

### Approach
1. **Iterate through possible operations**: Start with 0 operations and incrementally check each possible number of operations until a valid solution is found.
2. **Check subarrays**: For each number of operations `k`, check the subarray starting from index `3*k` (after removing the first `3*k` elements). If this subarray contains all distinct elements, then `k` is the answer.
3. **Handle empty array**: If the starting index of the subarray exceeds the array length, the array is considered empty, which is valid.

Let's implement this solution in PHP: **[3396. Minimum Number of Operations to Make Elements in Array Distinct](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003396-minimum-number-of-operations-to-make-elements-in-array-distinct/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumOperations($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
print minimumOperations([1, 2, 3, 4, 2, 3, 3, 5, 7]) . "\n"; // Output: 2
print minimumOperations([4, 5, 6, 4, 4]) . "\n";             // Output: 2
print minimumOperations([6, 7, 8, 9]) . "\n";                // Output: 0
?>
```

### Explanation:

1. **Iterate through possible operations**: The loop starts with `k = 0` and increments `k` until a valid subarray is found.
2. **Check subarray validity**: For each `k`, calculate the starting index `3*k`. If this index exceeds the array length, return `k` as the array is empty. Otherwise, check if all elements in the subarray starting from this index are unique.
3. **Unique check using a hash set**: Use a hash set to track seen elements in the subarray. If any element is encountered more than once, the subarray is invalid, and we proceed to the next `k`.

This approach efficiently checks each possible number of operations in sequence, ensuring the minimum number of operations is found by leveraging early termination when a valid subarray is identified.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**