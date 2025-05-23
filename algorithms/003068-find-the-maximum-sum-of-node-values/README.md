3068\. Find the Maximum Sum of Node Values

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Greedy`, `Bit Manipulation`, `Tree`, `Sorting`

There exists an **undirected** tree with `n` nodes numbered `0` to `n - 1`. You are given a **0-indexed** 2D integer array `edges` of length `n - 1`, where <code>edges[i] = [u<sup>i</sup>, v<sup>i</sup>]</code> indicates that there is an edge between nodes <code>u<sup>i</sup></code> and v<code><sup>i</sup></code> in the tree. You are also given a **positive** integer `k`, and a **0-indexed** array of **non-negative** integers `nums` of length `n`, where `nums[i]` represents the `value` of the node numbered `i`.

Alice wants the sum of values of tree nodes to be **maximum**, for which Alice can perform the following operation **any** number of times (**including zero**) on the tree:

- Choose any edge `[u, v]` connecting the nodes `u` and `v`, and update their values as follows:
  - `nums[u] = nums[u] XOR k`
  - `nums[v] = nums[v] XOR k`

Return _the **maximum** possible **sum** of the **values** Alice can achieve by performing the operation **any** number of times_.

**Example 1:**

![screenshot-2023-11-10-012513](https://assets.leetcode.com/uploads/2023/11/09/screenshot-2023-11-10-012513.png)

- **Input:** nums = [1,2,1], k = 3, edges = [[0,1],[0,2]]
- **Output:** 6
- **Explanation:** Alice can achieve the maximum sum of 6 using a single operation:
  - Choose the edge [0,2]. nums[0] and nums[2] become: 1 XOR 3 = 2, and the array nums becomes: [1,2,1] -> [2,2,2].\
    The total sum of values is 2 + 2 + 2 = 6.\
    It can be shown that 6 is the maximum achievable sum of values.

**Example 2:**

![screenshot-2024-01-09-220017](https://assets.leetcode.com/uploads/2024/01/09/screenshot-2024-01-09-220017.png)

- **Input:** nums = [2,3], k = 7, edges = [[0,1]]
- **Output:** 9
- **Explanation:** Alice can achieve the maximum sum of 9 using a single operation:
  - Choose the edge [0,1]. nums[0] becomes: 2 XOR 7 = 5 and nums[1] become: 3 XOR 7 = 4, and the array nums becomes: [2,3] -> [5,4].\
    The total sum of values is 5 + 4 = 9.\
    It can be shown that 9 is the maximum achievable sum of values.

**Example 3:**

![screenshot-2023-11-10-012641](https://assets.leetcode.com/uploads/2023/11/09/screenshot-2023-11-10-012641.png)

- **Input:** nums = [7,7,7,7,7,7], k = 3, edges = [[0,1],[0,2],[0,3],[0,4],[0,5]]
- **Output:** 42
- **Explanation:** The maximum achievable sum is 42 which can be achieved by Alice performing no operations.

**Constraints:**

- <code>2 <= n == nums.length <= 2 * 10<sup>4</sup></code>
- <code>1 <= k <= 10<sup>9</sup></code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>
- `edges.length == n - 1`
- `edges[i].length == 2`
- `0 <= edges[i][0], edges[i][1] <= n - 1`
- The input is generated such that `edges` represent a valid tree.


**Hint:**
1. Select any node as the root.
2. Let `dp[x][c]` be the maximum sum we can get for the subtree rooted at node `x`, where `c` is a boolean representing whether the edge between node `x` and its parent (if any) is selected or not.
3. `dp[x][c] = max(sum(dp[y][cy]) + v(nums[x], sum(cy) + c))` where `cy` is `0` or `1`. When `sum(cy) + c` is odd, `v(nums[x], sum(cy) + c) = nums[x] XOR k`. When `sum(cy) + c` is even, `v(nums[x], sum(cy) + c) = nums[x]`.
4. There’s also an easier solution - does the parity of the number of elements where `nums[i] XOR k > nums[i]` help?



**Solution:**

We need to maximize the sum of node values in an undirected tree after performing any number of operations on its edges. Each operation involves XORing the values of two connected nodes with a given integer `k`. The challenge is to determine the optimal set of operations to achieve the highest possible sum of node values.

### Approach
1. **Understand the Operation**: Each operation on an edge XORs the values of the two connected nodes with `k`. XORing a value with `k` an even number of times reverts it to its original value, while an odd number of times changes it to the XOR result.

2. **Maximize Individual Node Values**: For each node, compute the value after XORing with `k` and compare it with the original value. Track the maximum possible value for each node.

3. **Count Beneficial Flips**: Determine how many nodes have a higher value when XORed with `k` (beneficial flips). If this count is even, the sum of these values is the maximum possible. If odd, adjust by the smallest possible loss to make the count even.

4. **Adjust for Even Count**: If the count of beneficial flips is odd, subtract the smallest absolute difference between a node's original value and its XORed value to ensure an even count of flips, thus maximizing the sum.

Let's implement this solution in PHP: **[3068. Find the Maximum Sum of Node Values](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003068-find-the-maximum-sum-of-node-values/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer[][] $edges
 * @return Integer
 */
function maximumValueSum($nums, $k, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$nums = [1,2,1];
$k = 3;
$edges = [[0,1],[0,2]];
echo maximumValueSum($nums, $k, $edges); // Output: 6

// Example 2:
$nums = [2,3];
$k = 7;
$edges = [[0,1]];
echo maximumValueSum($nums, $k, $edges); // Output: 9

// Example 3:
$nums = [7,7,7,7,7,7];
$k = 3;
$edges = [[0,1],[0,2],[0,3],[0,4],[0,5]];
echo maximumValueSum($nums, $k, $edges); // Output: 42
?>
```

### Explanation:

1. **Compute Maximum Values**: For each node, compute the value after XORing with `k` and take the maximum of the original and XORed value. Sum these maximum values to get the initial potential maximum sum (`maxSum`).

2. **Track Beneficial Flips**: Count how many nodes benefit from being XORed (`changedCount`). This helps determine if the number of beneficial flips is even or odd.

3. **Adjust for Parity**: If `changedCount` is even, the sum is already optimal. If odd, adjust by subtracting the smallest absolute difference between any node's original and XORed values (`minChangeDiff`). This adjustment ensures the number of beneficial flips is even, leading to the maximum possible sum.

This approach efficiently computes the maximum sum by focusing on individual node contributions and adjusting for parity constraints, ensuring optimal performance with a linear time complexity of O(n).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



