<?php
session_start();

require_once "autoload.php";
require_once "config.php";

$counter = new Counter(COUNTER_FILE);

if (!Visitor::isCounted()) {
    $counter->increment();
    Visitor::setCounted();
}

echo "<h3>Counted Visitors : </h3>";
echo "<p>" . $counter->getCount() . "</p>";
