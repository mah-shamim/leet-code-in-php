904\. Fruit Into Baskets

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sliding Window`, `Weekly Contest 102`

You are visiting a farm that has a single row of fruit trees arranged from left to right. The trees are represented by an integer array `fruits` where `fruits[i]` is the **type** of fruit the <code>i<sup>th</sup></code> tree produces.

You want to collect as much fruit as possible. However, the owner has some strict rules that you must follow:

- You only have **two** baskets, and each basket can only hold a **single type** of fruit. There is no limit on the amount of fruit each basket can hold.
- Starting from any tree of your choice, you must pick **exactly one fruit** from **every** tree (including the start tree) while moving to the right. The picked fruits must fit in one of your baskets.
- Once you reach a tree with fruit that cannot fit in your baskets, you must stop.

Given the integer array `fruits`, return _the **maximum** number of fruits you can pick_.

**Example 1:**

- **Input:** fruits = [<ins>1</ins>,<ins>2</ins>,<ins>1</ins>]
- **Output:** 3
- **Explanation:** We can pick from all 3 trees.

**Example 2:**

- **Input:** fruits = [0,<ins>1</ins>,<ins>2</ins>,<ins>2</ins>]
- **Output:** 3
- **Explanation:** We can pick from trees [1,2,2].
  If we had started at the first tree, we would only pick from trees [0,1].

**Example 3:**

- **Input:** fruits = [1,<ins>2</ins>,<ins>3</ins>,<ins>2</ins>,<ins>2</ins>]
- **Output:** 4
- **Explanation:** We can pick from trees [2,3,2,2].
  If we had started at the first tree, we would only pick from trees [1,2].

**Constraints:**

- <code>1 <= fruits.length <= 10<sup>5</sup></code>
- `0 <= fruits[i] < fruits.length`


**Similar Questions:**
1. [2401. Longest Nice Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002401-longest-nice-subarray)
2. [3477. Fruits Into Baskets II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003477-fruits-into-baskets-ii)






**Solution:**

We need to find the maximum number of fruits we can collect from a row of fruit trees while adhering to specific constraints. The constraints are that we can only collect two types of fruits, and we must pick fruits from every tree starting from a chosen tree moving to the right until we encounter a tree that produces a fruit type not in our baskets.

### Approach
1. **Sliding Window Technique**: We use a sliding window approach to maintain a window of trees that contains at most two distinct fruit types. The window is defined by two pointers, `left` and `right`, which represent the current range of trees under consideration.
2. **Hash Map for Tracking Fruit Types**: We use a hash map (associative array in PHP) to keep track of the count of each fruit type within the current window. This helps us efficiently manage the distinct fruit types in the window.
3. **Adjusting the Window**: As we expand the window by moving the `right` pointer, we add the current fruit to the hash map. If the number of distinct fruit types exceeds two, we move the `left` pointer to the right, reducing the count of the fruit type at the `left` position in the hash map. If the count drops to zero, we remove the fruit type from the hash map.
4. **Tracking Maximum Fruits**: After ensuring the window has at most two distinct fruit types, we update the maximum number of fruits collected so far by comparing the current window size (`right - left + 1`) with the previous maximum.

Let's implement this solution in PHP: **[904. Fruit Into Baskets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000904-fruit-into-baskets/solution.php)**

```php
<?php
/**
 * @param Integer[] $fruits
 * @return Integer
 */
function totalFruit($fruits) {
    $n = count($fruits);
    $left = 0;
    $maxFruits = 0;
    $countMap = [];

    for ($right = 0; $right < $n; $right++) {
        $fruit = $fruits[$right];
        if (!isset($countMap[$fruit])) {
            $countMap[$fruit] = 0;
        }
        $countMap[$fruit]++;

        while (count($countMap) > 2) {
            $leftFruit = $fruits[$left];
            $countMap[$leftFruit]--;
            if ($countMap[$leftFruit] == 0) {
                unset($countMap[$leftFruit]);
            }
            $left++;
        }

        $windowSize = $right - $left + 1;
        if ($windowSize > $maxFruits) {
            $maxFruits = $windowSize;
        }
    }

    return $maxFruits;
}

// Test cases
echo totalFruit([1, 2, 1]) . "\n";       // Output: 3
echo totalFruit([0, 1, 2, 2]) . "\n";    // Output: 3
echo totalFruit([1, 2, 3, 2, 2]) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Initialization**: We start by initializing the `left` pointer to 0, `maxFruits` to 0, and an empty hash map `countMap` to keep track of fruit counts in the current window.
2. **Expanding the Window**: For each tree at index `right`, we add its fruit to `countMap`. If the fruit is not already in the map, we initialize its count to 1; otherwise, we increment its count.
3. **Shrinking the Window**: If the number of distinct fruit types in `countMap` exceeds two, we move the `left` pointer to the right. For each fruit at the `left` pointer, we decrement its count in `countMap`. If the count drops to zero, we remove the fruit from the map. This step ensures the window always contains at most two distinct fruit types.
4. **Updating Maximum Fruits**: After adjusting the window, we calculate the current window size (`right - left + 1`) and update `maxFruits` if the current window size is larger.
5. **Result**: After processing all trees, `maxFruits` holds the maximum number of fruits we can collect under the given constraints.

This approach efficiently processes the array in linear time, O(n), where n is the number of trees, by leveraging the sliding window technique and a hash map for constant-time lookups and updates. The space complexity is O(1) since the hash map stores at most three fruit types at any time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**