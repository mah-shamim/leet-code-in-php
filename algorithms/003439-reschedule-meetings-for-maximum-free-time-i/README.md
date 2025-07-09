3439\. Reschedule Meetings for Maximum Free Time I

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sliding Window`

You are given an integer `eventTime` denoting the duration of an event, where the event occurs from time `t = 0` to time `t = eventTime`.

You are also given two integer arrays `startTime` and `endTime`, each of length `n`. These represent the start and end time of `n` **non-overlapping** meetings, where the <code>i<sup>th</sup></code> meeting occurs during the time `[startTime[i], endTime[i]]`.

You can reschedule **at most** `k` meetings by moving their start time while maintaining the **same duration**, to **maximize** the **longest** _continuous period of free_ time during the event.

The **relative** order of all the meetings should stay the same and they should remain non-overlapping.

Return the **maximum** amount of free time possible after rearranging the meetings.

**Note** that the meetings can **not** be rescheduled to a time outside the event.

**Example 1:**

- **Input:** eventTime = 5, k = 1, startTime = [1,3], endTime = [2,5]
- **Output:** 2
- **Explanation:**
![example0_rescheduled.png](https://assets.leetcode.com/uploads/2024/12/21/example0_rescheduled.png)
  - Reschedule the meeting at `[1, 2]` to `[2, 3]`, leaving no meetings during the time `[0, 2]`.

**Example 2:**

- **Input:** eventTime = 10, k = 1, startTime = [0,2,9], endTime = [1,4,10]
- **Output:** 6
- **Explanation:**
![example1_rescheduled](https://assets.leetcode.com/uploads/2024/12/21/example1_rescheduled.png)
  - Reschedule the meeting at `[2, 4]` to `[1, 3]`, leaving no meetings during the time `[3, 9]`.

**Example 3:**

- **Input:** eventTime = 5, k = 2, startTime = [0,1,2,3,4], endTime = [1,2,3,4,5]
- **Output:** 0
- **Explanation:** There is no time during the event not occupied by meetings.

**Constraints:**

- <code>1 <= eventTime <= 10<sup>9</sup></code>
- `n == startTime.length == endTime.length`
- <code>2 <= n <= 10<sup>5</sup></code>
- `1 <= k <= n`
- `0 <= startTime[i] < endTime[i] <= eventTime`
- `endTime[i] <= startTime[i + 1]` where `i` lies in the range `[0, n - 2]`.


**Hint:**
1. In a sequence of `K` meetings and `K + 1` gaps, you could move all meetings to the start of the sequence to get the max free time.
2. Use a sliding window of `K + 1` size to store sum of gaps and take the maximum.


**Similar Questions:**
1. [1229. Meeting Scheduler](https://leetcode.com/problems/meeting-scheduler/description/)






**Solution:**

We need to maximize the longest continuous period of free time during an event by rescheduling at most `k` meetings. The meetings are non-overlapping and must maintain their relative order after rescheduling. The key insight is that rescheduling up to `k` meetings allows us to merge up to `k+1` consecutive gaps between meetings into a single contiguous free block. The solution involves calculating these gaps and using a sliding window technique to find the maximum sum of any `k+1` consecutive gaps.

### Approach
1. **Calculate Gaps**: The timeline is divided into gaps between meetings and the event boundaries. The first gap is from the start of the event (time 0) to the start of the first meeting. Subsequent gaps are between the end of one meeting and the start of the next. The final gap is from the end of the last meeting to the end of the event (time `eventTime`).
2. **Determine Window Size**: The maximum number of consecutive gaps we can merge is `k+1` (since moving `k` meetings allows merging `k+1` gaps). The window size is the minimum of `k+1` and the total number of gaps.
3. **Sliding Window Technique**: Use a sliding window of size `k+1` to compute the maximum sum of any consecutive `k+1` gaps. This involves:
   - Calculating the sum of the first window (initial `k+1` gaps).
   - Sliding the window one element at a time, adjusting the sum by subtracting the outgoing element and adding the incoming element.
   - Tracking the maximum sum encountered during this process.

Let's implement this solution in PHP: **[3439. Reschedule Meetings for Maximum Free Time I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003439-reschedule-meetings-for-maximum-free-time-i/solution.php)**

```php
<?php
/**
 * @param Integer $eventTime
 * @param Integer $k
 * @param Integer[] $startTime
 * @param Integer[] $endTime
 * @return Integer
 */
function maxFreeTime($eventTime, $k, $startTime, $endTime) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxFreeTime(5, 1, array(1, 3), array(2, 5)) . "\n"; // Output: 2
echo maxFreeTime(10, 1, array(0, 2, 9), array(1, 4, 10)) . "\n"; // Output: 6
echo maxFreeTime(5, 2, array(0, 1, 2, 3, 4), array(1, 2, 3, 4, 5)) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Gap Calculation**: The gaps array is constructed where:
   - The first element is the gap from the start of the event to the first meeting (`startTime[0]`).
   - Subsequent elements are the gaps between the end of the previous meeting and the start of the next (`startTime[i] - endTime[i-1]`).
   - The last element is the gap from the end of the last meeting to the end of the event (`eventTime - endTime[n-1]`).
2. **Window Size**: The window size `L` is set to the minimum of `k+1` (the maximum gaps we can merge) and the total number of gaps (`n+1`).
3. **Sliding Window**:
   - The initial window sum is calculated for the first `L` gaps.
   - The window is then slid across the gaps array, adjusting the sum by removing the leftmost element of the previous window and adding the new rightmost element.
   - The maximum sum encountered during this process is stored and returned as the result, representing the largest contiguous free time achievable by rescheduling up to `k` meetings.

This approach efficiently computes the solution by leveraging the properties of non-negative gaps and the sliding window technique to find the optimal segment of gaps to merge, ensuring optimal performance even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**