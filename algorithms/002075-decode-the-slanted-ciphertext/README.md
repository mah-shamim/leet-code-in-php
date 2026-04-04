2075\. Decode the Slanted Ciphertext

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Simulation`, `Weekly Contest 267`

A string `originalText` is encoded using a **slanted transposition cipher** to a string `encodedText` with the help of a matrix having a **fixed number of rows** `rows`.

`originalText` is placed first in a top-left to bottom-right manner.
![exa11](https://assets.leetcode.com/uploads/2021/11/07/exa11.png)
The blue cells are filled first, followed by the red cells, then the yellow cells, and so on, until we reach the end of `originalText`. The arrow indicates the order in which the cells are filled. All empty cells are filled with `' '`. The number of columns is chosen such that the rightmost column will **not be empty** after filling in `originalText`.

`encodedText` is then formed by appending all characters of the matrix in a row-wise fashion.
![exa12](https://assets.leetcode.com/uploads/2021/11/07/exa12.png)
The characters in the blue cells are appended first to `encodedText`, then the red cells, and so on, and finally the yellow cells. The arrow indicates the order in which the cells are accessed.

For example, if `originalText = "cipher"` and `rows = 3`, then we encode it in the following manner:
![desc2](https://assets.leetcode.com/uploads/2021/10/25/desc2.png)
The blue arrows depict how `originalText` is placed in the matrix, and the red arrows denote the order in which `encodedText` is formed. In the above example, `encodedText = "ch ie pr"`.

Given the encoded string `encodedText` and number of rows `rows`, return _the original string `originalText`_.

**Note:** `originalText` **does not** have any trailing spaces `' '`. The test cases are generated such that there is only one possible `originalText`.


**Example 1:**

- **Input:** encodedText = "ch   ie   pr", rows = 3
- **Output:** "cipher"
- **Explanation:** This is the same example described in the problem description.

**Example 2:**

![exam1](https://assets.leetcode.com/uploads/2021/10/26/exam1.png)

- **Input:** encodedText = "iveo    eed   l te   olc", rows = 4
- **Output:** "i love leetcode"
- **Explanation:** The figure above denotes the matrix that was used to encode `originalText`.
  The blue arrows show how we can find `originalText` from `encodedText`.

**Example 3:**

![eg2](https://assets.leetcode.com/uploads/2021/10/26/eg2.png)

- **Input:** encodedText = "coding", rows = 1
- **Output:** "coding"
- **Explanation:** Since there is only 1 row, both `originalText` and `encodedText` are the same.

**Example 4:**

- **Input:** encodedText = "abc ", rows = 2
- **Output:** "abc"

**Example 5:**

- **Input:** encodedText = "a ", rows = 2
- **Output:** "a"

**Constraints:**

- `0 <= encodedText.length <= 10⁶`
- `encodedText` consists of lowercase English letters and `' '` only.
- `encodedText` is a valid encoding of some `originalText` that **does not** have trailing spaces.
- `1 <= rows <= 1000`
- The testcases are generated such that there is **only one** possible `originalText`.



**Hint:**
1. How can you use rows and encodedText to find the number of columns of the matrix?
2. Once you have the number of rows and columns, you can create the matrix and place encodedText in it. How should you place it in the matrix?
3. How should you traverse the matrix to "decode" originalText?



**Similar Questions:**
1. [498. Diagonal Traverse](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000498-diagonal-traverse)






**Solution:**

The solution decodes a slanted transposition cipher by reconstructing the original matrix from the encoded string, then reading it in a **diagonal order** from the first row to the last column. The number of columns is derived from the encoded text length and the given number of rows. The result is trimmed of trailing spaces as per the problem constraints.

### Approach:

- **Calculate number of columns:** Since the encoded text is formed by reading the matrix row-wise, `columns = len(encodedText)/rows`. (The problem guarantees the rightmost column is not empty, so division is exact.)
- **Simulate diagonal traversal**  
  - The original text was placed in the matrix in a top-left to bottom-right (diagonal) order.  
  - Therefore, to decode, we traverse all diagonals starting from the first row, each beginning at `(0, startCol)` for `startCol = 0` to `columns - 1`.
- **Extract characters in diagonal order**  
  - For each diagonal, move `(row+1, col+1)` until we exceed matrix bounds.  
  - Convert 2D coordinates to 1D index: `row * columns + col`, and append the character from `encodedText` to the result.
- **Remove trailing spaces:** The problem states `originalText` has no trailing spaces, so we trim the result.

Let's implement this solution in PHP: **[2075. Decode the Slanted Ciphertext](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002075-decode-the-slanted-ciphertext/solution.php)**

```php
<?php
/**
 * @param String $encodedText
 * @param Integer $rows
 * @return String
 */
function decodeCiphertext(string $encodedText, int $rows): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo decodeCiphertext("ch   ie   pr", 3) . "\n";                        // Output: "cipher"
echo decodeCiphertext("iveo    eed   l te   olc", 4) . "\n";            // Output: "i love leetcode"
echo decodeCiphertext("coding", 1) . "\n";                              // Output: "coding"
echo decodeCiphertext("abc ", 2) . "\n";                                // Output: "abc"
echo decodeCiphertext("a ", 2) . "\n";                                  // Output: "a"
?>
```

### Explanation:

- **Step 1 – Find matrix dimensions:** We know `rows`. The number of columns is simply `len(encodedText) / rows` because the encoded string is a concatenation of all rows of the matrix, and the matrix is fully filled (no empty cells except those intentionally filled with spaces for alignment).
- **Step 2 – Understand encoding order:** Original text was written diagonally: first `(0,0)`, then `(1,1)`, `(2,2)`, … until the end of the matrix. After finishing one diagonal, we move to the next starting column in row 0.
- **Step 3 – Reverse the process:** To decode, we collect characters in the same diagonal order as they were written. That’s why we iterate over `startCol` from 0 to `columns-1` and for each, move down-right until we hit the bottom or right edge.
- **Step 4 – Handle spaces:** Spaces in the encoded text represent empty cells in the matrix. They are correctly included during diagonal traversal and removed at the end.

### Complexity
- **Time Complexity**: _**O(n)**_, Where _**n**_ is the length of `encodedText`. Each character is visited exactly once during the diagonal traversal.
- **Space Complexity**: _**O(1)**_ extra space (excluding output). The algorithm works in-place on the input string and builds the result incrementally.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**