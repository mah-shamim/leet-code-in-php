1122\. Relative Sort Array

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sorting`, `Counting Sort`

Given two arrays `arr1` and `arr2`, the elements of `arr2` are distinct, and all elements in `arr2` are also in `arr1`.

Sort the elements of `arr1` such that the relative ordering of items in `arr1` are the same as in `arr2`. Elements that do not appear in `arr2` should be placed at the end of `arr1` in **ascending** order.

**Example 1:**

- **Input:** arr1 = [2,3,1,3,2,4,6,7,9,2,19], arr2 = [2,1,4,3,9,6]
- **Output:** [2,2,2,1,4,3,3,9,6,7,19]

**Example 2:**

- **Input:** arr1 = [28,6,22,8,44,17], arr2 = [22,28,8,6]
- **Output:** [22,28,8,6,17,44]

**Constraints:**

- <code>1 <= arr1.length, arr2.length <= 1000</code>
- <code>0 <= arr1[i], arr2[i] <= 1000</code>
- All the elements of `arr2` are **distinct**.
- Each `arr2[i]` is in `arr1`.


**Hint:**
1. Using a hashmap, we can map the values of arr2 to their position in arr2.
2. After, we can use a custom sorting function.



**Solution:**

The problem requires sorting an array `arr1` such that its elements are rearranged to match the relative order of elements found in another array `arr2`. Elements from `arr2` should appear in the same order in `arr1`, and any remaining elements from `arr1` that are not present in `arr2` should be placed at the end in ascending order.

### **Key Points:**
- Elements of `arr2` are distinct.
- All elements in `arr2` are guaranteed to be present in `arr1`.
- Any element in `arr1` that is not in `arr2` should appear at the end, sorted in ascending order.

### **Approach:**

1. **Use a Hashmap:** The order of `arr2` is essential. By storing the index of each element in `arr2`, we can sort `arr1` based on the relative order of `arr2`. We will use the values in `arr2` as keys to determine the order of elements in `arr1`.

2. **Custom Sorting:** We need to implement a sorting function that first places elements from `arr2` in the correct order, then sorts the remaining elements (not found in `arr2`) in ascending order.

3. **Mark Processed Elements:** To avoid processing the same element multiple times in `arr1`, we can mark elements already accounted for by setting them to a special value (like `-1`).

### **Plan:**

1. **Create a hashmap for the positions of `arr2` elements.** This hashmap will help map the relative order of elements in `arr2` to positions.

2. **Traverse `arr1` and place elements in the `result` array** based on the relative order of `arr2`. If an element in `arr1` matches an element in `arr2`, add it to the `result` and mark it as visited by setting it to `-1`.

3. **Sort the remaining elements in `arr1`** that do not appear in `arr2 in ascending order and append them to the result.

4. **Return the final sorted `arr1`.**

Let's implement this solution in PHP: **[1122. Relative Sort Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001122-relative-sort-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @return Integer[]
 */
function relativeSortArray($arr1, $arr2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$arr1 = [2,3,1,3,2,4,6,7,9,2,19];
$arr2 = [2,1,4,3,9,6];
echo relativeSortArray($arr1, $arr2); // Output: [2,2,2,1,4,3,3,9,6,7,19]

$arr1 = [28,6,22,8,44,17];
$arr2 = [22,28,8,6];
echo relativeSortArray($arr1, $arr2); // Output: [22,28,8,6,17,44]
?>
```

### Explanation:

1. We first traverse through `arr2` and check each of its elements in `arr1`. Each time we find a match, we add it to the result array.

2. After we've processed all elements in `arr2`, we then sort the remaining elements in `arr1` (those not found in `arr2`) and append them at the end of the result array.

3. This approach ensures that elements from `arr2` appear in the specified order, while elements not found in `arr2` are placed at the end in ascending order.

### **Example Walkthrough:**

#### Example 1:
- **Input:** `arr1 = [2,3,1,3,2,4,6,7,9,2,19]`, `arr2 = [2,1,4,3,9,6]`

  **Steps:**
    1. Traverse `arr2`:
        - First, process `2`, add all `2`s from `arr1` to `result` → `result = [2, 2, 2]`.
        - Then, process `1`, add `1` from `arr1` to `result` → `result = [2, 2, 2, 1]`.
        - Process `4`, add `4` from `arr1` to `result` → `result = [2, 2, 2, 1, 4]`.
        - Process `3`, add both `3`s from `arr1` to `result` → `result = [2, 2, 2, 1, 4, 3, 3]`.
        - Process `9`, add `9` from `arr1` to `result` → `result = [2, 2, 2, 1, 4, 3, 3, 9]`.
        - Process `6`, add `6` from `arr1` to `result` → `result = [2, 2, 2, 1, 4, 3, 3, 9, 6]`.

    2. Remaining elements in `arr1` after processing `arr2` are `7` and `19`. Sort them and append → `result = [2, 2, 2, 1, 4, 3, 3, 9, 6, 7, 19]`.

  **Output:** `[2, 2, 2, 1, 4, 3, 3, 9, 6, 7, 19]`.

#### Example 2:
- **Input:** `arr1 = [28,6,22,8,44,17]`, `arr2 = [22,28,8,6]`

  **Steps:**
    1. Traverse `arr2`:
        - Process `22`, add it from `arr1` → `result = [22]`.
        - Process `28`, add it from `arr1` → `result = [22, 28]`.
        - Process `8`, add it from `arr1` → `result = [22, 28, 8]`.
        - Process `6`, add it from `arr1` → `result = [22, 28, 8, 6]`.

    2. Remaining elements in `arr1` after processing `arr2` are `44` and `17`. Sort them and append → `result = [22, 28, 8, 6, 17, 44]`.

  **Output:** `[22, 28, 8, 6, 17, 44]`.

### **Time Complexity:**

- **Traversing `arr2` and `arr1`:** O(n * m), where `n` is the length of `arr1` and `m` is the length of `arr2`.
- **Sorting the remaining elements of `arr1`:** O(n log n).
- The overall time complexity is O(n * m + n log n), which is efficient given the problem constraints.

### **Output for Example:**

1. **Example 1:**
    - **Input:** `arr1 = [2,3,1,3,2,4,6,7,9,2,19]`, `arr2 = [2,1,4,3,9,6]`
    - **Output:** `[2, 2, 2, 1, 4, 3, 3, 9, 6, 7, 19]`

2. **Example 2:**
    - **Input:** `arr1 = [28,6,22,8,44,17]`, `arr2 = [22,28,8,6]`
    - **Output:** `[22, 28, 8, 6, 17, 44]`


The solution efficiently sorts `arr1` based on the relative order of `arr2` while placing remaining elements in ascending order. By using a hashmap to map the order and a custom sorting strategy, this problem is solved optimally. The algorithm works well within the provided constraints and efficiently handles the sorting process.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
