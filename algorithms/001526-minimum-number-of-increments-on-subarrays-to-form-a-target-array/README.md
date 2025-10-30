1526\. Minimum Number of Increments on Subarrays to Form a Target Array

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Stack`, `Greedy`, `Monotonic Stack`, `Biweekly Contest 31`

You are given an integer array `target`. You have an integer array `initial` of the same size as `target` with all elements initially zeros.

In one operation you can choose **any** subarray from `initial` and increment each value by one.

Return _the minimum number of operations to form a `target` array from `initial`_.

The test cases are generated so that the answer fits in a 32-bit integer.

**Example 1:**

- **Input:** target = [1,2,3,2,1]
- **Output:** 3
- **Explanation:** We need at least 3 operations to form the target array from the initial array.
  [<ins>0</ins>,<ins>0</ins>,<ins>0</ins>,<ins>0</ins>,<ins>0</ins>] increment 1 from index 0 to 4 (inclusive).
  [1,<ins>1</ins>,<ins>1</ins>,<ins>1</ins>,1] increment 1 from index 1 to 3 (inclusive).
  [1,2,<ins>2</ins>,2,1] increment 1 at index 2.
  [1,2,3,2,1] target array is formed.

**Example 2:**

- **Input:** target = [3,1,1,2]
- **Output:** 4
- **Explanation:** [<ins>0</ins>,<ins>0</ins>,<ins>0</ins>,<ins>0</ins>] -> [1,1,1,<ins>1</ins>] -> [<ins>1</ins>,1,1,2] -> [<ins>2</ins>,1,1,2] -> [3,1,1,2]

**Example 3:**

- **Input:** target = [3,1,5,4,2]
- **Output:** 7
- **Explanation:** [<ins>0</ins>,<ins>0</ins>,<ins>0</ins>,<ins>0</ins>,<ins>0</ins>] -> [<ins>1</ins>,1,1,1,1] -> [<ins>2</ins>,1,1,1,1] -> [3,1,<ins>1</ins>,<ins>1</ins>,<ins>1</ins>] -> [3,1,<ins>2</ins>,<ins>2</ins>,2] -> [3,1,<ins>3</ins>,<ins>3</ins>,2] -> [3,1,<ins>4</ins>,4,2] -> [3,1,5,4,2].

**Constraints:**

- `1 <= target.length <= 10⁵`
- `1 <= target[i] <= 10⁵`



**Hint:**
1. For a given range of values in target, an optimal strategy is to increment the entire range by the minimum value. The minimum in a range could be obtained with Range minimum query or Segment trees algorithm.






**Solution:**

We need to determine the minimum number of operations required to transform an initial array of zeros into a given target array by incrementing any subarray by one in each operation. The key insight is that each element in the target array can be achieved by considering the differences between consecutive elements, which helps in counting the necessary operations efficiently.

### Approach
1. **Problem Analysis**: The problem requires transforming an array of zeros into the target array using the minimum number of operations where each operation increments any subarray by one. The challenge is to find an efficient way to count these operations without simulating each step, which would be computationally expensive.
2. **Key Insight**: The minimum number of operations can be determined by considering how the target array changes between consecutive elements. Specifically, if the current element in the target array is greater than the previous one, the difference between them represents additional operations needed starting from the current position. If the current element is less than or equal to the previous one, no additional operations are needed beyond those already accounted for.
3. **Algorithm Selection**: We initialize the total operations to the first element of the target array. Then, for each subsequent element, if it is greater than the previous element, we add the difference to the total operations. This approach efficiently accumulates the necessary operations by leveraging the differences between consecutive elements.

Let's implement this solution in PHP: **[1526. Minimum Number of Increments on Subarrays to Form a Target Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001526-minimum-number-of-increments-on-subarrays-to-form-a-target-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $target
 * @return Integer
 */
function minNumberOperations($target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minNumberOperations([1,2,3,2,1]) . PHP_EOL; // Output: 3
echo minNumberOperations([3,1,1,2]) . PHP_EOL;   // Output: 4
echo minNumberOperations([3,1,5,4,2]) . PHP_EOL; // Output: 7
?>
```

### Explanation:

1. **Initialization**: Start by setting the number of operations to the value of the first element in the target array. This is because at least that many operations are needed to reach the first element's value starting from zero.
2. **Iterate Through Array**: For each subsequent element in the target array, check if it is greater than the previous element. If it is, add the difference between the current and previous element to the total operations. This difference represents the additional operations needed to increase the current element to its target value beyond what was already achieved by previous operations.
3. **Return Result**: After processing all elements, the accumulated total operations give the minimum number of operations required to form the target array from the initial array of zeros.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**