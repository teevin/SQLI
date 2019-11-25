<?php
function transposeMatrix(array $matrix)
{
  $ouput = [];
  foreach ($matrix as $row => $sub_array) {
    foreach ($sub_array as $sub_array_row => $value) {
      $output[$sub_array_row][$row] = $value;
    }
  }
  return $output;
}
 ?>
