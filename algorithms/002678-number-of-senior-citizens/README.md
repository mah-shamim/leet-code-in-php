2678\. Number of Senior Citizens

Easy

You are given a **0-indexed** array of strings `details`. Each element of `details` provides information about a given passenger compressed into a string of length `15`. The system is such that:

- The first ten characters consist of the phone number of passengers.
- The next character denotes the gender of the person.
- The following two characters are used to indicate the age of the person.
- The last two characters determine the seat allotted to that person.

Return _the number of passengers who are **strictly more than 60 years old**_.

**Example 1:**

- **Input:** details = ["7868190130M7522","5303914400F9211","9273338290F4010"]
- **Output:** 2
- **Explanation:** The passengers at indices 0, 1, and 2 have ages 75, 92, and 40. Thus, there are 2 people who are over 60 years old.

**Example 2:**

- **Input:** details = ["1313579440F2036","2921522980M5644"]
- **Output:** 0
- **Explanation:** None of the passengers are older than 60.

**Constraints:**

- <code>1 <= details.length <= 100</code>
- <code>details[i].length == 15</code>
- <code>details[i] consists of digits from '0' to '9'.</code>
- `details[i][10] is either 'M' or 'F' or 'O'.`
- The phone numbers and seat numbers of the passengers are distinct.

**Hint:**
1. Convert the value at index `11` and `12` to a numerical value.
2. The age of the person at index i is equal to `details[i][11]*10+details[i][12]`.


**Solution:**


To solve this problem, we can follow these steps:

1. **Extract the Age**: The age is located at the 12th and 13th positions in each string.
2. **Convert to Integer**: Convert the extracted age substring to an integer.
3. **Count Senior Citizens**: Count how many of these ages are strictly greater than 60.


Let's implement this solution in PHP: **[2678. Number of Senior Citizens](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002678-number-of-senior-citizens/solution.php)**

```php
<?php
// Example usage:
$details1 = ["7868190130M7522","5303914400F9211","9273338290F4010"];
$details2 = ["1313579440F2036","2921522980M5644"];

echo countSeniorCitizens($details1); // Output: 2
echo countSeniorCitizens($details2); // Output: 0

?>
```

### Explanation:

1. **Function Definition**: The function `countSeniorCitizens` takes an array of strings `details` as input.
2. **Initialize Counter**: We initialize a counter `$seniorCount` to keep track of the number of senior citizens.
3. **Loop Through Each Detail**: We loop through each element in the `details` array.
4. **Extract Age**: For each detail string, we extract the substring from index 11 to 12 (2 characters) and convert it to an integer using `intval`.
5. **Check Age Condition**: We check if the extracted age is strictly greater than 60.
6. **Increment Counter**: If the condition is true, we increment the `$seniorCount`.
7. **Return Count**: After looping through all the details, we return the count of senior citizens.

### Testing:

- For the input `["7868190130M7522","5303914400F9211","9273338290F4010"]`, the output is `2` because the ages are 75, 92, and 40, with 75 and 92 being greater than 60.
- For the input `["1313579440F2036","2921522980M5644"]`, the output is `0` because the ages are 20 and 56, neither of which are greater than 60.

This solution is efficient and straightforward, working within the constraints provided.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
