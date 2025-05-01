3208\. Alternating Groups II

**Difficulty:** Medium

**Topics:** `Array`, `Sliding Window`

There is a circle of red and blue tiles. You are given an array of integers `colors` and an integer `k`. The color of tile `i` is represented by `colors[i]`:

- `colors[i] == 0` means that tile `i` is **red**.
- `colors[i] == 1` means that tile `i` is **blue**.

An **alternating** group is every `k` contiguous tiles in the circle with **alternating** colors (each tile in the group except the first and last one has a different color from its **left** and **right** tiles).

Return the number of **alternating** groups.

**Note** that since `colors` represents a **circle**, the **first** and the **last** tiles are considered to be next to each other.

**Example 1:**

- **Input:** colors = [0,1,0,1,0], k = 3
- **Output:** 3
- **Explanation:**

![screenshot-2024-05-28-183519](https://assets.leetcode.com/uploads/2024/06/19/screenshot-2024-05-28-183519.png)
- **Alternating groups:**

![screenshot-2024-05-28-182448](https://assets.leetcode.com/uploads/2024/05/28/screenshot-2024-05-28-182448.png)
![screenshot-2024-05-28-182844](https://assets.leetcode.com/uploads/2024/05/28/screenshot-2024-05-28-182844.png)
![screenshot-2024-05-28-183057](https://assets.leetcode.com/uploads/2024/05/28/screenshot-2024-05-28-183057.png)

**Example 2:**

- **Input:** colors = [0,1,0,0,1,0,1], k = 6
- **Output:** 2
- **Explanation:**

![screenshot-2024-05-28-183907](https://assets.leetcode.com/uploads/2024/06/19/screenshot-2024-05-28-183907.png)
- **Alternating groups:**

![screenshot-2024-05-28-184128](https://assets.leetcode.com/uploads/2024/06/19/screenshot-2024-05-28-184128.png)
![screenshot-2024-05-28-184240](https://assets.leetcode.com/uploads/2024/06/19/screenshot-2024-05-28-184240.png)


**Example 3:**

- **Input:** colors = [1,1,0,1], k = 4
- **Output:** 0
- **Explanation:**

![screenshot-2024-05-28-184516](https://assets.leetcode.com/uploads/2024/06/19/screenshot-2024-05-28-184516.png)



**Constraints:**

- <code>3 <= colors.length <= 10<sup>5</sup></code>
- `0 <= colors[i] <= 1`
- `3 <= k <= colors.length`


**Hint:**
1. Try to find a tile that has the same color as its next tile (if it exists).
2. Then try to find maximal alternating groups by starting a single for loop from that tile.



**Solution:**

We need to count the number of alternating groups of size `k` in a circular array of colors. An alternating group is defined as a sequence of `k` contiguous tiles where each tile (except the first and last) has a different color from both its left and right neighbors.

### Approach
1. **Valid Array Construction**: First, we construct a `valid` array where each element is `1` if the corresponding consecutive elements in the original `colors` array are different, and `0` otherwise. This helps us identify positions where consecutive elements do not form an alternating pattern.
2. **Check All Valid**: If all elements in the `valid` array are `1`, it means the entire array is already alternating, and every possible window of size `k` is valid. In this case, the answer is simply the length of the array.
3. **Run Length Encoding**: If there are invalid segments (indicated by `0` in the `valid` array), we split the `valid` array into runs of consecutive `1`s and `0`s. This helps us identify valid segments where consecutive elements alternate.
4. **Circular Array Handling**: Since the array is circular, we need to handle the case where the first and last runs of `1`s can be merged if they are adjacent in the circular arrangement.
5. **Count Valid Windows**: For each run of `1`s, calculate the number of valid windows of size `k-1` (since each window of size `k` in the original array corresponds to a window of size `k-1` in the `valid` array).

Let's implement this solution in PHP: **[3208. Alternating Groups II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003208-alternating-groups-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $colors
 * @param Integer $k
 * @return Integer
 */
function numberOfAlternatingGroups($colors, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfAlternatingGroups([0,1,0,1,0], 3) . "\n"; // Output: 3
echo numberOfAlternatingGroups([0,1,0,0,1,0,1], 6) . "\n"; // Output: 2
echo numberOfAlternatingGroups([1,1,0,1], 4) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Valid Array Construction**: The `valid` array is constructed to mark positions where consecutive elements in the original array are different, which helps in quickly identifying valid segments.
2. **Check All Valid**: If all elements in the `valid` array are `1`, every possible window of size `k` is valid, and the result is the length of the array.
3. **Run Length Encoding**: This step identifies contiguous segments of valid and invalid positions, allowing efficient processing of valid segments.
4. **Circular Array Handling**: Merging the first and last valid segments if they wrap around the array ensures correct handling of circularity.
5. **Count Valid Windows**: For each valid segment, the number of valid windows of size `k` is calculated based on the segment length, ensuring efficient computation using sliding window principles.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**