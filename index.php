<?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    include_once("configs/config_url.php");
    include_once($url_header);
    include_once($url_navbar);
    include_once($url_content);
    include_once($url_footer);
?>
