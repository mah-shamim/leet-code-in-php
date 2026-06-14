2130\. Maximum Twin Sum of a Linked List

**Difficulty:** Medium

**Topics:** `Senior`, `Linked List`, `Two Pointers`, `Stack`, `Biweekly Contest 69`

In a linked list of size `n`, where `n` is **even**, the `iᵗʰ` node (**0-indexed**) of the linked list is known as the **twin** of the `(n-1-i)ᵗʰ` node, if `0 <= i <= (n / 2) - 1`.

- For example, if `n = 4`, then node `0` is the twin of node `3`, and node `1` is the twin of node `2`. These are the only nodes with twins for `n = 4`.

The **twin sum** is defined as the sum of a node and its twin.

Given the `head` of a linked list with even length, return _the **maximum twin sum** of the linked list_.

**Example 1:**

![eg1drawio](https://assets.leetcode.com/uploads/2021/12/03/eg1drawio.png)

- **Input:** head = [5,4,2,1]
- **Output:** 6
- **Explanation:**
  - Nodes 0 and 1 are the twins of nodes 3 and 2, respectively. All have twin sum = 6.
  - There are no other nodes with twins in the linked list.
  - Thus, the maximum twin sum of the linked list is 6.

**Example 2:**

![eg2drawio](https://assets.leetcode.com/uploads/2021/12/03/eg2drawio.png)

- **Input:** head = [4,2,2,3]
- **Output:** 7
- **Explanation:**
  - The nodes with twins present in this linked list are:
    - Node 0 is the twin of node 3 having a twin sum of 4 + 3 = 7.
    - Node 1 is the twin of node 2 having a twin sum of 2 + 2 = 4.
  - Thus, the maximum twin sum of the linked list is max(7, 4) = 7.

**Example 3:**

![eg3drawio](https://assets.leetcode.com/uploads/2021/12/03/eg3drawio.png)

- **Input:** head = [1,100000]
- **Output:** 100001
- **Explanation:** There is only one node with a twin in the linked list having twin sum of 1 + 100000 = 100001.

**Constraints:**

- The number of nodes in the list is an even integer in the range `[2, 10⁵]`.
- `1 <= Node.val <= 10⁵`



**Hint:**
1. How can "reversing" a part of the linked list help find the answer?
2. We know that the nodes of the first half are twins of nodes in the second half, so try dividing the linked list in half and reverse the second half.
3. How can two pointers be used to find every twin sum optimally?
4. Use two different pointers pointing to the first nodes of the two halves of the linked list. The second pointer will point to the first node of the reversed half, which is the (n-1-i)ᵗʰ node in the original linked list. By moving both pointers forward at the same time, we find all twin sums.



**Similar Questions:**
1. [206. Reverse Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000206-reverse-linked-list)
2. [234. Palindrome Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000234-palindrome-linked-list)
3. [876. Middle of the Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000876-middle-of-the-linked-list)






**Solution:**

- We have a singly linked list with **even length** `n`.
- For each node at index `i` (0‑based), its **twin** is the node at index `n-1-i`.
- Twin sum = `node.val + twin.val`.
- Goal: Find the **maximum** twin sum.

### Approach:

### Step 1 — Understand the twin pairing
Because the list length is even, the first half is paired with the second half in reverse order:
- Index `0` pairs with `n-1`
- Index `1` pairs with `n-2`
- ...
- Index `n/2 - 1` pairs with `n/2`

This is symmetric.

### Step 2 — Efficient approach
We don’t want to traverse the list repeatedly for each pair.  
The optimal way:
1. **Find the middle of the list** (using slow & fast pointers).  
   This gives us the start of the second half.
2. **Reverse the second half** of the list.  
   Then, the first node of the reversed second half corresponds to the last node of the original list.
3. **Traverse both halves together** and compute twin sums.

### Step 3 — Why reverse the second half?
- Without reversal, to access the twin of the first node, we’d have to go to the end — O(n) per pair.
- After reversal, the twin of the first node becomes the first node of the reversed half, so we can just move pointers forward in parallel.

### Step 4 — Steps in detail
1. Find the middle node (starting point of the second half).
2. Reverse the second half of the list.
3. Initialize a pointer to the start of the first half, and another to the start of the reversed second half.
4. Iterate while the second half pointer is not null (this will automatically cover all pairs exactly once).
5. Compute sum, track the max.

### Step 5 — Edge cases
- Minimum length 2 → only one pair.
- Maximum length 100,000 → algorithm must be O(n) time, O(1) extra space (other than recursion stack, but we’ll do iterative reversal).

Let's implement this solution in PHP: **[2130. Maximum Twin Sum of a Linked List](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002130-maximum-twin-sum-of-a-linked-list/solution.php)**

```php
<?php
/**
 * @param ListNode $head
 * @return Integer
 */
function pairSum(ListNode $head): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo pairSum([5,4,2,1]) . "\n";             // Output: 6
echo pairSum([4,2,2,3]) . "\n";             // Output: 7
echo pairSum([1,100000]) . "\n";            // Output: 100001
?>
```

### Explanation:

- **Finding the middle**: `slow` moves one step, `fast` moves two steps. When `fast` reaches the end, `slow` is at the start of the second half.
- **Reversing the second half**: Standard iterative reversal. We don’t need the original order of the second half anymore.
- **Computing sums**:  
  - `first` starts from `head`, `second` starts from the reversed head.  
  - They naturally align to give twin sums in order.

### Complexity
- **Time Complexity**: _**O(n)**_, one pass to find middle, one pass to reverse, one pass to compute sums.
- **Space Complexity**: _**O(1)**_, only a few pointers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**