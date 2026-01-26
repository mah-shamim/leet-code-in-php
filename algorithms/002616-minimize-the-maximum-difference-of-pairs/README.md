2616\. Minimize the Maximum Difference of Pairs

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Greedy`

You are given a **0-indexed** integer array `nums` and an integer `p`. Find `p` pairs of indices of `nums` such that the **maximum** difference amongst all the pairs is **minimized**. Also, ensure no index appears more than once amongst the `p` pairs.

Note that for a pair of elements at the index `i` and `j`, the difference of this pair is `|nums[i] - nums[j]|`, where `|x|` represents the **absolute value** of `x`.

Return the **minimum maximum** difference among all `p` pairs. We define the maximum of an empty set to be zero.

**Example 1:**

- **Input:** nums = [10,1,2,7,1,3], p = 2
- **Output:** 1
- **Explanation:** The first pair is formed from the indices 1 and 4, and the second pair is formed from the indices 2 and 5.
  The maximum difference is max(|nums[1] - nums[4]|, |nums[2] - nums[5]|) = max(0, 1) = 1. Therefore, we return 1.

**Example 2:**

- **Input:** nums = [4,2,1,2], p = 1
- **Output:** 0
- **Explanation:** Let the indices 1 and 3 form a pair. The difference of that pair is |2 - 2| = 0, which is the minimum we can attain.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>
- `0 <= p <= (nums.length)/2`


**Hint:**
1. Can we use dynamic programming here?
2. To minimize the answer, the array should be sorted first.
3. The recurrence relation is fn(i, x) = min(fn(i+1, x), max(abs(nums[i]-nums[i+1]), fn(i+2, p-1)), and fn(0,p) gives the desired answer.


**Similar Questions:**
1. [1200. Minimum Absolute Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001200-minimum-absolute-difference)
2. [1509. Minimum Difference Between Largest and Smallest Value in Three Moves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001509-minimum-difference-between-largest-and-smallest-value-in-three-moves)






**Solution:**

We need to minimize the maximum difference among `p` pairs of indices in an array such that no index appears more than once. The solution involves sorting the array and using binary search to efficiently determine the smallest possible maximum difference.

### Approach
1. **Problem Analysis**: The problem requires selecting `p` pairs of indices from the array such that the maximum absolute difference among all pairs is minimized. Each index can be used at most once. The key insight is that sorting the array allows us to consider adjacent elements for forming pairs with the smallest possible differences, which helps in minimizing the maximum difference.

2. **Binary Search Setup**: We use binary search on the possible range of maximum differences (from 0 to the difference between the largest and smallest elements in the sorted array). The goal is to find the smallest value `mid` such that at least `p` pairs can be formed where each pair's difference is at most `mid`.

3. **Greedy Pair Formation**: For each candidate `mid` during the binary search, we traverse the sorted array and greedily form pairs. If the difference between the current element and the next element is within `mid`, we form a pair and skip the next element. This greedy approach ensures we maximize the number of pairs formed, which is crucial for checking the feasibility of `mid`.

4. **Binary Search Execution**: The binary search narrows down the smallest `mid` where the greedy method forms at least `p` pairs. If a `mid` value allows forming `p` pairs, we search for a smaller value; otherwise, we search for a larger value.

Let's implement this solution in PHP: **[2616. Minimize the Maximum Difference of Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002616-minimize-the-maximum-difference-of-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $p
 * @return Integer
 */
function minimizeMax($nums, $p) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @param $mid
 * @param $p
 * @return bool
 */
function canFormPairs($nums, $mid, $p) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = array(10, 1, 2, 7, 1, 3);
$p1 = 2;
echo "Output 1: " . minimizeMax($nums1, $p1) . "\n"; // Output: 1

$nums2 = array(4, 2, 1, 2);
$p2 = 1;
echo "Output 2: " . minimizeMax($nums2, $p2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Initial Check**: If `p` is zero, the result is zero since no pairs are needed.
2. **Sorting**: The array is sorted to facilitate adjacent element pairing, which helps in minimizing differences.
3. **Binary Search**: The search space is between 0 and the difference between the largest and smallest elements. For each midpoint `mid`, we check if it's possible to form at least `p` pairs where each pair's difference is at most `mid`.
4. **Greedy Validation**: The `canFormPairs` function traverses the sorted array, forming pairs whenever adjacent elements meet the difference constraint. It skips the next element after forming a pair to avoid reuse. If `p` pairs are formed, it returns early.
5. **Binary Search Adjustment**: Based on whether `mid` allows forming enough pairs, the search space is adjusted. If feasible, we search for a smaller `mid`; otherwise, we search larger values. The loop exits when the smallest feasible `mid` is found.

This approach efficiently narrows down the solution using binary search and validates candidates with a linear pass through the array, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**