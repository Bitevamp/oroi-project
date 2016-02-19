<?php
if (!empty($_POST)) {
    if ($_POST['action'] == 'returnform') {
        $iSQL = 'INSERT INTO returnform
                 SET
                 '.(!empty($_POST['revenue']) ? 'revenue ="'.$_POST['revenue'].'",' : null).'
                 '.(!empty($_POST['margin']) ? 'margin ="'.$_POST['margin'].'",' : null).'
                 '.(!empty($_POST['worth']) ? 'worth ="'.$_POST['worth'].'",' : null).'
                 '.(!empty($_POST['conversion_rate']) ? 'conversion_rate ="'.$_POST['conversion_rate'].'",' : null).'
                 '.(!empty($_POST['dont_know']) ? 'dont_know ="'.$_POST['dont_know'].'",' : null).'
                 '.(!empty($_POST['webshop']) ? 'webshop ="'.$_POST['webshop'].'",' : null).'
                 '.(!empty($_POST['email']) ? 'email ="'.$_POST['email'].'",' : null).'
                 '.(!empty($_POST['newsletter']) ? 'newsletter ="'.$_POST['newsletter'].'",' : null).'

                 ip = "'.$_SERVER['REMOTE_ADDR'].'",
                 date = NOW
                ';

        $db->query($_GLOBALS['__db_link'], $iSQL);

        $_SESSION['second_returnform'] = true;

        foreach ($_POST as $postKey => $postdata) {
            $_SESSION['returnform_postdata'][$postKey] = $postdata;
        }

        header("location: ".checkGET($_SERVER['HTTP_REFERER']));
        exit();
    } elseif ($_POST['action'] == 'secondreturnform') {
        
    }

    header("location: ".checkGET($_SERVER['HTTP_REFERER']));
    exit();
}