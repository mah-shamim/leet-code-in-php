3841\. Palindromic Path Queries in a Tree

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `String`, `Divide and Conquer`, `Bit Manipulation`, `Tree`, `Depth-First Search`, `Binary Indexed Tree`, `Segment Tree`, `Biweekly Contest 176`

You are given an undirected tree with `n` nodes labeled 0 to `n - 1`. This is represented by a 2D array `edges` of length `n - 1`, where `edges[i] = [uᵢ, vᵢ]` indicates an undirected edge between nodes `uᵢ` and `vᵢ`.

You are also given a string `s` of length `n` consisting of lowercase English letters, where `s[i]` represents the character assigned to node `i`.

You are also given a string array `queries`, where each `queries[i]` is either:

- `"update uᵢ c"`: Change the character at node `uᵢ` to `c`. Formally, update `s[uᵢ] = c`.
- `"query uᵢ vᵢ"`: Determine whether the string formed by the characters on the **unique** path from `uᵢ` to `vᵢ` (inclusive) can be **rearranged** into a **palindrome[^1]**.

Return a boolean array `answer`, where `answer[j]` is true if the `jᵗʰ` query of type `"query uᵢ vᵢ"` can be rearranged into a **palindrome**, and `false` otherwise.

[^1]: **Palindrome:** A **palindrome** is a string that reads the same forward and backward.

**Example 1:**

- **Input:** n = 3, edges = [[0,1],[1,2]], s = "aac", queries = ["query 0 2","update 1 b","query 0 2"]
- **Output:** [true,false]
- **Explanation:**
  - `"query 0 2"`: Path `0 → 1 → 2` gives `"aac"`, which can be rearranged to form `"aca"`, a palindrome. Thus, `answer[0] = true`.
  - `"update 1 b"`: Update node 1 to `'b'`, now `s = "abc"`.
  - `"query 0 2"`: Path characters are `"abc"`, which cannot be rearranged to form a palindrome. Thus, `answer[1] = false`.
  - Thus, `answer = [true, false]`.

**Example 2:**

- **Input:** n = 4, edges = [[0,1],[0,2],[0,3]], s = "abca", queries = ["query 1 2","update 0 b","query 2 3","update 3 a","query 1 3"]
- **Output:** [false,false,true]
- **Explanation:**

  - `"query 1 2`: Path `1 → 0 → 2` gives `"bac"`, which cannot be rearranged to form a palindrome. Thus, `answer[0] = false`.
  - `"update 0 b"`: Update node 0 to `'b`', now `s = "bbca"`.
  - `"query 2 3"`: Path `2 → 0 → 3` gives `"cba"`, which cannot be rearranged to form a palindrome. Thus, `answer[1] = false`.
  - `"update 3 a"`: Update node 3 to `'a'`, `s = "bbca"`.
  - `"query 1 3"`: Path `1 → 0 → 3` gives `"bba"`, which can be rearranged to form `"bab"`, a palindrome. Thus, `answer[2] = true`.
  - Thus, `answer = [false, false, true]`.
    **Example 3:**

- **Input:** n = 1, edges = [], s = "a", queries = ["query 0 0"]
- **Output:** [true]

**Example 4:**

- **Input:** n = 2, edges = [[0,1]], s = "aa", queries = ["query 0 1"]
- **Output:** [true]

**Example 5:**

- **Input:** n = 2, edges = [[0,1]], s = "ab", queries = ["query 0 1"]
- **Output:** [false]

**Example 6:**

- **Input:** n = 5, edges = [[0,1],[1,2],[2,3],[3,4]], s = "abcba", queries = ["query 0 4"]
- **Output:** [true]

**Example 7:**

- **Input:** n = 5, edges = [[0,1],[1,2],[2,3],[3,4]], s = "abcde", queries = ["query 0 4"]
- **Output:** [false]

**Example 8:**

- **Input:** n = 4, edges = [[0,1],[1,2],[2,3]], s = "aaaa", queries = ["update 1 a","query 0 3"]
- **Output:** [true]

**Example 9:**

- **Input:** n = 4, edges = [[0,1],[1,2],[2,3]], s = "aaaa", queries = ["update 1 b","update 2 b","query 0 3"]
- **Output:** [true]

**Example 10:**

- **Input:** n = 4, edges = [[0,1],[1,2],[2,3]], s = "aaaa", queries = ["update 1 b","query 0 3"]
- **Output:** [true]

**Example 11:**

- **Input:** n = 5, edges = [[0,1],[0,2],[0,3],[0,4]], s = "abcde", queries = ["query 1 2","query 3 4","update 0 a","query 1 2"]
- **Output:** [false,false,false]

**Example 12:**

- **Input:** n = 6, edges = [[0,1],[1,2],[2,3],[3,4],[4,5]], s = "aabbcc", queries = ["query 0 5","update 3 a","query 0 5"]
- **Output:** [true,false]

**Example 13:**

- **Input:** n = 3, edges = [[0,1],[1,2]], s = "aba", queries = ["query 0 0","query 1 1","query 0 2"]
- **Output:** [true,true,true]

**Example 14:**

- **Input:** n = 7, edges = [[0,1],[1,2],[2,3],[3,4],[4,5],[5,6]], s = "abcdefg", queries = ["update 3 a","update 5 a","update 1 a","query 0 6"]
- **Output:** [false]

**Example 15:**

- **Input:** n = 6, edges = [[0,1],[0,2],[1,3],[1,4],[2,5]], s = "xyzzyx", queries = ["query 3 4","query 3 5","update 0 x","query 3 5"]
- **Output:** [true,false,true]

**Constraints:**

- `1 <= n == s.length <= 5 * 10⁴`
- `edges.length == n - 1`
- `edges[i] = [uᵢ, vᵢ]`
- `0 <= uᵢ, vᵢ <= n - 1`
- `s` consists of lowercase English letters.
- The input is generated such that `edges` represents a valid tree.
- `1 <= queries.length <= 5 * 10⁴`
  - `queries[i] = "update uᵢ c"` or
  - `queries[i] = "query uᵢ vᵢ"`
  - `0 <= uᵢ, vᵢ <= n - 1`
  - `c` is a lowercase English letter.


**Hint:**

1. Use heavy light decomposition to break each path query into `O(log n)` segments.
2. Represent characters as a 26-bit mask and maintain segment data with XOR. A path can form a palindrome if the resulting mask has at most one bit set.


**Solution:**

We solve the dynamic palindromic-path query problem on a tree using an Euler-tour representation combined with a Fenwick tree for range-XOR/point-query updates, binary lifting for LCA, and 26-bit integer masks to represent character parities. Each character is encoded as a single bit; a string is rearrangeable into a palindrome iff at most one bit in the XOR mask of its characters is set. By observing that the path `u → v` mask equals `prefix(u) XOR prefix(v) XOR mask[LCA(u,v)]`, and that the prefix mask at a node changes exactly when a node in the subtree of an updated node is affected, we reduce each update to a subtree-range XOR and each query to two point queries plus an LCA lookup.

## Approach

- **Character encoding as bitmask:** Map each letter `c` to `1 << (ord(c) - 97)`. The parity of character counts along any path is the XOR of these masks.
- **Palindrome criterion:** A multiset of characters can be rearranged into a palindrome iff **at most one** character has odd frequency, i.e., the mask has `popcount(mask) <= 1`, equivalently `(mask & (mask - 1)) == 0`.
- **Root-to-node prefix:** Define `pref[x] = XOR of masks on path root → x`. Then for any `u, v`:
  `pathMask(u,v) = pref[u] XOR pref[v] XOR mask[LCA(u,v)]`.
- **Euler tour:** Flatten the tree so each node's subtree is a contiguous interval `[tin[u], tout[u]]`. This lets us model "all descendants of `u`" as a range.
- **Fenwick tree with range-XOR / point-query:** When node `u`'s mask changes by `delta`, `pref[x]` changes iff `x` is in `u`'s subtree. So apply `delta` as a range XOR over `[tin[u], tout[u]]`; a point query `pref[x]` is then the accumulated XOR at `tin[x]`.
- **Binary lifting LCA:** Precompute `up[k][v]` for O(log n) ancestor jumps, enabling O(log n) LCA queries.
- **Offline processing:** Parse each query string; if `update`, compute `delta = oldMask XOR newMask` (skip if 0) and apply a subtree range XOR; if `query`, compute `pathMask` and append the palindrome test result.

Let's implement this solution in PHP: **[3841. Palindromic Path Queries in a Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003841-palindromic-path-queries-in-a-tree/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @param String $s
 * @param String[] $queries
 * @return Boolean[]
 */
function palindromePath(int $n, array $edges, string $s, array $queries): array
{
    // Build adjacency list.
    $adj = array_fill(0, $n, []);
    foreach ($edges as $e) {
        $u = $e[0];
        $v = $e[1];
        $adj[$u][] = $v;
        $adj[$v][] = $u;
    }

    // Euler tour: tin[u]..tout[u] is the subtree interval of u.
    $parent = array_fill(0, $n, 0);
    $depth = array_fill(0, $n, 0);
    $tin = array_fill(0, $n, 0);
    $tout = array_fill(0, $n, 0);

    $timer = 0;
    $stack = [[0, 0, 0]]; // [node, parent, state], state 0 = enter, 1 = exit
    $parent[0] = 0;

    while (!empty($stack)) {
        $item = array_pop($stack);
        $u = $item[0];
        $p = $item[1];
        $state = $item[2];

        if ($state === 0) {
            $parent[$u] = $p;
            $tin[$u] = $timer++;

            $stack[] = [$u, $p, 1];

            foreach ($adj[$u] as $v) {
                if ($v === $p) continue;
                $depth[$v] = $depth[$u] + 1;
                $parent[$v] = $u;
                $stack[] = [$v, $u, 0];
            }
        } else {
            $tout[$u] = $timer - 1;
        }
    }

    // Binary lifting table for LCA.
    $LOG = 1;
    while ((1 << $LOG) <= $n) {
        $LOG++;
    }

    $up = array_fill(0, $LOG, array_fill(0, $n, 0));
    for ($i = 0; $i < $n; $i++) {
        $up[0][$i] = $parent[$i];
    }

    for ($k = 1; $k < $LOG; $k++) {
        for ($i = 0; $i < $n; $i++) {
            $up[$k][$i] = $up[$k - 1][$up[$k - 1][$i]];
        }
    }

    // Character masks.
    $mask = array_fill(0, $n, 0);
    for ($i = 0; $i < $n; $i++) {
        $mask[$i] = 1 << (ord($s[$i]) - 97);
    }

    /*
     * Fenwick tree for range XOR update and point query.
     *
     * If a node u changes by delta, every root-to-x prefix XOR changes
     * exactly when x is in the subtree of u. So we XOR delta over
     * [tin[u], tout[u]].
     */
    $N = $n + 1;
    $bit = array_fill(0, $N + 1, 0);

    $add = function($i, $val) use (&$bit, $N) {
        while ($i <= $N) {
            $bit[$i] ^= $val;
            $i += $i & -$i;
        }
    };

    $rangeXor = function($l, $r, $val) use ($add) {
        if ($val === 0) return;
        $add($l + 1, $val);
        $add($r + 2, $val);
    };

    $pointQuery = function($idx0) use (&$bit) {
        $i = $idx0 + 1;
        $res = 0;

        while ($i > 0) {
            $res ^= $bit[$i];
            $i -= $i & -$i;
        }

        return $res;
    };

    // Initialize prefix XORs by applying each node's initial mask
    // to its whole subtree.
    for ($i = 0; $i < $n; $i++) {
        $rangeXor($tin[$i], $tout[$i], $mask[$i]);
    }

    // LCA query.
    $lca = function($a, $b) use (&$up, $depth, $LOG) {
        if ($depth[$a] < $depth[$b]) {
            $tmp = $a;
            $a = $b;
            $b = $tmp;
        }

        $diff = $depth[$a] - $depth[$b];

        for ($k = 0; $k < $LOG; $k++) {
            if ($diff & (1 << $k)) {
                $a = $up[$k][$a];
            }
        }

        if ($a === $b) {
            return $a;
        }

        for ($k = $LOG - 1; $k >= 0; $k--) {
            if ($up[$k][$a] !== $up[$k][$b]) {
                $a = $up[$k][$a];
                $b = $up[$k][$b];
            }
        }

        return $up[0][$a];
    };

    $answer = [];

    foreach ($queries as $query) {
        $parts = explode(' ', $query);

        if ($parts[0] === 'update') {
            $u = (int)$parts[1];
            $newMask = 1 << (ord($parts[2]) - 97);

            $delta = $mask[$u] ^ $newMask;

            if ($delta !== 0) {
                $rangeXor($tin[$u], $tout[$u], $delta);
                $mask[$u] = $newMask;
            }
        } else {
            $u = (int)$parts[1];
            $v = (int)$parts[2];

            $w = $lca($u, $v);

            // XOR parity mask on path u -> v.
            $pathMask = $pointQuery($tin[$u])
                ^ $pointQuery($tin[$v])
                ^ $mask[$w];

            // Palindrome possible iff at most one bit is set.
            $answer[] = (($pathMask & ($pathMask - 1)) === 0);
        }
    }

    return $answer;
}

// Test cases
echo palindromePath(3, [[0,1],[1,2]], "aac", ["query 0 2","update 1 b","query 0 2"]) . "\n";                                                // Output: [true,false]
echo palindromePath(4, [[0,1],[0,2],[0,3]], "abca", ["query 1 2","update 0 b","query 2 3","update 3 a","query 1 3"]) . "\n";                // Output: [false,false,true]
echo palindromePath(1, [], "a", ["query 0 0"]) . "\n";                                                                                      // Output: [true]
echo palindromePath(2, [[0,1]], "aa", ["query 0 1"]) . "\n";                                                                                // Output: [true]
echo palindromePath(2, [[0,1]], "ab", ["query 0 1"]) . "\n";                                                                                // Output: [false]
echo palindromePath(5, [[0,1],[1,2],[2,3],[3,4]], "abcba", ["query 0 4"]) . "\n";                                                           // Output: [true]
echo palindromePath(5, [[0,1],[1,2],[2,3],[3,4]], "abcde", ["query 0 4"]) . "\n";                                                           // Output: [false]
echo palindromePath(4, [[0,1],[1,2],[2,3]], "aaaa", ["update 1 a","query 0 3"]) . "\n";                                                     // Output: [true]
echo palindromePath(4, [[0,1],[1,2],[2,3]], "aaaa", ["update 1 b","update 2 b","query 0 3"]) . "\n";                                        // Output: [true]
echo palindromePath(4, [[0,1],[1,2],[2,3]], "aaaa", ["update 1 b","query 0 3"]) . "\n";                                                     // Output: [true]
echo palindromePath(5, [[0,1],[0,2],[0,3],[0,4]], "abcde", ["query 1 2","query 3 4","update 0 a","query 1 2"]) . "\n";                      // Output: [false,false,false]
echo palindromePath(6, [[0,1],[1,2],[2,3],[3,4],[4,5]], "aabbcc", ["query 0 5","update 3 a","query 0 5"]) . "\n";                           // Output: [true,false]
echo palindromePath(3, [[0,1],[1,2]], "aba", ["query 0 0","query 1 1","query 0 2"]) . "\n";                                                 // Output: [true,true,true]
echo palindromePath(7, [[0,1],[1,2],[2,3],[3,4],[4,5],[5,6]], "abcdefg", ["update 3 a","update 5 a","update 1 a","query 0 6"]) . "\n";      // Output: [false]
echo palindromePath(6, [[0,1],[0,2],[1,3],[1,4],[2,5]], "xyzzyx", ["query 3 4","query 3 5","update 0 x","query 3 5"]) . "\n";               // Output: [true,false,true]
?>
```

## Explanation:

- **Tree preprocessing:**
  - Build an adjacency list from `edges`.
  - Perform an iterative DFS producing `tin[u]`, `tout[u]` (subtree interval), `depth[u]`, and `parent[u]`. Euler order guarantees `tin[u] < tin[v] < tout[v] < tout[u]` when `u` is an ancestor of `v`.
- **LCA preprocessing:**
  - Fill `up[0][v] = parent[v]` and iteratively `up[k][v] = up[k-1][up[k-1][v]]` for `k = 1..LOG-1`.
  - LCA procedure: lift the deeper node, then lift both together to the highest differing ancestors, returning the parent of that point.
- **Fenwick initialization:**
  - Start with an all-zero bit array; for every node `u`, perform `rangeXor(tin[u], tout[u], mask[u])`. After this, the point query at `tin[x]` equals `pref[x]` — the XOR of masks from root to `x`.
- **Update handling (`update u c`):**
  - Compute `newMask = 1 << (c - 'a')`, `delta = mask[u] XOR newMask`.
  - If `delta != 0`, do `rangeXor(tin[u], tout[u], delta)` and set `mask[u] = newMask`.
  - Range XOR is done with two Fenwick point updates (`+1` and `+2` on the exclusive end) since Fenwick supports prefix XOR for point queries.
- **Query handling (`query u v`):**
  - Find `w = LCA(u, v)`.
  - `pathMask = pointQuery(tin[u]) XOR pointQuery(tin[v]) XOR mask[w]`.
  - Push `((pathMask & (pathMask - 1)) == 0)` into the answer.
- **Why it works:**
  - `pointQuery(tin[u]) XOR pointQuery(tin[v])` cancels the common root-to-LCA prefix, leaving the XOR of the two `LCA → u` and `LCA → v` branches **excluding** the LCA. XOR-ing `mask[w]` re-inserts the LCA exactly once, giving the inclusive path mask.

## Complexity Analysis

- Let `n = |s|` (number of nodes) and `q = |queries|`.
- **Time complexity:**
  - Tree building + Euler tour: **O(n)**
  - Binary lifting table: **O(n log n)**
  - Fenwick initialization (n range updates): **O(n log n)**
  - Each `update`: **O(log n)**
  - Each `query`: **O(log n)** (LCA) + **O(log n)** (two point queries)
  - Total: **O((n + q) · log n)**
- **Space complexity:**
  - Adjacency list: O(n)
  - Euler arrays (`tin`, `tout`, `parent`, `depth`): O(n)
  - Binary lifting table: **O(n log n)**
  - Fenwick tree: O(n)
  - Overall: **O(n log n)**

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**