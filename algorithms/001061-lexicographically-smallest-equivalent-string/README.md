1061\. Lexicographically Smallest Equivalent String

**Difficulty:** Medium

**Topics:** `String`, `Union Find`

You are given two strings of the same `length` s1 and `s2` and a string `baseStr`.

We say `s1[i]` and `s2[i]` are equivalent characters.

- For example, if `s1 = "abc"` and `s2 = "cde"`, then we have `'a' == 'c'`, `'b' == 'd'`, and `'c' == 'e'`.

Equivalent characters follow the usual rules of any equivalence relation:

- **Reflexivity:** `'a' == 'a`'.
- **Symmetry:** `'a' == 'b'` implies `'b' == 'a'`.
- **Transitivity:** `'a' == 'b'` and `'b' == 'c'` implies `'a' == 'c'`.

For example, given the equivalency information from `s1 = "abc"` and `s2 = "cde"`, `"acd"` and `"aab"` are equivalent strings of `baseStr = "eed"`, and `"aab"` is the lexicographically smallest equivalent string of `baseStr`.

Return _the lexicographically smallest equivalent string of `baseStr` by using the equivalency information from `s1` and `s2`_.

**Example 1:**

- **Input:** s1 = "parker", s2 = "morris", baseStr = "parser"
- **Output:** "makkek"
- **Explanation:** Based on the equivalency information in s1 and s2, we can group their characters as [m,p], [a,o], [k,r,s], [e,i].
  The characters in each group are equivalent and sorted in lexicographical order.
  So the answer is "makkek".

**Example 2:**

- **Input:** s1 = "hello", s2 = "world", baseStr = "hold"
- **Output:** "hdld"
- **Explanation:** Based on the equivalency information in s1 and s2, we can group their characters as [h,w], [d,e,o], [l,r].
  So only the second letter 'o' in baseStr is changed to 'd', the answer is "hdld".


**Example 3:**

- **Input:** s1 = "leetcode", s2 = "programs", baseStr = "sourcecode"
- **Output:** "aauaaaaada"
- **Explanation:** We group the equivalent characters in s1 and s2 as [a,o,e,r,s,c], [l,p], [g,t] and [d,m], thus all letters in baseStr except 'u' and 'd' are transformed to 'a', the answer is "aauaaaaada".



**Constraints:**

- `1 <= s1.length, s2.length, baseStr <= 1000`
- `s1.length == s2.length`
- `s1`, `s2`, and `baseStr` consist of lowercase English letters.


**Hint:**
1. Model these equalities as edges of a graph.
2. Group each connected component of the graph and assign each node of this component to the node with the lowest lexicographically character.
3. Finally convert the string with the precalculated information.



**Solution:**

We need to find the lexicographically smallest equivalent string of `baseStr` by leveraging the equivalence information provided by `s1` and `s2`. The equivalence between characters follows the properties of reflexivity, symmetry, and transitivity. The solution involves grouping equivalent characters into connected components and representing each component with the smallest lexicographical character.

### Approach
1. **Union-Find Data Structure**: We use the Union-Find (Disjoint Set Union, DSU) data structure to manage the equivalence relationships. This structure helps efficiently group characters into connected components where each component's root is the smallest character in the group.
2. **Initialization**: Initialize a parent array where each character initially points to itself.
3. **Processing Equivalences**: For each corresponding character pair in `s1` and `s2`, perform a union operation to merge their respective groups. During the union, ensure the root of the merged group is the smallest character among the two groups.
4. **Path Compression**: During the find operation, compress paths to ensure future queries are efficient. This involves updating the parent pointers of nodes along the path to point directly to the root.
5. **Constructing Result**: For each character in `baseStr`, find the root of its group (the smallest character in the group) and replace it with this root character to form the result string.

Let's implement this solution in PHP: **[1061. Lexicographically Smallest Equivalent String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001061-lexicographically-smallest-equivalent-string/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @param String $baseStr
 * @return String
 */
function smallestEquivalentString($s1, $s2, $baseStr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @param $parent
 * @return mixed
 */
function find($x, &$parent) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @param $y
 * @param $parent
 * @return void
 */
function union($x, $y, &$parent) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
echo smallestEquivalentString("parker", "morris", "parser") . "\n"; // Output: "makkek"
echo smallestEquivalentString("hello", "world", "hold") . "\n";     // Output: "hdld"
echo smallestEquivalentString("leetcode", "programs", "sourcecode") . "\n"; // Output: "aauaaaaada"
?>
```

### Explanation:

1. **Initialization**: The parent array is initialized such that each character (represented as an index from 0 to 25) is its own parent.
2. **Union Operations**: For each character pair in `s1` and `s2`, the union operation merges their sets. The root of the merged set is the smallest character between the roots of the two sets.
3. **Path Compression**: During the find operation, the path from the queried node to its root is compressed, making future queries faster by setting each node's parent directly to the root.
4. **Result Construction**: For each character in `baseStr`, the find operation retrieves the root of its set (the smallest character in the set). The character is then replaced by this root character to form the lexicographically smallest equivalent string.

This approach efficiently groups equivalent characters and ensures the smallest lexicographical representation by leveraging the Union-Find data structure with path compression and union by size (implicitly by smallest root). The complexity is nearly linear due to path compression, making it optimal for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**