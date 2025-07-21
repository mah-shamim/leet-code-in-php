1608\. Special Array With X Elements Greater Than or Equal X

**Difficulty:** Easy

**Topics:** `Array`, `Binary Search`, `Sorting`

You are given an array `nums` of non-negative integers. `nums` is considered **special** if there exists a number `x` such that there are **exactly** `x` numbers in `nums` that are **greater than or equal to** `x`.

Notice that `x` **does not** have to be an element in `nums`.

Return _`x` if the array is **special**, otherwise, return `-1`. It can be proven that if `nums` is special, the value for `x` is **unique**_.

**Example 1:**

- **Input:** nums = [3,5]
- **Output:** 2
- **Explanation:** There are 2 values (3 and 5) that are greater than or equal to 2.

**Example 2:**

- **Input:** nums = [0,0]
- **Output:** -1
- **Explanation:** No numbers fit the criteria for x.
  ```
  If x = 0, there should be 0 numbers >= x, but there are 2.
  If x = 1, there should be 1 number >= x, but there are 0.
  If x = 2, there should be 2 numbers >= x, but there are 0.
  x cannot be greater since there are only 2 numbers in nums.
  ```

**Example 3:**

- **Input:** nums = [0,4,3,0,4]
- **Output:** 3
- **Explanation:** There are 3 values that are greater than or equal to 3.

**Constraints:**

- <code>1 <= nums.length <= 100</code>
- <code>0 <= nums[i] <= 1000</code>






**Solution:**

We need to find a number `x` such that there are exactly `x` numbers in the array that are greater than or equal to `x`. The solution involves sorting the array and then efficiently checking possible values of `x` using the sorted properties of the array.

### Approach
1. **Sort the Array**: Sorting helps in efficiently determining the number of elements greater than or equal to a given value `x`.
2. **Check for Special Case (x = n)**: If the smallest element in the sorted array is greater than or equal to the length of the array (`n`), then `x = n` is the solution. This is because all elements in the array are at least `n`, so there are exactly `n` elements greater than or equal to `n`.
3. **Iterate Over Possible x Values**: For each possible `x` from 1 to `n-1`:
    - **Determine the Critical Index**: The critical index is `n - x`, which is the position in the sorted array where the `x`-th element from the end resides.
    - **Check Conditions**:
        - The element at the critical index must be greater than or equal to `x`.
        - The element immediately before the critical index must be less than `x`. This ensures that exactly `x` elements are greater than or equal to `x`.
4. **Return Result**: If such an `x` is found during the iteration, return it. If no valid `x` is found after checking all possibilities, return `-1`.

Let's implement this solution in PHP: **[1608. Special Array With X Elements Greater Than or Equal X](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001608-special-array-with-x-elements-greater-than-or-equal-x/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function specialArray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(specialArray([3, 5]));        // Output: 2
print_r(specialArray([0, 0]));        // Output: -1
print_r(specialArray([0, 4, 3, 0, 4])); // Output: 3
?>
```

### Explanation:

1. **Sorting the Array**: The array is sorted in non-decreasing order to facilitate efficient checking of elements relative to `x`.
2. **Special Case Handling (x = n)**: If the smallest element (first element after sorting) is greater than or equal to the array length `n`, then `x = n` is immediately returned because all elements will satisfy the condition of being at least `n`.
3. **Iterating for Valid x**: For each `x` from 1 to `n-1`:
    - The element at position `n - x` must be at least `x`. This ensures that there are at least `x` elements from this position onwards that are greater than or equal to `x`.
    - The element immediately before (`n - x - 1`) must be less than `x`. This ensures that there are not more than `x` elements that are greater than or equal to `x`.
4. **Result Handling**: If the conditions are met for any `x` during the iteration, that `x` is returned. If no such `x` is found after checking all possibilities, the function returns `-1`.

This approach efficiently checks possible values of `x` by leveraging the sorted properties of the array, ensuring optimal performance with a time complexity dominated by the sorting step, which is O(n log n). The subsequent iteration is O(n), making the overall complexity O(n log n).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
