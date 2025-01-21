1769\. Minimum Number of Operations to Move All Balls to Each Box

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Prefix Sum`

You have `n` boxes. You are given a binary string `boxes` of length `n`, where `boxes[i]` is `'0'` if the <code>i<sup>th</sup></code> box is **empty**, and `'1'` if it contains **one** ball.

In one operation, you can move **one** ball from a box to an adjacent box. Box `i` is adjacent to box `j` if `abs(i - j) == 1`. Note that after doing so, there may be more than one ball in some boxes.

Return _an array `answer` of size `n`, where `answer[i]` is the **minimum** number of operations needed to move all the balls to the <code>i<sup>th</sup></code> box_.

Each `answer[i]` is calculated considering the initial state of the boxes.

**Example 1:**

- **Input:** boxes = "110"
- **Output:** [1,1,3]
- **Explanation:** The answer for each box is as follows:
  1) First box: you will have to move one ball from the second box to the first box in one operation.
  2) Second box: you will have to move one ball from the first box to the second box in one operation.
  3) Third box: you will have to move one ball from the first box to the third box in two operations, and move one ball from the second box to the third box in one operation.

**Example 2:**

- **Input:** boxes = "001011"
- **Output:** [11,8,5,4,3,4]



**Constraints:**

- `n == boxes.length`
- `1 <= n <= 2000`
- `boxes[i]` is either `'0'` or `'1'`.


**Hint:**
1. If you want to move a ball from box `i` to box `j`, you'll need `abs(i-j)` moves.
2. To move all balls to some box, you can move them one by one.
3. For each box `i`, iterate on each ball in a box `j`, and add `abs(i-j)` to `answers[i]`.



**Solution:**

We can use a **prefix sum** approach that allows us to calculate the minimum number of operations needed to move all balls to each box without explicitly simulating each operation.

### Key Observations:
1. The number of moves required to move a ball from box `i` to box `j` is simply `abs(i - j)`.
2. We can calculate the total number of moves to move all balls to a particular box by leveraging the positions of the balls and a running total of operations.
3. By calculating moves from left to right and right to left, we can determine the result in two passes.

### Approach:
1. **Left-to-Right Pass**: In this pass, calculate the number of moves to bring all balls to the current box starting from the left.
2. **Right-to-Left Pass**: In this pass, calculate the number of moves to bring all balls to the current box starting from the right.
3. Combine the results of both passes to get the final result for each box.

### Solution Steps:
1. Start by iterating through the `boxes` string and counting how many balls are to the left and to the right of each box.
2. During the iteration, calculate the number of moves required to bring all balls to the current box using both the left and right information.

Let's implement this solution in PHP: **[1769. Minimum Number of Operations to Move All Balls to Each Box](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001769-minimum-number-of-operations-to-move-all-balls-to-each-box/solution.php)**

```php
<?php
/**
 * @param String $boxes
 * @return Integer[]
 */
function minOperations($boxes) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$boxes = "110";
print_r(minOperations($boxes)); // Output: [1,1,3]

$boxes = "001011";
print_r(minOperations($boxes)); // Output: [11,8,5,4,3,4]
?>
```

### Explanation:

1. **Left-to-right pass**: We calculate the total number of operations required to bring all balls from the left side to the current box. For each ball found (`'1'`), we update the total number of moves.
2. **Right-to-left pass**: Similar to the left-to-right pass, but we calculate the number of operations to move balls from the right side to the current box.
3. The total number of operations for each box is the sum of moves from the left and right passes.

### Example Walkthrough:

#### Example 1:
```php
$boxes = "110";
print_r(minOperations($boxes));
```
**Output**:
```
Array
(
    [0] => 1
    [1] => 1
    [2] => 3
)
```

#### Example 2:
```php
$boxes = "001011";
print_r(minOperations($boxes));
```
**Output**:
```
Array
(
    [0] => 11
    [1] => 8
    [2] => 5
    [3] => 4
    [4] => 3
    [5] => 4
)
```

### Time Complexity:
- The solution runs in `O(n)` time because we iterate over the `boxes` string twice (once for the left-to-right pass and once for the right-to-left pass).
- The space complexity is `O(n)` because we store the `answer` array to hold the results.

This solution efficiently computes the minimum number of operations for each box using the prefix sum technique.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
