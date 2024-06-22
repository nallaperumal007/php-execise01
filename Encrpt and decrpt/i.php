<!DOCTYPE html>
<html>
<head>
    <title>Decrypt Encrypted Value</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Encryption function (for testing and verification)
function encrypt($plaintext, $key, $iv) {
    $cipher = "AES-128-CTR";
    $options = 0;
    return openssl_encrypt($plaintext, $cipher, $key, $options, $iv);
}

// Decryption function
function decrypt($ciphertext, $key, $iv) {
    $cipher = "AES-128-CTR";
    $options = 0;
    return openssl_decrypt($ciphertext, $cipher, $key, $options, $iv);
}

// Define the key and IV
$key = '1234567891011121'; // This should be kept secret and secure
$iv = '1234567891011121'; // 16 bytes for AES-128

$decrypted_result = '';
$encrypted_input = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $encrypted_input = $_POST['encrypted_value'];
    // Decrypt the provided value
    $decrypted_result = decrypt($encrypted_input, $key, $iv);
}

// For demonstration, encrypt the value '123456' to verify encryption and decryption process
$test_encryption = encrypt('123456', $key, $iv);
?>

<h2>Decrypt Encrypted Value</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="encrypted_value">Encrypted Value:</label>
    <input type="text" id="encrypted_value" name="encrypted_value" value="<?php echo htmlspecialchars($encrypted_input);?>">
    <input type="submit" value="Decrypt">
</form>

<?php
if ($decrypted_result !== '') {
    echo "<h3>Decryption Result</h3>";
    echo "<table>
            <tr>
                <th>Encrypted String</th>
                <th>Decrypted String</th>
            </tr>
            <tr>
                <td>" . htmlspecialchars($encrypted_input) . "</td>
                <td>" . htmlspecialchars($decrypted_result) . "</td>
            </tr>
          </table>";
}
?>

<h3>Test Encryption</h3>
<p>Encrypted value for '123456' with the current key and IV: <?php echo htmlspecialchars($test_encryption); ?></p>

</body>
</html>
