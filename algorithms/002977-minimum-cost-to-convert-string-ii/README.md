2977\. Minimum Cost to Convert String II

**Difficulty:** Hard

**Topics:** `Array`, `String`, `Dynamic Programming`, `Graph Theory`, `Trie`, `Shortest Path`, `Weekly Contest 377`

You are given two **0-indexed** strings `source` and `target`, both of length `n` and consisting of **lowercase** English characters. You are also given two **0-indexed** string arrays `original` and `changed`, and an integer array `cost`, where `cost[i]` represents the cost of converting the string `original[i]` to the string `changed[i]`.

You start with the `string` source. In one operation, you can pick a **substring** `x` from the string, and change it to `y` at a cost of `z` **if** there exists **any** index `j` such that `cost[j] == z`, `original[j] == x`, and `changed[j] == y`. You are allowed to do **any** number of operations, but any pair of operations must satisfy **either** of these two conditions:
- The substrings picked in the operations are `source[a..b]` and `source[c..d]` with either `b < c` **or** `d < a`. In other words, the indices picked in both operations are **disjoint**.
- The substrings picked in the operations are `source[a..b]` and `source[c..d]` with `a == c` **and** `b == d`. In other words, the indices picked in both operations are **identical**.

Return _the **minimum** cost to convert the string `source` to the string `target` using **any** number of operations. If it is impossible to convert `source` to `target`, return `-1`_.

**Note** that there may exist indices `i`, `j` such that `original[j] == original[i]` and `changed[j] == changed[i]`.

**Example 1:**

- **Input:** source = "abcd", target = "acbe", original = ["a","b","c","c","e","d"], changed = ["b","c","b","e","b","e"], cost = [2,5,5,1,2,20]
- **Output:** 28
- **Explanation:** To convert "abcd" to "acbe", do the following operations:
  - Change substring source[1..1] from "b" to "c" at a cost of 5.
  - Change substring source[2..2] from "c" to "e" at a cost of 1.
  - Change substring source[2..2] from "e" to "b" at a cost of 2.
  - Change substring source[3..3] from "d" to "e" at a cost of 20.
    The total cost incurred is 5 + 1 + 2 + 20 = 28.
    It can be shown that this is the minimum possible cost.

**Example 2:**

- **Input:** source = "abcdefgh", target = "acdeeghh", original = ["bcd","fgh","thh"], changed = ["cde","thh","ghh"], cost = [1,3,5]
- **Output:** 9
- **Explanation:** To convert "abcdefgh" to "acdeeghh", do the following operations:
  - Change substring source[1..3] from "bcd" to "cde" at a cost of 1.
  - Change substring source[5..7] from "fgh" to "thh" at a cost of 3. We can do this operation because indices [5,7] are disjoint with indices picked in the first operation.
  - Change substring source[5..7] from "thh" to "ghh" at a cost of 5. We can do this operation because indices [5,7] are disjoint with indices picked in the first operation, and identical with indices picked in the second operation.
    The total cost incurred is 1 + 3 + 5 = 9.
    It can be shown that this is the minimum possible cost.

**Example 3:**

- **Input:** source = "abcdefgh", target = "addddddd", original = ["bcd","defgh"], changed = ["ddd","ddddd"], cost = [100,1578]
- **Output:** -1
- **Explanation:** It is impossible to convert "abcdefgh" to "addddddd".
  If you select substring source[1..3] as the first operation to change "abcdefgh" to "adddefgh", you cannot select substring source[3..7] as the second operation because it has a common index, 3, with the first operation.
  If you select substring source[3..7] as the first operation to change "abcdefgh" to "abcddddd", you cannot select substring source[1..3] as the second operation because it has a common index, 3, with the first operation.

**Constraints:**

- `1 <= source.length == target.length <= 1000`
- `source`, `target` consist only of lowercase English characters.
- `1 <= cost.length == original.length == changed.length <= 100`
- `1 <= original[i].length == changed[i].length <= source.length`
- `original[i]`, `changed[i]` consist only of lowercase English characters.
- `original[i] != changed[i]`
- `1 <= cost[i] <= 10⁶`



**Hint:**
1. Give each unique string in `original` and `changed` arrays a unique id. There are at most `2 * m` unique strings in total where `m` is the length of the arrays. We can put them into a hash map to assign ids.
2. We can pre-compute the smallest costs between all pairs of unique strings using Floyd Warshall algorithm in `O(m³)` time complexity.
3. Let `dp[i]` be the smallest cost to change the first `i` characters (prefix) of `source` into `target`, leaving the suffix untouched. We have `dp[0] = 0`. `dp[i] = min(dp[i - 1] if (source[i - 1] == target[i - 1]), dp[j-1] + cost[x][y] where x is the id of source[j..(i - 1)] and y is the id of target e[j..(i - 1)]))`. If neither of the two conditions is satisfied, `dp[i] = infinity`.
4. We can use Trie to check for the second condition in `O(1)`.
5. The answer is `dp[n]` where `n` is `source.length`.



**Similar Questions:**
1. [1540. Can Convert String in K Moves](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001540-can-convert-string-in-k-moves)
2. [2027. Minimum Moves to Convert String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002027-minimum-moves-to-convert-string)
3. [3292. Minimum Number of Valid Strings to Form Target II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003292-minimum-number-of-valid-strings-to-form-target-ii)
4. [3291. Minimum Number of Valid Strings to Form Target I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003291-minimum-number-of-valid-strings-to-form-target-i)






**Solution:**

We need to find the minimum cost to convert `source` to `target` using allowed substring conversions with the constraint that operations must be on disjoint or identical substrings. Let break this down.

### Approach:

1. **Graph Construction & Shortest Paths**
   - Extract all unique strings from `original` and `changed` arrays.
   - Assign a unique ID to each string for efficient indexing.
   - Build a directed graph where nodes are strings and edges represent conversions from `original[i]` to `changed[i]` with cost `cost[i]`.
   - Compute all-pairs shortest paths using Floyd‑Warshall to find minimum conversion costs between any two strings.

2. **String Matching Precomputation**
   - Build a trie containing all unique strings, storing their IDs at terminal nodes.
   - For each starting index in `source` and `target`, traverse the trie to find all matching substrings (and their IDs) that exist in the graph.
   - Store these matches as mappings from starting index and length to string ID.

3. **Dynamic Programming**
   - Define `dp[i]` as the minimum cost to convert the first `i` characters of `source` to the first `i` characters of `target`.
   - Initialize `dp[0] = 0` and the rest as infinity.
   - For each position `i`:
      - **Direct Match**: If `source[i] == target[i]`, propagate `dp[i]` to `dp[i+1]`.
      - **Substring Conversion**: For each length `L` where both `source[i..i+L-1]` and `target[i..i+L-1]` are in the graph, look up the precomputed shortest path cost. Update `dp[i+L]` if a lower cost is found.
   - The answer is `dp[n]`, or `-1` if it remains infinity.

Let's implement this solution in PHP: **[2977. Minimum Cost to Convert String II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002977-minimum-cost-to-convert-string-ii/solution.php)**

```php
<?php
/**
 * @param String $source
 * @param String $target
 * @param String[] $original
 * @param String[] $changed
 * @param Integer[] $cost
 * @return Integer
 */
function minimumCost(string $source, string $target, array $original, array $changed, array $cost): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumCost("abcd", "acbe", ["a","b","c","c","e","d"], ["b","c","b","e","b","e"], [2,5,5,1,2,20]) . "\n";      // Output: 28
echo minimumCost("abcdefgh", "acdeeghh", ["bcd","fgh","thh"], ["cde","thh","ghh"], [1,3,5]) . "\n";                 // Output: 9
echo minimumCost("abcdefgh", "addddddd", ["bcd","defgh"], ["ddd","ddddd"], [100,1578]) . "\n";                      // Output: -1

$source= "icplvjxnorcefeotpnmysrruthkqjikpbsjbxotigsaiwztfxeesaapvlfgzssbuqmsbubripquccwweqbnbzfpxgtxbwwdenowlaemjumusrpcjswhjnqbggvdpbqhqvdewjpsebbdwejqinmmbzqdcrkouhhkgcojejqshjavtmvblgeufgyscbmswxirmybkdtjtpgyolipbjdwxqbvzenigyibfgskepqqdmmiyjzvaupobazjocubowgyitqckxhaimlbfotemxrxbqpvmfqqcdmsvvfetlmuzdwkuudhwhfncklzsbhzwdaishupwwiuymrfemsvnnbrssdqhcqazkpvnljhnlosznohrbepvfrskhtsnrvshxqmmxjpiuwgyipgliglubkcikzupfvqxgljkjqrbuwvbtxudioxyljbollvvtfoszscvvexpmckhinhmoefdkfjqtfawduwpsuozzuzeelyioiqqgwuacbionomifxtqlowisvwijjeogzlkbdosqjkgdwgmbblyewulrzftuoyqtkcedoyuticzeknlcpoiymtpilojihogryylrdnyztrbsgablihzugxgbaotitqgtsrgndtmbdcpvzdnuvavxtcplqowxnagzsawthrqpdsbvntewkkemvvghknaiguahwvesqxqkoelznorqxqgr";
$target= "icplvjxnorcefeotpnmysrruthkqjikpbsjbxotigsaiwztfxeesaapvlfgzssbuqmsbubripquccwweqbnbzfpxgtxbwwdenowlaemjumusrpcjswhjnqbggvdpbqhqvdewjpsebbdwejqinmmbzqdcrkouhhkgcojejqshjavtmvblgeufgyscbmswxirmybkdtjtpgyolipbjdwxqbvzenigyibfgskepqqdmmiyjzvaupobazjocubowgyitqckxhaimlbfotemxrxbqpvmfqqcdmsvvfetlmuzdwkuudhwhfncklzsbhzwdaishupwwiuymrfemsvnnbrssdqhcqealwyzyytkddichabmvkeymrskhtsnrvshxqmmxjpiuwgyipgliglubkcikzupfvqxgljkjqrbuwvbtxudioxyljbollvvtfoszscvvexpmckhinhmoefdkfjqtfawopsnovxbzuzeelyioiqqgwuacbionomifxqojziszhxthfnnqliifggtkirrpmutsdowlwtssadvbkbjuwvjtoyuticzeknlcpoiymtpilojihogryylrdnyztrbsgablihzugxgbaotitqgtsrgndtmbdcpvzdnuvavxtcplqowxnagzsawthrqpdsbvntewkkemvvghknaiguahwvesqxqkoelznorqxqgr";
$original= ["tqlowisvwijjeogzlkbdosqjkgdwgmbblyewulrzftuoyqtkced","tqlowisvwijjeogzlkbdosqjkgdwgmbblyewulrzftuoyqtkced","cqjccriqalynwulifupywvbsqzmywceshnuvbpnieciniihujnr","cqjccriqalynwulifupywvbsqzmywceshnuvbpnieciniihujnr","bswsxzpnsbjkzovetgtlmkvvbewwinlmtufpxfkfksqeyplhmpz","bswsxzpnsbjkzovetgtlmkvvbewwinlmtufpxfkfksqeyplhmpz","adcoaqjoimilfvhmipuksruwcrdojtzolbxinnvseopqdxqtrin","adcoaqjoimilfvhmipuksruwcrdojtzolbxinnvseopqdxqtrin","tncapcrkamlpmakmsgmkuweqvjbkwktehrmmeubjmzqnxsbbmju","tncapcrkamlpmakmsgmkuweqvjbkwktehrmmeubjmzqnxsbbmju","azkpvnljhnlosznohrbepvf","azkpvnljhnlosznohrbepvf","nuhkthhossyjoftytxruypm","nuhkthhossyjoftytxruypm","yzdyihmbzmphgbqhiuxbacs","yzdyihmbzmphgbqhiuxbacs","yzrjstllfmbbqzcuzkjtcog","yzrjstllfmbbqzcuzkjtcog","ktcnkovflyxgzpzubbyvctp","ktcnkovflyxgzpzubbyvctp","txlvdorujvtiquqepqxdgwf","txlvdorujvtiquqepqxdgwf","tewcmztxipasmjrfdhsqthb","tewcmztxipasmjrfdhsqthb","hlhhbbfqsxwqzeenuqetveb","hlhhbbfqsxwqzeenuqetveb","bjrxqohpfplaoiyyypcempd","bjrxqohpfplaoiyyypcempd","vyvfochkvxniageqmzsvjdi","vyvfochkvxniageqmzsvjdi","duwpsuoz","duwpsuoz","bkxhhnnp","bkxhhnnp","savsobhz","savsobhz"];
$changed= ["cqjccriqalynwulifupywvbsqzmywceshnuvbpnieciniihujnr","lqkdvcrecwbhozqaugiqnvanqeiafjbludmzbrcqudjhxjhbsav","bswsxzpnsbjkzovetgtlmkvvbewwinlmtufpxfkfksqeyplhmpz","dyudxjiaazjqmwrgdqdibouzqlqpvbnseyxiiyokqsebtyqvhbs","adcoaqjoimilfvhmipuksruwcrdojtzolbxinnvseopqdxqtrin","jdpausizptofaykxceguvfpmzdnlaqkmeyypcazzhcguaqiildn","tncapcrkamlpmakmsgmkuweqvjbkwktehrmmeubjmzqnxsbbmju","xowbwqdzmhhpliwfzgavolpafuruvwhvpdolmwrpudfjxurrwkk","qojziszhxthfnnqliifggtkirrpmutsdowlwtssadvbkbjuwvjt","udpjjsrwhmtjceescfloyrtmnvqabbhufrkjcnzxdkvxculvfpn","nuhkthhossyjoftytxruypm","lnpmlnfdhowilomjxthhvay","yzdyihmbzmphgbqhiuxbacs","dplpuooqlhnnwvmorgwthgp","yzrjstllfmbbqzcuzkjtcog","kasusfchcuqyfakadhyairp","ktcnkovflyxgzpzubbyvctp","zwshjefbunallvanflzpeia","txlvdorujvtiquqepqxdgwf","pwvfsnpgraiezoafqptnkuq","tewcmztxipasmjrfdhsqthb","xqhirjqqxkbavplhjedtwxu","hlhhbbfqsxwqzeenuqetveb","xcofkclbfrziukynrvcndtm","bjrxqohpfplaoiyyypcempd","ylokzghtmzzkwyujkkrdefj","vyvfochkvxniageqmzsvjdi","jsbifuxbsxnkvgrabwvcfli","ealwyzyytkddichabmvkeym","elzbuoixywqoaoanzgbcgqh","bkxhhnnp","gswfakny","savsobhz","hhkbysvh","opsnovxb","zfflwdhr"];
$cost= [72783,94515,64521,40564,96143,93238,93499,33969,82303,86638,96121,27971,79283,59917,73652,55636,71240,87901,73605,55402,31130,94635,62207,75147,35293,68690,87462,74621,89484,54183,99231,93971,92303,91066,95539,84228];  
echo minimumCost($source, $target, $original, $changed, $cost) . "\n";                                              // Output: 1395799

$source = "hjxihqdjikhhqhrbhovwzsqfvqtoxynfsgrwxvcwkuerirjdzfvpphdoinznuaaxubuqguoqrogwyncvrqdyvhbrgicyvbiwdoeqexnkghbjjtrrdjejxnzusqknupxiveyvuhfwnjevypjkjgybqkwcdrdpqqseppdgsuhicocfejpbfaaebwqbdgoydsenbjjsjjoatvkehfbkzuhjatteyhesxcqcahuwjxpoxebsdsssdinqgqzvdppczfzzfpnoiwezjuyaiybceoiftwkywkrhggywxnbxgbahftahbputisuoqyirzobjqteesyytybjxjrxkkrjrkxfkfpjcegtuocnxppkdswvbabdtpyuxtejybespitvjfycgqcpfhsinwkpzbvyjutrhudcnwgizwyvejfpuriobeydjgwpjubwsacttwhvxwhbewqcjupwpvqrwrrrhzjnkfnykivzfhbghqnicjezbnqevvhfctobcpikhsyjrkeuterrycqfdtfggbagftnocxztjtsycecaoudivnhwnhbxxtbvajykcjnzhnyxsebcuvcvovgfbyjeqzgkpynzgzkcfjyowywxseazipjrujjtwwiunxnrbseicdaaqojardbxjiarxcckdcxqaoxhigfcusiwgxpsgasybwfphukiewsnoyjqfxweewoaf";
$target = "hapvrncnonqwtdrecivwyzbfvqtoxynfsgrwxvcwkuerirjdzfvpphdoinznuaaxubuqguoqronyccfwrqdyvhbrgicyvbiwdoeqexnkghbjjtrrdjejxnzusqknupxiveyvuhfwnjevypjkjgybqkwcdrdpqqseppdgsuhicoyryqvqpnuwpuwdpsiydsenbjjsjjoatvkehfbkzuhjatteyhesxcqcahuwjxpoxebsdsssdinqgqzvdppczfztxbqttwezjuyaiybceoifnbsuysfyqaqcqnoggbahfthwfjisuuqfnorgashuonnrqyytybjxjrxkkrjrktxyjibgyrzvwssnbtvuswvbabdtpyuxwsehgvwfvrtrrbvqvivfvsprqpozbvyjutrhudcnwgizwyvejfpuriobeydjgwpjubwsacttwhvxwhbewqcjupwpvqrwrrrhzjnkfnykiksawofpdgodkazbnqevvhfctobcpikhsyjrkeuterrycqfdtfggbagftnocxztjtsycecaoudivnhwnhbxxtbvajykcjoariisxxvdrrrvovgfbyjeqzgkpynzgzkcfjyowywxseazipjrujjtwwiunxnrbseicdaaqojardbxjiarxcckdcxqaoxhigfcusiwgxpsgasybwfphukiewsnoyjqfxweewoaf";
$original = ["twkywkrhggywxnbxg","vthvrjaspggvepbjd","chewbtoifyavxeefp","cudbhqvdqfeutkyve","ohhgdexcwqxkfhoph","bhqszuaqtergvhnyo","kxvzncwecsdwcgiqs","sgqgrveqrskicaktj","uaiqinitcqpopggvz","vzfhbghqnicje","fbjnsbjrgjyrc","oekiqzehaazdt","fsxoabdbirxgz","gxfsdfhnhfypg","sywfafuctkotq","vwuqkxovfnjsy","cfejpbfaaebwqbdgo","gsxkwosurxrxjaapw","jnpujvvhrejvevqwv","idafnjtvwcuhtnbbs","detfbqdaoxtjrapif","hsyrbufgjfnvwnjti","qsnpjowbffazzkfop","ogwyncv","fhwuqnh","bxbiajj","jpnuwwr","uwpyksj","vsdrcyb","uyjfheu","zojxzus","htuqnyj","downsye","ahbputisuoqyirzobjqtees","snuxqvkhcgawoucqdofoscr","xbhynjuecrowtfgvgwdpoaz","yfttyshopbtgwhsetbhskhp","fqokvnpdcqigjqkdsshvxza","sjwvspngfkrcjskcptdxvck","kejqbwrdqyufdenjyspfkns","hkjhqatxryspjwxgzbfbubf","ohodxwowzbcnhnzupbbycjj","tejybespitvjfycgqcpfhsinwkp","hboojwubbzxkdfutvjizvipdswi","qtnffwuoriqsjahkcjucwtbrssv","zxkqafiizcjcnibrbqaubrqrevu","tsjxaugrisrxdsrncskdacpinsk","kakrasnbhrjdprobzbnqzbgvkvv","xeanyyvzyybyvcfoobwksecziix","giejjxcsaihgkyyucjvqyxfosbv","nzhnyxsebcuvc","qzbcfpuvqwyoc","zwujzdfxprfhz","cvkjyptgynxcs","riaqtwekgzdrb","adgroxsneubsp","ggxbstrrdchgp","gwnebxiuwgybc","hznbskgwgyher","xfkfpjcegtuocnxppkd","urhjqjoojqedkuectpr","akxesigywvqywyqufsa","fivxcgpbbecocxdkhsd","veshyatunycvgjqevgq","yhxkvodwsfsxfktexib","qpduhagkgxcrrxdgtzg","ncnnhvbtwckuhfpyctj","jdcguzsxbcevijbnuse","qxqgrvotzwyndosttru","jxihqdjikhhqhrbhovwzsq","ayubutnyeuhvzgdpxkqeqn","tykgoxwceyojawiguqrhgv","sxsbzjxjyogugqaetgwhqk","jwkdftpakfdvjrtegavewc","npzqdbzevfktcfqisxeedo","zvtayzpsynydkxhqbtucdz","xykqqthxxiecvfowjuvgkx","ttckzrvinydacsjisbbhjk","zfpnoi","bgsueq","twkywkrhggywxnbxg","vzfhbghqnicje","cfejpbfaaebwqbdgo","ogwyncv","ahbputisuoqyirzobjqtees","tejybespitvjfycgqcpfhsinwkp","nzhnyxsebcuvc","xfkfpjcegtuocnxppkd","jxihqdjikhhqhrbhovwzsq","zfpnoi"];
$changed = ["vthvrjaspggvepbjd","chewbtoifyavxeefp","cudbhqvdqfeutkyve","ohhgdexcwqxkfhoph","bhqszuaqtergvhnyo","kxvzncwecsdwcgiqs","sgqgrveqrskicaktj","uaiqinitcqpopggvz","nbsuysfyqaqcqnogg","fbjnsbjrgjyrc","oekiqzehaazdt","fsxoabdbirxgz","gxfsdfhnhfypg","sywfafuctkotq","vwuqkxovfnjsy","ksawofpdgodka","gsxkwosurxrxjaapw","jnpujvvhrejvevqwv","idafnjtvwcuhtnbbs","detfbqdaoxtjrapif","hsyrbufgjfnvwnjti","qsnpjowbffazzkfop","yryqvqpnuwpuwdpsi","fhwuqnh","bxbiajj","jpnuwwr","uwpyksj","vsdrcyb","uyjfheu","zojxzus","htuqnyj","downsye","onyccfw","snuxqvkhcgawoucqdofoscr","xbhynjuecrowtfgvgwdpoaz","yfttyshopbtgwhsetbhskhp","fqokvnpdcqigjqkdsshvxza","sjwvspngfkrcjskcptdxvck","kejqbwrdqyufdenjyspfkns","hkjhqatxryspjwxgzbfbubf","ohodxwowzbcnhnzupbbycjj","hwfjisuuqfnorgashuonnrq","hboojwubbzxkdfutvjizvipdswi","qtnffwuoriqsjahkcjucwtbrssv","zxkqafiizcjcnibrbqaubrqrevu","tsjxaugrisrxdsrncskdacpinsk","kakrasnbhrjdprobzbnqzbgvkvv","xeanyyvzyybyvcfoobwksecziix","giejjxcsaihgkyyucjvqyxfosbv","wsehgvwfvrtrrbvqvivfvsprqpo","qzbcfpuvqwyoc","zwujzdfxprfhz","cvkjyptgynxcs","riaqtwekgzdrb","adgroxsneubsp","ggxbstrrdchgp","gwnebxiuwgybc","hznbskgwgyher","oariisxxvdrrr","urhjqjoojqedkuectpr","akxesigywvqywyqufsa","fivxcgpbbecocxdkhsd","veshyatunycvgjqevgq","yhxkvodwsfsxfktexib","qpduhagkgxcrrxdgtzg","ncnnhvbtwckuhfpyctj","jdcguzsxbcevijbnuse","qxqgrvotzwyndosttru","txyjibgyrzvwssnbtvu","ayubutnyeuhvzgdpxkqeqn","tykgoxwceyojawiguqrhgv","sxsbzjxjyogugqaetgwhqk","jwkdftpakfdvjrtegavewc","npzqdbzevfktcfqisxeedo","zvtayzpsynydkxhqbtucdz","xykqqthxxiecvfowjuvgkx","ttckzrvinydacsjisbbhjk","apvrncnonqwtdrecivwyzb","bgsueq","txbqtt","nbsuysfyqaqcqnogg","ksawofpdgodka","yryqvqpnuwpuwdpsi","onyccfw","hwfjisuuqfnorgashuonnrq","wsehgvwfvrtrrbvqvivfvsprqpo","oariisxxvdrrr","txyjibgyrzvwssnbtvu","apvrncnonqwtdrecivwyzb","txbqtt"];
$cost = [747105,621748,999421,732524,979520,473950,898876,938663,979558,219084,764956,423918,843028,902652,924555,754186,569608,391179,397842,911489,957920,902993,431204,766084,368834,589332,673244,980506,967192,172654,960106,757247,748102,783843,567766,872281,871168,971534,987642,622008,905148,468896,981040,511289,974961,660576,600916,649075,986786,417436,572668,855277,972543,884938,469433,790915,805029,590923,585133,937033,881235,908698,594435,694569,552783,269024,910856,990054,766677,826345,438912,883728,936794,996209,705794,526509,869878,921592,591779,804981,175670,962758,278631,238231,499557,748139,465588,991688,202220,117658];
echo minimumCost($source, $target, $original, $changed, $cost) . "\n";                                              // Output: 4680140

$source = "jlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznb";
$target = "wgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekx";
$original = ["jlz","nb","jl","znb","jlz","nbj","lz","nb","jlz","nbj","lz","nbjl","zn","bj","lzn","bjl","zn","bj","lzn","bjl","zn","bj","lz","nb","jlz","nb","jlz","nb","jl","znbj","lzn","bj","lzn","bj","lz","nb","jlz","nbj","lz","nbjl","zn","bj","lzn","bj","lznb","jlz","nbjl","zn","bjl","zn","bjlz","nb","jl","zn","bj","lz","nb","jlz","nb","jlz","nb","jl","zn","bj","lz","nb","jl","zn","bj","lzn","bj","lz","nbjl","znb","jl","znb","jl","znb","jl","znbj","lzn","bjlz","nb","jl","zn","bj","lz","nb","jl","znbj","lz","nb","jlzn","bj","lzn","bj","lz","nbj","lznb","jlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznbjlznb"];
$changed = ["wge","kx","wg","ekx","wge","kxw","ge","kx","wge","kxw","ge","kxwg","ek","xw","gek","xwg","ek","xw","gek","xwg","ek","xw","ge","kx","wge","kx","wge","kx","wg","ekxw","gek","xw","gek","xw","ge","kx","wge","kxw","ge","kxwg","ek","xw","gek","xw","gekx","wge","kxwg","ek","xwg","ek","xwge","kx","wg","ek","xw","ge","kx","wge","kx","wge","kx","wg","ek","xw","ge","kx","wg","ek","xw","gek","xw","ge","kxwg","ekx","wg","ekx","wg","ekx","wg","ekxw","gek","xwge","kx","wg","ek","xw","ge","kx","wg","ekxw","ge","kx","wgek","xw","gek","xw","ge","kxw","gekx","wgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekxwgekx"];
$cost = [930,282,631,690,251,129,954,462,450,663,742,513,166,134,861,617,251,252,376,549,758,787,171,420,481,670,841,392,52,744,310,538,873,631,607,709,652,691,759,478,95,567,445,489,888,428,559,772,613,184,92,741,810,391,781,635,642,724,324,117,400,467,433,207,747,469,758,474,971,44,283,862,825,905,346,688,947,112,142,467,356,356,422,212,76,104,453,881,894,878,193,308,167,865,510,342,931,622,626,54609];
echo minimumCost($source, $target, $original, $changed, $cost) . "\n";                                              // Output: 26737
?>
```

### Explanation:

- **Graph Interpretation**: Each unique string is a node. Conversions are directed edges with given costs. The shortest path between two strings represents the minimum cost to change one into the other via a sequence of allowed operations (all on the same interval).
- **Trie Usage**: The trie enables efficient detection of which substrings of `source` and `target` exist in the graph. This avoids O(L) substring extraction for every possible segment, reducing the complexity from O(n³) to O(n²) in practice.
- **DP State Transition**: The DP considers two actions at each position:
   1. Matching a single character (cost 0 if equal).
   2. Converting an entire substring (cost from the precomputed shortest paths).
- **Constraints Compliance**: The DP inherently respects the problem’s constraints because:
   - Converted substrings are non‑overlapping (disjoint) in the partition.
   - Multiple conversions on the same interval are captured by the shortest path in the graph.

### Complexity
- Floyd‑Warshall: O(k³) where k ≤ 200 (unique strings).
- Trie traversal: O(n²) in the worst case (n = 1000).
- DP: O(n ⋅ L) where L is the number of distinct substring lengths (≤ 100).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**