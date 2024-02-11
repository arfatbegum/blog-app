<?php
if ($_SERVER["SERVER_NAME"]) {
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "blog_app");
    define("DBHOST", "localhost");
} else {
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "blog_app");
    define("DBHOST", "localhost");
}
