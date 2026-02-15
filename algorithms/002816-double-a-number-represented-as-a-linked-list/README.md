2816\. Double a Number Represented as a Linked List

**Difficulty:** Medium

**Topics:** `Senior`, `Linked List`, `Math`, `Stack`, `Weekly Contest 358`

You are given the `head` of a **non-empty** linked list representing a non-negative integer without leading zeroes.

Return _the `head` of the linked list after **doubling** it._

**Example 1:**

![example](https://assets.leetcode.com/uploads/2023/05/28/example.png)

- **Input:** head = [1,8,9]
- **Output:** [3,7,8]
- **Explanation:** The figure above corresponds to the given linked list which represents the number 189. Hence, the returned linked list represents the number 189 * 2 = 378.

**Example 2:**

![example2](https://assets.leetcode.com/uploads/2023/05/28/example2.png)

- **Input:** head = [9,9,9]
- **Output:** [1,9,9,8]
- **Explanation:** The figure above corresponds to the given linked list which represents the number 999. Hence, the returned linked list reprersents the number 999 * 2 = 1998.

**Constraints:**

- The number of nodes in the list is in the range <code>[1, 10<sup>4</sup>]</code>
- `0 <= Node.val <= 9`
- The input is generated such that the list represents a number that does not have leading zeros, except the number `0` itself.


**Hint:**
1. Traverse the linked list from the least significant digit to the most significant digit and multiply each node's value by 2
2. Handle any carry-over digits that may arise during the doubling process.
3. If there is a carry-over digit on the most significant digit, create a new node with that value and point it to the start of the given linked list and return it.


**Similar Questions:**
1. [2. Add Two Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000002-add-two-numbers)
2. [369. Plus One Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000369-plus-one-linked-list)