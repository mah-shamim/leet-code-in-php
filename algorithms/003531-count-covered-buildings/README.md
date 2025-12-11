3531\. Count Covered Buildings

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sorting`, `Weekly Contest 447`

You are given a positive integer `n`, representing an `n x n` city. You are also given a 2D grid `buildings`, where `buildings[i] = [x, y]` denotes a **unique** building located at coordinates `[x, y]`. 

A building is **covered** if there is at least one building in all four directions: left, right, above, and below.

Return the number of **covered** buildings.

**Example 1:**

![telegram-cloud-photo-size-5-6212982906394101085-m](https://assets.leetcode.com/uploads/2025/03/04/telegram-cloud-photo-size-5-6212982906394101085-m.jpg)

- **Input:** n = 3, buildings = [[1,2],[2,2],[3,2],[2,1],[2,3]]
- **Output:** 1
- **Explanation:**
  - Only building `[2,2]` is covered as it has at least one building:
    - above (`[1,2]`)
    - below (`[3,2]`)
    - left (`[2,1]`)
    - right (`[2,3]`)
  - Thus, the count of covered buildings is 1.


**Example 2:**

![telegram-cloud-photo-size-5-6212982906394101086-m](https://assets.leetcode.com/uploads/2025/03/04/telegram-cloud-photo-size-5-6212982906394101086-m.jpg)

- **Input:** n = 3, buildings = [[1,1],[1,2],[2,1],[2,2]]
- **Output:** 0
- **Explanation:**
  - No building has at least one building in all four directions.


**Example 3:**

![telegram-cloud-photo-size-5-6248862251436067566-x](https://assets.leetcode.com/uploads/2025/03/16/telegram-cloud-photo-size-5-6248862251436067566-x.jpg)

- **Input:** n = 5, buildings = [[1,3],[3,2],[3,3],[3,5],[5,3]]
- **Output:** 1
- **Explanation:**
  - Only building `[3,3]` is covered as it has at least one building:
    - above (`[1,3]`)
    - below (`[5,3]`)
    - left (`[3,2]`)
    - right (`[3,5]`)
  - Thus, the count of covered buildings is 1.


**Constraints:**

- `2 <= n <= 10⁵`
- `1 <= buildings.length <= 10⁵ `
- `buildings[i] = [x, y]`
- `1 <= x, y <= n`
- All coordinates of `buildings` are **unique**.



**Hint:**
1. Group buildings with the same x or y value together, and sort each group.
2. In each sorted list, the buildings that are not at the first or last positions are covered in that direction.






**Solution:**

We need to determine for each building whether it has at least one building in all four directions: left, right, above, and below. A direct check for each building would be inefficient (O(m²) in worst case). Instead, we can group buildings by their x‑coordinate and y‑coordinate, then use sorting to efficiently determine coverage.

### Approach:

1. **Group by x and y**
   - Create a hash map `xMap` that maps each x‑coordinate to a list of y‑coordinates of buildings in that column.
   - Create a hash map `yMap` that maps each y‑coordinate to a list of x‑coordinates of buildings in that row.

2. **Determine vertical coverage (above/below)**  
   For each x in `xMap`:
   - Sort the list of y‑coordinates.
   - For each building (x, y) in that column:
      - It has a building **above** if it is not the first (smallest y) in the sorted list.
      - It has a building **below** if it is not the last (largest y) in the sorted list.
   - Update the building’s status accordingly.

3. **Determine horizontal coverage (left/right)**  
   For each y in `yMap`:
   - Sort the list of x‑coordinates.
   - For each building (x, y) in that row:
      - It has a building **left** if it is not the first (smallest x) in the sorted list.
      - It has a building **right** if it is not the last (largest x) in the sorted list.
   - Update the building’s status accordingly.

4. **Count covered buildings**  
   A building is covered if all four flags (`above`, `below`, `left`, `right`) are true. Iterate through all buildings and count those meeting this condition.

#### Complexity Analysis
- **Time Complexity:** O(m log m), where m is the number of buildings.  
  We group buildings (O(m)), sort each group (total O(m log m)), and then process each building (O(m)).
- **Space Complexity:** O(m) for storing the groups and building statuses.

Let's implement this solution in PHP: **[3531. Count Covered Buildings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003531-count-covered-buildings/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $buildings
 * @return Integer
 */
function countCoveredBuildings($n, $buildings) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countCoveredBuildings(3, [[1,2],[2,2],[3,2],[2,1],[2,3]]);     // Output: 1
echo countCoveredBuildings(3, [[1,1],[1,2],[2,1],[2,2]]);           // Output: 0
echo countCoveredBuildings(5, [[1,3],[3,2],[3,3],[3,5],[5,3]]);     // Output: 1
?>
```

### Explanation:

1. **Grouping**: We build two maps:
   - `xMap`: For each x, store all y’s (buildings in that column).
   - `yMap`: For each y, store all x’s (buildings in that row).  
     We also initialize a status array for each building, tracking whether it has neighbors in each direction.

2. **Vertical check**: For each column (x), sort the y’s. A building has an **above** neighbor if it is not the smallest y, and a **below** neighbor if it is not the largest y.

3. **Horizontal check**: For each row (y), sort the x’s. A building has a **left** neighbor if it is not the smallest x, and a **right** neighbor if it is not the largest x.

4. **Final count**: A building is covered only if all four flags are true.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**