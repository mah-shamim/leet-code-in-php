1578\. Minimum Time to Make Rope Colorful

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Dynamic Programming`, `Greedy`, `Weekly Contest 205`

Alice has `n` balloons arranged on a rope. You are given a **0-indexed** string `colors` where `colors[i]` is the color of the `iᵗʰ` balloon.

Alice wants the rope to be **colorful**. She does not want **two consecutive balloons** to be of the same color, so she asks Bob for help. Bob can remove some balloons from the rope to make it **colorful**. You are given a **0-indexed** integer array `neededTime` where `neededTime[i]` is the time (in seconds)that Bob needs to remove the `iᵗʰ` balloon from the rope.

Return _the **minimum time** Bob needs to make the rope **colorful**_.

**Example 1:**

![ballon1](https://assets.leetcode.com/uploads/2021/12/13/ballon1.jpg)

- **Input:** colors = "abaac", neededTime = [1,2,3,4,5]
- **Output:** 3
- **Explanation:** In the above image, 'a' is blue, 'b' is red, and 'c' is green.
  Bob can remove the blue balloon at index 2. This takes 3 seconds.
  There are no longer two consecutive balloons of the same color. Total time = 3.

**Example 2:**

![balloon2](https://assets.leetcode.com/uploads/2021/12/13/balloon2.jpg)

- **Input:** colors = "abc", neededTime = [1,2,3]
- **Output:** 0
- **Explanation:** The rope is already colorful. Bob does not need to remove any balloons from the rope.

**Example 3:**

![balloon3](https://assets.leetcode.com/uploads/2021/12/13/balloon3.jpg)

- **Input:** colors = "aabaa", neededTime = [1,2,3,4,1]
- **Output:** 2
- **Explanation:** Bob will remove the balloons at indices 0 and 4. Each balloons takes 1 second to remove.
  There are no longer two consecutive balloons of the same color. Total time = 1 + 1 = 2.

**Constraints:**

- `n == colors.length == neededTime.length`
- `1 <= n <= 10⁵`
- `1 <= neededTime[i] <= 10⁴`
- `colors` contains only lowercase English letters.



**Hint:**
1. Maintain the running sum and max value for repeated letters.






**Solution:**

We need to ensure that no two consecutive balloons have the same color by removing some balloons. The goal is to minimize the total time required to remove these balloons.

### Approach

1. **Problem Analysis**: We need to traverse the string of balloon colors and whenever we find consecutive balloons of the same color, we must remove all but one of them. The key insight is that to minimize the removal time, we should keep the balloon with the highest removal time in each consecutive group of the same color and remove the others.
2. **Greedy Approach**: For each group of consecutive balloons with the same color, calculate the sum of their removal times and subtract the maximum removal time in that group. This ensures we remove the balloons with the smallest removal times in each group, thus minimizing the total time.
3. **Efficiency**: This approach processes each balloon exactly once, resulting in an O(n) time complexity, which is efficient given the constraints.

Let's implement this solution in PHP: **[1578. Minimum Time to Make Rope Colorful](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001578-minimum-time-to-make-rope-colorful/solution.php)**

```php
<?php
/**
 * @param String $colors
 * @param Integer[] $neededTime
 * @return Integer
 */
function minCost($colors, $neededTime) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$colors1 = "abaac";
$neededTime1 = array(1, 2, 3, 4, 5);
echo minCost($colors1, $neededTime1) . "\n"; // Output: 3

$colors2 = "abc";
$neededTime2 = array(1, 2, 3);
echo minCost($colors2, $neededTime2) . "\n"; // Output: 0

$colors3 = "aabaa";
$neededTime3 = array(1, 2, 3, 4, 1);
echo minCost($colors3, $neededTime3) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Initialization**: Start by initializing `totalTime` to 0 and set the starting index `i` to 0.
2. **Processing Groups**: For each balloon at index `i`, identify the consecutive group of balloons with the same color. Compute the sum of their removal times (`currentSum`) and track the maximum removal time (`currentMax`) in this group.
3. **Update Total Time**: Add the difference between the sum and the maximum removal time to `totalTime`. This represents the minimal time to remove all but the most expensive balloon in the group.
4. **Move to Next Group**: Update the index `i` to the next balloon after the current group.
5. **Return Result**: After processing all balloons, return the accumulated `totalTime`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**