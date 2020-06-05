<?php
if (isset($_GET['searchjob-searchBox'])) {
    $what = "";
    $where = "";
    if (isset($_GET['searchBox-what'])) {
        $what = $_GET['searchBox-what'];
    }
    if (isset($_GET['searchBox-where'])) {
        $where = $_GET['searchBox-where'];
    }
}
