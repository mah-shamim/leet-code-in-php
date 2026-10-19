2089\. Find Target Indices After Sorting Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Binary Search`, `Sorting`, `Weekly Contest 269`

You are given a **0-indexed** integer array `nums` and a target element `target`.

A **target index** is an index `i` such that `nums[i] == target`.

Return a list of the target indices of `nums` after sorting `nums` in **non-decreasing** order. If there are no target indices, return an **empty** list. The returned list must be sorted in **increasing** order.

**Example 1:**

- **Input:** nums = [1,2,5,2,3], target = 2
- **Output:** [1,2]
- **Explanation:** 
  - After sorting, nums is [1,2,2,3,5].
  - The indices where nums[i] == 2 are 1 and 2.

**Example 2:**

- **Input:** nums = [1,2,5,2,3], target = 3
- **Output:** [3]
- **Explanation:** 
  - After sorting, nums is [1,2,2,3,5].
  - The index where nums[i] == 3 is 3.

**Example 3:**

- **Input:** nums = [1,2,5,2,3], target = 5
- **Output:** [4]
- **Explanation:** 
  - After sorting, nums is [1,2,2,3,5].
  - The index where nums[i] == 5 is 4.

**Example 4:**

- **Input:** nums = [1], target = 1
- **Output:** [0]

**Example 5:**

- **Input:** nums = [1], target = 2
- **Output:** []

**Example 6:**

- **Input:** nums = [2,2,2], target = 2
- **Output:** [0,1,2]

**Example 7:**

- **Input:** nums = [5,4,3,2,1], target = 3
- **Output:** [2]

**Example 8:**

- **Input:** nums = [1,1,1], target = 2
- **Output:** []

**Example 9:**

- **Input:** nums = [1,2,3], target = 1
- **Output:** [0]

**Example 10:**

- **Input:** nums = [3,1,2], target = 2
- **Output:** [1]

**Example 11:**

- **Input:** nums = [100,1,100], target = 100
- **Output:** [1,2]

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i], target <= 100`


**Hint:**

1. Try "sorting" the array first.
2. Now find all indices in the array whose values are equal to target.


**Similar Questions:**

1. [34. Find First and Last Position of Element in Sorted Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000034-find-first-and-last-position-of-element-in-sorted-array)
2. [1331. Rank Transform of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001331-rank-transform-of-an-array)
3. [2942. Find Words Containing Character](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002942-find-words-containing-character)


**Solution:**

We avoid explicitly sorting the array by counting how many values are smaller than `target` and how many values equal `target`. In the sorted array, the target values will occupy the contiguous indices starting at `less` through `less + equal - 1`.

## Approach

- Initialize two counters: `less` for elements smaller than `target`, and `equal` for elements equal to `target`.
- Traverse `nums` once.
- If `num < target`, increment `less`.
- If `num === target`, increment `equal`.
- After traversal, the sorted target indices are `less, less + 1, ..., less + equal - 1`.
- Build and return that list.

Let's implement this solution in PHP: **[2089. Find Target Indices After Sorting Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002089-find-target-indices-after-sorting-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function targetIndices(array $nums, int $target): array
{
    $less = 0;
    $equal = 0;

    foreach ($nums as $num) {
        if ($num < $target) {
            $less++;
        } elseif ($num === $target) {
            $equal++;
        }
    }

    $result = [];
    for ($i = 0; $i < $equal; $i++) {
        $result[] = $less + $i;
    }

    return $result;
}

// Test cases
echo targetIndices([1,2,5,2,3], 2) .  "\n";         // Output: [1, 2]
echo targetIndices([1,2,5,2,3], 3) .  "\n";         // Output: [3]
echo targetIndices([1,2,5,2,3], 5) .  "\n";         // Output: [4]
echo targetIndices([1], 1) .  "\n";                 // Output: [0]
echo targetIndices([1], 2) .  "\n";                 // Output: []
echo targetIndices([2,2,2], 2) .  "\n";             // Output: [0, 1, 2]
echo targetIndices([5,4,3,2,1], 3) .  "\n";         // Output: [2]
echo targetIndices([1,1,1], 2) .  "\n";             // Output: []
echo targetIndices([1,2,3], 1) .  "\n";             // Output: [0]
echo targetIndices([3,1,2], 2) .  "\n";             // Output: [1]
echo targetIndices([100,1,100], 100) .  "\n";       // Output: [1,2]
?>
```

### Explanation:

- Sorting would place all numbers smaller than `target` before it, so the first possible target index is exactly the count of smaller numbers.
- All occurrences of `target` are identical, so in sorted order they form a contiguous block.
- The number of indices in that block is `equal`.
- Therefore, the answer is the range from `less` to `less + equal - 1`.
- If `equal` is zero, the loop produces an empty list, which is correct.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of `nums`. We traverse the array once and then build the result.
- **Space Complexity:** `O(1)` auxiliary space excluding the output array. The output array uses `O(k)` space, where `k` is the number of target occurrences.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**