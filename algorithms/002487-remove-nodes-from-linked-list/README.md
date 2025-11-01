2487\. Remove Nodes From Linked List

**Difficulty:** Medium

**Topics:** `Linked List`, `Stack`, `Recursion`, `Monotonic Stack`, `Weekly Contest 321`

You are given the `head` of a linked list.

Remove every node which has a node with a greater value anywhere to the right side of it.

Return _the `head` of the modified linked list._

**Example 1:**

![drawio](https://assets.leetcode.com/uploads/2022/10/02/drawio.png)

- **Input:** head = [5,2,13,3,8]
- **Output:** [13,8]
- **Explanation:** The nodes that should be removed are 5, 2 and 3.
  - Node 13 is to the right of node 5.
  - Node 13 is to the right of node 2.
  - Node 8 is to the right of node 3.

**Example 2:**

- **Input:** head = [1,1,1,1]
- **Output:** [1,1,1,1]
- **Explanation:** Every node has value 1, so no nodes are removed.

**Constraints:**

- The number of the nodes in the given list is in the range <code>[1, 10<sup>5</sup>]</code>.
- <code>1 <= Node.val <= 10<sup>5</sup></code>


**Hint:**
1. Iterate on nodes in reversed order.
2. When iterating in reversed order, save the maximum value that was passed before.



**Similar Questions:**
1. [206. Reverse Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000206-reverse-linked-list)
2. [237. Delete Node in a Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000237-delete-node-in-a-linked-list)
3. [496. Next Greater Element I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000496-next-greater-element-i)
4. [3217. Delete Nodes From Linked List Present in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003217-delete-nodes-from-linked-list-present-in-array/solution.php)
