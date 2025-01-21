1792\. Maximum Average Pass Ratio

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Heap (Priority Queue)`

There is a school that has classes of students and each class will be having a final exam. You are given a 2D integer array `classes`, where <code>classes[i] = [pass<sub>i</sub>, total<sub>i</sub>]</code>. You know beforehand that in the <code>i<sup>th</sup></code> class, there are <code>total<sub>i</sub></code> total students, but only <code>pass<sub>i</sub></code> number of students will pass the exam.

You are also given an integer `extraStudents`. There are another `extraStudents` brilliant students that are **guaranteed** to pass the exam of any class they are assigned to. You want to assign each of the `extraStudents` students to a class in a way that **maximizes** the **average** pass ratio across **all** the classes.

The **pass ratio** of a class is equal to the number of students of the class that will pass the exam divided by the total number of students of the class. The **average pass ratio** is the sum of pass ratios of all the classes divided by the number of the classes.

Return the **maximum** possible average pass ratio after assigning the `extraStudents` students. Answers within <code>10<sup>-5</sup></code> of the actual answer will be accepted.

**Example 1:**

- **Input:** classes = [[1,2],[3,5],[2,2]], extraStudents = 2
- **Output:** 0.78333
- **Explanation:** You can assign the two extra students to the first class. The average pass ratio will be equal to (3/4 + 3/5 + 2/2) / 3 = 0.78333.

**Example 2:**

- **Input:** classes = [[2,4],[3,9],[4,5],[2,10]], extraStudents = 4
- **Output:** 4
- **Explanation:** 0.53485



**Constraints:**

- <code>1 <= classes.length <= 10<sup>5</sup></code>
- `classes[i].length == 2`
- <code>1 <= pass<sub>i</sub> <= total<sub>i</sub> <= 10<sup>5</sup></code>
- <code>1 <= extraStudents <= 10<sup>5</sup></code>


**Hint:**
1. Pay attention to how much the pass ratio changes when you add a student to the class. If you keep adding students, what happens to the change in pass ratio? The more students you add to a class, the smaller the change in pass ratio becomes.
2. Since the change in the pass ratio is always decreasing with the more students you add, then the very first student you add to each class is the one that makes the biggest change in the pass ratio.
3. Because each class's pass ratio is weighted equally, it's always optimal to put the student in the class that makes the biggest change among all the other classes.
4. Keep a max heap of the current class sizes and order them by the change in pass ratio. For each extra student, take the top of the heap, update the class size, and put it back in the heap.


**Solution:**

We can use a **max-heap (priority queue)**. This is because we need to efficiently find the class that benefits the most (maximizes the change in pass ratio) when adding an extra student.

### Approach:

1. **Understand the Gain Calculation**:
   - When adding one student to a class, the change in the pass ratio can be calculated as:
     `gain = (pass + 1)/(total + 1) - pass/total`
   - The task is to maximize the sum of pass ratios across all classes by distributing `extraStudents` optimally.

2. **Use a Max-Heap**:
   - For each class, calculate the initial gain and insert it into a max-heap along with the class details.
   - Each heap element is a tuple: `[negative gain, pass, total]`. (We use a negative gain because PHP's `SplPriorityQueue` is a **min-heap** by default.)

3. **Iteratively Distribute Extra Students**:
   - Pop the class with the maximum gain from the heap.
   - Add one student to that class, recalculate the gain, and push it back into the heap.
   - Repeat until all `extraStudents` are distributed.

4. **Calculate the Final Average**:
   - Once all extra students are assigned, calculate the average pass ratio of all classes.

Let's implement this solution in PHP: **[1792. Maximum Average Pass Ratio](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001792-maximum-average-pass-ratio/solution.php)**

```php
<?php
/**
 * @param Integer[][] $classes
 * @param Integer $extraStudents
 * @return Float
 */
function maxAverageRatio($classes, $extraStudents) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Calculate the extra pass ratio when a student is added to the class
 *
 * @param $pass
 * @param $total
 * @return float|int
 */
private function extraPassRatio($pass, $total)
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$classes = [[1, 2], [3, 5], [2, 2]];
$extraStudents = 2;
echo maxAverageRatio($classes, $extraStudents); // Output: 0.78333

$classes = [[2, 4], [3, 9], [4, 5], [2, 10]];
$extraStudents = 4;
echo maxAverageRatio($classes, $extraStudents); // Output: 0.53485
?>
```

### Explanation:


1. **Heap Setup**:
   - We use a max-heap (priority queue) to prioritize classes based on their potential improvement in pass ratio when an extra student is added.
   - In PHP, `SplPriorityQueue` is used for the heap. The higher the priority value, the earlier the class is processed.

2. **Distributing Extra Students**:
   - For each extra student, we extract the class with the highest potential improvement from the heap.
   - After adding one student to that class, we recalculate its potential improvement and reinsert it into the heap.

3. **Final Average Calculation**:
   - After distributing all extra students, we calculate the total pass ratio for all classes and return the average.

4. **Precision**:
   - The calculations are performed using floating-point arithmetic, which ensures answers are accurate to `10^-5` as required.

### Complexity:

- **Time Complexity**:
   - Heap insertion and extraction take _**O(log N)**_, where _**N**_ is the number of classes.
   - For _**extraStudents**_ iterations, the complexity is _**O(extraStudents x log N)**_.
   - The final pass ratio summation is _**O(N)**_.

- **Space Complexity**:
   - The heap stores _**N**_ elements, so the space complexity is _**O(N)**_.

This implementation efficiently distributes the extra students and computes the maximum average pass ratio.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
