<?php

    $obj = new stdClass();
    $obj->id = "1";
    $obj->genre_name = "Comedy";
    $rst[] = $obj;

    $obj = new stdClass();
    $obj->id = "2";
    $obj->genre_name = "Drama";
    $rst[] = $obj;

    $obj = new stdClass();
    $obj->id = "3";
    $obj->genre_name = "Action";
    $rst[] = $obj;

    Echo '{rows:'.json_encode($rst).'}';
