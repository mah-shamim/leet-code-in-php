2078\. Two Furthest Houses With Different Colors

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Greedy`, `Weekly Contest 268`

There are `n` houses evenly lined up on the street, and each house is beautifully painted. You are given a **0-indexed** integer array `colors` of length `n`, where `colors[i]` represents the color of the `iᵗʰ` house.

Return the **maximum** distance between **two** houses with **different** colors.

The distance between the `iᵗʰ` and `jᵗʰ` houses is `abs(i - j)`, where `abs(x)` is the absolute value of `x`.

**Example 1:**

![eg1](https://assets.leetcode.com/uploads/2021/10/31/eg1.png)

- **Input:** colors = [<ins>**1**</ins>,1,1,<ins>**6**</ins>,1,1,1]
- **Output:** 3
- **Explanation:** 
  - In the above image, color 1 is blue, and color 6 is red.
  - The furthest two houses with different colors are house 0 and house 3.
  - House 0 has color 1, and house 3 has color 6. The distance between them is abs(0 - 3) = 3.
  - Note that houses 3 and 6 can also produce the optimal answer.

**Example 2:**

![eg2](https://assets.leetcode.com/uploads/2021/10/31/eg2.png)

- **Input:** colors = [<ins>**1**</ins>,8,3,8,<ins>**3**</ins>]
- **Output:** 4
- **Explanation:** 
  - In the above image, color 1 is blue, color 8 is yellow, and color 3 is green.
  - The furthest two houses with different colors are house 0 and house 4.
  - House 0 has color 1, and house 4 has color 3. The distance between them is abs(0 - 4) = 4.

**Example 3:**

- **Input:** colors = [<ins>**0**</ins>,<ins>**1**</ins>]
- **Output:** 1
- **Explanation:** 
  - The furthest two houses with different colors are house 0 and house 1.
  - House 0 has color 0, and house 1 has color 1. The distance between them is abs(0 - 1) = 1.

**Constraints:**

- `n == colors.length`
- `2 <= n <= 100`
- `0 <= colors[i] <= 100`
- Test data are generated such that **at least** two houses have different colors.



**Hint:**
1. The constraints are small. Can you try the combination of every two houses?
2. Greedily, the maximum distance will come from either the pair of the leftmost house and possibly some house on the right with a different color, or the pair of the rightmost house and possibly some house on the left with a different color.



**Similar Questions:**
1. [1299. Replace Elements with Greatest Element on Right Side](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001299-replace-elements-with-greatest-element-on-right-side)
2. [1855. Maximum Distance Between a Pair of Values](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001855-maximum-distance-between-a-pair-of-values)
3. [2016. Maximum Difference Between Increasing Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002016-maximum-difference-between-increasing-elements)






**Solution:**

The problem asks for the **maximum distance** between two houses with different colors.  
A brute-force solution (checking all pairs) would be _**O(n²)**_, but an **_O(n)_ greedy approach** works by focusing only on the leftmost and rightmost houses.

### Approach:

- **Observation**: The maximum distance will always involve either the leftmost house (index `0`) paired with the farthest house to the right that has a different color, or the rightmost house (index `n-1`) paired with the farthest house to the left that has a different color.
- **Why greedy works**:
   - If the leftmost and rightmost houses have different colors, the distance `n-1` is already maximal.
   - If they have the same color, the farthest house with a different color from the leftmost house must be somewhere on the right side, and from the rightmost house on the left side.
   - The optimal distance will be one of these two candidates, because any interior pair would have a smaller span than extending to one of the ends.

Let's implement this solution in PHP: **[2078. Two Furthest Houses With Different Colors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002078-two-furthest-houses-with-different-colors/solution.php)**

```php
<?php
/**
 * @param Integer[] $colors
 * @return Integer
 */
function maxDistance(array $colors): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDistance([1,1,1,6,1,1,1]) . "\n";           // Output: 3
echo maxDistance([1,8,3,8,3]) . "\n";               // Output: 4
echo maxDistance([0,1]) . "\n";                     // Output: 1
?>
```

### Explanation:

1. **Case 1 – Start from leftmost house**: Scan from the right end toward the left, stop at the first house with a color different from `colors[0]`. Compute distance and update `maxDist`.
2. **Case 2 – Start from rightmost house**: Scan from the left end toward the right, stop at the first house with a color different from `colors[n-1]`. Compute distance and update `maxDist`.
3. **Why both cases are needed**: The farthest different-colored house from the left end might be closer to the right end than the farthest different-colored house from the right end. We must consider both to cover the true maximum.
4. **Return the maximum of the two candidates**.

### Complexity
- **Time Complexity**: _**O(n)**_ – at most two linear scans.
- **Space Complexity**: _**O(1)**_ – only a few variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**