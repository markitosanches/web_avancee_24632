<?php

require_once('classes/Client.php');

$client = new Client('Annie');

$client->setPhone('454-5545-55555');
$client->account = 10;
echo "<pre>";
var_dump($client);
echo "</pre>";

echo $client->getDetails();