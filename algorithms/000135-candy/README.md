135\. Candy

**Difficulty:** Hard

**Topics:** `Array`, `Greedy`

There are `n` children standing in a line. Each child is assigned a rating value given in the integer array `ratings`.

You are giving candies to these children subjected to the following requirements:

- Each child must have at least one candy.
- Children with a higher rating get more candies than their neighbors.

Return _the minimum number of candies you need to have to distribute the candies to the children_.

**Example 1:**

- **Input:** ratings = [1,0,2]
- **Output:** 5
- **Explanation:** You can allocate to the first, second and third child with 2, 1, 2 candies respectively.

**Example 2:**

- **Input:** ratings = [1,2,2]
- **Output:** 4
- **Explanation:** You can allocate to the first, second and third child with 1, 2, 1 candies respectively.
  The third child gets 1 candy because it satisfies the above two conditions.



**Constraints:**

- `n == ratings.length`
- <code>1 <= n <= 2 * 10<sup>4</sup></code>
- <code>0 <= ratings[i] <= 2 * 10<sup>4</sup></code>



**Solution:**

We need to distribute candies to children standing in a line such that each child gets at least one candy, and children with higher ratings than their neighbors receive more candies. The goal is to determine the minimum number of candies required to meet these conditions.

### Approach
1. **Initialization**: Start by assigning each child one candy, as every child must have at least one candy.
2. **Left to Right Pass**: Traverse the array from left to right. For each child, if their rating is higher than the left neighbor's rating, assign them one more candy than the left neighbor. This ensures that higher-rated children to the right get more candies than their left neighbors.
3. **Right to Left Pass**: Traverse the array from right to left. For each child, if their rating is higher than the right neighbor's rating, assign them the maximum of their current candy count or one more than the right neighbor's candy count. This ensures that higher-rated children to the left get more candies than their right neighbors while respecting the candies assigned during the left pass.
4. **Summing Candies**: Sum all the candies distributed to get the minimum total number of candies required.

Let's implement this solution in PHP: **[135. Candy](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000135-candy/solution.php)**

```php
<?php
/**
 * @param Integer[] $ratings
 * @return Integer
 */
function candy($ratings) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$ratings = [1, 0, 2];
echo "Output: " . candy($ratings) . "\n"; // Output: 5

// Example 2
$ratings = [1, 2, 2];
echo "Output: " . candy($ratings) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Initialization**: Each child starts with one candy, stored in the `$candies` array.
2. **Left to Right Pass**: For each child from the second to the last, if their rating is higher than the previous child's rating, they receive one more candy than the previous child. This ensures that left neighbors with lower ratings have fewer candies.
3. **Right to Left Pass**: For each child from the second last to the first, if their rating is higher than the next child's rating, they receive the maximum of their current candy count or one more than the next child's candy count. This ensures that right neighbors with lower ratings have fewer candies while maintaining the constraints from the left pass.
4. **Summing Candies**: The total number of candies is the sum of all values in the `$candies` array, which meets all distribution constraints with the minimum number of candies.

This approach efficiently satisfies the problem constraints by making two passes over the array, ensuring optimal candy distribution with minimal total candies. The complexity is O(n) time and O(n) space, where n is the number of children.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**