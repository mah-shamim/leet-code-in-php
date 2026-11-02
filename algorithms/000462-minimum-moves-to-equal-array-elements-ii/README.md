462\. Minimum Moves to Equal Array Elements II

**Difficulty:** Medium

**Topics:** `Principal`, `Array`, `Math`, `Sorting`

Given an integer array `nums` of size `n`, return _the minimum number of moves required to make all array elements equal._

In one move, you can increment or decrement an element of the array by `1`.

Test cases are designed so that the answer will fit in a **32-bit** integer.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** 2
- **Explanation:** Only two moves are needed (remember each move increments or decrements one element): `[1,2,3]  =>  [2,2,3]  =>  [2,2,2]`

**Example 2:**

- **Input:** nums = [1,10,2,9]
- **Output:** 16

**Example 3:**

- **Input:** nums = [1]
- **Output:** 0

**Example 4:**

- **Input:** nums = [1,1,1]
- **Output:** 0

**Example 5:**

- **Input:** nums = [0,0,10,10]
- **Output:** 20

**Example 6:**

- **Input:** nums = [-5,-1,3]
- **Output:** 8

**Example 7:**

- **Input:** nums = [1,2,10]
- **Output:** 9

**Example 8:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 6

**Example 9:**

- **Input:** nums = [-1000000000, 1000000000]
- **Output:** 2000000000

**Example 10:**

- **Input:** nums = [5,5,5,5,5]
- **Output:** 0

**Constraints:**

- `n == nums.length`
- `1 <= nums.length <= 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`


**Hint:**
1. A really brute force way would be to search for all possible pairs of numbers but that would be too slow. Again, it's best to try out brute force solutions for just for completeness. It is from these brute force solutions that you can come up with optimizations.
2. So, if we fix one of the numbers, say `x`, we have to scan the entire array to find the next number `y` which is `value - x` where value is the input parameter. Can we change our array somehow so that this search becomes faster?
3. The second train of thought is, without changing the array, can we use additional space somehow? Like maybe a hash map to speed up the search?


**Similar Questions:**

1. [296. Best Meeting Point](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00296-best-meeting-point)
2. [453. Minimum Moves to Equal Array Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00453-minimum-moves-to-equal-array-elements)
3. [2033. Minimum Operations to Make a Uni-Value Grid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002033-minimum-operations-to-make-a-uni-value-grid)
4. [2171. Removing Minimum Number of Magic Beans](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002171-removing-minimum-number-of-magic-beans)
5. [2448. Minimum Cost to Make Array Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002448-minimum-cost-to-make-array-equal)
6. [2602. Minimum Operations to Make All Array Elements Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002602-minimum-operations-to-make-all-array-elements-equal)
7. [2967. Minimum Cost to Make Array Equalindromic](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002967-minimum-cost-to-make-array-equalindromic)
8. [3422. Minimum Operations to Make Subarray Elements Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003422-minimum-operations-to-make-subarray-elements-equal)
9. [3505. Minimum Operations to Make Elements Within K Subarrays Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003505-minimum-operations-to-make-elements-within-k-subarrays-equal)


**Solution:**

We solve this by converting all elements to the **median** of the array. The median minimizes the total absolute distance, so the minimum moves equal the sum of absolute differences between each element and the median. Sorting lets us find the median efficiently.

## Approach

- Sort `nums` in ascending order.
- Choose the median element.
  - For odd `n`, it is the exact middle element.
  - For even `n`, any value between the two middle elements is optimal; using `nums[intdiv($n, 2)]` works.
- Iterate through the sorted array and accumulate `abs($num - $median)`.
- Return the total accumulated moves.

Let's implement this solution in PHP: **[462. Minimum Moves to Equal Array Elements II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000462-minimum-moves-to-equal-array-elements-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves2(array $nums): int
{
    sort($nums);
    $n = count($nums);
    $median = $nums[intdiv($n, 2)]; // works for odd and even n
    $moves = 0;
    foreach ($nums as $num) {
        $moves += abs($num - $median);
    }
    return $moves;
}

// Test cases
echo minMoves2([1,2,3]) . "\n";            // Output: 2
echo minMoves2([1,10,2,9]) . "\n";         // Output: 16
echo minMoves2([1]) . "\n";                // Output: 0
echo minMoves2([1,1,1]) . "\n";            // Output: 0
echo minMoves2([0,0,10,10]) . "\n";        // Output: 20
echo minMoves2([-5,-1,3]) . "\n";          // Output: 8
echo minMoves2([1,2,10]) . "\n";           // Output: 9
?>
```

## Explanation

- Making all elements equal to some value `x` costs:
  - `sum(abs(nums[i] - x))`
- This cost is minimized when `x` is the median.
- Sorting places the median at index `intdiv(n, 2)`.
- Summing absolute differences from the median gives the minimum number of increment/decrement operations.
- The provided PHP implementation correctly follows this logic.

## Complexity Analysis

- **Time Complexity:** `O(n log n)` due to sorting, followed by an `O(n)` scan.
- **Space Complexity:** `O(1)` auxiliary space, excluding the internal space used by the sorting implementation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**