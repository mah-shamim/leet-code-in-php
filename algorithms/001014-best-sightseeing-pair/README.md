1014\. Best Sightseeing Pair

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You are given an integer array `values` where `values[i]` represents the value of the <code>i<sup>th</sup></code> sightseeing spot. Two sightseeing spots `i` and `j` have a distance `j - i` between them.

The score of a pair (`i < j`) of sightseeing spots is `values[i] + values[j] + i - j`: the sum of the values of the sightseeing spots, minus the distance between them.

Return _the maximum score of a pair of sightseeing spots_.

**Example 1:**

- **Input:** values = [8,1,5,2,6]
- **Output:** 11
- **Explanation:** i = 0, j = 2, values[i] + values[j] + i - j = 8 + 5 + 0 - 2 = 11

**Example 2:**

- **Input:** values = [1,2]
- **Output:** 2



**Constraints:**

- <code>2 <= values.length <= 5 * 10<sup>4</sup></code>
- `1 <= values[i] <= 1000`


**Hint:**
1. Can you tell the best sightseeing spot in one pass (ie. as you iterate over the input?) What should we store or keep track of as we iterate to do this?



**Solution:**

We can use a single-pass approach with a linear time complexity _**O(n)**_. The idea is to keep track of the best possible `values[i] + i` as we iterate through the array. This allows us to maximize the score `values[i] + values[j] + i - j` for every valid pair `(i, j)`.

Let's implement this solution in PHP: **[1014. Best Sightseeing Pair](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001014-best-sightseeing-pair/solution.php)**

```php
<?php
/**
 * @param Integer[] $values
 * @return Integer
 */
function maxScoreSightseeingPair($values) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$values1 = [8, 1, 5, 2, 6];
echo maxScoreSightseeingPair($values1); // Output: 11

$values2 = [1, 2];
echo maxScoreSightseeingPair($values2); // Output: 2
?>
```

### Explanation:

1. **Initialization:**
   - `maxI` is initialized to `values[0]` because we start evaluating pairs from index `1`.
   - `maxScore` is initialized to `0` to track the maximum score.

2. **Iterate Over the Array:**
   - For each index `j` starting from `1`, calculate the score for the pair `(i, j)` using the formula:
     _**Score = maxI + values[j] - j**_
   - Update `maxScore` with the maximum value obtained.

3. **Update maxI:**
   - Update `maxI` to track the maximum possible value of `values[i] + i` for the next iterations.

4. **Return the Maximum Score:**
   - After iterating through the array, `maxScore` will contain the maximum score for any pair.

### Complexity:
- **Time Complexity:** _**O(n)**_ because we loop through the array once.
- **Space Complexity:** _**O(1)**_ as we use a constant amount of space.

This solution efficiently computes the maximum score while adhering to the constraints and is optimized for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
