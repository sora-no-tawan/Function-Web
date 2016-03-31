<?php

function check_mail($email)
{
    //check email match if email match will return true if not match will return false
    $regex = preg_match('/(^[0-9a-zA-Z\._]+)(@{1})([0-9a-zA-Z\._\-]+)(.{1})([0-9a-zA-Z])?$/', $email);
    return (bool)$regex;
}

function check_datetime($datetime)
{
    //filter DateTime type 2016-01-30 11:44:00
    $regex = preg_match('/(^[0-9]{4})\-{1}([0-9]{2})\-([0-9]{2})\s([0-9]{2})\:([0-9]{2})\:([0-9]{2})$/', $datetime);
    return (bool)$regex;
}

function check_phone($phone)
{
    //filter number phone if not's number will return false
    $regex = preg_match('/^([\+|0-9\-]*)$/', $phone);
    return (bool)$regex;
}

function check_ip($ip)
{
    $regex = preg_match('/^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$/', $ip);
    return (bool)$regex;
}

function check_id($id)
{
    //check Get id from parameter if is int return true.
    $regex = preg_match('/^([0-9]*)$/', $id);
    return (bool)$regex;
}
