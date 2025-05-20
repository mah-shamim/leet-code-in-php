3355\. Zero Array Transformation I

**Difficulty:** Medium

**Topics:** `Array`, `Prefix Sum`

You are given an integer array `nums` of length `n` and a 2D array `queries`, where <code>queries[i] = [l<sub>i</sub>, r<sub>i</sub>]</code>.

For each `queries[i]`:

- Select a subset[^1] of indices within the range <code>[l<sub>i</sub>, r<sub>i</sub>]</code> in `nums`.
- Decrement the values at the selected indices by 1.

A **Zero Array** is an array where all elements are equal to 0.

Return `true` if it is _possible_ to transform `nums` into a **Zero Array** after processing all the queries sequentially, otherwise return `false`.

**Example 1:**

- **Input:** nums = [1,0,1], queries = [[0,2]]
- **Output:** true
- **Explanation:**
  - For i = 0:
    - Select the subset of indices as `[0, 2]` and decrement the values at these indices by 1.
    - The array will become `[0, 0, 0]`, which is a Zero Array.


**Example 2:**

- **Input:** nums = [4,3,2,1], queries = [[1,3],[0,2]]
- **Output:** false
- **Explanation:**
  - For i = 0:
    - Select the subset of indices as `[1, 2, 3]` and decrement the values at these indices by 1.
    - The array will become `[4, 2, 1, 0]`.
  - For i = 1:
    - Select the subset of indices as `[0, 1, 2]` and decrement the values at these indices by 1.
    - The array will become `[3, 1, 0, 0]`, which is not a Zero Array.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- `queries[i].length == 2`
- <code>0 <= l<sub>i</sub> <= r<sub>i</sub> < nums.length</code>


**Hint:**
1. Can we use difference array and prefix sum to check if an index can be made zero?

[^1]: **Subset**: `A subset of an array is a selection of elements (possibly none) of the array`.


**Solution:**

We need to determine if it's possible to transform an array into a zero array by processing a series of queries. Each query allows us to select a subset of indices within a specified range and decrement their values by 1. The goal is to check if we can apply these queries in such a way that all elements in the array become zero.

### Approach
1. **Difference Array for Range Updates**: We use a difference array to efficiently compute how many times each index is covered by the queries. This helps us determine the maximum number of times each element can be decremented.
2. **Check Coverage**: For each element in the array, we ensure that the number of queries covering it is at least as large as the element's value. If any element is covered by fewer queries than its value, it's impossible to reduce it to zero.
3. **Sum Check**: We also check if the total number of decrements required (sum of all elements) does not exceed the maximum possible decrements allowed by the queries. This is calculated as the sum of the lengths of all query ranges.

Let's implement this solution in PHP: **[3355. Zero Array Transformation I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003355-zero-array-transformation-i/solution.php)**

```php
<?php
/**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Boolean
     */
    function isZeroArray($nums, $queries) {
        $n = count($nums);
        $diff = array_fill(0, $n + 1, 0);

        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $diff[$l]++;
            if ($r + 1 < $n) {
                $diff[$r + 1]--;
            }
        }

        $current = 0;
        $Q = array();
        for ($i = 0; $i < $n; $i++) {
            $current += $diff[$i];
            $Q[$i] = $current;
        }

        foreach ($nums as $i => $val) {
            if ($Q[$i] < $val) {
                return false;
            }
        }

        $sum_ranges = 0;
        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $sum_ranges += ($r - $l + 1);
        }

        $sum_nums = array_sum($nums);
        if ($sum_nums > $sum_ranges) {
            return false;
        }

        return true;
    }

// Example usage:
$nums1 = [1, 0, 1];
$queries1 = [[0, 2]];
var_dump(isZeroArray($nums1, $queries1)); // true

$nums2 = [4, 3, 2, 1];
$queries2 = [[1, 3], [0, 2]];
var_dump(isZeroArray($nums2, $queries2)); // false
?>
```

### Explanation:

1. **Difference Array**: We use a difference array to track the start and end of each query's range. This allows us to efficiently compute the number of times each index is covered by the queries using a prefix sum.
2. **Coverage Check**: For each element, we check if the number of times it is covered by queries (stored in `Q[i]`) is at least its value. If not, transforming it to zero is impossible.
3. **Sum Check**: We ensure the total number of required decrements (sum of all elements) does not exceed the maximum possible decrements (sum of all query range lengths). This ensures that even if we use all possible decrements in each query, we can meet the required total.

By combining these checks, we efficiently determine if transforming the array into a zero array is feasible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**