407\. Trapping Rain Water II

**Difficulty:** Hard

**Topics:** `Array`, `Breadth-First Search`, `Heap (Priority Queue)`, `Matrix`

Given an `m x n` integer matrix `heightMap` representing the height of each unit cell in a 2D elevation map, return _the volume of water it can trap after raining_.

**Example 1:**

![trap1-3d](https://assets.leetcode.com/uploads/2021/04/08/trap1-3d.jpg)

- **Input:** heightMap = [[1,4,3,1,3,2],[3,2,1,3,2,4],[2,3,3,2,3,1]]
- **Output:** 4
- **Explanation:** After the rain, water is trapped between the blocks.
  We have two small ponds 1 and 3 units trapped.
  The total volume of water trapped is 4.

**Example 2:**

![trap2-3d](https://assets.leetcode.com/uploads/2021/04/08/trap2-3d.jpg)

- **Input:** heightMap = [[3,3,3,3,3],[3,2,2,2,3],[3,2,1,2,3],[3,2,2,2,3],[3,3,3,3,3]]
- **Output:** 10



**Constraints:**

- `m == heightMap.length`
- `n == heightMap[i].length`
- `1 <= m, n <= 200`
- <code>0 <= heightMap[i][j] <= 2 * 10<sup>4</sup></code>


**Solution:**

The "Trapping Rain Water II" problem is a challenging computational problem that requires us to compute the volume of water trapped after raining on a 2D elevation map represented as a matrix. This problem extends the classic "Trapping Rain Water" problem to two dimensions, making the solution more complex due to the need to consider water flow in all directions.


## **Key Points**
1. **Matrix Representation**: The `heightMap` matrix contains the elevation of each cell.
2. **Boundary Constraints**: Water cannot flow out of the boundary cells.
3. **Heap Data Structure**: A min-heap (priority queue) is used to simulate the water levels dynamically.
4. **Visited Matrix**: To prevent revisiting cells, we track visited nodes.


## **Approach**
The solution leverages a **Breadth-First Search (BFS)** approach, guided by a **priority queue (min-heap)**:
1. Add all boundary cells to the min-heap and mark them as visited.
2. Process cells in increasing height order:
   - For each cell, attempt to "trap" water in its neighbors.
   - Push neighboring cells into the heap with updated height values.
3. Accumulate the trapped water volume based on the height difference between the current cell and its neighbors.


## **Plan**
1. **Initialization**:
   - Define matrix dimensions and edge cases.
   - Initialize a min-heap for boundary cells.
   - Create a `visited` matrix.

2. **Insert Boundary Cells**:
   - Push all boundary cells into the heap with their height values.
   - Mark them as visited.

3. **BFS Traversal**:
   - While the heap is not empty, extract the cell with the smallest height.
   - Check all its neighbors and calculate trapped water:
      - If the neighbor is lower, the height difference contributes to trapped water.
      - Update the neighbor's height to the current cell's height if higher.
   - Push the neighbor into the heap and mark it visited.

4. **Return Result**:
   - The accumulated water volume represents the trapped rainwater.

Let's implement this solution in PHP: **[407. Trapping Rain Water II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000407-trapping-rain-water-ii/solution.php)**

```php
<?php
/**
 * @param Integer[][] $heightMap
 * @return Integer
 */
function trapRainWater($heightMap) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$heightMap1 = [[1, 4, 3, 1, 3, 2], [3, 2, 1, 3, 2, 4], [2, 3, 3, 2, 3, 1]];
$heightMap2 = [[3, 3, 3, 3, 3], [3, 2, 2, 2, 3], [3, 2, 1, 2, 3], [3, 2, 2, 2, 3], [3, 3, 3, 3, 3]];

echo trapRainWater($heightMap1) . "\n"; // Output: 4
echo trapRainWater($heightMap2) . "\n"; // Output: 10
?>
```

### Explanation:

1. **Boundary Initialization**:
   - All boundary cells are added to the heap to form the outer walls of the container.

2. **Heap Extraction**:
   - Extract the cell with the lowest height, ensuring that water flows only outward, not inward.

3. **Neighbor Exploration**:
   - For each neighbor:
      - Check if it’s within bounds and unvisited.
      - Calculate the water trapped as `max(0, currentHeight - neighborHeight)`.
      - Push the updated neighbor height into the heap.

4. **Accumulate Water**:
   - Add the trapped water for each neighbor to the total.


## **Example Walkthrough**
### Input:
```php
$heightMap = [
    [1, 4, 3, 1, 3, 2],
    [3, 2, 1, 3, 2, 4],
    [2, 3, 3, 2, 3, 1]
];
```
### Steps:
1. **Boundary Cells**:
   - Push cells from the boundary into the heap with their heights:
      - Example: `(0, 0, 1)`, `(0, 1, 4)`, etc.

2. **Heap Traversal**:
   - Extract cell `(0, 0, 1)` (lowest height).
   - Check neighbors, calculate water trapped:
      - For neighbor `(1, 0)`: Water trapped = `max(0, 1 - 3) = 0`.

3. **Trapped Water**:
   - Continue processing until all cells are visited:
      - Total trapped water = `4`.


## **Time Complexity**
1. **Heap Operations**:
   - Each cell is pushed and popped from the heap once: `O(m * n * log(m * n))`.

2. **Neighbor Iteration**:
   - Each cell has up to 4 neighbors: `O(m * n)`.

### **Total Complexity**:
**`O(m * n * log(m * n))`**


## **Output for Example**
```php
$heightMap = [
    [1, 4, 3, 1, 3, 2],
    [3, 2, 1, 3, 2, 4],
    [2, 3, 3, 2, 3, 1]
];
echo trapRainWater($heightMap); // Output: 4
```

The "Trapping Rain Water II" problem demonstrates the power of advanced data structures like priority queues combined with BFS. By simulating the flow of water in a 2D elevation map, we can efficiently compute the total trapped water. This solution is optimal for handling large matrices due to its logarithmic heap operations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
