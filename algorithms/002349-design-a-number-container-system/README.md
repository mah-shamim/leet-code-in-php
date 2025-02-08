2349\. Design a Number Container System

**Difficulty:** Medium

**Topics:** `Hash Table`, `Design`, `Heap (Priority Queue)`, `Ordered Set`

Design a number container system that can do the following:

- **Insert** or **Replace** a number at the given index in the system.
- **Return** the smallest index for the given number in the system.

Implement the `NumberContainers` class:

- `NumberContainers()` Initializes the number container system.
- `void change(int index, int number)` Fills the container at `index` with the `number`. If there is already a `number` at that index, replace it.
- `int find(int number)` Returns the smallest index for the given `number`, or `-1` if there is no index that is filled by `number` in the system.


**Example 1:**

- **Input:**
  ["NumberContainers", "find", "change", "change", "change", "change", "find", "change", "find"]
  [[], [10], [2, 10], [1, 10], [3, 10], [5, 10], [10], [1, 20], [10]]
- **Output:** [null, -1, null, null, null, null, 1, null, 2]
- **Explanation:**
  NumberContainers nc = new NumberContainers();
  nc.find(10); // There is no index that is filled with number 10. Therefore, we return -1.
  nc.change(2, 10); // Your container at index 2 will be filled with number 10.
  nc.change(1, 10); // Your container at index 1 will be filled with number 10.
  nc.change(3, 10); // Your container at index 3 will be filled with number 10.
  nc.change(5, 10); // Your container at index 5 will be filled with number 10.
  nc.find(10); // Number 10 is at the indices 1, 2, 3, and 5. Since the smallest index that is filled with 10 is 1, we return 1.
  nc.change(1, 20); // Your container at index 1 will be filled with number 20. Note that index 1 was filled with 10 and then replaced with 20.
  nc.find(10); // Number 10 is at the indices 2, 3, and 5. The smallest index that is filled with 10 is 2. Therefore, we return 2.



**Constraints:**

- <code>1 <= index, number <= 10<sup>9</sup></code>
- At most <code>10<sup>5</sup></code> calls will be made in total to `change` and `find`.


**Hint:**
1. Use a hash table to efficiently map each number to all of its indices in the container and to map each index to their current number.
2. In addition, you can use ordered set to store all of the indices for each number to solve the find method. Do not forget to update the ordered set according to the change method.



**Solution:**

We need to design a number container system that allows efficient insertion or replacement of numbers at specific indices and retrieval of the smallest index for a given number. The solution must handle these operations efficiently even with a large number of indices and numbers.

### Approach
The approach involves using two main data structures:
1. **Hash Map (Associative Array) for Index to Number Mapping**: This helps in quickly determining the current number at any given index.
2. **Min-Heap for Number to Indices Mapping**: This allows efficient retrieval of the smallest index for a given number. Each number maps to a min-heap that stores all indices where the number is currently located, ensuring that the smallest index can be retrieved in O(1) time.

**Steps:**
1. **Initialization**: Create two hash maps. One to store the current number at each index and another to map each number to a min-heap of indices.
2. **Change Operation**: When inserting or replacing a number at an index:
   - Check if the index already has a number. If it does, update the index to the new number.
   - Add the index to the min-heap corresponding to the new number.
3. **Find Operation**: For retrieving the smallest index for a given number:
   - Check if the number exists in the hash map. If not, return -1.
   - Continuously check the top of the min-heap for the number, removing any invalid indices (indices that no longer hold the number) until a valid index is found or the heap is empty.

Let's implement this solution in PHP: **[2349. Design a Number Container System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002349-design-a-number-container-system/solution.php)**

```php
<?php
class NumberContainers {
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
     * @param Integer $index
     * @param Integer $number
     * @return NULL
     */
    function change($index, $number) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $number
     * @return Integer
     */
    function find($number) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage:
$nc = new NumberContainers();
echo $nc->find(10) . "\n"; // Output: -1
$nc->change(2, 10);
$nc->change(1, 10);
$nc->change(3, 10);
$nc->change(5, 10);
echo $nc->find(10) . "\n"; // Output: 1
$nc->change(1, 20);
echo $nc->find(10) . "\n"; // Output: 2
?>
```

### Explanation:

- **Initialization**: The constructor initializes two associative arrays to keep track of the current number at each index and the min-heap for each number.
- **Change Operation**: The `change` method updates the index with the new number. If the index previously held another number, it is automatically handled by checking and updating the hash map. The index is then added to the new number's min-heap.
- **Find Operation**: The `find` method retrieves the smallest index for a given number by checking the top of the corresponding min-heap. If the index at the top is invalid (no longer holds the number), it is removed from the heap, and the next smallest index is checked until a valid one is found or the heap is empty.

This approach ensures efficient handling of both operations, with the change operation in O(log n) time (due to heap insertion) and the find operation efficiently removing invalid indices in O(log n) time for each removal, ensuring optimal performance for large datasets.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**