3550\. Smallest Index With Digit Sum Equal to Index

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Weekly Contest 450`

You are given an integer array `nums`.

Return the **smallest** index `i` such that the sum of the digits of `nums[i]` is equal to `i`.

If no such index exists, return `-1`.

**Example 1:**

- **Input:** nums = [1,3,2]
- **Output:** 2
- **Explanation:** For `nums[2] = 2`, the sum of digits is 2, which is equal to index `i = 2`. Thus, the output is 2.

**Example 2:**

- **Input:** nums = [1,10,11]
- **Output:** 1
- **Explanation:**
  - For `nums[1] = 10`, the sum of digits is `1 + 0 = 1`, which is equal to index `i = 1`.
  - For `nums[2] = 11`, the sum of digits is `1 + 1 = 2`, which is equal to index `i = 2`.
  - Since index 1 is the smallest, the output is 1.


**Example 3:**

- **Input:** nums = [1,2,3]
- **Output:** -1
- **Explanation:** Since no index satisfies the condition, the output is -1.


**Example 4:**

- **Input:** nums = [0]
- **Output:** 0


**Example 5:**

- **Input:** nums = [0, 1]
- **Output:** 0


**Example 6:**

- **Input:** nums = [9, 10]
- **Output:** 1


**Example 7:**

- **Input:** nums = [5, 6, 7, 8, 9, 10]
- **Output:** 5


**Example 8:**

- **Input:** nums = [1000]
- **Output:** -1

**Constraints:**

- `1 <= nums.length <= 100`
- `0 <= nums[i] <= 1000`


**Hint:**

1. Simulate as described


**Solution:**

We scan the array from left to right, compute the sum of digits for each `nums[i]`, and return the first index `i` where that digit sum equals `i`. If no index satisfies the condition, we return `-1`.

## Approach

- Iterate through `nums` using `foreach ($nums as $i => $num)`.
- For each number, compute its digit sum by repeatedly taking `% 10` and dividing by `10`.
- Compare the computed digit sum with the current index `i`.
- Return `i` immediately when a match is found, because scanning left-to-right guarantees the smallest index.
- If the loop finishes without a match, return `-1`.

Let's implement this solution in PHP: **[3550. Smallest Index With Digit Sum Equal to Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003550-smallest-index-with-digit-sum-equal-to-index/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function smallestIndex(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestIndex([1,3,2]) .  "\n";                    // Output: 2
echo smallestIndex([1,10,11]) .  "\n";                  // Output: 1
echo smallestIndex([1,2,3]) .  "\n";                    // Output: -1
echo smallestIndex([0]) .  "\n";                        // Output: 0
echo smallestIndex([0,1]) .  "\n";                      // Output: 0
echo smallestIndex([9,10]) .  "\n";                     // Output: 1
echo smallestIndex([5, 6, 7, 8, 9, 10]) .  "\n";        // Output: 5
echo smallestIndex([1000]) .  "\n";                     // Output: -1
?>
```

### Explanation:

- Index `i` starts from `0`.
- For a number like `10`, the digit sum is `1 + 0 = 1`.
- For `nums[i] = 0`, the digit sum is `0`, which is handled correctly because the `while ($x > 0)` loop simply does not run.
- Since we return on the first valid index, no extra comparison or storage is needed.

## Complexity Analysis

- **Time Complexity:** `O(n * d)`, where `n` is the length of `nums` and `d` is the maximum number of digits in `nums[i]`. Since `nums[i] <= 1000`, `d <= 4`, so this is effectively `O(n)`.
- **Space Complexity:** `O(1)`, because only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**