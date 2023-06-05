<?php
/**
 * Make View File
 * @param $path
 * @param array $data
 */
function views($file, array $data = [])
{
    extract($data);
    require_once VIEWS . '/' . $file;
}
/***
 * Get Env variable by key
 */
function env($key)
{
    return isset($_ENV[$key]) ? $_ENV[$key] : '';
}
function assets($path){
    return ASSET_URL.'/'.$path;
}