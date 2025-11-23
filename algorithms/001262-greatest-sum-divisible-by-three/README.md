1262\. Greatest Sum Divisible by Three

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Greedy`, `Sorting`, `Weekly Contest 163`

Given an integer array `nums`, return _the **maximum possible sum** of elements of the array such that it is divisible by three_.

**Example 1:**

- **Input:** nums = [3,6,5,1,8]
- **Output:** 18
- **Explanation:** Pick numbers 3, 6, 1 and 8 their sum is 18 (maximum sum divisible by 3).

**Example 2:**

- **Input:** nums = [4]
- **Output:** 0
- **Explanation:** Since 4 is not divisible by 3, do not pick any number.

**Example 3:**

- **Input:** nums = [1,2,3,4,4]
- **Output:** 12
- **Explanation:** Pick numbers 1, 3, 4 and 4 their sum is 12 (maximum sum divisible by 3).

**Constraints:**

- `1 <= nums.length <= 4 * 10⁴`
- `1 <= nums[i] <= 10⁴`



**Hint:**
1. Represent the state as `DP[pos][mod]`: maximum possible sum starting in the position "pos" in the array where the current sum modulo 3 is equal to mod.






**Solution:**

We need to find the maximum possible sum of elements in an array such that the sum is divisible by three. The approach involves using dynamic programming to keep track of the maximum sums that yield remainders 0, 1, and 2 when divided by 3 as we iterate through the array.

### Approach

1. **Dynamic Programming State Initialization**: We maintain a state array `dp` of size 3, where:
   - `dp[0]` stores the maximum sum that is divisible by 3.
   - `dp[1]` stores the maximum sum that leaves a remainder of 1 when divided by 3.
   - `dp[2]` stores the maximum sum that leaves a remainder of 2 when divided by 3.

2. **Initialization**: Initially, `dp[0]` is set to 0 (since a sum of 0 is divisible by 3), and `dp[1]` and `dp[2]` are set to negative infinity (or a very small number) to indicate that these states are not achievable initially.

3. **Iterate Through Each Number**: For each number in the array:
   - Calculate its remainder when divided by 3.
   - Create a temporary copy of the current `dp` state to avoid overwriting values during updates.
   - For each possible remainder (0, 1, 2), if the state is achievable (i.e., not negative infinity), compute the new remainder when adding the current number to the sum represented by that state. Update the corresponding state in `dp` if the new sum is greater than the current value.

4. **Result**: After processing all numbers, `dp[0]` will contain the maximum sum divisible by 3.

Let's implement this solution in PHP: **[1262. Greatest Sum Divisible by Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001262-greatest-sum-divisible-by-three/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxSumDivThree($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSumDivThree([3,6,5,1,8]) . "\n";    // Output: 18
echo maxSumDivThree([4]) . "\n";            // Output: 0
echo maxSumDivThree([1,2,3,4,4]) . "\n";    // Output: 12
?>
```

### Explanation:

- **Initialization**: The `dp` array starts with `dp[0] = 0` and the other two states set to negative infinity, indicating that only a sum of 0 (divisible by 3) is initially achievable.
- **Processing Each Number**: For each number, we determine its remainder when divided by 3. Using a temporary copy of the current `dp` state, we update each possible state by considering the effect of adding the current number. The new remainder is computed, and the corresponding state in `dp` is updated if the new sum is greater.
- **Result**: After processing all numbers, `dp[0]` holds the maximum sum divisible by 3. This approach efficiently tracks the best possible sums for each remainder category, ensuring the solution is both optimal and efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**