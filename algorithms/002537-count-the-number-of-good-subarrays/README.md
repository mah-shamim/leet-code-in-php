2537\. Count the Number of Good Subarrays

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sliding Window`

Given an integer array `nums` and an integer `k`, return _the number of **good** subarrays of `nums`_.

A subarray `arr` is **good** if there are **at least** `k` pairs of indices `(i, j)` such that `i < j` and `arr[i] == arr[j]`.

A subarray is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,1,1,1,1], k = 10
- **Output:** 1
- **Explanation:** The only good subarray is the array nums itself.

**Example 2:**

- **Input:** nums = [3,1,4,3,2,2,4], k = 2
- **Output:** 4
- **Explanation:** There are 4 different good subarrays:
  - [3,1,4,3,2,2] that has 2 pairs.
  - [3,1,4,3,2,2,4] that has 3 pairs.
  - [1,4,3,2,2,4] that has 2 pairs.
  - [4,3,2,2,4] that has 2 pairs.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i], k <= 10<sup>9</sup></code>


**Hint:**
1. For a fixed index l, try to find the minimum value of index r, such that the subarray is not good
2. When a number is added to a subarray, it increases the number of pairs by its previous appearances.
3. When a number is removed from the subarray, it decreases the number of pairs by its remaining appearances.
4. Maintain 2-pointers l and r such that we can keep in account the number of equal pairs.



**Solution:**

We need to count the number of good subarrays in a given array. A good subarray is defined as one where there are at least `k` pairs of indices `(i, j)` such that `i < j` and `arr[i] == arr[j]`.

### Approach
The approach to solve this problem efficiently involves using a sliding window technique combined with a hash map to track the frequency of elements within the current window. Here are the key steps:

1. **Sliding Window Technique**: Maintain a window using two pointers, `left` and `right`, to explore all possible subarrays.
2. **Frequency Tracking**: Use a hash map to keep track of the frequency of each element within the current window. This helps in efficiently calculating the number of pairs contributed by each element.
3. **Sum of Pairs Calculation**: For each element added to the window, the number of pairs increases by the current frequency of that element before it was added. Similarly, when an element is removed from the window, the number of pairs decreases by the new frequency of that element after removal.
4. **Expand and Shrink Window**: Expand the window by moving the `right` pointer to include more elements until the number of pairs meets or exceeds `k`. Once the condition is met, count all valid subarrays ending at the current `right` pointer and shrink the window by moving the `left` pointer to find smaller valid subarrays.

Let's implement this solution in PHP: **[2537. Count the Number of Good Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002537-count-the-number-of-good-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countGood($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = array(1,1,1,1,1);
$k1 = 10;
echo countGood($nums1, $k1) . "\n"; // Output: 1

// Example 2
$nums2 = array(3,1,4,3,2,2,4);
$k2 = 2;
echo countGood($nums2, $k2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Initialization**: Initialize pointers `left` and `right` at the start of the array, a hash map `frequency` to track element frequencies, `sum_pairs` to track the number of valid pairs, and `result` to accumulate the count of good subarrays.
2. **Expand Window**: Move the `right` pointer to expand the window. For each new element added, update its frequency and adjust `sum_pairs` by adding the previous frequency of that element (since each existing occurrence forms a new pair).
3. **Count Valid Subarrays**: Once the window contains enough pairs (sum_pairs >= k), all subarrays starting from the current `left` to the current `right` (and beyond) are valid. Add the count of these valid subarrays to `result`.
4. **Shrink Window**: Move the `left` pointer to shrink the window, adjusting the frequency and `sum_pairs` accordingly. This ensures that we explore all possible valid subarrays starting from each position.

This approach efficiently counts all valid subarrays in linear time, O(n), by ensuring each element is processed at most twice (once added and once removed from the window).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**