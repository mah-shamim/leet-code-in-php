2940\. Find Building Where Alice and Bob Can Meet

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Stack`, `Binary Indexed Tree`, `Segment Tree`, `Heap (Priority Queue)`, `Monotonic Stack`

You are given a **0-indexed** array `heights` of positive integers, where `heights[i]` represents the height of the <code>i<sup>th</sup></code> building.

If a person is in building `i`, they can move to any other building `j` if and only if `i < j` and `heights[i] < heights[j]`.

You are also given another array `queries` where <code>queries[i] = [a<sub>i</sub>, b<sub>i</sub>]</code>. On the <code>i<sup>th</sup></code> query, Alice is in building <code>a<sub>i</sub></code> while Bob is in building <code>b<sub>i</sub></code>.

Return an array `ans` where `ans[i]` is **the index of the leftmost building** where Alice and Bob can meet on the <code>i<sup>th</sup></code> query. If Alice and Bob cannot move to a common building on query `i`, set `ans[i]` to `-1`.

**Example 1:**

- **Input:** heights = [6,4,8,5,2,7], queries = [[0,1],[0,3],[2,4],[3,4],[2,2]]
- **Output:** [2,5,-1,5,2]
- **Explanation:** In the first query, Alice and Bob can move to building 2 since heights[0] < heights[2] and heights[1] < heights[2].
  In the second query, Alice and Bob can move to building 5 since heights[0] < heights[5] and heights[3] < heights[5].
  In the third query, Alice cannot meet Bob since Alice cannot move to any other building.
  In the fourth query, Alice and Bob can move to building 5 since heights[3] < heights[5] and heights[4] < heights[5].
  In the fifth query, Alice and Bob are already in the same building.  
  For ans[i] != -1, It can be shown that ans[i] is the leftmost building where Alice and Bob can meet.
  For ans[i] == -1, It can be shown that there is no building where Alice and Bob can meet.

**Example 2:**

- **Input:** heights = [5,3,8,2,6,1,4,6], queries = [[0,7],[3,5],[5,2],[3,0],[1,6]]
- **Output:** [7,6,-1,4,6]
- **Explanation:** In the first query, Alice can directly move to Bob's building since heights[0] < heights[7].
  In the second query, Alice and Bob can move to building 6 since heights[3] < heights[6] and heights[5] < heights[6].
  In the third query, Alice cannot meet Bob since Bob cannot move to any other building.
  In the fourth query, Alice and Bob can move to building 4 since heights[3] < heights[4] and heights[0] < heights[4].
  In the fifth query, Alice can directly move to Bob's building since heights[1] < heights[6].
  For ans[i] != -1, It can be shown that ans[i] is the leftmost building where Alice and Bob can meet.
  For ans[i] == -1, It can be shown that there is no building where Alice and Bob can meet.



**Constraints:**

- <code>1 <= heights.length <= 5 * 10<sup>4</sup></code>
- <code>1 <= heights[i] <= 10<sup>9</sup></code>
- <code>1 <= queries.length <= 5 * 10<sup>4</sup></code>
- <code>queries[i] = [a<sub>i</sub>, b<sub>i</sub>]</code>
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> <= heights.length - 1</code>


**Hint:**
1. For each query `[x, y]`, if `x > y`, swap `x` and `y`. Now, we can assume that `x <= y`.
2. For each query `[x, y]`, if `x == y` or `heights[x] < heights[y]`, then the answer is `y` since `x ≤ y`.
3. Otherwise, we need to find the smallest index `t` such that `y < t` and `heights[x] < heights[t]`. Note that `heights[y] <= heights[x]`, so `heights[x] < heights[t]` is a sufficient condition.
4. To find index `t` for each query, sort the queries in descending order of `y`. Iterate over the queries while maintaining a monotonic stack which we can binary search over to find index `t`.



**Solution:**

The problem requires determining the **leftmost building** where Alice and Bob can meet given their starting buildings and movement rules. Each query involves finding a meeting point based on building heights. This is challenging due to the constraints on movement and the need for efficient computation.

### **Key Points**
1. Alice and Bob can move to another building if its height is strictly greater than the current building.
2. For each query, find the **leftmost valid meeting point**, or return `-1` if no such building exists.
3. The constraints demand a solution better than a naive O(n²) approach.

### **Approach**

1. **Observations:**
   - If `a == b`, Alice and Bob are already at the same building.
   - If `heights[a] < heights[b]`, Bob's building is the meeting point.
   - Otherwise, find the smallest building index `t > b` where:
      - `heights[a] < heights[t]`
      - `heights[b] <= heights[t]` (as `b` is already less than `a` in height comparison).

2. **Optimization Using Monotonic Stack:**
   - A **monotonic stack** helps efficiently track the valid buildings Alice and Bob can move to. Buildings are added to the stack in a way that ensures heights are in decreasing order, enabling fast binary searches.

3. **Query Sorting:**
   - Sort the queries in descending order of `b` to process buildings with larger indices first. This ensures that we build the stack efficiently as we move from higher to lower indices.

4. **Binary Search on Stack:**
   - For each query, use binary search on the monotonic stack to find the smallest index `t` that satisfies the conditions.

### **Plan**

1. Sort queries based on the larger of the two indices (`b`) in descending order.
2. Traverse the array backward while maintaining a monotonic stack of valid indices.
3. For each query, check trivial cases (`a == b` or `heights[a] < heights[b]`).
4. For non-trivial cases, use the stack to find the leftmost valid building via binary search.
5. Return the results in the original query order.

### **Solution Steps**

1. **Preprocess Queries:**
   - Ensure `a <= b` in each query for consistency.
   - Sort queries by `b` in descending order.

2. **Iterate Through Queries:**
   - Maintain a monotonic stack as we traverse the array.
   - For each query:
      - If `a == b`, the answer is `b`.
      - If `heights[a] < heights[b]`, the answer is `b`.
      - Otherwise, use the stack to find the smallest valid index `t > b`.

3. **Binary Search on Stack:**
   - Use binary search to quickly find the smallest index `t` on the stack that satisfies `heights[t] > heights[a]`.

4. **Restore Original Order:**
   - Map results back to the original query indices.

5. **Return Results.**

Let's implement this solution in PHP: **[2940. Find Building Where Alice and Bob Can Meet](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002940-find-building-where-alice-and-bob-can-meet/solution.php)**

```php
<?php
/**
 * @param Integer[] $heights
 * @param Integer[][] $queries
 * @return Integer[]
 */
function leftmostBuildingQueries($heights, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $queries
 * @return array
 */
private function getIndexedQueries($queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $stack
 * @param $a
 * @param $heights
 * @return mixed|null
 */
private function findUpperBound($stack, $a, $heights) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

class IndexedQuery {
    public $queryIndex;
    public $a; // Alice's index
    public $b; // Bob's index

    /**
     * @param $queryIndex
     * @param $a
     * @param $b
     */
    public function __construct($queryIndex, $a, $b) {
        $this->queryIndex = $queryIndex;
        $this->a = $a;
        $this->b = $b;
    }
}

// Test the function
$heights = [6, 4, 8, 5, 2, 7];
$queries = [[0, 1], [0, 3], [2, 4], [3, 4], [2, 2]];
print_r(leftmostBuildingQueries($heights, $queries));

$heights = [5, 3, 8, 2, 6, 1, 4, 6];
$queries = [[0, 7], [3, 5], [5, 2], [3, 0], [1, 6]];
print_r(leftmostBuildingQueries($heights, $queries));
?>
```

### Explanation:

1. **Sorting Queries:** The queries are sorted by `b` in descending order to process larger indices first, which allows us to update our monotonic stack as we process.
2. **Monotonic Stack:** The stack is used to keep track of building indices where Alice and Bob can meet. We only keep buildings that have a height larger than any previously seen buildings in the stack.
3. **Binary Search:** When answering each query, we use binary search to efficiently find the smallest index `t` where the conditions are met.

### **Example Walkthrough**

#### Input:
- `heights = [6,4,8,5,2,7]`
- `queries = [[0,1],[0,3],[2,4],[3,4],[2,2]]`

#### Process:

1. **Sort Queries:**
   - Indexed queries: `[(2,4), (3,4), (0,3), (0,1), (2,2)]`

2. **Build Monotonic Stack:**
   - Start at the highest index and add indices to the stack:
      - At index 5: Stack = `[5]`
      - At index 4: Stack = `[5, 4]`
      - ...

3. **Query Processing:**
   - For query `[0,1]`, `heights[0] < heights[1]`: Result = 2.
   - ...

#### Output:
`[2, 5, -1, 5, 2]`

### **Time Complexity**

1. **Query Sorting:** `O(Q log Q)` where Q is the number of queries.
2. **Monotonic Stack Construction:** `O(N)` where N is the length of `heights`.
3. **Binary Search for Each Query:** `O(Q log N)`.

**Overall:** `O(N + Q log (Q + N))`.

### **Output for Example**

**Input:**
```php
$heights = [6, 4, 8, 5, 2, 7];
$queries = [[0, 1], [0, 3], [2, 4], [3, 4], [2, 2]];
```

**Output:**
```php
print_r(findBuilding($heights, $queries)); // [2, 5, -1, 5, 2]
```

This approach efficiently handles large constraints by leveraging a monotonic stack and binary search. It ensures optimal query processing while maintaining correctness.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
