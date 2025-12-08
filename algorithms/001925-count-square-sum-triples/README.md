1925\. Count Square Sum Triples

**Difficulty:** Easy

**Topics:** `Math`, `Enumeration`, `Biweekly Contest 56`

A **square triple** `(a,b,c)` is a triple where `a`, `b`, and `c` are **integers** and `a² + b² = c²`.

Given an integer `n`, return _the number of **square triples** such that `1 <= a, b, c <= n`_.

**Example 1:**

- **Input:** n = 5
- **Output:** 2
- **Explanation:** The square triples are (3,4,5) and (4,3,5).

**Example 2:**

- **Input:** n = 10
- **Output:** 2
- **Explanation:** The square triples are (3,4,5) and (4,3,5).

**Constraints:**

- `1 <= n <= 250`


**Hint:**
1. Iterate over all possible pairs `(a,b)` and check that the square root of `a * a + b * b` is an integers less than or equal `n`
2. You can check that the square root of an integer is an integer using binary seach or a builtin function like sqrt




**Similar Questions:**
1. [2475. Number of Unequal Triplets in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002475-number-of-unequal-triplets-in-array)






**Solution:**

We are given n and need to count triples `(a, b, c)` such that `a² + b² = c²`, with `1 <= a, b, c <= n`.
The problem is to count all such triples.

We can solve by iterating over a and b, then checking if a² + b² is a perfect square and that its square root (c) is <= n.

However, note that the examples show that (3,4,5) and (4,3,5) are counted as two separate triples because the order of a and b matters.

### Approach:

- Precompute all perfect squares from 1 to n and store them in a set for O(1) lookup
- Iterate through all possible pairs (a, b) where a ≤ b ≤ n to avoid duplicate counting
- For each pair, check if a² + b² is a perfect square present in our set
- If found, count both permutations (a,b,c) and (b,a,c) when a ≠ b, otherwise count once when a = b
- Return the total count

Let's implement this solution in PHP: **[1925. Count Square Sum Triples](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001925-count-square-sum-triples/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function countTriples($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countTriples(5) . "\n";        // Output: 2
echo countTriples(10) . "\n";       // Output: 4
?>
```

### Explanation:

- **Precomputation**: Create a lookup set of all c² values where 1 ≤ c ≤ n
- **Efficient Checking**: Instead of calculating square roots for each pair, use the set to check if a² + b² exists
- **Counting Logic**:
   - When a = b, only one unique ordering exists: (a, b, c)
   - When a ≠ b, two orderings exist: (a, b, c) and (b, a, c)
- **Complexity**: O(n²) time and O(n) space, which is efficient for n ≤ 250
- **Edge Cases**: Handles n = 1 correctly (returns 0 as no valid triples exist)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**