2094\. Finding 3-Digit Even Numbers

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sorting`, `Enumeration`

You are given an integer array `digits`, where each element is a digit. The array may contain duplicates.

You need to find **all** the **unique** integers that follow the given requirements:

- The integer consists of the **concatenation** of **three** elements from `digits` in **any** arbitrary order.
- The integer does not have **leading zeros**.
- The integer is **even**.

For example, if the given `digits` were `[1, 2, 3]`, integers `132` and `312` follow the requirements.

Return _a **sorted** array of the unique integers_.

**Example 1:**

- **Input:** digits = [2,1,3,0]
- **Output:** [102,120,130,132,210,230,302,310,312,320]
- **Explanation:** All the possible integers that follow the requirements are in the output array.
  Notice that there are no **odd** integers or integers with **leading zeros**.

**Example 2:**

- **Input:** digits = [2,2,8,8,2]
- **Output:** [222,228,282,288,822,828,882]
- **Explanation:** The same digit can be used as many times as it appears in digits.
  In this example, the digit 8 is used twice each time in 288, 828, and 882.


**Example 3:**

- **Input:** digits = [3,7,5]
- **Output:** []
- **Explanation:** No **even** integers can be formed using the given digits.



**Constraints:**

- `3 <= digits.length <= 100`
- `0 <= digits[i] <= 9`


**Hint:**
1. The range of possible answers includes all even numbers between 100 and 999 inclusive. Could you check each possible answer to see if it could be formed from the digits in the array?



**Solution:**

We need to find all unique 3-digit even numbers that can be formed using the digits from a given array. The numbers must not have leading zeros and must be even. The solution involves checking each possible 3-digit even number to see if it can be formed using the available digits in the given array.

### Approach
1. **Preprocess the Digits**: Create a frequency map of the digits in the input array. This helps in quickly checking the availability of each digit and their counts.
2. **Generate Candidates**: Iterate through all possible 3-digit even numbers (from 100 to 998, stepping by 2). For each number, check if it meets the criteria:
   - The first digit (hundreds place) should not be zero.
   - Each digit in the number must be present in the original array with sufficient frequency.
3. **Validation**: For each candidate number, split it into its individual digits and validate against the frequency map to ensure the original array can form the number.
4. **Collect Results**: Collect all valid numbers and return them sorted. Since we generate candidates in ascending order, the result is naturally sorted.

Let's implement this solution in PHP: **[2094. Finding 3-Digit Even Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002094-finding-3-digit-even-numbers/solution.php)**

```php
<?php
/**
 * @param Integer[] $digits
 * @return Integer[]
 */
function findEvenNumbers($digits) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$digits1 = array(2, 1, 3, 0);
print_r(findEvenNumbers($digits1)); // Output: [102, 120, 130, 132, 210, 230, 302, 310, 312, 320]

$digits2 = array(2, 2, 8, 8, 2);
print_r(findEvenNumbers($digits2)); // Output: [222, 228, 282, 288, 822, 828, 882]

$digits3 = array(3, 7, 5);
print_r(findEvenNumbers($digits3)); // Output: []
?>
```

### Explanation:

1. **Frequency Map Creation**: We use `array_count_values` to create a frequency map of the digits in the input array. This helps in quickly checking the availability of each digit and their counts.
2. **Candidate Generation**: We generate all possible 3-digit even numbers starting from 100 up to 998. Each number is checked to ensure it does not start with zero and ends with an even digit.
3. **Validation Check**: For each candidate number, we split it into its constituent digits and check if each digit (and its required count) is available in the original array using the frequency map.
4. **Result Collection**: Valid numbers are collected into the result array, which is returned as the final answer. The numbers are generated in ascending order, so the result is already sorted.

This approach efficiently checks each possible candidate using the frequency map, ensuring that we only consider valid numbers while avoiding duplicates and leading zeros.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**