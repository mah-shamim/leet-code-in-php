799\. Champagne Tower

**Difficulty:** Medium

**Topics:** `Principal`, `Dynamic Programming`, `Weekly Contest 75`

We stack glasses in a pyramid, where the **first** row has `1` glass, the **second** row has `2` glasses, and so on until the 100ᵗʰ row.  Each glass holds one cup of champagne.

Then, some champagne is poured into the first glass at the top.  When the topmost glass is full, any excess liquid poured will fall equally to the glass immediately to the left and right of it.  When those glasses become full, any excess champagne will fall equally to the left and right of those glasses, and so on.  (A glass at the bottom row has its excess champagne fall on the floor.)

For example, after one cup of champagne is poured, the top most glass is full.  After two cups of champagne are poured, the two glasses on the second row are half full.  After three cups of champagne are poured, those two cups become full - there are 3 full glasses total now.  After four cups of champagne are poured, the third row has the middle glass half full, and the two outside glasses are a quarter full, as pictured below.

![tower](https://s3-lc-upload.s3.amazonaws.com/uploads/2018/03/09/tower.png)

Now after pouring some non-negative integer cups of champagne, return how full the `jᵗʰ` glass in the `iᵗʰ` row is (both `i` and `j` are 0-indexed.)

**Example 1:**

- **Input:** poured = 1, query_row = 1, query_glass = 1
- **Output:** 0.00000
- **Explanation:** We poured 1 cup of champange to the top glass of the tower (which is indexed as (0, 0)). There will be no excess liquid so all the glasses under the top glass will remain empty.

**Example 2:**

- **Input:** poured = 2, query_row = 1, query_glass = 1
- **Output:** 0.50000
- **Explanation:** We poured 2 cups of champange to the top glass of the tower (which is indexed as (0, 0)). There is one cup of excess liquid. The glass indexed as (1, 0) and the glass indexed as (1, 1) will share the excess liquid equally, and each will get half cup of champange.

**Example 3:**

- **Input:** poured = 100000009, query_row = 33, query_glass = 17
- **Output:** 1.00000

**Constraints:**

- `0 <= poured <= 10⁹`
- `0 <= query_glass <= query_row < 100`



**Similar Questions:**
1. [2189. Number of Ways to Build House of Cards](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002189-number-of-ways-to-build-house-of-cards)






**Solution:**

We need to solve the Champagne Tower problem. The problem: given poured cups (non-negative integer, but can be up to 1e9) and query row i and glass j (0-indexed, with i < 100), determine the amount of champagne in that glass (0.0 to 1.0, can be >1? Actually each glass holds one cup, so the amount is capped at 1.0, but excess flows down. So the returned value should be min(amount, 1.0). In examples, they output 0.5, 1.0, etc.

### Approach:

- **Simulation using dynamic programming:**  
  The solution simulates the pouring of champagne row by row, tracking how much champagne each glass receives.
- **2D array representation:**  
  A 101×101 array `tower` (since the maximum row index is 99, but we allocate 101 for safety) stores the amount of champagne in each glass. All glasses start at 0.0.
- **Initial pour:**  
  The entire poured amount is placed into the top glass at `tower[0][0]`.
- **Flow propagation:**  
  For each row `i` from `0` up to `query_row - 1`, iterate over all glasses in that row. If a glass contains more than its capacity (1.0 cup), the excess (`amount - 1.0`) is split equally and added to the two glasses directly below it (`tower[i+1][j]` and `tower[i+1][j+1]`).
- **Result retrieval:**  
  After processing all rows up to `query_row`, the value at `tower[query_row][query_glass]` is the amount in the requested glass. Since a glass can never hold more than 1.0 cup, we return `min(1.0, that value)`.

Let's implement this solution in PHP: **[799. Champagne Tower](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000799-champagne-tower/solution.php)**

```php
<?php
/**
 * @param Integer $poured
 * @param Integer $query_row
 * @param Integer $query_glass
 * @return Float
 */
function champagneTower(int $poured, int $query_row, int $query_glass): float
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo champagneTower(1, 1, 1) . "\n";                // Output: 0.00000
echo champagneTower(2, 1, 1) . "\n";                // Output: 0.50000
echo champagneTower(100000009, 33, 17) . "\n";      // Output: 1.00000
?>
```

### Explanation:

- **Physical analogy:**  
  The pyramid of glasses behaves like a real liquid: each glass holds exactly 1 cup. Any overflow is split equally to the two glasses immediately below it (left and right). This process continues down the pyramid.
- **Row‑by‑row simulation:**  
  Starting from the top, we compute how much champagne reaches each glass by considering the overflow from the row above. Because the flow only goes downward, we can process rows sequentially without needing to revisit earlier rows.
- **Efficiency with large `poured`:**  
  The amount `poured` can be as large as 10⁹, but the simulation works with floating‑point numbers and only needs to consider rows up to `query_row` (maximum 99). The overflow calculations naturally handle arbitrarily large values.
- **Capping at 1.0:**  
  A glass cannot contain more than its full capacity (1.0 cup). Even if the simulation suggests a higher value (due to accumulated overflow), the actual amount is limited to 1.0. Therefore we return `min(1.0, tower[query_row][query_glass])`.

### Complexity
- **Time Complexity**: **O(query_row²)** – we process each glass up to row `query_row`. Since `query_row < 100`, this is effectively constant.
- **Space Complexity**: **O(1)** – we use a fixed 101×101 array regardless of input.



**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**