<?php

function setActive($routename) {
    return request()->routeIs($routename) ? 'active' : '';
}