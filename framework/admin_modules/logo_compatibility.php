<?php
//Backwards Compatibility FUnction
function dellow_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function dellow_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}
