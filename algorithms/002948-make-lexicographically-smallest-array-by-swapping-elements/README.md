2948\. Make Lexicographically Smallest Array by Swapping Elements

**Difficulty:** Medium

**Topics:** `Array`, `Union Find`, `Sorting`

You are given a **0-indexed** array of **positive** integers `nums` and a positive integer `limit`.

In one operation, you can choose any two indices `i` and `j` and swap `nums[i]` and `nums[j]` **if** `|nums[i] - nums[j]| <= limit`.

Return _the **lexicographically smallest array** that can be obtained by performing the operation any number of times_.

An array `a` is lexicographically smaller than an array `b` if in the first position where `a` and `b` differ, array `a` has an element that is less than the corresponding element in `b`. For example, the array `[2,10,3]` is lexicographically smaller than the array `[10,2,3]` because they differ at index `0` and `2 < 10`.

**Example 1:**

- **Input:** nums = [1,5,3,9,8], limit = 2
- **Output:** [1,3,5,8,9]
- **Explanation:** Apply the operation 2 times:
  - Swap nums[1] with nums[2]. The array becomes [1,3,5,9,8]
  - Swap nums[3] with nums[4]. The array becomes [1,3,5,8,9]
    We cannot obtain a lexicographically smaller array by applying any more operations.
    Note that it may be possible to get the same result by doing different operations.

**Example 2:**

- **Input:** nums = [1,7,6,18,2,1], limit = 3
- **Output:** [1,6,7,18,1,2]
- **Explanation:** Apply the operation 3 times:
  - Swap nums[1] with nums[2]. The array becomes [1,6,7,18,2,1]
  - Swap nums[0] with nums[4]. The array becomes [2,6,7,18,1,1]
  - Swap nums[0] with nums[5]. The array becomes [1,6,7,18,1,2]
    We cannot obtain a lexicographically smaller array by applying any more operations.


**Example 3:**

- **Input:** nums = [1,7,28,19,10], limit = 3
- **Output:** [1,7,28,19,10]
- **Explanation:** [1,7,28,19,10] is the lexicographically smallest array we can obtain because we cannot apply the operation on any two indices.


**Example 4:**

- **Input:** nums = [1,60,34,84,62,56,39,76,49,38], limit = 4
- **Output:** [1,56,34,84,60,62,38,76,49,39]



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- <code>1 <= limit <= 10<sup>9</sup></code>


**Hint:**
1. Construct a virtual graph where all elements in `nums` are nodes and the pairs satisfying the condition have an edge between them.
2. Instead of constructing all edges, we only care about the connected components.
3. Can we use DSU?
4. Sort `nums`. Now we just need to consider if the consecutive elements have an edge to check if they belong to the same connected component. Hence, all connected components become a list of position-consecutive elements after sorting.
5. For each index of `nums` from `0` to `nums.length - 1` we can change it to the current minimum value we have in its connected component and remove that value from the connected component.



**Solution:**

The problem asks us to find the **lexicographically smallest array** by swapping elements of an array, subject to a condition. Specifically, we can only swap two elements `nums[i]` and `nums[j]` if the absolute difference between them (`|nums[i] - nums[j]|`) is less than or equal to a given `limit`.


### **Key Points**
1. **Lexicographical Order**: An array `a` is lexicographically smaller than `b` if at the first differing index, `a[i] < b[i]`.
2. **Swapping Condition**: Swaps are only allowed if the difference between the numbers being swapped is ≤ `limit`.
3. **Efficient Grouping**: By using **Disjoint Set Union (DSU)** or sorting techniques, we can group elements that are connected by valid swaps.
4. **Optimal Arrangement**: For each group, sort the indices and values to achieve the smallest order.


### **Approach**
1. **Construct Groups**: Treat the array as a virtual graph, where valid swaps define the edges. Use sorting to identify connected groups or DSU to group indices efficiently.
2. **Sort Groups**: Within each group of connected indices, rearrange the elements in lexicographical order.
3. **Output Construction**: Place the sorted values back into their respective positions.


### **Plan**
1. Extract `(value, index)` pairs and sort them by value to enable efficient group detection.
2. Iterate through sorted values to form groups of indices that are connected based on the `limit` condition.
3. For each group:
   - Sort indices and values independently.
   - Reassign values to their original positions in lexicographical order.
4. Return the modified array.

Let's implement this solution in PHP: **[2948. Make Lexicographically Smallest Array by Swapping Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002948-make-lexicographically-smallest-array-by-swapping-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $limit
 * @return Integer[]
 */
function lexicographicallySmallestArray($nums, $limit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @return array
 */
function getNumAndIndexes($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [1, 5, 3, 9, 8];
$limit1 = 2;
print_r(lexicographicallySmallestArray($nums1, $limit1)); // Output: [1, 3, 5, 8, 9]

$nums2 = [1, 7, 6, 18, 2, 1];
$limit2 = 3;
print_r(lexicographicallySmallestArray($nums2, $limit2)); // Output: [1, 6, 7, 18, 1, 2]

$nums3 = [1, 7, 28, 19, 10];
$limit3 = 3;
print_r(lexicographicallySmallestArray($nums3, $limit3)); // Output: [1, 7, 28, 19, 10]

$nums4 = [1, 60, 34, 84, 62, 56, 39, 76, 49, 38];
$limit4 = 4;
print_r(lexicographicallySmallestArray($nums4, $limit4)); // Output: [1, 56, 34, 84, 60, 62, 38, 76, 49, 39]
?>
```

### Explanation:

1. **Extracting and Sorting (getNumAndIndexes):**
   - Combine values and indices into pairs for easy reference.
   - Sort the pairs by value to enable efficient grouping of connected components.

2. **Grouping Logic:**
   - Traverse the sorted pairs. If the difference between consecutive values is ≤ `limit`, add them to the same group; otherwise, start a new group.

3. **Sorting and Reassigning:**
   - For each group:
      - Extract the indices and values.
      - Sort both lists to ensure the smallest values are placed in the smallest indices.
      - Reassign the sorted values to their respective positions in the answer array.

4. **Result Construction:**
   - After processing all groups, return the updated array.


### **Example Walkthrough**

#### Example 1
**Input:** `nums = [1,5,3,9,8]`, `limit = 2`

1. **Extract and Sort:**
   - Pairs: `[(1, 0), (5, 1), (3, 2), (9, 3), (8, 4)]`
   - Sorted Pairs: `[(1, 0), (3, 2), (5, 1), (8, 4), (9, 3)]`

2. **Grouping:**
   - Group 1: `[(1, 0)]`
   - Group 2: `[(3, 2), (5, 1)]`
   - Group 3: `[(8, 4), (9, 3)]`

3. **Sorting Groups:**
   - Group 1: No change (`[1]`)
   - Group 2: Values = `[3, 5]`, Indices = `[1, 2]` → Result: `[1, 3, 5]`
   - Group 3: Values = `[8, 9]`, Indices = `[3, 4]` → Result: `[8, 9]`

4. **Final Result:** `[1, 3, 5, 8, 9]`


### **Time Complexity**
1. **Sorting:** Sorting the `nums` array takes _**O(n log n)**_.
2. **Grouping:** Linear traversal through the sorted array takes _**O(n)**_.
3. **Sorting Groups:** Sorting indices and values for each group takes _**O(k log k)**_, where _**k**_ is the group size. Summed over all groups, this is _**O(n log n)**_.

**Overall Time Complexity:** _**O(n log n)**_


### **Output for Examples**

#### Example 2
**Input:** `nums = [1,7,6,18,2,1]`, `limit = 3`  
**Output:** `[1,6,7,18,1,2]`

#### Example 3
**Input:** `nums = [1,7,28,19,10]`, `limit = 3`  
**Output:** `[1,7,28,19,10]`


This approach efficiently handles the problem by using sorting to identify connected components and rearranging values within each component to achieve the lexicographically smallest array. By leveraging sorting and group processing, we ensure an optimal solution with _**O(n log n)**_ complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**