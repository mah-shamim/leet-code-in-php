1233\. Remove Sub-Folders from the Filesystem

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Depth-First Search`, `Trie`

Given a list of folders `folder`, return _the folders after removing all **sub-folders** in those folders_. You may return the answer in **any order**.

If a `folder[i]` is located within another `folder[j]`, it is called a **sub-folder** of it. A sub-folder of `folder[j]` must start with `folder[j]`, followed by a `"/"`. For example, `"/a/b"` is a sub-folder of `"/a"`, but `"/b"` is not a sub-folder of `"/a/b/c"`.

The format of a path is one or more concatenated strings of the form: `'/'` followed by one or more lowercase English letters.

- For example, `"/leetcode"` and `"/leetcode/problems"` are valid paths while an empty string and `"/"` are not.


**Example 1:**

- **Input:** folder = ["/a","/a/b","/c/d","/c/d/e","/c/f"]
- **Output:** ["/a","/c/d","/c/f"]
- **Explanation:** Folders "/a/b" is a subfolder of "/a" and "/c/d/e" is inside of folder "/c/d" in our filesystem.

**Example 2:**

- **Input:** folder = ["/a","/a/b/c","/a/b/d"]
- **Output:** ["/a"]
- **Explanation:** Folders "/a/b/c" and "/a/b/d" will be removed because they are subfolders of "/a".


**Example 3:**

- **Input:** folder = ["/a/b/c","/a/b/ca","/a/b/d"]
- **Output:** ["/a/b/c","/a/b/ca","/a/b/d"]



**Constraints:**

- <code>1 <= folder.length <= 4 * 10<sup>4</sup></code>
- `2 <= folder[i].length <= 100`
- `folder[i]` contains only lowercase letters and `'/'`.
- `folder[i]` always starts with the character `'/'`.
- Each folder name is **unique**.


**Hint:**
1. Sort the folders lexicographically.
2. Insert the current element in an array and then loop until we get rid of all of their subfolders, repeat this until no element is left.



**Solution:**

We can utilize a combination of sorting and string comparison. The steps below outline a solution in PHP:

1. **Sort the Folders Lexicographically**: Sorting the folder paths in lexicographical order ensures that any sub-folder will follow its parent folder immediately. For example, `"/a"` will be followed by `"/a/b"` in the sorted list, allowing us to check for sub-folder relationships easily.

2. **Identify and Filter Out Sub-Folders**: We can iterate through the sorted list, checking if the current folder path is a sub-folder of the previously added path. If it is, we skip it. If not, we add it to our result list.

3. **Implement the Solution in PHP**: We keep track of the last folder path added to the result list. If the current folder starts with this last folder and is immediately followed by a `/`, it’s a sub-folder and should be ignored.

Let's implement this solution in PHP: **[1233. Remove Sub-Folders from the Filesystem](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001233-remove-sub-folders-from-the-filesystem/solution.php)**

```php
<?php
/**
 * @param String[] $folder
 * @return String[]
 */
function removeSubfolders($folders) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$folder1 = ["/a","/a/b","/c/d","/c/d/e","/c/f"];
$folder2 = ["/a","/a/b/c","/a/b/d"];
$folder3 = ["/a/b/c","/a/b/ca","/a/b/d"];

print_r(removeSubfolders($folder1)); // Output: ["/a","/c/d","/c/f"]
print_r(removeSubfolders($folder2)); // Output: ["/a"]
print_r(removeSubfolders($folder3)); // Output: ["/a/b/c","/a/b/ca","/a/b/d"]
?>
```

### Explanation:

1. **Sorting**: The `sort()` function arranges folders in lexicographical order. This makes it easier to find sub-folder relationships because sub-folders will follow their parent folders directly.

2. **Loop through each folder**:
   - If `result` is empty (first iteration) or if the current folder path does not start with the last added folder followed by a `/`, it is not a sub-folder and is added to the `result` array.
   - If it does start with the last folder path and has a `/` immediately following, it’s a sub-folder, and we skip adding it to `result`.

3. **Result**: The function returns `result`, which contains only the root folders, excluding any sub-folders.

This approach is efficient with a time complexity of _**O(n log n)**_ due to the sorting step, and the linear scan has _**O(n)**_, making this a good solution for larger inputs within the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
