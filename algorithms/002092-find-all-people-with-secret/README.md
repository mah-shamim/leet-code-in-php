2092\. Find All People With Secret

**Difficulty:** Hard

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Union Find`, `Graph`, `Sorting`, `Weekly Contest 269`

You are given an integer `n` indicating there are `n` people numbered from `0` to `n - 1`. You are also given a **0-indexed** 2D integer array `meetings` where `meetings[i] = [xᵢ, yᵢ, timeᵢ]` indicates that person `xᵢ` and person `yᵢ` have a meeting at `timeᵢ`. A person may attend **multiple meetings** at the same time. Finally, you are given an integer `firstPerson`.

Person `0` has a **secret** and initially shares the secret with a person `firstPerson` at time `0`. This secret is then shared every time a meeting takes place with a person that has the secret. More formally, for every meeting, if a person `xᵢ` has the secret at `timeᵢ`, then they will share the secret with person `yᵢ`, and vice versa.

The secrets are shared **instantaneously**. That is, a person may receive the secret and share it with people in other meetings within the same time frame.

Return _a list of all the people that have the secret after all the meetings have taken place. You may return the answer in **any order**_.

**Example 1:**

- **Input:** n = 6, meetings = [[1,2,5],[2,3,8],[1,5,10]], firstPerson = 1
- **Output:** [0,1,2,3,5]
- **Explanation:**
  At time 0, person 0 shares the secret with person 1.
  At time 5, person 1 shares the secret with person 2.
  At time 8, person 2 shares the secret with person 3.
  At time 10, person 1 shares the secret with person 5.
  Thus, people 0, 1, 2, 3, and 5 know the secret after all the meetings.

**Example 2:**

- **Input:** n = 4, meetings = [[3,1,3],[1,2,2],[0,3,3]], firstPerson = 3
- **Output:** [0,1,3]
- **Explanation:**
  At time 0, person 0 shares the secret with person 3.
  At time 2, neither person 1 nor person 2 know the secret.
  At time 3, person 3 shares the secret with person 0 and person 1.
  Thus, people 0, 1, and 3 know the secret after all the meetings.

**Example 3:**

- **Input:** n = 5, meetings = [[3,4,2],[1,2,1],[2,3,1]], firstPerson = 1
- **Output:** [0,1,2,3,4]
- **Explanation:**
  At time 0, person 0 shares the secret with person 1.
  At time 1, person 1 shares the secret with person 2, and person 2 shares the secret with person 3.
  Note that person 2 can share the secret at the same time as receiving it.
  At time 2, person 3 shares the secret with person 4.
  Thus, people 0, 1, 2, 3, and 4 know the secret after all the meetings.

**Constraints:**

- `2 <= n <= 10⁵`
- `1 <= meetings.length <= 10⁵`
- `meetings[i].length == 3`
- `0 <= xᵢ, yᵢ <= n - 1`
- `xᵢ != yᵢ`
- `1 <= timeᵢ <= 10⁵`
- `1 <= firstPerson <= n - 1`



**Hint:**
1. Could you model all the meetings happening at the same time as a graph?
2. What data structure can you use to efficiently share the secret?
3. You can use the union-find data structure to quickly determine who knows the secret and share the secret.




**Similar Questions:**
1. [882. Reachable Nodes In Subdivided Graph](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000882-reachable-nodes-in-subdivided-graph)






**Solution:**

We need to efficiently track how the secret spreads through meetings over time, accounting for the fact that meetings at the same time can propagate the secret through multiple hops instantaneously.

## Approach

We can solve this using a union-find (disjoint set) data structure with time-aware connections. The key insight is that:
1. People who meet at the same time should be connected if at least one of them knows the secret
2. Connections between people should be reset after processing each time slot (since people don't remain connected across different times)

Let's implement this solution in PHP: **[2092. Find All People With Secret](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002092-find-all-people-with-secret/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $meetings
 * @param Integer $firstPerson
 * @return Integer[]
 */
function findAllPeople($n, $meetings, $firstPerson) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findAllPeople(6, [[1,2,5],[2,3,8],[1,5,10]], 1) . "\n";    // Output: [0,1,2,3,5]
echo findAllPeople(4, [[3,1,3],[1,2,2],[0,3,3]], 3) . "\n";     // Output: [0,1,3]
echo findAllPeople(5, [[3,4,2],[1,2,1],[2,3,1]], 1) . "\n";     // Output: [0,1,2,3,4]
?>
```

### Explanation:

1. **Sort meetings by time**: Process meetings in chronological order.
2. **Group meetings by time**: Meetings at the same time need to be processed together because the secret can propagate instantaneously within the same time frame.
3. **Propagate the secret**: For each time group:
   - In the union-find solution: Connect all meeting participants, then disconnect those who don't know the secret.
   - In the BFS solution: Build a graph of meetings at that time and use BFS to propagate the secret to all connected components.
4. **Track who knows the secret**: Maintain a boolean array or use union-find to track secret knowledge.

## Complexity Analysis

- **Time Complexity**: O(m log m + n) where m is the number of meetings
   - Sorting meetings: O(m log m)
   - Processing each meeting: O(m α(n)) for union-find, O(m + n) for BFS
- **Space Complexity**: O(n + m) for storing the graph or union-find structure

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**