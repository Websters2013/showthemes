<?php
$popupId = $_GET['input'];

$json_data = '{
        "col": 1,
        "items": [
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "url2": "http://www.cvfreak.com/showthemes/wp-content/uploads/2015/07/Khore.jpg",
                "permLink": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "title": "Khore",
                "new": "new",
                "href2": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "href3": "http://www.cvfreak.com/showthemes/khore-demo",
                "text": "Khore is the most flexible WordPress Event Theme for your Conferences and Events."
            },
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "url2": "http://www.showthemes.com/wp-content/uploads/2016/06/conference-pro.jpg",
                "permLink": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "title": "Conference Pro",
                "href2": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "href3": "http://www.showthemes.com/conferencepro-demo",
                "text": "Conference Pro is the most flexible Wordpress Event Theme for your Conferences.                        "
            },
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "url2": "http://www.cvfreak.com/showthemes/wp-content/uploads/2015/07/Khore.jpg",
                "permLink": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "title": "Khore",
                "new": "new",
                "href2": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "href3": "http://www.cvfreak.com/showthemes/khore-demo",
                "text": "Khore is the most flexible WordPress Event Theme for your Conferences and Events."
            },
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "url2": "http://www.showthemes.com/wp-content/uploads/2016/06/conference-pro.jpg",
                "permLink": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "title": "Conference Pro",
                "href2": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "href3": "http://www.showthemes.com/conferencepro-demo",
                "text": "Conference Pro is the most flexible Wordpress Event Theme for your Conferences.                        "
            },
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "url2": "http://www.cvfreak.com/showthemes/wp-content/uploads/2015/07/Khore.jpg",
                "permLink": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "title": "Khore",
                "new": "new",
                "href2": "http://www.cvfreak.com/showthemes/event-wordpress-theme-khore",
                "href3": "http://www.cvfreak.com/showthemes/khore-demo",
                "text": "Khore is the most flexible WordPress Event Theme for your Conferences and Events."
            },
            {
                "url1": "http://www.cvfreak.com/showthemes/wp-content/themes/showthemes2/img/browser-bar.png",
                "href1": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "url2": "http://www.showthemes.com/wp-content/uploads/2016/06/conference-pro.jpg",
                "permLink": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "title": "Conference Pro",
                "href2": "http://www.showthemes.com/conference-pro-wordpress-theme",
                "href3": "http://www.showthemes.com/conferencepro-demo",
                "text": "Conference Pro is the most flexible Wordpress Event Theme for your Conferences.                        "
            }
        ]
    }';


$json_data = str_replace("\r\n",'',$json_data);
$json_data = str_replace("\n",'',$json_data);

echo $json_data;
exit;
?>