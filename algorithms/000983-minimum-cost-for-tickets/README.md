983\. Minimum Cost For Tickets

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You have planned some train traveling one year in advance. The days of the year in which you will travel are given as an integer array `days`. Each day is an integer from `1` to `365`.

Train tickets are sold in **three different ways**:

- a **1-day** pass is sold for `costs[0]` dollars,
- a **7-day** pass is sold for `costs[1]` dollars, and
- a **30-day** pass is sold for `costs[2]` dollars.

The passes allow that many days of consecutive travel.

- For example, if we get a **7-day** pass on day `2`, then we can travel for `7` days: `2`, `3`, `4`, `5`, `6`, `7`, and `8`.

Return _the minimum number of dollars you need to travel every day in the given list of days_.

**Example 1:**

- **Input:** days = [1,4,6,7,8,20], costs = [2,7,15]
- **Output:** 11
- **Explanation:** For example, here is one way to buy passes that lets you travel your travel plan:
  On day 1, you bought a 1-day pass for costs[0] = $2, which covered day 1.
  On day 3, you bought a 7-day pass for costs[1] = $7, which covered days 3, 4, ..., 9.
  On day 20, you bought a 1-day pass for costs[0] = $2, which covered day 20.
  In total, you spent $11 and covered all the days of your travel.

**Example 2:**

- **Input:** days = [1,2,3,4,5,6,7,8,9,10,30,31], costs = [2,7,15]
- **Output:** 17
- **Explanation:** For example, here is one way to buy passes that lets you travel your travel plan:
  On day 1, you bought a 30-day pass for costs[2] = $15 which covered days 1, 2, ..., 30.
  On day 31, you bought a 1-day pass for costs[0] = $2 which covered day 31.
  In total, you spent $17 and covered all the days of your travel.



**Constraints:**

- `1 <= days.length <= 365`
- `1 <= days[i] <= 365`
- `days` is in strictly increasing order.
- `costs.length == 3`
- `1 <= costs[i] <= 1000`


**Solution:**

The problem involves determining the minimum cost to travel on a set of specified days throughout the year. The problem offers three types of travel passes: 1-day, 7-day, and 30-day passes, each with specific costs. The goal is to find the cheapest way to cover all travel days using these passes. The task requires using dynamic programming to efficiently calculate the minimal cost.

### Key Points

- **Dynamic Programming (DP)**: We are using dynamic programming to keep track of the minimum cost for each day.
- **Travel Days**: The travel days are provided in strictly increasing order, meaning we know exactly which days we need to travel.
- **Three Types of Passes**: For each day `d` in the `days` array, calculate the minimum cost by considering the cost of buying a pass that covers the current day `d`:
   - **1-day pass**: The cost would be the cost of the 1-day pass (`costs[0]`) added to the cost of the previous day (`dp[i-1]`).
   - **7-day pass**: The cost would be the cost of the 7-day pass (`costs[1]`) added to the cost of the most recent day that is within 7 days of `d`.
   - **30-day pass**: The cost would be the cost of the 30-day pass (`costs[2]`) added to the cost of the most recent day that is within 30 days of `d`.
- **Base Case**: The minimum cost for a day when no travel is done is 0.

### Approach

1. **DP Array**: We'll use a DP array `dp[]` where `dp[i]` represents the minimum cost to cover all travel days up to day `i`.
2. **Filling the DP Array**: For each day from 1 to 365:
   - If the day is a travel day, we calculate the minimum cost by considering:
      - The cost of using a 1-day pass.
      - The cost of using a 7-day pass.
      - The cost of using a 30-day pass.
   - If the day is not a travel day, the cost for that day will be the same as the previous day (`dp[i] = dp[i-1]`).
3. **Final Answer**: After filling the DP array, the minimum cost will be stored in `dp[365]`, which covers all possible travel days.

### Plan

1. Initialize an array `dp[]` of size 366 (one extra to handle up to day 365).
2. Set `dp[0]` to 0, as there is no cost for day 0.
3. Create a set `travelDays` to quickly check if a particular day is a travel day.
4. Iterate through each day from 1 to 365:
   - If it is a travel day, compute the minimum cost by considering each type of pass.
   - If not, carry over the previous day's cost.
5. Return the value at `dp[365]`.

Let's implement this solution in PHP: **[983. Minimum Cost For Tickets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000983-minimum-cost-for-tickets/solution.php)**

```php
<?php
/**
 * @param Integer[] $days
 * @param Integer[] $costs
 * @return Integer
 */
function mincostTickets($days, $costs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$days1 = [1, 4, 6, 7, 8, 20];
$costs1 = [2, 7, 15];
echo mincostTickets($days1, $costs1); // Output: 11

$days2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 30, 31];
$costs2 = [2, 7, 15];
echo mincostTickets($days2, $costs2); // Output: 17
?>
```

### Explanation:

- The algorithm iterates over each day of the year (365 days).
- For each travel day, it computes the cost by considering whether it is cheaper to:
   - Buy a 1-day pass (adds the cost of the 1-day pass to the previous day's cost).
   - Buy a 7-day pass (adds the cost of the 7-day pass and considers the cost of traveling on the past 7 days).
   - Buy a 30-day pass (adds the cost of the 30-day pass and considers the cost of traveling over the past 30 days).
- If it is not a travel day, the cost remains the same as the previous day.

### Example Walkthrough

#### Example 1:
**Input:**
```php
$days = [1, 4, 6, 7, 8, 20];
$costs = [2, 7, 15];
```
- **Day 1**: Buy a 1-day pass for $2.
- **Day 4**: Buy a 7-day pass for $7 (cover days 4 to 9).
- **Day 20**: Buy another 1-day pass for $2.

Total cost = $2 + $7 + $2 = **$11**.

#### Example 2:
**Input:**
```php
$days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 30, 31];
$costs = [2, 7, 15];
```
- **Day 1**: Buy a 30-day pass for $15 (cover days 1 to 30).
- **Day 31**: Buy a 1-day pass for $2.

Total cost = $15 + $2 = **$17**.

### Time Complexity

The time complexity of the solution is **O(365)**, as we are iterating through all days of the year, and for each day, we perform constant time operations (checking travel days and updating the DP array). Thus, the solution runs in linear time relative to the number of days.

### Output for Example

#### Example 1:
```php
$days = [1, 4, 6, 7, 8, 20];
$costs = [2, 7, 15];
echo mincostTickets($days, $costs); // Output: 11
```

#### Example 2:
```php
$days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 30, 31];
$costs = [2, 7, 15];
echo mincostTickets($days, $costs); // Output: 17
```

The solution efficiently calculates the minimum cost of covering the travel days using dynamic programming. By iterating over the days and considering all possible passes (1-day, 7-day, 30-day), the algorithm finds the optimal strategy for purchasing the passes. The time complexity is linear in terms of the number of days, making it suitable for the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**