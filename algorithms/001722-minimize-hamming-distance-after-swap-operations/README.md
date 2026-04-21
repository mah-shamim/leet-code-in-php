1722\. Minimize Hamming Distance After Swap Operations

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Depth-First Search`, `Union-Find`, `Weekly Contest 223`

You are given two integer arrays, `source` and `target`, both of length `n`. You are also given an array `allowedSwaps` where each `allowedSwaps[i] = [aᵢ, bᵢ]` indicates that you are allowed to swap the elements at index `aᵢ` and index `bᵢ` (**0-indexed**) of array `source`. Note that you can swap elements at a specific pair of indices **multiple** times and in any order.

The Hamming distance of two arrays of the same length, `source` and `target`, is the number of positions where the elements are different. Formally, it is the number of indices `i` for `0 <= i <= n-1` where `source[i] != target[i]` (**0-indexed**).

Return _the **minimum Hamming distance** of `source` and `target` after performing **any** amount of swap operations on array `source`_.

**Example 1:**

- **Input:** source = [1,2,3,4], target = [2,1,4,5], allowedSwaps = [[0,1],[2,3]]
- **Output:** 1
- **Explanation:** 
  - source can be transformed the following way:
    - Swap indices 0 and 1: source = [<ins>**2**</ins>,<ins>**1**</ins>,3,4]
    - Swap indices 2 and 3: source = [2,1,<ins>**4**</ins>,<ins>**3**</ins>]
  - The Hamming distance of source and target is 1 as they differ in 1 position: index 3.

**Example 2:**

- **Input:** source = [1,2,3,4], target = [1,3,2,4], allowedSwaps = []
- **Output:** 2
- **Explanation:** 
  - There are no allowed swaps.
  - The Hamming distance of source and target is 2 as they differ in 2 positions: index 1 and index 2.

**Example 3:**

- **Input:** source = [5,1,2,4,3], target = [1,5,4,2,3], allowedSwaps = [[0,4],[4,2],[1,3],[1,4]]
- **Output:** 0

**Constraints:**

- `n == source.length == target.length`
- `1 <= n <= 10⁵`
- `1 <= source[i], target[i] <= 10⁵`
- `0 <= allowedSwaps.length <= 10⁵`
- `allowedSwaps[i].length == 2`
- `0 <= aᵢ, bᵢ <= n - 1`
- `aᵢ != bᵢ`



**Hint:**
1. The source array can be imagined as a graph where each index is a node and each `allowedSwaps[i]` is an edge.
2. Nodes within the same component can be freely swapped with each other.
3. For each component, find the number of common elements. The elements that are not in common will contribute to the total Hamming distance.



**Similar Questions:**
1. [1202. Smallest String With Swaps](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001202-smallest-string-with-swaps)
2. [2948. Make Lexicographically Smallest Array by Swapping Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002948-make-lexicographically-smallest-array-by-swapping-elements)






**Solution:**

This problem is about minimizing the Hamming distance between two arrays by swapping elements in `source` using allowed swaps.  
The key insight is that indices connected through allowed swaps form components where any permutation of values is possible.  
Thus, within each component, we can rearrange `source` values freely to match as many `target` values as possible.  
The solution uses a **Union-Find (Disjoint Set Union)** data structure to group indices into connected components, then counts mismatches per component.

### Approach:

- **Union-Find (DSU)** is used to group indices that are directly or indirectly connected via `allowedSwaps`.
- For each component, collect all `source` and `target` values.
- Count frequency of each value in `source` and `target` within the component.
- For each value, the number of matches = `min(source_count, target_count)`.
- The Hamming distance for the component = `component_size - matches`.
- Sum over all components to get total minimum Hamming distance.

Let's implement this solution in PHP: **[1722. Minimize Hamming Distance After Swap Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001722-minimize-hamming-distance-after-swap-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $source
 * @param Integer[] $target
 * @param Integer[][] $allowedSwaps
 * @return Integer
 */
function minimumHammingDistance(array $source, array $target, array $allowedSwaps): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumHammingDistance([1,2,3,4], [2,1,4,5], [[0,1],[2,3]]) . "\n";                                // Output: 1
echo minimumHammingDistance([1,2,3,4], [1,3,2,4], []) . "\n";                                           // Output: 2
echo minimumHammingDistance([5,1,2,4,3], [1,5,4,2,3], [[0,4],[4,2],[1,3],[1,4]]) . "\n";                // Output: 0
?>
```

### Explanation:

- **Graph interpretation**:  
  - Each index is a node, each allowed swap is an undirected edge.  
  - Nodes in the same connected component can be rearranged arbitrarily.

- **Union-Find**:  
  - Merges indices connected by swaps.  
  - After processing all swaps, `find(i)` gives the root of the component containing `i`.

- **Group indices**: Use a map from root → list of indices.

- **Count matches per component**: Since we can permute freely, the best we can do is match as many `target` values as possible from the multiset of `source` values in that component.

- **Compute mismatches**:  
  - `component_size - matches` gives the number of positions that cannot be fixed in that component.  
  - Summing over all components gives the minimum possible Hamming distance.

### Complexity
- **Time Complexity**:
   - Building DSU: `O(α(n) * m)` where `m` = `len(allowedSwaps)` and `α` is inverse Ackermann (near constant).
   - Grouping indices: `O(n)`.
   - Counting frequencies per component: total `O(n)` across all components.
   - Overall: **O(n + m * α(n))**.
- **Space Complexity**:
   - DSU arrays: `O(n)`.
   - Component grouping: `O(n)`.
   - Frequency maps per component: total `O(n)` across all components.
   - Overall: **O(n)**.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**