2353\. Design a Food Rating System

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Design`, `Heap (Priority Queue)`, `Ordered Set`, `Weekly Contest 303`

Design a food rating system that can do the following:

- **Modify** the rating of a food item listed in the system.
- Return the highest-rated food item for a type of cuisine in the system.

Implement the `FoodRatings` class:

- `FoodRatings(String[] foods, String[] cuisines, int[] ratings)` Initializes the system. The food items are described by `foods`, `cuisines` and `ratings`, all of which have a length of `n`.
  - `foods[i]` is the name of the <code>i<sup>th</sup></code> food,
  - `cuisines[i]` is the type of cuisine of the <code>i<sup>th</sup></code> food, and
  - `ratings[i]` is the initial rating of the <code>i<sup>th</sup></code> food.
- `void changeRating(String food, int newRating)` Changes the rating of the food item with the name `food`.
- `String highestRated(String cuisine)` Returns the name of the food item that has the highest rating for the given type of `cuisine`. If there is a tie, return the item with the **lexicographically smaller** name.

Note that a string `x` is lexicographically smaller than string `y` if `x` comes before `y` in dictionary order, that is, either `x` is a prefix of `y`, or if `i` is the first position such that `x[i] != y[i]`, then `x[i]` comes before `y[i]` in alphabetic order.

**Example 1:**

- **Input:**
  ["FoodRatings", "highestRated", "highestRated", "changeRating", "highestRated", "changeRating", "highestRated"]
  [[["kimchi", "miso", "sushi", "moussaka", "ramen", "bulgogi"], ["korean", "japanese", "japanese", "greek", "japanese", "korean"], [9, 12, 8, 15, 14, 7]], ["korean"], ["japanese"], ["sushi", 16], ["japanese"], ["ramen", 16], ["japanese"]]
- **Output:** [null, "kimchi", "ramen", null, "sushi", null, "ramen"]
- **Explanation:**
  FoodRatings foodRatings = new FoodRatings(["kimchi", "miso", "sushi", "moussaka", "ramen", "bulgogi"], ["korean", "japanese", "japanese", "greek", "japanese", "korean"], [9, 12, 8, 15, 14, 7]);
  foodRatings.highestRated("korean"); // return "kimchi"
  // "kimchi" is the highest rated korean food with a rating of 9.
  foodRatings.highestRated("japanese"); // return "ramen"
  // "ramen" is the highest rated japanese food with a rating of 14.
  foodRatings.changeRating("sushi", 16); // "sushi" now has a rating of 16.
  foodRatings.highestRated("japanese"); // return "sushi"
  // "sushi" is the highest rated japanese food with a rating of 16.
  foodRatings.changeRating("ramen", 16); // "ramen" now has a rating of 16.
  foodRatings.highestRated("japanese"); // return "ramen"
  // Both "sushi" and "ramen" have a rating of 16.
  // However, "ramen" is lexicographically smaller than "sushi".

**Constraints:**

- <code>1 <= n <= 2 * 10<sup>4</sup></code>
- `n == foods.length == cuisines.length == ratings.length`
- `1 <= foods[i].length, cuisines[i].length <= 10`
- `foods[i]`, `cuisines[i]` consist of lowercase English letters.
- <code>1 <= ratings[i] <= 10<sup>8</sup></code>
- All the strings in `foods` are **distinct**.
- `food` will be the name of a food item in the system across all calls to `changeRating`.
- `cuisine` will be a type of cuisine of **at least one** food item in the system across all calls to `highestRated`.
- At most <code>2 * 10<sup>4</sup></code> calls **in total** will be made to `changeRating` and `highestRated`.



**Hint:**
1. The key to solving this problem is to properly store the data using the right data structures.
2. Firstly, a hash table is needed to efficiently map each food item to its cuisine and current rating.
3. In addition, another hash table is needed to map cuisines to foods within each cuisine stored in an ordered set according to their ratings.


**Similar Questions:**
1. [2349. Design a Number Container System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002349-design-a-number-container-system)
2. [2456. Most Popular Video Creator](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002456-most-popular-video-creator)






**Solution:**

We need to design a food rating system that supports modifying the rating of a food item and retrieving the highest-rated food item for a specific cuisine. The solution involves efficiently storing and updating food ratings while ensuring quick access to the highest-rated food for any given cuisine, considering lexicographical order in case of ties.

### Approach
1. **Data Structures**:
    - **`foodInfo`**: A hash map that stores each food's cuisine and current rating.
    - **`cuisineHeaps`**: A hash map where each key is a cuisine and the value is a max-heap (priority queue) that contains pairs of ratings and food names. The heap is ordered such that higher ratings come first, and in case of ties, lexicographically smaller food names are considered larger (so they appear at the top).

2. **Initialization**:
    - For each food item, store its cuisine and rating in `foodInfo`.
    - For each cuisine, initialize a max-heap (if not already present) and insert the initial rating and food name.

3. **Change Rating**:
    - Update the food's rating in `foodInfo`.
    - Push the new rating and food name into the corresponding cuisine's heap. This approach uses lazy deletion, meaning the heap may contain outdated entries, which are handled during retrieval.

4. **Highest Rated**:
    - Retrieve the top element from the cuisine's heap. If the rating in the heap matches the current rating in `foodInfo`, return the food name. Otherwise, pop the outdated entry and continue until a valid entry is found.

Let's implement this solution in PHP: **[2353. Design a Food Rating System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002353-design-a-food-rating-system/solution.php)**

```php
<?php
class FoodRatings {
    private $foodInfo;
    private $cuisineHeaps;

    /**
     * @param String[] $foods
     * @param String[] $cuisines
     * @param Integer[] $ratings
     */
    function __construct($foods, $cuisines, $ratings) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param String $food
     * @param Integer $newRating
     * @return NULL
     */
    function changeRating($food, $newRating) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param String $cuisine
     * @return String
     */
    function highestRated($cuisine) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

class MyMaxHeap extends SplMaxHeap {
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

/**
 * Your FoodRatings object will be instantiated and called as such:
 * $obj = FoodRatings($foods, $cuisines, $ratings);
 * $obj->changeRating($food, $newRating);
 * $ret_2 = $obj->highestRated($cuisine);
 */

// Test cases
$foods = ["kimchi", "miso", "sushi", "moussaka", "ramen", "bulgogi"];
$cuisines = ["korean", "japanese", "japanese", "greek", "japanese", "korean"];
$ratings = [9, 12, 8, 15, 14, 7];

$obj = new FoodRatings($foods, $cuisines, $ratings);
echo $obj->highestRated("korean") . PHP_EOL;   // kimchi
echo $obj->highestRated("japanese") . PHP_EOL; // ramen
$obj->changeRating("sushi", 16);
echo $obj->highestRated("japanese") . PHP_EOL; // sushi
$obj->changeRating("ramen", 16);
echo $obj->highestRated("japanese") . PHP_EOL; // ramen
?>
```

### Explanation:

- **Initialization**: The constructor initializes two dictionaries: `foodInfo` stores each food's cuisine and current rating, and `cuisineHeaps` stores max-heaps for each cuisine. Each heap is initialized with the initial ratings and food names.
- **Change Rating**: The `changeRating` method updates the food's rating in `foodInfo` and pushes the new rating into the corresponding cuisine's heap. This ensures that the heap always has the most recent rating, though outdated entries may remain.
- **Highest Rated**: The `highestRated` method checks the top element of the cuisine's heap. If the rating matches the current rating in `foodInfo`, it returns the food name. Otherwise, it pops the outdated entry and repeats the process until a valid entry is found. This lazy deletion ensures that the heap remains efficient for insertions and deletions while providing accurate results.

This approach efficiently manages dynamic updates and queries by leveraging hash maps and heaps, ensuring optimal performance for both operations. The lazy deletion strategy minimizes the overhead of updating existing heap entries, making the solution both practical and efficient.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**