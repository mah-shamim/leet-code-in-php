3423\. Maximum Difference Between Adjacent Elements in a Circular Array

**Difficulty:** Easy

**Topics:** `Array`

Given a **circular** array `nums`, find the **maximum** absolute difference between adjacent elements.

**Note**: In a circular array, the first and last elements are adjacent.

**Example 1:**

- **Input:** nums = [1,2,4]
- **Output:** 3
- **Explanation:** Because `nums` is circular, `nums[0]` and `nums[2]` are adjacent. They have the maximum absolute difference of `|4 - 1| = 3`.

**Example 2:**

- **Input:** nums = [-5,-10,-5]
- **Output:** 5
- **Explanation:** The adjacent elements `nums[0]` and `nums[1]` have the maximum absolute difference of `|-5 - (-10)| = 5`.

**Constraints:**

- `2 <= nums.length <= 100`
- `-100 <= nums[i] <= 100`


**Hint:**
1. Traverse from the second element to the last element and check the difference of every adjacent pair.
2. The edge case is to check the difference between the first and last elements.






**Solution:**

We need to find the maximum absolute difference between adjacent elements in a circular array. In a circular array, the first and last elements are considered adjacent. The solution involves checking all adjacent pairs, including the pair formed by the last and first elements.

### Approach
1. **Problem Analysis**: The task is to compute the maximum absolute difference between adjacent elements in a circular array. The circular nature means that after processing all linear adjacent pairs (e.g., elements at indices 0 and 1, 1 and 2, etc.), we must also consider the pair formed by the last element and the first element.
2. **Intuition**: By iterating through each element in the array and comparing it with the next element (using modulo arithmetic to handle the circular wrap-around), we can efficiently compute all adjacent differences.
3. **Algorithm Selection**: We use a loop to traverse each element, compute the absolute difference with the next element (where the next element of the last element is the first element), and keep track of the maximum difference encountered.
4. **Complexity Analysis**: The algorithm processes each element exactly once, resulting in a time complexity of _**O(n)**_, where _**n**_ is the number of elements in the array. The space complexity is _**O(1)**_ as we only use a few extra variables.

Let's implement this solution in PHP: **[3423. Maximum Difference Between Adjacent Elements in a Circular Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003423-maximum-difference-between-adjacent-elements-in-a-circular-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxAdjacentDistance($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [1, 2, 4];
echo "Output: " . maxAdjacentDistance($nums1) . "\n"; // Output: 3

// Example 2
$nums2 = [-5, -10, -5];
echo "Output: " . maxAdjacentDistance($nums2) . "\n"; // Output: 5
?>
```

### Explanation:

1. **Initialization**: We start by determining the length of the array `$n` and initialize `$max_diff` to 0.
2. **Loop Through Elements**: For each element in the array, we calculate the index of the next adjacent element using modulo arithmetic (`($i + 1) % $n`). This ensures that for the last element, the next element is the first element.
3. **Compute Absolute Difference**: For each pair of adjacent elements, we compute the absolute difference between them.
4. **Update Maximum Difference**: If the computed difference is greater than the current `$max_diff`, we update `$max_diff`.
5. **Return Result**: After processing all elements, we return `$max_diff`, which holds the maximum absolute difference between any two adjacent elements in the circular array.

This approach efficiently checks all adjacent pairs in the circular array, ensuring the solution is both optimal and straightforward.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)** 