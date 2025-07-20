1948\. Delete Duplicate Folders in System

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `String`, `Trie`, `Hash Function`

Due to a bug, there are many duplicate folders in a file system. You are given a 2D array `paths`, where `paths[i]` is an array representing an absolute path to the <code>i<sup>th</sup></code> folder in the file system.

- For example, `["one", "two", "three"]` represents the path `"/one/two/three"`.

Two folders (not necessarily on the same level) are **identical** if they contain the **same non-empty** set of identical subfolders and underlying subfolder structure. The folders **do not** need to be at the root level to be identical. If two or more folders are **identical**, then **mark** the folders as well as all their subfolders.

- For example, folders "/a" and "/b" in the file structure below are identical. They (as well as their subfolders) should **all** be marked:
  - `/a`
  - `/a/x`
  - `/a/x/y`
  - `/a/z`
  - `/b`
  - `/b/x`
  - `/b/x/y`
  - `/b/z`
- However, if the file structure also included the path `"/b/w"`, then the folders `"/a"` and `"/b"` would not be identical. Note that `"/a/x"` and `"/b/x"` would still be considered identical even with the added folder.

Once all the identical folders and their subfolders have been marked, the file system will **delete** all of them. The file system only runs the deletion once, so any folders that become identical after the initial deletion are not deleted.

Return _the 2D array `ans` containing the paths of the **remaining** folders after deleting all the marked folders. The paths may be returned in **any** order_.

**Example 1:**

![lc-dupfolder1](https://assets.leetcode.com/uploads/2021/07/19/lc-dupfolder1.jpg)

- **Input:** paths = [["a"],["c"],["d"],["a","b"],["c","b"],["d","a"]]
- **Output:** [["d"],["d","a"]]
- **Explanation:** The file structure is as shown.
  Folders "/a" and "/c" (and their subfolders) are marked for deletion because they both contain an empty folder named "b".

**Example 2:**

![lc-dupfolder2](https://assets.leetcode.com/uploads/2021/07/19/lc-dupfolder2.jpg)

- **Input:** paths = [["a"],["c"],["a","b"],["c","b"],["a","b","x"],["a","b","x","y"],["w"],["w","y"]]
- **Output:** [["c"],["c","b"],["a"],["a","b"]]
- **Explanation:** The file structure is as shown.
  Folders "/a/b/x" and "/w" (and their subfolders) are marked for deletion because they both contain an empty folder named "y".
  Note that folders "/a" and "/c" are identical after the deletion, but they are not deleted because they were not marked beforehand.

**Example 3:**

![lc-dupfolder3](https://assets.leetcode.com/uploads/2021/07/19/lc-dupfolder3.jpg)

- **Input:** paths = [["a","b"],["c","d"],["c"],["a"]]
- **Output:** [["c"],["c","d"],["a"],["a","b"]]
- **Explanation:** All folders are unique in the file system.
  Note that the returned array can be in a different order as the order does not matter.

**Constraints:**

- <code>1 <= paths.length <= 2 * 10<sup>4</sup></code>
- `1 <= paths[i].length <= 500`
- `1 <= paths[i][j].length <= 10`
- <code>1 <= sum(paths[i][j].length) <= 2 * 10<sup>5</sup></code>
- `path[i][j]` consists of lowercase English letters.
- No two paths lead to the same folder.
- For any folder not at the root level, its parent folder will also be in the input.


**Hint:**
1. Can we use a trie to build the folder structure?
2. Can we utilize hashing to hash the folder structures?


**Similar Questions:**
1. [609. Find Duplicate File in System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000609-find-duplicate-file-in-system)
2. [652. Find Duplicate Subtrees](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000652-find-duplicate-subtrees)






**Solution:**

We need to identify and delete duplicate folders in a file system. Two folders are considered identical if they contain the same non-empty set of identical subfolders and the same underlying subfolder structure. The solution involves building a trie to represent the folder structure, using a post-order DFS to compute a unique hash for each folder's subtree, marking duplicate folders, and then collecting the remaining folders after deletion.

### Approach
1. **Build the Trie**: Construct a trie (prefix tree) where each node represents a folder. The root node is virtual and does not correspond to any folder in the paths. Each path from the root to a node represents an absolute path in the file system.
2. **Compute Hash for Subtrees**: Using a post-order DFS, compute a unique hash for each node's subtree. The hash is constructed by concatenating the folder names of the children in lexicographical order, along with their respective subtree hashes, wrapped in parentheses. This ensures that identical subtrees have the same hash.
3. **Mark Duplicate Folders**: After computing the hashes, iterate through the nodes. For each node with children (non-leaf), check if its hash appears at least twice (indicating a duplicate subtree). Mark such nodes and their entire subtrees for deletion.
4. **Collect Remaining Folders**: Perform a BFS or DFS to traverse the trie. For each node, if it is not marked for deletion, add its path to the result list. Skip nodes marked for deletion and their subtrees.

Let's implement this solution in PHP: **[1948. Delete Duplicate Folders in System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001948-delete-duplicate-folders-in-system/solution.php)**

```php
<?php
class Node {
    public $children = [];
    public $hash = '';
    public $deleted = false;
}

/**
 * @param String[][] $paths
 * @return String[][]
 */
function deleteDuplicateFolder($paths) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$paths1 = [["a"],["c"],["d"],["a","b"],["c","b"],["d","a"]];
$paths2 = [["a"],["c"],["a","b"],["c","b"],["a","b","x"],["a","b","x","y"],["w"],["w","y"]];
$paths3 = [["a","b"],["c","d"],["c"],["a"]];

print_r(deleteDuplicateFolder($paths1));
print_r(deleteDuplicateFolder($paths2));
print_r(deleteDuplicateFolder($paths3));
?>
```

### Explanation:

1. **Building the Trie**: The trie is constructed by iterating through each path. Each folder in a path is added as a child node of the current node, creating the trie structure.
2. **Computing Subtree Hashes**: Using a post-order DFS, each node's hash is computed by concatenating its children's names and their hashes in lexicographical order, wrapped in parentheses. This hash uniquely represents the subtree structure.
3. **Marking Duplicates**: Nodes with non-empty children are checked for duplicate hashes. If a hash appears at least twice, the corresponding node and its entire subtree are marked for deletion.
4. **Collecting Results**: The trie is traversed using BFS. For each node, if it is not marked for deletion, its path is added to the result list. Nodes marked for deletion and their subtrees are skipped during traversal.

This approach efficiently identifies and deletes duplicate folders while preserving the remaining folder structure, meeting the problem requirements. The complexity is linear with respect to the number of nodes and edges in the trie.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**