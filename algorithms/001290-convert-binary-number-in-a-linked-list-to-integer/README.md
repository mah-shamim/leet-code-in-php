1290\. Convert Binary Number in a Linked List to Integer

**Difficulty:** Easy

**Topics:** `Linked List`, `Math`

Given `head` which is a reference node to a singly-linked list. The value of each node in the linked list is either `0` or `1`. The linked list holds the binary representation of a number.

Return the _decimal value_ of the number in the linked list.

The **most significant bit** is at the head of the linked list.

**Example 1:**

![graph-1](https://assets.leetcode.com/uploads/2019/12/05/graph-1.png)

- **Input:** head = [1,0,1]
- **Output:** 5
- **Explanation:** (101) in base 2 = (5) in base 10

**Example 2:**

- **Input:** head = [0]
- **Output:** 0

**Constraints:**

- The Linked List is not empty.
- Number of nodes will not exceed `30`.
- Each node's value is either `0` or `1`.


**Hint:**
1. Traverse the linked list and store all values in a string or array. convert the values obtained to decimal value.
2. You can solve the problem in O(1) memory using bits operation. use shift left operation ( << ) and or operation ( | ) to get the decimal value in one operation.






**Solution:**

We need to convert a binary number represented as a singly-linked list into its decimal equivalent. Each node in the linked list contains a bit (0 or 1), with the head node being the most significant bit. The solution involves traversing the linked list and efficiently computing the decimal value using bit manipulation.

### Approach
1. **Problem Analysis**: The linked list represents a binary number where each node is a bit. The head is the most significant bit, and subsequent nodes follow in decreasing order of significance. The task is to convert this binary number into a decimal integer.
2. **Intuition**: As we traverse the linked list from the head to the tail, each new bit encountered is the next least significant bit of the binary number. For each bit, we can left-shift the current result by one position (equivalent to multiplying by 2) and then use a bitwise OR (or simply add) the current bit to update the result.
3. **Algorithm Selection**: We use a single pass through the linked list. For each node:
    - Left-shift the current result by 1 bit (i.e., multiply by 2).
    - Add the current node's value (0 or 1) to the result.
4. **Complexity Analysis**: The algorithm runs in O(n) time, where n is the number of nodes in the linked list, as it processes each node exactly once. The space complexity is O(1) since we only use a few variables for computation.

Let's implement this solution in PHP: **[1290. Convert Binary Number in a Linked List to Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001290-convert-binary-number-in-a-linked-list-to-integer/solution.php)**

```php
<?php
// Definition for a singly-linked list node
class ListNode {
    public $val = 0;
    public $next = null;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * Main function to convert binary linked list to integer
 * 
 * @param ListNode $head
 * @return Integer
 */
function getDecimalValue($head) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// ---------- Example Usage ----------

/**
 * Helper function to create linked list from array
 * 
 * @param $arr
 * @return mixed|null
 */
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;

    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }

    return $dummy->next;
}

// Example 1
$head = createLinkedList([1, 0, 1]);
echo getDecimalValue($head); // Output: 5

// Example 2
$head = createLinkedList([0]);
echo getDecimalValue($head); // Output: 0
?>
```

### Explanation:

1. **Initialization**: Start with `num` set to 0. This variable will hold the computed decimal value.
2. **Traversal**: Traverse the linked list starting from the head node. For each node:
    - **Left-shift `num` by 1 bit**: This operation effectively multiplies `num` by 2, making room for the next bit.
    - **Bitwise OR with current bit**: Incorporate the current node's value (0 or 1) into `num` using a bitwise OR operation. This is equivalent to adding the bit to the least significant position of `num`.
3. **Termination**: Once all nodes are processed, `num` contains the decimal equivalent of the binary number represented by the linked list.

This approach efficiently computes the decimal value in linear time with constant space, leveraging bit manipulation for optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**