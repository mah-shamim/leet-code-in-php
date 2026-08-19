1386\. Cinema Seat Allocation

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Greedy`, `Bit Manipulation`, `Biweekly Contest 22`

![cinema_seats_1](https://assets.leetcode.com/uploads/2020/02/14/cinema_seats_1.png)

A cinema has `n` rows of seats, numbered from 1 to `n`. Each row has 10 seats, numbered from 1 to 10.

You are given a 2D integer array `reservedSeats`, where `reservedSeats[i] = [rowᵢ, seatᵢ]` means that seat `seatᵢ` in row `rowᵢ` is already reserved.

A four-person group must be assigned to four seats in the **same** row. The group can be seated in one of the following seat blocks:

- seats `2, 3, 4, 5`
- seats `4, 5, 6, 7`
- seats `6, 7, 8, 9`

A block can be used only if **none** of its seats are reserved. Each seat can be assigned to **at most** one group.

Return an integer denoting the **maximum** number of four-person groups that can be assigned.

**Example 1:**

![cinema_seats_3](https://assets.leetcode.com/uploads/2020/02/14/cinema_seats_3.png)

- **Input:** n = 3, reservedSeats = [[1,2],[1,3],[1,8],[2,6],[3,1],[3,10]]
- **Output:** 4
- **Explanation:** The figure above shows an optimal allocation of four groups. Seats marked in blue are already reserved, and each set of four contiguous seats marked in orange is assigned to one group.

**Example 2:**

- **Input:** n = 2, reservedSeats = [[2,1],[1,8],[2,6]]
- **Output:** 2

**Example 3:**

- **Input:** n = 4, reservedSeats = [[4,3],[1,4],[4,6],[1,7]]
- **Output:** 4

**Example 4:**

- **Input:** n = 5, reservedSeats = []
- **Output:** 10

**Example 5:**

- **Input:** n = 1, reservedSeats = [[1,2],[1,3],[1,8],[1,9]]
- **Output:** 1

**Example 6:**

- **Input:** n = 1, reservedSeats = [[1,2],[1,3],[1,4],[1,5],[1,6],[1,7],[1,8],[1,9]]
- **Output:** 0

**Example 7:**

- **Input:** n = 1, reservedSeats = [[1,5]]
- **Output:** 0

**Example 8:**

- **Input:** n = 1000000000, reservedSeats = [[1,2]]
- **Output:** 4

**Constraints:**

- `1 <= n <= 10⁹`
- `1 <= reservedSeats.length <= min(10 * n, 10⁴)`
- `reservedSeats[i] == [rowᵢ, seatᵢ]`
- `1 <= rowᵢ <= n`
- `1 <= seatᵢ <= 10`
- All `reservedSeats[i]` are distinct.


**Hint:**
1. Note you can allocate at most two four-person groups in one row.
2. Greedily check if you can allocate seats for two groups, one group or none.
3. Process only rows that appear in the input, for other rows you can always allocate seats for two groups.


**Similar Questions:**
1. [2286. Booking Concert Tickets in Groups](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002286-booking-concert-tickets-in-groups)


**Solution:**

We executed an efficient row-based greedy strategy to maximize the number of four-person groups that can be seated in the cinema.

## Approach

- **We** recognized that each row has exactly 10 seats and only 3 possible four-person seating blocks: left (2–5), middle (4–7), and right (6–9).
- **We** observed that without any reservations, every row can accommodate 2 groups (left and right blocks).
- **We** decided to process only rows that contain at least one reserved seat, since rows with no reservations can simply contribute 2 groups each.
- **We** stored reserved seats in a hash map keyed by row for fast lookup.
- **We** checked each impacted row for availability of:
   - Left block (seats 2,3,4,5)
   - Right block (seats 6,7,8,9)
   - If neither is fully free, we check the middle block (4,5,6,7) as a fallback.
- **We** summed the groups from processed rows and added `2 * number_of_empty_rows` to get the total.

Let's implement this solution in PHP: **[1386. Cinema Seat Allocation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001386-cinema-seat-allocation/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $reservedSeats
 * @return Integer
 */
function maxNumberOfFamilies(int $n, array $reservedSeats): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxNumberOfFamilies(3, [[1,2],[1,3],[1,8],[2,6],[3,1],[3,10]]) .  "\n";                // Output: 4
echo maxNumberOfFamilies(2, [[2,1],[1,8],[2,6]]) .  "\n";                                   // Output: 2
echo maxNumberOfFamilies(4, [[4,3],[1,4],[4,6],[1,7]]) .  "\n";                             // Output: 4
echo maxNumberOfFamilies(5, []) .  "\n";                                                    // Output: 10
echo maxNumberOfFamilies(1, [[1,2],[1,3],[1,8],[1,9]]) .  "\n";                             // Output: 1
echo maxNumberOfFamilies(1, [[1,2],[1,3],[1,4],[1,5],[1,6],[1,7],[1,8],[1,9]]) .  "\n";     // Output: 0
echo maxNumberOfFamilies(1, [[1,5]]) .  "\n";                                               // Output: 0
echo maxNumberOfFamilies(1000000000, [[1,2]]) .  "\n";                                      // Output: 1999999998
?>
```

### Explanation:

- **We** used a hash map (`reservedMap`) where each key is a row and the value is an associative array of reserved seat numbers in that row.
- **We** iterated over each row in the map:
   - **We** initialized `groupsForRow = 0`.
   - **We** checked the left block (2,3,4,5). If all are available, we incremented `groupsForRow`.
   - **We** checked the right block (6,7,8,9). If all are available, we incremented `groupsForRow`.
   - **We** only attempted the middle block (4,5,6,7) if no groups were assigned yet (i.e., `groupsForRow == 0`). This ensures we don't overcount.
- **We** added `groupsForRow` to `totalGroups`.
- **We** calculated empty rows as `n - count($reservedMap)` and added `emptyRows * 2` because each completely empty row can host two groups (left and right blocks).
- **We** returned the final `totalGroups`.

## Complexity Analysis

- **Time Complexity:** _**O(R)**_ where R is the number of rows that appear in `reservedSeats`. For each such row, we do a constant number of lookup operations (at most 10 seats). Since reservedSeats length is at most `10⁴`, this is efficient.
- **Space Complexity:** _**O(R)**_ for storing the hash map of reserved seats per row.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**