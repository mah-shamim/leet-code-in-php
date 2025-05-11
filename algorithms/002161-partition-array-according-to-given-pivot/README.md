2161\. Partition Array According to Given Pivot

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Simulation`

You are given a **0-indexed** integer array `nums` and an integer `pivot`. Rearrange `nums` such that the following conditions are satisfied:

- Every element less than `pivot` appears **before** every element greater than `pivot`.
- Every element equal to `pivot` appears **in between** the elements less than and greater than `pivot`.
- The **relative order** of the elements less than `pivot` and the elements greater than `pivot` is maintained.
  - More formally, consider every <code>p<sub>i</sub></code>, <code>p<sub>j</sub></code> where <code>p<sub>i</sub></code> is the new position of the <code>i<sup>th</sup></code> element and <code>p<sub>j</sub></code> is the new position of the <code>j<sup>th</sup></code> element. If `i < j` and **both** elements are smaller (_or larger_) than `pivot`, then <code>p<sub>i</sub> < p<sub>j</sub></code>.

Return _`nums` after the rearrangement_.

**Example 1:**

- **Input:** nums = [9,12,5,10,14,3,10], pivot = 10
- **Output:** [9,5,3,10,10,12,14]
- **Explanation:**
  The elements 9, 5, and 3 are less than the pivot so they are on the left side of the array.
  The elements 12 and 14 are greater than the pivot so they are on the right side of the array.
  The relative ordering of the elements less than and greater than pivot is also maintained. [9, 5, 3] and [12, 14] are the respective orderings.

**Example 2:**

- **Input:** nums = [-3,4,3,2], pivot = 2
- **Output:** [-3,2,4,3]
- **Explanation:**
  The element -3 is less than the pivot so it is on the left side of the array.
  The elements 4 and 3 are greater than the pivot so they are on the right side of the array.
  The relative ordering of the elements less than and greater than pivot is also maintained. [-3] and [4, 3] are the respective orderings.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>6</sup> <= nums[i] <= 10<sup>6</sup></code>
- `pivot` equals to an element of `nums`.


**Hint:**
1. Could you put the elements smaller than the pivot and greater than the pivot in a separate list as in the sequence that they occur?
2. With the separate lists generated, could you then generate the result?



**Solution:**

We need to rearrange an array such that elements less than a given pivot appear first, followed by elements equal to the pivot, and finally elements greater than the pivot. The relative order of elements within the less than and greater than groups must be maintained.

### Approach
1. **Separate Elements into Groups**: We can divide the elements into three groups:
    - Elements less than the pivot.
    - Elements equal to the pivot.
    - Elements greater than the pivot.

2. **Maintain Relative Order**: By iterating through the array and appending elements to their respective groups, we maintain their relative order as they appear in the original array.

3. **Concatenate Groups**: Finally, concatenate the three groups (less than, equal to, and greater than) to form the rearranged array.

This approach ensures that the relative order of elements within the less than and greater than groups is preserved, while elements equal to the pivot are placed in the middle.

Let's implement this solution in PHP: **[2161. Partition Array According to Given Pivot](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002161-partition-array-according-to-given-pivot/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $pivot
 * @return Integer[]
 */
function pivotArray($nums, $pivot) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(pivotArray([9,12,5,10,14,3,10], 10));
print_r(pivotArray([-3,4,3,2], 2));
?>
```

### Explanation:

- **Separation into Groups**: We iterate through each element in the input array and classify each element into one of three groups based on its relationship to the pivot (less than, equal to, or greater than). This classification is done in a single pass through the array, ensuring O(n) time complexity.
- **Maintaining Order**: By appending elements to their respective groups in the order they appear in the original array, we preserve their relative order within each group.
- **Concatenation**: Merging the three groups (less than, equal to, greater than) using `array_merge` in PHP ensures the correct final order, with all elements less than the pivot first, followed by those equal to the pivot, and finally those greater than the pivot.

This approach efficiently rearranges the array in O(n) time and O(n) space, which is optimal for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**