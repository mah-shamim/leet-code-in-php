2364\. Count Number of Bad Pairs

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Counting`

You are given a **0-indexed** integer array `nums`. A pair of indices `(i, j)` is a **bad pair** if `i < j` and `j - i != nums[j] - nums[i]`.

Return _the total number of **bad pairs** in `nums`_.

**Example 1:**

- **Input:** nums = [4,1,3,3]
- **Output:** 5
- **Explanation:** 
  The pair (0, 1) is a bad pair since 1 - 0 != 1 - 4.
  The pair (0, 2) is a bad pair since 2 - 0 != 3 - 4, 2 != -1.
  The pair (0, 3) is a bad pair since 3 - 0 != 3 - 4, 3 != -1.
  The pair (1, 2) is a bad pair since 2 - 1 != 3 - 1, 1 != 2.
  The pair (2, 3) is a bad pair since 3 - 2 != 3 - 3, 1 != 0.
  There are a total of 5 bad pairs, so we return 5.

**Example 2:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 0
- **Explanation:** There are no bad pairs.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. Would it be easier to count the number of pairs that are not bad pairs?
2. Notice that (j - i != nums[j] - nums[i]) is the same as (nums[i] - i != nums[j] - j).
3. Keep a counter of nums[i] - i. To be efficient, use a HashMap.



**Solution:**

We need to count the number of bad pairs in a given array. A pair (i, j) is considered bad if i < j and j - i != nums[j] - nums[i]. Directly checking each pair would be inefficient, so we use a mathematical approach to optimize the solution.

### Approach
1. **Identify Good Pairs**: A pair (i, j) is good if j - i == nums[j] - nums[i]. This can be rearranged to nums[i] - i == nums[j] - j. Thus, elements with the same value of (nums[i] - i) form groups of good pairs.
2. **Count Good Pairs**: For each group of elements with the same (nums[i] - i) value, the number of good pairs is given by the combination formula m*(m-1)/2, where m is the size of the group.
3. **Calculate Total Pairs**: The total number of pairs (i, j) where i < j is given by n*(n-1)/2, where n is the length of the array.
4. **Compute Bad Pairs**: Subtract the number of good pairs from the total pairs to get the number of bad pairs.

Let's implement this solution in PHP: **[2364. Count Number of Bad Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002364-count-number-of-bad-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countBadPairs($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [4, 1, 3, 3];
echo "Output: " . countBadPairs($nums1) . "\n"; // Output: 5

// Example 2
$nums2 = [1, 2, 3, 4, 5];
echo "Output: " . countBadPairs($nums2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Total Pairs Calculation**: The total number of pairs (i, j) where i < j is calculated using the formula n*(n-1)/2.
2. **Frequency Map**: We create a frequency map to count occurrences of each value (nums[i] - i). This helps identify groups of elements that can form good pairs.
3. **Good Pairs Calculation**: For each group with m elements, the number of good pairs is m*(m-1)/2. Summing these values gives the total number of good pairs.
4. **Result Calculation**: Subtract the number of good pairs from the total pairs to get the number of bad pairs.

This approach efficiently reduces the problem complexity from O(n^2) to O(n) by leveraging mathematical insights and hash maps for frequency counting.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**