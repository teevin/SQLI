<?php

   function arrayMergeSortAscending(array $first,array $second)
   {
    $result = array_unique(array_merge($first,$second));
    sort($result,SORT_NUMERIC);
    print_r($result);
   }

 ?>
