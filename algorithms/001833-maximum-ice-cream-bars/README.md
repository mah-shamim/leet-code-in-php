1833\. Maximum Ice Cream Bars

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Greedy`, `Sorting`, `Counting Sort`, `Weekly Contest 237`

It is a sweltering summer day, and a boy wants to buy some ice cream bars.

At the store, there are `n` ice cream bars. You are given an array `costs` of length `n`, where `costs[i]` is the price of the `iᵗʰ` ice cream bar in coins. The boy initially has `coins` coins to spend, and he wants to buy as many ice cream bars as possible.

**Note:** The boy can buy the ice cream bars in any order.

Return _the **maximum** number of ice cream bars the boy can buy with `coins` coins_.

You must solve the problem by counting sort.

**Example 1:**

- **Input:** costs = [1,3,2,4,1], coins = 7
- **Output:** 4
- **Explanation:** The boy can buy ice cream bars at indices 0,1,2,4 for a total price of 1 + 3 + 2 + 1 = 7.

**Example 2:**

- **Input:** costs = [10,6,8,7,7,8], coins = 5
- **Output:** 0
- **Explanation:** The boy cannot afford any of the ice cream bars.

**Example 3:**

- **Input:** costs = [1,6,3,1,2,5], coins = 20
- **Output:** 6
- **Explanation:** The boy can buy all the ice cream bars for a total price of 1 + 6 + 3 + 1 + 2 + 5 = 18.

**Constraints:**

- `costs.length == n`
- `1 <= n <= 10⁵`
- `1 <= costs[i] <= 10⁵`
- `1 <= coins <= 10⁸`


**Hint:**
1. It is always optimal to buy the least expensive ice cream bar first.
2. Sort the prices so that the cheapest ice cream bar comes first.


**Solution:**

We implement a counting sort–based solution to maximize the number of ice cream bars purchased. Instead of using a comparison-based sort (O(n log n)), we take advantage of the bounded price range (1 ≤ costs[i] ≤ 10⁵) to count frequencies and then greedily buy the cheapest bars first. This approach processes prices in ascending order, buying as many as possible at each price level until the coins run out.

## Approach

- **Counting frequencies** – Since `costs[i]` are within a known range (1 to 10⁵), we create a frequency array where `freq[price]` stores how many bars cost that exact amount.
- **Greedy purchase strategy** – We iterate prices from 1 upward (cheapest to most expensive). At each price, we buy as many bars as possible using `min(freq[price], floor(coins / price))`.
- **Update remaining coins** – Subtract the total spent on bars of this price from `coins`.
- **Early termination** – If after purchasing at a given price, the remaining coins are less than the next price, we stop because all subsequent prices are higher.
- **Counting sort avoids sorting overhead** – This approach runs in O(n + maxCost) time instead of O(n log n), meeting the problem's requirement to use counting sort.

Let's implement this solution in PHP: **[1833. Maximum Ice Cream Bars](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001833-maximum-ice-cream-bars/solution.php)**

```php
<?php
/**
 * @param Integer[] $costs
 * @param Integer $coins
 * @return Integer
 */
function maxIceCream(array $costs, int $coins): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxIceCream([1,3,2,4,1], 7) .  "\n";           // Output: 4
echo maxIceCream([10,6,8,7,7,8], 5) .  "\n";        // Output: 0
echo maxIceCream([1,6,3,1,2,5], 20) .  "\n";        // Output: 6
?>
```

### Explanation:

- **Why buy cheapest first?** – To maximize the count of items purchased, we must minimize the cost per item. Buying the least expensive bars first is always optimal (greedy choice property).
- **Frequency counting** – We map each price to its frequency, eliminating the need to sort the original array. This is efficient when the maximum price is bounded (_**10⁵**_).
- **Step-by-step consumption** – For each price level, we calculate the maximum affordable quantity. We purchase that many, reduce the coin balance, and accumulate the count.
- **Break condition** – If we cannot afford even one more bar at the current price after buying some, we break. If we fully exhaust a price level and still have coins, we move to the next price.
- **Total count returned** – The accumulated `count` is the maximum number of bars the boy can buy.

## Complexity Analysis

- **Time Complexity:** _**O(n + maxCost)**_ – one pass to build the frequency array and one pass through the price range.
   - `n` = number of bars _**(1 ≤ n ≤ 10⁵)**_
   - `maxCost` = maximum price in costs _**(≤ 10⁵)**_
- **Space Complexity:** _**O(maxCost)**_ for the frequency array. If we consider the input array itself, it's _**O(n)**_, but auxiliary space is _**O(maxCost)**_.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**