1352\. Product of the Last K Numbers

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Design`, `Data Stream`, `Prefix Sum`

Design an algorithm that accepts a stream of integers and retrieves the product of the last `k` integers of the stream.

Implement the `ProductOfNumbers` class:

- `ProductOfNumbers()` Initializes the object with an empty stream.
- `void add(int num)` Appends the integer `num` to the stream.
- `int getProduct(int k)` Returns the product of the last `k` numbers in the current list. You can assume that always the current list has at least `k` numbers.

The test cases are generated so that, at any time, the product of any contiguous sequence of numbers will fit into a single 32-bit integer without overflowing.

**Example 1:**

- **Input:**
  ```
  ["ProductOfNumbers","add","add","add","add","add","getProduct","getProduct","getProduct","add","getProduct"]
  [[],[3],[0],[2],[5],[4],[2],[3],[4],[8],[2]]
  ```
- **Output:** [null,null,null,null,null,null,20,40,0,null,32]
- **Explanation:**
  ```
  ProductOfNumbers productOfNumbers = new ProductOfNumbers();
  productOfNumbers.add(3);        // [3]
  productOfNumbers.add(0);        // [3,0]
  productOfNumbers.add(2);        // [3,0,2]
  productOfNumbers.add(5);        // [3,0,2,5]
  productOfNumbers.add(4);        // [3,0,2,5,4]
  productOfNumbers.getProduct(2); // return 20. The product of the last 2 numbers is 5 * 4 = 20
  productOfNumbers.getProduct(3); // return 40. The product of the last 3 numbers is 2 * 5 * 4 = 40
  productOfNumbers.getProduct(4); // return 0. The product of the last 4 numbers is 0 * 2 * 5 * 4 = 0
  productOfNumbers.add(8);        // [3,0,2,5,4,8]
  productOfNumbers.getProduct(2); // return 32. The product of the last 2 numbers is 4 * 8 = 32
  ```


**Constraints:**

- `0 <= num <= 100`
- <code>1 <= k <= 4 * 10<sup>4</sup></code>
- At most <code>4 * 10<sup>4</sup></code> calls will be made to `add` and `getProduct`.
- The product of the stream at any point in time will fit in a **32-bit** integer.


**Hint:**
1. Keep all prefix products of numbers in an array, then calculate the product of last K elements in O(1) complexity.
2. When a zero number is added, clean the array of prefix products.



**Solution:**

We need to design a class that efficiently handles a stream of integers and can quickly return the product of the last `k` integers. The challenge is to ensure that both the addition of numbers and the retrieval of the product are done efficiently, even with a large number of operations.

### Approach
The key insight is to use prefix products to efficiently compute the product of the last `k` elements. Here's the detailed approach:

1. **Prefix Products Array**: Maintain an array where each element at index `i` represents the product of all numbers added after the last zero up to the `i-th` element. This array starts with an initial value of `1` to handle the base case.

2. **Handling Zeros**: When a zero is added to the stream, reset the prefix products array. This is because any product including a zero will be zero, and subsequent products should start fresh from the next non-zero number.

3. **Efficient Product Calculation**: When retrieving the product of the last `k` elements:
   - If `k` exceeds the length of the current prefix products array (adjusted for the initial `1`), it means there was a zero within the last `k` elements, so the product is zero.
   - Otherwise, compute the product using the prefix products array by dividing the product up to the current element by the product up to the element just before the start of the last `k` elements.

Let's implement this solution in PHP: **[1352. Product of the Last K Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001352-product-of-the-last-k-numbers/solution.php)**

```php
<?php
class ProductOfNumbers {
    /**
     * @var int[]
     */
    private $prefixProducts;

    /**
     */
    function __construct() {
        $this->prefixProducts = [1];
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function add($num) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $k
     * @return Integer
     */
    function getProduct($k) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage
$productOfNumbers = new ProductOfNumbers();
$productOfNumbers->add(3);
$productOfNumbers->add(0);
$productOfNumbers->add(2);
$productOfNumbers->add(5);
$productOfNumbers->add(4);
echo $productOfNumbers->getProduct(2) . "\n"; // Output: 20
echo $productOfNumbers->getProduct(3) . "\n"; // Output: 40
echo $productOfNumbers->getProduct(4) . "\n"; // Output: 0
$productOfNumbers->add(8);
echo $productOfNumbers->getProduct(2) . "\n"; // Output: 32
?>
```

### Explanation:

- **Initialization**: The constructor initializes the prefix products array with `[1]` to handle the base case for product calculations.
- **Adding Numbers**: The `add` method checks if the number is zero. If it is, the prefix products array is reset to `[1]`. Otherwise, the product of the current number with the last element in the prefix products array is appended.
- **Retrieving Product**: The `getProduct` method checks if `k` is larger than the number of elements since the last zero (using the length of the prefix products array). If so, it returns 0. Otherwise, it computes the product using the prefix products array by dividing the relevant elements.

This approach ensures that both adding numbers and retrieving products are done in constant time, making the solution efficient even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**