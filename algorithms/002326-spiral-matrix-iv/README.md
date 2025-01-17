2326\. Spiral Matrix IV

**Difficulty:** Medium

**Topics:** `Array`, `Linked List`, `Matrix`, `Simulation`

You are given two integers `m` and `n`, which represent the dimensions of a matrix.

You are also given the `head` of a linked list of integers.

Generate an `m x n` matrix that contains the integers in the linked list presented in **spiral** order (**clockwise**), starting from the **top-left** of the matrix. If there are remaining empty spaces, fill them with `-1`.

Return _the generated matrix_.

**Example 1:**

![ex1new](https://assets.leetcode.com/uploads/2022/05/09/ex1new.jpg)

- **Input:** m = 3, n = 5, head = [3,0,2,6,8,1,7,9,4,2,5,5,0]
- **Output:** [[3,0,2,6,8],[5,0,-1,-1,1],[5,2,4,9,7]]
- **Explanation:** The diagram above shows how the values are printed in the matrix.\
  Note that the remaining spaces in the matrix are filled with -1.

**Example 2:**

![ex2](https://assets.leetcode.com/uploads/2022/05/11/ex2.jpg)

- **Input:** m = 1, n = 4, head = [0,1,2]
- **Output:** [[0,1,2,-1]]
- **Explanation:** The diagram above shows how the values are printed from left to right in the matrix.\
  The last space in the matrix is set to -1.


**Example 3:**

- **Input:** cost = [[2, 5, 1], [3, 4, 7], [8, 1, 2], [6, 2, 4], [3, 8, 8]]
- **Output:** 10



**Constraints:**

- <code>1 <= m, n <= 10<sup>5</sup></code>
- <code>1 <= m, n <= 10<sup>5</sup></code>
- The number of nodes in the list is in the range `[1, m * n]`.
- <code>0 <= Node.val <= 1000</code>


**Hint:**
1. First, generate an m x n matrix filled with -1s.
2. Navigate within the matrix at (i, j) with the help of a direction vector ⟨di, dj⟩. At (i, j), you need to decide if you can keep going in the current direction.
3. If you cannot keep going, rotate the direction vector clockwise by 90 degrees.



**Solution:**

We will simulate a spiral traversal of an `m x n` matrix, filling it with values from a linked list. The remaining positions that don't have corresponding linked list values will be filled with `-1`.

Here's how the solution is structured:

1. **Matrix Initialization**: We first create an `m x n` matrix initialized with `-1`.
2. **Direction Vectors**: The spiral movement can be controlled using a direction vector that cycles through the right, down, left, and up directions. This ensures that we are traversing the matrix in a spiral manner.
3. **Linked List Iteration**: We traverse through the linked list, placing values in the matrix in spiral order.
4. **Boundary Handling**: We check if we've reached the boundary or encountered an already filled cell. If so, we change direction (clockwise).

Let's implement this solution in PHP: **[2326. Spiral Matrix IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002326-spiral-matrix-iv/solution.php)**

```php
<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
/**
 * @param Integer $m
 * @param Integer $n
 * @param ListNode $head
 * @return Integer[][]
 */
function spiralMatrix($m, $n, $head) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to print the matrix (for debugging)
function printMatrix($matrix) {
    foreach ($matrix as $row) {
        echo implode(" ", $row) . "\n";
    }
}

// Example usage:
// Create the linked list: [3,0,2,6,8,1,7,9,4,2,5,5,0]
$head = new ListNode(3);
$head->next = new ListNode(0);
$head->next->next = new ListNode(2);
$head->next->next->next = new ListNode(6);
$head->next->next->next->next = new ListNode(8);
$head->next->next->next->next->next = new ListNode(1);
$head->next->next->next->next->next->next = new ListNode(7);
$head->next->next->next->next->next->next->next = new ListNode(9);
$head->next->next->next->next->next->next->next->next = new ListNode(4);
$head->next->next->next->next->next->next->next->next->next = new ListNode(2);
$head->next->next->next->next->next->next->next->next->next->next = new ListNode(5);
$head->next->next->next->next->next->next->next->next->next->next->next = new ListNode(5);
$head->next->next->next->next->next->next->next->next->next->next->next->next = new ListNode(0);

$m = 3;
$n = 5;

$matrix = spiralMatrix($m, $n, $head);
printMatrix($matrix);
?>
```

### Explanation:

1. **Matrix Initialization**: The matrix is initialized with `-1` so that any unfilled spaces will remain `-1` by default.

2. **Spiral Movement**:
   - The direction vector `dirs` manages movement in four directions: right, down, left, and up.
   - The index `dirIndex` keeps track of the current direction. After moving in one direction, we calculate the next position and check if it's valid. If not, we change the direction.

3. **Linked List Traversal**:
   - We traverse through the linked list nodes, placing values in the matrix one by one, following the spiral order.

4. **Boundary and Direction Change**:
   - When we encounter an invalid position (out of bounds or already filled), we rotate the direction by 90 degrees (i.e., change the direction vector).

### Time Complexity:

- Filling the matrix takes O(m \* n) because we are traversing every cell once. Hence, the time complexity is O(m \* n), which is efficient given the constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
