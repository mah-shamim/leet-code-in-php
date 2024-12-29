1760\. Minimum Limit of Balls in a Bag

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

You are given an integer array `nums` where the <code>i<sup>th</sup></code> bag contains `nums[i]` balls. You are also given an integer `maxOperations`.

You can perform the following operation at most `maxOperations` times:

- Take any bag of balls and divide it into two new bags with a **positive** number of balls.
  - For example, a bag of `5` balls can become two new bags of `1` and `4` balls, or two new bags of `2` and `3` balls.

Your penalty is the **maximum** number of balls in a bag. You want to minimize your penalty after the operations.

Return _the minimum possible penalty after performing the operations_.

**Example 1:**

- **Input:** nums = [9], maxOperations = 2
- **Output:** 3
- **Explanation:**
  - Divide the bag with 9 balls into two bags of sizes 6 and 3. [9] -> [6,3].
  - Divide the bag with 6 balls into two bags of sizes 3 and 3. [6,3] -> [3,3,3].
    The bag with the most number of balls has 3 balls, so your penalty is 3 and you should return 3.

**Example 2:**

- **Input:** nums = [2,4,8,2], maxOperations = 4
- **Output:** 2
- **Explanation:**
  - Divide the bag with 8 balls into two bags of sizes 4 and 4. [2,4,8,2] -> [2,4,4,4,2].
  - Divide the bag with 4 balls into two bags of sizes 2 and 2. [2,4,4,4,2] -> [2,2,2,4,4,2].
  - Divide the bag with 4 balls into two bags of sizes 2 and 2. [2,2,2,4,4,2] -> [2,2,2,2,2,4,2].
  - Divide the bag with 4 balls into two bags of sizes 2 and 2. [2,2,2,2,2,4,2] -> [2,2,2,2,2,2,2,2].
    The bag with the most number of balls has 2 balls, so your penalty is 2, and you should return 2.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= maxOperations, nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. Let's change the question if we know the maximum size of a bag what is the minimum number of bags you can make
2. note that as the maximum size increases the minimum number of bags decreases so we can binary search the maximum size



**Solution:**

We can use **binary search** to find the minimum possible penalty. The key insight is that if we can determine whether a given penalty is achievable, we can narrow down the search range using binary search.

### Steps to Solve:
1. **Binary Search Setup**:
   - The minimum penalty is `1` (all balls are split into single-ball bags).
   - The maximum penalty is the largest number in the `nums` array.

2. **Feasibility Check**:
   - For a given penalty `mid`, check if it's possible to achieve it with at most `maxOperations` splits.
   - To do this, for each bag size in `nums`, calculate the number of splits required to make all bags have `mid` balls or fewer. If the total splits exceed `maxOperations`, the penalty `mid` is not feasible.

3. **Iterate**:
   - Use binary search to adjust the range `[low, high]` based on whether a penalty `mid` is feasible.

Let's implement this solution in PHP: **[1760. Minimum Limit of Balls in a Bag](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001760-minimum-limit-of-balls-in-a-bag/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $maxOperations
 * @return Integer
 */
function minimumSize($nums, $maxOperations) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to check if a penalty is feasible
 *
 * @param $nums
 * @param $maxOperations
 * @param $penalty
 * @return bool
 */
function canAchievePenalty($nums, $maxOperations, $penalty) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [9];
$maxOperations = 2;
echo minimumSize($nums, $maxOperations); // Output: 3

// Example 2
$nums = [2, 4, 8, 2];
$maxOperations = 4;
echo minimumSize($nums, $maxOperations); // Output: 2
?>
```

### Explanation:

1. **Binary Search**:
   - The search space is between `1` and the maximum number in the `nums` array.
   - The midpoint `mid` represents the current penalty we are testing.

2. **Feasibility Check (`canAchievePenalty`)**:
   - For each bag, calculate the required splits to ensure all bags have `mid` balls or fewer:
      - `ceil(balls / mid) - 1` gives the number of splits needed.
   - If the total splits exceed `maxOperations`, the penalty is not feasible.

3. **Adjust Search Space**:
   - If the penalty is feasible, reduce the upper bound (`high = mid`).
   - If not, increase the lower bound (`low = mid + 1`).

4. **Result**:
   - When the loop exits, `low` contains the smallest feasible penalty.

### Complexity:
- **Time Complexity**: _**O(n . log(max(nums)))**_
   - Binary search runs in _**O(log(max(nums)))**_, and the feasibility check for each midpoint takes _**O(n)**_.
- **Space Complexity**: _**O(1)**_, as we only use constant extra space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
