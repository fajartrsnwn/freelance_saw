<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['user_username']);
  $user_id = ($this->session->userdata['logged_in']['user_id']);
  
} else {
    $page = base_url();
    header("location: ".$page."login?session=destroyed");
}
?>