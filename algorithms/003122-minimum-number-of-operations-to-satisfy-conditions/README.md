3122\. Minimum Number of Operations to Satisfy Conditions

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Matrix`, `Weekly Contest 394`

You are given a 2D matrix `grid` of size `m x n`. In one **operation**, you can change the value of **any** cell to **any** non-negative number. You need to perform some operations such that each cell `grid[i][j]` is:

- Equal to the cell below it, i.e. `grid[i][j] == grid[i + 1][j]` (if it exists).
- Different from the cell to its right, i.e. `grid[i][j] != grid[i][j + 1]` (if it exists).

Return the **minimum** number of operations needed.


**Example 1:**


- **Input:** grid = [[1,0,2],[1,0,2]]
- **Output:** 0
- **Explanation:** 

    ![](https://assets.leetcode.com/uploads/2024/04/15/examplechanged.png)


All the cells in the matrix already satisfy the properties.

**Example 2:**

- **Input:** grid = [[1,1,1],[0,0,0]]
- **Output:** 3
- **Explanation:**

  ![example21](https://assets.leetcode.com/uploads/2024/03/27/example21.png)

The matrix becomes `[[1,0,1],[1,0,1]]` which satisfies the properties, by doing these 3 operations:

- Change `grid[1][0]` to 1.
- Change `grid[0][1]` to 0.
- Change `grid[1][2]` to 1.


**Example 3:**

- **Input:** `grid = [[1],[2],[3]]`
- **Output:** 2
- **Explanation:**

  ![changed](https://assets.leetcode.com/uploads/2024/03/31/changed.png)

There is a single column. We can change the value to 1 in each cell using 2 operations.


**Constraints:**

- `1 <= n, m <= 1000`
- `0 <= grid[i][j] <= 9`



**Similar Questions:**
1. [135. Candy](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000135-candy)
2. [575. Distribute Candies](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000575-distribute-candies)
3. [2144. Minimum Cost of Buying Candies With Discount](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002144-minimum-cost-of-buying-candies-with-discount)