class Solution {

/**
 * @param Integer[] $students
 * @param Integer[] $sandwiches
 * @return Integer
 */
function countStudents($students, $sandwiches) {
    $count = array_count_values($students);
    $i = 0;
    foreach ($sandwiches as $s) {
        if (!$count[$s]) {
            break;
        }
        $count[$s]--;
        $i++;
    }
    return count($sandwiches) - $i;
}
}