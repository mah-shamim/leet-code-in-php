1598\. Crawler Log Folder

Easy

The Leetcode file system keeps a log each time some user performs a _change folder_ operation.

The operations are described below:

- `"../"` : Move to the parent folder of the current folder. (If you are already in the main folder, **remain in the same folder**).
- `"./"` : Remain in the same folder.
- `"x/"` : Move to the child folder named `x` (This folder is **guaranteed to always exist**).

You are given a list of strings `logs` where `logs[i]` is the operation performed by the user at the <code>i<sup>th</sup></code> step.

The file system starts in the main folder, then the operations in `logs` are performed.

Return _the minimum number of operations needed to go back to the main folder after the change folder operations_.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/09/09/sample_11_1957.png)

- **Input:** logs = ["d1/","d2/","../","d21/","./"]
- **Output:** 2
- **Explanation:** Use this change folder operation "../" 2 times and go back to the main folder.

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/09/09/sample_22_1957.png)

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

**Solution:**


```
class Solution {

    /**
     * @param String[] $logs
     * @return Integer
     */
    function minOperations($logs) {
        $depth = 0;

        foreach ($logs as $log) {
            if ($log == "../") {
                if ($depth > 0) {
                    $depth--;
                }
            } elseif ($log != "./") {
                $depth++;
            }
        }

        return $depth;
    }
}
```



**Contact Links**

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001598-crawler-log-folder)**
