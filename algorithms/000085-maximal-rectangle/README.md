85\. Maximal Rectangle

Hard

Given a `rows x cols` binary matrix filled with `0`'s and `1`'s, find the largest rectangle containing only `1`'s and return <i>its area</i>.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/09/14/maximal.jpg)

- **Input:** <code>**matrix = [["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]**</code>
- **Output:** <code>**6**</code>
- **Explanation:** <code>**The maximal rectangle is shown in the above picture**</code>.

**Example 2:**

- **Input:** <code>**matrix = [["0"]]**</code>
- **Output:** <code>**0**</code>

**Example 3:**
- **Input:** <code>**matrix = [["1"]]**</code>
- **Output:** <code>**1**</code>


**Constraints:**

- `rows == matrix.length`
- `cols == matrix[i].length`
- `1 <= row, cols <= 200`
- <code>`matrix[i][j]` is `'0'` or `'1'`</code>.