3516\. Find Closest Person

**Difficulty:** Easy

**Topics:** `Math`, `Weekly Contest 445`

You are given three integers `x`, `y`, and `z`, representing the positions of three people on a number line:

- `x` is the position of Person 1.
- `y` is the position of Person 2.
- `z` is the position of Person 3, who does **not** move.

Both Person 1 and Person 2 move toward Person 3 at the **same** speed.

Determine which person reaches Person 3 **first**:

- Return 1 if Person 1 arrives first.
- Return 2 if Person 2 arrives first.
- Return 0 if both arrive at the **same** time.

Return _the result accordingly_.

**Example 1:**

- **Input:** x = 2, y = 7, z = 4
- **Output:** 1
- **Explanation:**
  - Person 1 is at position 2 and can reach Person 3 (at position 4) in 2 steps.
  - Person 2 is at position 7 and can reach Person 3 in 3 steps.
  - Since Person 1 reaches Person 3 first, the output is 1.

**Example 2:**

- **Input:** x = 2, y = 5, z = 6
- **Output:** 2
- **Explanation:**

  - Person 1 is at position 2 and can reach Person 3 (at position 6) in 4 steps.
  - Person 2 is at position 5 and can reach Person 3 in 1 step.
  - Since Person 2 reaches Person 3 first, the output is 2.

**Example 3:**

- **Input:** x = 1, y = 5, z = 3
- **Output:** 0
- **Explanation:**
  - Person 1 is at position 1 and can reach Person 3 (at position 3) in 2 steps.
  - Person 2 is at position 5 and can reach Person 3 in 2 steps.
  - Since both Person 1 and Person 2 reach Person 3 at the same time, the output is 0.

**Constraints:**

- `1 <= x, y, z <= 100`


**Hint:**
1. Compare the distances from Persons 1 and 2 to Person 3 to determine the answer.






**Solution:**

We need to determine which of two people (Person 1 or Person 2) reaches a third person (Person 3) first when both are moving towards Person 3 at the same speed. The solution involves comparing the distances each person has to travel to reach Person 3. The person with the shorter distance will arrive first. If both distances are equal, they arrive at the same time.

### Approach
1. **Calculate Distances**: Compute the absolute difference between the positions of Person 1 and Person 3 (|x - z|) and the absolute difference between the positions of Person 2 and Person 3 (|y - z|). This gives the distance each person needs to travel.
2. **Compare Distances**: Compare the two distances:
    - If the distance of Person 1 is less than that of Person 2, return 1.
    - If the distance of Person 2 is less than that of Person 1, return 2.
    - If both distances are equal, return 0.

Let's implement this solution in PHP: **[3516. Find Closest Person](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003516-find-closest-person/solution.php)**

```php
<?php
/**
 * @param Integer $x
 * @param Integer $y
 * @param Integer $z
 * @return Integer
 */
function findClosest($x, $y, $z) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// ---------- Example test cases ----------

// Example 1
echo findClosest(2, 7, 4) . "\n"; // Output: 1

// Example 2
echo findClosest(2, 5, 6) . "\n"; // Output: 2

// Example 3
echo findClosest(1, 5, 3) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Calculate Distances**: The code first calculates the absolute distance between Person 1 and Person 3 (`$dist1`) and between Person 2 and Person 3 (`$dist2`). This is done using the `abs` function to ensure positive values.
2. **Compare and Return**: The code then compares these two distances. If `$dist1` is smaller, it means Person 1 reaches first, so the function returns 1. If `$dist2` is smaller, it means Person 2 reaches first, so the function returns 2. If both distances are equal, the function returns 0, indicating they arrive at the same time.

This approach efficiently checks the necessary conditions by leveraging basic arithmetic and comparison operations, ensuring correctness and simplicity. The solution handles all edge cases, including when the distances are equal, and processes the inputs in constant time, making it optimal for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**