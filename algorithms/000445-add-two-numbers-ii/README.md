445\. Add Two Numbers II

**Difficulty:** Medium

**Topics:** `Linked List`, `Math`, `Stack`

You are given two **non-empty** linked lists representing two non-negative integers. The most significant digit comes first and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

**Example 1:**

![sumii-linked-list](https://assets.leetcode.com/uploads/2021/04/09/sumii-linked-list.jpg)

- **Input:** l1 = [7,2,4,3], l2 = [5,6,4]
- **Output:** [7,8,0,7]

**Example 2:**

- **Input:** l1 = [2,4,3], l2 = [5,6,4]
- **Output:** [8,0,7]

**Example 3:**

- **Input:** l1 = [0], l2 = [0]
- **Output:** [0] 

**Constraints:**

- The number of nodes in each linked list is in the range [1, 100].
- <code>0 <= Node.val <= 9</code>
- It is guaranteed that the list represents a number that does not have leading zeros.

**Follow-up:** Could you solve it without reversing the input lists?



**Solution:**

We need to add two numbers represented as linked lists. Since the most significant digit comes first, we need to handle the addition from left to right.

### Approach:
1. **Use Stacks**:
    - Since we can't traverse the list from the end directly, we can use stacks to store the digits from the linked lists. This allows us to add the numbers starting from the least significant digit (as if we were traversing the list in reverse).

2. **Addition**:
    - Pop elements from both stacks and add them along with any carry from the previous operation. Create new nodes for the result linked list as we go.

3. **Handle Carry**:
    - If there's any carry left after all digits have been added, it should be added as a new node at the front of the list.

Let's implement this solution in PHP: **[445. Add Two Numbers II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000445-add-two-numbers-ii/solution.php)**

```php
<?php
/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbers($l1, $l2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to create a linked list from an array
/**
 * @param $arr
 * @return mixed|null
 */
function createLinkedList($arr) {
    $dummy = new ListNode();
    $current = $dummy;
    foreach ($arr as $value) {
        $current->next = new ListNode($value);
        $current = $current->next;
    }
    return $dummy->next;
}

// Helper function to print a linked list
/**
 * @param $node
 * @return void
 */
function printLinkedList($node) {
    $output = [];
    while ($node !== null) {
        $output[] = $node->val;
        $node = $node->next;
    }
    echo "[" . implode(",", $output) . "]\n";
}

// Example usage:
$l1 = createLinkedList([7, 2, 4, 3]);
$l2 = createLinkedList([5, 6, 4]);
$result = addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: [7,8,0,7]

$l1 = createLinkedList([2, 4, 3]);
$l2 = createLinkedList([5, 6, 4]);
$result = addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: [8,0,7]

$l1 = createLinkedList([0]);
$l2 = createLinkedList([0]);
$result = addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: [0]
?>
```

### Explanation:

- **Stacks**: The digits are pushed into stacks `stack1` and `stack2` so that the most significant digits are on top.
- **Addition and Carry**: We pop digits from both stacks, add them with any carry, and create new nodes for the resulting linked list.
- **Result List**: The result is formed by continuously linking new nodes to the front of the list, ensuring the most significant digits come first.
- **Edge Cases**: Handles scenarios like different lengths of input lists and carries that need to be added as new nodes.

This solution efficiently handles the addition of two numbers represented by linked lists without reversing the lists, satisfying the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
