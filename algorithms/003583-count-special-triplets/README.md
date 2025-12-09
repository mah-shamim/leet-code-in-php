3583\. Count Special Triplets

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Counting`, `Weekly Contest 454`

You are given an integer array nums.

A **special triplet** is defined as a triplet of indices `(i, j, k)` such that:

- `0 <= i < j < k < n`, where `n = nums.length`
- `nums[i] == nums[j] * 2`
- `nums[k] == nums[j] * 2`

Return the total number of **special triplets** in the array.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

**Example 1:**

- **Input:** nums = [6,3,6]
- **Output:** 1
- **Explanation:** The only special triplet is `(i, j, k) = (0, 1, 2)`, where:
  - `nums[0] = 6`, `nums[1] = 3`, `nums[2] = 6`
  - `nums[0] = nums[1] * 2 = 3 * 2 = 6`
  - `nums[2] = nums[1] * 2 = 3 * 2 = 6`


**Example 2:**

- **Input:** nums = [0,1,0,0]
- **Output:** 1
- **Explanation:** The only special triplet is `(i, j, k) = (0, 2, 3)`, where:
  - `nums[0] = 0`, `nums[2] = 0`, `nums[3] = 0`
  - `nums[0] = nums[2] * 2 = 0 * 2 = 0`
  - `nums[3] = nums[2] * 2 = 0 * 2 = 0`


**Example 3:**

- **Input:** nums = [8,4,2,8,4]
- **Output:** 2
- **Explanation:** There are exactly two special triplets:
  - `(i, j, k) = (0, 1, 3)`
    - `nums[0] = 8`, `nums[1] = 4`, `nums[3] = 8`
    - `nums[0] = nums[1] * 2 = 4 * 2 = 8`
    - `nums[3] = nums[1] * 2 = 4 * 2 = 8`
  - `(i, j, k) = (1, 2, 4)`
    - `nums[1] = 4`, `nums[2] = 2`, `nums[4] = 4`
    - `nums[1] = nums[2] * 2 = 2 * 2 = 4`
    - `nums[4] = nums[2] * 2 = 2 * 2 = 4`


**Constraints:**

- `3 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁵`



**Hint:**
1. Use frequency arrays or maps, e.g. `freqPrev` and `freqNext`—to track how many times each value appears before and after the current index.
2. For each index `j` in the triplet (`i`,`j`,`k`), compute its contribution to the answer using your `freqPrev` and `freqNext` counts.






**Solution:**

We could also use prefix and suffix arrays to store counts of each value at each position, but that would require **O(n * max_val)** space which is inefficient for large values. The hash table approach is more memory efficient for sparse value distributions.

### Approach:

- **Frequency Tracking**: Use two frequency maps - one for elements before current index (`leftFreq`) and one for elements after current index (`rightFreq`).
- **Iterate with Middle Element**: Treat each element at index `j` as the middle element of potential triplets.
- **Dynamic Updates**: As we move `j` from left to right:
   - Remove current element from `rightFreq` (since it's no longer on the right)
   - Calculate target value as `2 * nums[j]`
   - Count valid `i` positions from `leftFreq` and valid `k` positions from `rightFreq`
   - Add current element to `leftFreq` for future iterations
- **Modulo Arithmetic**: Handle large counts with modulo `10⁹ + 7`.

Let's implement this solution in PHP: **[3583. Count Special Triplets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003583-count-special-triplets/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function specialTriplets($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo specialTriplets([6,3,6]) . "\n";       // Output: 1
echo specialTriplets([0,1,0,0]) . "\n";     // Output: 1
echo specialTriplets([8,4,2,8,4]) . "\n";   // Output: 2
?>
```

### Explanation:

1. **Initialization**:
   - Create two frequency maps: `$leftFreq` (empty) and `$rightFreq` (containing all elements initially)
   - The `$rightFreq` map tracks how many times each value appears to the right of current position

2. **Iterating through Middle Element**:
   - For each index `j` from 0 to n-1:
      - Remove `nums[j]` from `$rightFreq` since `j` is now the current position
      - Calculate `target = 2 * nums[j]`
      - The number of valid `i` positions (with `i < j`) equals `$leftFreq[$target]`
      - The number of valid `k` positions (with `k > j`) equals `$rightFreq[$target]`
      - Add `$leftFreq[$target] * $rightFreq[$target]` to total count
      - Add `nums[j]` to `$leftFreq` for future iterations

3. **Key Insight**:
   - By fixing `j` as the middle element, we need `nums[i] = 2*nums[j]` and `nums[k] = 2*nums[j]`
   - The `i` positions must come from left side, `k` from right side
   - Multiply counts because any combination of valid `i` and `k` forms a valid triplet

4. **Time & Space Complexity**:
   - **Time**: O(n) - single pass through the array
   - **Space**: O(n) - for the frequency maps

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**