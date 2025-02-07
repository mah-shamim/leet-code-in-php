3160\. Find the Number of Distinct Colors Among the Balls

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Simulation`

You are given an integer `limit` and a 2D array `queries` of size `n x 2`.

There are `limit + 1` balls with **distinct** labels in the range `[0, limit]`. Initially, all balls are uncolored. For every query in `queries` that is of the form `[x, y]`, you mark ball `x` with the color `y`. After each query, you need to find the number of **distinct** colors among the balls.

Return _an array `result` of length `n`, where `result[i]` denotes the number of distinct colors after <code>i<sup>th</sup></code> query_.

**Note** that when answering a query, lack of a color will not be considered as a color.

**Example 1:**

- **Input:** limit = 4, queries = [[1,4],[2,5],[1,3],[3,4]]
- **Output:** [1,2,2,3]
- **Explanation:**
![ezgifcom-crop](https://assets.leetcode.com/uploads/2024/04/17/ezgifcom-crop.gif)
    - After query 0, ball 1 has color 4.
    - After query 1, ball 1 has color 4, and ball 2 has color 5.
    - After query 2, ball 1 has color 3, and ball 2 has color 5.
    - After query 3, ball 1 has color 3, ball 2 has color 5, and ball 3 has color 4.


**Example 2:**

- **Input:** limit = 4, queries = [[0,1],[1,2],[2,2],[3,4],[4,5]]
- **Output:** [1,2,2,3,4]
- **Explanation:**
![ezgifcom-crop2](https://assets.leetcode.com/uploads/2024/04/17/ezgifcom-crop2.gif)
  - After query 0, ball 0 has color 1.
  - After query 1, ball 0 has color 1, and ball 1 has color 2.
  - After query 2, ball 0 has color 1, and balls 1 and 2 have color 2.
  - After query 3, ball 0 has color 1, balls 1 and 2 have color 2, and ball 3 has color 4.
  - After query 4, ball 0 has color 1, balls 1 and 2 have color 2, ball 3 has color 4, and ball 4 has color 5.


**Constraints:**

- <code>1 <= limit <= 10<sup>9</sup></code>
- <code>1 <= n == queries.length <= 10<sup>5</sup></code>
- `queries[i].length == 2`
- `0 <= queries[i][0] <= limit`
- <code>1 <= queries[i][1] <= 10<sup>9</sup></code>


**Hint:**
1. Use two HashMaps to maintain the color of each ball and the set of balls with each color.



**Solution:**

We need to efficiently track the number of distinct colors among balls after each query. Each query updates the color of a specific ball, and we need to determine the number of distinct colors present after each update.

### Approach
1. **Data Structures**: Use two hash maps (associative arrays in PHP):
   - `colorMap` to track the current color of each ball.
   - `colorCount` to track the number of balls for each color.

2. **Processing Queries**:
   - For each query, check if the ball has a previous color. If so, decrement the count of that color in `colorCount`. If the count reaches zero, remove the color from `colorCount`.
   - Update the ball's color in `colorMap` and increment the count of the new color in `colorCount`.
   - The number of distinct colors after each query is the size of `colorCount`.

Let's implement this solution in PHP: **[3160. Find the Number of Distinct Colors Among the Balls](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003160-find-the-number-of-distinct-colors-among-the-balls/solution.php)**

```php
<?php
/**
 * @param Integer $limit
 * @param Integer[][] $queries
 * @return Integer[]
 */
function queryResults($limit, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
// Example 1
$limit = 4;
$queries = [[1, 4], [2, 5], [1, 3], [3, 4]];
echo "Output: " . json_encode(queryResults($limit, $queries)) . "\n";

// Example 2
$limit = 4;
$queries = [[0, 1], [1, 2], [2, 2], [3, 4], [4, 5]];
echo "Output: " . json_encode(queryResults($limit, $queries)) . "\n";
?>
```

### Explanation:

- **colorMap**: This map keeps track of the current color of each ball. Each ball's label is a key, and its value is the current color.
- **colorCount**: This map tracks how many balls are of each color. The keys are colors, and the values are the counts of balls with that color.
- For each query, we update the color of the specified ball. If the ball had a previous color, we adjust the count of that color. If the count drops to zero, we remove the color from `colorCount`.
- The size of `colorCount` after each query gives the number of distinct colors, which is appended to the result array.

This approach ensures that each query is processed in constant time, making the solution efficient and scalable for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**