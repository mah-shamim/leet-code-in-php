3477\. Fruits Into Baskets II

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Segment Tree`, `Simulation`, `Ordered Set`, `Weekly Contest 440`

Alice and Bob have an undirected graph of `n` nodes and three types of edges:

- Type 1: Can be traversed by Alice only.
- Type 2: Can be traversed by Bob only.
- Type 3: Can be traversed by both Alice and Bob.

Given an array `edges` where <code>edges[i] = [type<sub>i</sub>, u<sub>i</sub>, v<sub>i</sub>]</code> represents a bidirectional edge of type <code>type<sub>i</sub></code> between nodes <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code>, find the maximum number of edges you can remove so that after removing the edges, the graph can still be fully traversed by both Alice and Bob. The graph is fully traversed by Alice and Bob if starting from any node, they can reach all other nodes.

Return _the maximum number of edges you can remove, or return `-1` if Alice and Bob cannot fully traverse the graph_.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/08/19/ex1.png)

- **Input:** n = 4, edges = [[3,1,2],[3,2,3],[1,1,3],[1,2,4],[1,1,2],[2,3,4]]
- **Output:** 2
- **Explanation:** If we remove the 2 edges [1,1,2] and [1,1,3]. The graph will still be fully traversable by Alice and Bob. Removing any additional edge will not make it so. So the maximum number of edges we can remove is 2.

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/08/19/ex2.png)

- **Input:** n = 4, edges = [[3,1,2],[3,2,3],[1,1,4],[2,1,4]]
- **Output:** 0
- **Explanation:** Notice that removing any edge will not make the graph fully traversable by Alice and Bob.

**Example 3:**

![](https://assets.leetcode.com/uploads/2020/08/19/ex3.png)

- **Input:** n = 4, edges = [[3,2,3],[1,1,2],[2,3,4]]
- **Output:** -1
- **Explanation:** In the current graph, Alice cannot reach node 4 from the other nodes. Likewise, Bob cannot reach 1. Therefore it's impossible to make the graph fully traversable.

**Constraints:**


- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= edges.length <= min(10<sup>5</sup>, 3 * n * (n - 1) / 2)</code>
- <code>edges[i].length == 3</code>
- <code>1 <= type<sub>i</sub> <= 3</code>
- <code>1 <= u<sub>i</sub> < v<sub>i</sub> <= n</code>
- All tuples <code>(type<sub>i</sub>, u<sub>i</sub>, v<sub>i</sub>)</code> are distinct.


**Hint:**
1. Simulate the operations for each fruit as described



**Similar Questions:**
1. [904. Fruit Into Baskets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000904-fruit-into-baskets)






**Solution:**

We can use sorting and binary search techniques. Here’s the plan:

### Approach:

1. **Two Pointers Approach:**
    - First, identify the longest non-decreasing prefix (`left` pointer).
    - Then, identify the longest non-decreasing suffix (`right` pointer).
    - After that, try to combine these two subarrays by considering the middle part of the array and adjusting the subarray to be removed in such a way that the combined array is non-decreasing.

2. **Monotonic Stack:**
    - Use a monotonic stack to help manage subarray elements in a sorted fashion.

3. **Steps:**
    - Find the longest non-decreasing prefix (`left`).
    - Find the longest non-decreasing suffix (`right`).
    - Try to merge the two subarrays by looking for elements that can form a valid combination.

4. **Optimization:**
    - Use binary search to optimize the merging step for finding the smallest subarray to remove.

Let's implement this solution in PHP: **[3477. Fruits Into Baskets II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003477-fruits-into-baskets-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function shortestSubarrayToRemove($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo shortestSubarrayToRemove([1, 2, 3, 10, 4, 2, 3, 5]) . "\n"; // Output: 3
echo shortestSubarrayToRemove([5, 4, 3, 2, 1]) . "\n";           // Output: 4
echo shortestSubarrayToRemove([1, 2, 3]) . "\n";                 // Output: 0
?>
```

### Explanation:

1. **Longest Non-Decreasing Prefix and Suffix**:
    - The prefix is determined by traversing the array from the start until elements are in non-decreasing order.
    - Similarly, the suffix is determined by traversing from the end.

2. **Initial Minimum Removal**:
    - Calculate the removal length by keeping only the prefix or the suffix.

3. **Merging Prefix and Suffix**:
    - Use two pointers (`i` for prefix and `j` for suffix) to find the smallest subarray to remove such that the last element of the prefix is less than or equal to the first element of the suffix.

4. **Return Result**:
    - The result is the minimum length of the subarray to remove, calculated as the smaller of the initial removal or the merging of prefix and suffix.

### Complexity
- **Time Complexity**: _**O(n)**_, as the array is traversed at most twice.
- **Space Complexity**: _**O(1)**_, as only a few variables are used.

This solution efficiently finds the shortest subarray to be removed to make the array sorted by using a two-pointer technique, and it handles large arrays up to the constraint of `10^5` elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#443, #444 leetcode problems 003477-fruits-into-baskets-ii submissions 1374515723

Thanks for solving the problem of "Fruits Into Baskets II"
