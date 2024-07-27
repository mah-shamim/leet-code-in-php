2976\. Minimum Cost to Convert String I

Medium

You are given two **0-indexed** strings `source` and `target`, both of length `n` and consisting of **lowercase** English letters. You are also given two **0-indexed** character arrays `original` and `changed`, and an integer array `cost`, where `cost[i]` represents the cost of changing the character `original[i]` to the character `changed[i]`.

You start with the string `source`. In one operation, you can pick a character `x` from the string and change it to the `character` y at a cost of `z` **if** there exists **any** index `j` such that `cost[j] == z`, `original[j] == x`, and `changed[j] == y`.

Return _the **minimum** cost to convert the string `source` to the string `target` using **any** number of operations. If it is impossible to convert `source` to `target`, return `-1`_.

**Note** that there may exist indices `i`, `j` such that `original[j] == original[i]` and `changed[j] == changed[i]`.

**Example 1:**

- **Input:** source = "abcd", target = "acbe", original = ["a","b","c","c","e","d"], changed = ["b","c","b","e","b","e"], cost = [2,5,5,1,2,20]
- **Output:** 28
- **Explanation:** To convert the string "abcd" to string "acbe":\
- Change value at index 1 from 'b' to 'c' at a cost of 5.\
- Change value at index 2 from 'c' to 'e' at a cost of 1.\
- Change value at index 2 from 'e' to 'b' at a cost of 2.\
- Change value at index 3 from 'd' to 'e' at a cost of 20.\
  The total cost incurred is 5 + 1 + 2 + 20 = 28.\
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

- <code>1 <= source.length == target.length <= 10<sup>5</sup></code>
- `source`, `target` consist of lowercase English letters.
- <code>1 <= cost.length == original.length == changed.length <= 2000</code>
- `original[i]`, `changed[i]` are lowercase English letters.
- <code>1 <= cost[i] <= 10<sup>6</sup></code>
- `original[i] != changed[i]`

**Hint:**
1. Construct a graph with each letter as a node, and construct an edge `(a, b)` with weight `c` if we can change from character `a` to letter `b` with cost `c`. (Keep the one with the smallest cost in case there are multiple edges between `a` and `b`).
2. Calculate the shortest path for each pair of characters `(source[i], target[i])`. The sum of cost over all `i` in the range `[0, source.length - 1]`. If there is no path between `source[i]` and `target[i]`, the answer is `-1`.
3. Any shortest path algorithms will work since we only have `26` nodes. Since we only have at most `26 * 26` pairs, we can save the result to avoid re-calculation.
4. We can also use Floyd Warshall's algorithm to precompute all the results.


**Solution:**


To solve this problem, we'll use a graph-based approach. Specifically, we'll build a graph where each character is a node, and there's a directed edge from one character to another if we can convert the former to the latter at a given cost. We will then use the Floyd-Warshall algorithm to find the shortest paths between all pairs of characters, which will help us determine the minimum cost to convert each character in the `source` string to the corresponding character in the `target` string.

Here is the PHP code implementing this solution: **[2976. Minimum Cost to Convert String I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002976-minimum-cost-to-convert-string-i/solution.php)**

```php
<?php
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

1. **Graph Initialization**:
    - We initialize a 26x26 matrix (`graph`) where each element represents the cost to convert one character to another. Initially, we set all costs to a large number (`$inf`) except for the diagonal elements, which we set to 0 because converting a character to itself has no cost.

2. **Graph Population**:
    - We fill the graph with the given transformation costs. If multiple costs are given for the same transformation, we take the minimum cost.

3. **Floyd-Warshall Algorithm**:
    - This algorithm computes the shortest paths between all pairs of nodes. After running this algorithm, `graph[i][j]` will contain the minimum cost to convert character `i` to character `j`.

4. **Conversion Cost Calculation**:
    - For each character in the `source` string, we find the cost to convert it to the corresponding character in the `target` string using our precomputed `graph`. If any conversion is impossible (indicated by a cost of `$inf`), we return -1. Otherwise, we sum up all the conversion costs to get the total minimum cost.

This approach ensures that we efficiently compute the minimum conversion cost, even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
