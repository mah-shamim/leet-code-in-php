2191\. Sort the Jumbled Numbers

Medium

You are given a **0-indexed** integer array `mapping` which represents the mapping rule of a shuffled decimal system. `mapping[i] = j` means digit `i` should be mapped to digit `j` in this system.

The **mapped value** of an integer is the new integer obtained by replacing each occurrence of digit `i` in the integer with `mapping[i]` for all `0 <= i <= 9`.

You are also given another integer array `nums`. Return _the array `nums` sorted in **non-decreasing** order based on the **mapped values** of its elements_.

**Notes:**

- Elements with the same mapped values should appear in the same relative order as in the input.
- The elements of nums should only be sorted based on their mapped values and not be replaced by them.


**Example 1:**

- **Input:** mapping = [8,9,4,0,2,1,3,5,7,6], nums = [991,338,38]
- **Output:** [338,38,991]
- **Explanation:** \
  Map the number 991 as follows: \
  1. mapping[9] = 6, so all occurrences of the digit 9 will become 6.\
  2. mapping[1] = 9, so all occurrences of the digit 1 will become 9.\
  Therefore, the mapped value of 991 is 669.\
  338 maps to 007, or 7 after removing the leading zeros.\
  38 maps to 07, which is also 7 after removing leading zeros.\
  Since 338 and 38 share the same mapped value, they should remain in the same relative order, so 338 comes before 38.\
  Thus, the sorted array is [338,38,991].

**Example 2:**

- **Input:** mapping = [0,1,2,3,4,5,6,7,8,9], nums = [789,456,123]
- **Output:** [123,456,789]
- **Explanation:** 789 maps to 789, 456 maps to 456, and 123 maps to 123. Thus, the sorted array is [123,456,789].

**Constraints:**

- <code>mapping.length == 10</code>
- <code>0 <= mapping[i] <= 9</code>
- All the values of `mapping[i]` are **unique**.
- <code>1 <= nums.length <= 3 * 10<sup>4</sup></code>
- <code>0 <= nums[i] < 10<sup>9</sup></code>

**Hint:**
1. Map the original numbers to new numbers by the mapping rule and sort the new numbers.
2. To maintain the same relative order for equal mapped values, use the index in the original input array as a tiebreaker.


**Solution:**


To solve this problem, we can follow these steps:

1. **Mapping Function**: Create a function to convert an integer to its mapped value using the provided mapping array.
2. **Custom Sorting**: Use the `usort` function in PHP to sort the array based on the mapped values.

Let's implement this solution in PHP: **[2191. Sort the Jumbled Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002191-sort-the-jumbled-numbers/solution.php)**

```php
<?php
// Example usage:
$mapping = [8,9,4,0,2,1,3,5,7,6];
$nums = [991,338,38];
print_r(sortJumbled($mapping, $nums)); // Output: [338, 38, 991]
?>
```

### Explanation:

1. **mapNumber Function**: This function takes a number and the mapping array as input and returns the mapped value of the number. It converts the number to a string, replaces each digit with its mapped value, and then converts it back to an integer.
2. **Creating Mapped Values**: We create an array `mappedNums` that holds the original numbers along with their mapped values.
3. **Custom Sorting**: We use `usort` to sort the `mappedNums` array. The custom comparison function sorts based on the mapped values. If two mapped values are equal, the original order is preserved.
4. **Extracting Sorted Numbers**: Finally, we extract the original numbers from the sorted array and return them.

This approach ensures that the numbers are sorted based on their mapped values while preserving the relative order of numbers with the same mapped value.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
