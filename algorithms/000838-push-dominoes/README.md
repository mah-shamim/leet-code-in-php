838\. Push Dominoes

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`, `Dynamic Programming`

There are `n` dominoes in a line, and we place each domino vertically upright. In the beginning, we simultaneously push some of the dominoes either to the left or to the right.

After each second, each domino that is falling to the left pushes the adjacent domino on the left. Similarly, the dominoes falling to the right push their adjacent dominoes standing on the right.

When a vertical domino has dominoes falling on it from both sides, it stays still due to the balance of the forces.

For the purposes of this question, we will consider that a falling domino expends no additional force to a falling or already fallen domino.

You are given a string dominoes representing the initial state where:

- `dominoes[i] = 'L'`, if the <code>i<sub>th</sub></code> domino has been pushed to the left,
- `dominoes[i] = 'R'`, if the <code>i<sub>th</sub></code> domino has been pushed to the right, and
- `dominoes[i] = '.'`, if the <code>i<sub>th</sub></code> domino has not been pushed.

Return _a string representing the final state_.

**Example 1:**

- **Input:** dominoes = "RR.L"
- **Output:** "RR.L"
- **Explanation:** The first domino expends no additional force on the second domino.

**Example 2:**

![domino](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/05/18/domino.png)

- **Input:** dominoes = ".L.R...LR..L.."
- **Output:** "LL.RR.LLRRLL.."



**Constraints:**

- `n == dominoes.length`
- <code>1 <= n <= 10<sub>5</sub></code>
- `dominoes[i]` is either `'L'`, `'R'`, or `'.'`.




**Solution:**

We need to determine the final state of a line of dominoes after they have been pushed by forces from either the left or the right. The key challenge is to efficiently compute the effect of these forces without simulating each second step-by-step, which would be computationally expensive.

### Approach
1. **Track Forces from the Right (R):**
  - Iterate from left to right to compute the time it takes for each domino to be affected by the nearest 'R' to its left. If a domino is pushed by an 'R', it will start affecting subsequent dominoes until it encounters an 'L', which blocks the force.

2. **Track Forces from the Left (L):**
  - Iterate from right to left to compute the time it takes for each domino to be affected by the nearest 'L' to its right. If a domino is pushed by an 'L', it will start affecting preceding dominoes until it encounters an 'R', which blocks the force.

3. **Determine Final State:**
  - For each domino, compare the times computed from the left and right forces. The force that reaches the domino first determines its direction. If both forces reach at the same time, the domino remains upright.

Let's implement this solution in PHP: **[838. Push Dominoes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000838-push-dominoes/solution.php)**

```php
<?php
/**
 * @param String $dominoes
 * @return String
 */
function pushDominoes($dominoes) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usages
echo pushDominoes("RR.L") . "\n";              // Output: RR.L
echo pushDominoes(".L.R...LR..L..") . "\n";    // Output: LL.RR.LLRRLL..
?>
```

### Explanation:

1. **Tracking Forces from the Right (R):**
  - As we iterate from left to right, each 'R' resets the current force, and each subsequent domino (until blocked by an 'L') records the time it takes for the force to reach it.

2. **Tracking Forces from the Left (L):**
  - Similarly, as we iterate from right to left, each 'L' resets the current force, and each preceding domino (until blocked by an 'R') records the time it takes for the force to reach it.

3. **Combining Results:**
  - For each domino, we compare the times from both directions. The direction with the shorter time determines the domino's final state. If times are equal, the domino remains upright.

This approach efficiently computes the final state in O(n) time by leveraging two passes and comparing the nearest forces, ensuring optimal performance even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**