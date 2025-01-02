2070\. Most Beautiful Item for Each Query

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Sorting`

You are given a 2D integer array `items` where <code>items[i] = [price<sub>i</sub>, beauty<sub>i</sub>]</code> denotes the **price** and **beauty** of an item respectively.

You are also given a **0-indexed** integer array `queries`. For each `queries[j]`, you want to determine the **maximum beauty** of an item whose **price** is **less than or equal** to `queries[j]`. If no such item exists, then the answer to this query is `0`.

Return _an array `answer` of the same length as `queries` where `answer[j]` is the answer to the <code>j</sup>th</sup></code> query_.

**Example 1:**

- **Input:** items = [[1,2],[3,2],[2,4],[5,6],[3,5]], queries = [1,2,3,4,5,6]
- **Output:** [2,4,5,5,6,6]
- **Explanation:**
  - For queries[0]=1, [1,2] is the only item which has price <= 1. Hence, the answer for this query is 2.
  - For queries[1]=2, the items which can be considered are [1,2] and [2,4].
    - The maximum beauty among them is 4.
  - For queries[2]=3 and queries[3]=4, the items which can be considered are [1,2], [3,2], [2,4], and [3,5].
    - The maximum beauty among them is 5.
  - For queries[4]=5 and queries[5]=6, all items can be considered.
    - Hence, the answer for them is the maximum beauty of all items, i.e., 6.

**Example 2:**

- **Input:** items = [[1,2],[1,2],[1,3],[1,4]], queries = [1]
- **Output:** [4]
- **Explanation:** The price of every item is equal to 1, so we choose the item with the maximum beauty 4.
  - Note that multiple items can have the same price and/or beauty.


**Example 3:**

- **Input:** items = [[10,1000]], queries = [5]
- **Output:** [0]
- **Explanation:** No item has a price less than or equal to 5, so no item can be chosen.
  - Hence, the answer to the query is 0.



**Constraints:**

- <code>1 <= items.length, queries.length <= 10<sup>5</sup></code>
- `items[i].length == 2`
- <code>1 <= price<sub>i</sub>, beauty<sub>i</sub>, queries[j] <= 10<sup>9</sup></code>


**Hint:**
1. Can we process the queries in a smart order to avoid repeatedly checking the same items?
2. How can we use the answer to a query for other queries?



**Solution:**

We can use sorting and binary search techniques. Here’s the plan:

### Approach

1. **Sort the Items by Price**:
   - First, sort `items` by their `price`. This way, as we iterate through the items, we can keep track of the maximum beauty seen so far for items up to any given price.

2. **Sort the Queries with their Original Indices**:
   - Create an array of queries paired with their original indices, then sort this array by the query values.
   - Sorting helps because we can process queries in increasing order of `price` and avoid recalculating beauty values for lower prices repeatedly.

3. **Iterate through Items and Queries Simultaneously**:
   - Using two pointers, process each query:
      - For each query, move the pointer through items with a price less than or equal to the query’s price.
      - Track the maximum beauty as you go through these items, and use this value to answer the current query.
      - This avoids repeatedly checking items for multiple queries.

4. **Store and Return Results**:
   - Once processed, store the maximum beauty result for each query based on the original index to maintain the order.
   - Return the `answer` array.

Let's implement this solution in PHP: **[2070. Most Beautiful Item for Each Query](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002070-most-beautiful-item-for-each-query/solution.php)**

```php
<?php
/**
 * @param Integer[][] $items
 * @param Integer[] $queries
 * @return Integer[]
 */
function maximumBeauty($items, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$items = [[1,2],[3,2],[2,4],[5,6],[3,5]];
$queries = [1,2,3,4,5,6];
print_r(maximumBeauty($items, $queries));
// Output: [2,4,5,5,6,6]
?>
```

### Explanation:

- **Sorting `items` and `queries`**: This allows efficient processing without redundant calculations.
- **Two-pointer technique**: Moving through `items` only once for each query avoids excessive computations.
- **Track `maxBeauty`**: We update `maxBeauty` progressively, allowing each query to access the highest beauty seen so far.

### Complexity

- **Time Complexity**: _**O(n log n + m log m)**_ for sorting `items` and `queries`, and _**O(n + m)**_ for processing, where _**n**_ is the length of `items` and _**m**_ is the length of `queries`.
- **Space Complexity**: _**O(m)**_ for storing the results.

This solution is efficient and meets the constraints of the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
