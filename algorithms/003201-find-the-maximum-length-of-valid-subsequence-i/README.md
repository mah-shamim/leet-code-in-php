3201\. Find the Maximum Length of Valid Subsequence I

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You are given an integer array `nums`.

A subsequence[^1] `sub` of `nums` with length `x` is called **valid** if it satisfies:

- `(sub[0] + sub[1]) % 2 == (sub[1] + sub[2]) % 2 == ... == (sub[x - 2] + sub[x - 1]) % 2`.

Return the length of the **longest valid** subsequence of `nums`.

A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [1,2,3,4]
- **Output:** 4
- **Explanation:** The longest valid subsequence is `[1, 2, 3, 4]`.

**Example 2:**

- **Input:** nums = [1,2,1,1,2,1,2]
- **Output:** 6
- **Explanation:** The longest valid subsequence is `[1, 2, 1, 2, 1, 2]`.

**Example 3:**

- **Input:** nums = [1,3]
- **Output:** 2
- **Explanation:** The longest valid subsequence is `[1, 3]`.

**Constraints:**

- <code>2 <= nums.length <= 2 * 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>7</sup></code>


**Hint:**
1. The possible sequence either contains all even elements, all odd elements, alternate even odd, or alternate odd even elements.
2. Considering only the parity of elements, there are only 4 possibilities and we can try all of them.
3. When selecting an element with any parity, try to select the earliest one.


**Similar Questions:**
1. [300. Longest Increasing Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000300-longest-increasing-subsequence)
2. [2915. Length of the Longest Subsequence That Sums to Target](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002915-length-of-the-longest-subsequence-that-sums-to-target)


[^1]: **Subsequence:** A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.



**Solution:**

We need to find the length of the longest valid subsequence in an array where the sum of every pair of consecutive elements in the subsequence has the same parity (either all even or all odd). The solution involves analyzing the array based on the parity of its elements and leveraging dynamic programming to efficiently compute the result.

### Approach
1. **Problem Analysis**: The problem requires finding a subsequence where the sum of every consecutive pair of elements has the same parity. This condition can be satisfied in two scenarios:
    - **Same Parity Subsequence**: All elements in the subsequence are either even or odd. The sum of any two consecutive even or odd numbers is even, satisfying the condition.
    - **Alternating Parity Subsequence**: The subsequence alternates between even and odd elements. The sum of an even and an odd number is odd, which also satisfies the condition if all consecutive pairs have odd sums.

2. **Key Insights**:
    - **Same Parity**: The longest valid subsequence of all even or all odd elements is simply the count of all even or all odd elements in the array, provided there are at least two such elements.
    - **Alternating Parity**: The longest alternating subsequence can be found using dynamic programming by maintaining two variables:
        - `even_len`: Length of the longest alternating subsequence ending with an even number.
        - `odd_len`: Length of the longest alternating subsequence ending with an odd number.
    - For each element in the array, update `even_len` or `odd_len` based on the element's parity. If the element is even, `even_len` is updated to the maximum of its current value or `odd_len + 1` (indicating extending an alternating sequence ending with an odd number). Similarly, if the element is odd, `odd_len` is updated to the maximum of its current value or `even_len + 1`.

3. **Algorithm Selection**:
    - Traverse the array once to count the number of even and odd elements.
    - During the traversal, dynamically update `even_len` and `odd_len` to track the longest alternating subsequence.
    - Compute the candidate lengths for same parity (if feasible) and alternating parity subsequences.
    - The result is the maximum among the longest same parity subsequence and the longest alternating subsequence (if its length is at least 2).

4. **Complexity Analysis**:
    - **Time Complexity**: O(n), where n is the number of elements in the array. The solution processes each element exactly once.
    - **Space Complexity**: O(1), as only a few variables are used to store intermediate results.

Let's implement this solution in PHP: **[3201. Find the Maximum Length of Valid Subsequence I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003201-find-the-maximum-length-of-valid-subsequence-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumLength($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1, 2, 3, 4];            // Output: 4
$nums2 = [1, 2, 1, 1, 2, 1, 2];   // Output: 6
$nums3 = [1, 3];                  // Output: 2

echo maximumLength($nums1) . "\n";
echo maximumLength($nums2) . "\n";
echo maximumLength($nums3) . "\n";
?>
```

### Explanation:

1. **Initialization**: Variables `count_even` and `count_odd` are initialized to zero to count the number of even and odd elements. `even_len` and `odd_len` are initialized to zero to track the lengths of the longest alternating subsequences ending with an even or odd number, respectively.
2. **Traversal**: The array is traversed once. For each element:
    - If the element is even, `count_even` is incremented, and `even_len` is updated to the maximum of its current value or `odd_len + 1` (indicating the extension of an alternating sequence ending with an odd number).
    - If the element is odd, `count_odd` is incremented, and `odd_len` is updated to the maximum of its current value or `even_len + 1` (indicating the extension of an alternating sequence ending with an even number).
3. **Candidate Calculation**:
    - `candidate_same` is computed as the maximum count of even or odd elements, provided there are at least two such elements.
    - `candidate_alt` is the maximum of `even_len` and `odd_len`, set to zero if less than 2 (since a valid subsequence must have at least two elements).
4. **Result**: The result is the maximum value between `candidate_same` and `candidate_alt`, representing the longest valid subsequence satisfying the given conditions.

This approach efficiently checks both same parity and alternating parity scenarios in linear time, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**