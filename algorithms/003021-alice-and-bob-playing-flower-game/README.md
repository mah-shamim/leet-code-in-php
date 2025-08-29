3021\. Alice and Bob Playing Flower Game

**Difficulty:** Medium

**Topics:** `Math`, `Weekly Contest 382`

Alice and Bob are playing a turn-based game on a field, with two lanes of flowers between them. There are `x` flowers in the first lane between Alice and Bob, and `y` flowers in the second lane between them.

![3021](https://assets.leetcode.com/uploads/2025/08/27/3021.png)
The game proceeds as follows:

1. Alice takes the first turn.
2. In each turn, a player must choose either one of the lane and pick one flower from that side.
3. At the end of the turn, if there are no flowers left at all, the **current** player captures their opponent and wins the game.

Given two integers, `n` and `m`, the task is to compute the number of possible pairs `(x, y)` that satisfy the conditions:

- Alice must win the game according to the described rules.
- The number of flowers `x` in the first lane must be in the range `[1,n]`.
- The number of flowers `y` in the second lane must be in the range `[1,m]`.

Return _the number of possible pairs `(x, y)` that satisfy the conditions mentioned in the statement_.

**Example 1:**

- **Input:** n = 3, m = 2
- **Output:** 3
- **Explanation:** The following pairs satisfy conditions described in the statement: (1,2), (3,2), (2,1).

**Example 2:**

- **Input:** n = 1, m = 1
- **Output:** 0
- **Explanation:** No pairs satisfy the conditions described in the statement.

**Constraints:**

- <code>1 <= n, m <= 10<sup>5</sup></code>


**Hint:**
1. (x, y) is valid if and only if they have different parities.






**Solution:**

We need to determine the number of valid pairs `(x, y)` where `x` represents the number of flowers in the first lane and `y` represents the number of flowers in the second lane. The conditions are that Alice wins the game, and `x` and `y` must be within the ranges `[1, n]` and `[1, m]` respectively.

### Approach
1. **Problem Analysis**: The game involves two players, Alice and Bob, taking turns to pick flowers from either lane. Alice wins if the total number of moves (i.e., the sum of flowers from both lanes) is odd. This is because Alice starts first, and if the total moves are odd, she will make the last move, winning the game.
2. **Key Insight**: For Alice to win, the sum `x + y` must be odd. This means that if `x` is even, `y` must be odd, and if `x` is odd, `y` must be even.
3. **Counting Valid Pairs**:
    - Count the number of even and odd integers in the range `[1, n]` for `x`.
    - Count the number of even and odd integers in the range `[1, m]` for `y`.
    - The total valid pairs is the sum of:
        - (Number of even `x` multiplied by the number of odd `y`)
        - (Number of odd `x` multiplied by the number of even `y`)

Let's implement this solution in PHP: **[3021. Alice and Bob Playing Flower Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003021-alice-and-bob-playing-flower-game/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $m
 * @return Integer
 */
function flowerGame($n, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
echo flowerGame(3, 2) . "\n";  // Output: 3

// Example 2
echo flowerGame(1, 1) . "\n";  // Output: 0
?>
```

### Explanation:

1. **Counting Even and Odd Numbers**:
    - For `n`, the number of even integers is calculated by integer division of `n` by 2. The number of odd integers is simply `n` minus the count of even integers.
    - Similarly, for `m`, the number of even and odd integers is computed.
2. **Calculating Valid Pairs**: The total number of valid pairs `(x, y)` is obtained by multiplying the count of even `x` with odd `y` and adding it to the product of the count of odd `x` and even `y`. This gives the total pairs where `x + y` is odd, ensuring Alice wins the game.

This approach efficiently computes the solution by leveraging basic arithmetic operations and counting, ensuring optimal performance even for large values of `n` and `m` up to **<code>10<sup>5</sup></code>**. The time complexity is constant _**O(1)**_ since it involves simple calculations regardless of the input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**