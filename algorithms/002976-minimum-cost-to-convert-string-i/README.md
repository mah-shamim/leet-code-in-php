2976\. Minimum Cost to Convert String I

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Graph Theory`, `Shortest Path`, `Weekly Contest 377`

You are given two **0-indexed** strings `source` and `target`, both of length `n` and consisting of **lowercase** English letters. You are also given two **0-indexed** character arrays `original` and `changed`, and an integer array `cost`, where `cost[i]` represents the cost of changing the character `original[i]` to the character `changed[i]`.

You start with the string `source`. In one operation, you can pick a character `x` from the string and change it to the `character` y at a cost of `z` **if** there exists **any** index `j` such that `cost[j] == z`, `original[j] == x`, and `changed[j] == y`.

Return _the **minimum** cost to convert the string `source` to the string `target` using **any** number of operations. If it is impossible to convert `source` to `target`, return `-1`_.

**Note** that there may exist indices `i`, `j` such that `original[j] == original[i]` and `changed[j] == changed[i]`.

**Example 1:**

- **Input:** source = "abcd", target = "acbe", original = ["a","b","c","c","e","d"], changed = ["b","c","b","e","b","e"], cost = [2,5,5,1,2,20]
- **Output:** 28
- **Explanation:** To convert the string "abcd" to string "acbe":
  - Change value at index 1 from 'b' to 'c' at a cost of 5.
  - Change value at index 2 from 'c' to 'e' at a cost of 1.
  - Change value at index 2 from 'e' to 'b' at a cost of 2.
  - Change value at index 3 from 'd' to 'e' at a cost of 20.
    The total cost incurred is 5 + 1 + 2 + 20 = 28.
    It can be shown that this is the minimum possible cost.

**Example 2:**

- **Input:** source = "aaaa", target = "bbbb", original = ["a","c"], changed = ["c","b"], cost = [1,2]
- **Output:** 12
- **Explanation:** o change the character 'a' to 'b' change the character 'a' to 'c' at a cost of 1, followed by changing the character 'c' to 'b' at a cost of 2, for a total cost of 1 + 2 = 3. To change all occurrences of 'a' to 'b', a total cost of 3 * 4 = 12 is incurred.

**Example 3:**

- **Input:** source = "abcd", target = "abce", original = ["a"], changed = ["e"], cost = [10000]
- **Output:** -1
- **Explanation:** It is impossible to convert source to target because the value at index 3 cannot be changed from 'd' to 'e'.

**Constraints:**

- `1 <= source.length == target.length <= 10⁵`
- `source`, `target` consist of lowercase English letters.
- `1 <= cost.length == original.length == changed.length <= 2000`
- `original[i]`, `changed[i]` are lowercase English letters.
- `1 <= cost[i] <= 10⁶`
- `original[i] != changed[i]`


**Hint:**
1. Construct a graph with each letter as a node, and construct an edge `(a, b)` with weight `c` if we can change from character `a` to letter `b` with cost `c`. (Keep the one with the smallest cost in case there are multiple edges between `a` and `b`).
2. Calculate the shortest path for each pair of characters `(source[i], target[i])`. The sum of cost over all `i` in the range `[0, source.length - 1]`. If there is no path between `source[i]` and `target[i]`, the answer is `-1`.
3. Any shortest path algorithms will work since we only have `26` nodes. Since we only have at most `26 * 26` pairs, we can save the result to avoid re-calculation.
4. We can also use Floyd Warshall's algorithm to precompute all the results.


**Similar Questions:**
1. [1540. Can Convert String in K Moves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001540-can-convert-string-in-k-moves)
2. [2027. Minimum Moves to Convert String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002027-minimum-moves-to-convert-string)


**Solution:**

We are given two strings source and target of equal length `n`. We are also given three arrays: `original`, `changed`, and `cost`. Each element in these arrays defines a possible change: from `original[i]` to `changed[i]` at `cost[i]`.

### Approach:

1. **Graph Construction**
    - Treat each letter `(a-z)` as a node in a graph
    - For each transformation `(original[i] → changed[i])` with `cost[i]`, add a directed edge
    - Keep only the minimum cost edge between any pair of nodes

2. **All-Pairs Shortest Path**
    - Use Floyd-Warshall algorithm since we have only `26` nodes
    - Compute `shortest` paths between all pairs of letters
    - Initialize cost to change a letter to itself as `0`

3. **Cost Calculation**
    - For each position in source and target strings:
        - If `source[i] == target[i]`, cost is 0
        - Otherwise, check precomputed `shortest` path cost
        - If no path exists (cost is INF), return `-1`
    - Sum all transformation costs

Let's implement this solution in PHP: **[2976. Minimum Cost to Convert String I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002976-minimum-cost-to-convert-string-i/solution.php)**

```php
<?php
/**
 * @param String $source
 * @param String $target
 * @param String[] $original
 * @param String[] $changed
 * @param Integer[] $cost
 * @return Integer
 */
function minimumCost(string $source, string $target, array $original, array $changed, array $cost): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$source1 = "abcd";
$target1 = "acbe";
$original1 = ["a","b","c","c","e","d"];
$changed1 = ["b","c","b","e","b","e"];
$cost1 = [2,5,5,1,2,20];

echo minimumCost($source1, $target1, $original1, $changed1, $cost1); // Output: 28

$source2 = "aaaa";
$target2 = "bbbb";
$original2 = ["a","c"];
$changed2 = ["c","b"];
$cost2 = [1,2];

echo minimumCost($source2, $target2, $original2, $changed2, $cost2); // Output: 12

$source3 = "abcd";
$target3 = "abce";
$original3 = ["a"];
$changed3 = ["e"];
$cost3 = [10000];

echo minimumCost($source3, $target3, $original3, $changed3, $cost3); // Output: -1

?>
```

### Explanation:

1. **Graph Representation**
    - We create a `26×26` matrix to represent transformation costs between letters
    - Direct transformations from input are stored as edges
    - Floyd-Warshall finds indirect transformation paths (e.g., `a→b→c`)

2. **Floyd-Warshall Algorithm**
    - Standard dynamic programming approach for all-pairs shortest path
    - For each intermediate node `k`, check if path `i→k→j` is better than current `i→j`
    - `O(26³) = O(17,576)` operations, which is very efficient

3. **Why This Works**
    - The problem reduces to finding minimum cost to transform each character independently
    - Indirect transformations (multiple steps) are allowed
    - Floyd-Warshall captures all possible transformation sequences

4. **Edge Cases**
    - Same character in source and `target → cost 0`
    - No path between `characters → return -1`
    - Multiple edges between same `pair → keep minimum cost`
    - Self-transformations cost `0`

### Complexity
- **Time Complexity**: `O(26³ + n + m)` where:
    - `26`³ from Floyd-Warshall (constant)
    - `n = length` of source/target strings
    - `m = number` of transformations in input
- **Space Complexity**: `O(26²)` for the cost matrix

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**