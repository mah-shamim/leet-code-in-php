3727\. Maximum Alternating Sum of Squares

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Greedy`, `Sorting`, `Weekly Contest 473`

You are given an integer array `nums`. You may **rearrange the elements** in any order.

The **alternating score** of an array `arr` is defined as:

- `score = arr[0]² - arr[1]² + arr[2]² - arr[3]² + ...`

Return an integer denoting the **maximum possible alternating score** of `nums` after rearranging its elements.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** 12
- **Explanation:**
  - A possible rearrangement for `nums` is `[2,1,3]`, which gives the maximum alternating score among all possible rearrangements.
  - The alternating score is calculated as: `score = 2² - 1² + 3² = 4 - 1 + 9 = 12`

**Example 2:**

- **Input:** nums = [1,-1,2,-2,3,-3]
- **Output:** 16
- **Explanation:** 
  - A possible rearrangement for `nums` is `[-3,-1,-2,1,3,2]`, which gives the maximum alternating score among all possible rearrangements.
  - The alternating score is calculated as: `score = (-3)² - (-1)² + (-2)² - (1)² + (3)² - (2)² = 9 - 1 + 4 - 1 + 9 - 4 = 16`

**Example 3:**

- **Input:** nums = [5]
- **Output:** 25

**Example 4:**

- **Input:** nums = [1,2]
- **Output:** 3

**Example 5:**

- **Input:** nums = [-5,5]
- **Output:** 0

**Example 6:**

- **Input:** nums = [0,0,0]
- **Output:** 0

**Example 7:**

- **Input:** nums = [1,2,3,4]
- **Output:** 20

**Example 8:**

- **Input:** nums = [-4,-3,-2,-1,0]
- **Output:** 28

**Example 9:**

- **Input:** nums = [100,-100,1]
- **Output:** 19999

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `-4 * 10⁴ <= nums[i] <= 4 * 10⁴`


**Hint:**

1. The score uses squares of values. The original signs of `nums` don't affect the squared terms.
2. In the alternating sum, even indices contribute positively and odd indices negatively.


**Solution:**

We maximize the alternating score by ignoring the original signs of `nums`, since only squares matter. After squaring all values and sorting them descending, we place the largest `ceil(n/2)` squares into positive positions and the remaining smaller squares into negative positions.

## Approach

- Convert every `nums[i]` into `nums[i] * nums[i]`.
- Sort these squared values in descending order.
- There are `positiveCount = ceil(n / 2)` positive slots.
- Add the first `positiveCount` largest squares to the score.
- Subtract all remaining smaller squares from the score.
- Return the resulting score.

Let's implement this solution in PHP: **[3727. Maximum Alternating Sum of Squares](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003727-maximum-alternating-sum-of-squares/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxAlternatingSum(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxAlternatingSum([1,2,3]) .  "\n";                // Output: 12
echo maxAlternatingSum([1,-1,2,-2,3,-3]) .  "\n";       // Output: 16
echo maxAlternatingSum([5]) .  "\n";                    // Output: 25
echo maxAlternatingSum([1,2]) .  "\n";                  // Output: 3
echo maxAlternatingSum([-5,5]) .  "\n";                 // Output: 0
echo maxAlternatingSum([0,0,0]) .  "\n";                // Output: 0
echo maxAlternatingSum([1,2,3,4]) .  "\n";              // Output: 20
echo maxAlternatingSum([-4,-3,-2,-1,0]) .  "\n";        // Output: 28
echo maxAlternatingSum([100,-100,1]) .  "\n";           // Output: 19999
?>
```

### Explanation:

- The alternating score is:
    - `arr[0]² - arr[1]² + arr[2]² - arr[3]² + ...`
- Even indices contribute positively, odd indices contribute negatively.
- For length `n`:
    - Positive slots = `ceil(n / 2)`
    - Negative slots = `floor(n / 2)`
- To maximize the result, we want the largest possible squares in positive slots and the smallest possible squares in negative slots.
- If a larger square were in a negative slot and a smaller square in a positive slot, swapping them would increase the score.
- Therefore, sorting descending and assigning the first `ceil(n/2)` values to positive positions is optimal.

## Complexity Analysis

- Time Complexity: `O(n log n)` due to sorting.
- Space Complexity: `O(n)` for the squared-values array.
- `n <= 10⁵`, so this is efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**