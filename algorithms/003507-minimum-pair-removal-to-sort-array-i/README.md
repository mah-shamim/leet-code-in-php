3507\. Minimum Pair Removal to Sort Array I

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Linked List`, `Heap (Priority Queue)`, `Simulation`, `Doubly-Linked List`, `Ordered Set`, `Weekly Contest 444`

Given an array `nums`, you can perform the following operation any number of times:

- Select the **adjacent** pair with the **minimum** sum in `nums`. If multiple such pairs exist, choose the leftmost one.
- Replace the pair with their sum.

Return _the **minimum number of operations** needed to make the array **non-decreasing**_.

An array is said to be **non-decreasing** if each element is greater than or equal to its previous element (if it exists).

**Example 1:**

- **Input:** nums = [5,2,3,1]
- **Output:** 2
- **Explanation:**
  - The pair `(3,1)` has the minimum sum of 4. After replacement, `nums = [5,2,4]`.
  - The pair `(2,4)` has the minimum sum of 6. After replacement, `nums = [5,6]`.
  - The array `nums` became non-decreasing in two operations.

**Example 2:**

- **Input:** nums = [1,2,2]
- **Output:** 0
- **Explanation:** The array `nums` is already sorted.

**Constraints:**

- `1 <= nums.length <= 50`
- `-1000 <= nums[i] <= 1000`



**Hint:**
1. Simulate the operations






**Solution:**

We are given an array and we can repeatedly replace the adjacent pair with the minimum sum (leftmost if ties) by their sum.

### Approach:

- **Simulate the operations** until the array becomes non-decreasing
- **Repeat until sorted:**
   1. Check if the current array is non-decreasing
   2. Find the adjacent pair with the smallest sum (choose leftmost if ties)
   3. Replace that pair with their sum
   4. Count each operation
- **Early exit:** Return 0 if the array is already non-decreasing

Let's implement this solution in PHP: **[3507. Minimum Pair Removal to Sort Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003507-minimum-pair-removal-to-sort-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumPairRemoval(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumPairRemoval([5,2,3,1]) . "\n";      // Output: 2
echo minimumPairRemoval([1,2,2]) . "\n";        // Output: 0
?>
```

### Explanation:

- **Key Insight:** Since the array length is small (≤ 50), we can directly simulate the described process without optimization concerns
- **Process:**
   1. Continuously find and merge the minimum-sum adjacent pair
   2. Each merge reduces the array length by 1
   3. Repeat until the array is sorted in non-decreasing order
- **Why This Works:** The problem constraints guarantee this brute-force simulation is feasible
- **Edge Cases:**
   - Already sorted arrays require 0 operations
   - Negative numbers can create smaller sums
   - Ties in minimum sum use the leftmost pair

### Complexity

- **Time Complexity:** O(n³) in worst case (n merges × n pair checks × n verification)
- **Space Complexity:** O(n) for maintaining the array during simulation

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**





