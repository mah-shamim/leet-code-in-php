1477\. Find Two Non-overlapping Sub-arrays Each With Target Sum

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Binary Search`, `Dynamic Programming`, `Sliding Window`, `Biweekly Contest 28`

You are given an array of integers `arr` and an integer `target`.

You have to find **two non-overlapping sub-arrays** of `arr` each with a sum equal `target`. There can be multiple answers so you have to find an answer where the sum of the lengths of the two sub-arrays is **minimum**.

Return _the minimum sum of the lengths of the two required sub-arrays_, or return _`-1` if you cannot find such two sub-arrays_.

**Example 1:**

- **Input:** arr = [3,2,2,4,3], target = 3
- **Output:** 2
- **Explanation:** Only two sub-arrays have sum = 3 ([3] and [3]). The sum of their lengths is 2.

**Example 2:**

- **Input:** arr = [7,3,4,7], target = 7
- **Output:** 2
- **Explanation:** Although we have three non-overlapping sub-arrays of sum = 7 ([7], [3,4] and [7]), but we will choose the first and third sub-arrays as the sum of their lengths is 2.

**Example 3:**

- **Input:** arr = [4,3,2,6,2,3,4], target = 6
- **Output:** -1
- **Explanation:** We have only one sub-array of sum = 6.

**Example 4:**

- **Input:** arr = [1,1,1,1], target = 2
- **Output:** 4

**Example 5:**

- **Input:** arr = [1,2,1,2], target = 3
- **Output:** 4

**Example 6:**

- **Input:** arr = [2,2,2,2], target = 4
- **Output:** 4

**Example 7:**

- **Input:** arr = [1,1,1], target = 2
- **Output:** -1

**Example 8:**

- **Input:** arr = [1,2,3,4,5], target = 5
- **Output:** 3

**Example 9:**

- **Input:** arr = [1,1,1,1,1], target = 2
- **Output:** 4

**Example 10:**

- **Input:** arr = [5], target = 5
- **Output:** -1


**Constraints:**

- `1 <= arr.length <= 10⁵`
- `1 <= arr[i] <= 1000`
- `1 <= target <= 10⁸`


**Hint:**
1. Let's create two arrays `prefix` and `suffix` where `prefix[i]` is the minimum length of sub-array ends before `i` and has `sum = k`, `suffix[i]` is the minimum length of sub-array starting at or after `i` and has `sum = k`.
2. The answer we are searching for is `min(prefix[i] + suffix[i])` for all values of `i` from `0` to `n-1` where `n == arr.length`.
3. If you are still stuck with how to build `prefix` and `suffix`, you can store for each index `i` the length of the sub-array starts at `i` and has `sum = k` or infinity otherwise, and you can use it to build both `prefix` and `suffix`.


**Similar Questions:**
1. [2395. Find Subarrays With Equal Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002395-find-subarrays-with-equal-sum)


**Solution:**

We solve the problem by first finding all subarrays whose sum equals `target` using a sliding window, then using prefix and suffix minimum-length arrays to combine two non-overlapping valid subarrays with the smallest total length.

## Approach

- Use a sliding window over the positive integer array to find all contiguous subarrays whose sum equals `target`.
- For each valid subarray `[left, right]`, record its length:
    - `bestEnd[right] = min(bestEnd[right], length)`
    - `bestStart[left] = min(bestStart[left], length)`
- Build `pref[i]`: minimum length of a valid subarray ending at or before index `i`.
- Build `suff[i]`: minimum length of a valid subarray starting at or after index `i`.
- For every split point `i`, combine:
    - one subarray ending at or before `i`
    - one subarray starting at or after `i + 1`
- Return the minimum `pref[i] + suff[i + 1]`.
- If no such pair exists, return `-1`.

Let's implement this solution in PHP: **[1477. Find Two Non-overlapping Sub-arrays Each With Target Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001477-find-two-non-overlapping-sub-arrays-each-with-target-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $target
 * @return Integer
 */
function minSumOfLengths(array $arr, int $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minSumOfLengths([3,2,2,4,3], 3) .  "\n";           // Output: 2
echo minSumOfLengths([7,3,4,7], 7) .  "\n";             // Output: 2
echo minSumOfLengths([4,3,2,6,2,3,4], 6) .  "\n";       // Output: -1
echo minSumOfLengths([1,1,1,1], 2) .  "\n";             // Output: 4
echo minSumOfLengths([1,2,1,2], 3) .  "\n";             // Output: 4
echo minSumOfLengths([2,2,2,2], 4) .  "\n";             // Output: 4
echo minSumOfLengths([1,1,1], 2) .  "\n";               // Output: -1
echo minSumOfLengths([1,2,3,4,5], 5) .  "\n";           // Output: 3
echo minSumOfLengths([1,1,1,1,1], 2) .  "\n";           // Output: 4
echo minSumOfLengths([5], 5) .  "\n";                   // Output: -1
?>
```

### Explanation

- Because all elements are positive, the sliding window sum is monotonic: expanding `right` increases the sum, and moving `left` decreases it.
- When `sum == target`, the current window is a valid subarray.
- `bestEnd[right]` stores the shortest valid subarray ending exactly at `right`.
- `bestStart[left]` stores the shortest valid subarray starting exactly at `left`.
- The prefix array allows us to know the best valid subarray that finishes before or at a given position.
- The suffix array allows us to know the best valid subarray that begins after or at a given position.
- Checking every `i` ensures the two chosen subarrays do not overlap.
- `INF` is used as a sentinel when no valid subarray exists.

## Complexity Analysis

- **Time Complexity:** `O(n)`
    - Sliding window: `O(n)`
    - Prefix build: `O(n)`
    - Suffix build: `O(n)`
    - Final combination loop: `O(n)`
- **Space Complexity:** `O(n)`
    - Arrays `bestEnd`, `bestStart`, `pref`, and `suff` each use `O(n)` space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**