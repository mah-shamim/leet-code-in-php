79\. Word Search

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Backtracking`, `Matrix`

Given an `m x n` grid of characters `board` and a string `word`, return `true` _if_ `word` _exists in the grid_.

The word can be constructed from letters of sequentially adjacent cells, where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.

**Example 1:**

![word2](https://assets.leetcode.com/uploads/2020/11/04/word2.jpg)
- **Input:** `board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"`
- **Output:** `true`

**Example 2:**

![word-1](https://assets.leetcode.com/uploads/2020/11/04/word-1.jpg)
- **Input:** `board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "SEE"`
- **Output:** `true` 

**Example 3:**

![word3](https://assets.leetcode.com/uploads/2020/10/15/word3.jpg)
- **Input:** `board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCB"`
- **Output:** `false` 

**Constraints:**

- <code>m == board.length</code>
- <code>n = board[i].length</code>
- <code>1 <= m, n <= 6</code>
- <code>1 <= word.length <= 15</code>
- `board` and `word` consists of only lowercase and uppercase English letters.

**Follow-up:** Could you use search pruning to make your solution faster with a larger `board`?


**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[79. Word Search](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000079-word-search/solution.php)**


### Explanation:

1. **Initialization:**
    - The `exist` function iterates through each cell in the grid. It starts a DFS search from each cell to see if the word can be constructed from that starting point.

2. **DFS Search (`dfs` function):**
    - **Bounds Check:** The DFS function first checks if the current position is out of bounds or if the character at the current position doesn't match the current character in the word.
    - **Word Completion:** If the current character matches and the end of the word is reached, it returns `true`.
    - **Marking Cells:** It marks the current cell as visited by setting it to `'*'` to avoid reusing the same cell.
    - **Recursive Exploration:** It recursively searches in the four possible directions (up, down, left, right).
    - **Unmarking Cells:** After exploring all directions, it restores the original character in the board.

This approach ensures that each cell is visited at most once per search and uses backtracking to ensure the solution remains efficient.
**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**