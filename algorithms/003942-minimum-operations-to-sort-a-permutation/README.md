3942\. Minimum Operations to Sort a Permutation

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Weekly Contest 503`

You are given an integer array `nums` of length `n`, where `nums` is a **permutation[^1]** of the integers from 0 to `n - 1`.

You may perform only the following operations:

- **Reverse** the entire array.
- **Rotate Left by One**: Move the first element to the end of the array, and rest elements to left by one position.

Return an integer denoting the **minimum** number of operations required to sort the array in **increasing** order. If it is **not possible** to sort the array using only the given operations, return -1.


[^1]: **Permutation:** A **permutation** is a rearrangement of all the elements of an array.

**Example 1:**

- **Input:** nums = [0,2,1]
- **Output:** 2
- **Explanation:**
    - Rotate Left by one: `[2, 1, 0]`
    - Reverse the array: `[0, 1, 2]`
    - The array becomes sorted in 2 operations, which is minimal

**Example 2:**

- **Input:** nums = [1,0,2]
- **Output:** 2
- **Explanation:**
    - Reverse the array: `[2, 0, 1]`
    - Rotate Left by one: `[0, 1, 2]`
    - The array becomes sorted in 2 operations, which is minimal.

**Example 3:**

- **Input:** nums = [2,0,1,3]
- **Output:** -1
- **Explanation:** Neither `nums` nor its reverse `[3,1,0,2]` is a cyclic increasing sequence, so it is impossible to reach `[0,1,2,3]` using the allowed operations. Thus, the answer is -1.

**Example 4:**

- **Input:** nums = [0]
- **Output:** 0
- **Explanation:** The array has only one element, so it is already sorted. No operations are needed.

**Example 5:**

- **Input:** nums = [0,1,2,3]
- **Output:** 0
- **Explanation:** The array is already sorted in increasing order. No operations are needed.

**Example 6:**

- **Input:** nums = [3,2,1,0]
- **Output:** 1
- **Explanation:**
    - Reverse the array: `[0, 1, 2, 3]`
    - The array becomes sorted in 1 operation, which is minimal.

**Example 7:**

- **Input:** nums = [1,0]
- **Output:** 1
- **Explanation:**
    - Reverse the array: `[0, 1]` (or Rotate Left by one: `[0, 1]`)
    - The array becomes sorted in 1 operation, which is minimal.

**Example 8:**

- **Input:** nums = [1,2,0]
- **Output:** 2
- **Explanation:**
    - Rotate Left by one: `[2, 0, 1]`
    - Rotate Left by one: `[0, 1, 2]`
    - The array becomes sorted in 2 operations, which is minimal.

**Example 9:**

- **Input:** nums = [2,1,0]
- **Output:** 1
- **Explanation:**
    - Reverse the array: `[0, 1, 2]`
    - The array becomes sorted in 1 operation, which is minimal.

**Example 10:**

- **Input:** nums = [1,2,3,0]
- **Output:** 3
- **Explanation:**
    - Rotate Left by one: `[2, 3, 0, 1]`
    - Rotate Left by one: `[3, 0, 1, 2]`
    - Rotate Left by one: `[0, 1, 2, 3]`
    - The array becomes sorted in 3 operations, which is minimal. (Reverse-then-rotate-then-reverse also costs 3.)

**Example 11:**

- **Input:** nums = [0,2,1,3]
- **Output:** -1
- **Explanation:** Neither `nums` nor its reverse `[3,1,2,0]` is a cyclic increasing sequence — `nums` fails at index 1 (expected 1, got 2). Thus, the sorted array `[0,1,2,3]` is unreachable, and the answer is -1.

**Example 12:**

- **Input:** nums = [2,3,0,1]
- **Output:** 2
- **Explanation:**
    - Rotate Left by one: `[3, 0, 1, 2]`
    - Rotate Left by one: `[0, 1, 2, 3]`
    - The array becomes sorted in 2 operations, which is minimal.

**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= n - 1`
- `nums` is a permutation of integers from 0 to `n - 1`.


**Hint:**

1. **1a. (Case Analysis)** The operations generate only rotations of `nums` and rotations of `reverse(nums)`.
2. **1b. (Case Analysis)** So sorting is possible if and only if `nums` is a rotation of increasing order, or a rotation of decreasing order.
3. **1c. (Case Analysis)** If nums is increasing cyclically and `nums[i] = 0`, then rotating left `i` times sorts the array, or we may reverse, rotate, then reverse again. Take the minimum between these possibilities.
4. **1d. (Case Analysis)** If `nums` is decreasing cyclically, try both possibilities: reverse first, or rotate first and then reverse. Take the minimum valid cost.
5. **2a. (Breadth-First Search)** As follows from Hint 1a and 1b, each reachable array can be represented as a state. Since all reachable arrays belong to one of two families, we can compress a state into `(type, shift)`. `type = 0`: a rotation of the original array. `type = 1`: a rotation of the reversed array. `shift` denotes the number of left rotations applied within that family.
6. **2b. (Breadth-First Search)** A left rotation changes `shift` to `(shift + 1) % n`. A reverse toggles `type`, while also changing the corresponding `shift` to `(n - shift) % n`.
7. **2c. (Breadth-First Search)** Build a graph on these `2n` states using the two allowed operations, then run BFS from `(0, 0)` to the state representing the input array.


**Solution:**

We model the entire reachable state space as exactly `2n` compressed states — either a left-rotation of `nums` (type `0`) or a left-rotation of `reverse(nums)` (type `1`) — since reversing twice or rotating `n` times returns to the origin, and any sequence of the two operations keeps you inside this set. From the initial state `(type=0, shift=0)`, we run a **BFS over these `2n` states** using the two legal transitions, and stop as soon as we hit any state whose underlying array is sorted. This gives the true minimum operation count in `O(n)` time.

## Approach

- **Reduce the state space:** Both allowed operations preserve the "shape" of the array up to rotation and reversal, so every reachable array is either `rotateLeft(nums, s)` or `rotateLeft(reverse(nums), s)` for some `s ∈ [0, n)`.
- **Encode a state as `(type, shift)`:**
    - `type = 0` → rotation of `nums`
    - `type = 1` → rotation of `reverse(nums)`
    - `shift` → number of left-rotations applied inside that family
- **Define the two transitions:**
    - **Rotate left:** `(type, shift) → (type, (shift + 1) mod n)`
    - **Reverse:** `(type, shift) → (1 − type, (n − shift) mod n)` — reversing a rotation `s` of `A` yields rotation `(n − s) mod n` of `reverse(A)`
- **Compute target states:** A state is a target iff its underlying array is `[0, 1, …, n−1]`. This requires the array to be a *cyclic increasing sequence* — locate `0` at position `zeroPos` and verify `B_type[(zeroPos + j) % n] == j` for all `j`. If so, `zeroPos` left-rotations sort it.
- **BFS from `(0, 0)`:** Since every edge has weight `1`, BFS returns the shortest sequence of operations to any target state. If BFS exhausts all states without reaching a target, return `-1`.

Let's implement this solution in PHP: **[3942. Minimum Operations to Sort a Permutation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003942-minimum-operations-to-sort-a-permutation/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minOperations(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Alias in case the judge expects this method name.
 *
 * @param array $nums
 * @return int
 */
function sortPermutation(array $nums): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns the shift needed to make B_t sorted, or -1 if impossible.
 * B_0 = nums
 * B_1 = reverse(nums)
 *
 * @param array $nums
 * @param int $type
 * @return int
 */
function getTargetShift(array $nums, int $type): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minOperations([0, 2, 1]) . "\n";              // Output: 2
echo minOperations([1, 0, 2]) . "\n";              // Output: 2
echo minOperations([2, 0, 1, 3]) . "\n";           // Output: -1
echo minOperations([0]) . "\n";                    // Output: 0
echo minOperations([0, 1, 2, 3]) . "\n";           // Output: 0
echo minOperations([3, 2, 1, 0]) . "\n";           // Output: 1
echo minOperations([1, 0]) . "\n";                 // Output: 1
echo minOperations([1, 2, 0]) . "\n";              // Output: 2
echo minOperations([2, 1, 0]) . "\n";              // Output: 1
echo minOperations([1, 2, 3, 0]) . "\n";           // Output: 3
echo minOperations([0, 2, 1, 3]) . "\n";           // Output: -1
echo minOperations([2, 3, 0, 1]) . "\n";           // Output: 2
?>
```

### Explanation:

- **Initialization**
    - Compute the target `(type, shift)` pair(s) using `getTargetShift()` — at most one per type.
    - If neither family is cyclic-increasing, return `-1` immediately.
    - Build a `dist` array of size `2n`, initialize `dist[0] = 0` (starting state `(0, 0)`), and push `0` into a FIFO queue.

- **BFS loop**
    - Pop state `id = type * n + shift`.
    - If `id` is a target, return `dist[id]` — this is the minimum number of operations.
    - **Apply reverse:** `newId = (1 − type) * n + ((n − shift) mod n)`; if unvisited, enqueue with `dist[id] + 1`.
    - **Apply rotate-left:** `newId = type * n + ((shift + 1) mod n)`; if unvisited, enqueue with `dist[id] + 1`.

- **Why BFS, not greedy case analysis?**
    - The reachable graph is small (`2n` nodes, degree 2) and unweighted, so BFS is both simplest and asymptotically optimal. It transparently handles both "rotate-then-reverse" and "reverse-then-rotate" orderings without special-casing.

- **Target verification (`getTargetShift`)**
    - Extract `zeroPos` in `B_type`.
    - Walk around the circle checking `B_type[(zeroPos + j) % n] == j` for `j = 0 … n−1`.
    - If any mismatch, this family can never be sorted → return `-1`.
    - Otherwise, return `zeroPos` — the exact number of left rotations needed to bring `0` to the front.

## Complexity Analysis

- **Time:** `O(n)` — computing targets takes `O(n)`, and BFS visits each of the `2n` states at most once with `O(1)` work per state.
- **Space:** `O(n)` — `dist` array of size `2n`, `queue` of size `2n`, and the small `targets`/`isTarget` maps.
- **Total:** `O(n)` time, `O(n)` space, well within the `n ≤ 10⁵` limit

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**