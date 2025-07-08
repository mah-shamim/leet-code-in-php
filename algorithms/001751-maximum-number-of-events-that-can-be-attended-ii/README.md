1751\. Maximum Number of Events That Can Be Attended II

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Dynamic Programming`, `Sorting`

You are given an array of `events` where <code>events[i] = [startDay<sub>i</sub>, endDay<sub>i</sub>, value<sub>i</sub>]</code>. The <code>i<sup>th</sup></code> event starts at <code>startDay<sub>i</sub></code> and ends at <code>endDay<sub>i</sub></code>, and if you attend this event, you will receive a value of <code>value<sub>i</sub></code>. You are also given an integer `k` which represents the maximum number of events you can attend.

You can only attend one event at a time. If you choose to attend an event, you must attend the **entire** event. Note that the end day is **inclusive**: that is, you cannot attend two events where one of them starts and the other ends on the same day.

Return _the **maximum sum** of values that you can receive by attending events_.

**Example 1:**

![screenshot-2021-01-11-at-60048-pm](https://assets.leetcode.com/uploads/2021/01/10/screenshot-2021-01-11-at-60048-pm.png)

- **Input:** events = [[1,2,4],[3,4,3],[2,3,1]], k = 2
- **Output:** 7
- **Explanation:** Choose the green events, 0 and 1 (0-indexed) for a total value of 4 + 3 = 7.

**Example 2:**

![screenshot-2021-01-11-at-60150-pm](https://assets.leetcode.com/uploads/2021/01/10/screenshot-2021-01-11-at-60150-pm.png)

- **Input:** events = [[1,2,4],[3,4,3],[2,3,10]], k = 2
- **Output:** 10
- **Explanation:** Choose event 2 for a total value of 10.
  Notice that you cannot attend any other event as they overlap, and that you do not have to attend k events.

**Example 3:**

![screenshot-2021-01-11-at-60703-pm](https://assets.leetcode.com/uploads/2021/01/10/screenshot-2021-01-11-at-60703-pm.png)

- **Input:** events = [[1,1,1],[2,2,2],[3,3,3],[4,4,4]], k = 3
- **Output:** 9
- **Explanation:** Although the events do not overlap, you can only attend 3 events. Pick the highest valued three.

**Constraints:**

- 1 <= k <= events.length
- <code>1 <= k * events.length <= 10<sup>6</sup></code>
- <code>1 <= startDay<sub>i</sub> <= endDay<sub>i</sub> <= 10<sup>9</sup></code>
- <code>1 <= value<sub>i</sub> <= 10<sup>6</sup></code>


**Hint:**
1. Sort the events by its startTime.
2. For every event, you can either choose it and consider the next event available, or you can ignore it. You can efficiently find the next event that is available using binary search.


**Similar Questions:**
1. [1353. Maximum Number of Events That Can Be Attended](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001353-maximum-number-of-events-that-can-be-attended)
2. [2008. Maximum Earnings From Taxi](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002008-maximum-earnings-from-taxi)
3. [2054. Two Best Non-Overlapping Events](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002054-two-best-non-overlapping-events/solution.php)
4. [2402. Meeting Rooms III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002402-meeting-rooms-iii)






**Solution:**

We need to maximize the sum of values obtained by attending at most `k` non-overlapping events. Each event has a start day, end day, and a value. The key challenge is to select events such that no two events overlap, and the sum of their values is maximized while attending at most `k` events.

### Approach
1. **Sort Events by End Day**: Sorting events by their end day helps in efficiently finding non-overlapping events. This is because, for any event, the next event that starts after the current event ends can be found using binary search.
2. **Precompute Previous Indices**: For each event, precompute the index of the last event that ends before the start of the current event. This allows quick lookup during dynamic programming to determine which events can be attended before the current event.
3. **Dynamic Programming (DP) Setup**: Use a 2D DP array where `dp[i][j]` represents the maximum value achievable by considering the first `i+1` events (sorted by end day) and attending at most `j` events.
4. **DP Initialization**: Initialize the DP array such that for the first event, all entries for `j >= 1` are set to the value of the first event.
5. **DP Transition**:
   - **Skip Current Event**: The value remains the same as the previous event for the same count of events.
   - **Take Current Event**: Add the value of the current event to the value of the last compatible event (found via precomputed indices) with `j-1` events.
6. **Result Extraction**: The result is the maximum value found in the last row of the DP array for all counts from `0` to `k`.

Let's implement this solution in PHP: **[1751. Maximum Number of Events That Can Be Attended II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001751-maximum-number-of-events-that-can-be-attended-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $events
 * @param Integer $k
 * @return Integer
 */
function maxValue($events, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$events1 = [[1,2,4],[3,4,3],[2,3,1]];
$k1 = 2;
echo maxValue($events1, $k1) . PHP_EOL; // Output: 7

$events2 = [[1,2,4],[3,4,3],[2,3,10]];
$k2 = 2;
echo maxValue($events2, $k2) . PHP_EOL; // Output: 10

$events3 = [[1,1,1],[2,2,2],[3,3,3],[4,4,4]];
$k3 = 3;
echo maxValue($events3, $k3) . PHP_EOL; // Output: 9
?>
```

### Explanation:

1. **Sorting Events**: The events are sorted by their end day to facilitate efficient binary search for non-overlapping events.
2. **Precomputing Previous Indices**: For each event, we determine the last event that ends before the current event starts using binary search. This helps in quickly accessing compatible events during the DP process.
3. **Dynamic Programming Initialization**: The DP array is initialized with the value of the first event for all counts `j >= 1` since attending the first event is the only option when considering the first event.
4. **DP Transition**: For each event and each possible count of events (`j` from 1 to `k`), we compute the maximum value by either skipping the current event or taking it. If we take the current event, we add its value to the value obtained from the last compatible event with `j-1` events.
5. **Result Extraction**: The result is derived by examining the last row of the DP array, which contains the maximum values achievable by considering all events for counts from `0` to `k`.

This approach efficiently leverages sorting, binary search, and dynamic programming to solve the problem within feasible time complexity, making it suitable for large input sizes as specified in the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**