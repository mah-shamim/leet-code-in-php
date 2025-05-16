3151\. Special Array I

**Difficulty:** Easy

**Topics:** `Array`

An array is considered **special** if every pair of its adjacent elements contains two numbers with different parity.

You are given an array of integers `nums`. Return `true` if `nums` is a **special** array, otherwise, return `false`.

**Example 1:**

- **Input:** nums = [1]
- **Output:** true
- **Explanation:** There is only one element. So the answer is `true`.

**Example 2:**

- **Input:** nums = [2,1,4]
- **Output:** true
- **Explanation:** There is only two pairs: `(2,1)` and `(1,4)`, and both of them contain numbers with different parity. So the answer is `true`.


**Example 3:**

- **Input:** nums = [4,3,1,6]
- **Output:** false
- **Explanation:** `nums[1]` and `nums[2]` are both odd. So the answer is `false`.



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. Try to check the parity of each element and its previous element.



**Solution:**

We need to determine if the given array is "special" by checking if every pair of adjacent elements contains two numbers with different parity (one even and one odd). Here's how you can implement this:

1. **Check the length of the array**: If the array has only one element, it is automatically considered special.
2. **Iterate through the array**: For each pair of adjacent elements, check if they have different parity.
3. **Return the result**: If all adjacent pairs have different parity, return `true`; otherwise, return `false`.

Let's implement this solution in PHP: **[3151. Special Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003151-special-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Boolean
 */
function isArraySpecial($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [1];
$nums2 = [2, 1, 4];
$nums3 = [4, 3, 1, 6];

echo isArraySpecial($nums1) ? 'true' : 'false'; // Output: true
echo "\n";
echo isArraySpecial($nums2) ? 'true' : 'false'; // Output: true
echo "\n";
echo isArraySpecial($nums3) ? 'true' : 'false'; // Output: false
echo "\n";
?>
```

### Explanation:

1. **Edge Case:**
   - If the array has only one element, it's automatically considered a special array since there are no adjacent pairs to check.

2. **Checking Adjacent Elements:**
   - Iterate through the array starting from the second element.
   - Use the modulo operator `%` to determine the parity of adjacent elements:
      - `nums[i] % 2 == 0` indicates the number is even.
      - `nums[i] % 2 == 1` indicates the number is odd.
   - Compare the parity of the current element `nums[i]` with the previous element `nums[i-1]`. If they have the same parity, return `false`.

3. **Return `true`:**
   - If all adjacent pairs have different parities, return `true`.

This solution runs in _**O(n)**_, where _**n**_ is the length of the array, making it efficient for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**