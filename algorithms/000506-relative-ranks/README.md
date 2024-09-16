506\. Relative Ranks

**Difficulty:** Easy

**Topics:** `Array`, `Sorting`, `Heap (Priority Queue)`

You are given an integer array `score` of size `n`, where `score[i]` is the score of the <code>i<sup>th</sup></code> athlete in a competition. All the scores are guaranteed to be **unique**.

The athletes are **placed** based on their scores, where the <code>1<sup>st</sup></code> place athlete has the highest score, the <code>2<sup>nd</sup></code> place athlete has the <code>2<sup>nd</sup></code> highest score, and so on. The placement of each athlete determines their rank:

- The <code>1<sup>st</sup></code> place athlete's rank is `"Gold Medal"`.
- The <code>2<sup>nd</sup></code> place athlete's rank is `"Silver Medal"`.
- The <code>3<sup>rd</sup></code> place athlete's rank is `"Bronze Medal"`.
- For the <code>4<sup>th</sup></code> place to the <code>n<sup>th</sup></code> place athlete, their rank is their placement number (i.e., the <code>x<sup>th</sup></code> place athlete's rank is <code>"x"</code>).

Return an array `answer` of size `n` where `answer[i]` is the rank of the <code>i<sup>th</sup></code> athlete.

**Example 1:**

- **Input:** score = [5,4,3,2,1]
- **Output:** ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
- **Explanation:** The placements are [1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, 4<sup>th</sup>, 5<sup>th</sup>]. 

**Example 2:**

- **Input:** score = [10,3,8,9,4]
- **Output:** ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
- **Explanation:** The placements are [1<sup>st</sup>, 5<sup>th</sup>, 3<sup>rd</sup>, 2<sup>nd</sup>, 4<sup>th</sup>].

**Constraints:**

- <code>n == score.length</code>
- <code>1 <= n <= 10<sup>4</sup></code>
- <code>0 <= score[i] <= 106<sup>6</sup></code>
- All the values in `score` are **unique**.



**Solution:**

We can follow these steps:

1. **Sort the Scores**: We need to know the relative order of each score, so we sort the scores in descending order.
2. **Assign Ranks**: Once we have the sorted scores, we can map the ranks to the original scores based on their positions.
3. **Map the Ranks Back to the Original Array**: Using the original indices of the scores, assign the appropriate ranks.

Let's implement this solution in PHP: **[506. Relative Ranks](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000506-relative-ranks/solution.php)**

```php
<?php
/**
 * @param Integer[] $score
 * @return String[]
 */
function findRelativeRanks($score) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(findRelativeRanks([5, 4, 3, 2, 1])); // Output: ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
print_r(findRelativeRanks([10, 3, 8, 9, 4])); // Output: ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
?>
```

### Explanation:

1. **Sorting the Scores**:
    - We use `arsort()` to sort the scores in descending order while maintaining the original indices. This is important because we need to assign ranks back to the original positions.

2. **Assigning Ranks**:
    - After sorting, the highest score gets the "Gold Medal", the second-highest gets the "Silver Medal", the third-highest gets the "Bronze Medal", and so on. For the 4th place and beyond, we simply assign the numeric rank as a string.

3. **Mapping Ranks to the Original Array**:
    - We then loop over the original score array and fill in the result array using the ranks we calculated, maintaining the original order.

### Test Cases:

- `[5, 4, 3, 2, 1]`: The output is `["Gold Medal","Silver Medal","Bronze Medal","4","5"]`, as the scores are already in descending order.
- `[10, 3, 8, 9, 4]`: The output is `["Gold Medal","5","Bronze Medal","Silver Medal","4"]`, based on the descending order of scores `[10, 9, 8, 4, 3]`.

This solution efficiently handles the problem within the constraints provided.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

