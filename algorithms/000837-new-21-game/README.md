837\. New 21 Game

**Difficulty:** Medium

**Topics:** `Math`, `Dynamic Programming`, `Sliding Window`, `Probability and Statistics`, `Weekly Contest 85`

Alice plays the following game, loosely based on the card game **"21"**.

Alice starts with `0` points and draws numbers while she has less than `k` points. During each draw, she gains an integer number of points randomly from the range `[1, maxPts]`, where `maxPts` is an integer. Each draw is independent and the outcomes have equal probabilities.

Alice stops drawing numbers when she gets `k` **or more points**.

Return the probability that Alice has `n` or fewer points.

Answers within <code>10<sup>-5</sup></code> of the actual answer are considered accepted.

**Example 1:**

- **Input:** n = 10, k = 1, maxPts = 10
- **Output:** 1.00000
- **Explanation:** Alice gets a single card, then stops.

**Example 2:**

- **Input:** n = 6, k = 1, maxPts = 10
- **Output:** 0.60000
- **Explanation:** Alice gets a single card, then stops. In 6 out of 10 possibilities, she is at or below 6 points.

**Example 3:**

- **Input:** n = 21, k = 17, maxPts = 10
- **Output:** 0.73278

**Constraints:**

- <code>0 <= k <= n <= 10<sup>4</sup></code>
- <code>1 <= maxPts <= 10<sup>4</sup></code>







**Solution:**

We need to compute the probability that Alice has `n` or fewer points when she stops drawing numbers in the game described. The game involves Alice starting with 0 points and drawing numbers from the range `[1, maxPts]` until her total points reach or exceed `k`. The solution involves dynamic programming and a sliding window technique to efficiently compute the probabilities.

### Approach
1. **Problem Analysis**: Alice starts at 0 points and draws numbers from 1 to `maxPts` (each with equal probability) until her total points are at least `k`. We need to find the probability that her total points when she stops are `n` or fewer. The solution involves:
    - **Dynamic Programming (DP)**: We use a DP array where `dp[i]` represents the probability of reaching exactly `i` points (where `i < k`), since Alice stops once she reaches `k` or more points.
    - **Sliding Window**: To efficiently compute the sum of probabilities for the last `maxPts` states, we maintain a sliding window sum. This helps in updating the DP array in constant time per state.
    - **Probability Calculation**: For each state `i` (from 0 to `k-1`), we calculate the probability of transitioning to the next states. For stopping states (from `k` to `min(n, k-1 + maxPts)`), we compute the probability by considering valid transitions from states below `k`.

2. **Key Insights**:
    - **Initial State**: Alice starts at 0 points with probability 1.0.
    - **Transitions**: For each state `i` (0 ≤ `i` < `k`), the next state `i + j` (where `1 ≤ j ≤ maxPts`) can be reached with probability `dp[i] / maxPts`.
    - **Sliding Window**: The sum of probabilities for the last `maxPts` states is maintained to compute `dp[i]` efficiently.
    - **Stopping States**: The probability of stopping at a state `s` (where `k ≤ s ≤ min(n, k-1 + maxPts)`) is derived from the sum of probabilities of states from `max(0, s - maxPts)` to `min(s-1, k-1)`, multiplied by `1/maxPts`.

3. **Algorithm Selection**:
    - **Dynamic Programming with Sliding Window**: This allows efficient computation of transition probabilities in O(k) time.
    - **Summing Valid Stopping States**: For each stopping state, we compute the contribution from valid previous states in O(k) time, resulting in an overall O(k + maxPts) solution.

Let's implement this solution in PHP: **[837. New 21 Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000837-new-21-game/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @param Integer $maxPts
 * @return Float
 */
function new21Game($n, $k, $maxPts) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo number_format(new21Game(10, 1, 10), 5, '.', ''), PHP_EOL; // Output: 1.00000
echo number_format(new21Game(6, 1, 10), 5, '.', ''), PHP_EOL;  // Output: 0.60000
echo number_format(new21Game(21, 17, 10), 5, '.', ''), PHP_EOL; // Output: 0.73278
?>
```

### Explanation:

1. **Initialization**:
    - If `k` is 0, Alice stops immediately with 0 points, so the probability is 1.0.
    - The `dp` array is initialized to store probabilities of reaching each state from 0 to `k-1`. The initial state `dp[0]` is set to 1.0.

2. **Dynamic Programming with Sliding Window**:
    - For each state `i` from 1 to `k-1`, `dp[i]` is computed as the sum of probabilities of the last `maxPts` states (using `windowSum`), divided by `maxPts`.
    - The `windowSum` is updated by adding the current `dp[i]` and subtracting `dp[i - maxPts]` when `i` exceeds `maxPts` to maintain the sliding window.

3. **Probability Calculation for Stopping States**:
    - For each state `j` (0 ≤ `j` < `k`), we determine the range of stopping states `[lowS, highS]` that can be reached from `j` (i.e., from `j+1` to `j + maxPts`), bounded by `k` and `min(n, k-1 + maxPts)`.
    - The count of valid stopping states from `j` is `highS - lowS + 1`. The total probability is accumulated as the sum of `dp[j] * count` for all valid `j`.

4. **Result**: The accumulated probability is divided by `maxPts` to account for the uniform probability of drawing each number, yielding the final result.

This approach efficiently computes the desired probability using dynamic programming and a sliding window, ensuring optimal performance even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**