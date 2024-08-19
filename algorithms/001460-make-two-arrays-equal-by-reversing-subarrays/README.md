1460\. Make Two Arrays Equal by Reversing Subarrays

Easy

You are given two integer arrays of equal length `target` and `arr`. In one step, you can select any **non-empty subarray** of `arr` and reverse it. You are allowed to make any number of steps.

Return _`true` if you can make `arr` equal to `target` or `false` otherwise_.

**Example 1:**

- **Input:** target = [1,2,3,4], arr = [2,4,1,3]
- **Output:** true
- **Explanation:** You can follow the next steps to convert arr to target:\
  1- Reverse subarray [2,4,1], arr becomes [1,4,2,3]\
  2- Reverse subarray [4,2], arr becomes [1,2,4,3]\
  3- Reverse subarray [4,3], arr becomes [1,2,3,4]\
  There are multiple ways to convert arr to target, this is not the only way to do so. 

**Example 2:**

- **Input:** target = [7], arr = [7]
- **Output:** true
- **Explanation:** arr is equal to target without any reverses.

**Example 3:**

- **Input:** target = [3,7,9], arr = [3,7,11]
- **Output:** false
- **Explanation:** arr does not have value 9 and it can never be converted to target.

**Constraints:**

- <code>target.length == arr.length</code>
- <code>1 <= target.length <= 1000</code>
- <code>1 <= target[i] <= 1000</code>
- <code>1 <= arr[i] <= 1000</code>

**Hint:**
1. Each element of target should have a corresponding element in arr, and if it doesn't have a corresponding element, return false.
2. To solve it easily you can sort the two arrays and check if they are equal.


**Solution:**


To solve this problem, we can follow these steps:

1. **Check if both arrays have the same elements with the same frequency.** If they do, it means one array can be transformed into the other by reversing subarrays. Sorting both arrays and comparing them is an easy way to achieve this.

Let's implement this solution in PHP: **[1460. Make Two Arrays Equal by Reversing Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001460-make-two-arrays-equal-by-reversing-subarrays/solution.php)**

```php
<?php
function canBeEqual($target, $arr) {
    // Sort both arrays
    sort($target);
    sort($arr);
    
    // Compare the sorted arrays
    return $target == $arr;
}

// Test cases
$target1 = [1, 2, 3, 4];
$arr1 = [2, 4, 1, 3];
echo canBeEqual($target1, $arr1) ? 'true' : 'false'; // Output: true

$target2 = [7];
$arr2 = [7];
echo canBeEqual($target2, $arr2) ? 'true' : 'false'; // Output: true

$target3 = [3, 7, 9];
$arr3 = [3, 7, 11];
echo canBeEqual($target3, $arr3) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. **Sorting Arrays**: By sorting both `target` and `arr`, we can ensure that if they have the same elements with the same frequencies, they will become identical after sorting.
2. **Comparing Sorted Arrays**: If the sorted version of `target` is equal to the sorted version of `arr`, it means that `arr` can be transformed into `target` by reversing subarrays, as the elements and their frequencies match.

### Key Points:
- **Sorting**: This step ensures that we can compare the elements in both arrays directly.
- **Comparison**: After sorting, a direct comparison (`==`) is sufficient to check if both arrays can be made equal through subarray reversals.

This solution leverages the properties of sorting and the comparison of arrays in PHP, making it both simple and efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
