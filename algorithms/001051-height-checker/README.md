1051\. Height Checker

**Difficulty:** Easy

**Topics:** `Array`, `Sorting`, `Counting Sort`

A school is trying to take an annual photo of all the students. The students are asked to stand in a single file line in **non-decreasing order** by height. Let this ordering be represented by the integer array `expected` where `expected[i]` is the expected height of the <code>i<sup>th</sup></code> student in line.

You are given an integer array `heights` representing the **current order** that the students are standing in. Each `heights[i]` is the height of the <code>i<sup>th</sup></code> student in line (**0-indexed**).

Return _the **number of indices** where `heights[i] != expected[i]`_.

**Example 1:**

- **Input:** heights = [1,1,4,2,1,3]
- **Output:** 3
- **Explanation:** \
  heights:  [1,1,4,2,1,3]\
  expected: [1,1,1,2,3,4]\
  Indices 2, 4, and 5 do not match.

**Example 2:**

- **Input:** heights = [5,1,2,3,4]
- **Output:** 5
- **Explanation:** \
  heights:  [5,1,2,3,4]\
  expected: [1,2,3,4,5]\
  All indices do not match.

**Example 3:**

- **Input:** heights = [1,2,3,4,5]
- **Output:** 0
- **Explanation:** \
  heights:  [1,2,3,4,5]\
  expected: [1,2,3,4,5]\
  All indices match.

**Constraints:**

- <code>1 <= heights.length <= 100</code>
- <code>1 <= heights[i] <= 100</code>


**Hint:**
1. Build the correct order of heights by sorting another array, then compare the two arrays.


**Solution:**

The problem at hand is to calculate the number of indices where the heights of students in a photo do not match the expected order. The students are supposed to be arranged in non-decreasing order by height. We are given the current arrangement and need to compare it with the expected arrangement to count how many students are out of place.

### Key Points:
- We need to return the number of indices where the current height does not match the expected height.
- The input is an array representing the current height order.
- The expected order is simply the sorted version of the input array.

### Approach:
1. **Sorting the Heights:** First, we need to generate the expected order, which is just the sorted version of the given `heights` array.
2. **Comparing Arrays:** Once we have the sorted array, we compare each element of the sorted array with the original array. If they are not equal at any index, we increment the counter.
3. **Return the Result:** The result will be the number of such indices where the heights are not in their expected position.

### Plan:
1. Create a copy of the `heights` array and sort it to get the `expected` order.
2. Iterate through both arrays and compare their elements at each index.
3. Count how many positions do not match between the original array and the sorted array.
4. Return the count.

Let's implement this solution in PHP: **[1051. Height Checker](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001051-height-checker/solution.php)**

```php
<?php
/**
 * @param Integer[] $heights
 * @return Integer
 */
function heightChecker($heights) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$heights = [1,1,4,2,1,3];
echo heightChecker($nums, $k);  // Output: 3

// Example 2
$heights = [5,1,2,3,4];
echo heightChecker($nums, $k);  // Output: 5

// Example 3
$heights = [1,2,3,4,5];
echo heightChecker($nums, $k);  // Output: 0
?>
```

### Explanation:

The provided code uses a counting sort technique to avoid sorting the array completely. Instead of sorting, it counts the frequency of each height and then checks if the current height matches the expected height by incrementing through the counts.

1. **Counting Heights:** The function first initializes an array `count` of size 101 (since heights range from 1 to 100). It then counts the occurrences of each height in the `heights` array.
2. **Generating the Expected Heights:** For each height in the `heights` array, it checks the lowest available height using the `currentHeight` pointer. If the current height in the `heights` array doesn't match the expected one, it increments the `ans` counter.
3. **Decreasing the Count:** After comparing, it decreases the count of the current height.
4. **Return the Count:** Finally, it returns the number of mismatched positions.

### Example Walkthrough:

**Example 1:**

- **Input:** `heights = [1,1,4,2,1,3]`
- **Sorted Expected Order:** `expected = [1,1,1,2,3,4]`
- **Comparison:**
  - Index 0: 1 == 1 (no change)
  - Index 1: 1 == 1 (no change)
  - Index 2: 4 != 1 (mismatch)
  - Index 3: 2 != 2 (no change)
  - Index 4: 1 != 3 (mismatch)
  - Index 5: 3 != 4 (mismatch)
- **Output:** 3 (3 mismatches at indices 2, 4, and 5)

**Example 2:**

- **Input:** `heights = [5,1,2,3,4]`
- **Sorted Expected Order:** `expected = [1,2,3,4,5]`
- **Comparison:**
  - All positions mismatch.
- **Output:** 5 (5 mismatches)

**Example 3:**

- **Input:** `heights = [1,2,3,4,5]`
- **Sorted Expected Order:** `expected = [1,2,3,4,5]`
- **Comparison:**
  - All positions match.
- **Output:** 0 (no mismatches)

### Time Complexity:
- **Sorting:** The sorting of the array takes O(n log n) time.
- **Comparing Arrays:** The comparison takes O(n) time since we just iterate through both arrays once.
- **Overall Complexity:** The time complexity is dominated by the sorting step, so the overall time complexity is **O(n log n)**, where `n` is the length of the `heights` array.

### Output for Example:

1. **Example 1:**
  - Input: `heights = [1,1,4,2,1,3]`
  - Output: `3`

2. **Example 2:**
  - Input: `heights = [5,1,2,3,4]`
  - Output: `5`

3. **Example 3:**
  - Input: `heights = [1,2,3,4,5]`
  - Output: `0`

The `heightChecker` function efficiently calculates the number of indices where the heights of students are out of place compared to the expected order. The approach of using a counting sort allows for a space-efficient solution, and the time complexity is dominated by the sorting step.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



