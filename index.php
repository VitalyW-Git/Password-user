<?php
require_once __DIR__ . '/App/ArrayUser.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<hr>
<?php

ini_set('error_reporting', E_ALL);

$key1 = 'suDoLetMeIn';

$user_enc = new ArrayUser([
    'username'      => "John Doe",
    'email'         => "user@domain.com",
]);

$user_enc->setPassword('letMeIn007', $key1);

//$tk = '';
$user_dec = $user_enc->getPassword($key1);

// test 1
$pk1 = new PasKey( 'key1' );
assert( $pk1->dec( $pk1->enc( '123' ) ) == '123' );

// test 2
$pk2 = new PasKey( 'key2' );
assert( $pk1->enc( '123' ) != $pk2->enc( '123' ) );

// test 3
assert( $pk1->enc( '' ) != '' );

var_dump($user_enc);
var_dump($user_dec);
?>

<hr>

</body>
</html>

