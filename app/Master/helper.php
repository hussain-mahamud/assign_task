<?php
/**
 * Make View File
 * @param $path
 * @param array $data
 */
function views($file,array $data=[])
{
    extract($data);
    require_once VIEWS . '/' . $file;
}