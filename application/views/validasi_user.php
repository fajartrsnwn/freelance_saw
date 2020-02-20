<?php
if ($this->session->userdata['logged_in']['role'] != 'Administrator') {
    $page = base_url();
    header("location: ".$page."welcome/index?user=destroyed");
}
?>