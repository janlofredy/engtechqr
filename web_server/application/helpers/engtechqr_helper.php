<?php

// sets the header title of every page
if (!function_exists('set_header_title')) {
  function set_header_title($title){
    define('HEADER_TITLE', $title);
  }
}

// sets the modal title of every page
if (!function_exists('set_modal_title')) {
  function set_modal_title($title){
    define('MODAL_TITLE', $title);
  }
}

// sets the modal title of every page
if (!function_exists('set_modal_content')) {
  function set_modal_content($content){
    define('MODAL_CONTENT', $content);
  }
}
