    <?php
    require_once __DIR__ . '/../../app/FPDF/fpdf.php';
    require_once __DIR__ . '/../../app/database/database.php';
    require_once __DIR__ . '/../helper/hashing.php';
    $hash = new Hashing();
    $db = Database::getInstance();
    $con = $db->getmyDB();
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->addPage("P", "A4");
    $pdf->GetPageWidth();  // Width of Current Page
    $pdf->GetPageHeight(); // Height of Current Page
    $pdf->SetAutoPageBreak(true, 1);
    $pdf->SetTextColor(0, 0, 0);
    $print = isset($_GET['print']) ?  $_GET['print'] : NULL;
    $datas = $con->query("SELECT * FROM event INNER  JOIN  
                            join_event ON event.event_id=join_event.join_event_id 
                            INNER JOIN users ON 
                            join_event.user_id=users.id 
                            WHERE id = {$hash->unhash($print)} LIMIT 1")->fetchAll();

    ?>
    <?php foreach ($datas as $row) : ?>
       <?php $pdf->SetFont('Times', 'BI', 16); ?>
        <?php $pdf->Cell(0, -90,  strtoupper($row['name']), 0, true, 'C'); ?>
    <?php endforeach; ?>
    <?php
    $pdf->Ln();
    $pdf->Output();
    ?>