1200\. Minimum Absolute Difference

**Difficulty:** Easy

**Topics:** `Array`, `Sorting`, `Weekly Contest 155`

Given an array of **distinct** integers `arr`, find all pairs of elements with the minimum absolute difference of any two elements.

Return a list of pairs in ascending order(with respect to pairs), each pair `[a, b]` follows
- `a, b` are from `arr`
- `a < b`
- `b - a` equals to the minimum absolute difference of any two elements in `arr`


**Example 1:**

- **Input:** arr = [4,2,1,3]
- **Output:** [[1,2],[2,3],[3,4]]
- **Explanation:** The minimum absolute difference is 1. List all pairs with difference equal to 1 in ascending order.

**Example 2:**

- **Input:** arr = [1,3,6,10,15]
- **Output:** [[1,3]]

**Example 3:**

- **Input:** arr = [3,8,-10,23,19,-4,-14,27]
- **Output:** [[-14,-10],[19,23],[23,27]]

**Constraints:**

- `2 <= arr.length <= 10⁵`
- `-10⁶ <= arr[i] <= 10⁶`



**Hint:**
1. Find the minimum absolute difference between two elements in the array.
2. The minimum absolute difference must be a difference between two consecutive elements in the sorted array.


**Similar Questions:**
1. [2144. Minimum Cost of Buying Candies With Discount](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002144-minimum-cost-of-buying-candies-with-discount)
2. [2616. Minimize the Maximum Difference of Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002616-minimize-the-maximum-difference-of-pairs)






**Solution:**

We need to find all pairs with the minimum absolute difference. The key insight is that after sorting the array, pairs with the minimum difference will always be consecutive elements in the sorted order.

### Approach:

1. **Sort the array** in ascending order.
2. **Find the minimum difference** by comparing consecutive elements in the sorted array.
3. **Collect all pairs** that have this minimum difference.

Let's implement this solution in PHP: **[1200. Minimum Absolute Difference](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001200-minimum-absolute-difference/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer[][]
 */
function minimumAbsDifference(array $arr): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumAbsDifference([4,2,1,3]) . "\n";                        // Output: [[1,2],[2,3],[3,4]]
echo minimumAbsDifference([1,3,6,10,15]) . "\n";                    // Output: [[1,3]]
echo minimumAbsDifference([3,8,-10,23,19,-4,-14,27]) . "\n";        // Output: [[-14,-10],[19,23],[23,27]]
?>
```

### Explanation:

1. **Sorting**: We start by sorting the array. This ensures that:
   - Pairs are naturally in ascending order
   - Minimum differences can only occur between consecutive elements
   - We maintain the `a < b` requirement

2. **Finding Minimum Difference**:
   - In the sorted array, we compare each element with its neighbor
   - Keep track of the smallest difference found

3. **Collecting Pairs**:
   - Traverse the array again (or in the same pass) to collect all consecutive pairs whose difference equals the minimum

### Complexity
- **Time Complexity**: O(n log n) due to sorting
- **Space Complexity**: O(1) or O(n) depending on the sorting algorithm (PHP's `sort()` uses quicksort which is O(log n) space for recursion stack)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**