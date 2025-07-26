3480\. Maximize Subarrays After Removing One Conflicting Pair

**Difficulty:** Hard

**Topics:** `Array`, `Segment Tree`, `Enumeration`, `Prefix Sum`, `Weekly Contest 440`

You are given an integer `n` which represents an array `nums` containing the numbers from 1 to `n` in order. Additionally, you are given a 2D array `conflictingPairs`, where `conflictingPairs[i] = [a, b]` indicates that `a` and `b` form a conflicting pair.

Remove **exactly** one element from `conflictingPairs`. Afterward, count the number of non-empty subarrays[^1] of nums which do not contain both `a` and `b` for any remaining conflicting pair `[a, b]`.

Return _the **maximum** number of subarrays possible after removing **exactly** one conflicting pair_.

**Example 1:**

- **Input:** n = 4, conflictingPairs = [[2,3],[1,4]]
- **Output:** 9
- **Explanation:**
  - Remove `[2, 3]` from `conflictingPairs`. Now, `conflictingPairs = [[1, 4]]`.
  - There are 9 subarrays in `nums` where `[1, 4]` do not appear together. They are `[1]`, `[2]`, `[3]`, `[4]`, `[1, 2]`, `[2, 3]`, `[3, 4]`, `[1, 2, 3]` and `[2, 3, 4]`.
  - The maximum number of subarrays we can achieve after removing one element from `conflictingPairs` is 9.


**Example 2:**

- **Input:** n = 5, conflictingPairs = [[1,2],[2,5],[3,5]]
- **Output:** 12
- **Explanation:**
  - Remove `[1, 2]` from `conflictingPairs`. Now, `conflictingPairs = [[2, 5], [3, 5]]`.
  - There are 12 subarrays in `nums` where `[2, 5]` and `[3, 5]` do not appear together.
  - The maximum number of subarrays we can achieve after removing one element from `conflictingPairs` is 12.


**Example 3:**

- **Input:** n = 25, conflictingPairs = [[25,18],[2,13],[15,12],[12,15]]
- **Output:** 189

**Constraints:**

- <code>2 <= n <= 10<sup>5</sup></code>
- `1 <= conflictingPairs.length <= 2 * n`
- `conflictingPairs[i].length == 2`
- `1 <= conflictingPairs[i][j] <= n`
- `conflictingPairs[i][0] != conflictingPairs[i][1]`


**Hint:**
1. Let `f[i]` (where `i = 1, 2, 3, ..., n`) be the end index of the longest valid subarray (without any conflicting pair) starting at index `i`.
2. The answer is: `sigma(f[i] - i + 1) for i in [1..n]`, which simplifies to:` sigma(f[i]) - n * (n + 1) / 2 + n`.
3. Focus on maintaining `f[i]`.
4. If we have a conflicting pair `(x, y)` with `x < y`: 
   1. Sort the conflicting pairs by `y` values in non-increasing order. 
   2. Update each prefix of the `f` array accordingly.
5. Use a segment tree or another suitable data structure to maintain the range update and sum query efficiently.

[^1]: **Subarray:** A **subarray** is a contiguous non-empty sequence of elements within an array.




**Solution:**

We need to maximize the number of non-empty subarrays in an array `nums` (containing numbers from 1 to `n` in order) that do not contain any conflicting pair after removing exactly one conflicting pair from the given list of conflicting pairs.

### Approach
1. **Problem Analysis**: The problem involves removing one conflicting pair from the list and then counting the number of valid subarrays (subarrays that do not contain any remaining conflicting pairs). The key challenge is efficiently computing the valid subarrays for each possible removal and selecting the removal that yields the maximum count.

2. **Intuition**: The solution leverages the observation that a subarray is invalid if it contains both elements of any conflicting pair. For each possible removal of a conflicting pair, we need to compute the number of valid subarrays. The optimal approach involves:
    - **Normalization**: Convert each conflicting pair into a sorted form to handle symmetry.
    - **Multiplicity Handling**: Track the frequency of each normalized conflicting pair to determine if removing a pair eliminates the constraint.
    - **Precomputation**: For each starting index `i`, precompute the smallest `b` such that any conflicting pair `(a, b)` with `a >= i` exists. This helps in determining the earliest position where a subarray starting at `i` becomes invalid.
    - **Efficient Update**: For each removal candidate, update the constraints and compute the change in the number of valid subarrays by propagating the effect of the removal from the affected index backward.

3. **Algorithm Selection**:
    - **Normalization and Multiplicity Counting**: Process each conflicting pair to its sorted form and count occurrences.
    - **MinB Arrays**: Precompute arrays `minB_self` (smallest `b` for each `a`) and `minB0` (smallest `b` for any `a >= i`).
    - **Total Base Calculation**: Compute the total valid subarrays without any removal.
    - **Removal Impact**: For each removal candidate, if it's the only occurrence of its constraint, update the constraints and propagate the effect to compute the increase in valid subarrays.

4. **Complexity Analysis**:
    - **Time Complexity**: O(n + m) for preprocessing and O(m * n) in the worst case for propagation (where `m` is the number of conflicting pairs). However, early termination during propagation often reduces this.
    - **Space Complexity**: O(n) for storing various arrays and O(m) for tracking conflicting pairs.

Let's implement this solution in PHP: **[3480. Maximize Subarrays After Removing One Conflicting Pair](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003480-maximize-subarrays-after-removing-one-conflicting-pair/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $conflictingPairs
 * @return Integer
 */
function maxSubarrays($n, $conflictingPairs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$n1 = 4;
$pairs1 = [[2, 3], [1, 4]];
echo "Example 1 Output: " . maxSubarrays($n1, $pairs1) . "\n"; // 9

// Example 2
$n2 = 5;
$pairs2 = [[1, 2], [2, 5], [3, 5]];
echo "Example 2 Output: " . maxSubarrays($n2, $pairs2) . "\n"; // 12

// Example 3
$n3 = 25;
$pairs3 = [[25,18],[2,13],[15,12],[12,15]];
echo "Example 3 Output: " . maxSubarrays($n3, $pairs3) . "\n"; // 189
?>
```

### Explanation:

1. **Normalization and Multiplicity Handling**: Each conflicting pair is sorted to handle symmetry, and occurrences are counted to determine if removing a pair eliminates its constraint.
2. **MinB Arrays**: `minB_self` stores the smallest `b` for each `a`, and `minB0` stores the smallest `b` for any `a >= i`, computed in a backward pass.
3. **Base Calculation**: The total valid subarrays without any removal is computed using `minB0`.
4. **Removal Impact**: For each removal candidate, if it's the only occurrence of its constraint, the effect on `minB0` is propagated backward from the affected index to compute the increase in valid subarrays. The maximum increase across all removals is added to the base count for the result.

This approach efficiently handles the constraints by leveraging preprocessing and propagation with early termination, ensuring optimal performance for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)** 