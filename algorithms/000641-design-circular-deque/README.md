641\. Design Circular Deque

**Difficulty:** Medium

**Topics:** `Array`, `Linked List`, `Design`, `Queue`

Design your implementation of the circular double-ended queue (deque).

Implement the `MyCircularDeque` class:

- `MyCircularDeque(int k)` Initializes the deque with a maximum size of `k`.
- `boolean insertFront()` Adds an item at the front of Deque. Returns `true` if the operation is successful, or `false` otherwise.
- `boolean insertLast()` Adds an item at the rear of Deque. Returns `true` if the operation is successful, or `false` otherwise.
- `boolean deleteFront()` Deletes an item from the front of Deque. Returns `true` if the operation is successful, or `false` otherwise.
- `boolean deleteLast()` Deletes an item from the rear of Deque. Returns `true` if the operation is successful, or `false` otherwise.
- `int getFront()` Returns the front item from the Deque. Returns `-1` if the deque is empty.
- `int getRear()` Returns the last item from Deque. Returns `-1` if the deque is empty.
- `boolean isEmpty()` Returns `true` if the deque is empty, or `false` otherwise.
- `boolean isFull()` Returns `true` if the deque is full, or `false` otherwise.

**Example 1:**

- **Input:**\
  ["MyCircularDeque", "insertLast", "insertLast", "insertFront", "insertFront", "getRear", "isFull", "deleteLast", "insertFront", "getFront"]\
  [[3], [1], [2], [3], [4], [], [], [], [4], []]
- **Output:** [null, true, true, true, false, 2, true, true, true, 4]
- **Explanation:**\
  MyCircularDeque myCircularDeque = new MyCircularDeque(3);\
  myCircularDeque.insertLast(1);  // return True\
  myCircularDeque.insertLast(2);  // return True\
  myCircularDeque.insertFront(3); // return True\
  myCircularDeque.insertFront(4); // return False, the queue is full.\
  myCircularDeque.getRear();      // return 2\
  myCircularDeque.isFull();       // return True\
  myCircularDeque.deleteLast();   // return True\
  myCircularDeque.insertFront(4); // return True\
  myCircularDeque.getFront();     // return 4


**Constraints:**

- `1 <= k <= 1000`
- `0 <= value <= 1000`
- At most `2000` calls will be made to `insertFront`, `insertLast`, `deleteFront`, `deleteLast`, `getFront`, `getRear`, `isEmpty`, `isFull`.


**Solution:**

We can use an array to represent the deque structure. We'll maintain a `head` and `tail` pointer that will help us track the front and rear of the deque, wrapping around when necessary to achieve the circular behavior.

Let's implement this solution in PHP: **[641. Design Circular Deque](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000641-design-circular-deque/solution.php)**

Here's a step-by-step solution for the `MyCircularDeque` class:

```php
<?php
class MyCircularDeque {
    /**
     * @var array
     */
    private $deque;
    /**
     * @var int
     */
    private $maxSize;
    /**
     * @var int
     */
    private $front;
    /**
     * @var int
     */
    private $rear;
    /**
     * @var int
     */
    private $size;

    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     *
     * @param Integer $k
     */
    function __construct($k) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     *
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     *
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     *
     * @return Boolean
     */
    function deleteFront() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     *
     * @return Boolean
     */
    function deleteLast() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Get the front item from the deque. If the deque is empty, return -1.
     *
     * @return Integer
     */
    function getFront() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Get the last item from the deque. If the deque is empty, return -1.
     *
     * @return Integer
     */
    function getRear() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Checks whether the deque is empty or not.
     *
     * @return Boolean
     */
    function isEmpty() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Checks whether the deque is full or not.
     * 
     * @return Boolean
     */
    function isFull() {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */

?>
```

### Explanation:

1. **Initialization**:
   - We initialize the deque using an array of size `k` and set all values to `-1` initially.
   - The `front` and `rear` pointers are initialized to `0`.
   - `size` keeps track of the current number of elements in the deque.

2. **insertFront($value)**:
   - Check if the deque is full using `isFull()`.
   - If not, decrement the `front` pointer (with circular wrap-around using modulo).
   - Place the value at the new `front` and increment the `size`.

3. **insertLast($value)**:
   - Check if the deque is full.
   - If not, place the value at the `rear` and move the `rear` pointer forward (again using modulo for wrap-around).
   - Increment the `size`.

4. **deleteFront()**:
   - Check if the deque is empty using `isEmpty()`.
   - If not, increment the `front` pointer (circular wrap-around) and decrement the `size`.

5. **deleteLast()**:
   - Check if the deque is empty.
   - If not, decrement the `rear` pointer and reduce the `size`.

6. **getFront()**:
   - If the deque is empty, return `-1`.
   - Otherwise, return the element at the `front` pointer.

7. **getRear()**:
   - If the deque is empty, return `-1`.
   - Otherwise, return the element before the current `rear` pointer (since `rear` points to the next available position).

8. **isEmpty()**:
   - Returns `true` if the deque is empty (`size` is `0`).

9. **isFull()**:
   - Returns `true` if the deque is full (`size` equals `maxSize`).

### Example Walkthrough

```php
$myCircularDeque = new MyCircularDeque(3);  // Initialize deque with size 3

$myCircularDeque->insertLast(1);  // return true
$myCircularDeque->insertLast(2);  // return true
$myCircularDeque->insertFront(3); // return true
$myCircularDeque->insertFront(4); // return false, deque is full
echo $myCircularDeque->getRear(); // return 2
echo $myCircularDeque->isFull();  // return true
$myCircularDeque->deleteLast();   // return true
$myCircularDeque->insertFront(4); // return true
echo $myCircularDeque->getFront(); // return 4
```

### Time Complexity:
- Each operation (`insertFront`, `insertLast`, `deleteFront`, `deleteLast`, `getFront`, `getRear`, `isEmpty`, `isFull`) runs in **O(1)** time since they all involve constant-time array operations and pointer manipulations.

### Space Complexity:
- The space complexity is **O(k)**, where `k` is the size of the deque. We allocate space for `k` elements in the deque array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**