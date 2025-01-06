494\. Target Sum

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Backtracking`

You are given an integer array `nums` and an integer `target`.

You want to build an **expression** out of nums by adding one of the symbols `'+'` and `'-'` before each integer in nums and then concatenate all the integers.

- For example, if `nums = [2, 1]`, you can add a `'+'` before `2` and a `'-'` before `1` and concatenate them to build the expression `"+2-1"`.

Return the number of different **expressions** that you can build, which evaluates to `target`.

**Example 1:**

- **Input:** nums = [1,1,1,1,1], target = 3
- **Output:** 5
- **Explanation:** There are 5 ways to assign symbols to make the sum of nums be target 3.
  -1 + 1 + 1 + 1 + 1 = 3
  +1 - 1 + 1 + 1 + 1 = 3
  +1 + 1 - 1 + 1 + 1 = 3
  +1 + 1 + 1 - 1 + 1 = 3
  +1 + 1 + 1 + 1 - 1 = 3

**Example 2:**

- **Input:** nums = [1], target = 1
- **Output:** 1



**Constraints:**

- `1 <= nums.length <= 20`
- `0 <= nums[i] <= 1000`
- `0 <= sum(nums[i]) <= 1000`
- `-1000 <= target <= 1000`


**Solution:**

The "Target Sum" problem involves creating expressions using the numbers in an array `nums` by assigning a `+` or `-` sign to each number. The goal is to calculate how many such expressions evaluate to the given `target`. This problem can be solved efficiently using dynamic programming or backtracking.

### **Key Points**
1. **Input Constraints**:
   - Array length: `1 <= nums.length <= 20`
   - Element values: `0 <= nums[i] <= 1000`
   - Target range: `-1000 <= target <= 1000`
2. **Output**:
   - Return the count of expressions that evaluate to the target.

3. **Challenges**:
   - The solution must handle both small and large values of `target`.
   - Efficient handling of up to <code>2<sup>20</sup></code> combinations when using backtracking.


### **Approach**
We can solve this problem using **Dynamic Programming (Subset Sum Transformation)** or **Backtracking**. Below, we use **Dynamic Programming (DP)** for efficiency.

**Key Observations**:
1. If we split `nums` into two groups: `P` (positive subset) and `N` (negative subset), then: `target = sum(P) - sum(N)`

   Rearrange terms:    `sum(P) + sum(N) = sum(nums)`

   Let S<sub>+</sub> be the sum of the positive subset. Then:    `S<sub>+</sub> = (sum(nums) + target) / 2`

2. If `(sum(nums) + target) % 2 ≠ 0`, return `0` because it's impossible to partition the sums.


### **Plan**
1. Compute the total sum of `nums`.
2. Check if the target is achievable using the formula for <code>S<sub>+</sub></code>. If invalid, return `0`.
3. Use a DP approach to find the count of subsets in `nums` whose sum equals <code>S<sub>+</sub></code>.

Let's implement this solution in PHP: **[494. Target Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000494-target-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function findTargetSumWays($nums, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [1, 1, 1, 1, 1];
$target = 3;
echo findTargetSumWays($nums, $target); // Output: 5
?>
```

### Explanation:

1. **Input Validation**:
   - We calculate <code>S<sub>+</sub> = (sum(nums) + target) / 2</code>.
   - If <code>S<sub>+</sub></code> is not an integer, it's impossible to split `nums` into two subsets.

2. **Dynamic Programming Logic**:
   - `dp[j]` represents the number of ways to form a sum `j` using the given numbers.
   - Starting with `dp[0] = 1`, for each number in `nums`, we update `dp[j]` by adding the count of ways to form `j - num`.

3. **Result**:
   - After processing all numbers, `dp[S]` contains the count of ways to achieve the target sum.


### **Example Walkthrough**
**Input**: `nums = [1, 1, 1, 1, 1]`, `target = 3`
1. `totalSum = 5`, <code>S<sub>+</sub> = (5 + 3) / 2 = 4</code>.
2. Initialize DP array: `dp = [1, 0, 0, 0, 0]`.
3. Process each number:
   - For `1`: Update `dp`: `[1, 1, 0, 0, 0]`.
   - For `1`: Update `dp`: `[1, 2, 1, 0, 0]`.
   - For `1`: Update `dp`: `[1, 3, 3, 1, 0]`.
   - For `1`: Update `dp`: `[1, 4, 6, 4, 1]`.
   - For `1`: Update `dp`: `[1, 5, 10, 10, 5]`.
4. Result: `dp[4] = 5`.


### **Time Complexity**
- **Time**: `O(n x S)`, where n is the length of `nums` and S is the target sum.
- **Space**: `O(S)` for the DP array.


### **Output for Example**
**Input**: `nums = [1,1,1,1,1]`, `target = 3`  
**Output**: `5`


This approach efficiently calculates the number of ways to form the target sum using dynamic programming. By reducing the problem to subset sum, we leverage the structure of DP for better performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
