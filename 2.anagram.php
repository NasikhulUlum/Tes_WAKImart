<?php

function check_anagram($str1, $str2) {
      if (count_chars($str1, 1) == count_chars($str2, 1)) {
           echo "Benar";
      }
      else {
          echo "Salah";
      }

  }
//check_anagram('bambang', 'bangbam');

$strkiri1 = 'ABC';
$strkanan1 = 'BAC';

$strkiri2 = 'OKKO';
$strkanan2 = 'KKOO';

$strkiri3 = 'MLAMA';
$strkanan3 = 'MAMAL';

$strkiri4 = 'RWWUSEH';
$strkanan4 = 'HWURWES';

$strkiri5 = 'ADFG';
$strkanan5 = 'AGF';

$strkiri6 = 'ABC';
$strkanan6 = 'BCD';

$strkiri7 = 'SAYA';
$strkanan7 = 'YASO'; 

for ($i = 1; $i <= 7 ; $i++)
{

	echo ${"strkiri$i"}. ' , ' .${"strkanan$i"}. ' = ';
	check_anagram(${"strkiri$i"}, ${"strkanan$i"});
	echo '<p>';
}