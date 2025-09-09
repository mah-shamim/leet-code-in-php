2327\. Number of People Aware of a Secret

**Difficulty:** Medium

**Topics:** `Dynamic Programming`, `Queue`, `Simulation`, `Weekly Contest 300`

On day `1`, one person discovers a secret.

You are given an integer `delay`, which means that each person will **share** the secret with a new person **every day**, starting from `delay` days after discovering the secret. You are also given an integer `forget`, which means that each person will **forget** the secret `forget` days after discovering it. A person **cannot** share the secret on the same day they forgot it, or on any day afterwards.

Given an integer `n`, return _the number of people who know the secret at the end of day `n`_. Since the answer may be very large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** n = 6, delay = 2, forget = 4
- **Output:** 5
- **Explanation:**
  Day 1: Suppose the first person is named A. (1 person)
  Day 2: A is the only person who knows the secret. (1 person)
  Day 3: A shares the secret with a new person, B. (2 people)
  Day 4: A shares the secret with a new person, C. (3 people)
  Day 5: A forgets the secret, and B shares the secret with a new person, D. (3 people)
  Day 6: B shares the secret with E, and C shares the secret with F. (5 people)

**Example 2:**

- **Input:** n = 4, delay = 1, forget = 3
- **Output:** 6
- **Explanation:**
  Day 1: The first person is named A. (1 person)
  Day 2: A shares the secret with B. (2 people)
  Day 3: A and B share the secret with 2 new people, C and D. (4 people)
  Day 4: A forgets the secret. B, C, and D share the secret with 3 new people. (6 people)

**Constraints:**

- `2 <= n <= 1000`
- `1 <= delay < forget <= n`



**Hint:**
1. Let `dp[i][j]` be the number of people who have known the secret for exactly `j + 1` days, at day `i`.
2. If `j > 0`, `dp[i][j] = dp[i – 1][j – 1]`.
3. `dp[i][0] = sum(dp[i – 1][j])` for `j` in `[delay – 1, forget – 2]`.






**Solution:**

We need to determine the number of people who know a secret by the end of day `n`, considering that each person shares the secret with a new person every day starting from `delay` days after discovering it, and forgets the secret `forget` days after discovering it. The challenge is to model the propagation and forgetting of the secret over time efficiently.

### Approach
1. **Dynamic Programming (DP) Setup**: We use a DP array `dp` where `dp[i]` represents the number of people who discover the secret on day `i`.
2. **Initialization**: On day 1, one person discovers the secret, so `dp[1] = 1`.
3. **Propagation Calculation**: For each subsequent day `i` (from 2 to `n`), the number of new people who discover the secret is the sum of people who started sharing from day `i - forget + 1` to day `i - delay`. This is because a person who discovered the secret on day `j` will share it from day `j + delay` to day `j + forget - 1`.
4. **Result Calculation**: The total number of people who know the secret by day `n` is the sum of people who discovered the secret from day `n - forget + 1` to day `n`. These are the people who haven't forgotten the secret by day `n`.

Let's implement this solution in PHP: **[2327. Number of People Aware of a Secret](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002327-number-of-people-aware-of-a-secret/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $delay
 * @param Integer $forget
 * @return Integer
 */
function peopleAwareOfSecret($n, $delay, $forget) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo peopleAwareOfSecret(6, 2, 4) . "\n"; // Output: 5
echo peopleAwareOfSecret(4, 1, 3) . "\n"; // Output: 6
?>
```

### Explanation:

1. **Initialization**: The array `dp` is initialized to store the number of people who discover the secret each day. The first day is initialized with one person.
2. **DP Array Calculation**: For each day `i`, we calculate the number of new people who learn the secret by summing the contributions from all people who started sharing between day `i - forget + 1` and day `i - delay`. This ensures we only count people who are still actively sharing the secret on day `i`.
3. **Result Calculation**: The result is obtained by summing the values in the `dp` array from day `n - forget + 1` to day `n`. This accounts for all people who discovered the secret recently enough that they haven't forgotten it by day `n`.
4. **Modulo Operation**: All operations are performed modulo _**10<sup>9</sup> + 7**_ to handle large numbers and prevent overflow.

This approach efficiently tracks the propagation of the secret over time using dynamic programming, ensuring correctness while adhering to the constraints. The complexity is _**O(n<sup>2</sup>)**_, which is feasible given the constraints _**n ≤ 1000**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**