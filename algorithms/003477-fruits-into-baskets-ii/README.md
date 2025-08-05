3477\. Fruits Into Baskets II

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Segment Tree`, `Simulation`, `Ordered Set`, `Weekly Contest 440`

You are given two arrays of integers, `fruits` and `baskets`, each of length `n`, where `fruits[i]` represents the **quantity** of the <code>i<sup>th</sup></code> type of fruit, and `baskets[j]` represents the capacity of the <code>j<sup>th</sup></code> basket.

From left to right, place the fruits according to these rules:

- Each fruit type must be placed in the **leftmost available basket** with a capacity **greater than or equal** to the quantity of that fruit type.
- Each basket can hold **only one** type of fruit.
- If a fruit type **cannot be placed** in any basket, it remains **unplaced**.

Return _the number of fruit types that remain unplaced after all possible allocations are made_.

**Example 1:**

- **Input:** fruits = [4,2,5], baskets = [3,5,4]
- **Output:** 1
- **Explanation:**
  - `fruits[0] = 4` is placed in `baskets[1] = 5`.
  - `fruits[1] = 2` is placed in `baskets[0] = 3`.
  - `fruits[2] = 5` cannot be placed in `baskets[2] = 4`.

Since one fruit type remains unplaced, we return 1.

**Example 2:**

- **Input:** fruits = [3,6,1], baskets = [6,4,7]
- **Output:** 0
- **Explanation:**
  - `fruits[0] = 3` is placed in `baskets[0] = 6`.
  - `fruits[1] = 6` cannot be placed in `baskets[1] = 4` (insufficient capacity) but can be placed in the next available basket, `baskets[2] = 7`.
  - `fruits[2] = 1` is placed in `baskets[1] = 4`.

Since all fruits are successfully placed, we return 0.

**Constraints:**

- `n == fruits.length == baskets.length`
- `1 <= n <= 100`
- `1 <= fruits[i], baskets[i] <= 1000`



**Hint:**
1. Simulate the operations for each fruit as described



**Similar Questions:**
1. [904. Fruit Into Baskets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000904-fruit-into-baskets)






**Solution:**

We need to determine the number of fruit types that remain unplaced after attempting to place each fruit type into the leftmost available basket that can accommodate it. The key challenge is efficiently matching each fruit to the earliest basket that meets the capacity requirement while ensuring each basket is used only once.

### Approach
1. **Problem Analysis**: The problem involves two arrays, `fruits` and `baskets`, each of the same length. Each fruit must be placed in the leftmost basket that has sufficient capacity (i.e., the basket's capacity is at least the fruit's quantity) and is not already used. If no such basket is available, the fruit remains unplaced.
2. **Intuition**: For each fruit, we scan the baskets from left to right to find the first available basket that can hold the fruit. Once found, we mark the basket as used and proceed to the next fruit. If no basket is found, the fruit is counted as unplaced.
3. **Algorithm Selection**: We use a simple simulation approach. We maintain a boolean array to track which baskets have been used. For each fruit, we iterate through the baskets in order, checking for the first available basket that meets the capacity requirement. The algorithm efficiently handles the constraints given the problem size (n ≤ 100).
4. **Complexity Analysis**: The algorithm involves a nested loop where each fruit is processed in O(n) time, leading to an overall time complexity of O(n²). The space complexity is O(n) for the boolean array tracking used baskets.

Let's implement this solution in PHP: **[3477. Fruits Into Baskets II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003477-fruits-into-baskets-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $fruits
 * @param Integer[] $baskets
 * @return Integer
 */
function numOfUnplacedFruits($fruits, $baskets) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// === Example usage ===

// Example 1:
$fruits1 = array(4, 2, 5);
$baskets1 = array(3, 5, 4);
$result1 = numOfUnplacedFruits($fruits1, $baskets1);
echo "Example 1 Output: " . $result1 . "\n"; // expected 1

// Example 2:
$fruits2 = array(3, 6, 1);
$baskets2 = array(6, 4, 7);
$result2 = numOfUnplacedFruits($fruits2, $baskets2);
echo "Example 2 Output: " . $result2 . "\n"; // expected 0
?>
```

### Explanation:

1. **Initialization**: We start by determining the number of fruits (or baskets) `n`. We initialize a boolean array `taken` to keep track of which baskets have been used, setting all entries to `false` initially. The variable `unplaced` counts the number of fruits that cannot be placed.
2. **Processing Fruits**: For each fruit in the array:
    - We scan the baskets from left to right.
    - For each basket, if it is not taken and its capacity is sufficient for the current fruit, we mark it as taken and move to the next fruit.
    - If no suitable basket is found during the scan, we increment the `unplaced` count.
3. **Result**: After processing all fruits, the value of `unplaced` gives the number of fruit types that could not be placed into any basket, which is returned as the result.

This approach efficiently matches each fruit to the earliest available basket, ensuring optimal placement while adhering to the problem constraints. The solution is straightforward and leverages direct simulation to achieve the desired outcome.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**