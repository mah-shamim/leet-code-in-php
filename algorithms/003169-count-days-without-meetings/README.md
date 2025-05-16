3169\. Count Days Without Meetings

**Difficulty:** Medium

**Topics:** `Array`, `Sorting`

You are given a positive integer `days` representing the total number of days an employee is available for work (starting from day 1). You are also given a 2D array `meetings` of size `n` where, `meetings[i] = [start_i, end_i]` represents the starting and ending days of meeting `i` (inclusive).

Return the count of days when the employee is available for work but no meetings are scheduled.

**Note:** The meetings may overlap.

**Example 1:**

- **Input:** days = 10, meetings = [[5,7],[1,3],[9,10]]
- **Output:** 2
- **Explanation:** There is no meeting scheduled on the <code>4<sup>th</sup></code> and <code>8<sup>th</sup></code> days.

**Example 2:**

- **Input:** days = 5, meetings = [[2,4],[1,3]]
- **Output:** 1
- **Explanation:** There is no meeting scheduled on the <code>5<sup>th</sup></code> day.


**Example 3:**

- **Input:** days = 6, meetings = [[1,6]]
- **Output:** 0
- **Explanation:** Meetings are scheduled for all working days.



**Constraints:**

- <code>1 <= days <= 10<sup>9</sup></code>
- <code>1 <= meetings.length <= 10<sup>5</sup></code>
- `meetings[i].length == 2`
- `1 <= meetings[i][0] <= meetings[i][1] <= days`


**Hint:**
1. Merge the overlapping meetings and sort the new meetings timings.
2. Return the sum of difference between the end time of a meeting and the start time of the next meeting for all adjacent pairs.



**Solution:**

We need to determine the number of days an employee is available for work but has no meetings scheduled. The approach involves merging overlapping meetings and calculating the gaps between these merged meetings.

### Approach
1. **Sort Meetings**: First, we sort the meetings based on their start times to handle overlaps efficiently.
2. **Merge Overlapping Meetings**: We then merge overlapping or adjacent meetings into non-overlapping intervals. This helps in accurately calculating the total days covered by meetings.
3. **Calculate Covered Days**: Sum the days covered by each merged interval.
4. **Compute Result**: Subtract the total covered days from the given total days to get the count of days without any meetings.

Let's implement this solution in PHP: **[3169. Count Days Without Meetings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003169-count-days-without-meetings/solution.php)**

```php
<?php
/**
 * @param Integer $days
 * @param Integer[][] $meetings
 * @return Integer
 */
function countDays($days, $meetings) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
echo countDays(10, [[5,7],[1,3],[9,10]]); // Output: 2
echo "\n";
echo countDays(5, [[2,4],[1,3]]); // Output: 1
echo "\n";
echo countDays(6, [[1,6]]); // Output: 0
?>
```

### Explanation:

1. **Sorting**: By sorting the meetings based on their start times, we ensure that we can sequentially process each meeting and merge overlaps as we encounter them.
2. **Merging Intervals**: We iterate through the sorted meetings and merge them if they overlap or are adjacent. This is done by checking if the start of the current meeting is within the range of the last merged interval. If so, we extend the end of the merged interval to the maximum end of both intervals.
3. **Summing Covered Days**: For each merged interval, we calculate the number of days it covers by subtracting the start from the end and adding 1 (since both start and end days are inclusive).
4. **Result Calculation**: The final result is obtained by subtracting the total covered days from the given total days, giving the count of days without any meetings.

This approach efficiently handles up to 100,000 meetings and works within the constraints, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**