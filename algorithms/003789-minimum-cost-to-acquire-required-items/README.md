3789\. Minimum Cost to Acquire Required Items

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Greedy`, `Weekly Contest 482`

You are given five integers `cost1`, `cost2`, `costBoth`, `need1`, and `need2`.

There are three types of items available:

- An item of **type 1** costs `cost1` and contributes 1 unit to the type 1 requirement only.
- An item of **type 2** costs `cost2` and contributes 1 unit to the type 2 requirement only.
- An item of **type 3** costs `costBoth` and contributes 1 unit to **both** type 1 and type 2 requirements.

You must collect enough items so that the total contribution toward type 1 is **at least** `need1` and the total contribution toward type 2 is **at least** `need2`.

Return _an integer representing the **minimum** possible total cost to achieve these requirements_.

**Example 1:**

- **Input:** cost1 = 3, cost2 = 2, costBoth = 1, need1 = 3, need2 = 2
- **Output:** 3
- **Explanation:**
  - After buying three type 3 items, which cost `3 * 1 = 3`, the total contribution to type 1 is 3 (`>= need1 = 3`) and to type 2 is 3 (`>= need2 = 2`).
  - Any other valid combination would cost more, so the minimum total cost is 3.

**Example 2:**

- **Input:** cost1 = 5, cost2 = 4, costBoth = 15, need1 = 2, need2 = 3
- **Output:** 22
- **Explanation:**
  - We buy `need1 = 2` items of type 1 and `need2 = 3` items of type 2: `2 * 5 + 3 * 4 = 10 + 12 = 22`.
  - Any other valid combination would cost more, so the minimum total cost is 22.

**Example 3:**

- **Input:** cost1 = 5, cost2 = 4, costBoth = 15, need1 = 0, need2 = 0
- **Output:** 0
- **Explanation:** Since no items are required (`need1 = need2 = 0`), we buy nothing and pay 0.

**Example 4:**

- **Input:** cost1 = 1, cost2 = 1, costBoth = 100, need1 = 0, need2 = 5
- **Output:** 5

**Example 5:**

- **Input:** cost1 = 100, cost2 = 100, costBoth = 1, need1 = 5, need2 = 5
- **Output:** 5

**Example 6:**

- **Input:** cost1 = 10, cost2 = 10, costBoth = 5, need1 = 3, need2 = 7
- **Output:** 35

**Example 7:**

- **Input:** cost1 = 1, cost2 = 1, costBoth = 2, need1 = 10, need2 = 10
- **Output:** 20

**Example 8:**

- **Input:** cost1 = 1000000, cost2 = 1000000, costBoth = 1000000, need1 = 1000000000, need2 = 1000000000
- **Output:** 1000000000000000

**Example 9:**

- **Input:** cost1 = 1, cost2 = 1000000, costBoth = 1000000, need1 = 1000000000, need2 = 1
- **Output:** 1000999999

**Example 10:**

- **Input:** cost1 = 3, cost2 = 1, costBoth = 2, need1 = 3, need2 = 5
- **Output:** 8

**Example 11:**

- **Input:** cost1 = 5, cost2 = 100, costBoth = 100, need1 = 1000000000, need2 = 1
- **Output:** 5000000095

**Constraints:**

- `1 <= cost1, cost2, costBoth <= 10⁶`
- `0 <= need1, need2 <= 10⁹`


**Hint:**

1. First, use `min(costBoth, cost1 + cost2)` for `min(need1, need2)`.
2. For the remaining type 1 requirement `rem1`, use cost `min(costBoth, cost1)` for the rest.
3. Do the same for type 2, using cost `min(costBoth, cost2)`.


**Solution:**

We solve this by decomposing the demand into a "common" part that both item types can cover together and two "residual" parts. For the common part `min(need1, need2)`, we pay the cheaper of buying one type-3 item or one type-1 + one type-2 item. For whatever remains in `need1` (or `need2`), we pay the cheaper of a type-3 item or the corresponding single-type item. Summing these three parts yields the minimum total cost in O(1) time.

## Approach

- Compute `common = min(need1, need2)` — the number of units needed by **both** requirements simultaneously.
- Cost of the common part = `common * min(costBoth, cost1 + cost2)`. Reason: covering one unit of both requirements costs either a single type-3 item (`costBoth`) or one type-1 plus one type-2 item (`cost1 + cost2`).
- Let `rem1 = need1 - common` and `rem2 = need2 - common` — the leftover units required by only one of the two types.
- Cost for `rem1` = `rem1 * min(costBoth, cost1)` — a type-3 item also satisfies type-1, so it competes with type-1.
- Cost for `rem2` = `rem2 * min(costBoth, cost2)` — symmetrically.

Let's implement this solution in PHP: **[3789. Minimum Cost to Acquire Required Items](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003789-minimum-cost-to-acquire-required-items/solution.php)**

```php
<?php
/**
 * @param Integer $cost1
 * @param Integer $cost2
 * @param Integer $costBoth
 * @param Integer $need1
 * @param Integer $need2
 * @return Integer
 */
function minimumCost(int $cost1, int $cost2, int $costBoth, int $need1, int $need2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumCost(3, 2, 1, 3, 2) .  "\n";                                            // Output: 3
echo minimumCost(5, 4, 15, 2, 3) .  "\n";                                           // Output: 22
echo minimumCost(5, 4, 15, 0, 0) .  "\n";                                           // Output: 0
echo minimumCost(1, 1, 100, 0, 5) .  "\n";                                          // Output: 5
echo minimumCost(100, 100, 1, 5, 5) .  "\n";                                        // Output: 5
echo minimumCost(10, 10, 5, 3, 7) .  "\n";                                          // Output: 35
echo minimumCost(1, 1, 2, 10, 10) .  "\n";                                          // Output: 20
echo minimumCost(1000000, 1000000, 1000000, 1000000000, 1000000000) .  "\n";        // Output: 1000000000000000
echo minimumCost(1, 1000000, 1000000, 1000000000, 1) .  "\n";                       // Output: 1000999999
echo minimumCost(3, 1, 2, 3, 5) .  "\n";                                            // Output: 8
echo minimumCost(5, 100, 100, 1000000000, 1) .  "\n";                               // Output: 5000000095
?>
```

## Explanation

- **Why "common first"?** Every unit of `min(need1, need2)` must be covered by *something* that contributes to both types simultaneously, or by two separate items. Since type-3 is a strict alternative to a type-1 + type-2 pair for these units, we should choose the cheaper of the two for exactly `common` units. Buying more type-3 than `common` would just be paying type-3 prices to satisfy a residual — which is handled in the next step.
- **Why is the residual independent?** Once `min(need1, need2)` is satisfied, the remaining requirement (say `need1 > need2`) is only on type 1. A type-1 item costs `cost1`; a type-3 item costs `costBoth` and works just as well (the extra type-2 contribution is wasted but free). So we take the cheaper of `cost1` and `costBoth`.
- **Correctness intuition:** We effectively reduce the problem by "shrinking" both requirements by `common`. For each shrunk unit, the choice of cheaper substitute is locally optimal because the two decisions (common vs. residual) affect disjoint sets of units — the common units are needed by both sides; the residual units by only one side.
- **Edge cases handled automatically:**
  - `need1 == 0` or `need2 == 0` → `common = 0`, residual handled directly.
  - `costBoth` very cheap → picks type-3 for everything.
  - `costBoth` very expensive → picks pure type-1/type-2 purchases.
  - `cost1 + cost2 < costBoth` → for the common part, uses two single items instead of one type-3.

## Complexity Analysis

- **Time Complexity:** `O(1)` — only a constant number of arithmetic operations (`min`, `*`, `-`, `+`).
- **Space Complexity:** `O(1)` — no auxiliary data structures used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**