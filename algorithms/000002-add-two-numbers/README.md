2\. Add Two Numbers

**Difficulty:** Medium

You are given two **non-empty** linked lists representing two non-negative integers. The digits are stored in **reverse order**, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/10/02/addtwonumber1.jpg)

- **Input:** l1 = [2,4,3], l2 = [5,6,4]
- **Output:** [7,0,8]
- **Explanation:** 342 + 465 = 807.

**Example 2:**

- **Input:** l1 = [0], l2 = [0]
- **Output:** [0]

**Example 3:**

- **Input:** l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
- **Output:** [8,9,9,9,0,0,0,1]

**Constraints:**

- The number of nodes in each linked list is in the range `[1, 100]`.
- `0 <= Node.val <= 9`
- It is guaranteed that the list represents a number that does not have leading zeros.



**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[2. Add Two Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000002-add-two-numbers/solution.php)**

```php
<?php
// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummyHead = new ListNode(0);
    $current = $dummyHead;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummyHead->next;
}

// Helper function to convert linked list to array (for easy verification)
function linkedListToArray($node) {
    $arr = [];
    while ($node !== null) {
        $arr[] = $node->val;
        $node = $node->next;
    }
    return $arr;
}

// Example usage:
$l1 = createLinkedList([2, 4, 3]);
$l2 = createLinkedList([5, 6, 4]);
$result = addTwoNumbers($l1, $l2);
print_r(linkedListToArray($result)); // Output: [7, 0, 8]

$l1 = createLinkedList([0]);
$l2 = createLinkedList([0]);
$result = addTwoNumbers($l1, $l2);
print_r(linkedListToArray($result)); // Output: [0]

$l1 = createLinkedList([9, 9, 9, 9, 9, 9, 9]);
$l2 = createLinkedList([9, 9, 9, 9]);
$result = addTwoNumbers($l1, $l2);
print_r(linkedListToArray($result)); // Output: [8, 9, 9, 9, 0, 0, 0, 1]
?>
```

### Explanation:

1. **Class Definition**:
    - We define a `ListNode` class to represent each node in the linked list. Each node has a `val` to store its value and a `next` pointer to point to the next node.

2. **Function `addTwoNumbers`**:
    - This function takes two linked lists (`$l1` and `$l2`) and returns a new linked list representing the sum of the numbers.
    - A dummy head node (`$dummyHead`) is created to simplify the construction of the result list.
    - Two pointers, `$p` and `$q`, are used to traverse the input lists.
    - A pointer `$curr` is used to build the new linked list.
    - The `carry` variable keeps track of the carry-over during addition.

3. **While Loop**:
    - The loop continues as long as there are nodes left in either `$l1` or `$l2`.
    - The values of the current nodes (`$x` and `$y`) are retrieved. If one of the lists has been fully traversed, its value is considered as `0`.
    - The sum of the current digits and the carry is calculated.
    - The carry for the next iteration is updated.
    - A new node with the digit value of `sum % 10` is created and linked to the current node (`$curr`).
    - The pointers `$p` and `$q` are moved to the next nodes.

4. **Final Carry**:
    - After the loop, if there is a remaining carry, it is added as a new node to the result list.

5. **Helper Functions**:
    - `createLinkedList` creates a linked list from an array.
    - `linkedListToArray` converts a linked list to an array for easy verification.

This solution correctly handles the addition of two numbers represented as linked lists, considering edge cases and ensuring the result is also in linked list format.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
