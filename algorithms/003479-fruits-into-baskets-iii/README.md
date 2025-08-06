3479\. Fruits Into Baskets III

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Segment Tree`, `Ordered Set`, `Weekly Contest 440`

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
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= fruits[i], baskets[i] <= 10<sup>9</sup></code>



**Hint:**
1. Sort the baskets by the pair of `(basket[i], i)` in the array.
2. For each fruit from left to right, use binary search to find the first index in the sorted array such that `basket[i] >= fruit`.
3. Use a segment tree to maintain the smallest original indices where `basket[i] >= fruit`.
4. When a valid index is found, set the corresponding point to infinity to mark it as used.


**Similar Questions:**
1. [3161. Block Placement Queries](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003161-block-placement-queries)






**Solution:**

We need to efficiently allocate fruits to baskets following specific rules: each fruit must be placed in the leftmost available basket with a capacity greater than or equal to the fruit's quantity. The solution involves sorting the baskets by their capacity and original indices, then using a segment tree to efficiently query and update the smallest original index of available baskets that meet the capacity requirement for each fruit.

### Approach
1. **Problem Analysis**: The problem requires placing each fruit in the leftmost basket that can accommodate it (i.e., basket capacity >= fruit quantity). Each basket can hold only one type of fruit. The challenge is to efficiently determine, for each fruit, the leftmost available basket that meets the capacity requirement, especially given the constraints (n ≤ 10^5).

2. **Intuition**: By sorting the baskets based on their capacity and original indices, we can use binary search to quickly locate the range of baskets that meet the capacity requirement for a given fruit. A segment tree is then used to maintain the smallest original index of available baskets within this range, allowing efficient querying and updating.

3. **Algorithm Selection**:
    - **Sorting**: Baskets are sorted by capacity and then by original index to facilitate binary search.
    - **Binary Search**: For each fruit, find the first basket in the sorted list that meets or exceeds the fruit's quantity.
    - **Segment Tree**: A min-segment tree is built over the original indices of the baskets (sorted by capacity). This tree supports:
        - **Range Minimum Query**: To find the smallest original index in the range of baskets that meet the capacity requirement.
        - **Point Update**: To mark a basket as used by setting its value to infinity after allocation.

4. **Complexity Analysis**:
    - **Sorting**: O(n log n) time.
    - **Binary Search**: O(log n) per fruit, total O(n log n).
    - **Segment Tree Operations**: Both query and update operations are O(log n) per fruit, leading to O(n log n) total time complexity.
    - **Space Complexity**: O(n) for storing the segment tree and auxiliary arrays.

Let's implement this solution in PHP: **[3479. Fruits Into Baskets III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003479-fruits-into-baskets-iii/solution.php)**

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

// Test cases
$fruits = array(4, 2, 5);
$baskets = array(3, 5, 4);
echo numOfUnplacedFruits($fruits, $baskets) . "\n"; // Output: 1

$fruits2 = array(3, 6, 1);
$baskets2 = array(6, 4, 7);
echo numOfUnplacedFruits($fruits2, $baskets2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Sorting Baskets**: The baskets are sorted by their capacity and original indices. This allows efficient binary search to find the range of baskets that can accommodate a given fruit.
2. **Segment Tree Construction**: A segment tree is built over the original indices of the sorted baskets. This tree helps in efficiently querying the smallest original index (leftmost basket) in a range of baskets that meet the capacity requirement.
3. **Processing Fruits**: For each fruit:
    - **Binary Search**: Determines the first basket in the sorted list that can hold the fruit (capacity ≥ fruit quantity).
    - **Query Segment Tree**: Finds the smallest original index (leftmost basket) in the valid range of baskets.
    - **Update Segment Tree**: Marks the selected basket as used by setting its value to infinity in the segment tree.
4. **Result Calculation**: The count of fruits that could not be placed in any basket is returned.

This approach efficiently handles the constraints by leveraging sorting, binary search, and segment tree operations to ensure optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**