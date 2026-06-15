2095\. Delete the Middle Node of a Linked List

**Difficulty:** Medium

**Topics:** `Senior`, `Linked List`, `Two Pointers`, `Weekly Contest 270`

You are given the `head` of a linked list. **Delete** the **middle node**, and return _the `head` of the modified linked list_.

The **middle node** of a linked list of size `n` is the `⌊n / 2⌋ᵗʰ` node from the **start** using **0-based indexing**, where `⌊x⌋` denotes the largest integer less than or equal to `x`.

- For `n` = `1`, `2`, `3`, `4`, and `5`, the middle nodes are `0`, `1`, `1`, `2`, and `2`, respectively.


**Example 1:**

![eg1drawio](https://assets.leetcode.com/uploads/2021/11/16/eg1drawio.png)

- **Input:** head = [1,3,4,7,1,2,6]
- **Output:** [1,3,4,1,2,6]
- **Explanation:**
  - The above figure represents the given linked list. The indices of the nodes are written below.
  - Since n = 7, node 3 with value 7 is the middle node, which is marked in red.
  - We return the new list after removing this node.

**Example 2:**

![eg2drawio](https://assets.leetcode.com/uploads/2021/11/16/eg2drawio.png)

- **Input:** head = [1,2,3,4]
- **Output:** [1,2,4]
- **Explanation:**
  - The above figure represents the given linked list.
  - For n = 4, node 2 with value 3 is the middle node, which is marked in red.

**Example 3:**

![eg3drawio](https://assets.leetcode.com/uploads/2021/11/16/eg3drawio.png)

- **Input:** head = [2,1]
- **Output:** [2]
- **Explanation:**
  - The above figure represents the given linked list.
  - For n = 2, node 1 with value 1 is the middle node, which is marked in red.
  - Node 0 with value 2 is the only node remaining after removing node 1.

**Constraints:**

- The number of nodes in the list is in the range `[1, 10⁵]`.
- `1 <= Node.val <= 10⁵`



**Hint:**
1. If a point with a speed s moves n units in a given time, a point with speed `2 * s` will move `2 * n` units at the same time. Can you use this to find the middle node of a linked list?
2. If you are given the middle node, the node before it, and the node after it, how can you modify the linked list?



**Similar Questions:**
1. [19. Remove Nth Node From End of List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000019-remove-nth-node-from-end-of-list)
2. [143. Reorder List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000143-reorder-list)
3. [203. Remove Linked List Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000203-remove-linked-list-elements)
4. [876. Middle of the Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000876-middle-of-the-linked-list)






**Solution:**

This problem requires removing the middle node of a singly linked list, where the middle is defined as the `⌊n / 2⌋`-th node using 0-based indexing.  
The solution uses the **two-pointer (slow & fast)** technique to locate the node before the middle in one pass, then bypasses the middle node to delete it.

### Approach:

- **Two-pointer traversal:**
    - `slow` moves one step at a time, `fast` moves two steps.
    - By the time `fast` reaches the end, `slow` is at the middle node.
- **Tracking previous node:**
    - Keep a `prev` pointer to remember the node before `slow`.
    - This allows linking `prev` to `slow->next` to skip the middle node.
- **Edge case handling:**
    - If the list has only one node, return `null` (since removing it leaves an empty list).

Let's implement this solution in PHP: **[2095. Delete the Middle Node of a Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002095-delete-the-middle-node-of-a-linked-list/solution.php)**

```php
<?php
/**
 * @param ListNode $head
 * @return ListNode
 */
function deleteMiddle(ListNode $head): ?ListNode
{
    // If there's only one node, return null
    if ($head->next == null) {
        return null;
    }

    $slow = $head;
    $fast = $head;
    $prev = null;

    // Move fast twice as fast as slow
    while ($fast !== null && $fast->next !== null) {
        $prev = $slow;
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    // $slow is the middle node, $prev is the node before it
    $prev->next = $slow->next;

    return $head;
}

// Test cases
echo deleteMiddle([1,3,4,7,1,2,6]) . "\n";      // Output: [1,3,4,1,2,6]
echo deleteMiddle([1,2,3,4]) . "\n";            // Output: [1,2,4]
echo deleteMiddle([2,1]) . "\n";                // Output: [2]
?>
```

### Explanation:

- **Initialization:**
    - `slow = head`, `fast = head`, `prev = null`.
    - Check for the single-node case: if `head->next == null`, return `null`.

- **Finding the middle:**
    - Loop while `fast != null && fast->next != null`.
    - Update `prev = slow`, then move `slow = slow->next`, `fast = fast->next->next`.
    - At loop end, `slow` is exactly the middle node, `prev` is the node before it.

- **Deletion:**
    - Set `prev->next = slow->next` to bypass the middle node.
    - Return `head` (the original head of the modified list).

### Complexity
- **Time Complexity**: _**O(n)**_, Single pass through the list to find and delete the middle node.
- **Space Complexity**: _**O(1)**_, Only a constant amount of extra space (three pointers).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**