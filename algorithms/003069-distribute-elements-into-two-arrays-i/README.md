3069\. Distribute Elements Into Two Arrays I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Simulation`, `Weekly Contest 387`

You are given a **1-indexed** array of **distinct** integers `nums` of length `n`.

You need to distribute all the elements of `nums` between two arrays `arr1` and `arr2` using n operations. In the first operation, append `nums[1]` to `arr1`. In the second operation, append `nums[2]` to `arr2`. Afterward, in the `iᵗʰ` operation:

- If the last element of `arr1` is **greater** than the last element of `arr2`, append `nums[i]` to `arr1`. Otherwise, append `nums[i]` to `arr2`.

The array `result` is formed by concatenating the arrays `arr1` and `arr2`. For example, if `arr1 == [1,2,3]` and `arr2 == [4,5,6]`, then `result = [1,2,3,4,5,6]`.

Return _the array `result`_.

**Example 1:**

- **Input:** nums = [2,1,3]
- **Output:** [2,3,1]
- **Explanation:** 
  - After the first 2 operations, arr1 = [2] and arr2 = [1].
  - In the 3ʳᵈ operation, as the last element of arr1 is greater than the last element of arr2 (2 > 1), append nums[3] to arr1.
  - After 3 operations, arr1 = [2,3] and arr2 = [1].
  - Hence, the array result formed by concatenation is [2,3,1].

**Example 2:**

- **Input:** nums = [5,4,3,8]
- **Output:** [5,3,4,8]
- **Explanation:** 
  - After the first 2 operations, arr1 = [5] and arr2 = [4].
  - In the 3ʳᵈ operation, as the last element of arr1 is greater than the last element of arr2 (5 > 4), append nums[3] to arr1, hence arr1 becomes [5,3].
  - In the 4ᵗʰ operation, as the last element of arr2 is greater than the last element of arr1 (4 > 3), append nums[4] to arr2, hence arr2 becomes [4,8].
  - After 4 operations, arr1 = [5,3] and arr2 = [4,8].
  - Hence, the array result formed by concatenation is [5,3,4,8].

**Example 3:**

- **Input:** nums = [1,3,2,4]
- **Output:** [1,3,2,4]

**Example 4:**

- **Input:** nums = [4,3,2,1]
- **Output:** [4,2,3,1]

**Example 5:**

- **Input:** nums = [10,5,7]
- **Output:** [10,7,5]

**Example 6:**

- **Input:** nums = [100,1,99,2,98,3]
- **Output:** [100,99,2,98,3,1]

**Constraints:**

- `3 <= n <= 50`
- `1 <= nums[i] <= 100`
- All elements in `nums` are distinct.


**Hint:**
1. Divide the array into two arrays by keeping track of the last elements of both subarrays.


**Similar Questions:**
1. [410. Split Array Largest Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00410-split-array-largest-sum)
2. [2206. Divide Array Into Equal Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002206-divide-array-into-equal-pairs)


**Solution:**

We implemented an efficient solution that distributes elements from a given **1-indexed** integer array into two separate arrays based on a simple comparison rule, then concatenates them to return the final result. The approach simulates the process step-by-step while maintaining only the last elements of each array for decision-making, ensuring clarity and optimal performance.

## Approach

- Initialize `arr1` with `nums[0]` and `arr2` with `nums[1]` (0-indexed).
- Loop through the remaining elements starting from index `2` up to `n-1`.
- At each step, compare the last element of `arr1` and the last element of `arr2`.
- If the last element of `arr1` is greater than the last element of `arr2`, append the current `nums[i]` to `arr1`. Otherwise, append it to `arr2`.
- After processing all elements, concatenate `arr1` and `arr2` using `array_merge()` and return the result.

Let's implement this solution in PHP: **[3069. Distribute Elements Into Two Arrays I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003069-distribute-elements-into-two-arrays-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function resultArray(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo resultArray([2,1,3]) .  "\n";                  // Output: [2,3,1]
echo resultArray([5,4,3,8]) .  "\n";                // Output: [5,3,4,8]
echo resultArray([1,2,3,4]) .  "\n";                // Output: [1,3,2,4]
echo resultArray([4,3,2,1]) .  "\n";                // Output: [4,2,3,1]
echo resultArray([10,5,7]) .  "\n";                 // Output: [10,7,5]
echo resultArray([100,1,99,2,98,3]) .  "\n";        // Output: [100,99,2,98,3,1]
?>
```

### Explanation:

- **Initial setup**: The first two elements are placed into `arr1` and `arr2` respectively, as per the problem statement.
- **Iterative distribution**: For each subsequent element, we check the last elements of both arrays. The comparison determines which array receives the new element.
- **Efficient tracking**: Since only the last element of each array influences the decision, we only need to keep track of the most recently added value, making the logic straightforward.
- **Final concatenation**: After the distribution loop, the two arrays are merged in order (`arr1` first, then `arr2`) to form the required `result` array.

## Complexity Analysis

- **Time Complexity:** `O(n)` — We iterate through the array once, performing constant-time operations for each element.
- **Space Complexity:** `O(n)` — We store the elements in two separate arrays, which together hold all `n` elements of the input.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**