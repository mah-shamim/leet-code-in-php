2029\. Stone Game IX

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Greedy`, `Minimax`, `Counting`, `Game Theory`, `Nim Game`, `Zero-Sum Game`, `Weekly Contest 261`

Alice and Bob continue their games with stones. There is a row of `n` stones, and each stone has an associated value. You are given an integer array `stones`, where `stones[i]` is the **value** of the `iᵗʰ` stone.

Alice and Bob take turns, with **Alice** starting first. On each turn, the player may remove any stone from `stones`. The player who removes a stone **loses** if the **sum** of the values of **all removed stones** is divisible by `3`. Bob will win automatically if there are no remaining stones (even if it is Alice's turn).

Assuming both players play **optimally**, return _`true` if Alice wins and `false` if Bob wins_.

**Example 1:**

- **Input:** stones = [2,1]
- **Output:** true
- **Explanation:** 
  - The game will be played as follows:
    - Turn 1: Alice can remove either stone.
    - Turn 2: Bob removes the remaining stone.
  - The sum of the removed stones is 1 + 2 = 3 and is divisible by 3. Therefore, Bob loses and Alice wins the game.

**Example 2:**

- **Input:** stones = [2]
- **Output:** false
- **Explanation:** 
  - Alice will remove the only stone, and the sum of the values on the removed stones is 2.
  - Since all the stones are removed and the sum of values is not divisible by 3, Bob wins the game.

**Example 3:**

- **Input:** stones = [5,1,2,4,3]
- **Output:** false
- **Explanation:** 
  - Bob will always win. One possible way for Bob to win is shown below:
    - Turn 1: Alice can remove the second stone with value 1. Sum of removed stones = 1.
    - Turn 2: Bob removes the fifth stone with value 3. Sum of removed stones = 1 + 3 = 4.
    - Turn 3: Alice removes the fourth stone with value 4. Sum of removed stones = 1 + 3 + 4 = 8.
    - Turn 4: Bob removes the third stone with value 2. Sum of removed stones = 1 + 3 + 4 + 2 = 10.
    - Turn 5: Alice removes the first stone with value 5. Sum of removed stones = 1 + 3 + 4 + 2 + 5 = 15.
  - Alice loses the game because the sum of the removed stones (15) is divisible by 3. Bob wins the game.

**Example 4:**

- **Input:** stones = [3,6,9]
- **Output:** false

**Example 5:**

- **Input:** stones = [1,1,1,2,3]
- **Output:** true

**Example 6:**

- **Input:** stones = [1,1,2,2,3,6]
- **Output:** true

**Example 7:**

- **Input:** stones = [1,1,1,1,2,3]
- **Output:** true

**Example 8:**

- **Input:** stones = [1,1,1]
- **Output:** false

**Constraints:**

- `1 <= stones.length <= 10⁵`
- `1 <= stones[i] <= 10⁴`


**Hint:**
1. There are limited outcomes given the current sum and the stones remaining.
2. Can we greedily simulate starting with taking a stone with remainder 1 or 2 divided by 3?


**Similar Questions:**
1. [877. Stone Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00877-stone-game)
2. [1140. Stone Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001140-stone-game-ii)
3. [1406. Stone Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001406-stone-game-iii)
4. [1510. Stone Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001510-stone-game-iv)
5. [1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v)
6. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
7. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
8. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
9. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)


**Solution:**

We solve this problem by categorizing stones based on their remainder when divided by 3. Since only the sum modulo 3 matters for determining the losing condition, we count stones with remainders 0, 1, and 2. The game's outcome depends on these counts and whether Alice can force Bob into a losing position. Our solution uses a simple mathematical analysis based on the counts of remainders.

## Approach

- **Categorize stones** by their remainder modulo 3 into three groups (0, 1, 2)
- **Analyze zero-remainder stones** as "turn-switchers" that don't change the sum modulo 3
- **Determine winning patterns** based on the counts of 1s and 2s
- **Apply game theory logic** to decide if Alice has a winning strategy
- **Return true if Alice wins**, false otherwise

Let's implement this solution in PHP: **[2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix/solution.php)**

```php
<?php
/**
 * @param Integer[] $stones
 * @return Boolean
 */
function stoneGameIX(array $stones): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo stoneGameIX([2,1]) .  "\n";            // Output: true
echo stoneGameIX([2]) .  "\n";              // Output: false
echo stoneGameIX([5,1,2,4,3]) .  "\n";      // Output: false
echo stoneGameIX([3,6,9]) .  "\n";          // Output: false
echo stoneGameIX([1,1,1,2,3]) .  "\n";      // Output: true
echo stoneGameIX([1,1,2,2,3,6]) .  "\n";    // Output: true
echo stoneGameIX([1,1,1,1,2,3]) .  "\n";    // Output: true
echo stoneGameIX([1,1,1]) .  "\n";          // Output: false
?>
```

### Explanation:

- **Remainder categorization**: Only the value modulo 3 matters because we care about divisibility by 3 of the cumulative sum
- **Zero-remainder stones (`count[0]`)**: These stones don't change the sum modulo 3. When even, they act as passes; when odd, they can flip the turn advantage
- **First case - even zeros**: If `count[0]` is even, Alice wins if both types of non-zero stones exist. She starts with a 1, Bob must respond with a 2 (or vice versa), and the pattern continues until someone is forced to break the alternation
- **Second case - odd zeros**: If `count[0]` is odd, Alice wins if the difference between `count[1]` and `count[2]` is greater than 2. The extra zero stones give Alice an additional strategic advantage
- **Key insight**: The game essentially reduces to whether Alice can force Bob to be the one who completes a sum divisible by 3
- **Optimal play**: Both players will choose stones that avoid creating a divisible-by-3 sum while trying to force their opponent into that position
- **Edge cases**: When only one type of non-zero stone exists, Bob can always win by matching the player who starts with that type

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ where `n` is the length of the stones array, as we only iterate through the array once to count remainders
- **Space Complexity**: _**O(1)**_ as we only use a constant-sized array of 3 elements regardless of input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**