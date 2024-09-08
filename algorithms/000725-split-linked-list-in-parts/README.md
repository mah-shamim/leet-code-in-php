725\. Split Linked List in Parts

**Difficulty:** Medium

**Topics:** `Linked List`

Given the `head` of a singly linked list and an integer `k`, split the linked list into k consecutive linked list parts.

The length of each part should be as equal as possible: no two parts should have a size differing by more than one. This may lead to some parts being null.

The parts should be in the order of occurrence in the input list, and parts occurring earlier should always have a size greater than or equal to parts occurring later.

Return _an array of the `k` parts_.

**Example 1:**

![split1-lc](https://assets.leetcode.com/uploads/2021/06/13/split1-lc.jpg)

- **Input:** head = [1,2,3], k = 5
- **Output:** [[1],[2],[3],[],[]]
- **Explanation:**\
  The first element output[0] has output[0].val = 1, output[0].next = null.\
  The last element output[4] is null, but its string representation as a ListNode is [].

**Example 2:**

![split2-lc](https://assets.leetcode.com/uploads/2021/06/13/split2-lc.jpg)

- **Input:** head = [1,2,3,4,5,6,7,8,9,10], k = 3
- **Output:** [[1,2,3,4],[5,6,7],[8,9,10]]
- **Explanation:**\
  The input has been split into consecutive parts with size difference at most 1, and earlier parts are a larger size than the later parts.


**Constraints:**

- The number of nodes in the list is in the range `[0, 1000]`.
- `0 <= Node.val <= 1000`
- `1 <= k <= 50`


**Hint:**
1. If there are N nodes in the list, and k parts, then every part has N/k elements, except the first N%k parts have an extra one.



**Solution:**

The key observation is that the number of nodes in each part should not differ by more than 1. This means:

1. Calculate the length of the linked list.
2. Determine the minimum size of each part (`part_size = length // k`).
3. Distribute the extra nodes evenly across the first few parts (`extra_nodes = length % k`). The first `extra_nodes` parts should have one extra node each.

### Approach

1. **Calculate the length**: Traverse the linked list to find the total number of nodes.
2. **Determine the size of each part**:
   - Each part should have at least `length // k` nodes.
   - The first `length % k` parts should have one extra node.
3. **Split the list**: Use a loop to split the linked list into `k` parts. For each part:
   - If it should have extra nodes, assign `part_size + 1` nodes.
   - If not, assign `part_size` nodes.
4. **Null parts**: If the list is shorter than `k`, some parts will be empty (null).


Let's implement this solution in PHP: **[725. Split Linked List in Parts](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000725-split-linked-list-in-parts/solution.php)**

```php
<?php
// Definition for singly-linked list.
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
 /**
 * @param ListNode $head
 * @param Integer $k
 * @return ListNode[]
 */
function splitListToParts($head, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $head = new ListNode($arr[0]);
    $current = $head;
    for ($i = 1; $i < count($arr); $i++) {
        $current->next = new ListNode($arr[$i]);
        $current = $current->next;
    }
    return $head;
}

// Helper function to print a linked list
function printList($head) {
    $result = [];
    while ($head !== null) {
        $result[] = $head->val;
        $head = $head->next;
    }
    return $result;
}

// Test case 1
$head = createLinkedList([1, 2, 3]);
$k = 5;
$result = splitListToParts($head, $k);
foreach ($result as $part) {
    print_r(printList($part));
}

// Test case 2
$head = createLinkedList([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
$k = 3;
$result = splitListToParts($head, $k);
foreach ($result as $part) {
    print_r(printList($part));
}
?>
```

### Explanation:

1. **Calculate Length**: We first traverse the linked list to find its length.

2. **Determine Parts**:
   - We calculate `part_size` as `length // k`, which gives the minimum size each part should have.
   - We calculate `extra_nodes` as `length % k`, which gives the number of parts that should have one extra node.

3. **Split the List**: We loop through `k` parts and split the list:
   - For each part, assign `part_size + 1` nodes if it should have an extra node, otherwise just `part_size`.
   - At the end of each part, we break the link to the rest of the list.

4. **Handle Null Parts**: If there are fewer nodes than `k`, the remaining parts will be `null` (empty).

### Test Cases

- **Example 1**:
   ```php
   $head = [1,2,3]; $k = 5;
   Output: [[1],[2],[3],[],[]]
   ```
- **Example 2**:
   ```php
   $head = [1,2,3,4,5,6,7,8,9,10]; $k = 3;
   Output: [[1,2,3,4],[5,6,7],[8,9,10]]
   ```

This solution efficiently splits the linked list into `k` parts with a time complexity of \(O(n + k)\), where `n` is the length of the list.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
