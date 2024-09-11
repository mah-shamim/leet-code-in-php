3217\. Delete Nodes From Linked List Present in Array

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Linked List`

You are given an array of integers `nums` and the `head` of a linked list. Return _the `head` of the modified linked list after `removing` all nodes from the linked list that have a value that exists in `nums`_.

**Example 1:**

- **Input:** nums = [1,2,3], head = [1,2,3,4,5]
- **Output:** [4,5]
- **Explanation:** 
   ![linkedlistexample0](https://assets.leetcode.com/uploads/2024/06/11/linkedlistexample0.png)
  Remove the nodes with values 1, 2, and 3.

**Example 2:**

- **Input:** Input: nums = [1], head = [1,2,1,2,1,2]
- **Output:** [2,2,2]
- **Explanation:**
![linkedlistexample1](https://assets.leetcode.com/uploads/2024/06/11/linkedlistexample1.png)
  Remove the nodes with value 1.

**Example 3:**

- **Input:** nums = [5], head = [1,2,3,4]
- **Output:** [1,2,3,4]
  ![linkedlistexample2](https://assets.leetcode.com/uploads/2024/06/11/linkedlistexample2.png)
  No node has value 5.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- All elements in `nums` are unique.
- The number of nodes in the given list is in the range <code>[1, 10<sup>5</sup>]</code>.
- <code>1 <= Node.val <= 10<sup>5</sup></code>
- The input is generated such that there is at least one node in the linked list that has a value not present in `nums`.


**Hint:**
1. Add all elements of `nums` into a Set.
2. Scan the list to check if the current element should be deleted by checking the Set.



**Solution:**

We need to traverse through the linked list and remove any nodes that have a value present in the array `nums`.

### Approach:
1. **Hash Set for Fast Lookup**: Since checking if a value exists in `nums` needs to be efficient, we will convert `nums` into a hash set. This allows O(1) lookup for each value.
2. **Iterate Through the Linked List**: We will iterate through the linked list and remove nodes whose values are present in the hash set.
3. **Pointer Manipulation**: While iterating, we will adjust the pointers to "skip" nodes that match values in the `nums` array.

### Steps:
1. Convert `nums` to a hash set for O(1) lookup.
2. Traverse the linked list with two pointers: one for the current node and one for the previous node to help remove nodes efficiently.
3. For each node, check if the value is in the hash set. If it is, update the previous node’s `next` to skip the current node.

Let's implement this solution in PHP: **[3217. Delete Nodes From Linked List Present in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003217-delete-nodes-from-linked-list-present-in-array/solution.php)**

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

class Solution {

    /**
     * @param Integer[] $nums
     * @param ListNode $head
     * @return ListNode
     */
    function removeElements($head, $nums) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

// Example usage:

// Linked List: 1 -> 2 -> 3 -> 4 -> 5
$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);

// Array nums: [1, 2, 3]
$nums = [1, 2, 3];

$solution = new Solution();
$result = $solution->removeElements($head, $nums);

// Function to print the linked list
function printList($node) {
    while ($node !== null) {
        echo $node->val . " ";
        $node = $node->next;
    }
}

// Print the resulting linked list
printList($result); // Output: 4 5
?>
```

### Explanation:

1. **`removeElements($head, $nums)`**:
    - We first convert `nums` into a hash set (`$numSet = array_flip($nums);`) for fast lookups.
    - A dummy node is created and linked to the head of the list. This helps simplify edge cases like removing the head node.
    - The `prev` pointer tracks the node before the current one, allowing us to remove the current node by skipping it in the list.
    - For each node, we check if its value is in `numSet`. If so, we remove it by adjusting the `prev->next` pointer to skip the current node.

2. **Edge Cases**:
    - If the head node needs to be removed, the dummy node ensures the head can be cleanly removed and still return the correct list.
    - Handles cases where multiple consecutive nodes need to be removed.

3. **Complexity**:
    - **Time Complexity**: O(n), where `n` is the number of nodes in the linked list. We visit each node once. Converting `nums` to a set takes O(m), where `m` is the size of `nums`.
    - **Space Complexity**: O(m) for storing the `nums` set.

### Example Walkthrough:

For input `nums = [1, 2, 3]` and `head = [1, 2, 3, 4, 5]`, the algorithm will:
- Start at node 1, check if 1 is in `nums`, and remove it.
- Move to node 2, check if 2 is in `nums`, and remove it.
- Move to node 3, check if 3 is in `nums`, and remove it.
- Move to node 4 and 5, which are not in `nums`, so they remain in the list.

The resulting linked list is `[4, 5]`.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
