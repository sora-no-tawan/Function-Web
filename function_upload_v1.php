<?php

function upload($user_name,$email,$message,$file)
{
    global $dbstamian;

    if(empty($user_name))
    {
        echo 'Sorry Username empty';
    }
    elseif(empty($email))
    {
        echo 'Sorry Email empty';
    }
    elseif(empty($message))
    {
        echo 'Sorry Message empty';
    }
    elseif(empty($file))
    {
        echo 'Sorry File Empty';
    }
    elseif($file['file_attach']['size'] < 40)
    {
        echo 'Sorry File limit 40 MB';
    }
    else
    {
        $file_dir = 'file/';
        $file_name = rand(0000,9999)."_".ereg_replace('[[:space:]]+','_',trim((addslashes(strip_tags($file['file_attach']['name'])))));
        $file_size = $file['file_attach']['size'];
        $file_tmp = $file['file_attach']['tmp_name'];
        $file_type = $file['file_attach']['type'];

        $file_ext = strtolower(end(explode('.',$file_name)));
        $regex = "/^[0-9]+_([0-9a-zA-Z\_]+).{1}(jpge|png|jpg|pdf|doc|docx)+/";
        $match = preg_match($regex,$file_name);

        $file_allow = array(
            "jpeg",
            "jpg",
            "png",
            "pdf",
            "doc",
            "docx");

        $mim_type = array(
            "image/jpeg",
            "image/jpg",
            "image/png",
            "application/pdf",
            "application/doc",
            "application/docx");

        if(in_array($file_ext,$file_allow) == true and in_array($file_type,$mim_type) == true and !file_exists($file_dir,$file_name) and checkemail($email) == true and $match == true)
        {
            $sql = "INSERT INTO contact(contact.contact_name,contact.contact_email,contact.contact_file,contact.contact_date,contact.contact_message) VALUES('".$user_name."','".$email."','".$file_name."',NOW(),'".$message."')";

            $result = mysql_query($sql,$dbstamian);
            mysql_insert_id();
            $send = sendmail($user_name,$email,$message,$file_name,$file_tmp,$file_size,$file_type);

            if(!$result and !$send)
            {
                echo 'Echec de telechargement, Meri de renvoyer votre fichier';
            }
            else
            {
                if($file['file_attach']['error'] == 1)
                {
                    echo 'file upload max file size over limit php.ini';
                }
                elseif($file['file_attach']['error'] == 2)
                {
                    echo 'File Max_file_SIZE for form';
                }
                elseif($file['file_attach']['error'] == 3)
                {
                    echo 'upload file not a connect server';
                }
                elseif($file['file_attach']['error'] == 4)
                {
                    echo 'Not a file';
                }
                elseif($file['file_attach']['error'] == 0)
                {
                    @move_uploaded_file($file_tmp,$file_dir.$file_name);  
                    echo "Merci votre fichier a été envoyé";   
                }
            }

        }
        else
        {
            echo 'Echec, votre fichier doit etre au format pdf';
        }
    }
}

?>
