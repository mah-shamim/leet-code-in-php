1726\. Tuple with Same Product

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Counting`

Given an array `nums` of **distinct** positive integers, return _the number of tuples `(a, b, c, d)` such that `a * b = c * d` where `a`, `b`, `c`, and `d` are elements of `nums`, and `a != b != c != d`_.

**Example 1:**

- **Input:** nums = [2,3,4,6]
- **Output:** 8
- **Explanation:** There are 8 valid tuples:
  (2,6,3,4) , (2,6,4,3) , (6,2,3,4) , (6,2,4,3)
  (3,4,2,6) , (4,3,2,6) , (3,4,6,2) , (4,3,6,2)

**Example 2:**

- **Input:** nums = [1,2,4,5,10]
- **Output:** 16
- **Explanation:** There are 16 valid tuples:
  (1,10,2,5) , (1,10,5,2) , (10,1,2,5) , (10,1,5,2)
  (2,5,1,10) , (2,5,10,1) , (5,2,1,10) , (5,2,10,1)
  (2,10,4,5) , (2,10,5,4) , (10,2,4,5) , (10,2,5,4)
  (4,5,2,10) , (4,5,10,2) , (5,4,2,10) , (5,4,10,2)



**Constraints:**

- `1 <= nums.length <= 1000`
- <code>1 <= nums[i] <= 10<sup>4</sup></code>
- All elements in `nums` are **distinct**.


**Hint:**
1. Note that all of the integers are distinct. This means that each time a product is formed it must be formed by two unique integers.
2. Count the frequency of each product of 2 distinct numbers. Then calculate the permutations formed.



**Solution:**

We need to determine the number of valid tuples (a, b, c, d) from a given array of distinct positive integers such that the product of a and b is equal to the product of c and d, with all four elements being distinct.

### Approach
1. **Generate Products of Pairs**: Compute the product of all possible pairs of distinct elements in the array. This helps us identify which products can be formed by different pairs of elements.
2. **Count Product Frequencies**: Use a hash map to count how many times each product appears. Each key in the hash map is a product, and the value is the number of distinct pairs that produce this product.
3. **Calculate Valid Tuples**: For each product that can be formed by at least two different pairs, calculate the number of valid tuples. The formula used here is derived from combinatorial permutations, considering the different ways pairs can be ordered and combined.

Let's implement this solution in PHP: **[1726. Tuple with Same Product](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001726-tuple-with-same-product/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function tupleSameProduct($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [2, 3, 4, 6];
echo "Output: " . tupleSameProduct($nums1) . "\n"; // Output: 8

// Example 2
$nums2 = [1, 2, 4, 5, 10];
echo "Output: " . tupleSameProduct($nums2) . "\n"; // Output: 16
?>
```

### Explanation:

1. **Generate Products of Pairs**: We iterate over all possible pairs of elements (i, j) where i < j to ensure each pair is considered only once. For each pair, we compute their product and store the count of each product in a hash map.
2. **Count Product Frequencies**: The hash map keeps track of how many distinct pairs result in the same product. This helps us quickly determine which products can form valid tuples.
3. **Calculate Valid Tuples**: For each product that appears at least twice, we use the formula _**4 × k × (k - 1)**_ where k is the count of pairs for that product. This formula accounts for all permutations of the pairs (a, b) and (c, d), considering both the order of elements within each pair and the order of the pairs themselves.

This approach efficiently counts all valid tuples by leveraging combinatorial counting and hash maps to track product frequencies, ensuring an optimal solution within the problem

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**