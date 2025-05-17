1552\. Magnetic Force Between Two Balls

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Sorting`

In the universe Earth C-137, Rick discovered a special form of magnetic force between two balls if they are put in his new invented basket. Rick has `n` empty baskets, the <code>i<sup>th</sup></code> basket is at `position[i]`, Morty has `m` balls and needs to distribute the balls into the baskets such that the **minimum magnetic force** between any two balls is **maximum**.

Rick stated that magnetic force between two different balls at positions `x` and `y` is `|x - y|`.

Given the integer array `position` and the integer `m`. Return _the required force_.

**Example 1:**

![q3v1](https://assets.leetcode.com/uploads/2020/08/11/q3v1.jpg)

- **Input:** position = [1,2,3,4,7], m = 3
- **Output:** 3
- **Explanation:** Distributing the 3 balls into baskets 1, 4 and 7 will make the magnetic force between ball pairs [3, 3, 6]. The minimum magnetic force is 3. We cannot achieve a larger minimum magnetic force than 3.

**Example 2:**

- **Input:** position = [5,4,3,2,1,1000000000], m = 2
- **Output:** 999999999
- **Explanation:** We can use baskets 1 and 1000000000.

**Constraints:**


- `n == position.length`
- `2 <= n <= 105`
- <code>1 <= position[i] <= 10<sup>9</sup></code>
- All integers in `position` are **distinct**.
- `2 <= m <= position.length`


**Hint:**
1. If you can place balls such that the answer is x then you can do it for y where y < x.
2. Similarly if you cannot place balls such that the answer is x then you can do it for y where y > x.
3. Binary search on the answer and greedily see if it is possible.



**Solution:**

We need to determine the maximum possible minimum magnetic force between any two balls placed in baskets at given positions. The magnetic force between two balls at positions `x` and `y` is defined as `|x - y|`. The goal is to distribute `m` balls such that the minimum magnetic force between any two balls is maximized.

### Approach
1. **Sort the Positions**: First, sort the array of basket positions to facilitate checking distances between consecutive baskets.
2. **Binary Search on Distance**: Use binary search to find the maximum possible minimum distance. The search range starts from 0 to the maximum possible distance between the first and last basket.
3. **Check Feasibility**: For each midpoint distance during the binary search, check if it's possible to place all `m` balls such that each consecutive pair of balls is at least that distance apart. This is done using a greedy approach where we place each ball in the earliest possible position that maintains the required minimum distance.

Let's implement this solution in PHP: **[1552. Magnetic Force Between Two Balls](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001552-magnetic-force-between-two-balls/solution.php)**

```php
<?php
/**
 * @param Integer[] $position
 * @param Integer $m
 * @return Integer
 */
function maxDistance($position, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $m
 * @param $d
 * @return bool
 */
private function canPlaceBalls($arr, $m, $d) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$position1 = array(1, 2, 3, 4, 7);
$m1 = 3;
echo maxDistance($position1, $m1) . "\n"; // Output: 3

$position2 = array(5, 4, 3, 2, 1, 1000000000);
$m2 = 2;
echo maxDistance($position2, $m2) . "\n"; // Output: 999999999
?>
```

### Explanation:

1. **Sorting**: The positions are sorted to ensure we can check distances in a sequential manner.
2. **Binary Search**: The binary search is performed over the possible values of the minimum distance. The search space is between 0 and the maximum distance between the first and last basket.
3. **Feasibility Check**: For each midpoint distance, the `canPlaceBalls` function checks if we can place `m` balls such that each consecutive pair is at least that distance apart. This is done by iterating through the sorted positions and counting how many balls can be placed while maintaining the required distance. If the count reaches `m`, the distance is feasible.

This approach efficiently narrows down the maximum possible minimum distance using binary search, ensuring an optimal solution with a time complexity of O(n log n) due to sorting and O(n log(max_distance)) due to the binary search and feasibility checks.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**




