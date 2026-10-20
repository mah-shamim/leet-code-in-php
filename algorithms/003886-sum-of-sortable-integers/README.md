3886\. Sum of Sortable Integers

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Sorting`, `Enumeration`, `Weekly Contest 495`

You are given an integer array `nums` of length `n`.

An integer `k` is called **sortable** if `k` **divides** `n` and you can sort `nums` in **non-decreasing** order by sequentially performing the following operations:

- Partition `nums` into **consecutive** **subarrays[^1]** of length `k`.
- **Cyclically rotate each subarray independently** any number of times to the left or to the right.

Return an integer denoting the sum of all possible sortable integers `k`.

[^1]: **Subarray:** A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [3,1,2]
- **Output:** 3
- **Explanation:**
  - For `n = 3`, possible divisors are 1 and 3.
  - For `k = 1`: each subarray has one element. No rotation can sort the array.
  - For `k = 3`: the single subarray `[3, 1, 2]` can be rotated once to produce `[1, 2, 3]`, which is sorted.
  - Only `k = 3` is sortable. Hence, the answer is 3.


**Example 2:**

- **Input:** nums = [7,6,5]
- **Output:** 0
- **Explanation:**
  - For `n = 3`, possible divisors are 1 and 3.
  - For ``k = 1`: each subarray has one element. No rotation can sort the array.
  - For `k = 3`: the single subarray `[7, 6, 5]` cannot be rotated into non-decreasing order.
  - No `k` is sortable. Hence, the answer is 0.


**Example 3:**

- **Input:** nums = [5,8]
- **Output:** 3
- **Explanation:**
  - For `n = 2`, possible divisors are 1 and 2.
  - Since `[5, 8]` is already sorted, every divisor is sortable. Hence, the answer is 1 + 2 = 3`.


**Example 4:**

- **Input:** nums = [1]
- **Output:** 1


**Example 5:**

- **Input:** nums = [2,1]
- **Output:** 2


**Example 6:**

- **Input:** nums = [1,2,3,4]
- **Output:** 7


**Example 7:**

- **Input:** nums = [4,3,2,1]
- **Output:** 0


**Example 8:**

- **Input:** nums = [2,1,4,3]
- **Output:** 2


**Example 9:**

- **Input:** nums = [3,4,1,2]
- **Output:** 4


**Example 10:**

- **Input:** nums = [2,2,1,1]
- **Output:** 4


**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁵`


**Hint:**

1. First, observe that `k` must divide `n`, since the array is partitioned into subarrays of length `k`. Iterate over all divisors of `n`.
2. Let `s` be the sorted version of the array. For each divisor `k`, check every block `[i, i+k)`.
3. A block can be rotated to match its sorted counterpart if the sorted segment `s[i..i+k-1]` appears as a cyclic rotation of `nums[i..i+k-1]`.
4. You can test this by checking whether the sorted segment exists inside two concatenated copies of the block. If all blocks satisfy this, then `k` is sortable.


**Solution:**

we can solve this problem by enumerating all divisors `k` of `n`, sorting the array once, and checking whether every consecutive block of length `k` can be cyclically rotated to match the corresponding block in the globally sorted array. If all blocks pass, `k` is sortable and is added to the answer.

## Approach

- Let `n = nums.length`.
- Enumerate all divisors `k` of `n`, since the array must be partitioned into blocks of length `k`.
- Create `sorted = nums` and sort it in non-decreasing order.
- For each divisor `k`:
    - Split `nums` into consecutive blocks of length `k`.
    - For every block `nums[start ... start+k-1]`, check whether it can be rotated into the corresponding sorted segment `sorted[start ... start+k-1]`.
    - If every block passes, add `k` to the answer.
- To check one block efficiently:
    - Find whether the block has at most one descent, i.e. position where `nums[i-1] > nums[i]`.
    - If there is more than one descent, it cannot be a cyclic rotation of a non-decreasing segment.
    - Determine the required rotation start.
    - Compare the rotated block against the corresponding sorted segment.
- Return the sum of all valid `k`.

Let's implement this solution in PHP: **[3886. Sum of Sortable Integers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003886-sum-of-sortable-integers/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function sortableIntegers(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Checks whether nums[start ... start+k-1] is a cyclic rotation of
 * sorted[start ... start+k-1].
 *
 * @param array $nums
 * @param array $sorted
 * @param int $start
 * @param int $k
 * @return bool
 */
function canRotateToSortedSegment(array $nums, array $sorted, int $start, int $k): bool {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sortableIntegers([3,1,2]) .  "\n";         // Output: 3
echo sortableIntegers([7,6,5]) .  "\n";         // Output: 0
echo sortableIntegers([5,8]) .  "\n";           // Output: 3
echo sortableIntegers([1]) .  "\n";             // Output: 1
echo sortableIntegers([2,1]) .  "\n";           // Output: 2
echo sortableIntegers([1,2,3,4]) .  "\n";       // Output: 7
echo sortableIntegers([4,3,2,1]) .  "\n";       // Output: 0
echo sortableIntegers([2,1,4,3]) .  "\n";       // Output: 2
echo sortableIntegers([3,4,1,2]) .  "\n";       // Output: 4
echo sortableIntegers([1,1,1]) .  "\n";         // Output: 4
echo sortableIntegers([2,2,1,1]) .  "\n";       // Output: 4
?>
```

### Explanation:

- Any valid final sorted array must equal `sorted`, the globally sorted version of `nums`.
- Since rotations happen independently inside fixed blocks, elements cannot move between blocks.
- Therefore, for a fixed `k`, each block `nums[start ... start+k-1]` must become exactly `sorted[start ... start+k-1]`.
- A non-decreasing segment, when cyclically rotated, can contain at most one descent.
    - If a block has no descent, it must already equal its sorted segment.
    - If it has exactly one descent, the block must be rotated so that the descent becomes the boundary between the largest and smallest elements.
- The helper function checks this condition in `O(k)` time per block, so checking all blocks for a divisor takes `O(n)` total.

## Complexity Analysis

- Sorting: `O(n log n)`
- Enumerating divisors: `O(sqrt(n))`
- Checking all blocks for all divisors: `O(n * τ(n))`, where `τ(n)` is the number of divisors of `n`
- Total time complexity: `O(n log n + n * τ(n))`
- Space complexity: `O(n)` for the sorted copy and divisor list

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**