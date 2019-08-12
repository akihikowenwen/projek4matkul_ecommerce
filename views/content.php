<?php
    switch ($page) {
        case '':
            include_once($url_home);
            break;
        case 'home':
            include_once($url_home);
            break;
        case 'kategori':
            include_once($url_kategori);
            break;
        case 'login':
            include_once($url_login);
            break;
        case 'crud':
            include_once($url_crud);
            break;
        default:
            include_once($url_404);
            break;
    }
?>