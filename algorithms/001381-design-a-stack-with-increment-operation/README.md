1381\. Design a Stack With Increment Operation

**Difficulty:** Medium

**Topics:** `Array`, `Stack`, `Design`

Design a stack that supports increment operations on its elements.

Implement the `CustomStack` class:

- `CustomStack(int maxSize)` Initializes the object with `maxSize` which is the maximum number of elements in the stack.
- `void push(int x)` Adds `x` to the top of the stack if the stack has not reached the `maxSize`.
- `int pop()` Pops and returns _the top of the stack or `-1` if the stack is empty_.
- `void inc(int k, int val)` Increments the bottom `k` elements of the stack by `val`. If there are less than `k` elements in the stack, increment all the elements in the stack.


**Example 1:**

- **Input:**
```
  ["CustomStack","push","push","pop","push","push","push","increment","increment","pop","pop","pop","pop"]
  [[3],[1],[2],[],[2],[3],[4],[5,100],[2,100],[],[],[],[]]
  
```
- **Output:**
```
  [null,null,null,2,null,null,null,null,null,103,202,201,-1]
  
```
- **Explanation:**
```
   CustomStack stk = new CustomStack(3); // Stack is Empty []
   stk.push(1);                          // stack becomes [1]
   stk.push(2);                          // stack becomes [1, 2]
   stk.pop();                            // return 2 --> Return top of the stack 2, stack becomes [1]
   stk.push(2);                          // stack becomes [1, 2]
   stk.push(3);                          // stack becomes [1, 2, 3]
   stk.push(4);                          // stack still [1, 2, 3], Do not add another elements as size is 4
   stk.increment(5, 100);                // stack becomes [101, 102, 103]
   stk.increment(2, 100);                // stack becomes [201, 202, 103]
   stk.pop();                            // return 103 --> Return top of the stack 103, stack becomes [201, 202]
   stk.pop();                            // return 202 --> Return top of the stack 202, stack becomes [201]
   stk.pop();                            // return 201 --> Return top of the stack 201, stack becomes []
   stk.pop();                            // return -1 --> Stack is empty return -1.
  
```

**Constraints:**

- `1 <= maxSize, x, k <= 1000`
- `0 <= val <= 100`
- At most `1000` calls will be made to each method of `increment`, `push` and `pop` each separately.

**Hint:**
1. Use an array to represent the stack. Push will add new integer to the array. Pop removes the last element in the array and increment will add val to the first k elements of the array.
2. This solution run in O(1) per push and pop and O(k) per increment.



**Solution:**

We can follow a typical stack implementation but with an additional method that allows incrementing the bottom `k` elements by a given value. The increment operation will iterate through the first `k` elements of the stack and add the value to each.

We'll implement this stack in PHP 5.6, using an array to represent the stack. The core operations are:

1. **push(x)**: Adds the element `x` to the top of the stack, if the stack has not reached its `maxSize`.
2. **pop()**: Removes the top element of the stack and returns it. If the stack is empty, return `-1`.
3. **increment(k, val)**: Adds the value `val` to the first `k` elements in the stack, or to all the elements if the stack contains fewer than `k` elements.

Let's implement this solution in PHP: **[1381. Design a Stack With Increment Operation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001381-design-a-stack-with-increment-operation/solution.php)**

```php
<?php
class CustomStack {
    /**
     * @var array
     */
    private $stack;
    /**
     * @var int
     */
    private $maxSize;
    /**
     * Constructor to initialize the stack with a given maxSize
     *
     * @param Integer $maxSize
     */
    function __construct($maxSize) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * Push an element to the stack if it has not reached the maxSize
     *
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * Pop the top element from the stack and return it, return -1 if the stack is empty
     *
     * @return Integer
     */
    function pop() {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * Increment the bottom k elements of the stack by val
     *
     * @param Integer $k
     * @param Integer $val
     * @return NULL
     */
    function increment($k, $val) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

/**
 * Your CustomStack object will be instantiated and called as such:
 * $obj = CustomStack($maxSize);
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $obj->increment($k, $val);
 */
 
// Example usage
$customStack = new CustomStack(3);  // Stack is Empty []
$customStack->push(1);              // stack becomes [1]
$customStack->push(2);              // stack becomes [1, 2]
echo $customStack->pop() . "\n";    // return 2, stack becomes [1]
$customStack->push(2);              // stack becomes [1, 2]
$customStack->push(3);              // stack becomes [1, 2, 3]
$customStack->push(4);              // stack still [1, 2, 3], maxSize is 3
$customStack->increment(5, 100);    // stack becomes [101, 102, 103]
$customStack->increment(2, 100);    // stack becomes [201, 202, 103]
echo $customStack->pop() . "\n";    // return 103, stack becomes [201, 202]
echo $customStack->pop() . "\n";    // return 202, stack becomes [201]
echo $customStack->pop() . "\n";    // return 201, stack becomes []
echo $customStack->pop() . "\n";    // return -1, stack is empty
?>
```

### Explanation:

1. **push($x)**:
    - We use `array_push` to add elements to the stack. We check if the current size of the stack is less than `maxSize`. If it is, we push the new element.

2. **pop()**:
    - We check if the stack is empty using `empty($this->stack)`. If it's not empty, we pop the top element using `array_pop` and return it. If it's empty, we return `-1`.

3. **increment($k, $val)**:
    - We calculate the minimum of `k` and the current stack size to determine how many elements to increment. We then loop over these elements, adding `val` to each.

### Example Execution:

For the input operations:

```php
["CustomStack","push","push","pop","push","push","push","increment","increment","pop","pop","pop","pop"]
[[3],[1],[2],[],[2],[3],[4],[5,100],[2,100],[],[],[],[]]
```

The output will be:

```
[null, null, null, 2, null, null, null, null, null, 103, 202, 201, -1]
```

This output is based on the following:

- **push(1)**: Stack becomes `[1]`
- **push(2)**: Stack becomes `[1, 2]`
- **pop()**: Returns `2`, stack becomes `[1]`
- **push(2)**: Stack becomes `[1, 2]`
- **push(3)**: Stack becomes `[1, 2, 3]`
- **push(4)**: Stack remains `[1, 2, 3]` (maxSize reached)
- **increment(5, 100)**: Stack becomes `[101, 102, 103]`
- **increment(2, 100)**: Stack becomes `[201, 202, 103]`
- **pop()**: Returns `103`, stack becomes `[201, 202]`
- **pop()**: Returns `202`, stack becomes `[201]`
- **pop()**: Returns `201`, stack becomes `[]`
- **pop()**: Returns `-1` (stack is empty)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
