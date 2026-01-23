3510\. Minimum Pair Removal to Sort Array II

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Linked List`, `Heap (Priority Queue)`, `Simulation`, `Doubly-Linked List`, `Ordered Set`, `Weekly Contest 444`

Given an array `nums`, you can perform the following operation any number of times:

- Select the **adjacent** pair with the **minimum** sum in `nums`. If multiple such pairs exist, choose the leftmost one.
- Replace the pair with their sum.

Return the **minimum number of operations** needed to make the array **non-decreasing**.

An array is said to be **non-decreasing** if each element is greater than or equal to its previous element (if it exists).

**Example 1:**

- **Input:** nums = [5,2,3,1]
- **Output:** 2
- **Explanation:**
  - The pair `(3,1)` has the minimum sum of `4`. After replacement, `nums = [5,2,4]`.
  - The pair `(2,4)` has the minimum sum of `6`. After replacement, `nums = [5,6]`.
  - The array `nums` became non-decreasing in two operations.

**Example 2:**

- **Input:** nums = [1,2,2]
- **Output:** 0
- **Explanation:** The array `nums` is already sorted.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `-10⁹ <= nums[i] <= 10⁹`



**Hint:**
1. We can perform the simulation using data structures.
2. Maintain an array index and value using a map since we need to find the next and previous ones.
3. Maintain the indices to be removed using a hash set.
4. Maintain the neighbor sums with the smaller indices (set or priority queue).
5. Keep the 3 structures in sync during the removals.






**Solution:**

We need to minimize operations to make an array non-decreasing by repeatedly merging adjacent pairs with minimum sum (leftmost if ties). Key observations:

1. **Non-decreasing condition**: Final array must satisfy `nums[i] <= nums[i+1]` for all i
2. **Operation selection**: Always choose the pair with minimum sum (leftmost if multiple)
3. **Problem size**: Up to 10⁵ elements, so O(n log n) or O(n) needed
4. **Challenge**: When merging elements, the new element affects adjacent pairs

### Approach:

This solution uses a combination of data structures to efficiently simulate the pair merging process while maintaining the ability to:
- Quickly find the pair with minimum sum
- Update adjacent relationships after merges
- Track when the array becomes non-decreasing

### Key Data Structures:

1. **Linked List Structure** (`next`, `prev` arrays)
   - Maintains the current order of active elements
   - Allows O(1) updates when merging pairs

2. **Min-Heap** (`SplMinHeap`)
   - Stores pairs as `[sum, left_index]`
   - Pairs are compared by sum first, then left_index (for tie-breaking)
   - Efficiently finds the minimum sum pair in O(log n)

3. **Lazy Deletion**
   - Uses a `removed` array to mark deleted elements
   - When popping from heap, validate that the pair is still valid
   - Avoids complex heap deletion operations

4. **Decreasing Pairs Counter**
   - Tracks number of adjacent pairs where `nums[i] > nums[i+1]`
   - Used to determine when array becomes non-decreasing
   - Updated incrementally during merges

Let's implement this solution in PHP: **[3510. Minimum Pair Removal to Sort Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003510-minimum-pair-removal-to-sort-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumPairRemoval(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumPairRemoval([5,2,3,1]) . "\n";          // Output: 2
echo minimumPairRemoval([1,2,2]) . "\n";            // Output: 0
?>
```

### Explanation:

### Step-by-Step Process:

1. **Initialization**:
   - Create doubly-linked list of indices using `next` and `prev` arrays
   - Build min-heap with all initial adjacent pairs
   - Count initial decreasing pairs to determine if array is already sorted

2. **Main Loop** (while decreasing pairs exist):
   - Extract the valid minimum-sum pair from heap (with lazy deletion)
   - Merge the pair by summing values and updating the left element
   - Remove the right element from the linked list structure
   - Update decreasing pairs count for affected relationships
   - Push new adjacent pairs into heap
   - Increment operation count

3. **Termination**:
   - Loop ends when no decreasing pairs remain
   - Return total operations performed

### Key Observations:

1. **Lazy Heap Deletion**: Instead of removing invalid pairs from heap, we skip them when popping. This is efficient because:
   - Each invalid pair is discarded once
   - Total heap operations remain O(n log n)

2. **Efficient Decreasing Pairs Tracking**: Only update counters for affected pairs after merge:
   - Before merge: check `(prev[left], left)`, `(left, right)`, `(right, next[right])`
   - After merge: check `(prev[left], new_left)` and `(new_left, next[right])`

3. **Leftmost Tie-Break**: The heap naturally handles this because we store `[sum, left_index]` and `SplMinHeap` compares arrays lexicographically.

### Complexity Analysis:

**Time Complexity:** O(n log n)
- Each element can be merged at most once
- Heap operations (insert/extract) are O(log n)
- Total operations: O(n log n)

**Space Complexity:** O(n)
- Storage for linked list pointers: O(n)
- Heap can contain up to O(n) elements

### Edge Cases Handled:
- Already sorted arrays (return 0 immediately)
- Single element arrays
- Negative values (handled by normal arithmetic)
- Multiple equal minimum sums (leftmost chosen via tie-break)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**