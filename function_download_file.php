<?php

function download_file($file_name)
{
    $dir = 'file/';

    switch(strtolower(substr(strrchr($file_name, '.'), 1)))
    {
        case 'pdf':   $mime = 'application/pdf';
            break;
        case 'doc':   $mime = 'application/doc';
            break;
        case 'docx':  $mime = 'application/docx';
            break;
        case 'jpg':   $mime = 'image/jpg';
            break;
        case 'jpeg':  $mime = 'image/jpeg';
            break;
        case 'png':   $mime = 'image/png';
            break;
        default:      $mime = 'application/force-download';
    }

    $file_ext = strtolower(end(explode('.',$file_name)));
    $file_allow = array(
        "jpeg",
        "jpg",
        "png",
        "pdf",
        "doc",
        "docx");

    if(in_array($file_ext,$file_allow) === true)
    {
        if(empty($file_name))
        {
            echo 'Sorry File null';
            exit(0);
        }
        else
        {
            if(file_exists($dir.$file_name))
            {
                if(is_file($dir.$file_name))
                {
                    header('Pragma: public');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($dir.$file_name)).' GMT');
                    header('Cache-Control: private',false);
                    header('Content-Type: '.$mime);
                    header('Content-Disposition: attachment; filename="'.basename($dir.$file_name).'"');
                    header('Content-Transfer-Encoding: binary');
                    header('Content-Length: '.filesize($dir.$file_name));
                    header('Connection: close');
                    readfile($dir.$file_name);
                    exit();
                }
                else
                {
                    echo 'Sorry not a file';
                    exit(0);
                }
            }
                else
                {
                    echo 'Sorry file is null';
                    exit(0);
                }
            }
        }
        else
        {
            echo 'Sorry download file document and image only';
            exit(0);
        }
}

?>
