552\. Student Attendance Record II

**Difficulty:** Hard

**Topics:** `Dynamic Programming`

An attendance record for a student can be represented as a string where each character signifies whether the student was absent, late, or present on that day. The record only contains the following three characters:

- `'A'`: Absent.
- `'L'`: Late.
- `'P'`: Present.

Any student is eligible for an attendance award if they meet **both** of the following criteria:

- The student was absent (`'A'`) for **strictly** fewer than 2 days **total**.
- The student was **never** late (`'L'`) for 3 or more **consecutive** days.

Given an integer `n`, return _the **number** of possible attendance records of length `n` that make a student eligible for an attendance award. The answer may be very large, so return it **modulo** <code>10<sup>9</sup> + 7</code>._

**Example 1:**

- **Input:** n = 2
- **Output:** 8
- **Explanation:** There are 8 records with length 2 that are eligible for an award:\
  "PP", "AP", "PA", "LP", "PL", "AL", "LA", "LL"\
  Only "AA" is not eligible because there are 2 absences (there need to be fewer than 2).

**Example 2:**

- **Input:** n = 1
- **Output:** 3 

**Example 3:**

- **Input:** n = 10101
- **Output:** 183236316 

**Constraints:**

- <code>1 <= n <= 10<sup>9</sup></code>



**Solution:**

We can use a dynamic programming approach. Given the constraints, especially the high value for `n`, an efficient solution is required.

Here's a step-by-step solution approach:

### Solution Approach

1. **Define the State Variables:**
  We use dynamic programming to keep track of the number of valid records based on:
   - Number of absences
   - Number of consecutive late days

   Let:
   - `dp[i][0][0]` be the number of valid records of length `i` with 0 absences and no late days.
   - `dp[i][0][1]` be the number of valid records of length `i` with 0 absences and 1 late day.
   - `dp[i][0][2]` be the number of valid records of length `i` with 0 absences and 2 consecutive late days.
   - `dp[i][1][0]` be the number of valid records of length `i` with 1 absence and no late days.
   - `dp[i][1][1]` be the number of valid records of length `i` with 1 absence and 1 late day.
   - `dp[i][1][2]` be the number of valid records of length `i` with 1 absence and 2 consecutive late days.

2. **Base Case:**
   - Initialize the DP table for length 1.

3. **State Transition:**
   - For each record of length `i`, determine how it can be extended to a record of length `i+1`.

4. **Final Calculation:**
   - Sum up all valid records of length `n` that meet the criteria.

Let's implement this solution in PHP: **[552. Student Attendance Record II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000552-student-attendance-record-ii/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function countValidAttendanceRecords($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
echo countValidRecords(2) . "\n";  // Output: 8
echo countValidRecords(1) . "\n";  // Output: 3
echo countValidRecords(10101) . "\n";  // Output: 183236316
?>
```

### Explanation:

- **Initialization:** We start with records of length 0. For each additional day, we update our counts based on the possible records of the previous day.
- **Transition:** For each state, we determine how it transitions to the next state based on adding 'P', 'A', or 'L'.
- **Final Calculation:** We sum up all valid states at the end to get the total number of valid records.

This approach efficiently handles the problem using dynamic programming, considering the constraints and ensuring modular arithmetic to manage large numbers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
