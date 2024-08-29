237\. Delete Node in a Linked List

**Difficulty:** Medium

**Topics:** `Linked List`

There is a singly-linked list `head` and we want to delete a node `node` in it.

You are given the node to be deleted `node`. You will not be given access to the first node of `head`.

All the values of the linked list are **unique**, and it is guaranteed that the given node `node` is not the last node in the linked list.

Delete the given node. Note that by deleting the node, we do not mean removing it from memory. We mean:

- The value of the given node should not exist in the linked list.
- The number of nodes in the linked list should decrease by one.
- All the values before `node` should be in the same order.
- All the values after `node` should be in the same order.

Custom testing:

- For the input, you should provide the entire linked list `head` and the node to be given `node`. `node` should not be the last node of the list and should be an actual node in the list.
- We will build the linked list and pass the node to your function.
- The output will be the entire list after calling your function.


**Example 1:**

![](https://assets.leetcode.com/uploads/2020/09/01/node1.jpg)

- **Input:** head = [4,5,1,9], node = 5
- **Output:** [4,1,9]
- **Explanation:** You are given the second node with value 5, the linked list should become 4 -> 1 -> 9 after calling your function.

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/09/01/node2.jpg)

- **Input:** head = [4,5,1,9], node = 1
- **Output:** [4,5,9]
- **Explanation:** You are given the third node with value 1, the linked list should become 4 -> 5 -> 9 after calling your function.


**Constraints:**

- The number of the nodes in the given list is in the range `[2, 1000]`.
- `-1000 <= Node.val <= 1000`
- The value of each node in the list is **unique**.
- The `node` to be deleted is in the list and is **not a tail** node.


**Solution:**


We need to effectively delete the given node by modifying the list in place. The key idea here is to copy the value from the next node into the current node and then skip over the next node.

### Steps to solve the problem:

1. **Copy the value of the next node** into the given node.
2. **Update the `next` pointer** of the given node to skip over the next node (effectively removing the next node from the list).

Let's implement this solution in PHP: **[237. Delete Node in a Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000237-delete-node-in-a-linked-list/solution.php)**

```php
<?php
// Definition for a singly-linked list node.
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function deleteNode($node) {
    // go to solution.php
}

// Example usage:
// Create the linked list: 4 -> 5 -> 1 -> 9
$head = new ListNode(4);
$head->next = new ListNode(5);
$head->next->next = new ListNode(1);
$head->next->next->next = new ListNode(9);

// Assuming we want to delete node with value 5
$nodeToDelete = $head->next;

// Call the function to delete the node
deleteNode($nodeToDelete);

// Output the list to see the result: 4 -> 1 -> 9
$current = $head;
while ($current !== null) {
    echo $current->val . " ";
    $current = $current->next;
}
?>
```

### Explanation:

- **Step 1: Copy the value from the next node.**
    - We assign the value of the next node (`$node->next->val`) to the current node (`$node->val`).
- **Step 2: Update the next pointer.**
    - We update the `next` pointer of the current node to point to the node after the next one (`$node->next = $node->next->next`), effectively removing the next node from the list.

### Example:

For the input linked list `4 -> 5 -> 1 -> 9` and the node to delete with value `5`:
- The value `5` in the node is replaced with the value `1` (from the next node).
- The list is updated to `4 -> 1 -> 9`, effectively deleting the node with the original value `5`.

### Output:

- **Input:** `head = [4,5,1,9]`, `node = 5`
- **Output:** `4 -> 1 -> 9`

This solution efficiently deletes the node in the linked list without the need to traverse the list from the head, adhering to the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
