<?php

return function ($kirby, $pages, $page) {


    if ( param('date') ) {
        $datepage = $page->parent()->children()->find(urldecode(param('date')));
    } else {
        $datepage = false;
    }


    return compact('datepage');
};
