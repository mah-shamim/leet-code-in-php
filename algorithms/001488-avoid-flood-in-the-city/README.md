1488\. Avoid Flood in The City

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Binary Search`, `Greedy`, `Heap (Priority Queue)`, `Weekly Contest 194`

Your country has an infinite number of lakes. Initially, all the lakes are empty, but when it rains over the `nᵗʰ` lake, the `nᵗʰ` lake becomes full of water. If it rains over a lake that is **full of water**, there will be a **flood**. Your goal is to avoid floods in any lake.

Given an integer array `rains` where:

- `rains[i] > 0` means there will be rains over the `rains[i]` lake.
- `rains[i] == 0` means there are no rains this day, and you can choose **one lake** this day and dry it.

Return _an array `ans`_ where:

- `ans.length == rains.length`
- `ans[i] == -1` if `rains[i] > 0`.
- `ans[i]` is the lake you choose to dry in the `iᵗʰ` day if `rains[i] == 0`.

If there are multiple valid answers return **any** of them. If it is impossible to avoid flood return **an empty array**.

**Notice** that if you chose to dry a full lake, it becomes empty, but if you chose to dry an empty lake, nothing changes.

**Example 1:**

- **Input:** rains = [1,2,3,4]
- **Output:** [-1,-1,-1,-1]
- **Explanation:** After the first day full lakes are [1]
  After the second day full lakes are [1,2]
  After the third day full lakes are [1,2,3]
  After the fourth day full lakes are [1,2,3,4]
  There's no day to dry any lake and there is no flood in any lake.

**Example 2:**

- **Input:** rains = [1,2,0,0,2,1]
- **Output:** [-1,-1,2,1,-1,-1]
- **Explanation:** After the first day full lakes are [1]
  After the second day full lakes are [1,2]
  After the third day, we dry lake 2. Full lakes are [1]
  After the fourth day, we dry lake 1. There is no full lakes.
  After the fifth day, full lakes are [2].
  After the sixth day, full lakes are [1,2].
  It is easy that this scenario is flood-free. [-1,-1,1,2,-1,-1] is another acceptable scenario.

**Example 3:**

- **Input:** rains = [1,2,0,1,2]
- **Output:** []
- **Explanation:** After the second day, full lakes are  [1,2]. We have to dry one lake in the third day.
  After that, it will rain over lakes [1,2]. It's easy to prove that no matter which lake you choose to dry in the 3rd day, the other one will flood.

**Constraints:**

- `1 <= rains.length <= 10⁵`
- `0 <= rains[i] <= 10⁹`



**Hint:**
1. Keep An array of the last day there was rains over each city.
2. Keep an array of the days you can dry a lake when you face one.
3. When it rains over a lake, check the first possible day you can dry this lake and assign this day to this lake.






**Solution:**

We are given an array `rains` where:
- `rains[i] > 0` means it rains on lake `rains[i]`
- `rains[i] == 0` means we can dry one lake on that day

We need to return an array where:
- For rain days, we output `-1`
- For dry days, we output the lake we choose to dry

The goal is to avoid flooding any lake. If a lake is already full and it rains again, a flood occurs. We can use dry days to empty lakes before they receive rain again.

## Approach

We can solve this problem using a **Greedy Strategy** with a **Min-Heap**:

1. **Track Last Rain Day**: Use a hash map to record the last day each lake received rain.
2. **Use Min-Heap for Dry Days**: When we encounter a dry day, we store its index in a min-heap so we can quickly access the earliest available dry day.
3. **Handle Rain Days**: When it rains on a lake:
    - If the lake was previously rained on (exists in our hash map), we need to find a dry day that occurred **after** the last rain on this lake to dry it before the current rain.
    - We use the min-heap to find the earliest dry day after the last rain day for this lake.
    - If no such dry day exists, return an empty array (flood is inevitable).
4. **Update Last Rain Day**: After processing rain on a lake, update the last rain day for that lake.

Let's implement this solution in PHP: **[1488. Avoid Flood in The City](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001488-avoid-flood-in-the-city/solution.php)**

```php
<?php
/**
 * @param Integer[] $rains
 * @return Integer[]
 */
function avoidFlood($rains) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(avoidFlood([1,2,3,4]));        // [-1,-1,-1,-1]
print_r(avoidFlood([1,2,0,0,2,1]));    // [-1,-1,2,1,-1,-1]
print_r(avoidFlood([1,2,0,1,2]));      // []
?>
```

### Explanation:

1. **Initialization**:
    - `$ans` array initialized with `-1` for all positions
    - `$lastRain` hash map to track last rain day for each lake
    - `$dryDays` min-heap to store indices of dry days

2. **Processing Each Day**:
    - **Dry Day (`rains[i] == 0`)**: Store the day index in the min-heap and temporarily set `ans[i] = 1`
    - **Rain Day (`rains[i] > 0`)**:
        - If the lake has rained before, find the earliest dry day after the last rain using the min-heap
        - If no suitable dry day is found, return empty array (flood inevitable)
        - Update the last rain day for the lake

3. **Heap Management**:
    - We extract dry days from the heap until we find one that occurs after the last rain
    - Dry days that are too early are stored back in the heap for future use

## Complexity Analysis

- **Time Complexity**: O(n log n) - Each dry day is pushed and popped from the heap at most once
- **Space Complexity**: O(n) - For the heap and hash map storage

This approach efficiently ensures we use dry days optimally to prevent floods while handling the constraints effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**