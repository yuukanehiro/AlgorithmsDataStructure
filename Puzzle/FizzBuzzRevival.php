<?php

fizzbuzz(100);


function fizzbuzz($num) {
    if ($num > 1) {
        fizzbuzz($num -1);
    }
    if ($num % 3 === 0 && $num % 5 === 0) {
        print "fizzbuzz" . "\n";
    } elseif ($num % 3 === 0 ) {
        print "fizz" . "\n";
    } elseif ($num % 5 === 0 ) {
        print "buzz" . "\n";
    } else {
        print $num . "\n";
    }
}
