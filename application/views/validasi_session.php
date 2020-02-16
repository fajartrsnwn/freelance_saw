<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['user_username']);
  $email = ($this->session->userdata['logged_in']['user_email']);
  
} else {
    $page = base_url();
    header("location: ".$page."login?session=destroyed");
}
?>