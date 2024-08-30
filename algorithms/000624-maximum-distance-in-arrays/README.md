624\. Maximum Distance in Arrays

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`

You are given `m` `arrays`, where each array is sorted in **ascending order**.

You can pick up two integers from two different arrays (each array picks one) and calculate the distance. We define the distance between two integers `a` and `b` to be their absolute difference `|a - b|`.

Return _the maximum distance_.

**Example 1:**

- **Input:** arrays = [[1,2,3],[4,5],[1,2,3]]
- **Output:** 4
- **Explanation:** One way to reach the maximum distance 4 is to pick 1 in the first or third array and pick 5 in the second array.

**Example 2:**

- **Input:** arrays = [[1],[1]]
- **Output:** 0

**Constraints:**

- <code>m == arrays.length</code>
- <code>2 <= m <= 10<sup>5</sup></code>
- <code>1 <= arrays[i].length <= 500</code>
- <code>-10<sup>4</sup>  <= arrays[i][j] <= 10<sup>4</sup></code>
- `arrays[i]` is sorted in **ascending order**.
- There will be at most <code>10<sup>5</sup></code> integers in all the arrays.


**Solution:**

We need to calculate the maximum possible distance between two integers, each picked from different arrays. The key observation is that the maximum distance will most likely be between the minimum value of one array and the maximum value of another array.

To solve this problem, we can follow these steps:

1. Track the minimum value and maximum value as you iterate through the arrays.
2. For each array, compute the potential maximum distance by comparing the current array's minimum with the global maximum and the current array's maximum with the global minimum.
3. Update the global minimum and maximum as you proceed.

Let's implement this solution in PHP: **[624. Maximum Distance in Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000624-maximum-distance-in-arrays/solution.php)**

```php
<?php
// Example usage:
$arrays1 = [[1,2,3],[4,5],[1,2,3]];
echo maxDistance($arrays1); // Output: 4

$arrays2 = [[1],[1]];
echo maxDistance($arrays2); // Output: 0
?>
```

### Explanation:

- **min_value** and **max_value** are initialized with the first array’s minimum and maximum values.
- As we iterate through each array starting from the second one:
   - We calculate the distance by comparing the global minimum with the current array’s maximum and the global maximum with the current array’s minimum.
   - Update the `max_distance` whenever a larger distance is found.
   - Update `min_value` and `max_value` to reflect the minimum and maximum values encountered so far.
- Finally, the function returns the maximum distance found.

This solution runs in O(m) time, where m is the number of arrays, making it efficient given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
