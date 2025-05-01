2140\. Solving Questions With Brainpower

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`

You are given a **0-indexed** 2D integer array `questions` where <code>questions[i] = [points<sub>i</sub>, brainpower<sub>i</sub>]</code>.

The array describes the questions of an exam, where you have to process the questions **in order** (i.e., starting from question `0`) and make a decision whether to **solve** or **skip** each question. Solving question `i` will earn you points<sub>i</sub> points but you will be **unable** to solve each of the next brainpower<sub>i</sub> questions. If you skip question `i`, you get to make the decision on the next question.

- For example, given `questions = [[3, 2], [4, 3], [4, 4], [2, 5]]`:
  - If question `0` is solved, you will earn `3` points but you will be unable to solve questions `1` and `2`.
  - If instead, question `0` is skipped and question `1` is solved, you will earn `4` points but you will be unable to solve questions `2` and `3`.

Return _the **maximum** points you can earn for the exam_.

**Example 1:**

- **Input:** questions = [[3,2],[4,3],[4,4],[2,5]]
- **Output:** 5
- **Explanation:** The maximum points can be earned by solving questions 0 and 3.
  - Solve question 0: Earn 3 points, will be unable to solve the next 2 questions
  - Unable to solve questions 1 and 2
  - Solve question 3: Earn 2 points
    Total points earned: 3 + 2 = 5. There is no other way to earn 5 or more points.

**Example 2:**

- **Input:** questions = [[1,1],[2,2],[3,3],[4,4],[5,5]]
- **Output:** 7
- **Explanation:** The maximum points can be earned by solving questions 1 and 4.
  - Skip question 0
  - Solve question 1: Earn 2 points, will be unable to solve the next 2 questions
  - Unable to solve questions 2 and 3
  - Solve question 4: Earn 5 points
    Total points earned: 2 + 5 = 7. There is no other way to earn 7 or more points.



**Constraints:**

- <code>1 <= questions.length <= 10<sup>5</sup></code>
- `questions[i].length == 2`
- <code>1 <= points<sub>i</sub>, brainpower<sub>i</sub> <= 10<sup>5</sup></code>


**Hint:**
1. For each question, we can either solve it or skip it. How can we use Dynamic Programming to decide the most optimal option for each problem?
2. We store for each question the maximum points we can earn if we started the exam on that question.
3. If we skip a question, then the answer for it will be the same as the answer for the next question.
4. If we solve a question, then the answer for it will be the points of the current question plus the answer for the next solvable question.
5. The maximum of these two values will be the answer to the current question.



**Solution:**

We need to maximize the points we can earn from solving exam questions, given that solving a question prevents us from solving the next few questions as specified by its brainpower value. This problem can be efficiently tackled using dynamic programming.

### Approach
1. **Dynamic Programming (DP) Setup**: We use a DP array where `dp[i]` represents the maximum points we can earn starting from the `i-th` question to the end of the exam.
2. **Reverse Iteration**: We iterate through the questions from the last to the first. This allows us to build up the solution by considering each question's impact on future questions.
3. **Decision Making**: For each question `i`, we have two choices:
   - **Solve the Question**: Earn the points of the current question and skip the next `brainpower[i]` questions. The points earned will be the current question's points plus the maximum points from the next allowable question.
   - **Skip the Question**: Move to the next question without earning any points from the current one. The points earned will be the same as the maximum points starting from the next question.
4. **Optimal Choice**: For each question, we take the maximum points from either solving or skipping it, updating the DP array accordingly.

Let's implement this solution in PHP: **[2140. Solving Questions With Brainpower](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002140-solving-questions-with-brainpower/solution.php)**

```php
<?php
/**
 * @param Integer[][] $questions
 * @return Integer
 */
function mostPoints($questions) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
$questions1 = [[3,2],[4,3],[4,4],[2,5]];
echo maxPoints($questions1) . "\n"; // Output: 5

$questions2 = [[1,1],[2,2],[3,3],[4,4],[5,5]];
echo maxPoints($questions2) . "\n"; // Output: 7
?>
```

### Explanation:

1. **Initialization**: We initialize a DP array `dp` of size `n+1` (where `n` is the number of questions) to store the maximum points starting from each question. The last element is initialized to 0 since there are no questions beyond the last one.
2. **Reverse Iteration**: Starting from the last question and moving backwards, we determine the maximum points for each question based on whether we solve or skip it.
3. **Solving a Question**: If we solve the `i-th` question, we add its points to the maximum points starting from the next allowable question (after skipping `brainpower[i]` questions). This is computed using the DP value at the next allowable index.
4. **Skipping a Question**: If we skip the `i-th` question, the maximum points are simply the DP value of the next question.
5. **Result**: The maximum points we can earn from the entire exam is stored in `dp[0]`, which considers all questions starting from the first.

This approach efficiently computes the solution in O(n) time and space complexity, making it suitable for large input sizes up to 100,000 questions.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**