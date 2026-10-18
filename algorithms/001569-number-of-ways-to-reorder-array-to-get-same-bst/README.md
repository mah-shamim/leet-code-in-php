1569\. Number of Ways to Reorder Array to Get Same BST

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Math`, `Divide and Conquer`, `Dynamic Programming`, `Tree`, `Union-Find`, `Binary Search Tree`, `Memoization`, `Combinatorics`, `Binary Tree`, `Fermat's Little Theorem`, `Weekly Contest 204`

Given an array `nums` that represents a permutation of integers from `1` to `n`. We are going to construct a binary search tree (BST) by inserting the elements of `nums` in order into an initially empty BST. Find the number of different ways to reorder `nums` so that the constructed BST is identical to that formed from the original array `nums`.

- For example, given `nums = [2,1,3]`, we will have 2 as the root, 1 as a left child, and 3 as a right child. The array `[2,3,1]` also yields the same BST but `[3,2,1]` yields a different BST.

Return _the number of ways to reorder `nums` such that the BST formed is identical to the original BST formed from `nums`_.

Since the answer may be very large, **return it modulo** `10⁹ + 7`.

**Example 1:**

![1569_ex0](https://assets.leetcode.com/uploads/2026/02/23/1569_ex0.png)

- **Input:** nums = [2,1,3]
- **Output:** 1
- **Explanation:** We can reorder nums to be [2,3,1] which will yield the same BST. There are no other ways to reorder nums which will yield the same BST.

**Example 2:**

![1569_ex](https://assets.leetcode.com/uploads/2026/02/23/1569_ex.png)

- **Input:** nums = [3,4,5,1,2]
- **Output:** 5
- **Explanation:** 
  - The following 5 arrays will yield the same BST:
     - [3,1,2,4,5]
     - [3,1,4,2,5]
     - [3,1,4,5,2]
     - [3,4,1,2,5]
     - [3,4,1,5,2]

**Example 3:**

![1569_ex2](https://assets.leetcode.com/uploads/2026/02/23/1569_ex2.png)

- **Input:** nums = [1,2,3]
- **Output:** 0
- **Explanation:** There are no other orderings of nums that will yield the same BST.

**Example 4:**

- **Input:** nums = [1]
- **Output:** 0

**Example 5:**

- **Input:** nums = [2,1]
- **Output:** 0

**Example 6:**

- **Input:** nums = [2,3,1]
- **Output:** 1

**Example 7:**

- **Input:** nums = [3,1,2]
- **Output:** 0

**Example 8:**

- **Input:** nums = [4,2,1,3,5]
- **Output:** 1

**Example 9:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 0

**Example 10:**

- **Input:** nums = [5,4,3,2,1]
- **Output:** 0

**Example 11:**

- **Input:** nums = [3,1,4,2,5]
- **Output:** 4

**Example 12:**

- **Input:** nums = [10,5,15,3,7,12,18]
- **Output:** 0

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= nums.length`
- All integers in `nums` are **distinct**.


**Hint:**

1. Use a divide and conquer strategy.
2. The first number will always be the root. Consider the numbers smaller and larger than the root separately. When merging the results together, how many ways can you order x elements in x+y positions?


**Solution:**

We solve this by recognizing that the first element of `nums` is always the root of the BST, and all elements smaller than it must go to the left subtree while all larger elements go to the right subtree. The relative insertion order within each subtree is what matters — but left and right subtrees can be freely interleaved in the original array as long as their internal relative order is preserved. We recursively count valid orderings per subtree and use combinations (via factorials + Fermat's Little Theorem for modular inverses) to count the interleavings, then subtract 1 to exclude the original array.

## Approach

- **Recursive Divide & Conquer:** Root = `nums[0]`. Partition remaining elements into `left` (< root) and `right` (> root), preserving original relative order.
- **Interleaving Count:** Insertion sequences of the left and right subtrees can be mixed in any order across the full array (positions `1..n-1`). Choose which `|left|` of these `n-1` positions belong to the left subtree → `C(n-1, |left|)` ways.
- **Recursive Product:** Multiply the interleaving count by the ways for each subtree independently: `ways = C(n-1, leftCount) × dfs(left) × dfs(right)`.
- **Combinatorics Precomputation:** Precompute `fact[]` and `invFact[]` for `C(n,k)` using Fermat's Little Theorem (`modPow(fact[n], MOD-2, MOD)`).
- **Final Adjustment:** Subtract `1` to remove the original array from the count, and take modulo `1e9+7`.

Let's implement this solution in PHP: **[1569. Number of Ways to Reorder Array to Get Same BST](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001569-number-of-ways-to-reorder-array-to-get-same-bst/solution.php)**

```php
<?php
define('MOD', 1000000007);

$fact = [];
$invFact = [];

/**
 * @param int $base
 * @param int $exp
 * @return int
 */
function modPow(int $base, int $exp): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param int $n
 * @param int $k
 * @return int
 */
function comb(int $n, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $arr
 * @return int
 */
function dfs(array $arr): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param array $nums
 * @return int
 */
function numOfWays(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numOfWays([2,1,3]) .  "\n";                // Output: 1
echo numOfWays([3,4,5,1,2]) .  "\n";            // Output: 5
echo numOfWays([1,2,3]) .  "\n";                // Output: 0
echo numOfWays([1]) .  "\n";                    // Output: 0
echo numOfWays([2,1]) .  "\n";                  // Output: 0
echo numOfWays([2,3,1]) .  "\n";                // Output: 1
echo numOfWays([3,1,2]) .  "\n";                // Output: 0
echo numOfWays([4,2,1,3,5]) .  "\n";            // Output: 1
echo numOfWays([1,2,3,4,5]) .  "\n";            // Output: 0
echo numOfWays([5,4,3,2,1]) .  "\n";            // Output: 0
echo numOfWays([3,1,4,2,5]) .  "\n";            // Output: 4
echo numOfWays([10,5,15,3,7,12,18]) .  "\n";    // Output: 0
?>
```

### Explanation:

- **Why the first element is always the root:** BST insertion guarantees that `nums[0]` becomes the root; no reordering of the remaining elements can change that — so we only rearrange the tail.
- **Why partition is forced:** Any value smaller than the root must eventually land in the left subtree, and any larger value in the right subtree, regardless of insertion order.
- **Why interleaving is valid:** The relative order of insertions *within* the left subtree must match the original (recursively), and similarly for the right. But the two subtrees can be merged in any interleaved way — this is exactly the multinomial choice `C(n-1, |left|)`.
- **Base case:** A subtree with `0` or `1` element has exactly `1` valid ordering (trivially the array itself).
- **Modular arithmetic:** Since counts explode, we compute `C(n, k) = fact[n] * invFact[k] * invFact[n-k] mod MOD`, where `invFact` is derived using `modPow` (fast exponentiation with exponent `MOD-2`).
- **Example walkthrough `[3,4,5,1,2]`:** Root `3`, left `[1,2]`, right `[4,5]`. `C(4,2)=6`. `dfs([1,2])=1`, `dfs([4,5])=1`. Total `6`, minus `1` → **`5`**. ✓

## Complexity Analysis

- **Time Complexity:**
    - Factorial precomputation: `O(n)`
    - Each `dfs` level partitions its subarray → total work per level `O(n)`, depth `O(n)` worst-case (skewed tree) → **`O(n²)`** worst-case (or `O(n log n)` on balanced inputs).
    - `modPow` for `invFact[n]`: `O(log MOD)`.
    - Overall: **`O(n²)`** time, **`O(n)`** space for recursion + arrays.
- **Space Complexity:** `O(n)` for `fact`, `invFact`, recursion stack, and temporary left/right arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**