<?php
//NEXT GREATER PERMUTATION
//Menemukan persekutuan besar dari digit yang sama
/*contoh program berjalan input : 92397
persekutuan besarnya selanjutnya adalah 92739
1. menemukan angka yang lebih kecil dari angka sebelumnya dari kanan yaitu 3 karena lebih kecil dari 9
2. menemukan angka terkecil dan lebih besar dari hasil tahap 1 maka ditemukan angka 7
3. swap angka tahap 1 dengan tahap ke 2. angka 3 dan 7 tukar tempat 92793
4. urutkan angka setelah urutan angka tahap 1 maka diambil urutan dari angka 3 yaitu 3 / 2 jika dimulai dari 0
maka muncullah hasil permutasi selanjutnya yaitu 92739
*/
function MathChallenge($num) {
  $digit = array_map('intval', str_split($num));
  $smallf;//variable tahap 1
  $smalls;//variable tahap 2
  $digitsmall;//pecahan variable setelah angka tahap 1
  $keydf;//indeks atau urutan angka tahap 1
  $keyds;//urutan angka tahap 2
  $a = 1;
  //menemukan angka tahap 1
  for($i = count($digit)-1; $i >= 0; $i--){
    if($digit[$i] > $digit[$i-1]){
      $keydf = $i-1;
      $smallf = $digit[$i-1];
      $digitsmall = (array_slice($digit,$i));      
      break;
    }
  }
  
  //menemuakn angka tahap 2
  foreach($digitsmall as $t){
    if($digitsmall[$a] < $t and $t > $smallf){
      $keyds = $keydf+1 + $a-1;
      $smalls = $t; 
    }
    $a++;
  }
  //tahap 3
  $temp = implode('',$digit);
  $temp[$keydf] = $smalls;
  $temp[$keyds] = $smallf;
  //tahap 4
  $sdigit = array_map('intval', str_split($temp));
  $sdigitsmall = array_slice($sdigit,$keydf+1);
  asort($sdigitsmall);
  $answer = array_merge(array_slice($sdigit,0,$keydf+1), $sdigitsmall);
  //hasil
  return implode('',$answer);
}
?>
