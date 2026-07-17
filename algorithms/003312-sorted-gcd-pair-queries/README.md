3312\. Sorted GCD Pair Queries

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Hash Table`, `Math`, `Binary Search`, `Combinatorics`, `Counting`, `Number Theory`, `Prefix Sum`, `Weekly Contest 418`

You are given an integer array `nums` of length `n` and an integer array `queries`.

Let `gcdPairs` denote an array obtained by calculating the GCD[^1] of all possible pairs `(nums[i], nums[j])`, where `0 <= i < j < n`, and then sorting these values in **ascending** order.

For each query `queries[i]`, you need to find the element at index `queries[i]` in `gcdPairs`.

Return an integer array `answer`, where `answer[i]` is the value at `gcdPairs[queries[i]]` for each query.

The term `gcd(a, b)` denotes the **greatest common divisor** of `a` and `b`.

[^1]: **GCD:** The term `gcd(a, b)` denotes the **greatest common divisor** of `a` and `b`.

**Example 1:**

- **Input:** nums = [2,3,4], queries = [0,2,2]
- **Output:** [1,2,2]
- **Explanation:**
   - `gcdPairs = [gcd(nums[0], nums[1]), gcd(nums[0], nums[2]), gcd(nums[1], nums[2])] = [1, 2, 1]`.
   - After sorting in ascending order, `gcdPairs = [1, 1, 2]`.
   - So, the answer is `[gcdPairs[queries[0]], gcdPairs[queries[1]], gcdPairs[queries[2]]] = [1, 2, 2]`.

**Example 2:**

- **Input:** nums = [4,4,2,1], queries = [5,3,1,0]
- **Output:** [4,2,1,1]
- **Explanation:** `gcdPairs` sorted in ascending order is `[1, 1, 1, 2, 2, 4]`.

**Example 3:**

- **Input:** nums = [2,2], queries = [0,0]
- **Output:** [2,2]
- **Explanation:** `gcdPairs = [2]`.

**Example 4:**

- **Input:** nums = [6,17,1,10], queries = [5,2,3,1,4,0]
- **Output:** [2,1,1,1,1,1]

**Example 5:**

- **Input:** nums = [5,5,5,5], queries = [0,3,5]
- **Output:** [5,5,5]

**Example 6:**

- **Input:** nums = [1,50000,2,49999], queries = [0,5]
- **Output:** [1,1]

**Example 7:**

- **Input:**  nums = [1,2,3,4,5], queries = [0,9]
- **Output:** [1,2]

**Example 8:**

- **Input:** nums = [6,6,10,15,15], queries = [2,5,8]
- **Output:** [3,5,6]

**Example 9:**

- **Input:** nums = [6,12,18,24], queries = [0,5]
- **Output:** [6,6]


**Constraints:**

- `2 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= 5 * 10⁴`
- `1 <= queries.length <= 10⁵`
- `0 <= queries[i] < n * (n - 1) / 2`


**Hint:**
1. Try counting the number of pairs that have a GCD of `g`
2. Use inclusion-exclusion.


**Solution:**

We have implemented an efficient solution for the "Sorted GCD Pair Queries" problem that processes up to `100,000` numbers and queries. Our approach avoids generating all GCD pairs explicitly (which would be _**O(n²)**_ and infeasible), instead using number theory and prefix sums to answer queries in _**O(M log M + Q log M)**_ time, where _**M**_ is the maximum value in nums `(≤ 50,000)`.

## Approach

- **Frequency Counting**: Count occurrences of each number in nums using an array indexed by value up to max(nums)
- **Multiples Counting**: For each possible GCD value d, count how many numbers in nums are divisible by `d` using a sieve-like approach
- **Total Pairs per Multiple**: Calculate the total number of pairs where both numbers are divisible by `d` using combinatorial formula `C`(cnt, 2)
- **Inclusion-Exclusion**: Compute exact GCD counts by iterating from largest to smallest value, subtracting multiples' exact GCD counts from the total pairs divisible by d
- **Prefix Sum Building**: Create a prefix sum array to represent cumulative counts of pairs by GCD value
- **Binary Search for Queries**: For each query, find the smallest GCD value where the cumulative count exceeds the query index

Let's implement this solution in PHP: **[3312. Sorted GCD Pair Queries](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003312-sorted-gcd-pair-queries/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer[] $queries
 * @return Integer[]
 */
function gcdValues(array $nums, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo gcdValues([2,3,4], [0,2,2]) .  "\n";                   // Output: [1,2,2]
echo gcdValues([4,4,2,1], [5,3,1,0]) .  "\n";               // Output: [4,2,1,1]
echo gcdValues([2,2], [0,0]) .  "\n";                       // Output: [2,2]
echo gcdValues([6,17,1,10], [5,2,3,1,4,0]) .  "\n";         // Output: [2,1,1,1,1,1]
echo gcdValues([5,5,5,5], [0,3,5]) .  "\n";                 // Output: [5,5,5]
echo gcdValues([1,50000,2,49999], [0,5]) .  "\n";           // Output: [1,1]
echo gcdValues([1,2,3,4,5], [0,9]) .  "\n";                 // Output: [1,2]
echo gcdValues([6,6,10,15,15], [2,5,8]) .  "\n";            // Output: [3,5,6]
echo gcdValues([6,12,18,24], [0,5]) .  "\n";                // Output: [6,6]
?>
```

### Explanation:

- **Key Insight**: Instead of computing all _**O(n²)**_ GCD pairs, we count how many pairs have each possible GCD value using inclusion-exclusion principle
- **Sieve Optimization**: The multiples counting uses a harmonic series approach, taking _**O(M log M)**_ time when `M` is the maximum value
- **Inclusion-Exclusion Mechanism**: For each `d`, `totalPairsMultiple[d]` counts pairs where gcd is a multiple of d. By subtracting `exactGCD[2d]`, `exactGCD[3d]`, etc., we isolate pairs with exact `gcd = d`
- **Sorting Implicit**: Since we count GCD values in ascending order and build prefix sums, we can binary search to find which GCD value corresponds to each query index
- **Memory Efficiency**: We use _**O(M)**_ space where `M ≤ 50,000`, making this feasible even for large inputs
- **Handling Edge Cases**: The solution correctly handles duplicate numbers, single-pair cases `(n=2)`, and queries that may point to the same index

## Complexity Analysis

- **Time Complexity**: _**O(M log M + Q log M)**_ where `M = max(nums) ≤ 50,000` and `Q = len(queries) ≤ 100,000`
  - Multiples counting: _**O(M log M)**_ due to harmonic series
  - Inclusion-exclusion: _**O(M log M)**_
  - Binary search per query: _**O(Q log M)**_
- **Space Complexity**: _**O(M)**_ for frequency arrays, multiples count, total pairs, exact GCD, and prefix sum arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**