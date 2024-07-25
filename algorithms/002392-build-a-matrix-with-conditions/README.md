2392\. Build a Matrix With Conditions

Hard

You are given a **positive** integer `k`. You are also given:

- a 2D integer array `rowConditions` of size `n` where <code>rowConditions[i] = [above<sub>i</sub>, below<sub>i</sub>]</code>, and
- a 2D integer array `colConditions` of size `m` where <code>colConditions[i] = [left<sub>i</sub>, right<sub>i</sub>]</code>.

The two arrays contain integers from `1` to `k`.

You have to build a `k x k` matrix that contains each of the numbers from `1` to `k` **exactly once**. The remaining cells should have the value `0`.

The matrix should also satisfy the following conditions:

- The number <code>above<sub>i</sub></code> should appear in a **row** that is strictly **above** the row at which the number <code>below<sub>i</sub></code> appears for all `i` from 0 to `n - 1`.
- The number <code>left<sub>i</sub></code> should appear in a **column** that is strictly **left** of the column at which the number <code>right<sub>i</sub></code> appears for all `i` from 0 to `m - 1`.

Return _**any** matrix that satisfies the conditions. If no answer exists, return an empty matrix_.

**Example 1:**

![](https://assets.leetcode.com/uploads/2022/07/06/gridosdrawio.png)

- **Input:** k = 3, rowConditions = [[1,2],[3,2]], colConditions = [[2,1],[3,2]]
- **Output:** [[3,0,0],[0,0,1],[0,2,0]]
- **Explanation:** The diagram above shows a valid example of a matrix that satisfies all the conditions.
  - The row conditions are the following:
    - Number 1 is in row 1, and number 2 is in row 2, so 1 is above 2 in the matrix.
    - Number 3 is in row 0, and number 2 is in row 2, so 3 is above 2 in the matrix.
  - The column conditions are the following:
    - Number 2 is in column 1, and number 1 is in column 2, so 2 is left of 1 in the matrix.
    - Number 3 is in column 0, and number 2 is in column 1, so 3 is left of 2 in the matrix.
  - Note that there may be multiple correct answers.

**Example 2:**

- **Input:** k = 3, rowConditions = [[1,2],[2,3],[3,1],[2,3]], colConditions = [[2,1]]
- **Output:** []
- **Explanation:** From the first two conditions, 3 has to be below 1 but the third conditions needs 3 to be above 1 to be satisfied.\
  No matrix can satisfy all the conditions, so we return the empty matrix.

**Constraints:**

- <code>2 <= k <= 400</code>
- <code>1 <= rowConditions.length, colConditions.length <= 10<sup>4</sup></code>
- <code>rowConditions[i].length == colConditions[i].length == 2</code>
- <code>1 <= above<sub>i</sub>, below<sub>i</sub>, left<sub>i</sub>, right<sub>i</sub> <= k</code>
- <code>above<sub>i</sub> != below<sub>i</sub></code>
- <code>left<sub>i</sub> != right<sub>i</sub></code>

**Hint:**
1. Can you think of the problem in terms of graphs?
2. What algorithm allows you to find the order of nodes in a graph?



**Solution:**


To solve this problem, we can follow these steps:

1. **Topological Sorting**: We'll perform topological sorting on the row conditions and column conditions separately to determine the order in which elements should appear in rows and columns.
2. **Constructing the Matrix**: Using the sorted order from the topological sort, we will place the elements in the \( k \times k \) matrix accordingly.
3. **Validation**: If there is a cycle detected during topological sorting, it means the conditions are contradictory, and no valid matrix can be formed. In this case, we return an empty matrix.

Let's implement this solution in PHP: **[2392. Build a Matrix With Conditions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002392-build-a-matrix-with-conditions/solution.php)**

```php
<?php
// Example usage:
$k = 3;
$rowConditions = [[1, 2], [3, 2]];
$colConditions = [[2, 1], [3, 2]];
$result = buildMatrix($k, $rowConditions, $colConditions);

foreach ($result as $row) {
    echo implode(" ", $row) . "\n";
}
?>
```

### Explanation:
1. **Topological Sorting**:
    - We build a graph and calculate in-degrees for each node based on the given conditions.
    - Using a queue, we perform a topological sort and track the sorted order of elements.
    - If we successfully sort \( k \) elements, we return the sorted order. Otherwise, we return an empty array indicating a cycle (contradictory conditions).

2. **Constructing the Matrix**:
    - We use the sorted order from topological sorting to determine the row and column positions of each element.
    - We map each element to its respective position and place it in the \( k \times k \) matrix.

3. **Validation**:
    - If either row order or column order is empty, it means a cycle was detected, and we return an empty matrix.

The provided code effectively handles the given constraints and ensures that the matrix satisfies the specified conditions.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
