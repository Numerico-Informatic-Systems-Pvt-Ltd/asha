<?php
	$fpdf->SetFont('Times','',8);
	$i=0; 
	$total=0.00;
	$rows_per_page = 4;
	
	/* Setting margin left & right */
	
	$x = 1.7;
	$y = 2;
	$vertical_line_height = 22;
	$line_height = 0.3;
	
	foreach($owners as $owner):
	
		$x_axis=1.2;
		
		if($i%$rows_per_page == 0)  /*Page Header & Footer w/ Column Heading Printing Begins Here */
		{
									
			$fpdf->AddPage();
			$y_axis=6.5; /* Vertical height to print records fetched from database */
				
			###########################
			
			/** PRINTING PAGE HEADER */
			
			###########################
			$fpdf->Text($x,$y,'West Bengal Form No 2507');
			$fpdf->Text($x+8,2,'CC');
			$fpdf->Text($x+8,2.5,'(Cash/Cheque)');
			$fpdf->Text($x+10.8,1.3,'L.A. Case No. '.$lacase['Lacase']['la_case_number']);
			$fpdf->Text($x+10.8,2.0,'Mouza '.$lacase['Lacase']['mouza']);
			$fpdf->Text($x+10.8,2.5,'R.B. '.$lacase['Lacase']['requisitioning_body']);
			$fpdf->SetFont('Times','',20);
			$fpdf->Text($x+13.7,3.4,'P');
			
			$fpdf->SetFont('Times','',8);
	
			$fpdf->Line($x-1+0.5,$y+2,$x+18,$y+2); //horizontal line - top of column header
			
			$fpdf->Line($x+1.4,$y+2,$x+1.4,$y+2+$vertical_line_height); //vartical line 1
			$fpdf->Line($x+8,$y+2,$x+8,$y+2+$vertical_line_height); //vartical line 2
			$fpdf->Line($x+9.5,$y+2,$x+9.5,$y+2+$vertical_line_height); //vartical line 3
			$fpdf->Line($x+11.8,$y+3.5,$x+11.8,$y+2+$vertical_line_height); //vartical line 4
			$fpdf->Line($x+13,$y+2,$x+13,$y+2+$vertical_line_height); //vartical line 5

			// Col Heading [1]
			$fpdf->Text($x+0.5-1,$y+2.1+$line_height,'Serial number');
			$fpdf->Text($x+0.7-1,$y+2.1+$line_height*2,'in award');
			$fpdf->Text($x+0.6-1,$y+2.1+$line_height*3,'Statement');
			$fpdf->Text($x,$y+2.1+$line_height*4,'1');
			

			// Col Heading [2]
			$fpdf->Text($x+3.6,$y+2.1+$line_height,'Name of Payee');
			$fpdf->Text($x+4.5,$y+2.1+$line_height*2,'2');
			
			// Col Heading [3]
			$fpdf->Text($x+8.3,$y+2.1+$line_height,'Area of');
			$fpdf->Text($x+8.4,$y+2.1+$line_height*2,'Land');
			$fpdf->Text($x+8.6,$y+2.1+$line_height*3,'3');


			// Col Heading [4]
			$fpdf->Text($x+10.4,$y+2.1+$line_height,'Amount Paid');
			$fpdf->Text($x+11.0,$y+2.1+$line_height*2,'4');
			$fpdf->Text($x+10.4,$y+2.1+$line_height*6,'Rs.');
			$fpdf->Text($x+12.2,$y+2.1+$line_height*6,'P.');

			// Col Heading [5]
			$fpdf->Text($x+13.5,$y+2.1+$line_height,'Signature of the Payee and');
			$fpdf->Text($x+14,$y+2.1+$line_height*2,'Date of Payment');
			$fpdf->Text($x+15,$y+2.1+$line_height*3,'5');

			//horizontal line - bottom of column header
			$fpdf->Line($x+0.5-1,$y+2+$line_height*5,$x+18,$y+2+$line_height*5);
			//horizontal line - bottom of column header
			$fpdf->Line($x+0.5-1,$y+2+$line_height*7,$x+18,$y+2+$line_height*7); 		

			
			############################################
			
			/** END OF PRINTING PAGE HEADER */
			
			/** PRINTING PAGE FOOTER */
			
			############################################

			 //horizontal line - at the bottom
			 $fpdf->Line($x+0.5-1,$y+2+$vertical_line_height,$x+18,$y+2+$vertical_line_height);
			$fpdf->Text($x+2.0,$y+2+$vertical_line_height+$line_height,
						'Paid in my presence in cash / by cheque to the above persons the total sum of');
			$fpdf->Text($x+2.0,$y+2+$vertical_line_height+$line_height*4,'Rupees * .....................
			................................................................. only.');
			$fpdf->Text($x+2.0,$y+2+$vertical_line_height+$line_height*6,'Dated ........................
			
			.... 201   ');	
			$fpdf->Text($x+10.0,$y+2+$vertical_line_height+$line_height*10,'*in words');	

			############################################
			
			/** END OF PRINTING PAGE HEADER */
			
			############################################

			
		} /*Page Header & Footer w/ Column Heading Ends Here */
		
		
		/*Printing data By fetching records from database */
		
			if($i == 0)
			 	$fpdf->Text($x_axis+0.6,$y_axis,$i+1);	/*First line of the page */
			else
				$fpdf->Text($x_axis+0.6,$y_axis+=0.6,$i+1);

				$fpdf->Text($x_axis+=2,$y_axis,strtoupper($owner['Owner']['name']));
				
				/*Fetching grand total payable to each owner/bargadar*/
				$total_amount_payable = $this->requestAction(
					'estimates/get_by_owner_lacase_id/'
							.$owner['Owner']['id'].'/'.$owner['Owner']['lacase_id']
							);
				//debug($total_amount_payable);	
				
				$fpdf->Text($x+10.0,$y_axis,number_format($total_amount_payable['0']['0']['gTotal'],2));	
											
				$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['address']));

				if($owner['Owner']['varified']==1)
						$fpdf->Text($x_axis,$y_axis+=0.3,'V');
					else
						$fpdf->Text($x_axis,$y_axis+=0.3,'NV');

		/* End of printing records from database */	
		$y_axis += 3.3;
		$i++;	
		
	endforeach;

	$fpdf->Output();		
		
?>