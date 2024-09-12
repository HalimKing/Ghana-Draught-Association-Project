<?php
// Path to the existing Excel file
include('../inc/session.php');
if(isset($_GET['playersBulkUpload']) && !empty(trim($_GET['playersBulkUpload']))) {
    $file = '../files/bulk_template.xlsx';

    // Check if the file exists
    if (file_exists($file)) {
        // Set headers to prompt the browser to download the file
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        // Clear output buffer
        ob_clean();
        flush();

        // Read the file and output its contents
        readfile($file);
        exit;
    } else {
        // If the file does not exist, display an error message
        echo "File not found.";
    }
}else {
    return back();
}




?>