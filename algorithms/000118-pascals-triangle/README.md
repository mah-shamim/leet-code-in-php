118\. Pascal's Triangle

**Difficulty:** Easy

**Topics:** `Array`, `Dynamic Programming`

Given an integer `numRows`, return the first numRows of **Pascal's triangle**.

In **Pascal's triangle**, each number is the sum of the two numbers directly above it as shown:
![PascalTriangleAnimated2](https://upload.wikimedia.org/wikipedia/commons/0/0d/PascalTriangleAnimated2.gif)


**Example 1:**

- **Input:** numRows = 5
- **Output:** [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]

**Example 2:**

- **Input:** numRows = 1
- **Output:** [[1]]

**Constraints:**

- `1 <= numRows <= 30`


**Similar Questions:**
1. [119. Pascal's Triangle II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000119-pascals-triangle-ii)
2. [3463. Check If Digits Are Equal in String After Operations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003463-check-if-digits-are-equal-in-string-after-operations-ii)






**Solution:**

We need to generate the first `numRows` of Pascal's Triangle. Pascal's Triangle is a triangular array of numbers where each number is the sum of the two numbers directly above it. The solution involves building the triangle row by row, starting from the top.

### Approach
1. **Initialization**: Start with the first row of the triangle, which is always `[1]`.
2. **Iterate for Subsequent Rows**: For each subsequent row (from 1 to `numRows-1`):
    - The first element of each row is always `1`.
    - Each middle element (from index 1 to the second last index) is the sum of the two elements above it from the previous row.
    - The last element of each row is always `1`.
3. **Build the Result**: Collect each generated row into a result list which is returned at the end.

Let's implement this solution in PHP: **[118. Pascal's Triangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000118-pascals-triangle/solution.php)**

```php
<?php
/**
 * @param Integer $numRows
 * @return Integer[][]
 */
function generate($numRows) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// ----- Example usage -----

// Example 1:
$numRows = 5;
$result = generate($numRows);
// Print result in readable form
echo "Input: numRows = {$numRows}\n";
echo "Output:\n";
print_r($result);

// Example 2:
$numRows = 1;
$result = generate($numRows);
echo "\nInput: numRows = {$numRows}\n";
echo "Output:\n";
print_r($result);
?>
```

### Explanation:

1. **Initialization**: The result list is initialized with the first row `[1]`.
2. **Row Generation Loop**: For each row from 1 to `numRows-1`:
    - **First Element**: Always `1`.
    - **Middle Elements**: Each element at position `j` in the current row is the sum of the elements at positions `j-1` and `j` in the previous row.
    - **Last Element**: Always `1`.
3. **Result Construction**: Each generated row is added to the result list, which is returned after all rows are processed.

This approach efficiently builds each row of Pascal's Triangle by leveraging the properties of the triangle and the values from the previous row, ensuring optimal performance with a time complexity of O(numRows²).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)** 