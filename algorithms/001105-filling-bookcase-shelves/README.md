1105\. Filling Bookcase Shelves

Medium

You are given an array `books` where <code>books[i] = [thickness<sub>i</sub>, height<sub>i</sub>]</code> indicates the thickness and height of the <code>i<sup>th</sup></code> book. You are also given an integer `shelfWidth`.

We want to place these books in order onto bookcase shelves that have a total width `shelfWidth`.

We choose some of the books to place on this shelf such that the sum of their thickness is less than or equal to `shelfWidth`, then build another level of the shelf of the bookcase so that the total height of the bookcase has increased by the maximum height of the books we just put down. We repeat this process until there are no more books to place.

Note that at each step of the above process, the order of the books we place is the same order as the given sequence of books.

- For example, if we have an ordered list of `5` books, we might place the first and second book onto the first shelf, the third book on the second shelf, and the fourth and fifth book on the last shelf.

Return _the minimum possible height that the total bookshelf can be after placing shelves in this manner_.

**Example 1:**

![shelves](https://assets.leetcode.com/uploads/2019/06/24/shelves.png)

- **Input:** books = [[1,1],[2,3],[2,3],[1,1],[1,1],[1,1],[1,2]], shelfWidth = 4
- **Output:** 6
- **Explanation:**\
  The sum of the heights of the 3 shelves is 1 + 3 + 2 = 6.\
  Notice that book number 2 does not have to be on the first shelf.

**Example 2:**

- **Input:** books = [[1,3],[2,4],[3,2]], shelfWidth = 6
- **Output:** 4

**Constraints:**

- `1 <= books.length <= 1000`.
- <code>1 <= thickness<sub>i</sub> <= shelfWidth <= 1000</code>
- <code>1 <= height<sub>i</sub> <= 1000</code>

**Hint:**
1. Use dynamic programming: dp(i) will be the answer to the problem for books[i:].




**Solution:**


To solve this problem, we can follow these steps:

1. **Initialization**: Initialize a `dp` array where `dp[0] = 0` (no books, no height).
2. **Dynamic Programming Transition**: For each book `i`, try to place it on the current shelf or start a new shelf. Update `dp[i]` with the minimum possible height after placing book `i`.
3. **Iterate through books**: For each book, check all possible ways to place it on the current shelf considering the `shelfWidth`. Update the `dp` array accordingly.


Let's implement this solution in PHP: **[1105. Filling Bookcase Shelves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001105-filling-bookcase-shelves/solution.php)**

```php
<?php
// Example usage:
$books = [[1,1],[2,3],[2,3],[1,1],[1,1],[1,1],[1,2]];
$shelfWidth = 4;
echo minHeightShelves($books, $shelfWidth); // Output: 6

$books = [[1,3],[2,4],[3,2]];
$shelfWidth = 6;
echo minHeightShelves($books, $shelfWidth); // Output: 4

?>
```

### Explanation:

1. **Initialization**: We initialize the `dp` array where `dp[0] = 0`, meaning if there are no books, the height is `0`.
2. **Iterate through books**: We iterate through each book `i` from `1` to `n` (total number of books).
3. **Check possible shelf placements**: For each book `i`, we iterate backward to check all possible placements of books on the current shelf, ensuring the total width does not exceed `shelfWidth`.
4. **Update `dp`**: We update `dp[i]` with the minimum height by comparing the current value of `dp[i]` and the height of the new shelf configuration (`dp[j-1] + height`).

This solution effectively uses dynamic programming to keep track of the minimum possible height of the bookshelf as books are placed, ensuring the constraints are respected.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
