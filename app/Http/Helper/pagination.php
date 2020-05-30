<?php


function pagination($request){
    if ($request->input('page')) {
        $page = $request->input('page');
    } else {
        $page = 1;
    }
    return $page;
}

?>