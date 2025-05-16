2570\. Merge Two 2D Arrays by Summing Values solution

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Two Pointers`

You are given two **2D** integer arrays nums1 and nums2.


* <code>nums1[i] = [id<sub>i</sub>, val<sub>i</sub>]</code> indicate that the number with the id <code>id<sub>i</sub></code> has a value equal to <code>val<sub>i</sub></code>.
* <code>nums2[i] = [id<sub>i</sub>, val<sub>i</sub>]</code> indicate that the number with the id <code>id<sub>i</sub></code> has a value equal to <code>val<sub>i</sub></code>.


Each array contains **unique** ids and is sorted in **ascending** order by id.

Merge the two arrays into one array that is sorted in ascending order by id, respecting the following conditions:

* Only ids that appear in at least one of the two arrays should be included in the resulting array.

* Each id should be included **only once** and its value should be the sum of the values of this id in the two arrays. If the id does not exist in one of the two arrays then its value in that array is considered to be `0`.

Return <i>the resulting array</i>. The returned array must be sorted in ascending order by id.


**Example 1:**

- **Input:** nums1 = [[1,2],[2,3],[4,5]], nums2 = [[1,4],[3,2],[4,1]]
- **Output:** [[1,6],[2,3],[3,2],[4,6]]
- **Explanation:** The resulting array contains the following:
    - id = 1, the value of this id is 2 + 4 = 6.
    - id = 2, the value of this id is 3.
    - id = 3, the value of this id is 2.
    - id = 4, the value of this id is 5 + 1 = 6.

**Example 2:**

- **Input:** nums1 = [[2,4],[3,6],[5,5]], nums2 = [[1,3],[4,3]]
- **Output:** [[1,3],[2,4],[3,6],[4,3],[5,5]]
- **Explanation:** There are no common ids, so we just include each id with its value in the resulting list.

**Constraints:**

* <code>1 <= nums1.length, nums2.length <= 200</code>
* <code>nums1[i].length == nums2[j].length == 2</code>
* <code>1 <= id<sub>i</sub>, val<sub>i</sub> <= 1000</code>
* Both arrays contain unique ids.
* Both arrays are in strictly ascending order by id.


**Hint:**
1. Use a dictionary/hash map to keep track of the indices and their sum values.



**Solution:**

The problem requires merging two 2D arrays, `nums1` and `nums2`, where each sub-array contains an `id` and a corresponding `value`. The goal is to combine these arrays by summing the values of the same `id` and ensuring that the final result is sorted in ascending order by `id`. If an `id` appears only in one array, its value is included from that array, and the other is treated as `0`. The merged result must only include each `id` once and should be sorted by `id`.

### Key Points
- Both arrays are sorted by `id`.
- The values associated with the same `id` should be summed.
- The final result should contain each `id` once, sorted in ascending order.
- If an `id` is missing in one of the arrays, its value is considered `0` in the merging process.
- Both arrays contain unique `id` values, and we need to maintain the strict order.

### Approach
To solve the problem, we will utilize a **two-pointer** approach to traverse both arrays simultaneously. The idea is to compare the `id` values from both arrays and merge them accordingly:
1. If the `id` from `nums1` is smaller, add it to the result and move the pointer in `nums1`.
2. If the `id` from `nums2` is smaller, add it to the result and move the pointer in `nums2`.
3. If the `id`s are equal, sum their values and add the combined result to the merged array.

We'll also take advantage of **a dictionary (hash map)** to track the sum of the values of the same `id` across both arrays if needed, but the two-pointer approach simplifies the task.

### Plan
1. Initialize two pointers, `i` and `j`, to traverse `nums1` and `nums2` respectively.
2. Create an empty result array to store the merged data.
3. Use a while loop to iterate through both arrays and compare the `id` values.
4. If the `id`s match, sum the values and add the result to the merged array.
5. If one of the arrays is exhausted, continue adding the remaining elements of the other array.
6. Return the merged array sorted by `id`.

Let's implement this solution in PHP: **[2570. Merge Two 2D Arrays by Summing Values solution](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002570-merge-two-2d-arrays-by-summing-values/solution.php)**

```php
<?php
/**
 * @param Integer[][] $nums1
 * @param Integer[][] $nums2
 * @return Integer[][]
 */
function mergeArrays(array $nums1, array $nums2): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [[1,2],[2,3],[4,5]];
$nums2 = [[1,4],[3,2],[4,1]];
print_r(mergeArrays($nums1, $nums2)); // Output: [[1,6],[2,3],[3,2],[4,6]]

// Example 2
$nums1 = [[2,4],[3,6],[5,5]];
$nums2 = [[1,3],[4,3]];
print_r(mergeArrays($nums1, $nums2)); // Output: [[1,3],[2,4],[3,6],[4,3],[5,5]]
?>
```

### Explanation:

1. **Initial Setup**: We start by initializing two pointers, `i` for `nums1` and `j` for `nums2`. We also prepare an empty array `result` to store the merged output.
2. **Iterate through both arrays**: We loop while either pointer is within bounds. We compare the `id`s from both arrays:
    - If the `id` from `nums1` is smaller, we add it to `result`.
    - If the `id` from `nums2` is smaller, we add it to `result`.
    - If the `id`s are equal, we sum their values and add the result to `result`.
3. **Handling Remaining Elements**: If one array is exhausted before the other, the remaining elements from the other array are directly added to the result since they are already sorted.
4. **Return the Result**: Once all elements are processed, return the merged result.

### Example Walkthrough

#### Example 1:
#### **Input:**
```php
$nums1 = [[1,2], [2,3], [4,5]];
$nums2 = [[1,4], [3,2], [4,1]];
```
#### **Step-by-Step Execution:**
| Step | `nums1[i]` | `nums2[j]` | Action | Result |
|------|-----------|-----------|--------|--------|
| 1    | `[1,2]`   | `[1,4]`   | IDs match → Sum (2+4) | `[[1,6]]` |
| 2    | `[2,3]`   | `[3,2]`   | `2 < 3`, add `[2,3]` | `[[1,6], [2,3]]` |
| 3    | `[4,5]`   | `[3,2]`   | `4 > 3`, add `[3,2]` | `[[1,6], [2,3], [3,2]]` |
| 4    | `[4,5]`   | `[4,1]`   | IDs match → Sum (5+1) | `[[1,6], [2,3], [3,2], [4,6]]` |

#### **Output:**
```php
[[1,6], [2,3], [3,2], [4,6]]
```

#### Example 2:
#### **Input:**
```php
$nums1 = [[2,4], [3,6], [5,5]];
$nums2 = [[1,3], [4,3]];
```
#### **Step-by-Step Execution:**
| Step | `nums1[i]` | `nums2[j]` | Action | Result |
|------|-----------|-----------|--------|--------|
| 1    | `[2,4]`   | `[1,3]`   | `1 < 2`, add `[1,3]` | `[[1,3]]` |
| 2    | `[2,4]`   | `[2,4]`   | IDs match → Sum (4+0) | `[[1,3], [2,4]]` |
| 3    | `[3,6]`   | `[4,3]`   | `3 < 4`, add `[3,6]` | `[[1,3], [2,4], [3,6]]` |
| 4    | `[5,5]`   | `[4,3]`   | `4 < 5`, add `[4,3]` | `[[1,3], [2,4], [3,6], [4,3]]` |
| 5    | `[5,5]`   | `-`       | Add remaining `[5,5]` | `[[1,3], [2,4], [3,6], [4,3], [5,5]]` |

#### **Output:**
```php
[[1,3], [2,4], [3,6], [4,3], [5,5]]
```

### Time Complexity

The solution **processes each element once** using the two-pointer technique:
- **Merging sorted lists** takes **O(N + M)**, where `N` is the length of `nums1` and `M` is the length of `nums2`.
- Additional operations (comparison, insertion) are constant time **O(1)**.
- **Final Complexity:** **O(N + M)**, which is optimal.

### Output for Example
For the inputs:
```php
nums1 = [[1, 2], [2, 3], [4, 5]];
nums2 = [[1, 4], [3, 2], [4, 1]];
```
The output is:
```php
[[1, 6], [2, 3], [3, 2], [4, 6]]
```

For the inputs:
```php
nums1 = [[2, 4], [3, 6], [5, 5]];
nums2 = [[1, 3], [4, 3]];
```
The output is:
```php
[[1, 3], [2, 4], [3, 6], [4, 3], [5, 5]]
```

- The **two-pointer approach** ensures an efficient and **linear-time** merge.
- The **space complexity is O(1) (excluding the output array)** since we only use a few extra variables.
- This approach is **ideal** due to the given constraint that both arrays are **pre-sorted**.

This method efficiently solves the problem while keeping the implementation simple and easy to understand. 🚀

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**