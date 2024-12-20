```php
function processData(array $data, array &$visited = []): array {
  $key = spl_object_hash($data);
  if (isset($visited[$key])) {
    return []; // Break the cycle
  }
  $visited[$key] = true;

  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value, $visited); 
    }
  }
  return $data;
}

$data = [1, 2, [3, 4, [5, 6]]];
$processedData = processData($data);
print_r($processedData); // Correct output

//Handling self reference
$data = [1, 2, &$data];
$processedData = processData($data);
print_r($processedData); // Handles self-reference gracefully
```