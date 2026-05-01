396\. Rotate Function

**Difficulty:** Medium

**Topics:** `Junior`, `Array`, `Math`, `Dynamic Programming`

You are given an integer array `nums` of length `n`.

Assume `arrₖ` to be an array obtained by rotating `nums` by `k` positions clock-wise. We define the **rotation function** `F` on `nums` as follow:

- `F(k) = 0 * arrₖ[0] + 1 * arrₖ[1] + ... + (n - 1) * arrₖ[n - 1].`

Return _the maximum value of `F(0), F(1), ..., F(n-1)`_.

The test cases are generated so that the answer fits in a **32-bit** integer.

**Example 1:**

- **Input:** nums = [4,3,2,6]
- **Output:** 26
- **Explanation:**
  - **F(0) = (0 * 4) + (1 * 3) + (2 * 2) + (3 * 6) = 0 + 3 + 4 + 18 = 25**
  - **F(1) = (0 * 6) + (1 * 4) + (2 * 3) + (3 * 2) = 0 + 4 + 6 + 6 = 16**
  - **F(2) = (0 * 2) + (1 * 6) + (2 * 4) + (3 * 3) = 0 + 6 + 8 + 9 = 23**
  - **F(3) = (0 * 3) + (1 * 2) + (2 * 6) + (3 * 4) = 0 + 2 + 12 + 12 = 26**
  - **So the maximum value of F(0), F(1), F(2), F(3) is F(3) = 26.**

**Example 2:**

- **Input:** nums = [100]
- **Output:** 0

**Example 3:**

- **Input:** nums = [0,0,0,0]
- **Output:** 0

**Constraints:**

- `n == nums.length`
- `1 <= n <= 10⁵`
- `-100 <= nums[i] <= 100`






**Solution:**

The solution efficiently computes the maximum value of the rotation function `F(k)` without explicitly rotating the array for each `k`.  
It calculates `F(0)` directly, then derives each subsequent `F(k)` from the previous one using a mathematical recurrence relation.  
This approach avoids the **_O(n²)_** brute force and runs in **_O(n)_** time and **_O(1)_** extra space.

### Approach:

- **Direct calculation of `F(0)`** `F(0) = 0*nums[0] + 1*nums[1] + ... + (n-1)*nums[n-1]` is computed in one pass.
- **Mathematical recurrence for `F(k)`** Rotating the array clockwise by one position changes `F(k)` as follows: **_F(k) = F(k-1) + sum(nums) - n ⋅ nums[n-k]_**.
- **Iterative update** Start from `F(0)` and apply the recurrence for each rotation `k = 1` to `n-1`, tracking the maximum value.
- **Edge case handling** If `n == 1`, return `0` immediately since `F(0) = 0`.

Let's implement this solution in PHP: **[396. Rotate Function](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000396-rotate-function/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return float|int
 */
function maxRotateFunction(array $nums): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxRotateFunction([4,3,2,6]) . "\n";           // Output: 26
echo maxRotateFunction([100]) . "\n";               // Output: 0
echo maxRotateFunction([0,0,0,0]) . "\n";           // Output: 0
?>
```

### Explanation:

- **Why the recurrence works**  
  - When rotating one step clockwise, the last element becomes first, increasing its coefficient from `n-1` to `0` (a drop of `n-1`), and all other elements shift right, increasing their coefficients by 1.  
  - The net change is: **_F(k) = F(k-1) + sum(nums) - n ⋅ last element before rotation_**.
- **Avoiding array rotation** By keeping track of which element is currently last in the virtual rotation (`nums[$n - $k - 1]`), the formula works directly on the original array.
- **One-pass optimization** Instead of recomputing `F(k)` from scratch each time, we update in **_O(1)_** per k, leading to **_O(n)_** total operations.

### Complexity
- **Time Complexity**: _**O(n)**_, One pass to compute `sum` and `F(0)`, plus one pass to update and compare for `n-1` rotations.
- **Space Complexity**: _**O(1)**_, Only a few integer variables are used, regardless of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**