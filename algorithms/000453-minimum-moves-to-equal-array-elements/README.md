453\. Minimum Moves to Equal Array Elements

**Difficulty:** Medium

**Topics:** `Junior`, `Array`, `Math`

Given an integer array `nums` of size `n`, return _the minimum number of moves required to make all array elements equal._

In one move, you can increment `n - 1` elements of the array by `1`.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** 3
- **Explanation:** Only three moves are needed (remember each move increments two elements): `[1,2,3]  =>  [2,3,3]  =>  [3,4,3]  =>  [4,4,4]`

**Example 2:**

- **Input:** nums = [1,1,1]
- **Output:** 0

**Example 3:**

- **Input:** nums = [5]
- **Output:** 0

**Example 4:**

- **Input:** nums = [-2,-1,0]
- **Output:** 3

**Example 5:**

- **Input:** nums = [0,10]
- **Output:** 10

**Example 6:**

- **Input:** nums = [5,5,10]
- **Output:** 5

**Example 7:**

- **Input:** nums = [1,2,100]
- **Output:** 100

**Example 8:**

- **Input:** nums = [-1000000000, 1000000000]
- **Output:** 2000000000

**Constraints:**

- `n == nums.length`
- `1 <= nums.length <= 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`
- The answer is guaranteed to fit in a **32-bit** integer.


**Similar Questions:**

1. [462. Minimum Moves to Equal Array Elements II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00462-minimum-moves-to-equal-array-elements-ii)
2. [2141. Maximum Running Time of N Computers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002141-maximum-running-time-of-n-computers)
3. [2137. Pour Water Between Buckets to Make Water Levels Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002137-pour-water-between-buckets-to-make-water-levels-equal)
4. [2491. Divide Players Into Teams of Equal Skill](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002491-divide-players-into-teams-of-equal-skill)
5. [3190. Find Minimum Operations to Make All Elements Divisible by Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003190-find-minimum-operations-to-make-all-elements-divisible-by-three)


**Solution:**

We can solve this by recognizing that incrementing `n - 1` elements is equivalent to decrementing exactly one element. Therefore, the minimum moves needed to make all elements equal is the total amount required to reduce every element to the array minimum.

## Approach

- Find the minimum value in `nums`.
- For each element, calculate how far it is above the minimum.
- Sum all those differences.
- Return the sum as the minimum number of moves.

Let's implement this solution in PHP: **[453. Minimum Moves to Equal Array Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000453-minimum-moves-to-equal-array-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minMoves([1, 2, 3]) . "\n";                         // Output: 3
echo minMoves([1, 1, 1]) . "\n";                         // Output: 0
echo minMoves([5]) . "\n";                               // Output: 0
echo minMoves([-2, -1, 0]) . "\n";                       // Output: 3
echo minMoves([0, 10]) . "\n";                           // Output: 10
echo minMoves([5, 5, 10]) . "\n";                        // Output: 5
echo minMoves([1, 2, 100]) . "\n";                       // Output: 100
echo minMoves([-1000000000, 1000000000]) . "\n";         // Output: 2000000000
?>
```

### Explanation:

- In one move, incrementing `n - 1` elements by `1` is mathematically equivalent to decrementing the remaining one element by `1`.
- To make all elements equal using only this operation, the final target value must be the current minimum element.
- Any element larger than the minimum must be reduced by `nums[i] - min(nums)` moves.
- Summing these differences gives the total minimum moves.
- The provided PHP solution correctly implements this logic using `min($nums)` and a single loop.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of `nums`. We scan the array once to find the minimum and once to sum differences.
- **Space Complexity:** `O(1)`, since only a few scalar variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**