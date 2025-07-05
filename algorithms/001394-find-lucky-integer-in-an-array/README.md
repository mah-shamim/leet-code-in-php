1394\. Find Lucky Integer in an Array

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Counting`

Given an array of integers `arr`, a **lucky integer** is an integer that has a frequency in the array equal to its value.

Return _the largest **lucky integer** in the array_. If there is no **lucky integer** return `-1`.

**Example 1:**

- **Input:** arr = [2,2,3,4]
- **Output:** 2
- **Explanation:** The only lucky number in the array is 2 because frequency[2] == 2.

**Example 2:**

- **Input:** arr = [1,2,2,3,3,3]
- **Output:** 3
- **Explanation:** 1, 2 and 3 are all lucky numbers, return the largest of them.

**Example 3:**

- **Input:** arr = [2,2,2,3,3]
- **Output:** -1
- **Explanation:** There are no lucky numbers in the array.

**Constraints:**

- `1 <= arr.length <= 500`
- `1 <= arr[i] <= 500`


**Hint:**
1. Count the frequency of each integer in the array.
2. Get all lucky numbers and return the largest of them.






**Solution:**

We need to find the largest "lucky integer" in an array. A lucky integer is defined as an integer whose frequency in the array is exactly equal to its value. If no such integer exists, we should return -1.

### Approach
1. **Frequency Counting**: We first count the frequency of each integer in the array. Given the constraints (array length ≤ 500 and integers between 1 and 500), we can efficiently use an array of size 501 (to cover indices 1 through 500) to store these frequencies.
2. **Finding the Largest Lucky Integer**: After counting the frequencies, we iterate from the largest possible integer (500) down to 1. For each integer, we check if its frequency matches its value. The first such integer encountered during this iteration (from highest to lowest) will be the largest lucky integer.
3. **Return Result**: If we find such an integer during the iteration, we return it immediately. If no such integer is found after checking all possibilities, we return -1.

Let's implement this solution in PHP: **[1394. Find Lucky Integer in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001394-find-lucky-integer-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function findLucky($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findLucky(array(2,2,3,4)) . "\n";         // Output: 2
echo findLucky(array(1,2,2,3,3,3)) . "\n";     // Output: 3
echo findLucky(array(2,2,2,3,3)) . "\n";       // Output: -1
?>
```

### Explanation:

1. **Frequency Counting**: We initialize an array `$count` of size 501 with zeros. This array will store the frequency of each integer in the input array. For each integer in the input array, we increment the corresponding index in `$count`.
2. **Finding Largest Lucky Integer**: We then iterate from 500 down to 1. For each integer `$i`, we check if the frequency (stored in `$count[$i]`) is equal to `$i`. The first such integer encountered in this descending order iteration is the largest lucky integer, which we return immediately.
3. **Handling No Lucky Integer**: If the loop completes without finding any lucky integer, we return -1, indicating no such integer exists in the array.

This approach efficiently leverages frequency counting and a reverse iteration to quickly determine the largest lucky integer, ensuring optimal performance given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**