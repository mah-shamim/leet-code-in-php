3633\. Earliest Finish Time for Land and Water Rides I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Two Pointers`, `Binary Search`, `Greedy`, `Sorting`, `Biweekly Contest 162`

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
    - Start water ride 0 at `time waterStartTime[0] = 6`. Finish at `6 + waterDuration[0] = 9`.
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

- `1 <= n, m <= 100`
- `landStartTime.length == landDuration.length == n`
- `waterStartTime.length == waterDuration.length == m`
- `1 <= landStartTime[i], landDuration[i], waterStartTime[j], waterDuration[j] <= 1000`



**Hint:**
1. Use brute force






**Solution:**

The problem requires calculating the earliest possible finish time after riding exactly one land ride and one water ride, in either order, with start times that may be delayed until the ride opens. The solution uses brute‑force iteration over all pairs of rides, computes both possible orders for each pair, and tracks the minimum finish time.

### Approach:

- Iterate through every combination of a land ride and a water ride.
- For each pair, compute the finish time for both sequences:
   1. **Land first** → then water.
   2. **Water first** → then land.
- The start time of the second ride is the maximum of the finish time of the first ride and the start time of the second ride (must wait if it isn’t open yet).
- Keep the global minimum finish time across all pairs and orders.

Let's implement this solution in PHP: **[3633. Earliest Finish Time for Land and Water Rides I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003633-earliest-finish-time-for-land-and-water-rides-i/solution.php)**

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

- The brute‑force method is feasible because the number of rides in each category is at most 100, so checking all (n × m) pairs is fine.
- For each pair `(land[i], water[j])`:
   - **Land first**:
      - Land finishes at `landStartTime[i] + landDuration[i]`.
      - Water starts at `max(landFinishTime, waterStartTime[j])`.
      - Water finishes at `waterStart + waterDuration[j]`.
   - **Water first**:
      - Water finishes at `waterStartTime[j] + waterDuration[j]`.
      - Land starts at `max(waterFinishTime, landStartTime[i])`.
      - Land finishes at `landStart + landDuration[i]`.
- The answer is the smallest finish time from all orders and all pairs.

### Complexity
- **Time Complexity**: _**O(n × m)**_ — loops through all land–water pairs, each with constant work.
- **Space Complexity**: _**O(1)**_ — only a few scalar variables used, independent of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**