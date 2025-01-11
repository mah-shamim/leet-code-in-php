1861\. Rotating the Box

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Matrix`

You are given an `m x n` matrix of characters `box` representing a side-view of a box. Each cell of the box is one of the following:

- A stone `'#'`
- A stationary obstacle `'*'`
- Empty `'.'`

The box is rotated **90 degrees clockwise**, causing some of the stones to fall due to gravity. Each stone falls down until it lands on an obstacle, another stone, or the bottom of the box. Gravity **does not** affect the obstacles' positions, and the inertia from the box's rotation **does not** affect the stones' horizontal positions.

It is **guaranteed** that each stone in `box` rests on an obstacle, another stone, or the bottom of the box.

Return _an `n x m` matrix representing the box after the rotation described above_.


**Example 1:**

![rotatingtheboxleetcodewithstones](https://assets.leetcode.com/uploads/2021/04/08/rotatingtheboxleetcodewithstones.png)

- **Input:** box = [["#",".","#"]]
- **Output:** [["."], ["#"], ["#"]]

**Example 2:**

![rotatingtheboxleetcode2withstones](https://assets.leetcode.com/uploads/2021/04/08/rotatingtheboxleetcode2withstones.png)

- **Input:** box = [["#",".","*","."], ["#","#","*","."]]
- **Output:** [["#","."], ["#","#"], ["*","*"], [".","."]]


**Example 3:**

![rotatingtheboxleetcode3withstone](https://assets.leetcode.com/uploads/2021/04/08/rotatingtheboxleetcode3withstone.png)

- **Input:** box = [["#","#","*",".","*","."], ["#","#","#","*",".","."], ["#","#","#",".","#","."]]
- **Output:** [[".","#","#"], [".","#","#"], ["#","#","*"], ["#","*","."], ["#",".","*"], ["#",".","."]]



**Constraints:**

- `m == box.length`
- `n == box[i].length`
- `1 <= m, n <= 500`
- `box[i][j]` is either `'#'`, `'*'`, or `'.'`.


**Hint:**
1. Rotate the box using the relation `rotatedBox[i][j] = box[m - 1 - j][i]`.
2. Start iterating from the bottom of the box and for each empty cell check if there is any stone above it with no obstacles between them.



**Solution:**

We need to follow a few distinct steps:

1. **Rotate the box**: We first rotate the matrix 90 degrees clockwise. The rotated matrix will have `n` rows and `m` columns, where `n` is the number of columns in the original box, and `m` is the number of rows.

2. **Gravity effect**: After rotating, we need to simulate the effect of gravity. This means that all stones (`'#'`) should "fall" to the bottom of their new column, stopping only when they encounter an obstacle (`'*'`) or another stone (`'#'`).

### Approach:

1. **Rotation**: After the rotation, the element at position `[i][j]` in the original matrix will be placed at position `[j][m-1-i]` in the rotated matrix.

2. **Gravity simulation**: We need to process each column from bottom to top. If there is a stone (`'#'`), it will fall down until it reaches an obstacle or the bottom. If the cell is empty (`'.'`), it can hold a stone.

### Step-by-step explanation:

1. **Create a new matrix for the rotated box**.
2. **Iterate through each column of the rotated matrix (after rotation)**.
3. **Simulate gravity for each column** by starting from the bottom and moving upwards. Place stones (`'#'`) as far down as possible, leaving obstacles (`'*'`) in place.
4. **Return the final rotated matrix**.

Let's implement this solution in PHP: **[1861. Rotating the Box](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001861-rotating-the-box/solution.php)**

```php
<?php
function rotateTheBox($box) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$box = [
    ["#", ".", "#"],
];
print_r(rotateTheBox($box));

$box = [
    ["#", ".", "*", "."],
    ["#", "#", "*", "."],
];
print_r(rotateTheBox($box));

$box = [
    ["#", "#", "*", ".", "*", "."],
    ["#", "#", "#", "*", ".", "."],
    ["#", "#", "#", ".", "#", "."],
];
print_r(rotateTheBox($box));
?>
```

### Explanation:

1. **Simulate Gravity**:
   - Traverse each row from right to left. Use a pointer (`emptySlot`) to track where the next stone should fall.
   - If a stone (`#`) is encountered, move it to the `emptySlot`, and then decrement `emptySlot`.
   - If an obstacle (`*`) is encountered, reset `emptySlot` to the position just before the obstacle.

2. **Rotate the Matrix**:
   - Create a new matrix where the element at `[i][j]` in the rotated box is taken from `[m - 1 - j][i]` of the original box.

### Example Output

#### Input:
```php
$box = [
    ["#", ".", "#"],
];
```
#### Output:
```php
[
    [".",],
    ["#",],
    ["#",],
]
```

#### Input:
```php
$box = [
    ["#", ".", "*", "."],
    ["#", "#", "*", "."],
];
```
#### Output:
```php
[
    ["#", "."],
    ["#", "#"],
    ["*", "*"],
    [".", "."],
]
```

### Time Complexity
1. Gravity simulation: _**O(m x n)**_, as we iterate through each element in the matrix.
2. Rotation: _**O(m x n)**_, as we create the rotated matrix.

**Total**: _**O(m x n)**_.

### Space Complexity
- _**O(m x n)**_ for the rotated matrix.

This solution is efficient and adheres to the constraints of the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**