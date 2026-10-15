2913\. Subarrays Distinct Element Sum of Squares I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Binary Indexed Tree`, `Segment Tree`, `Biweekly Contest 116`

You are given a **0-indexed** integer array `nums`.

The **distinct count** of a subarray of `nums` is defined as:

- Let `nums[i..j]` be a subarray of `nums` consisting of all the indices from `i` to `j` such that `0 <= i <= j < nums.length`. Then the number of distinct values in `nums[i..j]` is called the distinct count of `nums[i..j]`.

Return the sum of the **squares** of **distinct counts** of all subarrays of `nums`.

A subarray is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,1]
- **Output:** 15
- **Explanation:** 
  - Six possible subarrays are:
    - [1]: 1 distinct value
    - [2]: 1 distinct value
    - [1]: 1 distinct value
    - [1,2]: 2 distinct values
    - [2,1]: 2 distinct values
    - [1,2,1]: 2 distinct values
  - The sum of the squares of the distinct counts in all subarrays is equal to 1² + 1² + 1² + 2² + 2² + 2² = 15.

**Example 2:**

- **Input:** nums = [1,1]
- **Output:** 3
- **Explanation:** 
  - Three possible subarrays are:
    - [1]: 1 distinct value
    - [1]: 1 distinct value
    - [1,1]: 1 distinct value
  - The sum of the squares of the distinct counts in all subarrays is equal to 1² + 1² + 1² = 3.

**Example 3:**

- **Input:** nums = [1]
- **Output:** 1

**Example 4:**

- **Input:** nums = [1,1,1]
- **Output:** 6

**Example 5:**

- **Input:** nums = [1,2,3]
- **Output:** 20

**Example 6:**

- **Input:** nums = [1,2,1,2]
- **Output:** 28

**Example 7:**

- **Input:** nums = [1,2,3,4]
- **Output:** 50

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**

1. Use a set/heap to keep track of distinct element counts.


**Solution:**

We solve the problem by enumerating every subarray using two nested loops. For each starting index, we maintain a hash set of seen values and increment the distinct count whenever a new value appears. Then we add the square of the current distinct count to the answer.

## Approach

- Initialize `answer = 0`.
- Loop over every possible starting index `i`.
- For each `i`, initialize an empty hash set `seen` and `distinct = 0`.
- Extend the subarray by moving `j` from `i` to `n - 1`.
- If `nums[j]` is not in `seen`, add it and increment `distinct`.
- Add `distinct * distinct` to `answer`.
- Return `answer`.

Let's implement this solution in PHP: **[2913. Subarrays Distinct Element Sum of Squares I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002913-subarrays-distinct-element-sum-of-squares-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function sumCounts(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumCounts([1,2,1]) .  "\n";        // Output: 15
echo sumCounts([1,1]) .  "\n";          // Output: 3
echo sumCounts([1]) .  "\n";            // Output: 1
echo sumCounts([1,1,1]) .  "\n";        // Output: 6
echo sumCounts([1,2,3]) .  "\n";        // Output: 20
echo sumCounts([1,2,1,2]) .  "\n";      // Output: 28
echo sumCounts([1,2,3,4]) .  "\n";      // Output: 50
?>
```

### Explanation:

- Every subarray is uniquely represented by `(i, j)`, so the nested loops cover all non-empty subarrays exactly once.
- For a fixed `i`, extending `j` adds only one new element to the previous subarray `nums[i..j-1]`.
- The hash set `seen` tracks which values already appear in the current subarray.
- If the new value is already in `seen`, the distinct count does not change.
- If the new value is new, the distinct count increases by `1`.
- We square the current distinct count and accumulate it into the final result.

## Complexity Analysis

- **Time Complexity:** `O(n²)`  
  There are `O(n²)` subarrays. Hash set operations are average `O(1)`.
- **Space Complexity:** `O(n)`  
  The `seen` hash set stores at most `n` distinct values for one starting index.
- **Constraints:** `n <= 100`, so `O(n²)` is easily fast enough.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**