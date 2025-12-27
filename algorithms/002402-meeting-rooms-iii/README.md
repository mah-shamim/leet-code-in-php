2402\. Meeting Rooms III

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Sorting`, `Heap (Priority Queue)`, `Simulation`, `Weekly Contest 309`

You are given an integer `n`. There are `n` rooms numbered from `0` to `n - 1`.

You are given a 2D integer array `meetings` where <code>meetings[i] = [start<sub>i</sub>, end<sub>i</sub>]</code> means that a meeting will be held during the **half-closed** time interval <code>[start<sub>i</sub>, end<sub>i</sub>)</code>. All the values of <code>start<sub>i</sub></code> are **unique**.

Meetings are allocated to rooms in the following manner:

- Each meeting will take place in the unused room with the **lowest** number.
- If there are no available rooms, the meeting will be delayed until a room becomes free. The delayed meeting should have the **same** duration as the original meeting.
- When a room becomes unused, meetings that have an earlier original **start** time should be given the room.

Return _the **number** of the room that held the most meetings. If there are multiple rooms, return the room with the **lowest** number_.

A **half-closed interval** `[a, b)` is the interval between `a` and `b` **including** a and **not including** `b`.

**Example 1:**

- **Input:** n = 2, meetings = [[0,10],[1,5],[2,7],[3,4]]
- **Output:** 0
- **Explanation:**
  - At time 0, both rooms are not being used. The first meeting starts in room 0.
  - At time 1, only room 1 is not being used. The second meeting starts in room 1.
  - At time 2, both rooms are being used. The third meeting is delayed.
  - At time 3, both rooms are being used. The fourth meeting is delayed.
  - At time 5, the meeting in room 1 finishes. The third meeting starts in room 1 for the time period [5,10).
  - At time 10, the meetings in both rooms finish. The fourth meeting starts in room 0 for the time period [10,11).
    Both rooms 0 and 1 held 2 meetings, so we return 0.

**Example 2:**

- **Input:** n = 3, meetings = [[1,20],[2,10],[3,5],[4,9],[6,8]]
- **Output:** 1
- **Explanation:**
  - At time 1, all three rooms are not being used. The first meeting starts in room 0.
  - At time 2, rooms 1 and 2 are not being used. The second meeting starts in room 1.
  - At time 3, only room 2 is not being used. The third meeting starts in room 2.
  - At time 4, all three rooms are being used. The fourth meeting is delayed.
  - At time 5, the meeting in room 2 finishes. The fourth meeting starts in room 2 for the time period [5,10).
  - At time 6, all three rooms are being used. The fifth meeting is delayed.
  - At time 10, the meetings in rooms 1 and 2 finish. The fifth meeting starts in room 1 for the time period [10,12).
    Room 0 held 1 meeting while rooms 1 and 2 each held 2 meetings, so we return 1.

**Constraints:**

- `1 <= n <= 100`
- <code>1 <= meetings.length <= 10<sup>5</sup></code>
- `meetings[i].length == 2`
- <code>0 <= starti < endi <= 5 * 10<sup>5</sup></code>
- All the values of <code>start<sub>i</sub></code> are **unique**.


**Hint:**
1. Sort meetings based on start times.
2. Use two-min heaps, the first one keeps track of the numbers of all the rooms that are free. The second heap keeps track of the end times of all the meetings that are happening and the room that they are in.
3. Keep track of the number of times each room is used in an array.
4. With each meeting, check if there are any free rooms. If there are, then use the room with the smallest number. Otherwise, assign the meeting to the room whose meeting will end the soonest.


**Similar Questions:**
1. [252. Meeting Rooms](https://leetcode.com/problems/meeting-rooms/description/)
2. [253. Meeting Rooms II](https://leetcode.com/problems/meeting-rooms-ii/description/)
3. [1353. Maximum Number of Events That Can Be Attended](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001353-maximum-number-of-events-that-can-be-attended)
4. [1606. Find Servers That Handled Most Number of Requests](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001606-find-servers-that-handled-most-number-of-requests)
5. [1751. Maximum Number of Events That Can Be Attended II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001751-maximum-number-of-events-that-can-be-attended-ii)






**Solution:**

We need to efficiently allocate meeting rooms to a series of meetings based on specific rules, ensuring that meetings are assigned to the lowest-numbered available room or delayed until a room becomes free. The goal is to determine which room holds the most meetings, with ties broken by the lowest room number.

### Approach
1. **Problem Analysis**: The problem involves scheduling meetings into rooms with specific constraints:
   - Each meeting must be held in the lowest-numbered available room at its start time.
   - If no room is available, the meeting is delayed until a room becomes free, maintaining its original duration.
   - When a room becomes free, the meeting with the earliest original start time is assigned first.

2. **Intuition**: The solution requires managing room availability and meeting assignments efficiently. Key insights include:
   - **Sorting Meetings**: Meetings are processed in order of their original start times to prioritize earlier meetings.
   - **Heap Usage**:
     - A min-heap (`free_rooms`) tracks available rooms by their numbers.
     - Another min-heap (`busy_rooms`) tracks ongoing meetings by their end times and room numbers.
   - **Simulation**: The algorithm processes each meeting, adjusting the current time to either the meeting's start time or the earliest end time of an ongoing meeting if no room is available.

3. **Algorithm**:
   - **Initialization**:
     - All rooms are initially free, stored in `free_rooms`.
     - `busy_rooms` starts empty.
     - A count array tracks the number of meetings per room.
   - **Processing Meetings**:
     - For each meeting, update the current time to the maximum of the current time and the meeting's start time.
     - Free all rooms where meetings have ended by the current time.
     - If no room is free, wait until the next meeting ends (using `busy_rooms` to find the earliest end time), update the current time, and free all rooms ending at that time.
     - Assign the meeting to the smallest free room, schedule its end time, and update the count.
   - **Result Calculation**: After processing all meetings, find the room with the highest meeting count, resolving ties by selecting the smallest room number.

Let's implement this solution in PHP: **[2402. Meeting Rooms III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002402-meeting-rooms-iii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $meetings
 * @return Integer
 */
function mostBooked($n, $meetings) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$n = 2;
$meetings = [[0, 10], [1, 5], [2, 7], [3, 4]];
echo mostBooked($n, $meetings) . "\n"; // Output: 0

// Example 2
$n = 3;
$meetings = [[1, 20], [2, 10], [3, 5], [4, 9], [6, 8]];
echo mostBooked($n, $meetings) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Initialization**:
   - `free_rooms` is initialized as a min-heap containing all room numbers (0 to n-1).
   - `busy_rooms` is a custom min-heap that prioritizes meetings by their end times and then by room number.
   - Meetings are sorted by their start times to ensure processing in chronological order.

2. **Processing Meetings**:
   - For each meeting, the current time is set to the maximum of its start time or the current time.
   - Rooms that have finished meetings by the current time are freed and added back to `free_rooms`.
   - If no rooms are free, the earliest ending meeting is identified, the current time is updated to its end time, and all meetings ending at that time are freed.
   - The meeting is assigned to the smallest free room, its end time is calculated, and it's added to `busy_rooms`. The room's meeting count is incremented.

3. **Result Calculation**:
   - After processing all meetings, the room with the highest meeting count is identified. In case of ties, the smallest room number is chosen.

This approach efficiently manages room allocation and meeting scheduling using heap structures to handle dynamic availability, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**