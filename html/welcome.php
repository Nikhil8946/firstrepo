<?php

use PHPMailer\PHPMailer\PHPMailer;


require 'vendor/autoload.php';

class sendmail
{
    public $mail;
    public function __construct(PHPMailer $mail)
    {
        $this->mail = $mail;
    }
    public function amethod()
    {

        $this->mail->Host = "smtp.gmail.com";
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port = "587";
        $this->mail->Username = "nikhil.khandelwal@innoraft.com";
        $this->mail->Password = "ifnmekwcyymauztx";
        $this->mail->Subject = "test email";
        $this->mail->setFrom("nikhil.khandelwal@innoraft.com");
        $this->mail->Body = "name=" . $_POST['name'] . " email=" . $_POST['email'] . " phone=" . $_POST['phone'];


        $this->mail->addAddress("nikhilkhandelwal608@gmail.com");
        $this->mail->send();
        $this->mail->smtpClose();
    }
    public function downloadfiles()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "hi";
            $loc = $_POST['name'] . ".docx";
            $data = $_POST['name'];
            $data1 = $_POST['phone'];
            $data2 = $_POST['email'];
            $fp = fopen($loc, 'a');
            echo $data2;
            fwrite($fp, $data);

            fwrite($fp, $data1);
            fwrite($fp, $data2);

            fclose($fp);

            $filename = $_POST['name'] . ".docx";
            $file = $filename;
            if ($email = "") {
                die('file not found');
            } else {
                header('Content-type: application/octet-stream');
                header("Content-Type: " . mime_content_type($file));
                header("Content-Disposition: attachment; filename=" . $filename);
                while (ob_get_level()) {
                    ob_end_clean();
                }
                readfile($file);
            }
        }
    }
}
if (isset($_POST['submit_order'])) {
    $mail = new PHPMailer(true);
    $myobj = new sendmail($mail);
    $myobj->amethod();
    $myobj->downloadfiles();
}
