17\. Letter Combinations of a Phone Number

**Difficulty:** Medium

Given a string containing digits from `2-9` inclusive, return all possible letter combinations that the number could represent. Return the answer in **any order**.

A mapping of digit to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.

![](https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Telephone-keypad2.svg/200px-Telephone-keypad2.svg.png)

**Example 1:**

- **Input:** digits = "23"
- **Output:** ["ad","ae","af","bd","be","bf","cd","ce","cf"]

**Example 2:**

- **Input:** digits = ""
- **Output:** []

**Example 3:**

- **Input:** digits = "2"
- **Output:** ["a","b","c"]

**Constraints:**

- `0 <= digits.length <= 4`
- `digits[i]` is a digit in the range `['2', '9']`.


**Solution:**


To solve this problem, we can follow these steps:

1. **Mapping Creation**:
   Create an associative array to map each digit to its corresponding letters.

2. **Recursive Function**:
   Use a recursive function to build combinations. This function will take the current combination being built and the remaining digits to process.

3. **Base Case**:
   When no more digits are left, add the current combination to the result list.

4. **Recursive Case**:
   For each letter mapped from the current digit, append it to the current combination and recurse with the remaining digits.


Let's implement this solution in PHP: **[17. Letter Combinations of a Phone Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000017-letter-combinations-of-a-phone-number/solution.php)**

```php
<?php
// Test the function
print_r(letterCombinations("23")); // Output: ["ad","ae","af","bd","be","bf","cd","ce","cf"]
print_r(letterCombinations("")); // Output: []
print_r(letterCombinations("2")); // Output: ["a","b","c"]
?>
```

### Explanation:

1. **Mapping Creation**: An associative array `$phoneMap` maps digits to their corresponding letters.

2. **Recursive Function**: The `backtrack` function builds combinations by appending letters and processing the remaining digits.

3. **Base Case**: When no digits are left (`strlen($nextDigits) === 0`), the current combination is added to the result.

4. **Recursive Case**: For each letter corresponding to the current digit, the function recursively builds the combination.

This approach is efficient given the constraints and handles edge cases like empty input properly. If you have any more questions or need further modifications, let me know!

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

