881\. Boats to Save People

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Greedy`, `Sorting`

You are given an array `people` where` people[i]` is the weight of the i<sup>th</sup> person, and an infinite number of boats where each boat can carry a maximum weight of `limit`. Each boat carries at most two people at the same time, provided the sum of the weight of those people is at most `limit`.

Return _the minimum number of boats to carry every given person._

**Example 1:**

- **Input:** people = [1,2], limit = 3
- **Output:** 1
- **Explanation:** 1 boat (1, 2)

**Example 2:**

- **Input:** people = [3,2,2,1], limit = 3
- **Output:** 3
- **Explanation:** 3 boats (1, 2), (2) and (3)

**Example 3:**

- **Input:** people = [3,5,3,4], limit = 5
- **Output:** 4
- **Explanation:** 4 boats (3), (3), (4), (5)

**Constraints:**

*   <code>1 <= people.length <= 5 * 10<sup>4</sup></code>
*   <code>1 <= people[i] <= limit <= 3 * 10<sup>4</sup></code>



**Solution:**

We can use a **two-pointer** greedy strategy combined with sorting. Here's the detailed approach:

1. **Sort the Array**:
    - First, sort the `people` array. Sorting helps us to easily pair the lightest and heaviest person together in one boat, if possible.

2. **Two Pointer Strategy**:
    - Use two pointers: one starting from the lightest person (`left`), and the other starting from the heaviest person (`right`).
    - Try to pair the heaviest person (`right`) with the lightest person (`left`). If the sum of their weights is less than or equal to the limit, they can share the same boat. Move both pointers (`left++` and `right--`).
    - If they cannot be paired, send the heaviest person alone on a boat and move only the `right` pointer (`right--`).

3. **Count Boats**:
    - Each time we process a person (or pair), we count it as one boat.
    - Continue until all people are assigned to boats.

Let's implement this solution in PHP: **[881. Boats to Save People](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000881-boats-to-save-people/solution.php)**

```php
<?php
function numRescueBoats($people, $limit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numRescueBoats([1, 2], 3); // Output: 1
echo "\n";
echo numRescueBoats([3, 2, 2, 1], 3); // Output: 3
echo "\n";
echo numRescueBoats([3, 5, 3, 4], 5); // Output: 4
?>
```

### Explanation:

1. **Sorting**:
    - For the example `[3, 2, 2, 1]`, after sorting, it becomes `[1, 2, 2, 3]`.

2. **Two-pointer logic**:
    - Start with `left = 0` (lightest person, weight 1) and `right = 3` (heaviest person, weight 3).
    - Check if `people[0] + people[3]` (1 + 3) is less than or equal to the limit (3). It is not, so send the heaviest person alone and decrement `right` to 2.
    - Now check `people[0] + people[2]` (1 + 2), which fits the limit. Pair them together and move both pointers (`left = 1`, `right = 1`).
    - The remaining person (weight 2) takes their own boat.

3. **Boat Counting**:
    - In each iteration, a boat is used whether we pair two people or send one person alone. This guarantees we use the minimum number of boats.

### Time Complexity:

- **Sorting the array**: Sorting takes `O(n log n)` where `n` is the number of people.
- **Two-pointer traversal**: The two-pointer approach runs in `O(n)` because each pointer moves at most `n` times.

Thus, the overall time complexity is `O(n log n)` due to sorting.

### Space Complexity:
- The space complexity is `O(1)` because no extra space is used beyond a few pointers and variables.

### Example Walkthrough:

For the input:
```php
$people = [3,5,3,4]; $limit = 5;
```

1. After sorting: `[3, 3, 4, 5]`.
2. Initial pointers: `left = 0`, `right = 3` (pointing at 5).
3. Check if `people[0] + people[3]` (3 + 5) ≤ 5 → False. The heaviest person (5) goes alone. `right--`.
4. Check if `people[0] + people[2]` (3 + 4) ≤ 5 → False. The next heaviest person (4) goes alone. `right--`.
5. Check if `people[0] + people[1]` (3 + 3) ≤ 5 → False. Each person (3) goes alone.

Thus, the final output is `4` boats.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
