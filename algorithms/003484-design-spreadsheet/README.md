3484\. Design Spreadsheet

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Design`, `Matrix`, `Biweekly Contest 152`

A spreadsheet is a grid with 26 columns (labeled from `'A'` to `'Z'`) and a given number of `rows`. Each cell in the spreadsheet can hold an integer value between `0` and <code>10<sup>5</sup></code>.

Implement the `Spreadsheet` class:

- `Spreadsheet(int rows)` Initializes a spreadsheet with 26 columns (labeled `'A'` to `'Z'`) and the specified number of rows. All cells are initially set to 0.
- `void setCell(String cell, int value)` Sets the value of the specified `cell`. The cell reference is provided in the format `"AX"` (e.g., `"A1"`, `"B10"`), where the letter represents the column (from `'A'` to `'Z'`) and the number represents a **1-indexed** row.
- `void resetCell(String cell)` Resets the specified cell to 0.
- `int getValue(String formula)` Evaluates a formula of the form `"=X+Y"`, where `X` and `Y` are **either** cell references or non-negative integers, and returns the computed sum.

**Note:** If `getValue` references a cell that has not been explicitly set using `setCell`, its value is considered 0.

**Example 1:**

- **Input:**
  ["Spreadsheet", "getValue", "setCell", "getValue", "setCell", "getValue", "resetCell", "getValue"]
  [[3], ["=5+7"], ["A1", 10], ["=A1+6"], ["B2", 15], ["=A1+B2"], ["A1"], ["=A1+B2"]]
- **Output:** [null, 12, null, 16, null, 25, null, 15]
- **Explanation:** 
  Spreadsheet spreadsheet = new Spreadsheet(3); // Initializes a spreadsheet with 3 rows and 26 columns
  spreadsheet.getValue("=5+7"); // returns 12 (5+7)
  spreadsheet.setCell("A1", 10); // sets A1 to 10
  spreadsheet.getValue("=A1+6"); // returns 16 (10+6)
  spreadsheet.setCell("B2", 15); // sets B2 to 15
  spreadsheet.getValue("=A1+B2"); // returns 25 (10+15)
  spreadsheet.resetCell("A1"); // resets A1 to 0
  spreadsheet.getValue("=A1+B2"); // returns 15 (0+15)

**Constraints:**

- <code>1 <= rows <= 10<sup>3</sup></code>
- <code>0 <= value <= 10<sup>5</sup></code>
- The formula is always in the format `"=X+Y"`, where `X` and `Y` are either valid cell references or **non-negative** integers with values less than or equal to <code>10<sup>5</sup></code>.
- Each cell reference consists of a capital letter from `'A'` to `'Z'` followed by a row number between `1` and `rows`.
- At most <code>10<sup>4</sup></code> calls will be made in total to `setCell`, `resetCell`, and `getValue`.



**Hint:**
1. Use a hashmap to represent the cells, where the key is the cell reference (e.g., `"A1"`) and the value is the integer stored in the cell.
2. For `setCell`, simply assign the given value to the specified cell in the hashmap.
3. For `resetCell`, set the value of the specified cell to `0` in the hashmap.
4. For `getValue`, find the values of the operands from the hashmap and return their sum.


**Similar Questions:**
1. [168. Excel Sheet Column Title](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000168-excel-sheet-column-title)






**Solution:**

We need to design a spreadsheet class that supports setting cell values, resetting cell values, and evaluating formulas that sum two operands, which can be either cell references or integers. The key challenge is efficiently managing cell values and parsing formulas to compute the sum correctly.

### Approach
1. **Initialization**: The spreadsheet is initialized with a specified number of rows and 26 columns (A-Z). All cells start with a value of 0.
2. **Storing Cell Values**: Use a hash map (associative array in PHP) to store cell values where the key is the cell reference (e.g., "A1") and the value is the integer stored in that cell.
3. **Setting Cells**: When setting a cell, update its value in the hash map.
4. **Resetting Cells**: When resetting a cell, set its value to 0 in the hash map.
5. **Evaluating Formulas**: For formulas of the form "=X+Y", split the formula into two parts. For each part, check if it is a cell reference (starts with a letter followed by digits) or an integer. If it's a cell reference, retrieve its value from the hash map (defaulting to 0 if not set). If it's an integer, convert it to a number. Sum the two parts and return the result.

Let's implement this solution in PHP: **[3484. Design Spreadsheet](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003484-design-spreadsheet/solution.php)**

```php
<?php
class Spreadsheet {
    private $rows;
    private $cells;

    /**
     * @param Integer $rows
     */
    function __construct($rows) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param String $cell
     * @param Integer $value
     * @return NULL
     */
    function setCell($cell, $value) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param String $cell
     * @return NULL
     */
    function resetCell($cell) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param String $formula
     * @return Integer
     */
    function getValue($formula) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * Your Spreadsheet object will be instantiated and called as such:
 * $obj = Spreadsheet($rows);
 * $obj->setCell($cell, $value);
 * $obj->resetCell($cell);
 * $ret_3 = $obj->getValue($formula);
 */

// Test cases
$spreadsheet = new Spreadsheet(3);

echo $spreadsheet->getValue("=5+7") . PHP_EOL; // 12
$spreadsheet->setCell("A1", 10);
echo $spreadsheet->getValue("=A1+6") . PHP_EOL; // 16
$spreadsheet->setCell("B2", 15);
echo $spreadsheet->getValue("=A1+B2") . PHP_EOL; // 25
$spreadsheet->resetCell("A1");
echo $spreadsheet->getValue("=A1+B2") . PHP_EOL; // 15
?>
```

### Explanation:

- **Initialization**: The constructor initializes the spreadsheet with the given number of rows and an empty array to store cell values.
- **setCell**: This method updates the value of a specified cell in the associative array.
- **resetCell**: This method sets the value of a specified cell to 0 in the associative array.
- **getValue**: This method processes the formula by first removing the leading '=' and splitting the string by '+'. Each part is checked to see if it matches the pattern of a cell reference (a letter followed by digits). If it does, the corresponding cell value is retrieved from the associative array (or 0 if not set). If it doesn't match, the part is treated as an integer and converted. The sum of the two parts is returned.

This approach efficiently manages cell values and evaluates formulas by leveraging regular expressions to distinguish between cell references and integers, ensuring correct summation based on the current state of the spreadsheet. The solution handles all constraints and edge cases as specified in the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**