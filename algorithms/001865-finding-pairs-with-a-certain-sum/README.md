1865\. Finding Pairs With a Certain Sum

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Design`

You are given two integer arrays `nums1` and `nums2`. You are tasked to implement a data structure that supports queries of two types:
- **Add** a positive integer to an element of a given index in the array `nums2`.
- **Count** the number of pairs `(i, j)` such that `nums1[i] + nums2[j]` equals a given value (`0 <= i < nums1.length` and `0 <= j < nums2.length`).

Implement the `FindSumPairs` class:
- `FindSumPairs(int[] nums1, int[] nums2)` Initializes the `FindSumPairs` object with two integer arrays `nums1` and `nums2`.
- `void add(int index, int val)` Adds `val` to `nums2[index]`, i.e., apply `nums2[index] += val`.
- `int count(int tot)` Returns the number of pairs `(i, j)` such that `nums1[i] + nums2[j] == tot`.


**Example 1:**

- **Input:**
  ["FindSumPairs", "count", "add", "count", "count", "add", "add", "count"]
  [[[1, 1, 2, 2, 2, 3], [1, 4, 5, 2, 5, 4]], [7], [3, 2], [8], [4], [0, 1], [1, 1], [7]]
- **Output:** [null, 8, null, 2, 1, null, null, 11]
- **Explanation:**
  FindSumPairs findSumPairs = new FindSumPairs([1, 1, 2, 2, 2, 3], [1, 4, 5, 2, 5, 4]);
  findSumPairs.count(7);  // return 8; pairs (2,2), (3,2), (4,2), (2,4), (3,4), (4,4) make 2 + 5 and pairs (5,1), (5,5) make 3 + 4
  findSumPairs.add(3, 2); // now nums2 = [1,4,5,4,5,4]
  findSumPairs.count(8);  // return 2; pairs (5,2), (5,4) make 3 + 5
  findSumPairs.count(4);  // return 1; pair (5,0) makes 3 + 1
  findSumPairs.add(0, 1); // now nums2 = [2,4,5,4,5,4]
  findSumPairs.add(1, 1); // now nums2 = [2,5,5,4,5,4]
  findSumPairs.count(7);  // return 11; pairs (2,1), (2,2), (2,4), (3,1), (3,2), (3,4), (4,1), (4,2), (4,4) make 2 + 5 and pairs (5,3), (5,5) make 3 + 4

**Constraints:**

- `1 <= nums1.length <= 1000`
- <code>1 <= nums2.length <= 10<sup>5</sup></code>
- <code>1 <= nums1[i] <= 10<sup>9</sup></code>
- <code>1 <= nums2[i] <= 10<sup>5</sup></code>
- `0 <= index < nums2.length`
- <code>1 <= val <= 10<sup>5</sup></code>
- <code>1 <= tot <= 10<sup>9</sup></code>
- At most `1000` calls are made to `add` and `count` each.


**Hint:**
1. The length of nums1 is small in comparison to that of nums2
2. If we iterate over elements of nums1 we just need to find the count of tot - element for all elements in nums1


**Similar Questions:**
1. [2006. Count Number of Pairs With Absolute Difference K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002006-count-number-of-pairs-with-absolute-difference-k)
2. [2465. Number of Distinct Averages](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002465-number-of-distinct-averages)
3. [2563. Count the Number of Fair Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002563-count-the-number-of-fair-pairs)






**Solution:**

We need to efficiently handle two operations on two given arrays: adding a value to an element in the second array and counting the number of pairs from both arrays that sum to a given value. The challenge lies in optimizing these operations, especially the count operation, given the constraints.

### Approach
1. **Initialization**:
   - Store the given arrays `nums1` and `nums2`.
   - Create a frequency map (hash table) for `nums2` to keep track of how many times each number appears. This allows efficient updates and lookups.

2. **Add Operation**:
   - When adding a value `val` to an element at a specific index in `nums2`, first retrieve the old value at that index.
   - Compute the new value by adding `val` to the old value.
   - Update the frequency map by decrementing the count of the old value (and removing it if the count drops to zero) and incrementing the count of the new value.

3. **Count Operation**:
   - For each element `x` in `nums1`, calculate the required value `tot - x` that, when paired with `x`, sums to `tot`.
   - If the required value is less than 1, skip it since `nums2` contains only positive integers.
   - Use the frequency map to quickly check how many times the required value appears in `nums2` and accumulate this count.
   - Return the total count of valid pairs.

Let's implement this solution in PHP: **[1865. Finding Pairs With a Certain Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001865-finding-pairs-with-a-certain-sum/solution.php)**

```php
<?php
class FindSumPairs {
    private $nums1;
    private $nums2;
    private $freq;

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     */
    function __construct($nums1, $nums2) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function add($index, $val) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $tot
     * @return Integer
     */
    function count($tot) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/////// 🔽 Example usage (same as problem) 🔽 ///////

$commands = ["FindSumPairs", "count", "add", "count", "count", "add", "add", "count"];
$params = [
    [[1, 1, 2, 2, 2, 3], [1, 4, 5, 2, 5, 4]],
    [7],
    [3, 2],
    [8],
    [4],
    [0, 1],
    [1, 1],
    [7]
];

$results = array();
$object = null;

foreach ($commands as $i => $cmd) {
    if ($cmd == "FindSumPairs") {
        $object = new FindSumPairs($params[$i][0], $params[$i][1]);
        $results[] = null;
    } elseif ($cmd == "add") {
        $object->add($params[$i][0], $params[$i][1]);
        $results[] = null;
    } elseif ($cmd == "count") {
        $results[] = $object->count($params[$i][0]);
    }
}

print_r($results);
?>
```

### Explanation:

- **Initialization**: The constructor initializes the two arrays and builds a frequency map for `nums2` to count occurrences of each element.
- **Add Operation**: The `add` method updates an element in `nums2` by adding a specified value. It adjusts the frequency map by decrementing the count of the old value and incrementing the count of the new value.
- **Count Operation**: The `count` method iterates over each element in `nums1`, calculates the complementary value needed in `nums2` to sum to the target value, and uses the frequency map to quickly determine how many such values exist in `nums2`. This ensures efficient counting without scanning `nums2` each time.

This approach efficiently handles both operations by leveraging the frequency map, reducing the time complexity for the count operation from O(n*m) to O(n), where n is the length of `nums1` and m is the length of `nums2`. The add operation remains O(1) per call due to hash table operations. This optimization is crucial given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**