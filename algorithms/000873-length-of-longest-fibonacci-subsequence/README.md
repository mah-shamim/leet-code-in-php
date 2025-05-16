873\. Length of Longest Fibonacci Subsequence

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Dynamic Programming`

A sequence <code>x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub></code> is Fibonacci-like if:

- `n >= 3`
- <code>x<sub>i</sub> + x<sub>i+1</sub> == x<sub>i+2</sub></code> for all `i + 2 <= n`

Given a **strictly increasing** array `arr` of positive integers forming a sequence, return _the **length** of the longest Fibonacci-like subsequence of `arr`_. If one does not exist, return `0`.

A **subsequence** is derived from another sequence `arr` by deleting any number of elements (including none) from `arr`, without changing the order of the remaining elements. For example, `[3, 5, 8]` is a subsequence of `[3, 4, 5, 6, 7, 8]`.

**Example 1:**

- **Input:** arr = [1,2,3,4,5,6,7,8]
- **Output:** 5
- **Explanation:** The longest subsequence that is fibonacci-like: [1,2,3,5,8].

**Example 2:**

- **Input:** arr = [1,3,7,11,12,14,18]
- **Output:** 3
- **Explanation:** The longest subsequence that is fibonacci-like: [1,11,12], [3,11,14] or [7,11,18].



**Constraints:**

- `3 <= arr.length <= 1000`
- <code>1 <= arr[i] < arr[i + 1] <= 10<sup>9</sup></code>



**Solution:**

We need to find the length of the longest Fibonacci-like subsequence in a strictly increasing array. A Fibonacci-like sequence is defined such that each element after the first two is the sum of the two preceding ones.

### Approach
1. **Dynamic Programming (DP) with Hash Map**:
   - **Hash Map**: Use a hash map to store the indices of elements for quick lookup. This allows us to check if the difference between two elements (which would be the preceding element in a Fibonacci sequence) exists in the array.
   - **DP Table**: Use a 2D DP array where `dp[j][k]` represents the length of the longest Fibonacci-like subsequence ending with elements at indices `j` and `k`. Initialize all elements to 2 since any two elements can start a potential sequence.

2. **Iterate Over Pairs**:
   - For each pair of indices `(j, k)` where `j < k`, check if there exists an element `i` such that `arr[i] + arr[j] = arr[k]`. If such an element exists and `i < j`, update the DP value for `dp[j][k]` based on the DP value of `dp[i][j]`.

3. **Track Maximum Length**:
   - Keep track of the maximum length of the subsequence found during the iteration. If no valid subsequence of length 3 or more is found, return 0.

Let's implement this solution in PHP: **[873. Length of Longest Fibonacci Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000873-length-of-longest-fibonacci-subsequence/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function lenLongestFibSubseq($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
$arr1 = [1,2,3,4,5,6,7,8];
echo lenLongestFibSubseq($arr1) . "\n"; // Output: 5

$arr2 = [1,3,7,11,12,14,18];
echo lenLongestFibSubseq($arr2) . "\n"; // Output: 3
?>
```

### Explanation:

- **Hash Map Initialization**: We first create a hash map to store the indices of the elements in the array. This allows O(1) time complexity for checking the existence of elements.
- **DP Array Initialization**: The DP array is initialized to 2 for all pairs since any two elements can form the start of a potential sequence.
- **Iterate Over Pairs**: For each pair `(j, k)`, we compute the difference to check if it exists in the array. If it does and the index of the difference is less than `j`, we update the DP value for `(j, k)` based on the DP value of `(i, j)`.
- **Track Maximum Length**: During the iteration, we keep track of the maximum length of any valid subsequence found. If the maximum length is at least 3, we return it; otherwise, we return 0.

This approach efficiently checks all possible pairs and uses dynamic programming to build up the solution, resulting in an O(n^2) time complexity and O(n^2) space complexity, which is feasible for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**