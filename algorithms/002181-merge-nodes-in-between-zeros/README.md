2181\. Merge Nodes in Between Zeros

**Difficulty:** Medium

**Topics:** `Linked List`, `Simulation`

You are given the `head` of a linked list, which contains a series of integers **separated** by `0`'s. The **beginning** and **end** of the linked list will have `Node.val == 0`.

For **every** two consecutive `0`'s, **merge** all the nodes lying in between them into a single node whose value is the **sum** of all the merged nodes. The modified list should not contain any `0`'s.

Return _the `head` of the modified linked list._

**Example 1:**

![ex1-1](https://assets.leetcode.com/uploads/2022/02/02/ex1-1.png)

- **Input:** head = [0,3,1,0,4,5,2,0]
- **Output:** [4,11]
- **Explanation:** The above figure represents the given linked list. The modified list contains
  - The sum of the nodes marked in green: 3 + 1 = 4.
  - The sum of the nodes marked in red: 4 + 5 + 2 = 11.

**Example 2:**

![ex2-1](https://assets.leetcode.com/uploads/2022/02/02/ex2-1.png)

- **Input:** head = [0,1,0,3,0,2,2,0]
- **Output:** [1,3,4]
- **Explanation:** The above figure represents the given linked list. The modified list contains
  - The sum of the nodes marked in green: 1 = 1.
  - The sum of the nodes marked in red: 3 = 3.
  - The sum of the nodes marked in yellow: 2 + 2 = 4.

**Constraints:**

- The number of nodes in the list is in the range <code>[3, 2 * 10<sup>5</sup>]</code>.
- `0 <= Node.val <= 1000`
- There are no two consecutive nodes with `Node.val == 0`.
- The beginning and end of the linked list have `Node.val == 0`.


**Hint:**
1. How can you use two pointers to modify the original list into the new list?
2. Have a pointer traverse the entire linked list, while another pointer looks at a node that is currently being modified.
3. Keep on summing the values of the nodes between the traversal pointer and the modifying pointer until the former comes across a ‘0’. In that case, the modifying pointer is incremented to modify the next node.
4. Do not forget to have the next pointer of the final node of the modified list point to null.



**Solution:**

We can follow these steps:

1. **Parse Input Linked List:** Read the input linked list and identify segments between zeros.
2. **Sum Segments:** For each segment between two zeros, calculate the sum of the nodes.
3. **Create New Linked List:** Create a new linked list containing the sums of the segments, with zeros at the start and end.

Let's implement this solution in PHP: **[2181. Merge Nodes in Between Zeros](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002181-merge-nodes-in-between-zeros/solution.php)**

```php
<?php
/**
 * @param ListNode $head
 * @return ListNode
 */
function mergeNodes($head) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to print linked list
function printLinkedList($head) {
    $current = $head;
    while ($current !== null) {
        echo $current->val . " ";
        $current = $current->next;
    }
    echo "\n";
}

// Helper function to create linked list from array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;
    foreach ($arr as $value) {
        $current->next = new ListNode($value);
        $current = $current->next;
    }
    return $dummy->next;
}

// Example usage
$input = [0, 3, 1, 0, 4, 5, 2, 0];
$head = createLinkedList($input);
$result = mergeNodes($head);
printLinkedList($result); // Expected output: 4 11
?>
```

### Explanation:

1. **Initialization:**
  - We use a dummy node to facilitate list operations. This helps us easily return the new list starting from `dummy->next`.
  - `sum` is initialized to 0 to accumulate values between zeros.

2. **Processing the List:**
  - We skip the first node since it's a zero.
  - We iterate through the list, summing values until we encounter a zero.
  - When a zero is encountered, we create a new node with the current `sum` and append it to the new list. Then, we reset the `sum` to 0.

3. **Creating and Printing Linked Lists:**
  - The helper functions `createLinkedList` and `printLinkedList` are used to build a linked list from an array and print the linked list, respectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**