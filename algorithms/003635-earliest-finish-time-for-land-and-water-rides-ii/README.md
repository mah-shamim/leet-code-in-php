3635\. Earliest Finish Time for Land and Water Rides II

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Two Pointers`, `Binary Search`, `Greedy`, `Sorting`, `Biweekly Contest 162`

You are given two categories of theme park attractions: land rides and water rides.

- **Land rides**
  - `landStartTime[i]` – the earliest time the `iᵗʰ` land ride can be boarded.
  - `landDuration[i]` – how long the `iᵗʰ` land ride lasts.
- **Water rides**
  - `waterStartTime[j]` – the earliest time the `jᵗʰ` water ride can be boarded.
  - `waterDuration[j]` – how long the `jᵗʰ` water ride lasts.

A tourist must experience **exactly one** ride from **each** category, in **either order**.

- A ride may be started at its opening time or **any later moment**.
- If a ride is started at time `t`, it finishes at time `t + duration`.
- Immediately after finishing one ride the tourist may board the other (if it is already open) or wait until it opens.

Return the **earliest possible time** at which the tourist can finish both rides.

**Example 1:**

- **Input:** landStartTime = [2,8], landDuration = [4,1], waterStartTime = [6], waterDuration = [3]
- **Output:** 9
- **Explanation:**

  - Plan A (land ride 0 → water ride 0):
    - Start land ride 0 at time `landStartTime[0] = 2`. Finish at `2 + landDuration[0] = 6`.
    - Water ride 0 opens at time `waterStartTime[0] = 6`. Start immediately at `6`, finish at `6 + waterDuration[0] = 9`.
  - Plan B (water ride 0 → land ride 1):
    - Start water ride 0 at time `waterStartTime[0] = 6`. Finish at `6 + waterDuration[0] = 9`.
    - Land ride 1 opens at `landStartTime[1] = 8`. Start at time `9`, finish at `9 + landDuration[1] = 10`.
  - Plan C (land ride 1 → water ride 0):
    - Start land ride 1 at time `landStartTime[1] = 8`. Finish at `8 + landDuration[1] = 9`.
    - Water ride 0 opened at `waterStartTime[0] = 6`. Start at time `9`, finish at `9 + waterDuration[0] = 12`.
  - Plan D (water ride 0 → land ride 0):
    - Start water ride 0 at time `waterStartTime[0] = 6`. Finish at `6 + waterDuration[0] = 9`.
    - Land ride 0 opened at `landStartTime[0] = 2`. Start at time `9`, finish at `9 + landDuration[0] = 13`.
  - Plan A gives the earliest finish time of 9.

**Example 2:**

- **Input:** landStartTime = [5], landDuration = [3], waterStartTime = [1], waterDuration = [10]
- **Output:** 14
- **Explanation:**
  - Plan A (water ride 0 → land ride 0):
    - Start water ride 0 at time `waterStartTime[0] = 1`. Finish at `1 + waterDuration[0] = 11`.
    - Land ride 0 opened at `landStartTime[0] = 5`. Start immediately at `11` and finish at `11 + landDuration[0] = 14`.
  - Plan B (land ride 0 → water ride 0):
    - Start land ride 0 at time `landStartTime[0] = 5`. Finish at `5 + landDuration[0] = 8`.
    - Water ride 0 opened at `waterStartTime[0] = 1`. Start immediately at `8` and finish at `8 + waterDuration[0] = 18`.
  - Plan A provides the earliest finish time of 14.

**Constraints:**

- `1 <= n, m <= 5 * 10⁴`
- `landStartTime.length == landDuration.length == n`
- `waterStartTime.length == waterDuration.length == m`
- `1 <= landStartTime[i], landDuration[i], waterStartTime[j], waterDuration[j] <= 10⁵`



**Hint:**
1. Sort each ride list by opening time and build a prefix minimum of ride durations and a suffix minimum of ride finish times (`start + duration`).
2. Try both orders, land then water and water then land. For each ride in the first list compute `finish1 = start1 + duration1`.
3. Binary‑search the second list (sorted by start) to split rides into those with `start <= finish1` and those with `start > finish1`. Use the prefix minimum duration on the early group to get an earliest finish of `finish1 + minDuration` and the suffix minimum finish time on the late group.
4. For each pairing take the smaller finish time and track the overall minimum.






**Solution:**

The problem requires finding the earliest finish time for a tourist who must take exactly one land ride and one water ride, in either order.  
The solution sorts both lists by start time, then uses **prefix minimum durations** and **suffix minimum finish times** combined with **binary search** to efficiently compute the best finish time for each possible first ride.

### Approach:

- **Two Orders** 
  - **Consider both possible sequences:** land ride first then water ride, and water ride first then land ride.
- **Sorting** Sort both ride lists by start time to enable binary search and efficient preprocessing.
- **Preprocessing**  
  For the second category (the one taken after the first ride), compute:
   - Prefix minimum of durations (for rides that can start before the first ride ends)
   - Suffix minimum of finish times (for rides that start after the first ride ends)
- **Binary Search** After finishing the first ride at time `finish1`, binary search in the second list to split rides into:
   - **Group A**: `start <= finish1` → use prefix min duration to get earliest finish
   - **Group B**: `start > finish1` → use suffix min finish time (start immediately)
- **Optimization** Take the minimum finish time over all splits and both orders.

Let's implement this solution in PHP: **[3635. Earliest Finish Time for Land and Water Rides II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003635-earliest-finish-time-for-land-and-water-rides-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $landStartTime
 * @param Integer[] $landDuration
 * @param Integer[] $waterStartTime
 * @param Integer[] $waterDuration
 * @return Integer
 */
function earliestFinishTime(array $landStartTime, array $landDuration, array $waterStartTime, array $waterDuration): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo earliestFinishTime([2,8], [4,1], [6], [3]) . "\n";         // Output: 9
echo earliestFinishTime([5], [3], [1], [10]) . "\n";            // Output: 14
?>
```

### Explanation:

- **Step 1 – Pair and sort** Each ride is stored as `[startTime, duration]`. Both lists are sorted by start time to allow binary search.
- **Step 2 – Preprocess second category** For water rides (if taken second):
   - `prefixMinDuration[i]` = minimum duration among first `i+1` water rides
   - `suffixMinFinish[i]` = minimum finish time among water rides from `i` to end  
   - Same preprocessing for land rides when taken second.
- **Step 3 – Binary search split**  
  - Given `finish1` from the first ride, find first index `pos` where `start[pos] > finish1`.  
  - This splits second rides into those starting before/after the end of the first ride.
- **Step 4 – Compute best finish for this first ride**
   - For Group A: earliest finish = `finish1 + minDuration` (start immediately after first ride ends, since all start ≤ finish1)
   - For Group B: earliest finish = `minFinish[pos]` (start at their own start time, since first ride ended earlier)
   - Take the smaller of these two as the best for this pairing.
- **Step 5 – Minimize over all first rides and both orders** Track the global minimum finish time.

### Complexity
- **Time Complexity**: _**O(n log n + m log m)**_ for sorting, plus `O(n log m + m log n)` for binary search per first ride → **O((n + m) * log(n + m))**
- **Space Complexity**: _**O(n + m)**_ for storing arrays of start times, durations, finish times, prefix/suffix arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**