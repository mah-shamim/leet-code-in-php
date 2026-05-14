2784\. Check if Array is Good

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Sorting`, `Biweekly Contest 109`

You are given an integer array `nums`. We consider an array **good** if it is a permutation of an array `base[n]`.

`base[n] = [1, 2, ..., n - 1, n, n]` (in other words, it is an array of length `n + 1` which contains `1` to `n - 1` exactly once, plus two occurrences of `n`). For example, `base[1] = [1, 1]` and `base[3] = [1, 2, 3, 3]`.

Return _`true` if the given array is good, otherwise return `false`_.

**Note:** A permutation of integers represents an arrangement of these numbers.

**Example 1:**

- **Input:** nums = [2, 1, 3]
- **Output:** false
- **Explanation:** Since the maximum element of the array is `3`, the only candidate n for which this array could be a permutation of `base[n]`, is `n = 3`. However, `base[3]` has four elements but array `nums` has three. Therefore, it can not be a permutation of `base[3] = [1, 2, 3, 3]`. So the answer is `false`.

**Example 2:**

- **Input:** nums = [1, 3, 3, 2]
- **Output:** true
- **Explanation:** Since the maximum element of the array is `3`, the only candidate n for which this array could be a permutation of `base[n]`, is `n = 3`. It can be seen that `nums` is a permutation of `base[3] = [1, 2, 3, 3]` (by swapping the second and fourth elements in `nums`, we reach `base[3]`). Therefore, the answer is `true`.

**Example 3:**

- **Input:** nums = [1, 1]
- **Output:** true
- **Explanation:** Since the maximum element of the array is `1`, the only candidate n for which this array could be a permutation of `base[n]`, is `n = 1`. It can be seen that `nums` is a permutation of `base[1] = [1, 1]`. Therefore, the answer is `true`.

**Example 4:**

- **Input:** nums = [3, 4, 4, 1, 2, 1]
- **Output:** false
- **Explanation:** Since the maximum element of the array is `4`, the only candidate n for which this array could be a permutation of `base[n]`, is `n = 4`. However, `base[4]` has five elements but array `nums` has six. Therefore, it can not be a permutation of `base[4] = [1, 2, 3, 4, 4]`. So the answer is `false`.

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= num[i] <= 200`



**Hint:**
1. Find the maximum element of the array.






**Solution:**

The solution determines if an array is a permutation of `base[n] = [1, 2, ..., n-1, n, n]`.  
It first finds the maximum element `n` in `nums`, then verifies the array length matches `n+1`, and finally checks that numbers `1` to `n-1` appear exactly once, and `n` appears exactly twice.

### Approach:

- **Step 1:** Find the maximum value `n` in `nums`.
- **Step 2:** Check if the array length equals `n + 1` (since `base[n]` has `n+1` elements).
- **Step 3:** Count frequency of each number in `nums`.
- **Step 4:** Verify that numbers from `1` to `n-1` appear exactly once.
- **Step 5:** Verify that `n` appears exactly twice.
- **Step 6:** If all checks pass, return `true`; otherwise, return `false`.

Let's implement this solution in PHP: **[2784. Check if Array is Good](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002784-check-if-array-is-good/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function isGood(array $nums): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo isGood([2, 1, 3]) . "\n";                      // Output: false
echo isGood([1, 3, 3, 2]) . "\n";                   // Output: true
echo isGood([1, 1]) . "\n";                         // Output: true
echo isGood([3, 4, 4, 1, 2, 1]) . "\n";             // Output: false
?>
```

### Explanation:

- **Find candidate `n`:** The maximum element of `nums` must be the `n` in `base[n]` because `base[n]` contains `1` to `n-1` once, and `n` twice (so `n` is the largest number in the array).
- **Length check:** `base[n]` has length `n+1`. If `nums` length is different, it cannot be a permutation.
- **Frequency check for 1 to n-1:** Each of these numbers must appear exactly once.
- **Frequency check for n:** `n` must appear exactly twice.
- **Early returns:** The solution fails as soon as any condition is violated, making it efficient.

### Complexity
- **Time Complexity**: _*O(m)**_
   - Where `m` is the length of `nums`.
   - `max()` is O(m), `array_count_values()` is O(m), loop from 1 to `n-1` is O(n) ≤ O(m) since `n+1 = m` if valid.
- **Space Complexity**: _**O(m)**_
   - Frequency array stores at most `m` distinct entries.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**