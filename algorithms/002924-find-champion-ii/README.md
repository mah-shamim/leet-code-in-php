2924\. Find Champion II

**Difficulty:** Medium

**Topics:** `Graph`

There are `n` teams numbered from `0` to `n - 1` in a tournament; each team is also a node in a **DAG**.

You are given the integer `n` and a **0-indexed** 2D integer array `edges` of length `m` representing the **DAG**, where <code>edges[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> indicates that there is a directed edge from team <code>u<sub>i</sub></code> to team <code>v<sub>i</sub></code> in the graph.

A directed edge from `a` to `b` in the graph means that team `a` is **stronger** than team `b` and team `b` is **weaker** than team `a`.

Team `a` will be the **champion** of the tournament if there is no team `b` that is **stronger** than team `a`.

Return _the team that will be the **champion** of the tournament if there is a **unique** champion, otherwise, return `-1`_.

**Notes**

- A **cycle** is a series of nodes <code>a<sub>1</sub>, a<sub>2</sub>, ..., a<sub>n</sub>, a<sub>n+1</sub></code> such that node <code>a<sub>1</sub></code> is the same node as node <code>a<sub>n+1</sub></code>, the nodes <code>a<sub>1</sub>, a<sub>2</sub>, ..., a<sub>n</sub></code> are distinct, and there is a directed edge from the node <code>a<sub>i</sub></code> to node <code>a<sub>i+1</sub></code> for every `i` in the range `[1, n]`.
- A **DAG** is a directed graph that does not have any **cycle**.


**Example 1:**

![graph-3](https://assets.leetcode.com/uploads/2023/10/19/graph-3.png)

- **Input:** n = 3, edges = [[0,1],[1,2]]
- **Output:** 0
- **Explanation:** Team 1 is weaker than team 0. Team 2 is weaker than team 1. So the champion is team 0.

**Example 2:**

![graph-4](https://assets.leetcode.com/uploads/2023/10/19/graph-4.png)

- **Input:** n = 4, edges = [[0,2],[1,3],[1,2]]
- **Output:** -1
- **Explanation:** Team 2 is weaker than team 0 and team 1. Team 3 is weaker than team 1. But team 1 and team 0 are not weaker than any other teams. So the answer is -1.


**Constraints:**

- `1 <= n <= 100`
- `m == edges.length`
- `0 <= m <= n * (n - 1) / 2`
- `edges[i].length == 2`
- `0 <= edge[i][j] <= n - 1`
- `edges[i][0] != edges[i][1]`
- The input is generated such that if team `a` is stronger than team `b`, team `b` is not stronger than team `a`.
- The input is generated such that if team `a` is stronger than team `b` and team `b` is stronger than team `c`, then team `a` is stronger than team `c`.


**Hint:**
1. The champion(s) should have in-degree `0` in the DAG.



**Solution:**

We need to identify the team(s) with an **in-degree** of `0` in the given Directed Acyclic Graph (DAG). Teams with no incoming edges represent teams that no other team is stronger than, making them candidates for being the champion. If there is exactly one team with an in-degree of `0`, it is the unique champion. If there are multiple or no such teams, the result is `-1`.

Let's implement this solution in PHP: **[2924. Find Champion II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002924-find-champion-ii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer
 */
function findChampion($n, $edges) {
    // Initialize in-degrees for all teams
    $inDegree = array_fill(0, $n, 0);

    // Calculate the in-degree for each team
    foreach ($edges as $edge) {
        $inDegree[$edge[1]]++;
    }

    // Find teams with in-degree 0
    $candidates = [];
    for ($i = 0; $i < $n; $i++) {
        if ($inDegree[$i] == 0) {
            $candidates[] = $i;
        }
    }

    // If exactly one team has in-degree 0, return it; otherwise, return -1
    return count($candidates) === 1 ? $candidates[0] : -1;
}

// Example 1
$n1 = 3;
$edges1 = [[0, 1], [1, 2]];
echo "Example 1 Output: " . findChampion($n1, $edges1) . PHP_EOL; // Output: 0

// Example 2
$n2 = 4;
$edges2 = [[0, 2], [1, 3], [1, 2]];
echo "Example 2 Output: " . findChampion($n2, $edges2) . PHP_EOL; // Output: -1
?>
```

### Explanation:


1. **Input Parsing**:
   - `n` is the number of teams.
   - `edges` is the list of directed edges in the graph.

2. **Initialize In-degree**:
   - Create an array `inDegree` of size `n` initialized to `0`.

3. **Calculate In-degree**:
   - For each edge `[u, v]`, increment the in-degree of `v` (team `v` has one more incoming edge).

4. **Find Candidates**:
   - Iterate through the `inDegree` array and collect indices where the in-degree is `0`. These indices represent teams with no other stronger teams.

5. **Determine Champion**:
   - If exactly one team has in-degree `0`, it is the unique champion.
   - If multiple teams or no teams have in-degree `0`, return `-1`.

### Example Walkthrough

#### Example 1:
- Input: `n = 3`, `edges = [[0, 1], [1, 2]]`
- In-degree: `[0, 1, 1]`
- Teams with in-degree `0`: `[0]`
- Output: `0` (Team `0` is the unique champion).

#### Example 2:
- Input: `n = 4`, `edges = [[0, 2], [1, 3], [1, 2]]`
- In-degree: `[0, 0, 2, 1]`
- Teams with in-degree `0`: `[0, 1]`
- Output: `-1` (There are multiple potential champions).

### Complexity Analysis

1. **Time Complexity**:
   - Computing in-degrees: _**O(m)**_, where _**m**_ is the number of edges.
   - Checking teams: _**O(n)**_, where _**n**_ is the number of teams.
   - Total: _**O(n + m)**_.

2. **Space Complexity**:
   - `inDegree` array: _**O(n)**_.

This solution is efficient and works within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
