3562\. Maximum Profit from Trading Stocks with Discounts

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Tree`, `Depth-First Search`, `Weekly Contest 451`

You are given an integer `n`, representing the number of employees in a company. Each employee is assigned a unique ID from 1 to `n`, and employee 1 is the CEO. You are given two **1-based** integer arrays, `present` and `future`, each of length `n`, where:

- `present[i]` represents the **current** price at which the `iᵗʰ` employee can buy a stock today.
- `future[i]` represents the **expected** price at which the `iᵗʰ` employee can sell the stock tomorrow.

The company's hierarchy is represented by a 2D integer array `hierarchy`, where `hierarchy[i] = [uᵢ, vᵢ]` means that employee `uᵢ` is the direct boss of employee `vᵢ`.

Additionally, you have an integer `budget` representing the total funds available for investment.

However, the company has a discount policy: if an employee's direct boss purchases their own stock, then the employee can buy their stock at **half** the original price (`floor(present[v] / 2)`).

Return the **maximum** profit that can be achieved without exceeding the given budget.

**Note:**

- You may buy each stock at most **once**.
- You **cannot** use any profit earned from future stock prices to fund additional investments and must buy only from `budget`.


**Example 1:**

- **Input:** n = 2, present = [1,2], future = [4,3], hierarchy = [[1,2]], budget = 3
- **Output:** 5
- **Explanation:**
   
  ![screenshot-2025-04-10-at-053641](https://assets.leetcode.com/uploads/2025/04/09/screenshot-2025-04-10-at-053641.png)
  - Employee 1 buys the stock at price 1 and earns a profit of `4 - 1 = 3`.
  - Since Employee 1 is the direct boss of Employee 2, Employee 2 gets a discounted price of `floor(2 / 2) = 1`.
  - Employee 2 buys the stock at price 1 and earns a profit of `3 - 1 = 2`.
  - The total buying cost is `1 + 1 = 2 <= budget`. Thus, the maximum total profit achieved is `3 + 2 = 5`.


**Example 2:**

- **Input:** n = 2, present = [3,4], future = [5,8], hierarchy = [[1,2]], budget = 4
- **Output:** 4
- **Explanation:**
   
   ![screenshot-2025-04-10-at-053641](https://assets.leetcode.com/uploads/2025/04/09/screenshot-2025-04-10-at-053641.png)
    - Employee 2 buys the stock at price 4 and earns a profit of `8 - 4 = 4`.
    - Since both employees cannot buy together, the maximum profit is 4.


**Example 3:**

- **Input:** n = 3, present = [4,6,8], future = [7,9,11], hierarchy = [[1,2],[1,3]], budget = 10
- **Output:** 10
- **Explanation:**
   
   ![image](https://assets.leetcode.com/uploads/2025/04/09/image.png)
  - Employee 1 buys the stock at price 4 and earns a profit of `7 - 4 = 3`.
  - Employee 3 would get a discounted price of `floor(8 / 2) = 4` and earns a profit of `11 - 4 = 7`.
  - Employee 1 and Employee 3 buy their stocks at a total cost of `4 + 4 = 8 <= budget`. Thus, the maximum total profit achieved is `3 + 7 = 10`.


**Example 4:**

- **Input:** n = 3, present = [5,2,3], future = [8,5,6], hierarchy = [[1,2],[2,3]], budget = 7
- **Output:** 12
- **Explanation:**
   
   ![screenshot-2025-04-10-at-054114](https://assets.leetcode.com/uploads/2025/04/09/screenshot-2025-04-10-at-054114.png)
    - Employee 1 buys the stock at price 5 and earns a profit of `8 - 5 = 3`.
    - Employee 2 would get a discounted price of `floor(2 / 2) = 1` and earns a profit of `5 - 1 = 4`.
    - Employee 3 would get a discounted price of `floor(3 / 2) = 1` and earns a profit of `6 - 1 = 5`.
    - The total cost becomes `5 + 1 + 1 = 7 <= budget`. Thus, the maximum total profit achieved is `3 + 4 + 5 = 12`.


**Example 5:**

- **Input:** n = 2, present = [6,11], future = [5,48], hierarchy = [[1,2]], budget = 142
- **Output:** 42


**Example 6:**

- **Input:** n = 160, present = [1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50], future = [50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1,50,1], hierarchy = [[1,2],[2,3],[3,4],[4,5],[5,6],[6,7],[7,8],[8,9],[9,10],[10,11],[11,12],[12,13],[13,14],[14,15],[15,16],[16,17],[17,18],[18,19],[19,20],[20,21],[21,22],[22,23],[23,24],[24,25],[25,26],[26,27],[27,28],[28,29],[29,30],[30,31],[31,32],[32,33],[33,34],[34,35],[35,36],[36,37],[37,38],[38,39],[39,40],[40,41],[41,42],[42,43],[43,44],[44,45],[45,46],[46,47],[47,48],[48,49],[49,50],[50,51],[51,52],[52,53],[53,54],[54,55],[55,56],[56,57],[57,58],[58,59],[59,60],[60,61],[61,62],[62,63],[63,64],[64,65],[65,66],[66,67],[67,68],[68,69],[69,70],[70,71],[71,72],[72,73],[73,74],[74,75],[75,76],[76,77],[77,78],[78,79],[79,80],[80,81],[81,82],[82,83],[83,84],[84,85],[85,86],[86,87],[87,88],[88,89],[89,90],[90,91],[91,92],[92,93],[93,94],[94,95],[95,96],[96,97],[97,98],[98,99],[99,100],[100,101],[101,102],[102,103],[103,104],[104,105],[105,106],[106,107],[107,108],[108,109],[109,110],[110,111],[111,112],[112,113],[113,114],[114,115],[115,116],[116,117],[117,118],[118,119],[119,120],[120,121],[121,122],[122,123],[123,124],[124,125],[125,126],[126,127],[127,128],[128,129],[129,130],[130,131],[131,132],[132,133],[133,134],[134,135],[135,136],[136,137],[137,138],[138,139],[139,140],[140,141],[141,142],[142,143],[143,144],[144,145],[145,146],[146,147],[147,148],[148,149],[149,150],[150,151],[151,152],[152,153],[153,154],[154,155],[155,156],[156,157],[157,158],[158,159],[159,160]], budget = 160
- **Output:** 3920


**Example 7:**

- **Input:** n = 160, present = [1,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50], future = [50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50], hierarchy = [[1,2],[1,3],[1,4],[1,5],[1,6],[1,7],[1,8],[1,9],[1,10],[1,11],[1,12],[1,13],[1,14],[1,15],[1,16],[1,17],[1,18],[1,19],[1,20],[1,21],[1,22],[1,23],[1,24],[1,25],[1,26],[1,27],[1,28],[1,29],[1,30],[1,31],[1,32],[1,33],[1,34],[1,35],[1,36],[1,37],[1,38],[1,39],[1,40],[1,41],[1,42],[1,43],[1,44],[1,45],[1,46],[1,47],[1,48],[1,49],[1,50],[1,51],[1,52],[1,53],[1,54],[1,55],[1,56],[1,57],[1,58],[1,59],[1,60],[1,61],[1,62],[1,63],[1,64],[1,65],[1,66],[1,67],[1,68],[1,69],[1,70],[1,71],[1,72],[1,73],[1,74],[1,75],[1,76],[1,77],[1,78],[1,79],[1,80],[1,81],[1,82],[1,83],[1,84],[1,85],[1,86],[1,87],[1,88],[1,89],[1,90],[1,91],[1,92],[1,93],[1,94],[1,95],[1,96],[1,97],[1,98],[1,99],[1,100],[1,101],[1,102],[1,103],[1,104],[1,105],[1,106],[1,107],[1,108],[1,109],[1,110],[1,111],[1,112],[1,113],[1,114],[1,115],[1,116],[1,117],[1,118],[1,119],[1,120],[1,121],[1,122],[1,123],[1,124],[1,125],[1,126],[1,127],[1,128],[1,129],[1,130],[1,131],[1,132],[1,133],[1,134],[1,135],[1,136],[1,137],[1,138],[1,139],[1,140],[1,141],[1,142],[1,143],[1,144],[1,145],[1,146],[1,147],[1,148],[1,149],[1,150],[1,151],[1,152],[1,153],[1,154],[1,155],[1,156],[1,157],[1,158],[1,159],[1,160]], budget = 160
- **Output:** 199


**Example 8:**

- **Input:** n = 160, present = [49,1,1,1,49,1,1,49,1,49,49,49,49,49,1,49,49,49,1,49,49,1,1,1,49,49,1,49,1,49,49,49,49,49,1,1,49,49,1,1,49,1,1,1,1,49,49,49,49,1,49,49,1,49,1,49,49,49,1,1,49,49,1,49,1,49,49,49,1,49,49,49,49,49,49,49,49,1,1,1,49,1,49,1,49,1,1,49,1,1,49,1,1,1,1,1,1,49,49,1,1,1,49,49,1,1,49,49,1,49,49,1,49,1,1,1,1,49,49,1,49,49,49,49,1,1,49,1,1,1,1,49,1,1,49,49,49,49,49,1,1,1,1,1,49,49,49,1,49,49,1,1,1,49,1,1,49,49,49,1], future = [50,10,10,10,50,10,50,50,10,10,10,50,10,50,10,50,10,50,50,10,10,10,50,50,50,50,10,10,10,50,50,50,10,10,50,50,50,10,10,50,50,10,10,10,10,10,10,50,50,50,50,50,10,50,10,50,10,10,50,50,10,10,10,10,10,10,10,50,50,10,10,50,50,50,50,50,10,10,10,50,50,10,50,10,10,50,50,50,50,50,10,50,50,10,10,50,10,10,10,10,10,50,10,50,50,10,10,10,10,10,50,50,50,50,50,10,10,50,50,50,10,50,10,50,50,50,10,10,10,50,10,10,50,10,50,50,50,50,10,50,10,10,50,50,50,10,50,50,10,50,10,50,10,50,50,10,50,50,50,10], hierarchy = [[1,2],[2,3],[3,4],[4,5],[5,6],[6,7],[7,8],[8,9],[9,10],[10,11],[11,12],[12,13],[13,14],[14,15],[15,16],[16,17],[17,18],[18,19],[19,20],[20,21],[21,22],[22,23],[23,24],[24,25],[25,26],[26,27],[27,28],[28,29],[29,30],[30,31],[31,32],[32,33],[33,34],[34,35],[35,36],[36,37],[37,38],[38,39],[39,40],[40,41],[41,42],[42,43],[43,44],[44,45],[45,46],[46,47],[47,48],[48,49],[49,50],[50,51],[51,52],[52,53],[53,54],[54,55],[55,56],[56,57],[57,58],[58,59],[59,60],[60,61],[61,62],[62,63],[63,64],[64,65],[65,66],[66,67],[67,68],[68,69],[69,70],[70,71],[71,72],[72,73],[73,74],[74,75],[75,76],[76,77],[77,78],[78,79],[79,80],[80,81],[81,82],[82,83],[83,84],[84,85],[85,86],[86,87],[87,88],[88,89],[89,90],[90,91],[91,92],[92,93],[93,94],[94,95],[95,96],[96,97],[97,98],[98,99],[99,100],[100,101],[101,102],[102,103],[103,104],[104,105],[105,106],[106,107],[107,108],[108,109],[109,110],[110,111],[111,112],[112,113],[113,114],[114,115],[115,116],[116,117],[117,118],[118,119],[119,120],[120,121],[121,122],[122,123],[123,124],[124,125],[125,126],[126,127],[127,128],[128,129],[129,130],[130,131],[131,132],[132,133],[133,134],[134,135],[135,136],[136,137],[137,138],[138,139],[139,140],[140,141],[141,142],[142,143],[143,144],[144,145],[145,146],[146,147],[147,148],[148,149],[149,150],[150,151],[151,152],[152,153],[153,154],[154,155],[155,156],[156,157],[157,158],[158,159],[159,160]], budget = 160
- **Output:** 2257


**Constraints:**

- `1 <= n <= 160`
- `present.length, future.length == n`
- `1 <= present[i], future[i] <= 50`
- `hierarchy.length == n - 1`
- `hierarchy[i] == [uiᵢ, vᵢ]`
- `1 <= uᵢ, vᵢ <= n`
- `uᵢ != vᵢ`
- `1 <= budget <= 160`
- There are no duplicate edges.
- Employee 1 is the direct or indirect boss of every employee.
- The input graph `hierarchy` is **guaranteed** to have no cycles.



**Hint:**
1. Compute `max_profit[u]` and `max_profit1[u]` for each node `u`
2. `max_profit[u]` = maximum profit in the subtree of `u` assuming the parent of `u` has not bought the stock
3. `max_profit1[u]` = maximum profit in the subtree of `u` assuming the parent of `u` has bought the stock
4. For each node `u`, consider two cases:
5. Buy the stock for `u` (at `present[u]` price if parent did not buy, or at `floor(present[u]/2)` if parent bought), then add the best `max_profit1` values of its children
6. Skip buying for `u`, then add the best `max_profit` values of its children






**Solution:**

We need to handle a tree structure where the decision to buy at a node affects its children's costs. This is a tree DP problem with knapsack-like constraints.

### Approach:

1. **Tree Representation**: Build an adjacency list to represent the company hierarchy as a tree.

2. **Dynamic Programming States**: For each node `u`, compute two DP arrays:
    - `dp0[u][c]`: Maximum profit in `u`'s subtree when **parent did NOT buy**, using budget `c`
    - `dp1[u][c]`: Maximum profit in `u`'s subtree when **parent DID buy**, using budget `c`

3. **Recursive DFS Calculation**:
    - **Leaf Nodes**: Base case where we consider buying at full or half price (if parent bought)
    - **Internal Nodes**:
        - Merge children's DP arrays using knapsack combination
        - Consider both buying and not buying the current node
        - If parent bought, current node gets discount; if not, pays full price

4. **Knapsack Merging**: Combine children's results by trying all possible budget allocations between them.

5. **Root Computation**: Start from the CEO (node 1) with no parent, using the `dp0` state.

Let's implement this solution in PHP: **[3562. Maximum Profit from Trading Stocks with Discounts](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003562-maximum-profit-from-trading-stocks-with-discounts/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $present
 * @param Integer[] $future
 * @param Integer[][] $hierarchy
 * @param Integer $budget
 * @return Integer
 */
function maxProfit($n, $present, $future, $hierarchy, $budget) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo shortestSubarrayToRemove([1, 2, 3, 10, 4, 2, 3, 5]) . "\n"; // Output: 3
echo shortestSubarrayToRemove([5, 4, 3, 2, 1]) . "\n";           // Output: 4
echo shortestSubarrayToRemove([1, 2, 3]) . "\n";                 // Output: 0
?>
```

### Explanation:

### 1. Problem Transformation
- Each employee is a tree node
- The purchase discount creates dependency: if a parent buys, children get 50% off
- We need to select a subset of nodes to buy, respecting parent-child dependencies and budget constraints

### 2. Dynamic Programming Design
For each node `u` with budget `c`:
- **Case 1**: Don't buy at `u`
    - Children cannot get discount from `u`
    - Use children's `dp0` states (their parent didn't buy)
- **Case 2**: Buy at `u`
    - Pay `present[u]` if parent didn't buy, or `floor(present[u]/2)` if parent bought
    - Children can get discount, so use their `dp1` states

### 3. Recursive Calculation Details
**Leaf Nodes (no children)**:
- Simply compute profit for buying/not buying at each budget level

**Internal Nodes**:
1. Initialize `dp_child0` and `dp_child1` to track maximum profit from children
2. For each child, merge their DP arrays with current results using nested loops over budget allocations
3. After processing all children, compute current node's DP:
    - Start with "don't buy" case (use `dp_child0`)
    - Add "buy" case: node's profit + `dp_child1` for remaining budget

### 4. Time and Space Complexity
- **Time**: O(n × budget²) - Each node merges children's DP arrays with O(budget²) knapsack merging
- **Space**: O(n × budget) for storing DP arrays during recursion

### 5. Key Optimizations
- Use 0-based indexing internally while maintaining 1-based employee IDs
- Initialize DP arrays with zeros (or negative infinity for intermediate merges)
- Handle negative profits by comparing with 0 (don't buy if unprofitable)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**