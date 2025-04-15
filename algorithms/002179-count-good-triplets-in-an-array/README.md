2179\. Count Good Triplets in an Array

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Divide and Conquer`, `Binary Indexed Tree`, `Segment Tree`, `Merge Sort`, `Ordered Set`

You are given two **0-indexed** arrays `nums1` and `nums2` of length `n`, both of which are **permutations** of `[0, 1, ..., n - 1]`.

A **good triplet** is a set of `3` **distinct** values which are present in **increasing order** by position both in `nums1` and `nums2`. In other words, if we consider <code>pos1<sub>v</sub></code> as the index of the value `v` in `nums1` and <code>pos2<sub>v</sub></code> as the index of the value `v` in `nums2`, then a good triplet will be a set `(x, y, z)` where `0 <= x, y, z <= n - 1`, such that <code>pos1<sub>x</sub> < pos1<sub>y</sub> < pos1<sub>z</sub></code> and <code>pos2<sub>x</sub> < pos2<sub>y</sub> < pos2<sub>z</sub></code>.

Return _the **total number** of good triplets_.

**Example 1:**

- **Input:** nums1 = [2,0,1,3], nums2 = [0,1,2,3]
- **Output:** 1
- **Explanation:**
  There are 4 triplets (x,y,z) such that pos1<sub>x</sub> < pos1<sub>y</sub> < pos1<sub>z</sub>. They are (2,0,1), (2,0,3), (2,1,3), and (0,1,3).
  Out of those triplets, only the triplet (0,1,3) satisfies pos2<sub>x</sub> < pos2<sub>y</sub> < pos2<sub>z</sub>. Hence, there is only 1 good triplet.

**Example 2:**

- **Input:** nums1 = [4,0,1,3,2], nums2 = [4,1,0,2,3]
- **Output:** 4
- **Explanation:** The 4 good triplets are (4,0,3), (4,0,2), (4,1,3), and (4,1,2).



**Constraints:**

- `n == nums1.length == nums2.length`
- <code>3 <= n <= 10<sup>5</sup></code>
- `0 <= nums1[i], nums2[i] <= n - 1`
- `nums1` and `nums2` are permutations of `[0, 1, ..., n - 1]`.


**Hint:**
1. For every value y, how can you find the number of values x (0 ≤ x, y ≤ n - 1) such that x appears before y in both of the arrays?
2. Similarly, for every value y, try finding the number of values z (0 ≤ y, z ≤ n - 1) such that z appears after y in both of the arrays.
3. Now, for every value y, count the number of good triplets that can be formed if y is considered as the middle element.



**Solution:**

We need to count the number of good triplets (x, y, z) in two permutations such that the positions of x, y, and z are in increasing order in both permutations. A good triplet (x, y, z) must satisfy pos1[x] < pos1[y] < pos1[z] and pos2[x] < pos2[y] < pos2[z].

### Approach
1. **Precompute Positions**: For each value in the permutations, compute its position in both arrays.
2. **Element Structure**: Create elements with their positions in both arrays.
3. **Left Count Calculation**: For each element y, compute how many elements x exist such that x appears before y in both arrays. This is done using a Fenwick Tree (Binary Indexed Tree) to efficiently count elements with smaller positions.
4. **Right Count Calculation**: For each element y, compute how many elements z exist such that z appears after y in both arrays. This is done using another Fenwick Tree in reverse order.
5. **Combine Results**: For each element y, the number of good triplets where y is the middle element is the product of left and right counts. Sum these products to get the total number of good triplets.

Let's implement this solution in PHP: **[2179. Count Good Triplets in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002179-count-good-triplets-in-an-array/solution.php)**

```php
<?php
class FenwickTree {
    private $tree;
    private $size;

    /**
     * @param $size
     */
    public function __construct($size) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $index
     * @param $delta
     * @return void
     */
    public function update($index, $delta) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $index
     * @return int|mixed
     */
    public function query($index) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function goodTriplets($nums1, $nums2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [2, 0, 1, 3];
$nums2 = [0, 1, 2, 3];
echo countGoodTriplets($nums1, $nums2) . "\n"; // Output: 1

// Example 2
$nums1 = [4, 0, 1, 3, 2];
$nums2 = [4, 1, 0, 2, 3];
echo countGoodTriplets($nums1, $nums2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Fenwick Tree**: This data structure is used to efficiently compute prefix sums and update counts, which allows us to determine how many elements have positions less than or greater than a given element in logarithmic time.
2. **Left Count Calculation**: By sorting elements based on their positions in the first array, we use a Fenwick Tree to count how many elements have smaller positions in the second array.
3. **Right Count Calculation**: Similarly, by sorting elements in reverse order and using another Fenwick Tree, we count how many elements have larger positions in the second array.
4. **Combining Results**: For each element, the product of its left and right counts gives the number of good triplets where it is the middle element. Summing these products gives the total number of good triplets.

This approach ensures that we efficiently count the required elements using Fenwick Trees, resulting in an overall time complexity of O(n log n), which is suitable for large input sizes up to 100,000.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**