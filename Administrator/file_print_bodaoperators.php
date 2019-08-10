<?php
/**
 * Created by PhpStorm.
 * User: leenock
 * Date: 01/11/2019
 * Time: 22:26
 */

require_once 'file_pdf/fpdf.php';
class Reports extends FPDF


{

    /*
     * ticket header
     *
     */
    public function SetTitle($title, $isUTF8=false)
    {
        // Title of document
        $this->metadata['Title'] = $isUTF8 ? $title : utf8_encode($title);
        $this->setCreator("lee Nock");
        $this->setAuthor("leenock");
        $this->setTitle('Sample Test Report Generation');
        $this->setSubject('leenock@gmail.com');
        $this->setKeywords('@leenock');
        $this->Close();
    }
    public function Header()

    {


        //$this= new FPDF('P','mm','A4');
        $this->SetAutoPageBreak(true,'0');
        // set image scale factor

       
        $this->Ln(15);
        $this->SetFont('Times','b','13');
        $this->Cell(0,25,'Boda boda Icheck System Operator Details',0,'1','C');



        $this->Ln(0);
        $this->SetFont('Times','I',11);
        $this->SetTextColor(25,24,33);
        $this->Cell(0,0,'Boda Operators Information details:....................................');
        // $this->Ln(18);
        $this->SetFont('Times', '', 10);
        $this->Ln(5);
        $this->setTextColor(255,255,255);
        $this->Cell(10, 5, "#", 1, 0, 'L',true,'0');
        $this->Cell(15, 5, "Firstname:", 1, 0, 'L',true);
		$this->Cell(15, 5, "Lastname:", 1, 0, 'L',true);
		$this->Cell(20, 5, "RefId:", 1, 0, 'L',true);
		$this->Cell(20, 5, "mobile:", 1, 0, 'L',true);
		$this->Cell(20, 5, "ID:", 1, 0, 'L',true);
		
       $this->Cell(20, 5, "PlateNu.", 1, 0, 'L',true);
        $this->Cell(10, 5, "Home", 1, 0, 'L',true);
        $this->Cell(30, 5, "Email:", 1, 0, 'L',true);
        $this->Cell(14, 5, "Account_status:", 1, 0, 'L',true);
       
        $this->Ln();


    }
    public function Footer()
    {
        $this->SetY(-10);
        $this->SetFontSize( 8);
        $this->AliasNbPages('{pages}');
        $this->SetTextColor(255,255,255);
        $this->Cell(45,10,"leenock@gmail.com",0,0,'L',true);
        $this->Cell(0, 10, 'Page '. $this->PageNo().'/{pages}', 0,0, 'C',true);

    }

    public function body($con)
    {

        $this->AddPage();
        $this->SetFont('Times', '', 10);
        $count=1;
        $query=mysqli_query($con,"select * from operators_personal_acc ORDER BY Count_id ASC");

        while($row=mysqli_fetch_array($query)){

            $this->Cell(10, 5, $count, 0, 0, 'L',false);
            $this->Cell(15, 5, $row['Firstname'], 0, 0, 'L');
            $this->Cell(15, 5, $row['Lastname'], 0, 0, 'L');
            $this->Cell(25, 5, $row['Operators_reference_id'], 0, 0, 'L');
			$this->Cell(20, 5, $row['Phonenumber'], 0, 0, 'L');
			$this->Cell(20, 5, $row['National_Id'], 0, 0, 'L');
			
		    $this->Cell(20, 5, $row['Boda_plate_number'], 0, 0, 'L');
		    $this->Cell(10, 5, $row['Hometown'], 0, 0, 'L');
		    $this->Cell(40, 5, $row['Email_Address'], 0, 0, 'L');
            $this->Cell(14, 5, $row['Account_status'], 0, 0, 'L');
            $this->Ln();
            

//            $this->Cell(30, 10,$row['ssu'], 0, 1, 'L');

            $count+=1;
        }



//
//        $this->SetY(-15);
//        $this->SetFont('Arial',8);
//        $this->Cell(0,10,'page'.$this->PageNo(),0,0,'C');
    }


}


require_once ('print_dbcoonect.php');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$report=new Reports();

$report->body($con);

$report->Output();
?>