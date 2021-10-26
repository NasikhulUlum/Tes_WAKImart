<?php


function cek_palindrom($arr, $n)
{
	$status_palindrom = 0;

	for ($i = 0; $i <= $n / 2 && $n != 0; $i++)
	{

		if ($arr[$i] != $arr[$n - $i - 1])
		{
			$status_palindrom = 1;
			break;
		}
	}

	if ($status_palindrom == 1)
		echo "Salah";
	else
		echo "Benar";
}

$array1 = ['M', 'A', 'L', 'A', 'M'];
$num1 = count($array1);

$array2 = ['K', 'A', 'K', 'A', 'K'];
$num2 = count($array2);

$array3 = ['A', 'P', 'A'];
$num3 = count($array3);

$array4 = [1, 2, 3, 4, 4, 3, 2, 1];
$num4 = count($array4);

$array5 = ['P', 'A', 'P', 'A'];
$num5 = count($array5);

echo '<br>';

//cek_palindrom($array1, $num1);

for ($i = 1; $i <= 5 ; $i++)
{

	print_r(${"array$i"});
	echo ' = ';
	cek_palindrom(${"array$i"}, ${"num$i"});
	echo '<p>';
}