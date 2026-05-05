61\. Rotate List

**Difficulty:** Medium

**Topics:** `Linked List`, `Two Pointers`

Given the `head` of a linked list, rotate the list to the right by `k` places.

**Example 1:**

![rotate1](https://assets.leetcode.com/uploads/2020/11/13/rotate1.jpg)

- **Input:** head = [1,2,3,4,5], k = 2
- **Output:** [4,5,1,2,3]

**Example 2:**

![roate2](https://assets.leetcode.com/uploads/2020/11/13/roate2.jpg)

- **Input:** head = [0,1,2], k = 4
- **Output:** [2,0,1]

**Example 3:**

- **Input:** head = [1], k = 0
- **Output:** [1]

**Example 4:**

- **Input:** head = [1,2,3], k = 0
- **Output:** [1,2,3]

**Example 5:**

- **Input:** head = [], k = 5
- **Output:** []

**Example 6:**

- **Input:** head = [1,2,3], k = 5
- **Output:** [2,3,1]

**Constraints:**

- The number of nodes in the list is in the range `[0, 500]`.
- `-100 <= Node.val <= 100`
- `0 <= k <= 2 * 10⁹`



**Similar Questions:**
1. [189. Rotate Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000189-rotate-array)
2. [725. Split Linked List in Parts](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000725-split-linked-list-in-parts)






**Solution:**

This solution rotates a singly linked list to the right by `k` places in **O(n)** time and **O(1)** space. It first computes the list length, reduces `k` modulo the length, finds the new head and tail, then performs the rotation by linking the tail to the old head and breaking the list at the new tail.

### Approach:

- **Find list length and tail node** to handle cases where `k` is larger than the list length.
- **Reduce `k`** by taking `k % length` to avoid unnecessary rotations.
- **Locate new tail** at position `length - k - 1` using traversal from head.
- **Perform rotation** by making the original tail point to the original head, and the new tail point to `null`.
- **Return new head**, which is the node after the new tail.

Let's implement this solution in PHP: **[61. Rotate List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000061-rotate-list/solution.php)**

```php
<?php
/**
 * @param ListNode $head
 * @param Integer $k
 * @return ListNode
 */
function rotateRight($head, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo rotateRight([1,2,3,4,5], 2) . "\n";        // Output: [4,5,1,2,3]
echo rotateRight([0,1,2], 4) . "\n";            // Output: [2,0,1]
echo rotateRight([1], 0) . "\n";                // Output: [1]
echo rotateRight([1,2,3], 0) . "\n";            // Output: [1,2,3]
echo rotateRight([], 5) . "\n";                 // Output: []
echo rotateRight([1,2,3], 5) . "\n";            // Output: [2,3,1]
?>
```

### Explanation:

1. **Edge Cases** If the list is empty, has one node, or `k == 0`, return the head immediately.
2. **Find length and tail** Traverse the list to count nodes and store the last node.
3. **Optimize `k`** Since rotating by `length` gives the same list, set `k = k % length`. If `k == 0`, no rotation is needed.
4. **Find new tail position** The new tail is at index `length - k - 1` (0-based). Traverse from head to this node.
5. **Re-link nodes**
   - Original tail's `next` points to original head (close loop).
   - New tail's `next` is set to `null` (break loop).
   - New head is `newTail->next`.
6. **Return new head** This completes the rotation.

### Complexity
- **Time Complexity**: _**O(n)**_ - One pass to find length, another partial pass to find new tail.
- **Space Complexity**: _**O(1)**_ - Only a few pointers used, no extra data structures.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**