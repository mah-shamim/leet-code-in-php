2054\. Two Best Non-Overlapping Events

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Dynamic Programming`, `Sorting`, `Heap (Priority Queue)`

You are given a **0-indexed** 2D integer array of `events` where <code>events[i] = [startTime<sub>i</sub>, endTime<sub>i</sub>, value<sub>i</sub>]</code>. The <code>i<sup>th</sup></code> event starts at <code>startTime<sub>i</sub></code> and ends at <code>endTime<sub>i</sub></code>, and if you attend this event, you will receive a value of <code>value<sub>i</sub></code>. You can choose **at most two non-overlapping** events to attend such that the sum of their values is **maximized**.

Return this **maximum** sum.

Note that the start time and end time is **inclusive**: that is, you cannot attend two events where one of them starts and the other ends at the same time. More specifically, if you attend an event with end time `t`, the next event must start at or after `t + 1`.

**Example 1:**

![picture5](https://assets.leetcode.com/uploads/2021/09/21/picture5.png)

- **Input:** events = [[1,3,2],[4,5,2],[2,4,3]]
- **Output:** 4
- **Explanation:** Choose the green events, 0 and 1 for a sum of 2 + 2 = 4.

**Example 2:**

![picture1](https://assets.leetcode.com/uploads/2021/09/21/picture1.png)

- **Input:** events = [[1,3,2],[4,5,2],[1,5,5]]
- **Output:** 5
- **Explanation:** Choose event 2 for a sum of 5.


**Example 3:**

![picture3](https://assets.leetcode.com/uploads/2021/09/21/picture3.png)

- **Input:** events = [[1,5,3],[1,5,1],[6,6,5]]
- **Output:** 8
- **Explanation:** Choose events 0 and 2 for a sum of 3 + 5 = 8.



**Constraints:**

- <code>2 <= events.length <= 10<sup>5</sup></code>
- `events[i].length == 3`
- <code>1 <= startTime<sub>i</sub> <= endTime<sub>i</sub> <= 10<sup>9</sup></code>
- <code>1 <= value<sub>i</sub> <= 10<sup>6</sup></code>


**Hint:**
1. How can sorting the events on the basis of their start times help? How about end times?
2. How can we quickly get the maximum score of an interval not intersecting with the interval we chose?



**Solution:**

We can use the following approach:

### Approach
1. **Sort Events by End Time**:
   - Sorting helps us efficiently find non-overlapping events using binary search.

2. **Binary Search for Non-Overlapping Events**:
   - Use binary search to find the latest event that ends before the current event's start time. This ensures non-overlapping.

3. **Dynamic Programming with Max Tracking**:
   - While iterating through the sorted events, maintain the maximum value of events up to the current one. This allows us to quickly compute the maximum sum of two events.

4. **Iterate and Calculate the Maximum Sum**:
   - For each event, calculate the possible sum using:
      - Only the current event.
      - The current event combined with the best non-overlapping event found using binary search.

Let's implement this solution in PHP: **[2054. Two Best Non-Overlapping Events](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002054-two-best-non-overlapping-events/solution.php)**

```php
<?php
/**
 * @param Integer[][] $events
 * @return Integer
 */
function maxTwoEvents($events) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage:
$events1 = [[1, 3, 2], [4, 5, 2], [2, 4, 3]];
$events2 = [[1, 3, 2], [4, 5, 2], [1, 5, 5]];
$events3 = [[1, 5, 3], [1, 5, 1], [6, 6, 5]];

echo maxTwoEvents($events1) . "\n"; // Output: 4
echo maxTwoEvents($events2) . "\n"; // Output: 5
echo maxTwoEvents($events3) . "\n"; // Output: 8
?>
```

### Explanation:

1. **Sorting**:
   - The events are sorted by their end time, which allows for efficient searching of the last non-overlapping event.

2. **Binary Search**:
   - For each event, binary search determines the latest event that ends before the current event starts.

3. **Max Tracking**:
   - We maintain an array `maxUpTo`, which stores the maximum value of events up to the current index. This avoids recalculating the maximum for earlier indices.

4. **Max Sum Calculation**:
   - For each event, calculate the sum of its value and the best non-overlapping event's value. Update the global maximum sum accordingly.

### Complexity Analysis
- **Sorting**: _**O(n log n)**_
- **Binary Search for Each Event**: _**O(log n)**_, repeated _**n**_ times → _**O(n log n)**_
- **Overall**: _**O(n log n)**_

This solution is efficient and works well within the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
