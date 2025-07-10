3440\. Reschedule Meetings for Maximum Free Time II

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Enumeration`

You are given an integer `eventTime` denoting the duration of an event. You are also given two integer arrays `startTime` and `endTime`, each of length `n`.

These represent the start and end times of `n` **non-overlapping** meetings that occur during the event between time `t = 0` and time `t = eventTime`, where the <code>i<sup>th</sup></code> meeting occurs during the time `[startTime[i], endTime[i]]`.

You can reschedule **at most** one meeting by moving its start time while maintaining the **same duration**, such that the meetings remain non-overlapping, to **maximize** the **longest** _continuous period of free time_ during the event.

Return the **maximum** amount of free time possible after rearranging the meetings.

**Note** that the meetings can **not** be rescheduled to a time outside the event and they should remain non-overlapping.

**Note:** In this version, it is **valid** for the relative ordering of the meetings to change after rescheduling one meeting.

**Example 1:**

- **Input:** eventTime = 5, startTime = [1,3], endTime = [2,5]
- **Output:** 2
- **Explanation:**
![example0_rescheduled](https://assets.leetcode.com/uploads/2024/12/22/example0_rescheduled.png)
  - Reschedule the meeting at `[1, 2]` to `[2, 3]`, leaving no meetings during the time `[0, 2]`.

**Example 2:**

- **Input:** eventTime = 10, startTime = [0,7,9], endTime = [1,8,10]
- **Output:** 7
- **Explanation:**
![rescheduled_example0](https://assets.leetcode.com/uploads/2024/12/22/rescheduled_example0.png)
   - Reschedule the meeting at `[0, 1]` to `[8, 9]`, leaving no meetings during the time `[0, 7]`.

**Example 3:**

- **Input:** eventTime = 10, startTime = [0,3,7,9], endTime = [1,4,8,10]
- **Output:** 6
- **Explanation:**
![image3](https://assets.leetcode.com/uploads/2025/01/28/image3.png)
   - Reschedule the meeting at `[3, 4]` to `[8, 9]`, leaving no meetings during the time `[1, 7]`.

**Example 4:**

- **Input:** eventTime = 5, startTime = [0,1,2,3,4], endTime = [1,2,3,4,5]
- **Output:** 0
- **Explanation:**There is no time during the event not occupied by meetings.


**Constraints:**

- <code>1 <= eventTime <= 10<sup>9</sup></code>
- `n == startTime.length == endTime.length`
- <code>2 <= n <= 10<sup>5</sup></code>
- `0 <= startTime[i] < endTime[i] <= eventTime`
- `endTime[i] <= startTime[i + 1]` where `i` lies in the range `[0, n - 2]`

**Hint:**
1. If we reschedule a meeting earlier or later, we need to find a gap of length at least `endTime[i] - startTime[i]`. Try maintaining the gaps in some sorted data structure.






**Solution:**

We need to maximize the longest continuous period of free time during an event by rescheduling at most one meeting. The meetings are initially non-overlapping, and we can move one meeting to any available gap that can accommodate its duration without overlapping with other meetings. The goal is to find the maximum free time achievable after such a rescheduling.

### Approach
1. **Initial Setup**: Calculate the initial gaps between meetings, including the gaps before the first meeting, between consecutive meetings, and after the last meeting.
2. **Original Maximum Gap**: Compute the maximum gap from the initial gaps. This serves as the baseline if no meetings are moved.
3. **Evaluate Each Meeting**: For each meeting, simulate its removal and calculate the new gaps that would result. This involves merging the adjacent gaps where the meeting was removed.
4. **Check for Valid Moves**: For each removed meeting, check if there exists a gap (in the new set of gaps) that can accommodate the meeting's duration. If not, skip this meeting.
5. **Calculate Candidate Maximum Gap**:
   - If there exists a gap (other than the largest one) that can accommodate the meeting, the maximum gap remains the same as the largest gap in the new set.
   - If the largest gap is the only one that can accommodate the meeting, breaking it might reduce the maximum gap. In this case, the new maximum gap is the maximum between the second largest gap and the largest gap minus the meeting's duration.
6. **Update Result**: Track the maximum gap obtained from moving each meeting and compare it with the original maximum gap to determine the final result.

Let's implement this solution in PHP: **[3440. Reschedule Meetings for Maximum Free Time II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003440-reschedule-meetings-for-maximum-free-time-ii/solution.php)**

```php
<?php
/**
 * @param Integer $eventTime
 * @param Integer[] $startTime
 * @param Integer[] $endTime
 * @return Integer
 */
function maxFreeTime($eventTime, $startTime, $endTime) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxFreeTime(5, [1, 3], [2, 5]) . "\n";         // Output: 2
echo maxFreeTime(10, [0, 7, 9], [1, 8, 10]) . "\n"; // Output: 7
echo maxFreeTime(10, [0, 3, 7, 9], [1, 4, 8, 10]) . "\n"; // Output: 6
echo maxFreeTime(5, [0,1,2,3,4], [1,2,3,4,5]) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Initial Setup**: The initial gaps between meetings are calculated, including the gaps before the first meeting, between consecutive meetings, and after the last meeting.
2. **Prefix and Suffix Arrays**: These arrays store the maximum and second maximum values along with their counts for all possible subarrays. This helps in efficiently determining the largest and second largest gaps when any meeting is removed.
3. **Processing Each Meeting**: For each meeting, we:
   - Calculate the new gap formed by merging adjacent gaps when the meeting is removed.
   - Determine if there exists a gap that can accommodate the meeting's duration.
   - Compute the new maximum free time by considering the largest remaining gap or the largest gap reduced by the meeting's duration if necessary.
4. **Result Calculation**: The result is the maximum value between the original maximum gap and the best gap obtained by moving any single meeting.

This approach efficiently checks all possible moves of a single meeting to maximize the free time, leveraging precomputed prefix and suffix arrays for optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**