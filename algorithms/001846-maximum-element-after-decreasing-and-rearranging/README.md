1846\. Maximum Element After Decreasing and Rearranging

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Greedy`, `Sorting`, `Biweekly Contest 51`

You are given an array of positive integers `arr`. Perform some operations (possibly none) on `arr` so that it satisfies these conditions:

- The value of the **first** element in `arr` must be `1`.
- The absolute difference between any 2 adjacent elements must be **less than or equal to** `1`. In other words, `abs(arr[i] - arr[i - 1]) <= 1` for each `i` where `1 <= i < arr.length` (**0-indexed**). `abs(x)` is the absolute value of `x`.

There are 2 types of operations that you can perform any number of times:

- **Decrease** the value of any element of `arr` to a **smaller positive integer**.
- **Rearrange** the elements of `arr` to be in any order.

Return _the **maximum** possible value of an element in `arr` after performing the operations to satisfy the conditions_.



**Example 1:**

- **Input:** arr = [2,2,1,2,1]
- **Output:** 2
- **Explanation:**
  - We can satisfy the conditions by rearranging `arr` so it becomes `[1,2,2,2,1]`.
  - The largest element in `arr` is 2.

**Example 2:**

- **Input:** arr = [100,1,1000]
- **Output:** 3
- **Explanation:**
  - One possible way to satisfy the conditions is by doing the following:
    1. Rearrange `arr` so it becomes `[1,100,1000]`.
    2. Decrease the value of the second element to 2.
    3. Decrease the value of the third element to 3.
  - Now `arr = [1,2,3]`, which satisfies the conditions.
  - The largest element in `arr is 3`.

**Example 3:**

- **Input:** arr = [1,2,3,4,5]
- **Output:** 5
- **Explanation:** The array already satisfies the conditions, and the largest element is 5.

**Constraints:**

- `1 <= arr.length <= 10⁵`
- `1 <= arr[i] <= 10⁹`


**Hint:**
1. Sort the Array.
2. Decrement each element to the largest integer that satisfies the conditions.


**Solution:**

We present an efficient solution that first sorts the array to enable a greedy approach, then iteratively adjusts each element to the maximum possible value while maintaining the constraint that adjacent differences are at most `1`, with the first element forced to be `1`. This yields the maximum possible largest element in _**O(n log n)**_ time.

## Approach

- **Sort the array** to determine the optimal order for satisfying adjacent constraints
- **Set the first element to 1** as required by the problem conditions
- **Iterate through the sorted array** and cap each element to at most the previous element + 1
- **Return the last element** which will be the maximum possible value after all adjustments

Let's implement this solution in PHP: **[1846. Maximum Element After Decreasing and Rearranging](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001846-maximum-element-after-decreasing-and-rearranging/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function maximumElementAfterDecrementingAndRearranging(array $arr): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumElementAfterDecrementingAndRearranging([2,2,1,2,1]) .  "\n";            // Output: 2
echo maximumElementAfterDecrementingAndRearranging([100,1,1000]) .  "\n";           // Output: 3
echo maximumElementAfterDecrementingAndRearranging([1,2,3,4,5]) .  "\n";            // Output: 5
?>
````

### Explanation:

- **Sorting first** allows us to arrange elements in non-decreasing order, which is optimal because it gives us the most flexibility to increase smaller elements while keeping larger ones as big as possible
- **Setting arr[0] = 1** satisfies the first condition that the first element must be 1
- **For each subsequent position i**, we use `min(arr[i], arr[i-1] + 1)` because:
   - We can only decrease elements, never increase them
   - The maximum value at position i cannot exceed the original value at that position
   - The maximum value at position i cannot exceed the previous value + 1 (to satisfy adjacent difference ≤ 1)
- **The last element** after processing will be the maximum possible value because the array is sorted and we've maximized each position greedily
- This greedy approach works because making an element smaller than necessary would only limit subsequent elements, and we can always maintain the same maximum by keeping each element as large as possible

## Complexity Analysis

- **Time Complexity**: _**O(n log n)**_ where n is the length of `arr`, due to sorting
- **Space Complexity**: _**O(1)**_ auxiliary space (sorting is done in-place)
- The iteration through the array is _**O(n)**_, which is dominated by the sorting step

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**