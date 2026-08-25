3718\. Smallest Missing Multiple of K

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Weekly Contest 472`

Given an integer array `nums` and an integer `k`, return the **smallest positive multiple** of `k` that is **missing** from `nums`.

A **multiple** of `k` is any positive integer divisible by `k`.

**Example 1:**

- **Input:** nums = [8,2,3,4,6], k = 2
- **Output:** 10
- **Explanation:** The multiples of `k = 2` are `2, 4, 6, 8, 10, 12...` and the smallest multiple missing from `nums` is 10.

**Example 2:**

- **Input:** nums = [1,4,7,10,15], k = 5
- **Output:** 5
- **Explanation:** The multiples of `k = 5` are `5, 10, 15, 20...` and the smallest multiple missing from `nums` is 5.

**Example 3:**

- **Input:** nums = [2,4,6,8,10], k = 2
- **Output:** 12

**Example 4:**

- **Input:** nums = [5,10,15,20], k = 5
- **Output:** 25

**Example 5:**

- **Input:** nums = [3,6,9,12,15], k = 3
- **Output:** 18

**Example 6:**

- **Input:** nums = [1,2,3,4,5,6,7,8,9,10], k = 1
- **Output:** 11

**Example 7:**

- **Input:** nums = [100], k = 1
- **Output:** 2

**Example 8:**

- **Input:** nums = [1,4,7,10,15], k = 5
- **Output:** 5

**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`
- `1 <= k <= 100`


**Hint:**
1. Add the values in `nums` to a hash set
2. Iterate through the positive multiples of `k` and return the first one not in the hash set


**Solution:**

We solve the problem by first storing all array elements in a hash set for _**O(1)**_ lookups. We then iterate upward through positive multiples of `k` starting from `k` itself, and return the first multiple that is not present in the set. This ensures the smallest missing multiple is found efficiently.

## Approach

- **Use a hash set** – Convert the array into a hash set (via `array_flip`) to quickly check membership.
- **Start from the first positive multiple** – Begin checking from `k` (the smallest positive multiple of `k`).
- **Increment by `k`** – Move to the next multiple (`+= k`) until we find one not in the set.
- **Return the missing multiple** – The first missing multiple encountered is the answer.

Let's implement this solution in PHP: **[3718. Smallest Missing Multiple of K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003718-smallest-missing-multiple-of-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function missingMultiple(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo missingMultiple([8,2,3,4,6], 2) .  "\n";               // Output: 10
echo missingMultiple([1,4,7,10,15], 5) .  "\n";             // Output: 5
echo missingMultiple([2,4,6,8,10], 2) .  "\n";              // Output: 12
echo missingMultiple([5,10,15,20], 5) .  "\n";              // Output: 25
echo missingMultiple([3,6,9,12,15], 3) .  "\n";             // Output: 18
echo missingMultiple([1,2,3,4,5,6,7,8,9,10], 1) .  "\n";    // Output: 11
echo missingMultiple([100], 1) .  "\n";                     // Output: 2
echo missingMultiple([1,2,3], 4) .  "\n";                   // Output: 4
?>
```

### Explanation:

- **Step 1:** `$set = array_flip($nums);` – This creates a hash map where keys are the array values, enabling constant-time existence checks.
- **Step 2:** `$multiple = $k;` – We start with the smallest positive multiple of `k`.
- **Step 3:** `while (isset($set[$multiple])) { $multiple += $k; }` – Keep advancing to the next multiple while the current one exists in the set.
- **Step 4:** Once the loop exits, `$multiple` is the smallest multiple of `k` not present in `nums`, so we return it.

## Complexity Analysis

- **Time Complexity:** O(n + m) where **n** is the number of elements in `nums` (to build the set) and **m** is the number of multiples we check until we find a missing one. In the worst case, `m` could be up to the largest multiple present plus `k`, but since constraints are small (≤100), this is effectively constant.
- **Space Complexity:** O(n) – for the hash set storing up to `n` unique values.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**