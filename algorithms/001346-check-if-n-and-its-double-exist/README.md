1346\. Check If N and Its Double Exist

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Two Pointers`, `Binary Search`, `Sorting`

Given an array `arr` of integers, check if there exist two indices `i` and `j` such that :

- `i != j`
- `0 <= i, j < arr.length`
- `arr[i] == 2 * arr[j]`


**Example 1:**

- **Input:** arr = [10,2,5,3]
- **Output:** true
- **Explanation:** For i = 0 and j = 2, arr[i] == 10 == 2 * 5 == 2 * arr[j]

**Example 2:**

- **Input:** arr = [3,1,7,11]
- **Output:** false
- **Explanation:** There is no i and j that satisfy the conditions.



**Constraints:**

- `2 <= arr.length <= 500`
- <code>-10<sup>3</sup> <= arr[i] <= 10<sup>3</sup></code>


**Hint:**
1. Loop from `i = 0` to `arr.length`, maintaining in a hashTable the array elements from `[0, i - 1]`.
2. On each step of the loop check if we have seen the element `2 * arr[i]` so far.
3. Also check if we have seen `arr[i] / 2` in case `arr[i] % 2 == 0`.



**Solution:**

We can use a hash table (associative array) to track the elements we have already encountered while iterating through the array. The idea is to check for each element `arr[i]` if its double (i.e., `2 * arr[i]`) or half (i.e., `arr[i] / 2` if it's an even number) has already been encountered.

Here’s a step-by-step solution:

### Plan:
1. Iterate through the array.
2. For each element `arr[i]`, check if we have seen `2 * arr[i]` or `arr[i] / 2` (if `arr[i]` is even) in the hash table.
3. If any condition is satisfied, return `true`.
4. Otherwise, add `arr[i]` to the hash table and continue to the next element.
5. If no match is found by the end, return `false`.

Let's implement this solution in PHP: **[1346. Check If N and Its Double Exist](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001346-check-if-n-and-its-double-exist/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Boolean
 */
function checkIfExist($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$arr1 = [10, 2, 5, 3];
$arr2 = [3, 1, 7, 11];

echo checkIfExist($arr1) ? 'true' : 'false'; // Output: true
echo "\n";
echo checkIfExist($arr2) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. **Hash Table**: We use the `$hashTable` associative array to store the elements we've encountered so far.
2. **First Condition**: For each element `arr[i]`, we check if `arr[i] * 2` exists in the hash table.
3. **Second Condition**: If the element is even, we check if `arr[i] / 2` exists in the hash table.
4. **Adding to Hash Table**: After checking, we add `arr[i]` to the hash table for future reference.
5. **Return**: If we find a match, we immediately return `true`. If no match is found after the loop, we return `false`.

### Time Complexity:
- The time complexity is **O(n)**, where `n` is the length of the array. This is because each element is processed once and checking or adding elements in the hash table takes constant time on average.

### Space Complexity:
- The space complexity is **O(n)** due to the storage required for the hash table.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
