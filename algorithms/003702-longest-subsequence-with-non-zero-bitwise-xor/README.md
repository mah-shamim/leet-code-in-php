3702\. Longest Subsequence With Non-Zero Bitwise XOR

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Bit Manipulation`, `Weekly Contest 470`

You are given an integer array `nums`.

Return the length of the **longest** **subsequence[^1]** in `nums` whose bitwise **XOR** is **non-zero**. If no such **subsequence** exists, return 0.

[^1]: **Subsequence:** A **subsequence** is a **non-empty** array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [1,2,3]
- **Output:** 2
- **Explanation:** One longest subsequence is `[2, 3]`. The bitwise XOR is computed as `2 XOR 3 = 1`, which is non-zero.

**Example 2:**

- **Input:** nums = [2,3,4]
- **Output:** 3
- **Explanation:** The longest subsequence is `[2, 3, 4]`. The bitwise XOR is computed as `2 XOR 3 XOR 4 = 5`, which is non-zero.

**Example 3:**

- **Input:** nums = [0,0,0]
- **Output:** 0

**Example 4:**

- **Input:** nums = [5]
- **Output:** 1

**Example 5:**

- **Input:** nums = [0,5]
- **Output:** 2

**Example 6:**

- **Input:** nums = [7,7]
- **Output:** 1

**Example 7:**

- **Input:** nums = [1,2,3,4]
- **Output:** 4

**Example 8:**

- **Input:** nums = [1,1]
- **Output:** 1

**Example 9:**

- **Input:** nums = [0]
- **Output:** 0

**Example 10:**

- **Input:** nums = [10, 10, 0]
- **Output:** 2


**Constraints:**

- `1 <= nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁹`


**Hint:**
1. What happens if you take the entire array?
2. If the XOR of the entire array is 0, can removing one element help?
3. What if all elements are 0?


**Solution:**

We solve the problem by first checking the XOR of the entire array. If it's already non‑zero, the whole array is the longest subsequence. If it's zero, we check if all elements are zero (return 0), otherwise we can remove exactly one non‑zero element to make the XOR non‑zero, yielding length `n-1`. This approach runs in _**O(n)**_ time.

## Approach

- Compute the XOR of all elements in `nums` (`totalXor`).
- If `totalXor` is non‑zero, the entire array is a valid subsequence → return `n`.
- If `totalXor` is zero, then we need to see if we can obtain a non‑zero XOR by deleting elements.
- First, check if all elements are zero → every subsequence XOR will be zero → return `0`.
- Otherwise, since the XOR of the whole array is zero, removing any element `x` gives new XOR = `0 XOR x = x`.
- If we remove a non‑zero element, the new XOR becomes non‑zero, and the subsequence length becomes `n-1`.
- Since `n-1` is the maximum possible length under a zero total XOR (we cannot keep all `n`), we return `n-1`.

Let's implement this solution in PHP: **[3702. Longest Subsequence With Non-Zero Bitwise XOR](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003702-longest-subsequence-with-non-zero-bitwise-xor/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestSubsequence(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestSubsequence([1,2,3]) .  "\n";       // Output: 2
echo longestSubsequence([2,3,4]) .  "\n";       // Output: 3
echo longestSubsequence([0,0,0]) .  "\n";       // Output: 0
echo longestSubsequence([5]) .  "\n";           // Output: 1
echo longestSubsequence([0,5]) .  "\n";         // Output: 2
echo longestSubsequence([7,7]) .  "\n";         // Output: 1
echo longestSubsequence([1,2,3,4]) .  "\n";     // Output: 4
echo longestSubsequence([1,1]) .  "\n";         // Output: 1
echo longestSubsequence([0]) .  "\n";           // Output: 0
echo longestSubsequence([10, 10, 0]) .  "\n";   // Output: 2
?>
```

### Explanation:

- **Key insight:** For any array, the XOR of all elements determines the answer immediately.
- **Case 1:** `totalXor ≠ 0` → the whole array itself is a valid subsequence, so the longest length is `n`.
- **Case 2:** `totalXor = 0` and all elements are zero → every subsequence XOR is zero, so answer is `0`.
- **Case 3:** `totalXor = 0` but there is at least one non‑zero element. Removing that non‑zero element yields a new XOR equal to that element (non‑zero). The resulting subsequence has length `n-1`. It is impossible to have length `n` because that would give XOR `0`. So `n-1` is optimal.
- We only need a single pass to compute XOR and check for zero/non‑zero elements.

## Complexity Analysis

- **Time complexity:** _**O(n)**_ — we iterate through the array at most twice.
- **Space complexity:** _**O(1)**_ — only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**