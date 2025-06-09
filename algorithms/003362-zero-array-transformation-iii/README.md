3362\. Zero Array Transformation III

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`, `Heap (Priority Queue)`, `Prefix Sum`

You are given an integer array `nums` of length `n` and a 2D array `queries` where <code>queries[i] = [l<sub>i</sub>, r<sub>i</sub>]</code>.

Each `queries[i]` represents the following action on `nums`:

- Decrement the value at each index in the range <code>[l<sub>i</sub>, r<sub>i</sub>]</code> in nums by **at most** 1.
- The amount by which the value is decremented can be chosen **independently** for each index.

A **Zero Array** is an array with all its elements equal to 0.

Return the **maximum** number of elements that can be removed from `queries`, such that `nums` can still be converted to a **zero array** using the remaining queries. If it is not possible to convert `nums` to a **zero array**, return `-1`.

**Example 1:**

- **Input:** nums = [2,0,2], queries = [[0,2],[0,2],[1,1]]
- **Output:** 1
- **Explanation:** After removing `queries[2]`, `nums` can still be converted to a zero array.
    - Using `queries[0]`, decrement `nums[0]` and `nums[2]` by 1 and `nums[1]` by 0.
    - Using `queries[1]`, decrement `nums[0]` and `nums[2]` by 1 and `nums[1]` by 0.


**Example 2:**

- **Input:** nums = [1,1,1,1], queries = [[1,3],[0,2],[1,3],[1,2]]
- **Output:** 2
- **Explanation:** We can remove `queries[2]` and `queries[3]`.


**Example 3:**

- **Input:** nums = [1,2,3,4], queries = [[0,3]]
- **Output:** -1
- **Explanation:** `nums` cannot be converted to a zero array even after using all the queries.


**Example 4:**

- **Input:** nums = [0,0,1,1,0], queries = [[3,4],[0,2],[2,3]]
- **Output:** 2


**Example 5:**

- **Input:** 
```
nums = [6,3,9,6,6,7,3,2,7,2,6,5,9,10,2,10,10,2,5,3,2,3,10,7,4,1,8,4,4,1,7,3,7,9,4,7,9,6,2,2,9,4,10,8,1,7,3,10,7,6,1,9,9,9,9,4,10,4,10,10,5,5,7,3,1,4,9,5,3,6,10,10,7,3,2,6,9,8,10,6,5,8,9,2,9,3,8,5,1,3,8,8,1,7,3,3,10,9,7,3,4,8,4,4,7,4,8,2,8,1,5,8,1,1,4,9,7,4,6,6,3,6,5,2,8,6,7,2,5,9,6,1,3,4,3,4,9,6,2,9,8,9,2,5,1,10,4,8,10,3,4,3,2,8,2,5,2,7,4,8,3,2,8,8,1,2,1,4,2,10,3,7,6,3,8,6,1,3,5,3,6,7,9,1,3,3,1,10,8,6,3,6,4,2,8,1,1,6,10,2,6,1,7,7,6,8,5,8,4,9,2,8,4,10,2,9,10,3,2,2,5,8,4,3,4,7,4,4,9,7,6,6,5,10,1,4,6,5,2,1,5,9,9,9,9,9,7,6,5,3,4,5,9,9,1,8,1,9,6,9,3,9,6,4,6,2,7,5,4,2,8,8,1,9,1,5,3,1,7,9,9,10,3,5,2,2,5,8,2,3,9,6,2,4,10,4,.....]
queries = [[6187,99742],[9900,96888],[4230,93922],[9934,99785],[6363,98517],[1510,94667],[6160,93659],[5195,97682],[5123,90446],[3162,99083],[2120,90363],[9962,99411],[5036,95351],[6455,95101],[5379,91064],[3136,94645],[7511,97459],[12,97517],[7414,99108],[9717,91077],[7147,92767],[5714,92718],[3731,98860],[1034,96604],[679,96568],[6689,95662],[8127,93690],[9059,94002],[2721,98125],[4652,93835],[7516,91572],[3677,92816],[5633,95692],[8634,90576],[83,91549],[1418,92824],[6493,92261],[3702,98251],[3175,98439],[5988,98166],[4587,91243],[9732,96607],[5873,96420],[6872,94479],[9705,97586],[6007,99732],[115,92441],[3396,93049],.........]
```
- **Output:** 50000



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- `queries[i].length == 2`
- <code>0 <= l<sub>i</sub> <= r<sub>i</sub> < nums.length</code>


**Hint:**
1. Sort the queries.
2. We need to greedily pick the queries with farthest ending point first.



**Solution:**

We need to determine the maximum number of queries that can be removed such that the remaining queries can still convert the given array into a zero array. Each query allows decrementing elements in a specified range by at most 1. The solution involves a greedy approach to select the most effective queries first.

### Approach
1. **Sort Queries by Start Index**: First, sort the queries based on their starting index (l) in ascending order. This allows us to process each query in the order they start.
2. **Use Heaps for Efficient Selection**: Utilize two heaps:
   - **Max-Heap (Available Queries)**: To keep track of available queries sorted by their ending index (r) in descending order. This helps in selecting the query that covers the farthest range first.
   - **Min-Heap (Running Queries)**: To track the currently selected queries sorted by their ending index (r) in ascending order. This helps in efficiently removing queries that no longer cover the current index.
3. **Process Each Index**: For each index in the array, add all queries starting at or before the current index to the max-heap. Then, remove expired queries from the min-heap and check if the current coverage meets the required decrements. If not, select additional queries from the max-heap to cover the deficit.

Let's implement this solution in PHP: **[3362. Zero Array Transformation III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003362-zero-array-transformation-iii/solution.php)**

```php
<?php

class MaxHeap extends SplPriorityQueue {
    /**
     * @param $a
     * @param $b
     * @return int|mixed
     */
    public function compare($a, $b) {
        return $a - $b; // max-heap
    }
}

class MinHeap extends SplPriorityQueue {
    /**
     * @param $a
     * @param $b
     * @return int|mixed
     */
    public function compare($a, $b) {
        return $b - $a; // min-heap
    }
}

/**
 * @param Integer[] $nums
 * @param Integer[][] $queries
 * @return Integer
 */
function maxRemoval($nums, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$nums1 = [2, 0, 2];
$queries1 = [[0, 2], [0, 2], [1, 1]];
echo maxRemoval($nums1, $queries1) . "\n"; // Output: 1

$nums2 = [1, 1, 1, 1];
$queries2 = [[1, 3], [0, 2], [1, 3], [1, 2]];
echo maxRemoval($nums2, $queries2) . "\n"; // Output: 2

$nums3 = [1, 2, 3, 4];
$queries3 = [[0, 3]];
echo maxRemoval($nums3, $queries3) . "\n"; // Output: -1

$nums4 = [0,0,1,1,0];
$queries4 = [[3,4],[0,2],[2,3]];
echo maxRemoval($nums4, $queries4) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Sorting Queries**: Queries are sorted by their starting index to process them in the order they can start affecting the array.
2. **Managing Heaps**:
   - **Available Queries**: As we process each index, we add all queries that start at or before the current index into a max-heap sorted by their ending index. This ensures we always consider the farthest-reaching queries first.
   - **Running Queries**: A min-heap keeps track of currently active queries, allowing efficient removal of queries that no longer cover the current index.
3. **Coverage Check**: For each index, we ensure that the number of active queries (those covering the current index) meets the required decrements. If not, we select additional queries from the available heap until the requirement is met.

This approach ensures we use the minimum number of necessary queries, maximizing the number of queries that can be removed while still converting the array to zero. The complexity is efficient due to the use of heaps, making the solution scalable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**