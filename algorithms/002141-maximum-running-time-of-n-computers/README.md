2141\. Maximum Running Time of N Computers

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Greedy`, `Sorting`, `Weekly Contest 276`

You have `n` computers. You are given the integer `n` and a **0-indexed** integer array `batteries` where the `iᵗʰ` battery can **run** a computer for `batteries[i]` minutes. You are interested in running **all** `n` computers **simultaneously** using the given batteries.

Initially, you can insert **at most one battery** into each computer. After that and at any integer time moment, you can remove a battery from a computer and insert another battery **any number of times**. The inserted battery can be a totally new battery or a battery from another computer. You may assume that the removing and inserting processes take no time.

Note that the batteries cannot be recharged.

Return _the **maximum** number of minutes you can run all the `n` computers simultaneously_.

**Example 1:**

![example1-fit](https://assets.leetcode.com/uploads/2022/01/06/example1-fit.png)

- **Input:** n = 2, batteries = [3,3,3]
- **Output:** 4
- **Explanation:**
  Initially, insert battery 0 into the first computer and battery 1 into the second computer.
  After two minutes, remove battery 1 from the second computer and insert battery 2 instead. Note that battery 1 can still run for one minute.
  At the end of the third minute, battery 0 is drained, and you need to remove it from the first computer and insert battery 1 instead.
  By the end of the fourth minute, battery 1 is also drained, and the first computer is no longer running.
  We can run the two computers simultaneously for at most 4 minutes, so we return 4.

**Example 2:**

![example2](https://assets.leetcode.com/uploads/2022/01/06/example2.png)

- **Input:** n = 2, batteries = [1,1,1,1]
- **Output:** 2
- **Explanation:**
  Initially, insert battery 0 into the first computer and battery 2 into the second computer.
  After one minute, battery 0 and battery 2 are drained so you need to remove them and insert battery 1 into the first computer and battery 3 into the second computer.
  After another minute, battery 1 and battery 3 are also drained so the first and second computers are no longer running.
  We can run the two computers simultaneously for at most 2 minutes, so we return 2.

**Constraints:**

- `1 <= n <= batteries.length <= 10⁵`
- `1 <= batteries[i] <= 10⁹`



**Hint:**
1. For a given running time, can you determine if it is possible to run all n computers simultaneously?
2. Try to use Binary Search to find the maximal running time



**Similar Questions:**
1. [453. Minimum Moves to Equal Array Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000453-minimum-moves-to-equal-array-elements)
2. [1648. Sell Diminishing-Valued Colored Balls](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001648-sell-diminishing-valued-colored-balls)
3. [2071. Maximum Number of Tasks You Can Assign](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002071-maximum-number-of-tasks-you-can-assign)
4. [2187. Minimum Time to Complete Trips](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002187-minimum-time-to-complete-trips)
5. [2335. Minimum Amount of Time to Fill Cups](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002335-minimum-amount-of-time-to-fill-cups)






**Solution:**

We can use binary search to find the maximum time `T` such that all `n` computers can run simultaneously for `T` minutes. For a given `T`, we check if the sum of `min(batteries[i], T)` over all batteries is at least `n × T`. This condition is necessary and sufficient because each battery can contribute at most `T` minutes to the total runtime (or its full capacity if less than `T`), and we can schedule the batteries arbitrarily.

We set the lower bound `low = 0` and the upper bound `high = ⌊sum(batteries)⌋`. Then we perform binary search to find the maximum `T` that satisfies the condition.

### Approach:

- **Binary Search on Answer**: Since we want the maximum run time, we can perform binary search over possible run times. For a candidate time `t`, check if it's possible to run all `n` computers simultaneously for `t` minutes.
- **Feasibility Check**: For a given time `t`, the total energy needed for `n` computers is `n * t`. We can use batteries efficiently by:
   - For batteries with capacity >= `t`: They can power a computer for the full `t` minutes, and any excess capacity beyond `t` can be used elsewhere.
   - For batteries with capacity < `t`: Their entire capacity can be used, but they may need to be combined with other batteries.
- The condition for feasibility is: `sum(min(battery, t) for all batteries) >= n * t`. This is because:
   - Each battery can contribute at most `t` minutes towards the total requirement (since we can't use a battery for more than `t` minutes on a single computer, but can use it across multiple computers through swapping).
   - If the sum of contributions equals or exceeds the total required `n * t`, then we can achieve `t` minutes.
- **Optimization**: Sort batteries if needed, but we can compute the sum without sorting by simply capping each battery's contribution at `t` and summing them.

Let's implement this solution in PHP: **[2141. Maximum Running Time of N Computers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002141-maximum-running-time-of-n-computers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $batteries
 * @return Integer
 */
function maxRunTime($n, $batteries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxRunTime(2, [3,3,3]) . "\n";     // Output: 4
echo maxRunTime(2, [1,1,1,1]) . "\n";   // Output: 2
?>
```

### Explanation:

- We use binary search to find the maximum `t` such that the condition holds.
- The lower bound is 0, and the upper bound is `total_sum / n` (theoretical maximum if we could use all battery power perfectly).
- At each candidate `t`, we compute the sum of `min(battery, t)` for all batteries. If this sum >= `n * t`, then `t` is feasible, and we try a larger `t`. Otherwise, we try a smaller `t`.
- The binary search converges to the maximum feasible `t`.

## Complexity Analysis
- **Time Complexity**: O(m log S), where m is the number of batteries and S is the total sum of batteries divided by n. We perform a binary search over the range [0, S], and at each step, we iterate through all batteries to compute the sum.
- **Space Complexity**: O(1), as we only use a constant amount of extra space.

## Solution Walkthrough
1. Compute the total sum of all batteries.
2. Set `low = 0` and `high = total_sum // n`.
3. While `low < high`:
   - Compute `mid` as the average of `low` and `high`, rounded up.
   - Check if we can run all computers for `mid` minutes by summing `min(battery, mid)` for all batteries and comparing with `n * mid`.
   - If feasible, set `low = mid`; otherwise, set `high = mid - 1`.
4. Return `low` as the maximum run time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**