1598\. Crawler Log Folder

**Difficulty:** Easy

**Topics:** `Array`, `String`, `Stack`

The Leetcode file system keeps a log each time some user performs a _change folder_ operation.

The operations are described below:

- `"../"` : Move to the parent folder of the current folder. (If you are already in the main folder, **remain in the same folder**).
- `"./"` : Remain in the same folder.
- `"x/"` : Move to the child folder named `x` (This folder is **guaranteed to always exist**).

You are given a list of strings `logs` where `logs[i]` is the operation performed by the user at the <code>i<sup>th</sup></code> step.

The file system starts in the main folder, then the operations in `logs` are performed.

Return _the minimum number of operations needed to go back to the main folder after the change folder operations_.

**Example 1:**

![sample_11_1957](https://assets.leetcode.com/uploads/2020/09/09/sample_11_1957.png)

- **Input:** logs = ["d1/","d2/","../","d21/","./"]
- **Output:** 2
- **Explanation:** Use this change folder operation "../" 2 times and go back to the main folder.

**Example 2:**

![sample_22_1957](https://assets.leetcode.com/uploads/2020/09/09/sample_22_1957.png)

- **Input:** logs = ["d1/","d2/","./","d3/","../","d31/"]
- **Output:** 3

**Example 3:**

- **Input:** logs = ["d1/","../","../","../"]
- **Output:** 0

**Constraints:**

- <code>1 <= logs.length <= 10<sup>3</sup></code>
- `2 <= logs[i].length <= 10`
- `logs[i]` contains lowercase English letters, digits, `'.'`, and `'/'`.
- `logs[i]` follows the format described in the statement.
- Folder names consist of lowercase English letters and digits.


**Hint:**
1. Simulate the process but don’t move the pointer beyond the main folder.


**Solution:**

We need to determine the minimum number of operations required to return to the main folder after performing a series of change folder operations. The operations can be moving to a parent folder, staying in the current folder, or moving to a child folder. The solution involves simulating these operations while keeping track of the current depth from the main folder.

### Approach
1. **Initialization**: Start at the main folder, represented by a depth of 0.
2. **Processing Logs**: For each operation in the logs:
    - **Move to Parent Folder ("../")**: If the current depth is greater than 0, decrement the depth by 1. If already at the main folder (depth 0), the depth remains unchanged.
    - **Stay in Current Folder ("./")**: The depth remains unchanged.
    - **Move to Child Folder ("x/")**: Increment the depth by 1, as moving into a child folder increases the depth from the main folder.
3. **Result Calculation**: After processing all operations, the depth value represents the number of "../" operations needed to return to the main folder. This depth is returned as the result.

Let's implement this solution in PHP: **[1598. Crawler Log Folder](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001598-crawler-log-folder/solution.php)**

```php
<?php
/**
 * @param String[] $logs
 * @return Integer
 */
function minOperations($logs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$logs1 = array("d1/", "d2/", "../", "d21/", "./");
$logs2 = array("d1/", "d2/", "./", "d3/", "../", "d31/");
$logs3 = array("d1/", "../", "../", "../");

echo minOperations($logs1) . "\n"; // Output: 2
echo minOperations($logs2) . "\n"; // Output: 3
echo minOperations($logs3) . "\n"; // Output: 0
?>
```

### Explanation:

- **Initialization**: The variable `$depth` is initialized to 0, indicating we start at the main folder.
- **Loop Through Logs**: For each log entry:
    - **Parent Folder ("../")**: If the current depth is greater than 0, it means we are not at the main folder, so we decrement `$depth` by 1. If we are already at the main folder, `$depth` remains 0.
    - **Current Folder ("./")**: The depth remains unchanged as we stay in the current folder.
    - **Child Folder ("x/")**: Moving into a child folder increases the depth by 1.
- **Result**: After processing all logs, `$depth` holds the number of steps (i.e., "../" operations) needed to return to the main folder. This value is returned as the result.

This approach efficiently tracks the current folder depth by processing each operation in sequence, ensuring optimal performance with a linear pass through the logs array. The solution handles edge cases such as staying at the main folder when encountering "../" operations at depth 0.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**