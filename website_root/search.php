<?php
require 'OfferController.php';
if (isset($_GET['searchjob-searchBox'])) {
    $what = "";
    $where = "";
    if (isset($_GET['searchBox-what'])) {
        $what = $_GET['searchBox-what'];
    }
    if (isset($_GET['searchBox-where'])) {
        $where = $_GET['searchBox-where'];
    }
    $offerController = new OfferController();
    $result = $offerController->search($what, $where);
    if ($result !== null) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        }
    }
}