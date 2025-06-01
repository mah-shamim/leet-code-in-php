2929\. Distribute Candies Among Children II

**Difficulty:** Medium

**Topics:** `Math`, `Combinatorics`, `Enumeration`

You are given two positive integers `n` and `limit`.

Return _the **total number** of ways to distribute `n` candies among `3` children such that no child gets more than `limit` candies_.

**Example 1:**

- **Input:** n = 5, limit = 2
- **Output:** 3
- **Explanation:** There are 3 ways to distribute 5 candies such that no child gets more than 2 candies: (1, 2, 2), (2, 1, 2) and (2, 2, 1).

**Example 2:**

- **Input:** n = 3, limit = 3
- **Output:** 10
- **Explanation:** There are 10 ways to distribute 3 candies such that no child gets more than 3 candies: (0, 0, 3), (0, 1, 2), (0, 2, 1), (0, 3, 0), (1, 0, 2), (1, 1, 1), (1, 2, 0), (2, 0, 1), (2, 1, 0) and (3, 0, 0).



**Constraints:**

- <code>1 <= n <= 10<sup>6</sup></code>
- <code>1 <= limit <= 10<sup>6</sup></code>


**Hint:**
1. We can enumerate the number of candies of one particular child, let it be `i` which means `0 <= i <= min(limit, n)`.
2. Suppose the 2nd child gets `j` candies. Then `0 <= j <= limit` and `i + j <= n`.
3. The 3rd child will hence get `n - i - j` candies and we should have `0 <= n - i - j <= limit`.
4. After some transformations, for each `i`, we have `max(0, n - i - limit) <= j <= min(limit, n - i)`, each `j` corresponding to a solution. So the number of solutions for some `i` is `max(min(limit, n - i) - max(0, n - i - limit) + 1, 0)`. Sum the expression for every `i` in `[0, min(n, limit)]`.



**Solution:**

We need to determine the number of ways to distribute `n` candies among 3 children such that no child receives more than `limit` candies. The solution involves using combinatorial mathematics and the inclusion-exclusion principle to efficiently compute the result without iterating through all possible distributions.

### Approach
1. **Problem Analysis**: The problem requires counting the number of non-negative integer solutions to the equation _**x<sub>1</sub> + x<sub>2</sub> + x<sub>3</sub> = n**_ where _**0 ≤ x<sub>i</sub> ≤ limit**_ for each _**i**_.

2. **Combinatorial Insight**: The total number of non-negative solutions to the equation without any constraints is given by the stars and bars formula, which is _**(n + 2)/2**_. However, we need to subtract the solutions that violate the constraint _**x<sub>i</sub> ≤ limit**_.

3. **Inclusion-Exclusion Principle**: To account for the constraints, we use the inclusion-exclusion principle:
    - **Total Solutions**: Calculate all possible solutions without constraints.
    - **Subtract Invalid Solutions**: Subtract solutions where at least one child exceeds the limit. This involves considering cases where one child has at least _**limit + 1**_ candies.
    - **Add Back Over-Subtracted Solutions**: Add back solutions where two children exceed the limit (since these were subtracted twice).
    - **Subtract Over-Added Solutions**: Subtract solutions where all three children exceed the limit (since these were added back in the previous step).

4. **Efficiency**: The inclusion-exclusion approach allows us to compute the result in constant time _**O(1)**_ using combinatorial formulas, making it efficient even for large values of _**n**_ and _**limit**_.

Let's implement this solution in PHP: **[2929. Distribute Candies Among Children II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002929-distribute-candies-among-children-ii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $limit
 * @return Integer
 */
function distributeCandies($n, $limit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo distributeCandies(5, 2) . "\n"; // Output: 3
echo distributeCandies(3, 3) . "\n"; // Output: 10
?>
```

### Explanation:

1. **Helper Function _**f(x)**_**: This function calculates the number of non-negative integer solutions to _**x<sub>1</sub> + x<sub>2</sub> + x<sub>3</sub> = x**_ using the stars and bars formula _**(x + 2)/2**_. If _**x**_ is negative, it returns 0 since no solutions exist.

2. **Total Solutions**: The term _**f(n)**_ computes all possible distributions of `n` candies without any constraints.

3. **Subtracting Invalid Solutions**: The term _**-3 x f(n - limit - 1)**_ accounts for the cases where at least one child receives more than `limit` candies. Here, _**n - limit - 1**_ adjusts the remaining candies after one child takes _**limit + 1**_ candies.

4. **Adding Back Over-Subtracted Solutions**: The term _**+3 x f(n - 2 x limit - 2)**_ corrects for the over-subtraction of cases where two children each exceed the limit by _**limit + 1**_ candies.

5. **Subtracting Over-Added Solutions**: The term _**-f(n - 3 x limit - 3)**_ adjusts for cases where all three children exceed the limit, ensuring these solutions are not counted.

6. **Result Calculation**: The final result combines these terms to give the number of valid distributions, casting to an integer to ensure the result is correctly formatted.

This approach efficiently computes the solution using combinatorial mathematics, avoiding the need for brute-force iteration and handling large values within optimal time complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**