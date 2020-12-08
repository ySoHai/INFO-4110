<?php
if(isset($_REQUEST["file"])){
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $filepath = "../uploads/". $ext ."/". $file;

    /* No test for illegal characters such as "../" using the regular expression */

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush();
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	          die();
        }

}
?>
