368\. Largest Divisible Subset

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Dynamic Programming`, `Sorting`

Given a set of **distinct** positive integers `nums`, return the largest subset `answer` such that every pair `(answer[i], answer[j])` of elements in this subset satisfies:

- `answer[i] % answer[j] == 0`, or
- `answer[j] % answer[i] == 0`

If there are multiple solutions, return _any of them_.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** [1,2]
- **Explanation:** [1,3] is also accepted.

**Example 2:**

- **Input:** nums = [1,2,4,8]
- **Output:** [1,2,4,8]



**Constraints:**

- `1 <= nums.length <= 1000`
- <code>1 <= nums[i] <= 2 * 10<sup>9</sup></code>
- All the integers in `nums` are **unique**.



**Solution:**

We need to find the largest subset of distinct positive integers such that every pair of elements in the subset satisfies the divisibility condition (i.e., one element divides the other). The approach involves dynamic programming (DP) to efficiently determine the longest chain of elements where each subsequent element is a multiple of the previous one.

### Approach
1. **Sort the Array**: Sorting helps in ensuring that if we are considering elements in ascending order, each subsequent element can only be a multiple of the previous elements.
2. **Dynamic Programming Setup**: Use two arrays:
   - `dp[i]` to store the length of the largest divisible subset ending with the element at index `i`.
   - `prev[i]` to track the index of the previous element in the subset to reconstruct the answer.
3. **DP Transition**: For each element at index `i`, check all previous elements at indices `j` (where `j < i`). If the current element is divisible by the previous element and extending the subset ending at `j` results in a larger subset, update `dp[i]` and `prev[i]`.
4. **Reconstruct the Subset**: After filling the DP arrays, backtrack from the element with the maximum subset length to construct the result subset using the `prev` array.

Let's implement this solution in PHP: **[368. Largest Divisible Subset](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000368-largest-divisible-subset/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function largestDivisibleSubset($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1, 2, 3];
print_r(largestDivisibleSubset($nums1)); // Possible outputs: [1,2] or [1,3]

$nums2 = [1, 2, 4, 8];
print_r(largestDivisibleSubset($nums2)); // Output: [1, 2, 4, 8]
?>
```

### Explanation:

1. **Sorting**: The input array is sorted in ascending order to facilitate checking divisibility in a sequential manner.
2. **DP Initialization**: Arrays `dp` and `prev` are initialized to track the length of subsets and their previous elements, respectively.
3. **DP Transition**: For each element, we check all previous elements to see if they can form a valid divisible subset. If so, we update the DP values accordingly.
4. **Result Construction**: The maximum length subset is identified, and the subset is reconstructed by backtracking from the element with the maximum length using the `prev` array.

This approach efficiently finds the largest divisible subset using dynamic programming and backtracking, ensuring optimal performance with a time complexity of _**O(n<sup>2</sup>)**_, which is feasible given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**