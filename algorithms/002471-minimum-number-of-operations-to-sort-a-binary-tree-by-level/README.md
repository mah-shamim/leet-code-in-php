2471\. Minimum Number of Operations to Sort a Binary Tree by Level

**Difficulty:** Medium

**Topics:** `Tree`, `Breadth-First Search`, `Binary Tree`

You are given the `root` of a binary tree with **unique values**.

In one operation, you can choose any two nodes **at the same level** and swap their values.

Return _the minimum number of operations needed to make the values at each level sorted in a **strictly increasing order**_.

The **level** of a node is the number of edges along the path between it and the root node.

**Example 1:**

![image-20220918174006-2](https://assets.leetcode.com/uploads/2022/09/18/image-20220918174006-2.png)

- **Input:** root = [1,4,3,7,6,8,5,null,null,null,null,9,null,10]
- **Output:** 3
- **Explanation:**
  - Swap 4 and 3. The 2nd level becomes [3,4].
  - Swap 7 and 5. The 3rd level becomes [5,6,8,7].
  - Swap 8 and 7. The 3rd level becomes [5,6,7,8].
    We used 3 operations so return 3.
    It can be proven that 3 is the minimum number of operations needed.

**Example 2:**

![image-20220918174026-3](https://assets.leetcode.com/uploads/2022/09/18/image-20220918174026-3.png)

- **Input:** root = [1,3,2,7,6,5,4]
- **Output:** 3
- **Explanation:**
  - Swap 3 and 2. The 2nd level becomes [2,3].
  - Swap 7 and 4. The 3rd level becomes [4,6,5,7].
  - Swap 6 and 5. The 3rd level becomes [4,5,6,7].
    We used 3 operations so return 3.
    It can be proven that 3 is the minimum number of operations needed.


**Example 3:**

![image-20220918174052-4](https://assets.leetcode.com/uploads/2022/09/18/image-20220918174052-4.png)

- **Input:** root = [1,2,3,4,5,6]
- **Output:** 0
- **Explanation:** Each level is already sorted in increasing order so return 0.



**Constraints:**

- The number of nodes in the tree is in the range <code>[1, 10<sup>5</sup>]</code>.
- <code>1 <= Node.val <= 10<sup>5</sup></code>
- All the values of the tree are **unique**.


**Hint:**
1. We can group the values level by level and solve each group independently.
2. Do BFS to group the value level by level.
3. Find the minimum number of swaps to sort the array of each level.
4. While iterating over the array, check the current element, and if not in the correct index, replace that element with the index of the element which should have come.



**Solution:**

The problem is about sorting the values of a binary tree level by level in strictly increasing order with the minimum number of operations. In each operation, we can swap the values of two nodes that are at the same level. The goal is to determine the minimum number of such operations required to achieve the sorted order.

### Key Points:
1. **Binary Tree Levels**: Each level of the binary tree should have values sorted in strictly increasing order.
2. **Unique Values**: All nodes have unique values, making sorting easier as there are no duplicates.
3. **BFS for Level Grouping**: Use Breadth-First Search (BFS) to traverse the tree and group nodes by their levels.
4. **Minimum Swaps**: For each level, we need to find the minimum number of swaps required to sort the node values at that level.
5. **Constraints**: The tree can have up to _**10^5**_ nodes, so the solution must be efficient.

### Approach:

1. **BFS Traversal**: Perform a BFS to traverse the tree and collect the values of nodes at each level.
2. **Sorting Each Level**: For each level, calculate the minimum number of swaps to sort the values in strictly increasing order.
3. **Cycle Decomposition**: The key observation to minimize swaps is that sorting an array can be seen as swapping elements in cycles. The minimum number of swaps for each cycle of misplaced elements is the length of the cycle minus one.
4. **Accumulating Swaps**: Sum the swaps for each level to get the total number of swaps required.

### Plan:

1. **BFS**: Traverse the tree using BFS to collect nodes at each level.
2. **Sorting Each Level**: Sort the values at each level and compute the minimum number of swaps.
3. **Calculate Swaps**: Use cycle decomposition to find the minimum swaps needed to sort the nodes at each level.

Let's implement this solution in PHP: **[2471. Minimum Number of Operations to Sort a Binary Tree by Level](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002471-minimum-number-of-operations-to-sort-a-binary-tree-by-level/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @return Integer
 */
function minimumOperations($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Function to calculate minimum swaps to sort an array
 *
 * @param $arr
 * @return int
 */
function minSwapsToSort($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
?>
```

### Explanation:

1. **Step 1: Perform BFS to group nodes by level**:
   - Start from the root and traverse the tree level by level.
   - For each node, append its value to the corresponding level in the `levels` array.

2. **Step 2: For each level, calculate the minimum swaps to sort the values**:
   - Sort the values at each level.
   - Use a cycle-based approach to calculate the minimum swaps required to transform the current level into a sorted level.

3. **Cycle Decomposition**:
   - For each unsorted element, trace its cycle (i.e., where it should go) and mark elements as visited.
   - For each cycle, the number of swaps required is the length of the cycle minus one.

4. **Return the total number of swaps**:
   - Sum the swaps needed for each level and return the total.

### Example Walkthrough:

#### Example 1:

Input tree:
```
        1
       / \
      4   3
     / \ / \
    7  6 8  5
             \
              9
               \
                10
```

**Levels**:
- Level 0: [1]
- Level 1: [4, 3]
- Level 2: [7, 6, 8, 5]
- Level 3: [9, 10]

1. **Level 1**: [4, 3]
   - Sort it to [3, 4] with 1 swap (swap 4 and 3).

2. **Level 2**: [7, 6, 8, 5]
   - Sort it to [5, 6, 7, 8] with 2 swaps (swap 7 and 5, swap 8 and 7).

3. **Level 3**: [9, 10]
   - Already sorted, no swaps needed.

Total swaps = 1 (Level 1) + 2 (Level 2) = 3 swaps.

Output: 3

#### Example 2:

Input tree:
```
        1
       / \
      3   2
     / \ / \
    7  6 5  4
```

**Levels**:
- Level 0: [1]
- Level 1: [3, 2]
- Level 2: [7, 6, 5, 4]

1. **Level 1**: [3, 2]
   - Sort it to [2, 3] with 1 swap (swap 3 and 2).

2. **Level 2**: [7, 6, 5, 4]
   - Sort it to [4, 5, 6, 7] with 2 swaps (swap 7 and 4, swap 6 and 5).

Total swaps = 1 (Level 1) + 2 (Level 2) = 3 swaps.

Output: 3

### Time Complexity:

1. **BFS**: _**O(N)**_ where _**N**_ is the number of nodes in the tree.
2. **Sorting Each Level**: Sorting the values at each level takes _**O(L log L)**_ where _**L**_ is the number of nodes at the current level. In the worst case, the total sorting complexity is _**O(N log N)**_.
3. **Cycle Decomposition**: _**O(L)**_ for each level.

Thus, the overall time complexity is _**O(N log N)**_, which is efficient enough given the constraints.

### Output for Example:

For the input tree:

```
        1
       / \
      4   3
     / \ / \
    7  6 8  5
             \
              9
               \
                10
```

The output is `3` swaps, as detailed in the example.

This solution efficiently calculates the minimum number of swaps needed to sort each level of the binary tree by using BFS to group nodes by level and cycle decomposition to minimize the number of swaps. The time complexity of _**O(N log N)**_ is optimal for handling trees with up to _**10^5**_ nodes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
