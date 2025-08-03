2106\. Maximum Fruits Harvested After at Most K Steps

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Sliding Window`, `Prefix Sum`, `Weekly Contest 271`

Fruits are available at some positions on an infinite x-axis. You are given a 2D integer array `fruits` where <code>fruits[i] = [position<sub>i</sub>, amount<sub>i</sub>]</code> depicts <code>amount<sub>i</sub></code> fruits at the position <code>position<sub>i</sub></code>. `fruits` is already **sorted** by <code>position<sub>i</sub></code> in **ascending order**, and each <code>position<sub>i</sub></code> is **unique**.

You are also given an integer `startPos` and an integer `k`. Initially, you are at the position `startPos`. From any position, you can either walk to the **left or right**. It takes **one step** to move **one unit** on the x-axis, and you can walk **at most** `k` steps in total. For every position you reach, you harvest all the fruits at that position, and the fruits will disappear from that position.

Return _the **maximum total number** of fruits you can harvest_.

**Example 1:**

![1](https://assets.leetcode.com/uploads/2021/11/21/1.png)

- **Input:** fruits = [[2,8],[6,3],[8,6]], startPos = 5, k = 4
- **Output:** 9
- **Explanation:** The optimal way is to:
  - Move right to position 6 and harvest 3 fruits
  - Move right to position 8 and harvest 6 fruits
    You moved 3 steps and harvested 3 + 6 = 9 fruits in total.

**Example 2:**

![2](https://assets.leetcode.com/uploads/2021/11/21/2.png)

- **Input:** fruits = [[0,9],[4,1],[5,7],[6,2],[7,4],[10,9]], startPos = 5, k = 4
- **Output:** 14
- **Explanation:** You can move at most k = 4 steps, so you cannot reach position 0 nor 10.
  - The optimal way is to:
  - Harvest the 7 fruits at the starting position 5
  - Move left to position 4 and harvest 1 fruit
  - Move right to position 6 and harvest 2 fruits
  - Move right to position 7 and harvest 4 fruits
    You moved 1 + 3 = 4 steps and harvested 7 + 1 + 2 + 4 = 14 fruits in total.

**Example 3:**

![3](https://assets.leetcode.com/uploads/2021/11/21/3.png)

- **Input:** fruits = [[0,3],[6,4],[8,5]], startPos = 3, k = 2
- **Output:** 0
- **Explanation:** You can move at most k = 2 steps and cannot reach any position with fruits.

**Constraints:**

- <code>1 <= fruits.length <= 10<sup>5</sup></code>
- `fruits[i].length == 2`
- <code>0 <= startPos, position<sub>i</sub> <= 2 * 10<sup>5</sup></code>
- <code>position<sub>i-1</sub> < position<sub>i</sub></code> for any `i > 0` (**0-indexed**)
- <code>1 <= amount<sub>i</sub> <= 10<sup>4</sup></code>
- <code>0 <= k <= 2 * 10<sup>5</sup></code>


**Hint:**
1. Does an optimal path have very few patterns? For example, could a path that goes left, turns and goes right, then turns again and goes left be any better than a path that simply goes left, turns, and goes right?
2. The optimal path turns at most once. That is, the optimal path is one of these: to go left only; to go right only; to go left, turn and go right; or to go right, turn and go left.
3. Moving x steps left then k-x steps right gives you a range of positions that you can reach.
4. Use prefix sums to get the sum of all fruits for each possible range.
5. Use a similar strategy for all the paths that go right, then turn and go left.


**Similar Questions:**
1. [1383. Maximum Performance of a Team](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001383-maximum-performance-of-a-team)


**Solution:**

We need to maximize the number of fruits harvested by moving at most `k` steps from a starting position on an infinite x-axis. The fruits are located at specific positions, and we can move left or right, harvesting fruits at each position we visit. The solution involves considering different movement patterns to cover the maximum number of fruits within the step constraint.

### Approach
1. **Problem Analysis**: The problem requires us to find the optimal path that maximizes the fruit harvest while moving at most `k` steps. The fruits are given as a sorted list of positions and amounts. The key insight is that the optimal path can be one of four types:
    - **Non-turning left**: Move only left from the starting position.
    - **Non-turning right**: Move only right from the starting position.
    - **Left then right**: Move left first, then turn and move right.
    - **Right then left**: Move right first, then turn and move left.

2. **Intuition**: For each possible movement pattern, we calculate the maximum fruits harvested by leveraging binary search and prefix sums:
    - **Prefix Sum Array**: Precompute a prefix sum array to quickly calculate the sum of fruits over any contiguous segment.
    - **Binary Search**: Use binary search to efficiently find the boundaries of segments that can be covered within `k` steps for each movement pattern.

3. **Algorithm Selection**:
    - **Non-turning Paths**: For left-only and right-only movements, iterate over possible segments starting from the initial position and extending left or right as far as allowed by `k` steps.
    - **Turning Paths**: For paths that change direction once, calculate the maximum reachable segments by considering the step constraints derived from the movement patterns. Use binary search to determine the furthest positions reachable within `k` steps.

4. **Complexity Analysis**:
    - **Time Complexity**: The solution involves binary searches over the fruit positions for each movement pattern, leading to an overall time complexity of O(n log n), where `n` is the number of fruits.
    - **Space Complexity**: O(n) for storing prefix sums and fruit positions.

Let's implement this solution in PHP: **[2106. Maximum Fruits Harvested After at Most K Steps](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002106-maximum-fruits-harvested-after-at-most-k-steps/solution.php)**

```php
<?php
/**
 * @param Integer[][] $fruits
 * @param Integer $startPos
 * @param Integer $k
 * @return Integer
 */
function maxTotalFruits($fruits, $startPos, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$fruits1 = [[2,8],[6,3],[8,6]];
echo maxTotalFruits($fruits1, 5, 4) . "\n"; // 9

$fruits2 = [[0,9],[4,1],[5,7],[6,2],[7,4],[10,9]];
echo maxTotalFruits($fruits2, 5, 4) . "\n"; // 14

$fruits3 = [[0,3],[6,4],[8,5]];
echo maxTotalFruits($fruits3, 3, 2) . "\n"; // 0
?>
```

### Explanation:

1. **Prefix Sum Array**: The prefix sum array allows efficient calculation of the total fruits in any contiguous segment of the fruit positions.
2. **Binary Search for Boundaries**:
    - `j0` is the last fruit position less than or equal to the starting position.
    - `j1` is the first fruit position greater than or equal to the starting position.
3. **Non-turning Paths**:
    - **Left-only Movement**: For each fruit position to the left of the starting position, check if it can be reached within `k` steps. If so, calculate the total fruits from that position to `j0`.
    - **Right-only Movement**: Similarly, for each fruit position to the right, check reachability and calculate the total fruits from `j1` to that position.
4. **Turning Paths**:
    - **Left then Right**: For each left fruit position, compute the maximum right position reachable within remaining steps after moving left. Use binary search to find this position and calculate the total fruits from the left position to the right position.
    - **Right then Left**: For each right fruit position, compute the minimum left position reachable within remaining steps after moving right. Use binary search to find this position and calculate the total fruits from the left position to the right position.
5. **Result Calculation**: The maximum value obtained from all four movement patterns is the solution. This approach efficiently covers all possible optimal paths within the step constraint.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**