432\. All O`one Data Structure

**Difficulty:** Hard

**Topics:** `Hash Table`, `Linked List`, `Design`, `Doubly-Linked List`

Design a data structure to store the strings' count with the ability to return the strings with minimum and maximum counts.

Implement the `AllOne` class:

- `AllOne()` Initializes the object of the data structure.
- `inc(String key)` Increments the count of the string `key` by `1`. If `key` does not exist in the data structure, insert it with count `1`.
- `dec(String key)` Decrements the count of the string `key` by `1`. If the count of `key` is `0` after the decrement, remove it from the data structure. It is guaranteed that `key` exists in the data structure before the decrement.
- `getMaxKey()` Returns one of the keys with the maximal count. If no element exists, return an empty string `""`.
- `getMinKey()` Returns one of the keys with the minimum count. If no element exists, return an empty string `""`.

**Note** that each function must run in `O(1)` average time complexity.

**Example 1:**

- **Input:**\
  ["AllOne", "inc", "inc", "getMaxKey", "getMinKey", "inc", "getMaxKey", "getMinKey"]\
  [[], ["hello"], ["hello"], [], [], ["leet"], [], []]
- **Output:** [null, null, null, "hello", "hello", null, "hello", "leet"]
- **Explanation:**\
  AllOne allOne = new AllOne();\
  allOne.inc("hello");\
  allOne.inc("hello");\
  allOne.getMaxKey(); // return "hello"\
  allOne.getMinKey(); // return "hello"\
  allOne.inc("leet");\
  allOne.getMaxKey(); // return "hello"\
  allOne.getMinKey(); // return "leet"


**Constraints:**

- `1 <= key.length <= 10`
- `key` consists of lowercase English letters.
- It is guaranteed that for each call to `dec`, `key` is existing in the data structure.
- At most <code>5 * 10<sup>4</sup></code> calls will be made to `inc`, `dec`, `getMaxKey`, and `getMinKey`.



**Solution:**

We need to implement a data structure that allows incrementing, decrementing, and retrieving keys with the minimum and maximum counts in constant time (`O(1)`).

### Key Insights:
1. **Hash Table (for String Count)**:
   We need a hash table (`counts`) that maps each string (`key`) to its count. This allows for `O(1)` access when incrementing or decrementing the count.

2. **Doubly Linked List (for Counts)**:
   To keep track of the minimum and maximum counts, we can use a doubly linked list where each node represents a unique count. The node will store all strings with that count in a set. The linked list will help in retrieving the min and max counts in constant time by keeping track of the head (min) and tail (max) nodes.

3. **Two Hash Maps**:
   - A hash map (`key_to_node`) will map each string (`key`) to the node in the doubly linked list that stores its count. This allows us to move the key from one count node to another in `O(1)` time when we increment or decrement the count.
   - Another hash map (`counts`) will map each count to its corresponding node in the doubly linked list, ensuring we can locate the node for any count in `O(1)` time.

### Plan:
- **inc(key)**:
   - If the key exists, increase its count by 1 and move it to the next node (create a new node if necessary).
   - If the key does not exist, create a new node with count 1 and insert it.

- **dec(key)**:
   - Decrease the count of the key by 1.
   - If the count becomes zero, remove the key from the data structure.

- **getMaxKey()** and **getMinKey()**:
   - Return the first key from the tail node (max count) or head node (min count) in constant time.

Let's implement this solution in PHP: **[432. All O`one Data Structure](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000432-all-oone-data-structure/solution.php)**

```php
<?php
class Node {
    /**
     * @var
     */
    public $count;
    /**
     * @var array
     */
    public $keys;
    /**
     * @var null
     */
    public $prev;
    /**
     * @var null
     */
    public $next;

    /**
     * @param $count
     */
    public function __construct($count) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

class AllOne {
    /**
     * @var array
     */
    private $key_to_node;
    /**
     * @var array
     */
    private $counts;
    /**
     * @var Node
     */
    private $head;
    /**
     * @var Node
     */
    private $tail;

    /**
     */
    function __construct() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Insert a new node after a given node
     *
     * @param $newNode
     * @param $prevNode
     * @return void
     */
    private function insertAfter($newNode, $prevNode) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Remove a node from the linked list
     *
     * @param $node
     * @return void
     */
    private function removeNode($node) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Increments the count of a key
     *
     * @param String $key
     * @return NULL
     */
    function inc($key) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Decrements the count of a key
     *
     * @param String $key
     * @return NULL
     */
    function dec($key) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Returns one of the keys with the maximum count
     *
     * @return String
     */
    function getMaxKey() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Returns one of the keys with the minimum count
     *
     * @return String
     */
    function getMinKey() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your AllOne object will be instantiated and called as such:
 * $obj = AllOne();
 * $obj->inc($key);
 * $obj->dec($key);
 * $ret_3 = $obj->getMaxKey();
 * $ret_4 = $obj->getMinKey();
 */
 
// Example usage
$allOne = new AllOne();
$allOne->inc("hello");
$allOne->inc("hello");
echo $allOne->getMaxKey(); // returns "hello"
echo $allOne->getMinKey(); // returns "hello"
$allOne->inc("leet");
echo $allOne->getMaxKey(); // returns "hello"
echo $allOne->getMinKey(); // returns "leet"
?>
```

### Explanation:

1. **Data Structure**:
   - `key_to_node`: Maps each key to the corresponding node in the doubly linked list.
   - `counts`: Maps each count to its corresponding node in the doubly linked list.
   - `head` and `tail`: Dummy head and tail nodes for easier manipulation of the doubly linked list.

2. **Methods**:
   - `inc($key)`: If the key exists, it increments its count and moves it to the appropriate node in the list. If not, it inserts it with count 1.
   - `dec($key)`: Decreases the key’s count and either removes it or moves it to the appropriate node.
   - `getMaxKey()`: Returns the key from the node at the tail of the doubly linked list (max count).
   - `getMinKey()`: Returns the key from the node at the head of the doubly linked list (min count).

### Complexity:
- All operations are designed to run in `O(1)` average time complexity.

Let me know if you need further clarifications!

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**