<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    // XXX: this sensitive info should go in your local.php file (dist is an example ext and should be removed):
    /*
    'db' => [
        'username' => 'test',
        'password' => 'test',
    ]*/
    // XXX
    'db' => [
        'driver' => 'Pdo',
        'dsn' => 'mysql:unix_socket=/run/mysqld/mysqld.sock;dbname=ricky_zf3', // XXX: You may not be using a socket! Check https://goo.gl/LjctKh for other connection string examples
    ],
];
