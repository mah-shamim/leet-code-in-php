3934\. Smallest Unique Subarray

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Hash Table`, `Binary Search`, `Rolling Hash`, `Suffix Array`, `Hash Function`, `Weekly Contest 502`

You are given an integer array `nums`.

Find the **minimum** length of a **subarray[^1]** that is **not identical** to any other **subarray** in `nums`.

Return an integer denoting the **minimum possible length** of such a **subarray**.

Two **subarrays** are considered identical if they have the same length and the same elements in corresponding positions.

[^1]: **Subarray:** A **subarray** is a contiguous sequence of elements within an array.


**Example 1:**

- **Input:** nums = [3,3,3]
- **Output:** 3
- **Explanation:**
  - Subarrays of length 1: `[3]` → appears 3 times
  - Subarrays of length 2: `[3, 3]` → appears 2 times
  - Subarrays of length 3: `[3, 3, 3]` → appears once
  - The subarray `[3, 3, 3]` is unique, so the smallest unique subarray length is 3.

**Example 2:**

- **Input:** nums = [2,1,2,3,3]
- **Output:** 1
- **Explanation:**
    - Subarrays of length 1:
       - `[2]` → appears 2 times
       - `[1]` → appears once
       - `[3]` → appears 2 times
    - The subarray `[1]` is unique, so the smallest unique subarray length is 1.

**Example 3:**

- **Input:** nums = [1,1,2,2,1]
- **Output:** 2
- **Explanation:**
  - Subarrays of length 1:
     - `[1]` → appears 3 times
     - `[2]` → appears 2 times
  - Subarrays of length 2:
     - `[1, 1]` → appears once
     - `[1, 2]` → appears once
     - `[2, 2]` → appears once
     - `[2, 1]` → appears once
  - There is at least one subarray of length 2 that is unique, so the smallest unique subarray length is 2.
    **Example 4:**

- **Input:** nums = [1]
- **Output:** 1

**Example 5:**

- **Input:** nums = [1,1]
- **Output:** 2

**Example 6:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 1

**Example 7:**

- **Input:** nums = [5,5,5,5,5,5]
- **Output:** 6

**Example 8:**

- **Input:** nums = [1,2,2,1]
- **Output:** 2

**Example 9:**

- **Input:** nums = [1,2,1,2,3]
- **Output:** 1

**Example 10:**

- **Input:** nums = [1,2,1,2,1,2]
- **Output:** 4

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁵`


**Hint:**

1. Think in terms of checking a fixed length `len`: count all subarrays of length `len`, and see whether any one appears exactly once.
2. Use rolling hash so each subarray can be represented in `O(1)` after preprocessing, instead of comparing arrays directly.
3. The answer can be binary searched because if there is a unique subarray of length `len`, then there is also a unique subarray of some length `> len`.
4. For each checked length, store frequencies of hashes in a hashmap. If any hash has frequency 1, that length works.


**Solution:**

We solve this problem by binary searching on the answer length. For each candidate length `len`, we use double rolling hash (two moduli + large base) to compute a unique fingerprint for every subarray of that length in `O(1)`. A hashmap counts how many times each fingerprint appears; if any fingerprint occurs exactly once, then a unique subarray of length `len` exists. Because the property "a unique subarray of length `len` exists" is **monotonic** (if a length-`L` subarray is unique, extending it to length `L+1` remains unique), binary search finds the minimum valid length in `O(n log n)`.

## Approach

- **Monotonicity insight**: If a subarray of length `L` appears exactly once, any subarray of length `L+1` containing it also appears exactly once. So the predicate "has a unique subarray of length `L`" is monotonic — once true, it stays true for larger `L`. This enables binary search.
- **Rolling Hash preprocessing**: Precompute prefix hashes `pre1[]`, `pre2[]` and powers `pow1[]`, `pow2[]` using two large prime moduli (`1e9+7`, `1e9+9`) and a large base. This lets any subarray's hash be computed in O(1).
- **Double hashing to avoid collisions**: Combine two hash values into a single composite key `h1 * M2 + h2` to virtually eliminate collision probability.
- **Counting fingerprints per length**: For a given `len`, iterate all windows, compute hash, and maintain a frequency map plus a running `uniqueCount`. If `uniqueCount > 0`, a unique subarray exists.
- **Binary search**: Search the minimum `len` in `[1, n]` where `hasUnique(len)` is true.

Let's implement this solution in PHP: **[3934. Smallest Unique Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003934-smallest-unique-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function smallestUniqueSubarray(array $nums): int
{
    $n = count($nums);

    $M1 = 1000000007;
    $M2 = 1000000009;
    $B = 911382323;

    $pow1 = array_fill(0, $n + 1, 1);
    $pow2 = array_fill(0, $n + 1, 1);
    $pre1 = array_fill(0, $n + 1, 0);
    $pre2 = array_fill(0, $n + 1, 0);

    for ($i = 0; $i < $n; $i++) {
        $v = $nums[$i] + 1; // avoid zero-value issues

        $pow1[$i + 1] = ($pow1[$i] * $B) % $M1;
        $pow2[$i + 1] = ($pow2[$i] * $B) % $M2;

        $pre1[$i + 1] = (($pre1[$i] * $B) + $v) % $M1;
        $pre2[$i + 1] = (($pre2[$i] * $B) + $v) % $M2;
    }

    $hasUnique = function (int $len) use (
        $n, $pre1, $pre2, $pow1, $pow2, $M1, $M2
    ): bool {
        $freq = [];
        $uniqueCount = 0;

        for ($i = 0; $i + $len <= $n; $i++) {
            $h1 = ($pre1[$i + $len] - (($pre1[$i] * $pow1[$len]) % $M1)) % $M1;
            if ($h1 < 0) {
                $h1 += $M1;
            }

            $h2 = ($pre2[$i + $len] - (($pre2[$i] * $pow2[$len]) % $M2)) % $M2;
            if ($h2 < 0) {
                $h2 += $M2;
            }

            $key = $h1 * $M2 + $h2;

            if (!isset($freq[$key])) {
                $freq[$key] = 1;
                $uniqueCount++;
            } else {
                if ($freq[$key] === 1) {
                    $uniqueCount--;
                }
                $freq[$key]++;
            }
        }

        return $uniqueCount > 0;
    };

    $left = 1;
    $right = $n;
    $answer = $n;

    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);

        if ($hasUnique($mid)) {
            $answer = $mid;
            $right = $mid - 1;
        } else {
            $left = $mid + 1;
        }
    }

    return $answer;
}

// Test cases
echo smallestUniqueSubarray([3,3,3]) .  "\n";                         // Output: 3
echo smallestUniqueSubarray([2,1,2,3,3]) .  "\n";                     // Output: 1
echo smallestUniqueSubarray([1,1,2,2,1]) .  "\n";                     // Output: 2
echo smallestUniqueSubarray([1]) .  "\n";                             // Output: 1
echo smallestUniqueSubarray([1,1]) .  "\n";                           // Output: 2
echo smallestUniqueSubarray([1,2,3,4,5]) .  "\n";                     // Output: 1
echo smallestUniqueSubarray([5,5,5,5,5,5]) .  "\n";                   // Output: 6
echo smallestUniqueSubarray([1,1,1,2,1,1,1]) .  "\n";                 // Output: 1
echo smallestUniqueSubarray([1,2,1,2,3]) .  "\n";                     // Output: 1
echo smallestUniqueSubarray([1,2,1,2,1,2]) .  "\n";                   // Output: 4
?>
```

## Explanation

- **Building the prefix hash arrays**:
  - `pow1[i]` = `B^i mod M1`, `pow2[i]` = `B^i mod M2`
  - `pre1[i]` = hash of `nums[0..i-1]` under `M1`, similarly for `pre2`
  - Each `nums[i] + 1` is used to avoid zero-value ambiguity.

- **Subarray hash in O(1)**:
  - For subarray `[i, i+len)`, `h1 = (pre1[i+len] − pre1[i]·pow1[len]) mod M1`
  - Same formula for `h2` with `M2`.
  - Normalize negative values by adding the modulus.

- **Frequency count logic**:
  - `freq[key] == 1` → the subarray is still unique → `uniqueCount++`
  - `freq[key] == 1` and incremented → becomes 2 → `uniqueCount--`
  - This running counter avoids a second pass over the hashmap.

- **Binary search**:
  - `left = 1`, `right = n`, `answer = n`
  - If `hasUnique(mid)` is true → record `answer = mid`, shrink right to `mid − 1`
  - Else → grow left to `mid + 1`

- **Double hashing justification**: Collision probability ~`1/(M1·M2)` which is negligible for competitive programming inputs.

## Complexity Analysis

- Let `n = nums.length`.
- **Time Complexity**
  - Preprocessing: `O(n)`
  - `hasUnique(len)`: `O(n)` (one pass over subarray hashes, hashmap ops amortized O(1))
  - Binary search: `O(log n)` iterations
  - **Total: `O(n log n)`**
- **Space Complexity**
  - Four arrays of size `n+1`: `O(n)`
  - Hashmap per check: `O(n)` (worst case)
  - **Total: `O(n)`**

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**