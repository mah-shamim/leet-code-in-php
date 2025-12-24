3074\. Apple Redistribution into Boxes

**Difficulty:** Easy

**Topics:** `Array`, `Greedy`, `Sorting`, `Weekly Contest 388`

You are given an array `apple` of size `n` and an array `capacity` of size `m`.

There are `n` packs where the `iᵗʰ` pack contains `apple[i]` apples. There are `m` boxes as well, and the `iᵗʰ` box has a capacity of `capacity[i]` apples.

Return _the **minimum** number of boxes you need to select to redistribute these `n` packs of apples into boxes_.

**Note** that, apples from the same pack can be distributed into different boxes.

**Example 1:**

- **Input:** apple = [1,3,2], capacity = [4,3,1,5,2]
- **Output:** 2
- **Explanation:** We will use boxes with capacities 4 and 5.
  It is possible to distribute the apples as the total capacity is greater than or equal to the total number of apples.

**Example 2:**

- **Input:** apple = [5,5,5], capacity = [2,4,2,7]
- **Output:** 4
- **Explanation:** We will need to use all the boxes.

**Constraints:**

- `1 <= n == apple.length <= 50`
- `1 <= m == capacity.length <= 50`
- `1 <= apple[i], capacity[i] <= 50`
- The input is generated such that it's possible to redistribute packs of apples into boxes.



**Hint:**
1. Sort array `capacity` in non-decreasing order.
2. Greedily select boxes with the largest capacities to redistribute apples optimally.






**Solution:**

We need to find the minimum number of boxes required to hold all apples. This is essentially a "knapsack-like" problem where I want to use the fewest boxes while having enough total capacity for all apples.

### Approach:

- **Calculate Total Apples**: Sum all apples from the apple array.
- **Sort Box Capacities**: Sort the capacity array in descending order to use the largest boxes first.
- **Accumulate Capacities**: Iterate through the sorted capacities, accumulating until the sum equals or exceeds the total apples.
- **Count Boxes**: Track how many boxes are used during accumulation.

Let's implement this solution in PHP: **[3074. Apple Redistribution into Boxes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003074-maximize-the-number-of-partitions-after-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $apple
 * @param Integer[] $capacity
 * @return Integer
 */
function minimumBoxes($apple, $capacity) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumBoxes([1, 3, 2], [4, 3, 1, 5, 2]) . "\n";   // Output: 2
echo minimumBoxes([5, 5, 5], [2, 4, 2, 7]) . "\n";      // Output: 4
echo minimumBoxes([2, 1, 3], [5, 10, 2]);               // Output: 1 (only need box with capacity 10)
?>
```

### Explanation:

- The goal is to minimize the number of boxes by using the largest available boxes first.
- By sorting capacities in descending order and accumulating from the largest, we ensure the minimum box count.
- The loop stops when accumulated capacity meets or exceeds total apples, returning the number of boxes used.
- If total apples exceed all capacities (handled by constraints), all boxes are used.

### Complexity Analysis

- **Time Complexity**: O(m log m) where m is the length of the capacity array (due to sorting)
- **Space Complexity**: O(1) (not counting input storage)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**