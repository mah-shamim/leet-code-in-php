2406\. Divide Intervals Into Minimum Number of Groups

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Greedy`, `Sorting`, `Heap (Priority Queue)`, `Prefix Sum`

You are given a 2D integer array `intervals` where `intervals[i] = [lefti, righti]` represents the inclusive interval <code>[left<sub>i</sub>, right<sub>i</sub>]</code>.

You have to divide the intervals into one or more **groups** such that each interval is in **exactly** one group, and no two intervals that are in the same group **intersect** each other.

Return _the **minimum** number of groups you need to make_.

Two intervals **intersect** if there is at least one common number between them. For example, the intervals `[1, 5]` and `[5, 8]` intersect.

**Example 1:**

- **Input:** intervals = [[5,10],[6,8],[1,5],[2,3],[1,10]]
- **Output:** 3
- **Explanation:** We can divide the intervals into the following groups:
  - Group 1: [1, 5], [6, 8].
  - Group 2: [2, 3], [5, 10].
  - Group 3: [1, 10].\
    It can be proven that it is not possible to divide the intervals into fewer than 3 groups.

**Example 2:**

- **Input:** intervals = [[1,3],[5,6],[8,10],[11,13]]
- **Output:** 1
- **Explanation:** None of the intervals overlap, so we can put all of them in one group.

**Constraints:**

- <code>1 <= intervals.length <= 10<sup>5</sup></code>
- `intervals[i].length == 2`
- <code>1 <= lefti <= righti <= 10<sup>6</sup></code>


**Hint:**
1. Can you find a different way to describe the question?
2. The minimum number of groups we need is equivalent to the maximum number of intervals that overlap at some point. How can you find that?



**Solution:**

To solve the problem of dividing intervals into the minimum number of groups such that no two intervals in the same group intersect, we can interpret it in a different way:

### Explanation:
The minimum number of groups needed is equivalent to the **maximum number of intervals that overlap at any point in time**. This approach is based on the fact that if multiple intervals overlap at a particular point, each one will require a separate group.

### Approach:
1. **Sorting Events:** We can convert each interval into two events:
    - A start event (`+1`) at the `left` point.
    - An end event (`-1`) at the `right + 1` point (to ensure the interval is closed).

   These events will help track when intervals start and stop overlapping.

2. **Sweep Line Algorithm:** Using a sweep line approach:
    - Sort all events based on their time.
    - Use a counter to track the number of ongoing intervals at each point.
    - Keep track of the maximum count of overlapping intervals as we process each event.

3. **Result:** The maximum count of overlapping intervals at any point is the minimum number of groups required.

Let's implement this solution in PHP: **[2406. Divide Intervals Into Minimum Number of Groups](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002406-divide-intervals-into-minimum-number-of-groups/solution.php)**

```php
<?php
/**
 * @param Integer[][] $intervals
 * @return Integer
 */
function minGroups($intervals) {
        ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$intervals1 = [[5, 10], [6, 8], [1, 5], [2, 3], [1, 10]];
echo minGroups($intervals1); // Output: 3

$intervals2 = [[1, 3], [5, 6], [8, 10], [11, 13]];
echo minGroups($intervals2); // Output: 1
?>
```

### Explanation of the Code:

1. **Events Array:** We build an array of events where each interval contributes two events (`[start, +1]` and `[end+1, -1]`).
2. **Sorting:** We sort these events. When two events have the same time, we prioritize ending intervals (`-1`) over starting intervals (`+1`).
3. **Sweep Line Processing:** We iterate through sorted events, adjusting the `currentGroups` as intervals start or end:
    - Increment for `+1` (start of an interval).
    - Decrement for `-1` (end of an interval).
4. **Track Maximum:** The `maxGroups` stores the peak number of simultaneous overlapping intervals, which is our answer.

### Complexity:
- **Time Complexity:** _**O(n log n)**_ due to sorting of events.
- **Space Complexity:** _**O(n)**_ for storing the events.

This solution efficiently determines the minimum number of groups required by finding the peak number of overlapping intervals.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
