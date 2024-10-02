1331\. Rank Transform of an Array

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sorting`

Given an array of integers `arr`, replace each element with its rank.

The rank represents how large the element is. The rank has the following rules:

- Rank is an integer starting from 1.
- The larger the element, the larger the rank. If two elements are equal, their rank must be the same.
- Rank should be as small as possible.


**Example 1:**

- **Input:** arr = [40,10,20,30]
- **Output:** [4,1,2,3]
- **Explanation:** 40 is the largest element. 10 is the smallest. 20 is the second smallest. 30 is the third smallest.

**Example 2:**

- **Input:** arr = [100,100,100]
- **Output:** [1,1,1]
- **Explanation:** Same elements share the same rank.


**Example 3:**

- **Input:** arr = [37,12,28,9,100,56,80,5,12]
- **Output:** [5,3,4,2,8,6,7,1,3]



**Constraints:**

- <code>0 <= arr.length <= 10<sup>5</sup></code>
- <code>-10<sup>9</sup> <= arr[i] <= 10<sup>9</sup></code>



**Hint:**
1. Use a temporary array to copy the array and sort it.
2. The rank of each element is the number of unique elements smaller than it in the sorted array plus one.



**Solution:**

We can break it down into the following steps:

1. **Copy and sort the array:** This helps in determining the rank of each unique element.
2. **Use a hash map to assign ranks to elements:** Since multiple elements can share the same value, a hash map (associative array in PHP) will help map each element to its rank.
3. **Replace the original elements with their ranks:** Using the hash map, we can replace each element in the original array with its corresponding rank.

Let's implement this solution in PHP: **[1331. Rank Transform of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001331-rank-transform-of-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer[]
 */
function arrayRankTransform($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$arr1 = [40, 10, 20, 30];
print_r(arrayRankTransform($arr1)); // Output: [4, 1, 2, 3]

$arr2 = [100, 100, 100];
print_r(arrayRankTransform($arr2)); // Output: [1, 1, 1]

$arr3 = [37, 12, 28, 9, 100, 56, 80, 5, 12];
print_r(arrayRankTransform($arr3)); // Output: [5, 3, 4, 2, 8, 6, 7, 1, 3]
?>
```

### Explanation:

1. **Copy and sort the array:**
   - We create a copy of the input array `$sorted` and sort it. This helps in determining the rank of each unique element.

2. **Assign ranks to elements:**
   - We iterate through the sorted array and use a hash map `$rank` to store the rank of each unique element.
   - We use `isset` to check if an element has already been assigned a rank. If not, we assign the current rank and increment it.

3. **Replace elements with their ranks:**
   - We then iterate through the original array and replace each element with its corresponding rank by looking it up in the `$rank` hash map.

### Time Complexity:
- Sorting the array takes _**`O(n log n)`**_, where _**`n`**_ is the size of the array.
- Assigning ranks and replacing values takes _**`O(n`**_).
- Overall time complexity is _**`O(n log n)`**_.

This solution efficiently handles large arrays while maintaining simplicity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
