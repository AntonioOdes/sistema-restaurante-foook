<?php
$correo = $_POST['email'];
echo $correo;


$correo = $_POST["email"];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
try {
  
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sebapradenas2203@gmail.com';
    $mail->Password = 'mgaysfvhrmikcvmb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('sebapradenas2203@gmail.com', 'food ok');
    $mail->addAddress($correo, 'cliente');
    
    $mail->Subject = 'Asunto del Correo';
    $mail->Body = 'Contenido del correo electrónico.';
    $mail->addStringAttachment($pdfContent, 'mi_primer_pdf.pdf', 'base64', 'application/pdf');

    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}


require '../../fpdf186/fpdf.php';
class PDF extends FPDF {
  function Header() {
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(0, 10, '¡Hola, este es tu primer PDF!', 0, 1, 'C');
  }

  function Footer() {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
  }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, '¡Bienvenido a FPDF!', 0, 1);
$pdf->Cell(0, 10, 'Este es tu primer archivo PDF generado con PHP y FPDF.', 0, 1);

ob_end_clean();

$pdf->Output('mi_primer_pdf.pdf', 'D');

echo 'Se ha creado el archivo PDF: mi_primer_pdf.pdf';

?>