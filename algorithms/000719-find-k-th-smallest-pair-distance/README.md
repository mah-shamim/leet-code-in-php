719\. Find K-th Smallest Pair Distance

**Difficulty:** Hard

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Sorting`

The **distance of a pair** of integers `a` and `b` is defined as the absolute difference between `a` and `b`.

Given an integer array `nums` and an integer `k`, return _the <code>k<sup>th</sup></code> smallest **distance among all the pairs** `nums[i]` and `nums[j]` where `0 <= i < j < nums.length`_.

**Example 1:**

- **Input:** nums = [1,3,1], k = 1
- **Output:** 0
- **Explanation:** Here are all the pairs:\
  (1,3) -> 2\
  (1,1) -> 0\
  (3,1) -> 2\
  Then the 1<sup>st</sup> smallest distance pair is (1,1), and its distance is 0.

**Example 2:**

- **Input:** nums = [1,1,1], k = 2
- **Output:** 0

**Example 3:**

- **Input:** nums = [1,6,1], k = 3
- **Output:** 5

**Constraints:**

- <code>n == nums.length</code>
- <code>2 <= n <= 10<sup>4</sup></code>
- <code>0 <= nums[i] <= 10<sup>6</sup></code>
- <code>1 <= k <= n * (n - 1) / 2</code>

**Hint:**
1. Binary search for the answer. How can you check how many pairs have distance <= X?


**Solution:**


We can use a combination of binary search and two-pointer technique. Here's a step-by-step approach to solving this problem:

### Approach:

1. **Sort the Array**: First, sort the array `nums`. Sorting helps in efficiently calculating the number of pairs with a distance less than or equal to a given value.

2. **Binary Search on Distance**: Use binary search to find the `k`-th smallest distance. The search space for the distances ranges from `0` (the smallest possible distance) to `max(nums) - min(nums)` (the largest possible distance).

3. **Count Pairs with Distance ≤ Mid**: For each mid value in the binary search, count the number of pairs with a distance less than or equal to `mid`. This can be done efficiently using a two-pointer approach.

4. **Adjust Binary Search Range**: Depending on the number of pairs with distance less than or equal to `mid`, adjust the binary search range. If the count is less than `k`, increase the lower bound; otherwise, decrease the upper bound.


Let's implement this solution in PHP: **[719. Find K-th Smallest Pair Distance](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000719-find-k-th-smallest-pair-distance/solution.php)**

```php
<?php
// Example usage:
$nums = [1, 3, 1];
$k = 1;
echo smallestDistancePair($nums, $k);  // Output: 0

?>
```

### Explanation:

- **countPairsWithDistanceLessThanOrEqualTo**: This function counts how many pairs have a distance less than or equal to `mid`. It uses two pointers, where `right` is the current element, and `left` is adjusted until the difference between `nums[right]` and `nums[left]` is less than or equal to `mid`.

- **smallestDistancePair**: This function uses binary search to find the `k`-th smallest distance. The `low` and `high` values define the current search range for the distances. The `mid` value is checked using the `countPairsWithDistanceLessThanOrEqualTo` function. Depending on the result, the search space is adjusted.

This algorithm efficiently finds the `k`-th smallest pair distance with a time complexity of `O(n log(max(nums) - min(nums)) + n log n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
