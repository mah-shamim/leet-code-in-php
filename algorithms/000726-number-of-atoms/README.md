726\. Number of Atoms

Hard

Given a string `formula` representing a chemical formula, return _the count of each atom_.

The atomic element always starts with an uppercase character, then zero or more lowercase letters, representing the name.

One or more digits representing that element's count may follow if the count is greater than `1`. If the count is `1`, no digits will follow.

- For example, `"H2O"` and `"H2O2"` are possible, but `"H1O2"` is impossible.

Two formulas are concatenated together to produce another formula.

- For example, `"H2O2He3Mg4"` is also a formula.

A formula placed in parentheses, and a count (optionally added) is also a formula.

- For example, `"(H2O2)"` and `"(H2O2)3"` are formulas.

Return the count of all elements as a string in the following form: the first name (in sorted order), followed by its count (if that count is more than `1`), followed by the second name (in sorted order), followed by its count (if that count is more than `1`), and so on.

The test cases are generated so that all the values in the output fit in a `32-bit` integer.

**Example 1:**

- **Input:** formula = "H2O"
- **Output:** "H2O"
- **Explanation:** The count of elements are {'H': 2, 'O': 1}.

**Example 2:**

- **Input:** formula = "Mg(OH)2"
- **Output:** "H2MgO2"
- **Explanation:** The count of elements are {'H': 2, 'Mg': 1, 'O': 2}.

**Example 3:**

- **Input:** formula = "K4(ON(SO3)2)2"
- **Output:** "K4N2O14S4"
- **Explanation:** The count of elements are {'K': 4, 'N': 2, 'O': 14, 'S': 4}.

**Constraints:**

- `1 <= formula.length <= 1000`
- `formula` consists of English letters, digits, `'('`, and `')'`.
- `formula` is always valid.

**Hint:**
1. To parse formula[i:], when we see a `'('`, we will parse recursively whatever is inside the brackets (up to the correct closing ending bracket) and add it to our count, multiplying by the following multiplicity if there is one. Otherwise, we should see an uppercase character: we will parse the rest of the letters to get the name, and add that (plus the multiplicity if there is one.)


**Solution:**

Here's the step-by-step approach:

1. **Initialize a Stack and a Counter:** Use a stack to keep track of the current context of counts when parsing nested structures. The counter will help us store the counts of atoms at the current level.

2. **Iterate Over the Formula:** Traverse the formula string character by character.

3. **Handle Parentheses:**
    - When encountering `'('`, push the current counter onto the stack and reset the counter for the new context.
    - When encountering `')'`, finalize the current counter, then look ahead to find the multiplier, and pop the previous counter from the stack to merge the counts.

4. **Handle Atoms and Multipliers:**
    - When encountering an uppercase letter, start reading the atom name.
    - Continue reading if there are lowercase letters.
    - Look ahead for digits to find the count of the current atom and update the counter.

5. **Merge Counts and Produce Output:**
    - After traversing the string, combine counts from nested contexts.
    - Sort the final atom counts by atom name.
    - Construct the output string with sorted atom names and their counts (if greater than `1`).

Here is the complete solution in PHP: **[726. Number of Atoms](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000726-number-of-atoms/solution.php)**

```php
<?php

// Test cases
echo countOfAtoms("H2O") . "\n"; // Output: "H2O"
echo countOfAtoms("Mg(OH)2") . "\n"; // Output: "H2MgO2"
echo countOfAtoms("K4(ON(SO3)2)2") . "\n"; // Output: "K4N2O14S4"
?>
```

### Explanation of Key Parts:
- **Handling Parentheses:** When encountering `(` or `)`, the solution uses a stack to manage nested contexts.
- **Counting Atoms:** Each atom's count is updated in the `$counter` array.
- **Sorting and Output:** The final counts are sorted by atom name and formatted appropriately for the result.

This approach ensures that the formula is parsed correctly even with nested parentheses and multipliers, and that the counts are accurate and correctly sorted.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
