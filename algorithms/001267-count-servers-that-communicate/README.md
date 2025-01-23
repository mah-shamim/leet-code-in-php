1267\. Count Servers that Communicate

**Difficulty:** Medium

**Topics:** `Array`, `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Matrix`, `Counting`

You are given a map of a server center, represented as a `m * n` integer matrix `grid`, where `1` means that on that cell there is a server and `0` means that it is no server. Two servers are said to communicate if they are on the same row or on the same column.

Return _the number of servers that communicate with any other server_.

**Example 1:**

![untitled-diagram-6](https://assets.leetcode.com/uploads/2019/11/14/untitled-diagram-6.jpg)

- **Input:** grid = [[1,0],[0,1]]
- **Output:** 0
- **Explanation:** No servers can communicate with others.

**Example 2:**

![untitled-diagram-4](https://assets.leetcode.com/uploads/2019/11/13/untitled-diagram-4.jpg)

- **Input:** grid = [[1,0],[1,1]]
- **Output:** 3
- **Explanation:** All three servers can communicate with at least one other server.


**Example 3:**

![untitled-diagram-1-3](https://assets.leetcode.com/uploads/2019/11/14/untitled-diagram-1-3.jpg)

- **Input:** grid = [[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]]
- **Output:** 4
- **Explanation:** The two servers in the first row can communicate with each other. The two servers in the third column can communicate with each other. The server at right bottom corner can't communicate with any other server.



**Constraints:**

- `m == grid.length`
- `n == grid[i].length`
- `1 <= m <= 250`
- `1 <= n <= 250`
- `grid[i][j] == 0 or 1`


**Hint:**
1. Store number of computer in each row and column.
2. Count all servers that are not isolated.



**Solution:**

We'll follow these steps:

### Approach:

1. **Count Servers in Each Row and Column**:
   - Traverse the grid and calculate how many servers exist in each row and each column. This can be done using two arrays `rowCount` and `colCount`, where:
      - `rowCount[i]` stores the number of servers in row `i`.
      - `colCount[j]` stores the number of servers in column `j`.

2. **Check for Communication**:
   - For each server in the grid, check if it can communicate with any other server by checking the `rowCount` and `colCount`. If either is greater than 1, then the server can communicate with others.

3. **Count the Servers that Communicate**:
   - Traverse through the grid again and for each server (cell with value `1`), check if it belongs to a row or column where there is more than one server.

Let's implement this solution in PHP: **[1267. Count Servers that Communicate](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001267-count-servers-that-communicate/solution.php)**

```php
<?php
/**
 * @param Integer[][] $grid
 * @return Integer
 */
function countServers($grid) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test the function with the provided examples
$grid1 = [[1, 0], [0, 1]];
$grid2 = [[1, 0], [1, 1]];
$grid3 = [[1, 1, 0, 0], [0, 0, 1, 0], [0, 0, 1, 0], [0, 0, 0, 1]];

echo countServers($grid1) . "\n"; // Output: 0
echo countServers($grid2) . "\n"; // Output: 3
echo countServers($grid3) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Counting Servers in Rows and Columns**:
   - We iterate over the grid and count how many servers (i.e., `1`s) are in each row and each column. We store these counts in the `rowCount` and `colCount` arrays.

2. **Identifying Communicating Servers**:
   - After counting, we iterate over each server (cell with value `1`). A server can communicate with others if the count of servers in its row (`rowCount[i] > 1`) or the count of servers in its column (`colCount[j] > 1`) is greater than 1. We then increment the result counter for each communicating server.

3. **Output**:
   - The function returns the total count of servers that can communicate with other servers.

### Time Complexity:
- **O(m * n)**, where `m` is the number of rows and `n` is the number of columns. This is because we iterate through the grid twice: once to count servers in rows and columns, and once to check for communication.

This solution efficiently handles the problem within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**