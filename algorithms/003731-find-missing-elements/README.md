3731\. Find Missing Elements

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Sorting`, `Weekly Contest 474`

You are given an integer array `nums` consisting of **unique** integers.

Originally, `nums` contained **every integer** within a certain range. However, some integers might have gone **missing** from the array.

The **smallest** and **largest** integers of the original range are still present in `nums`.

Return a **sorted** list of all the missing integers in this range. If no integers are missing, return an **empty** list.

**Example 1:**

- **Input:** nums = [1,4,2,5]
- **Output:** [3]
- **Explanation:** The smallest integer is 1 and the largest is 5, so the full range should be `[1,2,3,4,5]`. Among these, only 3 is missing.

**Example 2:**

- **Input:** nums = [7,8,6,9]
- **Output:** []
- **Explanation:** The smallest integer is 6 and the largest is 9, so the full range is `[6,7,8,9]`. All integers are already present, so no integer is missing.

**Example 3:**

- **Input:** nums = [5,1]
- **Output:** [2,3,4]
- **Explanation:** The smallest integer is 1 and the largest is 5, so the full range should be `[1,2,3,4,5]`. The missing integers are 2, 3, and 4.

**Example 4:**

- **Input:** nums = [1,10]
- **Output:** [2,3,4,5,6,7,8,9]

**Example 5:**

- **Input:** nums = [2,3]
- **Output:** []

**Example 6:**

- **Input:** nums = [1,2,4,5]
- **Output:** [3]

**Example 7:**

- **Input:** nums = [10,7,9,8]
- **Output:** []

**Example 8:**

- **Input:** nums = [2,5]
- **Output:** [3,4]

**Constraints:**

- `2 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. First, find the maximum and minimum elements in the array.
2. Then, iterate over all the integers in the range `[min, max]` and check if they are in the array.
3. If not, add them to the array, and return the sorted array at the end.


**Solution:**

We implement an efficient solution to find missing integers in a given range by leveraging array hashing for _**O(1)**_ lookups. Our approach identifies the minimum and maximum values from the input array to define the complete range, then iterates through that range to identify any missing numbers using a hash map for fast membership testing.

## Approach

- Use PHP's built-in `min()` and `max()` functions to find the smallest and largest values in the input array
- Create a lookup table using `array_flip()` which maps each value to its index, enabling _**O(1)**_ membership checks
- Iterate through all integers from `min` to `max` inclusive
- For each integer, check if it exists in the flipped array using `isset()`
- Collect any integers not present in the original array into the result array
- Return the collected missing numbers (they will naturally be sorted since we iterate in ascending order)

Let's implement this solution in PHP: **[3731. Find Missing Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003731-find-missing-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function findMissingElements(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findMissingElements([1,4,2,5]) .  "\n";            // Output: [3]
echo findMissingElements([7,8,6,9]) .  "\n";            // Output: []
echo findMissingElements([5,1]) .  "\n";                // Output: [2,3,4]
echo findMissingElements([1,10]) .  "\n";               // Output: [2,3,4,5,6,7,8,9]
echo findMissingElements([2,3]) .  "\n";                // Output: []
echo findMissingElements([1,2,4,5]) .  "\n";            // Output: [3]
echo findMissingElements([10,7,9,8]) .  "\n";           // Output: []
echo findMissingElements([2,5]) .  "\n";                // Output: [3,4]
?>
```

### Explanation:

- **Range Definition**: The original range is bounded by the minimum and maximum values still present in `nums`, as guaranteed by the problem statement
- **Lookup Optimization**: Converting the array to a hash map (via `array_flip`) allows constant-time existence checks instead of _**O(n)**_ linear searches
- **Iteration Pattern**: We loop from `$min` to `$max` inclusive, ensuring we check every possible value in the range
- **Missing Detection**: For each value `$i`, we check if it exists as a key in the flipped array; if not, it's missing
- **Sorted Output**: Since we iterate in ascending order from `min` to `max`, we collect missing numbers in sorted order without needing additional sorting

## Complexity Analysis

- **Time Complexity**: _**O(n + range)**_ where `n` is the length of the input array and `range` is `(max - min + 1)`. We spend _**O(n)**_ to flip the array and _**O(range)**_ to scan through the range. In the worst case, `range ≤ 100` (given constraints), making this effectively `O(n + 100)`
- **Space Complexity**: _**O(n)**_ for the flipped array lookup table, plus _**O(range)**_ for the result array in the worst case

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**