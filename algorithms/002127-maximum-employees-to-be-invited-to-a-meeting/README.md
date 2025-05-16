2127\. Maximum Employees to Be Invited to a Meeting

**Difficulty:** Hard

**Topics:** `Depth-First Search`, `Graph`, `Topological Sort`

A company is organizing a meeting and has a list of `n` employees, waiting to be invited. They have arranged for a large circular table, capable of seating **any number** of employees.

The employees are numbered from `0` to `n - 1`. Each employee has a **favorite** person and they will attend the meeting **only if** they can sit next to their favorite person at the table. The favorite person of an employee is **not** themself.

Given a **0-indexed** integer array `favorite`, where `favorite[i]` denotes the favorite person of the <code>i<sup>th</sup></code> employee, return _the **maximum number of employees** that can be invited to the meeting_.

**Example 1:**

![ex1](https://assets.leetcode.com/uploads/2021/12/14/ex1.png)

- **Input:** favorite = [2,2,1,2]
- **Output:** 3
- **Explanation:**
  The above figure shows how the company can invite employees 0, 1, and 2, and seat them at the round table.
  All employees cannot be invited because employee 2 cannot sit beside employees 0, 1, and 3, simultaneously.
  Note that the company can also invite employees 1, 2, and 3, and give them their desired seats.
  The maximum number of employees that can be invited to the meeting is 3.

**Example 2:**

- **Input:** favorite = [1,2,0]
- **Output:** 3
- **Explanation:**
  Each employee is the favorite person of at least one other employee, and the only way the company can invite them is if they invite every employee.
  The seating arrangement will be the same as that in the figure given in example 1:
- Employee 0 will sit between employees 2 and 1.
- Employee 1 will sit between employees 0 and 2.
- Employee 2 will sit between employees 1 and 0.
  The maximum number of employees that can be invited to the meeting is 3.


**Example 3:**

![ex2](https://assets.leetcode.com/uploads/2021/12/14/ex2.png)

- **Input:** favorite = [3,0,1,4,1]
- **Output:** 4
- **Explanation:**
  The above figure shows how the company will invite employees 0, 1, 3, and 4, and seat them at the round table.
  Employee 2 cannot be invited because the two spots next to their favorite employee 1 are taken.
  So the company leaves them out of the meeting.
  The maximum number of employees that can be invited to the meeting is 4.



**Constraints:**

- `n == favorite.length`
- <code>2 <= n <= 10<sup>5</sup></code>
- `0 <= favorite[i] <= n - 1`
- `favorite[i] != i`


**Hint:**
1. From the given array `favorite`, create a graph where for every index i, there is a directed edge from `favorite[i]` to `i`. The graph will be a combination of cycles and chains of acyclic edges. Now, what are the ways in which we can choose employees to sit at the table?
2. The first way by which we can choose employees is by selecting a cycle of the graph. It can be proven that in this case, the employees that do not lie in the cycle can never be seated at the table (unless the cycle has a length of 2).
3. The second way is by combining acyclic chains. At most two chains can be combined by a cycle of length 2, where each chain ends on one of the employees in the cycle.



**Solution:**

The solution involves analyzing cycles and chains in the graph formed by the `favorite` array.

Let's implement this solution in PHP: **[2127. Maximum Employees to Be Invited to a Meeting](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002127-maximum-employees-to-be-invited-to-a-meeting/solution.php)**

```php
<?php
/**
 * @param Integer[] $favorite
 * @return Integer
 */
function maximumInvitations($favorite) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$favorites1 = [2, 2, 1, 2];
$favorites2 = [1, 2, 0];
$favorites3 = [3, 0, 1, 4, 1];

echo maximumInvitations($favorites1) . "\n"; // Output: 3
echo maximumInvitations($favorites2) . "\n"; // Output: 3
echo maximumInvitations($favorites3) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Graph Representation**:
   - Each employee points to their favorite, forming a directed graph.
   - An array `indegree` is used to keep track of how many employees point to each person.

2. **Topological Sort for Chains**:
   - Employees without incoming edges (indegree = 0) are processed to calculate the chain lengths leading to cycles.

3. **Cycle Detection**:
   - Employees are visited to detect cycles. Once a cycle is found:
      - For cycles of length 2, the chains attached to each node of the cycle are merged.
      - For longer cycles, the entire cycle's length is considered.

4. **Result**:
   - The maximum of all cycle lengths and the sum of the lengths of merged chains from 2-length cycles is returned.

This approach ensures efficiency with a time complexity of _**O(n)**_, making it suitable for large inputs up to _**10<sup>5</sup>**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**