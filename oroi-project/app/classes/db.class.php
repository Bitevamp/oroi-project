<?php

/*
 * Standard Database class,
 * Returns standard database calls which are often used
 */
class DB {

    /*
     * Connect, default connect request to database
     */
    public static function connect($host, $user, $pass) {
        return mysqli_connect($host, $user, $pass);
    }

    /*
     * Query, Default query request
     */
    public static function query($link, $sql) {
        return mysqli_query($link, $sql) or die(mysqli_error($link));
    }
}