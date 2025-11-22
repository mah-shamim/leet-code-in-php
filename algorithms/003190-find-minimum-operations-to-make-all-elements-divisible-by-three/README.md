3190\. Find Minimum Operations to Make All Elements Divisible by Three

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Biweekly Contest 133`

You are given an integer array `nums`. In one operation, you can add or subtract 1 from **any** element of `nums`.

Return the **minimum** number of operations to make all elements of `nums` divisible by 3.

**Example 1:**

- **Input:** nums = [1,2,3,4]
- **Output:** 3
- **Explanation:** All array elements can be made divisible by 3 using 3 operations:
    - Subtract 1 from 1.
    - Add 1 to 2.
    - Subtract 1 from 4.


**Example 2:**

- **Input:** nums = [3,6,9]
- **Output:** 0

**Constraints:**

- `1 <= nums.length <= 50`
- `1 <= nums[i] <= 50`



**Hint:**
1. If `x % 3 != 0` we can always increment or decrement `x` such that we only need 1 operation.
2. Add `min(nums[i] % 3, 3 - (num[i] % 3))` to the count of operations.




**Similar Questions:**
1. [453. Minimum Moves to Equal Array Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000453-minimum-moves-to-equal-array-elements)






**Solution:**

We need to make all elements divisible by 3 with minimum operations, where each operation is adding or subtracting 1.

For any number, there are three possible cases:
1. If it's already divisible by 3: 0 operations needed
2. If it's 1 more than a multiple of 3: we can subtract 1 (1 operation)
3. If it's 2 more than a multiple of 3: we can add 1 (1 operation)

So for each number, the minimum operations needed is simply the minimum distance to the nearest multiple of 3, which can be calculated as `min(num % 3, 3 - (num % 3))`.

Let's implement this solution in PHP: **[3190. Find Minimum Operations to Make All Elements Divisible by Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003190-remove-max-number-of-edges-to-keep-graph-fully-traversable/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumOperations($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumOperations([1,2,3,4]) . "\n";   // Output: 3
echo minimumOperations([3,6,9]) . "\n";     // Output: 0
?>
```

### Explanation:

1. **Iterate through each number** in the array
2. **Calculate remainder** when divided by 3 using `$num % 3`
3. **Find minimum operations** for current number:
   - If remainder is 0: both `$remainder` and `3 - $remainder` equal 0
   - If remainder is 1: `min(1, 2) = 1` (subtract 1)
   - If remainder is 2: `min(2, 1) = 1` (add 1)
4. **Sum up all operations** and return the total

**Time Complexity:** O(n) - we iterate through the array once
**Space Complexity:** O(1) - we only use a constant amount of extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**