1563\. Stone Game V

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Math`, `Dynamic Programming`, `Game Theory`, `Weekly Contest 203`

There are several stones **arranged in a row**, and each stone has an associated value which is an integer given in the array `stoneValue`.

In each round of the game, Alice divides the row into **two non-empty rows** (i.e. left row and right row), then Bob calculates the value of each row which is the sum of the values of all the stones in this row. Bob throws away the row which has the maximum value, and Alice's score increases by the value of the remaining row. If the value of the two rows are equal, Bob lets Alice decide which row will be thrown away. The next round starts with the remaining row.

The game ends when there is only **one stone remaining**. Alice's score is initially **zero**.

Return _the maximum score that Alice can obtain_.

**Example 1:**

- **Input:** stoneValue = [6,2,3,4,5,5]
- **Output:** 18
- **Explanation:** 
  - In the first round, Alice divides the row to [6,2,3], [4,5,5]. The left row has the value 11 and the right row has value 14. Bob throws away the right row and Alice's score is now 11.
  - In the second round Alice divides the row to [6], [2,3]. This time Bob throws away the left row and Alice's score becomes 16 (11 + 5).
  - The last round Alice has only one choice to divide the row which is [2], [3]. Bob throws away the right row and Alice's score is now 18 (16 + 2). The game ends because only one stone is remaining in the row.

**Example 2:**

- **Input:** stoneValue = [7,7,7,7,7,7,7]
- **Output:** 28

**Example 3:**

- **Input:** stoneValue = [4]
- **Output:** 0

**Example 4:**

- **Input:** stoneValue = [2,1,1]
- **Output:** 3

**Example 5:**

- **Input:** stoneValue = [1,2]
- **Output:** 1

**Example 6:**

- **Input:** stoneValue = [3,3]
- **Output:** 3

**Example 7:**

- **Input:** stoneValue = [5,10,5]
- **Output:** 5

**Example 8:**

- **Input:** stoneValue = [1,1,1]
- **Output:** 1

**Example 9:**

- **Input:** stoneValue = [1,2,3,4]
- **Output:** 4

**Example 10:**

- **Input:** stoneValue = [10,1,1,10]
- **Output:** 12

**Constraints:**

- `1 <= stoneValue.length <= 500`
- `1 <= stoneValue[i] <= 10⁶`


**Hint:**
1. We need to try all possible divisions for the current row to get the max score.
2. As calculating all possible divisions will lead us to calculate some sub-problems more than once, we need to think of dynamic programming.


**Similar Questions:**
1. [877. Stone Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000877-stone-game)
2. [1140. Stone Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001140-stone-game-ii)
3. [1406. Stone Game III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001406-stone-game-iii)
4. [1510. Stone Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001510-stone-game-iv)
5. [1686. Stone Game VI](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001686-stone-game-vi)
6. [1690. Stone Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001690-stone-game-vii)
7. [1872. Stone Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001872-stone-game-viii)
8. [2029. Stone Game IX](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002029-stone-game-ix)


**Solution:**

We implement a bottom-up DP solution where `dp[i][j]` stores the maximum score Alice can achieve starting with the subarray `stoneValue[i..j]`. We precompute prefix sums to get row sums in `O(1)`, then iterate over all possible subarray lengths and split points, calculating the best outcome for each.

## Approach

- **Prefix sum array** – allows quick computation of left and right row sums.
- **DP table `dp[i][j]`** – stores the max score Alice can get from the subarray `i..j`.
- **Iterate by length** – process subarrays from length 2 up to `n`, because length 1 yield score 0.
- **Try all splits** – for each split `k`, compute `leftSum` and `rightSum`.
   - If `leftSum < rightSum`, Bob discards right, so Alice gets `leftSum + dp[i][k]`.
   - If `leftSum > rightSum`, Bob discards left, so Alice gets `rightSum + dp[k+1][j]`.
   - If equal, Alice chooses the better of the two remaining rows: `leftSum + max(dp[i][k], dp[k+1][j])`.
- **Take the maximum** over all possible splits for each subarray.

Let's implement this solution in PHP: **[1563. Stone Game V](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001563-stone-game-v/solution.php)**

```php
<?php
/**
 * @param Integer[] $stoneValue
 * @return Integer
 */
function stoneGameV(array $stoneValue): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo stoneGameV([6,2,3,4,5,5]) .  "\n";         // Output: 18
echo stoneGameV([7,7,7,7,7,7,7]) .  "\n";       // Output: 28
echo stoneGameV([4]) .  "\n";                   // Output: 0
echo stoneGameV([2,1,1]) .  "\n";               // Output: 3
echo stoneGameV([1,2]) .  "\n";                 // Output: 1
echo stoneGameV([3,3]) .  "\n";                 // Output: 3
echo stoneGameV([5,10,5]) .  "\n";              // Output: 5
echo stoneGameV([1,1,1]) .  "\n";               // Output: 1
echo stoneGameV([1,2,3,4]) .  "\n";             // Output: 4
echo stoneGameV([6,2,3,4,5,5]) .  "\n";         // Output: 12
?>
```

### Explanation:

- **Base case** – A single stone (length 1) gives score 0 because no split is possible.
- **State definition** – `dp[i][j]` = maximum score Alice can obtain from the row containing stones `i` through `j` (inclusive).
- **Transition** – For each split `k` between `i` and `j-1`:
   - Compute `leftSum` and `rightSum` using prefix sums.
   - Determine which row is kept based on the comparison.
   - Add the kept row's sum to the optimal score from that kept subarray.
- **Result** – The answer is `dp[0][n-1]`.

## Complexity Analysis

- **Time Complexity:** _**O(n³)**_ – For each subarray (_**O(n²)**_) we try all possible splits (_**O(n)**_), resulting in _**O(n³)**_ total operations.
- **Space Complexity:** _**O(n²)**_ – For the DP table.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**