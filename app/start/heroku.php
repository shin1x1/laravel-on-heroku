<?php
DB::listen(function($sql, $bindings, $time) {
    file_put_contents('php://stderr', "[SQL] {$sql} in {$time} s\n" .
        "      bindinds: ".json_encode($bindings)."\n");
});

