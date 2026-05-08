3629\. Minimum Jumps to Reach End via Prime Teleportation

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Math`, `Breadth-First Search`, `Number Theory`, `Weekly Contest 460`

You are given an integer array `nums` of length `n`.

You start at index 0, and your goal is to reach index `n - 1`.

From any index `i`, you may perform one of the following operations:

- **Adjacent Step**: Jump to index `i + 1` or `i - 1`, if the index is within bounds.
- **Prime Teleportation**: If `nums[i]` is a prime number[^1] `p`, you may instantly jump to any index `j != i` such that `nums[j] % p == 0`.

Return the **minimum** number of jumps required to reach index `n - 1`.

[^1]: **Prime:** A prime number is a natural number greater than 1 with only two factors, 1 and itself.

**Example 1:**

- **Input:** nums = [1,2,4,6]
- **Output:** 2
- **Explanation:**
  - One optimal sequence of jumps is:
    - Start at index `i = 0`. Take an adjacent step to index 1.
    - At index `i = 1`, `nums[1] = 2` is a prime number. Therefore, we teleport to index `i = 3` as `nums[3] = 6` is divisible by 2.
  - Thus, the answer is 2.

**Example 2:**

- **Input:** nums = [2,3,4,7,9]
- **Output:** 2
- **Explanation:**
  - One optimal sequence of jumps is:
    - Start at index `i = 0`. Take an adjacent step to index `i = 1`.
    - At index `i = 1`, `nums[1] = 3` is a prime number. Therefore, we teleport to index `i = 4` since `nums[4] = 9` is divisible by 3.
  - Thus, the answer is 2.

**Example 3:**

- **Input:** nums = [4,6,5,8]
- **Output:** 3
- **Explanation:** Since no teleportation is possible, we move through `0 → 1 → 2 → 3`. Thus, the answer is 3.

**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁶`



**Hint:**
1. Use a breadth-first search.
2. Precompute prime factors of each `nums[i]` via a sieve, and build a bucket `bucket[p]` mapping each prime `p` to all indices `j` with `nums[j] % p == 0`.
3. During the BFS, when at index `i`, enqueue its adjacent steps (`i+1` and `i-1`) and all indices in `bucket[p]` for each prime `p` dividing `nums[i]`, then clear `bucket[p]` so each prime's bucket is visited only once.






**Solution:**

This solution uses **Breadth-First Search (BFS)** to find the shortest path from index `0` to index `n-1` in an array.  
Jumps can be either **adjacent moves** (`i+1` or `i-1`) or **prime teleportation** — if `nums[i]` is prime, you can jump to any index `j` where `nums[j]` is divisible by that prime.  
To optimize, the solution:
- Precomputes prime factors of all numbers using a **Sieve of Eratosthenes**.
- Builds a mapping from each prime to indices whose values are divisible by it.
- During BFS, when a prime-numbered index is reached, all indices in its bucket are enqueued at once, and the bucket is cleared to avoid repeated processing.

### Approach:

- **BFS for shortest path**: Since all jumps have equal cost (1 jump), BFS guarantees minimal steps.
- **Precomputation with SPF (Smallest Prime Factor)**:
   - A sieve finds the smallest prime factor for all numbers up to `max(nums)`.
   - This enables efficient factorization and prime checking.
- **Bucket mapping**:
   - For each index `i`, factorize `nums[i]` using the SPF array.
   - For each distinct prime factor `p`, add `i` to `bucket[p]`.
- **BFS queue state**: `(index, distance)`
- **Adjacent moves**: Always enqueue neighbors if unvisited.
- **Prime teleportation**:
   - If `nums[i]` is prime `p`, and we haven't visited `p` before, enqueue **all indices** in `bucket[p]` (except current) and clear `bucket[p]` to prevent re-processing.
- **Visited tracking**:
   - `visitedIndex` for indices.
   - `visitedPrime` for primes to avoid teleporting from the same prime multiple times.

Let's implement this solution in PHP: **[3629. Minimum Jumps to Reach End via Prime Teleportation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003629-minimum-jumps-to-reach-end-via-prime-teleportation/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minJumps(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minJumps([1,2,4,6]) . "\n";            // Output: 2
echo minJumps([2,3,4,7,9]) . "\n";          // Output: 2
echo minJumps([4,6,5,8]) . "\n";            // Output: 3
?>
```

### Explanation:

- **Step 1 — Sieve for SPF**
   - Build `spf[x]` = smallest prime factor of `x` for all `x` up to `max(nums)`.
   - This allows quick factorization and prime checking in `O(log x)`.
- **Step 2 — Build prime-to-indices buckets**
   - For each `nums[i]`, factorize it using SPF to get unique prime factors.
   - For each prime `p` in factors, append `i` to `bucket[p]`.
- **Step 3 — BFS initialization**
   - Start at index `0` with distance `0`, mark visited.
- **Step 4 — Process each index in BFS**
   - If current index is target, return distance.
   - Enqueue `i-1` and `i+1` if unvisited.
   - If current number is prime `p` and `p` not visited before:
      - Enqueue all indices in `bucket[p]` that are unvisited.
      - Delete `bucket[p]` to avoid future use (primes are used once).
- **Step 5 — BFS guarantees minimum steps**
   - First time we reach target is guaranteed to have minimum jumps.

### Complexity
- **Time Complexity**:
   - Sieve: `O(M log log M)` where `M = max(nums) ≤ 1e6`.
   - Bucket building: `O(n log M)` — each number factorized in `O(log M)`.
   - BFS: Each index enqueued once (`O(n)`), each prime bucket cleared once.
   - **Overall**: `O(M log log M + n log M)`, efficient for constraints.
- **Space Complexity**:
   - SPF array: `O(M)`.
   - Buckets: `O(n + total factors)` — each index stored once per distinct prime factor.
   - Visited sets: `O(n + P)` where `P` is number of primes ≤ `M`.
   - Queue: `O(n)`.
   - **Overall**: `O(n + M)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**