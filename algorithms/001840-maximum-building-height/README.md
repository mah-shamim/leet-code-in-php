1840\. Maximum Building Height

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Sorting`, `Weekly Contest 238`

You want to build `n` new buildings in a city. The new buildings will be built in a line and are labeled from `1` to `n`.

However, there are city restrictions on the heights of the new buildings:

- The height of each building must be a non-negative integer.
- The height of the first building **must** be `0`.
- The height difference between any two adjacent buildings **cannot exceed** `1`.

Additionally, there are city restrictions on the maximum height of specific buildings. These restrictions are given as a 2D integer array `restrictions` where `restrictions[i] = [idᵢ, maxHeightᵢ]` indicates that building `idᵢ` must have a height **less than or equal to** `maxHeightᵢ`.

It is guaranteed that each building will appear **at most once** in `restrictions`, and building `1` will **not** be in `restrictions`.

Return _the **maximum possible height** of the **tallest** building_.

**Example 1:**

![ic236-q4-ex1-1](https://assets.leetcode.com/uploads/2021/04/08/ic236-q4-ex1-1.png)

- **Input:** n = 5, restrictions = [[2,1],[4,1]]
- **Output:** 2
- **Explanation:** 
  - The green area in the image indicates the maximum allowed height for each building.
  - We can build the buildings with heights [0,1,2,1,2], and the tallest building has a height of 2.

**Example 2:**

![ic236-q4-ex2](https://assets.leetcode.com/uploads/2021/04/08/ic236-q4-ex2.png)

- **Input:** n = 6, restrictions = []
- **Output:** 5
- **Explanation:**
  - The green area in the image indicates the maximum allowed height for each building.
  - We can build the buildings with heights [0,1,2,3,4,5], and the tallest building has a height of 5.

**Example 3:**

![ic236-q4-ex3](https://assets.leetcode.com/uploads/2021/04/08/ic236-q4-ex3.png)

- **Input:** n = 10, restrictions = [[5,3],[2,5],[7,4],[10,3]]
- **Output:** 5
- **Explanation:** 
  - The green area in the image indicates the maximum allowed height for each building.
  - We can build the buildings with heights [0,1,2,3,3,4,4,5,4,3], and the tallest building has a height of 5.


**Constraints:**

- `2 <= n <= 10⁹`
- `0 <= restrictions.length <= min(n - 1, 10⁵)`
- `2 <= idᵢ <= n`
- `idᵢ` is **unique**.
- `0 <= maxHeightᵢ <= 10⁹`


**Hint:**
1. Is it possible to find the max height if given the height range of a particular building?
2. You can find the height range of a restricted building by doing 2 passes from the left and right.


**Similar Questions:**
1. [3796. Find Maximum Value in a Constrained Sequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003796-find-maximum-value-in-a-constrained-sequence)


**Solution:**

We solve the maximum building height problem by transforming the restrictions into feasible height constraints using a two-pass propagation algorithm. We add building 1 with height 0 as a restriction, sort all restrictions by building ID, then propagate maximum possible heights from left to right and right to left to ensure all adjacent height differences are respected. Finally, we compute the maximum possible height between each pair of consecutive restrictions and after the last restriction, returning the overall maximum.

## Approach

• **Add base restriction** - Include building 1 with height 0 as a restriction since it's mandatory
• **Sort restrictions** - Order by building ID to process in sequence
• **Left-to-right pass** - Propagate height constraints forward: each restricted building's height cannot exceed the previous restricted height plus the distance between them
• **Right-to-left pass** - Propagate height constraints backward: each restricted building's height cannot exceed the next restricted height plus the distance between them
• **Calculate peak heights** - For each interval between consecutive restrictions, find the maximum height achievable using the formula that accounts for the distance and height difference
• **Handle trailing segment** - Consider the remaining buildings after the last restriction, where height can increase by 1 each step

Let's implement this solution in PHP: **[1840. Maximum Building Height](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001840-maximum-building-height/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $restrictions
 * @return Integer
 */
function maxBuilding(int $n, array $restrictions): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxBuilding(5, [[2,1],[4,1]]) .  "\n";                      // Output: 2
echo maxBuilding(6, []) .  "\n";                                 // Output: 5
echo maxBuilding(10, [[5,3],[2,5],[7,4],[10,3]]) .  "\n";        // Output: 5
?>
```

### Explanation:

- **Problem insight**: With adjacent height difference ≤ 1 and building 1 at height 0, the maximum possible height at any position is limited by both left and right restrictions
- **Two-pass propagation**:
   - Left-to-right ensures heights don't exceed what's possible from the left side
   - Right-to-left ensures heights don't exceed what's possible from the right side
   - After both passes, each restriction has the true maximum feasible height
- **Peak calculation between restrictions**:
   - Given two points (x₁, h₁) and (x₂, h₂) with distance d = x₂ - x₁
   - The maximum possible height between them occurs when we go up from the lower point and down to the higher point
   - Formula: max(h₁, h₂) + floor((d - |h₂ - h₁|) / 2)
   - This represents the peak of a "mountain" shape that satisfies both height constraints
- **Handling the end**: After the last restriction, we can continue increasing height by 1 per building, so the maximum is lastHeight + (n - lastId)
- **Edge cases**:
  - Empty restrictions array → heights can be [0,1,2,...,n-1]
  - Very large n (up to 10⁹) → O(m log m) solution works efficiently
  - Only m up to 10⁵ restrictions, so we process only these points

## Complexity Analysis

- **Time Complexity**: _**O(m log m)**_ where m is the number of restrictions, dominated by sorting. The two passes and final calculation are _**O(m)**_.
- **Space Complexity**: _**O(1)**_ extra space if we modify the input array in-place; _**O(m)**_ if we create a copy. The solution modifies the restrictions array, so _**O(1)**_ auxiliary space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**