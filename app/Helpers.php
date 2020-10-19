<?php

function setActive($routename) {
    return request()->routeIs($routename) ? 'active' : '';
}

function valueIfSessionHas($var, $otherwise = "") {
    return session()->has($var) ? session()->get($var) : $otherwise;
}