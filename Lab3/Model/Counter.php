<?php

class Counter {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function getCount() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, 0);
        }
        return (int)file_get_contents($this->file);
    }

    public function increment() {
        $count = $this->getCount();
        $count++;
        file_put_contents($this->file, $count);
    }
}
