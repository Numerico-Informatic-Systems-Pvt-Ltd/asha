<?php

//$fpdf->AddPage();
//$fpdf->Header();
$fpdf->SetFont('Times','',8);
//$fpdf->Ln(10); 

$i=0; 
$x_axis=0.5;
$y_axis=9.5;
$total=0.00;

// $orientation='', $size='',$header_text='', $header_location = null,$footer_text = null
// $fpdf->AddPage('','',$lacase,'',$footer_text = 'cc');

	$total_carried_over=0;
	//foreach($lacase['Land'] as $land):

	foreach($owners as $owner):
	//while($i<=25)
	//{
		
		if($i%10 == 0)
		{
			if($i!=0)
				//$fpdf->Text($x_axis+5.7,26.7,$total.'.00');
			$fpdf->AddPage('','',$lacase,'',$footer_text = 'cc');
			
			$fpdf->Line(0.5,7.5,19,7.5); //horizontal line - top of column header
			
			$fpdf->Line(2.4,7.5,2.4,22); //vartical line 1
			$fpdf->Line(9,7.5,9,22); //vartical line 2
			$fpdf->Line(10.5,7.5,10.5,22); //vartical line 3
			$fpdf->Line(12.8,8.9,12.8,22); //vartical line 3
			$fpdf->Line(14,7.5,14,22); //vartical line 3

			// Col Heading [1]
			$fpdf->Text(0.5,7.8,'Serial number');
			$fpdf->Text(0.7,8.1,'in award');
			$fpdf->Text(0.6,8.4,'Statement');
			$fpdf->Text(1,8.7,'1');
			

			// Col Heading [2]
			$fpdf->Text(4.5,8,'Name of Payee');
			$fpdf->Text(5.5,8.5,'2');
			
			// Col Heading [3]
			$fpdf->Text(9.3,8,'Area of');
			$fpdf->Text(9.4,8.3,'Land');
			$fpdf->Text(9.6,8.6,'3');


			// Col Heading [4]
			$fpdf->Text(11.4,8,'Amount Paid');
			$fpdf->Text(12.0,8.6,'4');
			$fpdf->Text(11.4,9.2,'Rs.');
			$fpdf->Text(13.2,9.2,'P.');


			// Col Heading [5]
			$fpdf->Text(14.5,8,'Signature of the Payee and');
			$fpdf->Text(15,8.3,'Date of Payment');
			$fpdf->Text(16,8.6,'5');


			$fpdf->Line(0.5,8.9,19,8.9); //horizontal line - bottom of column header

			
		}
		
			if($i == 0)
			 	$fpdf->Text($x_axis,$y_axis,$i+1);	/*First line of the page */
			else
				$fpdf->Text($x_axis,$y_axis+=0.6,$i+1);

			$fpdf->Text($x_axis+=2,$y_axis,strtoupper($owner['Owner']['name']));
			
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['relation'].' '.$owner['Owner']['parent']));
			
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['address']));

			if($owner['Owner']['varified']==1)
							$fpdf->Text($x_axis,$y_axis+=0.3,'V');
					else
						$fpdf->Text($x_axis,$y_axis+=0.3,'NV');

			$x_axis = 0.5;
			$i++;
			
	endforeach;


		$fpdf->Line(10.5,28.5,14,28.5); //horizontal line - on top of Total field
		$fpdf->Text(9.4,28.9,'Total');
		
		
		$fpdf->Text(15.5,30.6,'L.A. Collector,');	
		$fpdf->Text(15.5,30.9,'Purba Medinipur');	
			
		/* Last Margin Text */
		$fpdf->Text(13.8,25.5,'Award Sl. Nos.........');
		$fpdf->Text(13.8,25.8,'Identified by me and given');
		$fpdf->Text(13.8,26.1,'signature/L.T.I. in my presence');
	
		$fpdf->SetLeftMargin(4);
//		$this->set('title_for_layout','ASHA_cc_'.date("Y-m-d-h-m-s"));
		$fpdf->Output();
?>