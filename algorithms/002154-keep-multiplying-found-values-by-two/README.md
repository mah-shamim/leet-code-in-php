2154\. Keep Multiplying Found Values by Two

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sorting`, `Simulation`, `Weekly Contest 278`

You are given an array of integers `nums`. You are also given an integer `original` which is the first number that needs to be searched for in `nums`.

You then do the following steps:

- If `original` is found in `nums`, **multiply** it by two (i.e., set `original = 2 * original`).
- Otherwise, **stop** the process.
- **Repeat** this process with the new number as long as you keep finding the number.

Return _the **final** value of `original`_.

**Example 1:**

- **Input:** nums = [5,3,6,1,12], original = 3
- **Output:** 24
- **Explanation:**
  - 3 is found in nums. 3 is multiplied by 2 to obtain 6.
  - 6 is found in nums. 6 is multiplied by 2 to obtain 12.
  - 12 is found in nums. 12 is multiplied by 2 to obtain 24.
  - 24 is not found in nums. Thus, 24 is returned.

**Example 2:**

- **Input:** nums = [2,7,9], original = 4
- **Output:** 4
- **Explanation:**
  - 4 is not found in nums. Thus, 4 is returned.

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i], original <= 1000`



**Hint:**
1. Repeatedly iterate through the array and check if the current value of original is in the array.
2. If original is not found, stop and return its current value.
3. Otherwise, multiply original by 2 and repeat the process.
4. Use set data structure to check the existence faster.



**Similar Questions:**
1. [747. Largest Number At Least Twice of Others](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000747-largest-number-at-least-twice-of-others)
2. [1346. Check If N and Its Double Exist](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001346-check-if-n-and-its-double-exist)






**Solution:**

We need to repeatedly check if the current value of `original` exists in the given array `nums`. If it does, we double `original` and continue checking. This process stops when `original` is no longer found in `nums`.

### Approach:

1. **Efficient Lookup**: Convert the array `nums` into a set for O(1) average time complexity lookups.
2. **Iterative Checking**: Continuously check if the current value of `original` exists in the set. If it does, double `original` and repeat the process. If not, return the current value of `original`.

Let's implement this solution in PHP: **[2154. Keep Multiplying Found Values by Two](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002154-keep-multiplying-found-values-by-two/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $original
 * @return Integer
 */
function findFinalValue($nums, $original) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findFinalValue([5,3,6,1,12], 3) . "\n";    // Output: 24
echo findFinalValue([2,7,9], 4) . "\n";         // Output: 4
echo findFinalValue([1,2,3], 10) . "\n";        // Output: 10
?>
```

### Explanation:

1. **Convert to Set**: Using `array_flip` converts the array into a set-like structure where the values from `nums` become keys. This allows O(1) average time complexity for membership checks.
2. **Loop Until Not Found**: The while loop checks if the current `original` exists in the set. If it does, `original` is doubled. This continues until `original` is not found in the set, at which point the loop exits and the current value of `original` is returned.

This approach efficiently checks for the existence of `original` and its subsequent doubled values, ensuring optimal performance even for the upper constraint limits. The use of a set ensures that each check is done in constant time, making the overall time complexity O(n) in the worst case, where n is the number of elements in `nums`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**