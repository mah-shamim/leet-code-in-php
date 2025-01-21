2064\. Minimized Maximum of Products Distributed to Any Store

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`

You are given an integer `n` indicating there are `n` specialty retail stores. There are `m` product types of varying amounts, which are given as a **0-indexed** integer array `quantities`, where `quantities[i]` represents the number of products of the <code>i<sup>th</sup></code> product type.

You need to distribute **all products** to the retail stores following these rules:

- A store can only be given **at most one product type** but can be given any amount of it.
- After distribution, each store will have been given some number of products (possibly `0`). Let `x` represent the maximum number of products given to any store. You want `x` to be as small as possible, i.e., you want to **minimize** the **maximum** number of products that are given to any store.

Return _the minimum possible `x`_.

**Example 1:**

- **Input:** n = 6, quantities = [11,6]
- **Output:** 3
- **Explanation:** One optimal way is:
  - The 11 products of type 0 are distributed to the first four stores in these amounts: 2, 3, 3, 3
  - The 6 products of type 1 are distributed to the other two stores in these amounts: 3, 3
    The maximum number of products given to any store is max(2, 3, 3, 3, 3, 3) = 3.

**Example 2:**

- **Input:** n = 7, quantities = [15,10,10]
- **Output:** 5
- **Explanation:** One optimal way is:
  - The 15 products of type 0 are distributed to the first three stores in these amounts: 5, 5, 5
  - The 10 products of type 1 are distributed to the next two stores in these amounts: 5, 5
  - The 10 products of type 2 are distributed to the last two stores in these amounts: 5, 5
    The maximum number of products given to any store is max(5, 5, 5, 5, 5, 5, 5) = 5.


**Example 3:**

- **Input:** n = 1, quantities = [100000]
- **Output:** 100000
- **Explanation:** The only optimal way is:
  - The 100000 products of type 0 are distributed to the only store.
    The maximum number of products given to any store is max(100000) = 100000.



**Constraints:**

- `m == quantities.length`
- <code>1 <= m <= n <= 10<sup>5</sup></code>
- <code>1 <= quantities[i] <= 10<sup>5</sup></code>


**Hint:**
1. There exists a monotonic nature such that when x is smaller than some number, there will be no way to distribute, and when x is not smaller than that number, there will always be a way to distribute.
2. If you are given a number k, where the number of products given to any store does not exceed k, could you determine if all products can be distributed?
3. Implement a function canDistribute(k), which returns true if you can distribute all products such that any store will not be given more than k products, and returns false if you cannot. Use this function to binary search for the smallest possible k.



**Solution:**

We can use a binary search on the maximum possible number of products assigned to any store (`x`). Here’s a step-by-step explanation and the PHP solution:

### Approach

1. **Binary Search Setup**:
   - Set the lower bound (`left`) as 1 (since each store can get at least 1 product).
   - Set the upper bound (`right`) as the maximum quantity in `quantities` array (in the worst case, one store gets all products of a type).
   - Our goal is to minimize the value of `x` (maximum products given to any store).

2. **Binary Search Logic**:
   - For each mid-point `x`, check if it’s feasible to distribute all products such that no store has more than `x` products.
   - Use a helper function `canDistribute(x)` to determine feasibility.

3. **Feasibility Check (canDistribute)**:
   - For each product type in `quantities`, calculate the minimum number of stores needed to distribute that product type without exceeding `x` products per store.
   - Sum the required stores for all product types.
   - If the total required stores is less than or equal to `n`, the distribution is possible with `x` as the maximum load per store; otherwise, it is not feasible.

4. **Binary Search Adjustment**:
   - If `canDistribute(x)` returns `true`, it means `x` is a feasible solution, but we want to minimize `x`, so adjust the `right` bound.
   - If it returns `false`, increase the `left` bound since `x` is too small.

5. **Result**:
   - Once the binary search completes, `left` will hold the minimum possible `x`.

Let's implement this solution in PHP: **[2064. Minimized Maximum of Products Distributed to Any Store](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002064-minimized-maximum-of-products-distributed-to-any-store/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[] $quantities
 * @return Integer
 */
function minimizedMaximum($n, $quantities) {    
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to check if we can distribute products with maximum `x` per store
 *
 * @param $x
 * @param $quantities
 * @param $n
 * @return bool
 */
function canDistribute($x, $quantities, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimizedMaximum(6, [11, 6]); // Output: 3
echo minimizedMaximum(7, [15, 10, 10]); // Output: 5
echo minimizedMaximum(1, [100000]); // Output: 100000
?>
```

### Explanation:

1. **`canDistribute` function**:
   - For each `quantity`, it calculates the minimum stores required by dividing the `quantity` by `x` (using `ceil` to round up since each store can get a whole number of products).
   - It returns `false` if the cumulative required stores exceed `n`.

2. **Binary Search on `x`**:
   - The binary search iteratively reduces the range for `x` until it converges on the minimal feasible value.

3. **Efficiency**:
   - This solution is efficient for large input sizes (`n` and `m` up to `10^5`) because binary search runs in `O(log(max_quantity) * m)`, which is feasible within the given constraints.

This approach minimizes `x`, ensuring the products are distributed as evenly as possible across the stores.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
