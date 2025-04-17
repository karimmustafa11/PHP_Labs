<?php

class Visitor {
    public static function isCounted() {
        return isset($_SESSION['is_counted']) && $_SESSION['is_counted'] === true;
    }

    public static function setCounted() {
        $_SESSION['is_counted'] = true;
    }
}
