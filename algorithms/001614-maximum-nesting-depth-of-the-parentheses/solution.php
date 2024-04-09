class Solution {

/**
 * @param String $s
 * @return Integer
 */
function maxDepth($s) {
    $ans = 0;
$opened = 0;

foreach(str_split($s) as $c) {
  if ($c == '(') {
    $opened += 1;
    $ans = max($ans, $opened);
  } elseif ($c == ')') {
    $opened -= 1;
  }
}

return $ans;
}
}