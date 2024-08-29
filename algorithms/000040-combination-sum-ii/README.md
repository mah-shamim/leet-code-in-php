40\. Combination Sum II

**Difficulty:** Medium

**Topics:** `Array`, `Backtracking`

Given a collection of candidate numbers (`candidates`) and a target number (`target`), find all unique combinations in `candidates` where the candidate numbers sum to `target`.

Each number in `candidates` may only be used **once** in the combination.

**Note:** The solution set must not contain duplicate combinations.

**Example 1:**

- **Input:** candidates = [10,1,2,7,6,1,5], target = 8
- **Output:** [[1,1,6], [1,2,5], [1,7], [2,6]]

**Example 2:**

- **Input:** candidates = [2,5,2,1,2], target = 5
- **Output:** [[1,2,2], [5]]

**Constraints:**

- <code>1 <= candidates.length <= 100</code>
- <code>1 <= candidates[i] <= 50</code>
- <code>1 <= target <= 30</code>


**Solution:**


We can use a backtracking approach. The key idea is to sort the array first to handle duplicates easily and then explore all possible combinations using backtracking.

Let's implement this solution in PHP: **[40. Combination Sum II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000040-combination-sum-ii/solution.php)**

### Explanation:

1. **Sorting**: The candidates array is sorted to handle duplicates easily and to ensure combinations are formed in a sorted order.
2. **Backtracking**: The `backtrack` function is used to explore all possible combinations.
   - If the `target` becomes zero, we add the current combination to the result.
   - We iterate over the candidates starting from the current index. If a candidate is the same as the previous one, we skip it to avoid duplicate combinations.
   - We subtract the current candidate from the target and recursively call the `backtrack` function with the new target and the next index.
   - The recursive call continues until we either find a valid combination or exhaust all possibilities.
3. **Pruning**: If the candidate exceeds the target, we break out of the loop early since further candidates will also exceed the target.

This code will output all unique combinations that sum up to the target while ensuring that each candidate is used only once in each combination.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
