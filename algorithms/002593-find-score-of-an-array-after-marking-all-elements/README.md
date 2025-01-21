2593\. Find Score of an Array After Marking All Elements

**Difficulty:** Medium

**Topics:** `Heap (Priority Queue)`, `Sorting`, `Array`, `Simulation`, `Hash Table`, `Ordered Set`, `Ordered Map`, `Greedy`, `Monotonic Stack`, `Sliding Window`, `Two Pointers`, `Stack`, `Queue`, `Bit Manipulation`, `Divide and Conquer`, `Dynamic Programming`, `Doubly-Linked List`, `Data Stream`, `Radix Sort`, `Backtracking`, `Bitmask`, `Tree`, `Design`, `Hash Function`, `String`, `Iterator`, `Counting Sort`, `Linked List`

You are given an array `nums` consisting of positive integers.

Starting with `score = 0`, apply the following algorithm:

- Choose the smallest integer of the array that is not marked. If there is a tie, choose the one with the smallest index.
- Add the value of the chosen integer to `score`.
- Mark **the chosen element and its two adjacent elements if they exist**.
- Repeat until all the array elements are marked.

Return _the score you get after applying the above algorithm_.

**Example 1:**

- **Input:** nums = [2,1,3,4,5,2]
- **Output:** 7
- **Explanation:** We mark the elements as follows:
  - 1 is the smallest unmarked element, so we mark it and its two adjacent elements: [2,1,3,4,5,2].
  - 2 is the smallest unmarked element, so we mark it and its left adjacent element: [2,1,3,4,5,2].
  - 4 is the only remaining unmarked element, so we mark it: [2,1,3,4,5,2].
    Our score is 1 + 2 + 4 = 7.

**Example 2:**

- **Input:** nums = [2,3,5,1,3,2]
- **Output:** 5
- **Explanation:** We mark the elements as follows:
  - 1 is the smallest unmarked element, so we mark it and its two adjacent elements: [2,3,5,1,3,2].
  - 2 is the smallest unmarked element, since there are two of them, we choose the left-most one, so we mark the one at index 0 and its right adjacent element: [2,3,5,1,3,2].
  - 2 is the only remaining unmarked element, so we mark it: [2,3,5,1,3,2].
    Our score is 1 + 2 + 2 = 5.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>


**Hint:**
1. Try simulating the process of marking the elements and their adjacent.
2. If there is an element that was already marked, then you skip it.



**Solution:**

We can simulate the marking process efficiently by using a sorted array or priority queue to keep track of the smallest unmarked element. So we can use the following approach:

### Plan:

1. **Input Parsing**: Read the array `nums` and initialize variables for the score and marking status.
2. **Heap (Priority Queue)**:
   - Use a **min-heap** to efficiently extract the smallest unmarked element in each step.
   - Insert each element into the heap along with its index `(value, index)` to manage ties based on the smallest index.
3. **Marking Elements**:
   - Maintain a `marked` array to track whether an element and its adjacent ones are marked.
   - When processing an element from the heap, skip it if it is already marked.
   - Mark the current element and its two adjacent elements (if they exist).
   - Add the value of the current element to the score.
4. **Repeat**: Continue until all elements are marked.
5. **Output**: Return the accumulated score.

Let's implement this solution in PHP: **[2593. Find Score of an Array After Marking All Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002593-find-score-of-an-array-after-marking-all-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findScore($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [2, 1, 3, 4, 5, 2];
$nums2 = [2, 3, 5, 1, 3, 2];

echo findScore($nums1) . "\n"; // Output: 7
echo findScore($nums2) . "\n"; // Output: 5
?>
```

### Explanation:

1. **Heap Construction**:
   - The `usort` function sorts the array based on values, and by index when values are tied.
   - This ensures that we always process the smallest unmarked element with the smallest index.

2. **Marking Logic**:
   - For each unmarked element, we mark it and its adjacent elements using the `marked` array.
   - This ensures that we skip previously marked elements efficiently.

3. **Time Complexity**:
   - Sorting the heap: _**O(n log n)**_
   - Processing the heap: _**O(n)**_
   - Overall: _**O(n log n)**_, which is efficient for the given constraints.

4. **Space Complexity**:
   - Marked array: _**O(n)**_
   - Heap: _**O(n)**_
   - Total: _**O(n)**_

This solution meets the constraints and works efficiently for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
