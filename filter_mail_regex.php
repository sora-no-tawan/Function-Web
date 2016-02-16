function check_mail($email)
{
    //validation filter email return true or false
    return (bool)preg_match("/(^[0-9a-zA-Z\._]+)(@{1})([0-9a-zA-Z\._]+)(.{1})([0-9a-zA-Z])?$/", $email);
}
