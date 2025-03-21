2115\. Find All Possible Recipes from Given Supplies

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Graph`, `Topological Sort`

You have information about `n` different recipes. You are given a string array `recipes` and a 2D string array `ingredients`. The <code>i<sup>th</sup></code> recipe has the name `recipes[i]`, and you can **create** it if you have **all** the needed ingredients from `ingredients[i]`. A recipe can also be an ingredient for **other** recipes, i.e., `ingredients[i]` may contain a string that is in `recipes`.

You are also given a string array `supplies` containing all the ingredients that you initially have, and you have an infinite supply of all of them.

Return _a list of all the recipes that you can create_. You may return the answer in **any order**.

**Note** that two recipes may contain each other in their ingredients.

**Example 1:**

- **Input:** recipes = ["bread"], ingredients = [["yeast","flour"]], supplies = ["yeast","flour","corn"]
- **Output:** ["bread"]
- **Explanation:** We can create "bread" since we have the ingredients "yeast" and "flour".

**Example 2:**

- **Input:** recipes = ["bread","sandwich"], ingredients = [["yeast","flour"],["bread","meat"]], supplies = ["yeast","flour","meat"]
- **Output:** ["bread","sandwich"]
- **Explanation:**
  We can create "bread" since we have the ingredients "yeast" and "flour".
  We can create "sandwich" since we have the ingredient "meat" and can create the ingredient "bread".


**Example 3:**

- **Input:** recipes = ["bread","sandwich","burger"], ingredients = [["yeast","flour"],["bread","meat"],["sandwich","meat","bread"]], supplies = ["yeast","flour","meat"]
- **Output:** ["bread","sandwich","burger"]
- **Explanation:**
  We can create "bread" since we have the ingredients "yeast" and "flour".
  We can create "sandwich" since we have the ingredient "meat" and can create the ingredient "bread".
  We can create "burger" since we have the ingredient "meat" and can create the ingredients "bread" and "sandwich".



**Constraints:**

- `n == recipes.length == ingredients.length`
- `1 <= n <= 100`
- `1 <= ingredients[i].length, supplies.length <= 100`
- `1 <= recipes[i].length, ingredients[i][j].length, supplies[k].length <= 10`
- `recipes[i], ingredients[i][j]`, and `supplies[k]` consist only of lowercase English letters.
- `All the values of `recipes` and `supplies` combined are unique.
- Each `ingredients[i]` does not contain any duplicate values.


**Hint:**
1. Can we use a data structure to quickly query whether we have a certain ingredient?
2. Once we verify that we can make a recipe, we can add it to our ingredient data structure. We can then check if we can make more recipes as a result of this.



**Solution:**

We need to determine all possible recipes that can be created given a set of initial supplies and recipes that may depend on each other. The key challenge is to handle dependencies between recipes and ensure that all required ingredients (either from initial supplies or other recipes) are available.

### Approach
1. **Identify Valid Recipes**: First, filter out recipes that have ingredients not present in the initial supplies and are not other recipes. These recipes cannot be made under any circumstances.
2. **Build Dependency Graph**: For each valid recipe, determine its dependencies on other recipes. This helps in constructing a directed graph where edges represent dependencies between recipes.
3. **Topological Sorting with Kahn's Algorithm**: Use Kahn's algorithm to process recipes in topological order. This ensures that each recipe is processed only when all its dependencies (ingredients) are available. Recipes with no dependencies (in-degree of 0) are processed first, and their dependents' in-degrees are adjusted accordingly.

Let's implement this solution in PHP: **[2115. Find All Possible Recipes from Given Supplies](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002115-find-all-possible-recipes-from-given-supplies/solution.php)**

```php
<?php
/**
 * @param String[] $recipes
 * @param String[][] $ingredients
 * @param String[] $supplies
 * @return String[]
 */
function findAllRecipes($recipes, $ingredients, $supplies) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$recipes = ["bread", "sandwich", "burger"];
$ingredients = [["yeast", "flour"], ["bread", "meat"], ["sandwich", "meat", "bread"]];
$supplies = ["yeast", "flour", "meat"];

print_r(findAllRecipes($recipes, $ingredients, $supplies));
?>
```

### Explanation:

1. **Filter Valid Recipes**: Each recipe is checked to ensure all its ingredients are either in the initial supplies or are other recipes. Invalid recipes (with missing ingredients that are neither) are discarded.
2. **Dependency Graph Construction**: For each valid recipe, dependencies on other recipes are identified. These dependencies are used to build an adjacency list and calculate the in-degree for each recipe.
3. **Topological Processing**: Using a queue, recipes with zero in-degree (no dependencies) are processed first. As each recipe is processed, it is added to the result, and its dependents' in-degrees are decremented. If a dependent's in-degree reaches zero, it is added to the queue for processing.

This approach efficiently handles dependencies and ensures that all possible recipes are processed in the correct order, leveraging topological sorting to manage complex interdependencies.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**