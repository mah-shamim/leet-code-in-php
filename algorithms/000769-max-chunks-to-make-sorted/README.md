769\. Max Chunks To Make Sorted

**Difficulty:** Medium

**Topics:** `Array`, `Stack`, `Greedy`, `Sorting`, `Monotonic Stack`

You are given an integer array `arr` of length `n` that represents a permutation of the integers in the range `[0, n - 1]`.

We split `arr` into some number of **chunks** (i.e., partitions), and individually sort each chunk. After concatenating them, the result should equal the sorted array.

Return _the largest number of chunks we can make to sort the array._

**Example 1:**

- **Input:** arr = [4,3,2,1,0]
- **Output:** 1
- **Explanation:**
  Splitting into two or more chunks will not return the required result.
  For example, splitting into [4, 3], [2, 1, 0] will result in [3, 4, 0, 1, 2], which isn't sorted.

**Example 2:**

- **Input:** arr = [1,0,2,3,4]
- **Output:** 4
- **Explanation:**
  We can split into two chunks, such as [1, 0], [2, 3, 4].
  However, splitting into [1, 0], [2], [3], [4] is the highest number of chunks possible.



**Constraints:**

- `n == arr.length`
- `1 <= n <= 10`
- `0 <= arr[i] < n`
- All the elements of `arr` are **unique**.


**Hint:**
1. The first chunk can be found as the smallest k for which A[:k+1] == [0, 1, 2, ...k]; then we repeat this process.



**Solution:**

We need to find the largest number of chunks that can be formed such that each chunk can be sorted individually, and when concatenated, the result is the sorted version of the entire array.

### Approach:
1. **Key Observation:**
   - The array is a permutation of integers from `0` to `n-1`. The idea is to traverse the array and find positions where the chunks can be separated.
   - A chunk can be sorted if, for all indices within the chunk, the maximum element up to that point does not exceed the minimum element after that point in the original sorted array.

2. **Strategy:**
   - Track the maximum value encountered as you traverse from left to right.
   - At each index `i`, check if the maximum value up to `i` is less than or equal to `i`. If this condition holds, it means you can split the array at that index because the left part can be sorted independently.

3. **Steps:**
   - Iterate over the array while maintaining the running maximum.
   - Whenever the running maximum equals the current index, a chunk can be made.
   - Count the number of such chunks.

Let's implement this solution in PHP: **[769. Max Chunks To Make Sorted](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000769-max-chunks-to-make-sorted/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function maxChunksToSorted($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$arr1 = [4, 3, 2, 1, 0];
$arr2 = [1, 0, 2, 3, 4];

echo maxChunksToSorted($arr1); // Output: 1
echo "\n";
echo maxChunksToSorted($arr2); // Output: 4
?>
```

### Explanation:

1. **Initialization:**
   - We start with `maxSoFar = -1` to ensure that we correctly track the maximum value in the array as we traverse it.
   - `chunks = 0` keeps track of the number of chunks that can be formed.

2. **Loop:**
   - We loop through each element in the array.
   - For each element, we update the `maxSoFar` to be the maximum value between the current element and the previously seen maximum.
   - If `maxSoFar == i`, it means the array up to index `i` can be independently sorted and this is a valid chunk.
   - We increment the chunk count each time this condition holds true.

3. **Return:**
   - Finally, the total number of chunks is returned.

### Time Complexity:
- **Time Complexity:** _**O(n)**_, where `n` is the length of the array. We only make one pass through the array.
- **Space Complexity:** _**O(1)**_, as we are only using a few variables to store intermediate results.

### Example Walkthrough:

For `arr = [1, 0, 2, 3, 4]`:
- At index `0`, the maximum value encountered so far is `1`. We can't split here.
- At index `1`, the maximum value is `1`, which matches the current index `1`, so we can split into a chunk.
- At index `2`, the maximum value is `2`, and it matches the index `2`, so we split again.
- At index `3`, the maximum value is `3`, and it matches the index `3`, so we split again.
- At index `4`, the maximum value is `4`, and it matches the index `4`, so we split again.

Thus, the output for this case is `4` because we can split it into 4 chunks.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
