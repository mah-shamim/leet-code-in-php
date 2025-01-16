1475\. Final Prices With a Special Discount in a Shop

**Difficulty:** Easy

**Topics:** `Array`, `Stack`, `Monotonic Stack`

You are given an integer array `prices` where `prices[i]` is the price of the <code>i<sup>th</sup></code> item in a shop.

There is a special discount for items in the shop. If you buy the <code>i<sup>th</sup></code> item, then you will receive a discount equivalent to `prices[j]` where `j` is the minimum index such that `j > i` and `prices[j] <= prices[i]`. Otherwise, you will not receive any discount at all.

Return an integer array `answer` where `answer[i]` is the final price you will pay for the <code>i<sup>th</sup></code> item of the shop, considering the special discount.

**Example 1:**

- **Input:** prices = [8,4,6,2,3]
- **Output:** [4,2,4,2,3]
- **Explanation:**
  - For item 0 with price[0]=8 you will receive a discount equivalent to prices[1]=4, therefore, the final price you will pay is 8 - 4 = 4.
  - For item 1 with price[1]=4 you will receive a discount equivalent to prices[3]=2, therefore, the final price you will pay is 4 - 2 = 2.
  - For item 2 with price[2]=6 you will receive a discount equivalent to prices[3]=2, therefore, the final price you will pay is 6 - 2 = 4.
  - For items 3 and 4 you will not receive any discount at all.

**Example 2:**

- **Input:** prices = [1,2,3,4,5]
- **Output:** [1,2,3,4,5]
- **Explanation:** In this case, for all items, you will not receive any discount at all.


**Example 3:**

- **Input:** prices = [10,1,1,6]
- **Output:** [9,0,1,6]



**Constraints:**

- `1 <= prices.length <= 500`
- `1 <= prices[i] <= 1000`


**Hint:**
1. Use brute force: For the ith item in the shop with a loop find the first position j satisfying the conditions and apply the discount, otherwise, the discount is 0.



**Solution:**

We need to apply a special discount based on the condition that there is a later item with a price less than or equal to the current price, we can use a brute-force approach. We'll iterate over the `prices` array and, for each item, look for the first item with a lower or equal price after it. This can be achieved with nested loops. We can utilize a stack to efficiently keep track of the items' prices and apply the special discount.

### Approach:
1. **Stack Approach**:
   - We can iterate over the prices array from left to right. For each item, we'll use the stack to keep track of prices that haven't yet found a discount.
   - For each price, we'll check if it is smaller than or equal to the price at the top of the stack. If so, it means that we can apply a discount.
   - The stack will store the indices of the items, and for each item, we will check if the current price is greater than the price at the index in the stack, meaning there is no discount. Otherwise, apply the discount by subtracting the corresponding price from the current price.

2. **Edge Case**: If no item has a smaller price later in the array, no discount is applied.

Let's implement this solution in PHP: **[1475. Final Prices With a Special Discount in a Shop](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001475-final-prices-with-a-special-discount-in-a-shop/solution.php)**

```php
<?php
/**
 * @param Integer[] $prices
 * @return Integer[]
 */
function finalPrices($prices) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$prices1 = [8, 4, 6, 2, 3];
$prices2 = [1, 2, 3, 4, 5];
$prices3 = [10, 1, 1, 6];

print_r(finalPrices($prices1)); // Output: [4, 2, 4, 2, 3]
print_r(finalPrices($prices2)); // Output: [1, 2, 3, 4, 5]
print_r(finalPrices($prices3)); // Output: [9, 0, 1, 6]
?>
```

### Explanation:

1. **Initialization**:
   - Create an array `$result` of the same size as `$prices` and initialize it to `0`.

2. **Outer Loop**:
   - Loop through each price at index `$i` to calculate its final price after discounts.

3. **Inner Loop**:
   - For each price `$i`, iterate through the subsequent prices `$j` (where `$j > $i`).
   - Check if `$prices[$j]` is less than or equal to `$prices[$i]`. If true, set `$discount = $prices[$j]` and exit the inner loop.

4. **Final Price Calculation**:
   - Subtract the found discount from `$prices[$i]` and store the result in `$result[$i]`.

5. **Return Result**:
   - After processing all prices, return the final result array.

### Complexity:
- **Time Complexity**: _**O(n²)**_ (due to the nested loops for each price).
- **Space Complexity**: _**O(n)**_ (for the result array).

### Example Outputs:
- For `prices = [8, 4, 6, 2, 3]`, the output is `[4, 2, 4, 2, 3]`.
- For `prices = [1, 2, 3, 4, 5]`, the output is `[1, 2, 3, 4, 5]`.
- For `prices = [10, 1, 1, 6]`, the output is `[9, 0, 1, 6]`.

This approach will work within the constraints of the problem (`1 <= prices.length <= 500`), even though it is not the most optimized solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
