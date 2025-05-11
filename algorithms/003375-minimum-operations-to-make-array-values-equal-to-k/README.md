3375\. Minimum Operations to Make Array Values Equal to K

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`

You are given an integer array `nums` and an integer `k`.

An integer `h` is called **valid** if all values in the array that are **strictly greater** than `h` are _identical_.

For example, if `nums = [10, 8, 10, 8]`, a **valid** integer is `h = 9` because all `nums[i] > 9` are equal to 10, but 5 is not a **valid** integer.

You are allowed to perform the following operation on `nums`:

- Select an integer `h` that is _valid_ for the **current** values in `nums`.
- For each index `i` where `nums[i] > h`, set `nums[i]` to `h`.

Return _the **minimum** number of operations required to make every element in `nums` **equal** to `k`_. If it is impossible to make all elements equal to `k`, return `-1`.

**Example 1:**

- **Input:** nums = [5,2,5,4,5], k = 2
- **Output:** 2
- **Explanation:** The operations can be performed in order using valid integers 4 and then 2.

**Example 2:**

- **Input:** nums = [2,1,2], k = 2
- **Output:** -1
- **Explanation:** It is impossible to make all the values equal to 2.


**Example 3:**

- **Input:** nums = [9,7,5,3], k = 1
- **Output:** 4
- **Explanation:** The operations can be performed using valid integers in the order 7, 5, 3, and 1.



**Constraints:**

- `1 <= nums.length <= 100` 
- `1 <= nums[i] <= 100`
- `1 <= k <= 100`


**Hint:**
1. Handle the case when the array contains an integer less than `k`
2. Start by performing operations on the highest integer
3. You can perform an operation on the highest integer using the second-highest, an operation on the second-highest using the third-highest, and so forth.
4. The answer is the number of distinct integers in the array that are larger than `k`.



**Solution:**

We need to determine the minimum number of operations required to make all elements of an array equal to a given integer `k`. Each operation involves selecting a valid integer `h` such that all elements greater than `h` are reduced to `h`. The solution must also check if it is impossible to achieve this goal and return `-1` in such cases.

### Approach
1. **Check for Impossibility**: If any element in the array is less than `k`, it is impossible to make all elements equal to `k` because we cannot increase values. In this case, return `-1`.
2. **Collect Distinct Values**: Identify all distinct values in the array that are strictly greater than `k`. Each distinct value represents a step where we can reduce the elements to the next lower value until we reach `k`.
3. **Count Steps**: The number of distinct values greater than `k` directly corresponds to the minimum number of operations required. Each operation reduces the highest current value to the next lower distinct value until all elements are `k`.

Let's implement this solution in PHP: **[3375. Minimum Operations to Make Array Values Equal to K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003375-minimum-operations-to-make-array-values-equal-to-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minOperations($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
print_r(minOperations(array(5, 2, 5, 4, 5), 2)); // Output: 2

// Example 2
print_r(minOperations(array(2, 1, 2), 2)); // Output: -1

// Example 3
print_r(minOperations(array(9, 7, 5, 3), 1)); // Output: 4
?>
```

### Explanation:

1. **Impossibility Check**: The code first iterates through the array to check if any element is less than `k`. If found, it immediately returns `-1` as the task is impossible.
2. **Collecting Distinct Values**: The code then iterates through the array again to collect all distinct values greater than `k` using a hash map to ensure uniqueness.
3. **Counting Steps**: The count of these distinct values is returned as the result, representing the minimum number of operations needed. Each distinct value requires one operation to reduce it to the next lower value until all elements are `k`.

This approach efficiently determines the minimum operations by leveraging the distinct values greater than `k`, ensuring optimal performance with a time complexity of O(n), where n is the length of the array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**