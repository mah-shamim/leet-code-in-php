3736\. Minimum Moves to Equal Array Elements III

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Biweekly Contest 169`

You are given an integer array `nums`.

In one move, you may **increase** the value of any single element `nums[i]` by 1.

Return the **minimum total** number of **moves** required so that all elements in `nums` become **equal**.

**Example 1:**

- **Input:** nums = [2,1,3]
- **Output:** 3
- **Explanation:**
  - To make all elements equal:
     - Increase `nums[0] = 2` by 1 to make it 3.
     - Increase `nums[1] = 1` by 1 to make it 2.
     - Increase `nums[1] = 2` by 1 to make it 3.
  - Now, all elements of `nums` are equal to 3. The minimum total moves is `3`.

**Example 2:**

- **Input:** nums = [4,4,5]
- **Output:** 2
- **Explanation:**
  - To make all elements equal:
     - Increase `nums[0] = 4` by 1 to make it 5.
     - Increase `nums[1] = 4` by 1 to make it 5.
  - Now, all elements of `nums` are equal to 5. The minimum total moves is `2`.

**Example 3:**

- **Input:** nums = [1]
- **Output:** 0

**Example 4:**

- **Input:** nums = [5,5,5]
- **Output:** 0

**Example 5:**

- **Input:** nums = [1,2,3,4]
- **Output:** 6

**Example 6:**

- **Input:** nums = [100,1,100]
- **Output:** 99

**Example 7:**

- **Input:** nums = [1,1,1,1]
- **Output:** 0

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**

1. To make all numbers equal, they must all reach at least the maximum value in the array.


**Solution:**

We need to find the minimum number of increment operations required to make all elements in `nums` equal. Since only increments are allowed, every element must be raised to the current maximum value in the array. The answer is the sum of differences between the maximum value and each element.

## Approach

- Find the maximum value in the array using `max($nums)`.
- Initialize a `moves` counter to `0`.
- Iterate through each element in `nums`.
- For each element, add `max - element` to `moves`.
- Return the total `moves`.

Let's implement this solution in PHP: **[3736. Minimum Moves to Equal Array Elements III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003736-minimum-moves-to-equal-array-elements-iii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMoves(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minMoves([2,1,3]) . "\n";       // Output: 3
echo minMoves([4,4,5]) . "\n";       // Output: 2
echo minMoves([1]) . "\n";           // Output: 0
echo minMoves([5,5,5]) . "\n";       // Output: 0
echo minMoves([1,2,3,4]) . "\n";     // Output: 6
echo minMoves([100,1,100]) . "\n";   // Output: 99
echo minMoves([1,1,1,1]) . "\n";     // Output: 0
?>
```

## Explanation

- Increasing any element can only raise its value, never lower it.
- Therefore, the smallest valid common target is the maximum element in the array.
- If we chose any larger target, we would perform unnecessary extra moves.
- For each number `num`, the required moves to reach `max` is exactly `max - num`.
- Summing these differences gives the minimum total moves.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of `nums`. We traverse the array once to find the maximum and once to compute the total moves.
- **Space Complexity:** `O(1)`, since only a few scalar variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**