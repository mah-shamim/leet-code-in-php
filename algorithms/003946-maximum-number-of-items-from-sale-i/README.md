3946\. Maximum Number of Items From Sale I

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Dynamic Programming`, `Greedy`, `Weekly Contest 504`

You are given a 2D integer array `items`, where `items[i] = [factorᵢ, priceᵢ]` represents the `iᵗʰ` item. You are also given an integer `budget`.

There are unlimited copies of each item available for purchase.You may buy any number of copies of any items such that the total cost of the purchased copies is at most `budget`.

After buying items, you may receive free copies according to the following rules:

- For each item `i` that you bought **at least one copy** of, you receive **one free copy** of every item `j` such that `j != i` and `factorᵢ` divides `factorⱼ`.
- Buying multiple copies of the same item `i` does **not** give additional free copies through item `i`.
- The same item `j` can be received multiple times for free if it is received from purchases of different item types.

Return _the **maximum total number of item copies** you can obtain, including both purchased copies and free copies, while spending at most `budget` on purchased items_.

**Example 1:**

- **Input:** items = [[6,2],[2,6],[3,4]], budget = 9
- **Output:** 4
- **Explanation:**
  - You can buy 2 copies of item 0 and 1 copy of item 2 for a total cost of `2 * 2 + 4 = 8`, which is not greater than `budget = 9`.
  - Buying item 2 gives 1 free copy of item 0, because `factor₂ = 3` divides `factor₀ = 6`.
  - You leave with 3 purchased copies and 1 free copy, for a total of 4 item copies.


**Example 2:**

- **Input:** items = [[2,4],[3,2],[4,1],[6,4],[12,4]], budget = 8
- **Output:** 10
- **Explanation:**
  - You can buy 1 copy of item 0, 1 copy of item 1, and 2 copies of item 2 for a total cost of `4 + 2 + 2 * 1 = 8`.
  - Buying item 0 gives 1 free copy of items 2, 3, and 4.
  - Buying item 1 gives 1 free copy of items 3 and 4.
  - Buying item 2 gives 1 free copy of item 4.
  - Thus, you receive 6 free copies. You leave with 4 purchased copies and 6 free copies, for a total of 10 item copies.
    **Example 3:**

- **Input:** items = [[1,1]], budget = 1
- **Output:** 1

**Example 4:**

- **Input:** items = [[1,1]], budget = 5
- **Output:** 5

**Example 5:**

- **Input:** items = [[2,1],[2,100]], budget = 1
- **Output:** 2

**Example 6:**

- **Input:** items = [[1,1],[2,1]], budget = 2
- **Output:** 3

**Constraints:**

- `1 <= items.length <= 1000`
- `items[i] = [factorᵢ, priceᵢ]`
- `1 <= factorᵢ, priceᵢ <= 1500`
- `1 <= budget <= 1500`


**Hint:**

1. Precompute for every possible factor `f`, how many items have a factor divisible by `f`.
2. Buying the first copy of item `i` is special: it gives the purchased copy plus one free copy of every other item whose factor is divisible by `factor_i`.
3. Buying more copies of the same item does not create more free copies, so after the first copy, each extra purchase only adds one item copy.
4. This suggests a knapsack-style DP over item types and remaining budget, where each item can either be skipped, bought for the first time, or bought additional times after it has already been activated.



**Solution:**

We precompute how many item types each factor can activate for free, then use a budget DP over item types. For each item type, the first purchased copy is special because it gives the item plus all free copies whose factors are divisible by its factor; any additional purchased copy only adds one more item copy.

## Approach

- Compute `cntDiv[f]` = number of item types whose factor is divisible by `f`.
  - For each item factor, enumerate its divisors and increment `cntDiv[d]`.
- For an item `i`, buying its first copy gives:
  - `1` purchased copy
  - plus `cntDiv[factor_i] - 1` free copies, excluding item `i` itself.
- Use knapsack-style DP:
  - `dp[b]` = maximum total copies obtainable with budget at most `b`.
  - For each item type, consider:
    - Skip the item.
    - Buy the first copy to activate its free-copy bonus.
    - Buy extra copies after activation, each giving exactly `+1` copy.
- Process extra copies with an ascending budget loop so unlimited copies of the same item can be bought.

Let's implement this solution in PHP: **[3946. Maximum Number of Items From Sale I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003946-maximum-number-of-items-from-sale-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $items
 * @param Integer $budget
 * @return Integer
 */
function maximumSaleItems(array $items, int $budget): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumSaleItems([[6,2],[2,6],[3,4]], 9) .  "\n";                          // Output: 4
echo maximumSaleItems([[2,4],[3,2],[4,1],[6,4],[12,4]], 8) .  "\n";             // Output: 10
echo maximumSaleItems([[1,1]], 1) .  "\n";                                      // Output: 1
echo maximumSaleItems([[1,1]], 5) .  "\n";                                      // Output: 5
echo maximumSaleItems([[2,1],[2,100]], 1) .  "\n";                              // Output: 2
echo maximumSaleItems([[1,1],[2,1]], 2) .  "\n";                                // Output: 3
?>
```

## Explanation

- `cntDiv` is built by factorizing each item’s factor. If `d` divides `factor_i`, then item `i` contributes to `cntDiv[d]`.
- The first purchase transition uses the old `dp` array:
  - `newDp[b] = max(newDp[b], dp[b - price] + 1 + freeCopies)`
  - This ensures the free-copy bonus is gained only once per item type.
- The additional-copy transition uses the updated `newDp` array:
  - `newDp[b] = max(newDp[b], newDp[b - price] + 1)`
  - This allows buying multiple extra copies of the same item.
- The final answer is `dp[budget]`, the maximum total copies with at most the given budget.

## Complexity Analysis

- Precomputation:
  - `O(n * sqrt(1500))` time, since each factor is processed by enumerating divisors up to its square root.
- DP:
  - `O(n * budget)` time.
- Total time:
  - `O(n * sqrt(1500) + n * budget)`, effectively `O(n * budget)` under the constraints.
- Space:
  - `O(1500 + budget)` for `cntDiv` and the DP arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**