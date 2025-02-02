1752\. Check if Array Is Sorted and Rotated

**Difficulty:** Easy

**Topics:** `Array`

Given an array `nums`, return `true` _if the array was originally sorted in non-decreasing order, then rotated **some** number of positions (including zero)_. Otherwise, return `false`.

There may be **duplicates** in the original array.

**Note:** An array `A` rotated by `x` positions results in an array `B` of the same length such that `A[i] == B[(i+x) % A.length]`, where `%` is the modulo operation.

**Example 1:**

- **Input:** nums = [3,4,5,1,2]
- **Output:** true
- **Explanation:** [1,2,3,4,5] is the original sorted array.
  You can rotate the array by x = 3 positions to begin on the the element of value 3: [3,4,5,1,2].

**Example 2:**

- **Input:** nums = [2,1,3,4]
- **Output:** false
- **Explanation:** There is no sorted array once rotated that can make nums.


**Example 3:**

- **Input:** nums = [1,2,3]
- **Output:** true
- **Explanation:** [1,2,3] is the original sorted array.
  You can rotate the array by x = 0 positions (i.e. no rotation) to make nums.



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. Brute force and check if it is possible for a sorted array to start from each position.



**Solution:**

We need to determine if the given array can be obtained by rotating a sorted array in non-decreasing order. Here's a step-by-step approach to achieve this:

1. **Check if the array is already sorted:** If the array is already sorted, it means it can be rotated 0 positions to get the same array, so we should return `true`.

2. **Find the pivot point:** The pivot point is where the order drops, i.e., where `nums[i] > nums[i+1]`. This pivot point indicates the rotation point.

3. **Check the order:** After finding the pivot, we need to ensure that the array is sorted in non-decreasing order before and after the pivot.

4. **Handle duplicates:** If there are duplicates, we need to ensure that the pivot is the only point where the order drops.

Let's implement this solution in PHP: **[1752. Check if Array Is Sorted and Rotated](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001752-check-if-array-is-sorted-and-rotated/solution.php)**

```php
<?php
function check($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [3,4,5,1,2];
$nums2 = [2,1,3,4];
$nums3 = [1,2,3];

var_dump(check($nums1)); // Output: bool(true)
var_dump(check($nums2)); // Output: bool(false)
var_dump(check($nums3)); // Output: bool(true)
?>
```

### Explanation:

1. **Identify Breaks in Sorted Order**:
   - The array is scanned, and we count how many times the current element is greater than the next element (considering rotation using modulo operator).
   - A "break" is where the sorting order is violated.

2. **Validating Rotation**:
   - For a sorted and rotated array, there should be **at most one break** in the sorting order.

3. **Return the Result**:
   - If the number of breaks exceeds one, the array cannot be considered sorted and rotated.

### Complexity:
- **Time Complexity**: _**O(n)**_ — Single loop to traverse the array.
- **Space Complexity**: _**O(1)**_ — No additional storage used.

This approach ensures that we correctly identify if the array can be obtained by rotating a sorted array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**