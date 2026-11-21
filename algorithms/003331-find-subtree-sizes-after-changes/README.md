3331\. Find Subtree Sizes After Changes

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `String`, `Tree`, `Depth-First Search`, `Biweekly Contest 142`

You are given a tree rooted at node 0 that consists of `n` nodes numbered from `0` to `n - 1`. The tree is represented by an array `parent` of size `n`, where `parent[i]` is the parent of node `i`. Since node 0 is the root, `parent[0] == -1`.

You are also given a string `s` of length `n`, where `s[i]` is the character assigned to node i.

We make the following changes on the tree **one** time **simultaneously** for all nodes `x` from `1` to `n - 1`:

- Find the **closest** node `y` to node `x` such that `y` is an ancestor of `x`, and `s[x] == s[y]`.
- If node `y` does not exist, do nothing.
- Otherwise, **remove** the edge between `x` and its current parent and make node `y` the new parent of `x` by adding an edge between them.

Return an array `answer` of size `n` where `answer[i]` is the **size** of the **subtree[^1]** rooted at node `i` in the **final** tree.

[^1]: **Subtree:** A **subtree** of `treeName` is a tree consisting of a node in `treeName` and all of its descendants.

**Example 1:**

- **Input:** parent = [-1,0,0,1,1,1], s = "abaabc"
- **Output:** [6,3,1,1,1,1]
- **Explanation:** 

    ![graphex1drawio](https://assets.leetcode.com/uploads/2024/08/15/graphex1drawio.png)
  - The parent of node 3 will change from node 1 to node 0.

**Example 2:**

- **Input:** parent = [-1,0,4,0,1], s = "abbba"
- **Output:** [5,2,1,1,1]
- **Explanation:**

    ![powergrid](https://assets.leetcode.com/uploads/2025/04/15/powergrid.jpg)
  - The following changes will happen at the same time:
     - The parent of node 4 will change from node 1 to node 0.
     - The parent of node 2 will change from node 4 to node 1.

**Example 3:**

- **Input:** parent = [-1], s = "a"
- **Output:** [1]

**Example 4:**

- **Input:** parent = [-1,0,1,2], s = "aaaa"
- **Output:** [4,3,2,1]

**Example 5:**

- **Input:** parent = [-1,0,1,2], s = "abab"
- **Output:** [4,2,1,1]

**Example 6:**

- **Input:** parent = [-1,0,0,1,1,2], s = "aaaaaa"
- **Output:** [6,3,2,1,1,1]

**Constraints:**

- `n == parent.length == s.length`
- `1 <= n <= 10⁵`
- `0 <= parent[i] <= n - 1 for all i >= 1.`
- `parent[0] == -1`
- `parent` represents a valid tree.
- `s` consists only of lowercase English letters.


**Hint:**

1. Perform a depth-first search on the tree, starting from the root.
2. During the DFS, keep track of the most recent node where each character from `'a'` to `'z'` has been seen.


**Solution:**

We perform an iterative DFS on the original tree while maintaining, for each character, the most recent node of that character on the current root-to-node path. This lets us find the closest same-character ancestor for every node and build the final parent array in `O(n)` time. Then we compute subtree sizes by processing nodes in reverse DFS preorder and accumulating sizes into their final parents.

## Approach

- Build the original tree’s children adjacency list from `parent`.
- Use an iterative DFS to avoid recursion depth issues for `n` up to `10⁵`.
- Maintain `last[26]`, where `last[c]` is the most recent node on the current DFS path whose character is `c`.
- When entering node `u`:
  - The closest same-character ancestor is exactly `last[s[u]]`, if it exists.
  - If it exists and `u != 0`, set `newParent[u]` to that ancestor.
  - Update `last[s[u]] = u`.
- On exiting node `u`, restore `last[s[u]]` to its previous value so siblings do not incorrectly see nodes outside their path.
- After building `newParent`, initialize every node’s subtree size to `1`.
- Process nodes in reverse DFS preorder:
  - For each node `u`, add `answer[u]` to `answer[newParent[u]]` if `newParent[u] != -1`.

Let's implement this solution in PHP: **[3331. Find Subtree Sizes After Changes](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003331-find-subtree-sizes-after-changes/solution.php)**

```php
<?php
/**
 * @param Integer[] $parent
 * @param String $s
 * @return Integer[]
 */
function findSubtreeSizes(array $parent, string $s): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo json_encode(findSubtreeSizes([-1,0,0,1,1,1], "abaabc")) . "\n";   // Output: [6,3,1,1,1,1]
echo json_encode(findSubtreeSizes([-1,0,4,0,1], "abbba")) . "\n";       // Output: [5,2,1,1,1]
echo json_encode(findSubtreeSizes([-1], "a")) . "\n";                   // Output: [1]
echo json_encode(findSubtreeSizes([-1,0,1,2], "aaaa")) . "\n";          // Output: [4,3,2,1]
echo json_encode(findSubtreeSizes([-1,0,1,2], "abab")) . "\n";          // Output: [4,2,1,1]
echo json_encode(findSubtreeSizes([-1,0,0,1,1,2], "aaaaaa")) . "\n";    // Output: [6,3,2,1,1,1]
?>
```

## Explanation

- The DFS path represents exactly the ancestor chain of the current node.
- `last[c]` stores the nearest ancestor with character `c` seen so far.
- Therefore, when visiting `u`, `last[s[u]]` is the closest same-character ancestor required by the problem.
- The rewiring is “simultaneous,” but this does not cause conflicts because all new parents are determined using only the original tree’s DFS ancestor paths.
- The final tree’s parent of any node is always an ancestor of that node in the original tree.
- In DFS preorder, every ancestor appears before its descendants. Thus, processing nodes in reverse preorder guarantees that a node’s final subtree size is fully computed before adding it to its final parent.

## Complexity Analysis

- **Time Complexity:** `O(n)`
  - Building the tree: `O(n)`
  - Iterative DFS and rewiring: `O(n)`
  - Subtree size accumulation: `O(n)`
- **Space Complexity:** `O(n)`
  - Children adjacency list: `O(n)`
  - DFS stack, order array, final parent array, answer array: `O(n)`
  - `last[26]` is `O(1)` extra space.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**