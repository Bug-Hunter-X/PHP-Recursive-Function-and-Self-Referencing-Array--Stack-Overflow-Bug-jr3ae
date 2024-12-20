```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    }
  }
  return $data;
}

$data = [1, 2, [3, 4, [5, 6]]];
$processedData = processData($data);
print_r($processedData); // Expected output:  Array ( [0] => 1 [1] => 2 [2] => Array ( [0] => 3 [1] => 4 [2] => Array ( [0] => 5 [1] => 6 ) ) )

// Incorrect usage that can cause unexpected behavior
$data = [1, 2, &$data]; // $data contains a self-reference
$processedData = processData($data);
print_r($processedData); //Throws a Stack Overflow Error
```