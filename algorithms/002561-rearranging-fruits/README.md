2561\. Rearranging Fruits

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Greedy`, `Sort`, `Weekly Contest 331`

You have two fruit baskets containing `n` fruits each. You are given two **0-indexed** integer arrays `basket1` and `basket2` representing the cost of fruit in each basket. You want to make both baskets **equal**. To do so, you can use the following operation as many times as you want:

- Chose two indices `i` and `j`, and swap the <code>i<sup>th</sup></code> fruit of `basket1` with the <code>j<sup>th</sup></code> fruit of `basket2`.
- The cost of the swap is `min(basket1[i],basket2[j])`.

Two baskets are considered equal if sorting them according to the fruit cost makes them exactly the same baskets.

Return _the minimum cost to make both the baskets equal or `-1` if impossible_.

**Example 1:**

- **Input:** basket1 = [4,2,2,2], basket2 = [1,4,1,2]
- **Output:** 1
- **Explanation:** Swap index 1 of basket1 with index 0 of basket2, which has cost 1. Now basket1 = [4,1,2,2] and basket2 = [2,4,1,2]. Rearranging both the arrays makes them equal.

**Example 2:**

- **Input:** basket1 = [2,3,4,1], basket2 = [3,2,5,1]
- **Output:** -1
- **Explanation:** It can be shown that it is impossible to make both the baskets equal.

**Constraints:**

- `basket1.length == basket2.length`
- <code>1 <= basket1.length <= 10<sup>5</sup></code>
- <code>1 <= basket1[i],basket2[i] <= 10<sup>9</sup></code>


**Hint:**
1. Create two frequency maps for both arrays, and find the minimum element among all elements of both arrays.
2. Check if the sum of frequencies of an element in both arrays is odd, if so return `-1`
3. Store the elements that need to be swapped in a vector, and sort it.
4. Can we reduce swapping cost with the help of minimum element?
5. Calculate the minimum cost of swapping.


**Similar Questions:**
1. [2332. The Latest Time to Catch a Bus](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002332-the-latest-time-to-catch-a-bus)
2. [2449. Minimum Number of Operations to Make Arrays Similar](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002449-minimum-number-of-operations-to-make-arrays-similar)






**Solution:**

We need to determine the minimum cost required to make two fruit baskets equal by swapping fruits between them. The cost of each swap is defined as the minimum of the costs of the two fruits being swapped. If it's impossible to make the baskets equal, we should return -1.

### Approach
1. **Frequency Analysis**:
    - First, we calculate the total frequency of each fruit across both baskets. If any fruit has an odd total frequency, it's impossible to split them equally between the two baskets, so we return -1 immediately.

2. **Global Minimum Fruit Cost**:
    - Identify the global minimum fruit cost (`m`) from both baskets. This value is crucial as it can be used to minimize the swap cost by acting as an intermediary in swaps.

3. **Net Transfer Calculation**:
    - For each fruit, compute the net transfer required for the first basket to reach half of its total frequency (since each basket must contain exactly half of each fruit's total frequency). A positive net indicates an excess in the first basket, while a negative net indicates a deficit.

4. **Swap List Construction**:
    - Construct a frequency map (`freq_swap`) where each fruit's value is the absolute value of its net transfer. This map represents the number of times each fruit needs to be moved (either out of the first basket for excess or into it for deficit).

5. **Cost Calculation**:
    - The total number of swaps required is half the sum of all values in `freq_swap` (since each swap handles one fruit from each basket).
    - Sort the distinct fruits by their cost. For each fruit in ascending order, calculate the contribution to the total cost by taking the minimum of the fruit's cost and twice the global minimum cost, multiplied by the number of such fruits that can be included in the swaps until the required number of swaps is met.

Let's implement this solution in PHP: **[2561. Rearranging Fruits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002561-rearranging-fruits/solution.php)**

```php
<?php
/**
 * @param Integer[] $basket1
 * @param Integer[] $basket2
 * @return Integer
 */
function minCost($basket1, $basket2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$basket1 = [4, 2, 2, 2];
$basket2 = [1, 4, 1, 2];
echo minCost($basket1, $basket2) . PHP_EOL; // Output: 1

// Example 2
$basket1 = [2, 3, 4, 1];
$basket2 = [3, 2, 5, 1];
echo minCost($basket1, $basket2) . PHP_EOL; // Output: -1?>
```

### Explanation:

1. **Frequency Analysis**: We first count the occurrences of each fruit in both baskets. If any fruit's total count is odd, it's impossible to split them equally, so we return -1.
2. **Global Minimum**: The smallest fruit cost from either basket is identified (`m`), which helps in minimizing swap costs by potentially using it as an intermediary.
3. **Net Transfer**: For each fruit, we calculate how many need to be moved in or out of the first basket to balance both baskets. This involves computing the difference between the current count in the first basket and half the total count of that fruit.
4. **Swap List**: We prepare a frequency map (`freq_swap`) where each fruit's entry indicates the number of times it needs to be moved (absolute value of net transfer).
5. **Cost Calculation**: The total swaps needed is half the sum of all values in `freq_swap`. We then sort the distinct fruits by cost. For each fruit, starting from the cheapest, we calculate the cost contribution as the minimum of the fruit's cost or twice the global minimum, multiplied by the number of such fruits we can process until all required swaps are accounted for. This approach ensures we minimize the total cost by leveraging cheaper fruits or the global minimum effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**