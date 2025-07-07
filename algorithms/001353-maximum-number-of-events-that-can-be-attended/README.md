1353\. Maximum Number of Events That Can Be Attended

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`, `Heap (Priority Queue)`

You are given an array of `events` where <code>events[i] = [startDay<sub>i</sub>, endDay<sub>i</sub>]</code>. Every event `i` starts at <code>startDay<sub>i</sub></code> and ends at <code>endDay<sub>i</sub></code>.

You can attend an event `i` at any day `d` where <code>startTime<sub>i</sub> <= d <= endTime<sub>i</sub></code>. You can only attend one event at any time `d`.

Return _the maximum number of events you can attend_.

**Example 1:**

![e1](https://assets.leetcode.com/uploads/2020/02/05/e1.png)

- **Input:** events = [[1,2],[2,3],[3,4]]
- **Output:** 3
- **Explanation:** You can attend all the three events.
  One way to attend them all is as shown.
  Attend the first event on day 1.
  Attend the second event on day 2.
  Attend the third event on day 3.

**Example 2:**

- **Input:** events= [[1,2],[2,3],[3,4],[1,2]]
- **Output:** 4

**Constraints:**

- <code>1 <= events.length <= 10<sup>5</sup></code>
- `events[i].length == 2`
- <code>1 <= startDay<sub>i</sub> <= endDay<sub>i</sub> <= 10<sup>5</sup></code>


**Hint:**
1. Sort the events by the start time and in case of tie by the end time in ascending order.
2. Loop over the sorted events. Attend as much as you can and keep the last day occupied. When you try to attend new event keep in mind the first day you can attend a new event in.


**Similar Questions:**
1. [1751. Maximum Number of Events That Can Be Attended II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001751-maximum-number-of-events-that-can-be-attended-ii)
2. [2008. Maximum Earnings From Taxi](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002008-maximum-earnings-from-taxi)
3. [2402. Meeting Rooms III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002402-meeting-rooms-iii)





**Solution:**

We need to determine the maximum number of events that can be attended given that each event has a start and end day, and only one event can be attended per day. The solution involves a greedy approach combined with a min-heap (priority queue) to efficiently manage the events that can be attended on each day.

### Approach
1. **Sort Events by Start Day**: First, we sort the events based on their start days. If two events have the same start day, they can be in any order since we are primarily concerned with the start day for processing.
2. **Use a Min-Heap for End Days**: We use a min-heap to keep track of the end days of the events that are currently available (i.e., events that have started but not yet ended). The min-heap helps us efficiently retrieve the event that ends the soonest.
3. **Process Events Day by Day**: We iterate over each day starting from day 1. For each day:
   - **Add Events**: Add all events that start on or before the current day to the min-heap.
   - **Remove Expired Events**: Remove events from the heap that have ended before the current day (i.e., their end day is less than the current day).
   - **Attend an Event**: If there are events available in the heap, attend the one that ends the soonest (pop from the heap), increment the count of attended events, and move to the next day.
4. **Jump to Next Available Event**: If the heap is empty, we jump to the start day of the next available event to avoid processing days where no events are available.

This approach ensures that we always attend the event that ends the soonest, maximizing the number of events we can attend by leaving more days available for future events.

Let's implement this solution in PHP: **[1353. Maximum Number of Events That Can Be Attended](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001353-maximum-number-of-events-that-can-be-attended/solution.php)**

```php
<?php
/**
 * @param Integer[][] $events
 * @return Integer
 */
function maxEvents($events) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$events = [[1,2],[2,3],[3,4]];
echo maxEvents($events); // Output: 3

// Example 2
$events = [[1,2],[2,3],[3,4],[1,2]];
echo "\n" . maxEvents($events); // Output: 4
?>
```

### Explanation:

1. **Sorting Events**: The events are sorted by their start day to process them in chronological order.
2. **Min-Heap Initialization**: A min-heap is used to manage the end days of active events (events that have started but not ended).
3. **Processing Loop**:
   - **Heap Check**: If the heap is empty, we set the current day to the start day of the next event.
   - **Event Addition**: All events starting on or before the current day are added to the heap.
   - **Expired Event Removal**: Events that end before the current day are removed from the heap as they can no longer be attended.
   - **Event Attendance**: If there are events in the heap, the one ending soonest is attended (removed from the heap), the count is incremented, and we move to the next day.
4. **Termination**: The loop exits when all events have been processed and the heap is empty, ensuring we have attended the maximum possible events.

This approach efficiently processes events by leveraging sorting and a min-heap to maximize event attendance with optimal time complexity of O(n log n), where n is the number of events. The space complexity is O(n) for storing events in the heap.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**