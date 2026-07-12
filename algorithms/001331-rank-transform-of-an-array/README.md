1331\. Rank Transform of an Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Sorting`, `Biweekly Contest 18`

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


**Example 4:**

- **Input:** arr = []
- **Output:** []


**Example 5:**

- **Input:** arr = [42]
- **Output:** [1]


**Example 6:**

- **Input:** arr = [-5,-10,0,5]
- **Output:** [2,1,3,4]


**Example 7:**

- **Input:** arr = [3,1,4,2]
- **Output:** [3,1,4,2]


**Example 8:**

- **Input:** arr = [-10⁹, 10⁹, 0]
- **Output:** [2,3,1]



**Constraints:**

- <code>0 <= arr.length <= 10<sup>5</sup></code>
- <code>-10<sup>9</sup> <= arr[i] <= 10<sup>9</sup></code>



**Hint:**
1. Use a temporary array to copy the array and sort it.
2. The rank of each element is the number of unique elements smaller than it in the sorted array plus one.


**Similar Questions:**
1. [1632. Rank Transform of a Matrix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001632-rank-transform-of-a-matrix)
2. [2089. Find Target Indices After Sorting Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002089-find-target-indices-after-sorting-array)



**Solution:**

We implement an efficient rank transformation algorithm that replaces each element in the input array with its rank (**1-based**), where equal elements share the same rank and ranks are assigned in ascending order based on element values. Our solution uses sorting to determine ranks and a hash map for _**O(1)**_ lookups, achieving _**O(n log n)**_ time complexity.

## Approach

- **Copy and Sort**: Create a sorted copy of the input array to determine the order of elements
- **Rank Assignment**: Iterate through the sorted array and assign ranks starting from 1, incrementing only when a new distinct value is encountered
- **Hash Map Storage**: Store the rank for each unique value in a hash map for fast retrieval
- **Transform**: Replace each element in the original array with its corresponding rank from the hash map

Let's implement this solution in PHP: **[1331. Rank Transform of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001331-rank-transform-of-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer[]
 */
function arrayRankTransform(array $arr): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

print_r(arrayRankTransform([40, 10, 20, 30])); // Output: [4, 1, 2, 3]
print_r(arrayRankTransform([100, 100, 100])); // Output: [1, 1, 1]
print_r(arrayRankTransform([37, 12, 28, 9, 100, 56, 80, 5, 12])); // Output: [5, 3, 4, 2, 8, 6, 7, 1, 3]
print_r(arrayRankTransform([])); // Output: []
print_r(arrayRankTransform([42])); // Output: [1]
print_r(arrayRankTransform([-5,-10,0,5])); // Output: [2,1,3,4]
print_r(arrayRankTransform([3,1,4,2])); // Output: [3,1,4,2]
print_r(arrayRankTransform([-10⁹, 10⁹, 0])); // Output: [2,3,1]
?>
```

### Explanation:

- **Empty Array Handling**: Returns an empty array immediately if the input is empty, as there are no elements to rank
- **Sorting Strategy**: The sorted array allows us to process elements from smallest to largest, ensuring ranks are assigned in the correct order
- **Unique Rank Assignment**: The hash map's `isset()` check ensures each distinct value receives exactly one rank, with the rank incrementing only when a new value appears
- **Rank Formula**: Each element's rank equals the number of distinct values smaller than it plus one, which naturally emerges from the sorted processing
- **Preserving Original Order**: The final step iterates through the original array (not the sorted copy) to maintain the original sequence while replacing values with their ranks

### Time Complexity:

- **Time Complexity**: _**O(n log n)**_ where n is the array length, dominated by the sorting operation
- **Space Complexity**: _**O(n)**_ for storing the sorted copy, hash map, and result array

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**