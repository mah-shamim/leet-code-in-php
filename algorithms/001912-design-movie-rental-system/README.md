1912\. Design Movie Rental System

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Design`, `Heap (Priority Queue)`, `Ordered Set`, `Biweekly Contest 55`

You have a movie renting company consisting of `n` shops. You want to implement a renting system that supports searching for, booking, and returning movies. The system should also support generating a report of the currently rented movies.

Each movie is given as a 2D integer array `entries` where <code>entries[i] = [shop<sub>i</sub>, movie<sub>i</sub>, price<sub>i</sub>]</code> indicates that there is 
a copy of movie <code>movie<sub>i</sub></code> at shop <code>shop<sub>i</sub></code> with a rental price of <code>price<sub>i</sub></code>. Each shop carries **at most one** copy of a movie <code>movie<sub>i</sub></code>.

The system should support the following functions:

- **Search**: Finds the **cheapest 5 shops** that have an **unrented copy** of a given movie. The shops should be sorted by **price** in ascending order, and in case of a tie, the one with the **smaller** <code>shop<sub>i</sub></code> should appear first. If there are less than 5 matching shops, then all of them should be returned. If no shop has an unrented copy, then an empty list should be returned.
- **Rent**: Rents an **unrented copy** of a given movie from a given shop.
- **Drop**: Drops off a **previously rented copy** of a given movie at a given shop.
- **Report**: Returns the **cheapest 5 rented movies** (possibly of the same movie ID) as a 2D list `res` where <code>res[j] = [shop<sub>j</sub>, movie<sub>j</sub>]</code> describes that the <code>j<sup>th</sup></code> cheapest rented movie <code>movie<sub>j</sub></code> was rented from the shop <code>shop<sub>j</sub></code>. The movies in `res` should be sorted by **price** in ascending order, and in case of a tie, the one with the **smaller** <code>shop<sub>j</sub></code> should appear first, and if there is still tie, the one with the **smaller** <code>movie<sub>j</sub></code> should appear first. If there are fewer than 5 rented movies, then all of them should be returned. If no movies are currently being rented, then an empty list should be returned.

Implement the `MovieRentingSystem` class:

- `MovieRentingSystem(int n, int[][] entries)` Initializes the `MovieRentingSystem` object with `n` shops and the movies in `entries`.
- `List<Integer> search(int movie)` Returns a list of shops that have an **unrented copy** of the given `movie` as described above.
- `void rent(int shop, int movie)` Rents the given `movie` from the given `shop`.
- `void drop(int shop, int movie)` Drops off a previously rented `movie` at the given `shop`.
- `List<List<Integer>> report()` Returns a list of cheapest **rented** movies as described above.

**Note:** The test cases will be generated such that `rent` will only be called if the shop has an **unrented** copy of the movie, and `drop` will only be called if the shop had **previously rented** out the movie.

**Example 1:**

- **Input:**
  ["MovieRentingSystem", "search", "rent", "rent", "report", "drop", "search"]
  [[3, [[0, 1, 5], [0, 2, 6], [0, 3, 7], [1, 1, 4], [1, 2, 7], [2, 1, 5]]], [1], [0, 1], [1, 2], [], [1, 2], [2]]
- **Output:** [null, [1, 0, 2], null, null, [[0, 1], [1, 2]], null, [0, 1]]
- **Explanation:** 
  MovieRentingSystem movieRentingSystem = new MovieRentingSystem(3, [[0, 1, 5], [0, 2, 6], [0, 3, 7], [1, 1, 4], [1, 2, 7], [2, 1, 5]]);
  movieRentingSystem.search(1);  // return [1, 0, 2], Movies of ID 1 are unrented at shops 1, 0, and 2. Shop 1 is cheapest; shop 0 and 2 are the same price, so order by shop number.
  movieRentingSystem.rent(0, 1); // Rent movie 1 from shop 0. Unrented movies at shop 0 are now [2,3].
  movieRentingSystem.rent(1, 2); // Rent movie 2 from shop 1. Unrented movies at shop 1 are now [1].
  movieRentingSystem.report();   // return [[0, 1], [1, 2]]. Movie 1 from shop 0 is cheapest, followed by movie 2 from shop 1.
  movieRentingSystem.drop(1, 2); // Drop off movie 2 at shop 1. Unrented movies at shop 1 are now [1,2].
  movieRentingSystem.search(2);  // return [0, 1]. Movies of ID 2 are unrented at shops 0 and 1. Shop 0 is cheapest, followed by shop 1.

**Constraints:**

- <code>1 <= n <= 3 * 10<sup>5</sup></code>
- <code>1 <= entries.length <= 10<sup>5</sup></code>
- <code>0 <= shop<sub>i</sub> < n</code>
- <code>1 <= movie<sub>i</sub>, price<sub>i</sub> <= 10<sup>4</sup></code>
- Each shop carries **at most one** copy of a movie <code>movie<sub>i</sub></code>.
- At most <code>10<sup>5</sup></code> calls **in total** will be made to `search`, `rent`, `drop` and `report`.



**Hint:**
1. You need to maintain a sorted list for each movie and a sorted list for rented movies
2. When renting a movie remove it from its movies sorted list and added it to the rented list and vice versa in the case of dropping a movie






**Solution:**

We need to design a movie rental system that supports searching for available movies, renting movies, returning rented movies, and generating a report of the currently rented movies. The system must efficiently handle these operations while ensuring that the results are sorted according to specific criteria.

### Approach
1. **Initialization**:
    - Store the price of each movie at each shop in a dictionary (`prices`).
    - Track the rental status of each movie at each shop using a dictionary (`rented`).
    - For each movie, maintain a min-heap (`movieHeaps`) that contains all copies (as `[price, shop]` pairs) available for that movie. This heap helps in efficiently retrieving the cheapest available shops during search operations.
    - Maintain a min-heap (`rentedHeap`) for all rented movies, stored as `[price, shop, movie]` tuples. This heap helps in generating the report of the cheapest rented movies.
    - Use a dictionary (`inRentedHeap`) to track whether a specific movie at a shop is currently in the rented heap to avoid duplicates.

2. **Search Operation**:
    - For a given movie, retrieve its corresponding heap.
    - Pop elements from the heap until we find up to 5 available (unrented) movies. During popping, check the rental status of each movie-shop combination.
    - Temporarily store popped elements and push them back into the heap after processing to maintain the heap's integrity for future operations.

3. **Rent Operation**:
    - Mark the movie at the given shop as rented.
    - If the movie-shop combination is not already in the rented heap, add it to the heap and mark it as present in the heap.

4. **Drop Operation**:
    - Mark the movie at the given shop as available (unrented).

5. **Report Operation**:
    - Pop elements from the rented heap until we find up to 5 currently rented movies. During popping, check the rental status of each movie-shop combination.
    - Temporarily store rented movies that are still rented and push them back into the heap after processing. Non-rented movies are not pushed back, effectively removing them from the heap.

Let's implement this solution in PHP: **[1912. Design Movie Rental System](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001912-design-movie-rental-system/solution.php)**

```php
<?php
class MovieRentingSystem {
    private $prices;
    private $rented;
    private $movieHeaps;
    private $rentedHeap;
    private $inRentedHeap;

    /**
     * @param Integer $n
     * @param Integer[][] $entries
     */
    function __construct($n, $entries) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $movie
     * @return Integer[]
     */
    function search($movie) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $shop
     * @param Integer $movie
     * @return NULL
     */
    function rent($shop, $movie) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @param Integer $shop
     * @param Integer $movie
     * @return NULL
     */
    function drop($shop, $movie) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * @return Integer[][]
     */
    function report() {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

/**
 * Your MovieRentingSystem object will be instantiated and called as such:
 * $obj = MovieRentingSystem($n, $entries);
 * $ret_1 = $obj->search($movie);
 * $obj->rent($shop, $movie);
 * $obj->drop($shop, $movie);
 * $ret_4 = $obj->report();
 */
 
// Test cases
$movieRentingSystem = new MovieRentingSystem(3, [
    [0, 1, 5], [0, 2, 6], [0, 3, 7],
    [1, 1, 4], [1, 2, 7], [2, 1, 5]
]);

print_r($movieRentingSystem->search(1)); 
// [1, 0, 2]

$movieRentingSystem->rent(0, 1);
$movieRentingSystem->rent(1, 2);

print_r($movieRentingSystem->report()); 
// [[0, 1], [1, 2]]

$movieRentingSystem->drop(1, 2);

print_r($movieRentingSystem->search(2)); 
// [0, 1]
?>
```

### Explanation:

- **Initialization**: The constructor initializes data structures to store movie prices, rental status, and heaps for each movie and rented movies. It processes the input entries to populate these structures.
- **Search**: The search function checks the heap of the specified movie, collecting up to 5 available shops by checking rental status. Popped elements are temporarily stored and pushed back to maintain the heap.
- **Rent**: Marks a movie as rented and adds it to the rented heap if not already present.
- **Drop**: Marks a movie as available (unrented).
- **Report**: Collects up to 5 currently rented movies from the rented heap, skipping any that are no longer rented. Rented movies are pushed back into the heap, while non-rented ones are removed.

This approach efficiently manages the movie rental operations by leveraging min-heaps and lazy deletion, ensuring that the system meets the required performance constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**