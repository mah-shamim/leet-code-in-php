3024\. Type of Triangle

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Sorting`

You are given a **0-indexed** integer array `nums` of size `3` which can form the sides of a triangle.

- A triangle is called **equilateral** if it has all sides of equal length.
- A triangle is called **isosceles** if it has exactly two sides of equal length.
- A triangle is called **scalene** if all its sides are of different lengths.

Return _a string representing the type of triangle that can be formed or `"none"` if it **cannot** form a triangle_.

**Example 1:**

- **Input:** nums = [3,3,3]
- **Output:** "equilateral"
- **Explanation:** Since all the sides are of equal length, therefore, it will form an equilateral triangle.

**Example 2:**

- **Input:** nums = [3,4,5]
- **Output:** "scalene"
- **Explanation:**
  nums[0] + nums[1] = 3 + 4 = 7, which is greater than nums[2] = 5.
  nums[0] + nums[2] = 3 + 5 = 8, which is greater than nums[1] = 4.
  nums[1] + nums[2] = 4 + 5 = 9, which is greater than nums[0] = 3.
  Since the sum of the two sides is greater than the third side for all three cases, therefore, it can form a triangle.
  As all the sides are of different lengths, it will form a scalene triangle.



**Constraints:**

- `nums.length == 3`
- `1 <= nums[i] <= 100`


**Hint:**
1. The condition for a valid triangle is that for any two sides, the sum of their lengths must be greater than the third side.
2. Simply count the number of unique edge lengths after checking it’s a valid triangle.



**Solution:**

We need to determine the type of triangle that can be formed with three given side lengths. The possible types are equilateral, isosceles, scalene, or none if the sides cannot form a valid triangle.

### Approach
1. **Check Validity of Triangle**: For three sides to form a valid triangle, the sum of the lengths of any two sides must be greater than the length of the third side. Sorting the sides simplifies this check because we only need to ensure that the sum of the two smaller sides is greater than the largest side.
2. **Determine Triangle Type**: After confirming the sides form a valid triangle, we check the equality of the sides:
   - **Equilateral**: All three sides are equal.
   - **Isosceles**: Exactly two sides are equal.
   - **Scalene**: All sides are different.

Let's implement this solution in PHP: **[3024. Type of Triangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003024-type-of-triangle/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return String
 */
function triangleType($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usages:
echo triangleType([3, 3, 3]) . "\n"; // Output: equilateral
echo triangleType([3, 4, 5]) . "\n"; // Output: scalene
echo triangleType([5, 5, 8]) . "\n"; // Output: isosceles
echo triangleType([1, 2, 3]) . "\n"; // Output: none
?>
```

### Explanation:

1. **Sorting the Sides**: By sorting the array of sides, we can easily access the smallest and largest sides, which simplifies the validity check.
2. **Validity Check**: After sorting, the sum of the two smallest sides (first two elements) is compared against the largest side (third element). If this sum is not greater than the largest side, the sides cannot form a triangle.
3. **Type Determination**: Using the sorted array, we check for equality between the sides:
   - If all three sides are equal, the triangle is equilateral.
   - If exactly two sides are equal, the triangle is isosceles.
   - If all sides are different, the triangle is scalene.

This approach efficiently checks the validity and type of the triangle using sorting and simple comparisons, ensuring optimal performance for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**