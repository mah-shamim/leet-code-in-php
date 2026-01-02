961\. N-Repeated Element in Size 2N Array

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Weekly Contest 116`

You are given an integer array `nums` with the following properties:

- `nums.length == 2 * n`.
- `nums` contains `n + 1` **unique** elements.
- Exactly one element of `nums` is repeated `n` times.

Return _the element that is repeated `n` times_.

**Example 1:**

- **Input:** nums = [1,2,3,3]
- **Output:** 3

**Example 2:**

- **Input:** nums = [2,1,2,5,3,2]
- **Output:** 2

**Example 3:**

- **Input:** nums = [5,1,5,2,5,3,5,4]
- **Output:** 5

**Constraints:**

- `2 <= n <= 5000`
- `nums.length == 2 * n`
- `0 <= nums[i] <= 10⁴`
- `nums` contains `n + 1` **unique** elements and one of them is repeated exactly `n` times.







**Solution:**

We need to find the element that appears exactly `n` times in an array of size `2n`. The array contains `n+1` unique elements, so exactly one element is repeated `n` times while all others appear once.

### Approach:

*   Use a Hash Table (associative array in PHP) to count the frequency of each element.
*   Traverse the array and update the count for each element in the hash table.
*   As soon as we encounter an element with a count of 2, we can return it immediately.
*   This early return is possible because the repeated element appears `n` times (where `n ≥ 2`), and all other elements appear exactly once.

Let's implement this solution in PHP: **[961. N-Repeated Element in Size 2N Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000961-n-repeated-element-in-size-2n-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function repeatedNTimes($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo repeatedNTimes([1,2,3,3]) . "\n";              // Output: 3
echo repeatedNTimes([2,1,2,5,3,2]) . "\n";          // Output: 2
echo repeatedNTimes([5,1,5,2,5,3,5,4]) . "\n";      // Output: 5
?>
```

### Explanation:

*   **Hash Table Initialization**: Start with an empty associative array (`$map`) to store element frequencies.
*   **Iterate and Count**: Loop through each element in the input array `$nums`.
*   **Frequency Check**: For each element, check if it already exists in the hash table.
   *   If it does, this is the repeated element (since all others are unique), so return it immediately.
   *   If it doesn't, add it to the hash table with a count of 1.
*   **Early Return Benefit**: The solution stops at the second occurrence of the repeated element, making it efficient with an average time complexity of O(n) and a worst-case of O(n) when the repeated element appears at the very end.

### Complexity
- **Time:** O(n) - we only traverse the array once
- **Space:** O(1) - we use constant extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**