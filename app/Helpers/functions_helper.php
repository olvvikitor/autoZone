<?php
function display_errors($field, $errors)
{
  if (empty($errors)) {
    return;
  }
  if (array_key_exists($field, $errors)) {
    return '<div class="text-danger fw-bold"><small><i class="fa-regular fa-circle-xmark me-1"></i>'
     . $errors[$field] . '</small></div>';
  }
}
function calculate_promotion($value, $discount){
  
  if($discount == 0){
    return $value;
  }

  //round decimal
  return round($value - ($value * $discount) / 100, 2);
}
function normalize_price($price) {
  return number_format($price, 2, ',', '.');
}
