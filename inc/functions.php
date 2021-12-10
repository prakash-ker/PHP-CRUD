<?php
function get_site_url($path = ""){
    global $site_url;
    return $site_url.$path;
}

function site_url($path = ""){
    echo get_site_url($path);
}

function get_assets_url($path = ""){
    global $assets_url;
    return $assets_url.$path;
}

function assets_url($path = ""){
    echo get_assets_url($path);
}

