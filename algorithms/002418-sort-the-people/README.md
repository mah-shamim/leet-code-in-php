2418\. Sort the People

Easy

You are given an array of strings `names`, and an array `heights` that consists of **distinct** positive integers. Both arrays are of length `n`.

For each index `i`, `names[i]` and `heights[i]` denote the name and height of the <code>i<sup>th</sup></code> person.

Return _`names` sorted in **descending** order by the people's heights_.

**Example 1:**

- **Input:** names = ["Mary","John","Emma"], heights = [180,165,170]
- **Output:** ["Mary","Emma","John"]
- **Explanation:** Mary is the tallest, followed by Emma and John. 

**Example 2:**

- **Input:** names = ["Alice","Bob","Bob"], heights = [155,185,150]
- **Output:** ["Bob","Alice","Bob"]
- **Explanation:** The first Bob is the tallest, followed by Alice and the second Bob. 

**Constraints:**

- <code>n == names.length == heights.length</code>
- <code>1 <= n <= 10<sup>3</sup></code>
- <code>1 <= names[i].length <= 20</code>
- <code>1 <= heights[i] <= 10<sup>5</sup></code>
- `names[i]` consists of lower and upper case English letters.
- All the values of `heights` are distinct.


**Hint:**
1. Find the tallest person and swap with the first person, then find the second tallest person and swap with the second person, etc. Repeat until you fix all n people.


**Solution:**


To solve this problem, we can follow these steps:

1. **Combine Names and Heights**: Create a combined array of pairs where each pair consists of a name and its corresponding height.
2. **Sort the Combined Array**: Sort the combined array based on heights in descending order.
3. **Extract Sorted Names**: Extract the names from the sorted combined array.


Let's implement this solution in PHP: **[2418. Sort the People](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002418-sort-the-people/solution.php)**

```php
<?php
// Example usage:
$names = ["Mary","John","Emma"];
$heights = [180,165,170];
$result = sortPeople($names, $heights);

echo implode(",", $result); // Output: Mary,Emma,John
?>
```

### Explanation:

1. **Combining Names and Heights**:
   - We create an array called `$combined` where each element is a pair of a name and its corresponding height.
   - This is done using a loop that iterates through the indices of the `names` and `heights` arrays.

2. **Sorting**:
   - We use the `usort` function to sort the `$combined` array.
   - The sorting is based on the heights (the second element of each pair) in descending order. The comparison function returns the difference between the heights to achieve this.

3. **Extracting Sorted Names**:
   - After sorting, we extract the names from the `$combined` array into the `$sortedNames` array.
   - This is done using another loop that goes through the sorted pairs.

This approach ensures that the names are returned in the order of descending heights, as required. The time complexity is \(O(n \log n)\) due to the sorting step, which is efficient for the input size constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
