<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'psql:host=localhost;dbname=roman_s_tests';

return $db;
