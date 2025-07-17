3202\. Find the Maximum Length of Valid Subsequence II

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You are given an integer array `nums` and a **positive** integer `k`.

A subsequence[^1] `sub` of `nums` with length `x` is called **valid** if it satisfies:

- `(sub[0] + sub[1]) % k == (sub[1] + sub[2]) % k == ... == (sub[x - 2] + sub[x - 1]) % k`.

Return _the length of the **longest valid** subsequence of `nums`_.

**Example 1:**

- **Input:** nums = [1,2,3,4,5], k = 2
- **Output:** 5
- **Explanation:** The longest valid subsequence is `[1, 2, 3, 4, 5]`.

**Example 2:**

- **Input:** nums = [1,4,2,3,1,4], k = 3
- **Output:** 4
- **Explanation:** The longest valid subsequence is `[1, 4, 1, 4]`.

**Constraints:**

- <code>2 <= nums.length <= 10<sup>3</sup></code>
- <code>1 <= nums[i] <= 10<sup>7</sup></code>
- <code>1 <= k <= 10<sup>3</sup></code>


**Hint:**
1. Fix the value of `(subs[0] + subs[1]) % k` from the `k` possible values. Let it be `val`.
2. Let `dp[i]` store the maximum length of a subsequence with its last element `x` such that `x % k == i`.
3. Answer for a subsequence ending at index `y` is `dp[(k + val - (y % k)) % k] + 1`.

[^1]: **Subsequence:** A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Similar Questions:**
1. [300. Longest Increasing Subsequence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000300-longest-increasing-subsequenc)
2. [2915. Length of the Longest Subsequence That Sums to Target](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002915-length-of-the-longest-subsequence-that-sums-to-target)



**Solution:**

We need to find the maximum length of a valid subsequence in an array where every consecutive pair of elements in the subsequence has the same modulo value when their sum is divided by a given integer _**k**_.

### Approach
1. **Problem Analysis**: The key observation is that for any valid subsequence, all consecutive pairs of elements must satisfy _**(a + b) % k = val**_ for some fixed value _**val**_. This condition implies that the residues of the elements in the subsequence must alternate between two residues _**r<sub>0</sub>**_ and _**r<sub>1</sub>**_ such that _**(r<sub>0</sub> + r<sub>1</sub>) % k = val**_. Additionally, the subsequence can consist of elements with a single residue _**r<sub>0</sub>**_ where _**(2 x r<sub>0</sub>) % k = val**_.

2. **Dynamic Programming Setup**: For each possible value _**val**_ (from 0 to _**k-1**_), we use a dynamic programming array `dp` where `dp[r]` stores the maximum length of a valid subsequence ending with an element whose residue is _**r**_ under the current _**val**_.

3. **Processing Elements**: For each element in the array, compute its residue _**r = num % k**_. The required residue _**s**_ for the previous element in the subsequence is given by _**s = (k + val - r) % k**_. The candidate length for the current element is either 1 (starting a new subsequence) or `dp[s] + 1` (extending an existing subsequence ending with residue _**s**_).

4. **Update DP State**: Update `dp[r]` to the maximum of its current value and the candidate length. Track the maximum subsequence length encountered across all residues and all values of _**val**_.

5. **Result Extraction**: After processing all elements for all possible values of _**val**_, the maximum length found is the solution.

Let's implement this solution in PHP: **[3202. Find the Maximum Length of Valid Subsequence II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003202-find-the-maximum-length-of-valid-subsequence-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maximumLength($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums1 = [1, 2, 3, 4, 5];
$k1 = 2;
echo "Output: " . maximumLength($nums1, $k1) . "\n"; // Output: 5

// Example 2
$nums2 = [1, 4, 2, 3, 1, 4];
$k2 = 3;
echo "Output: " . maximumLength($nums2, $k2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Initialization**: The algorithm initializes the maximum length `$ans` to 0.
2. **Iterate Over Values**: For each possible value _**val**_ from 0 to _**k-1**_, it initializes a dynamic programming array `$dp` of size _**k**_ to store the maximum subsequence lengths ending with each residue.
3. **Process Elements**: For each element in the array, it computes the residue _**r**_ of the element modulo _**k**_. The required previous residue _**s**_ is calculated as _**(k + val - r) % k**_.
4. **Update DP Array**: The candidate length for the current element is set to 1 (if starting a new subsequence) or `$dp[$s] + 1` (if extending an existing subsequence). The `$dp` array is updated if the candidate length exceeds the current value for residue _**r**_.
5. **Track Maximum Length**: The maximum length encountered during the processing is stored in `$ans`.
6. **Return Result**: After processing all elements and all values of _**val**_, the algorithm returns the maximum valid subsequence length found.

This approach efficiently checks all possible valid subsequences by leveraging dynamic programming and modular arithmetic, ensuring optimal performance even for the upper constraint limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**