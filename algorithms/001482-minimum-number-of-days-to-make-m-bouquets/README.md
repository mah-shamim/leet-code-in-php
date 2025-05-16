1482\. Minimum Number of Days to Make m Bouquets

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

You are given an integer array `bloomDay`, an integer `m` and an integer `k`.

You want to make `m` bouquets. To make a bouquet, you need to use `k` **adjacent flowers** from the garden.

The garden consists of `n` flowers, the <code>i<sup>th</sup></code> flower will bloom in the `bloomDay[i]` and then can be used in **exactly one** bouquet.

Return _the minimum number of days you need to wait to be able to make `m` bouquets from the garden_. If it is impossible to make m bouquets return `-1`.

**Example 1:**

- **Input:** bloomDay = [1,10,3,10,2], m = 3, k = 1
- **Output:** 3
- **Explanation:** Let us see what happened in the first three days. x means flower bloomed and _ means flower did not bloom in the garden.\
  We need 3 bouquets each should contain 1 flower.\
  After day 1: [x, _, _, _, _]   // we can only make one bouquet.\
  After day 2: [x, _, _, _, x]   // we can only make two bouquets.\
  After day 3: [x, _, x, _, x]   // we can make 3 bouquets. The answer is 3.

**Example 2:**

- **Input:** bloomDay = [1,10,3,10,2], m = 3, k = 2
- **Output:** -1
- **Explanation:** We need 3 bouquets each has 2 flowers, that means we need 6 flowers. We only have 5 flowers, so it is impossible to get the needed bouquets, and we return -1.

**Example 3:**

- **Input:** bloomDay = [7,7,7,7,12,7,7], m = 2, k = 3
- **Output:** 12
- **Explanation:** We need 2 bouquets each should have 3 flowers.\
  Here is the garden after the 7 and 12 days:\
  After day 7: [x, x, x, x, _, x, x]\
  We can make one bouquet of the first three flowers that bloomed. We cannot make another bouquet from the last three flowers that bloomed because they are not adjacent.\
  After day 12: [x, x, x, x, x, x, x]\
  It is obvious that we can make two bouquets in different ways.

**Constraints:**

- <code>bloomDay.length == n</code>
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= bloomDay[i] <= 10<sup>9</sup></code>
- <code>1 <= m <= 10<sup>6</sup></code>
- <code>1 <= k <= n</code>


**Hint:**
1. If we can make m or more bouquets at day x, then we can still make m or more bouquets at any day y > x.
2. We can check easily if we can make enough bouquets at day x if we can get group adjacent flowers at day x.



**Solution:**

The problem requires finding the minimum number of days to wait to make exactly `m` bouquets, each containing `k` adjacent flowers, using the array `bloomDay`. If it is not possible, return `-1`. The task is efficiently solved using a binary search approach on the number of days.

### Key Points
1. **Binary Search Feasibility**: The problem can be optimized using binary search because if it is possible to make `m` bouquets in `x` days, it will also be possible for all days greater than `x`.
2. **Adjacent Constraint**: Each bouquet requires `k` adjacent flowers. This introduces the need for sequential checks.
3. **Edge Case**: If `m * k > n`, it is impossible to make the bouquets, and the function should immediately return `-1`.

### Approach
1. **Binary Search on Days**:
  - Define the search range between `1` (minimum day) and `max(bloomDay)` (maximum day).
  - Use the midpoint (`mid`) to simulate whether it's possible to make `m` bouquets on that day.
2. **Checking Feasibility**:
  - Traverse the `bloomDay` array.
  - Count adjacent flowers blooming on or before day `mid`.
  - Check if the count satisfies the requirement to make `m` bouquets.
3. **Optimize the Search**:
  - If making `m` bouquets is possible on `mid` days, reduce the upper bound.
  - Otherwise, increase the lower bound.

### Plan
1. Initialize the binary search bounds (`start`, `end`).
2. Use a helper function `canMakeBouquets` to verify if `m` bouquets can be made on `mid` days.
3. Adjust the search bounds (`start`, `end`) based on the feasibility.
4. Return the minimum days found or `-1` if it is impossible.

Let's implement this solution in PHP: **[1482. Minimum Number of Days to Make m Bouquets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001482-minimum-number-of-days-to-make-m-bouquets/solution.php)**

```php
<?php
/**
 * @param Integer[] $bloomDay
 * @param Integer $m
 * @param Integer $k
 * @return Integer
 */
function minDays($bloomDay, $m, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param Integer[] $bloomDay
 * @param Float $mid
 * @param Integer $k
 * @return Integer
 */
function canMakeBouquets($bloomDay, $mid, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$bloomDay = [1,10,3,10,2];
$mid = 3;
$k = 1;
echo minDays($bloomDay, $mid, $k) . "\n"; // Output: 3

$bloomDay = [1,10,3,10,2];
$mid = 3;
$k = 2;
echo minDays($bloomDay, $mid, $k) . "\n"; // Output: -1

$bloomDay = [7,7,7,7,12,7,7];
$mid = 2;
$k = 3;
echo minDays($bloomDay, $mid, $k) . "\n"; // Output: 12
?>
```

### Explanation:

#### Helper Function: `canMakeBouquets`
- This function counts how many bouquets can be made in `mid` days.
- Traverse the array:
  - If the flower blooms within `mid` days, increment the count of adjacent flowers.
  - If the count reaches `k`, reset the counter and increment the number of bouquets.
- Return the number of bouquets formed.

#### Binary Search
- Start with `start = 1` and `end = max(bloomDay)`.
- For each midpoint:
  - Check if making `m` bouquets is feasible using `canMakeBouquets`.
  - If yes, update `minDays` and narrow the range to search for a smaller value.
  - If no, expand the search range.

### Example Walkthrough

#### Input:
```php
bloomDay = [1, 10, 3, 10, 2], m = 3, k = 1
```

#### Steps:
1. **Initial Search Range**: `start = 1`, `end = 10`.
2. **First Iteration**:
  - `mid = (1 + 10) // 2 = 5`
  - Call `canMakeBouquets([1, 10, 3, 10, 2], 5, 1)`.
  - Bouquet formation: `[x, _, x, _, x]` → Can make `3 bouquets`.
  - Update `minDays = 5`, narrow range to `start = 1`, `end = 4`.
3. **Second Iteration**:
  - `mid = (1 + 4) // 2 = 2`
  - Call `canMakeBouquets([1, 10, 3, 10, 2], 2, 1)`.
  - Bouquet formation: `[x, _, _, _, x]` → Can make `2 bouquets`.
  - Not feasible, expand range to `start = 3`.
4. **Third Iteration**:
  - `mid = (3 + 4) // 2 = 3`
  - Call `canMakeBouquets([1, 10, 3, 10, 2], 3, 1)`.
  - Bouquet formation: `[x, _, x, _, x]` → Can make `3 bouquets`.
  - Update `minDays = 3`, narrow range to `start = 3`, `end = 2`.

#### Output:
- The minimum number of days is `3`.

### Time Complexity
1. **Binary Search**: Runs in _**O(log(max bloomDay))**_.
2. **Feasibility Check**: Each feasibility check takes _**O(n)**_.
3. **Total Complexity**: _**O(n x log(max bloomDay))**_.

### Output for Examples
1. **Example 1**:
  - Input: `bloomDay = [1, 10, 3, 10, 2], m = 3, k = 1`
  - Output: `3`
2. **Example 2**:
  - Input: `bloomDay = [1, 10, 3, 10, 2], m = 3, k = 2`
  - Output: `-1`
3. **Example 3**:
  - Input: `bloomDay = [7, 7, 7, 7, 12, 7, 7], m = 2, k = 3`
  - Output: `12`

The solution efficiently determines the minimum days required using binary search and adjacent flower counting. It handles edge cases, such as insufficient flowers, and scales well with large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**