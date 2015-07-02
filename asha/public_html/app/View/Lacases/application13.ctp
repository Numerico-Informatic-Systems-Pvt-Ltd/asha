<?php	
	$left_column = 0.7;
	$right_column = 5.2;
	$y_axis = 1.7;
	$fpdf->AddPage();
	$fpdf->SetFont('Times','',8);
		$fpdf->Line(0.7,3.6,20,3.6); //Horizental line 1
		$fpdf->Line(5.0,3.6,5.0,27.5); //vartical line 1
		$fpdf->SetLeftMargin(5.1);	//set the margin of left side
		
		#============ Header =====================
		
		$fpdf->SetFont('Times','',16);
		$fpdf->Text($left_column+8.8,$y_axis,'FORM 13');
		$fpdf->SetFont('Times','',11);
		$fpdf->Text($left_column + 8.1,$y_axis +=  0.5,'[See Paragraph No. 60]');
		$fpdf->SetFont('Times','',8);
		$fpdf->Text($left_column + 7.5,$y_axis+=0.5,"L.A. Case No. ".strtoupper($lacase['Lacase']['la_case_number']));  
		$fpdf->Text(5.8,3.3,"Proceedings under Section 9(3A)/9(3B) of 
								Land Acquisition Amendment Act 1997, read with 1999.");
		
		#============ left Hand Side =============
	
		$fpdf->SetFont('Times','',8);
		$fpdf->Text($left_column,$y_axis+=1.3,'L.A. Case No.');
		$fpdf->Text($right_column,$y_axis,strtoupper($lacase['Lacase']['la_case_number']));
		
		$fpdf->Text($left_column,$y_axis+=0.4,'Mouza');
		$fpdf->Text($right_column,$y_axis,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
		strtoupper($lacase['Lacase']['jl_number']).', PS. '
					.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
		strtoupper($lacase['Lacase']['district']));
		
		$fpdf->Text($left_column,$y_axis+=0.6,'Name of Project');
		$fpdf->Text($right_column,$y_axis,strtoupper($lacase['Lacase']['project']));
			
		
		$fpdf->Text($left_column,$y_axis+=0.4,'Name of the R.B.');
		//$fpdf->Text(5.2,5.4,'');
		
		$fpdf->Text($left_column,$y_axis+=0.4,'Name of the Mouza(s)');
		$fpdf->Text($right_column,$y_axis,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
		strtoupper($lacase['Lacase']['jl_number']).', PS. '
					.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
		strtoupper($lacase['Lacase']['district']));
		
		
		$fpdf->Text($left_column,$y_axis+=0.6,'Tentative Material Date');
		$fpdf->Text($right_column,$y_axis,date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])));
		
		$fpdf->Text($left_column,$y_axis+=0.4,'Date of Possession');
		$fpdf->Text($right_column,$y_axis,date('d.m.Y',strtotime($lacase['Lacase']['possession_date'])));

		$fpdf->Text($left_column,$y_axis+=0.4,'Date of 80% Payment');
		$fpdf->Text($right_column,$y_axis,date('d.m.Y',strtotime(
								$lacase['Lacase']['period_of_interest_from'])));

		$fpdf->Text($left_column,$y_axis+=0.4,'Tentative Date of Award');
		$fpdf->Text($right_column,$y_axis,date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to']))); //7.8
		
		$fpdf->Text($left_column,$y_axis+=0.4,'Description of Land');
		$fpdf->Text($right_column,$y_axis,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
		strtoupper($lacase['Lacase']['jl_number']).
					', PS. '.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
		strtoupper($lacase['Lacase']['district']));
		
		$fpdf->Text($left_column,$y_axis+=0.6,'Basis of Calculation');
		
		/* Printing of plot */
		$fpdf->ln($y_axis-1.3);
		$full_land=$part_land=array();
		foreach($lacase['Land'] as $land)
		{
			if($land['status']=='Full')
				$full_land[]=$land['rsplot_no'];
			else
				$part_land[]=$land['rsplot_no'];
		}
		$y_axis = $fpdf->GetY();
		//echo $y_axis; 	
		$fpdf->MultiCell($right_column+9.8,0.5,'Full Plot No.  '.implode($full_land,", "),0);
		$fpdf->MultiCell($right_column+9.8,0.5,'Part Plot No.  '.implode($part_land,", "),0);
		$y_axis+=1.5;
		/*  */
		$fpdf->ln(1.7);
		$fpdf->Cell($left_column+2.7,1,'',0,0);
		
		$possession_date=date('d.m.Y',strtotime($lacase['Lacase']['possession_date']));
		$perior_transative_metitial_date= date('d.m.Y', 
				strtotime('-1 day', strtotime($lacase['Lacase']['publication_date'])));
		$fpdf->MultiCell(6.5,0.5,'The date of possession to prior tentative metirial date('.
				date('d.m.Y',strtotime($lacase['Lacase']['possession_date'])).
				' to '.$perior_transative_metitial_date.')',1,1);
	
		$current_y = $fpdf->GetY();
		$current_x = $fpdf->GetX();
		$fpdf->SetXY($current_x + 9.9, $current_y-1);

		$fpdf->MultiCell(5.4,0.5,'The tentative metirial date to date of Award('.
			date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])).' to '.
			date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to'])).')',1,1);
	
		/* Segment of code to print table header of basic calculation */
		$fpdf->SetFont('Times','B',7);
		$fpdf->Cell(1.9,0.5,'Class',1,0,'C');
		$fpdf->Cell(1.5,0.5,'Acquir',1,0,'C');
		$fpdf->Cell(1.6,0.5,'Old rate',1,0,'C');
		$fpdf->Cell(1.6,0.5,'Old value',1,0,'C');
		$fpdf->Cell(1.6,0.5,'Paid 80%',1,0,'C');
		$fpdf->Cell(1.7,0.5,'Old - Pd 80%',1,0,'C');
		$fpdf->Cell(1.8,0.5,'New rate',1,0,'C');
		$fpdf->Cell(1.8,0.5,'New value',1,0,'C');
		$fpdf->Cell(1.8,0.5,'New - Pd 80%',1,1,'C');
		$fpdf->SetFont('Times','',6);
						
		$i=0;
	
		$total_aqu=0;
		$total_old_value=0;
		$total_eighty=0;
		$eighty_paid_old=0;
		$total_eighty_paid_old=0;
		$total_new_value=0;
		$eighty_paid_new=0;
		$total_eighty_paid_new=0;
		$tree_total=0;
		$tree_eighty_total=0;
		$structure_total=0;
		$structure_eighty_total = 0;
		$panbaroz_total = 0;
		$panbaroz_eighty_total = 0;
		$total_barga_value = 0;
	
	#loop start here
	
	//debug($lands);
		
/* 	$count_of_lands = count($lands); */
	
	function print_row($fpdf,$land) {	

		$fpdf->Cell(1.9,0.5,$land['LandClassification']['name'],1,0,'C');
		$fpdf->Cell(1.5,0.5,number_format((float)$land[0]['sum(acquisitioned_areas_value)'],3),1,0,'C');
		$fpdf->Cell(1.6,0.5,number_format((float)$land['Estimate']['old_rate'],2.0),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format((float)$land[0]['sum(old_value)'],2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format((float)$land[0]['sum(eighty_paid)'],
											2),1,0,'R');
		$fpdf->Cell(1.7,0.5,number_format((float)$land[0]['sum(old_eighty)'],2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format((float)$land['Estimate']['newrate'],2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format((float)$land[0]['sum(newvalue)'],2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format((float)$land[0]['sum(newvalue_tree_eighty)'],2),1,1,'R');
	}
	
	// Printing the rows in PDF file	
	foreach($landclassifications as $land)
	{	 
		 print_row($fpdf,$land);
	}
	// Now print column total
		
	$fpdf->SetFont('Times','B',7);
		print_row($fpdf,$total_of_lands['0']); 
	$fpdf->SetFont('Times','',7);
	
	$fpdf->SetFont('Times','B',7);
	
	//$fpdf->ln(2);
	$periodforAdditionalCompensation1 = $this->NisCalc->Get_Date_Difference($lacase['Lacase']['possession_date'] ,
			date('Y-m-d', strtotime('0 day', strtotime($lacase['Lacase']['period_of_interest_from']))));	
	$year = $periodforAdditionalCompensation1['1']['0'];
				$month = $periodforAdditionalCompensation1['1']['1'];
				$day =  $periodforAdditionalCompensation1['1']['2'];				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp1=$total_old_value*$year*0.12;
	$period=$periodforAdditionalCompensation1[0];
	
	date('d.m.Y', strtotime('-1 day', strtotime($lacase['Lacase']['period_of_interest_from'])));
	$fpdf->MultiCell(13,0.5,'(1) The date of possession to prior date of 80% payment @ 12% p.a on Rs. '.
				number_format((float)$total_of_lands['0']['0']['sum(old_value)'],2).' ie.'.date('d.m.Y',
				strtotime($lacase['Lacase']['possession_date'])).' to '.date('d.m.Y',
				strtotime('-1 day', strtotime($lacase['Lacase']['period_of_interest_from']))).
				' ('.$period.')',0,1);
				
	$y_axis = $fpdf->GetY();
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format((float)$plotEstimate['0']['0']['sum(interest1)'],2),0,1);
					
	
	
	$periodforAdditionalCompensation2 = $this->NisCalc->Get_Date_Difference($lacase['Lacase']['period_of_interest_from'] ,
			date('Y-m-d', strtotime('0 day', strtotime($lacase['Lacase']['publication_date']))));
	$year = $periodforAdditionalCompensation2['1']['0'];
				$month = $periodforAdditionalCompensation2['1']['1'];
				$day =  $periodforAdditionalCompensation2['1']['2'];
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp2=$total_eighty_paid_old*$year*0.12;
	$period=$periodforAdditionalCompensation2[0];

	$y_axis = $fpdf->GetY();
	$fpdf->Text($left_column,$y_axis-.8,'Additional Compensation');
	
		
	$fpdf->MultiCell(13,0.5,'(2) From the date of 80% payment to prior tentative material date @ 12% p.a 
			on Rs. '.number_format((float)$total_of_lands['0']['0']['sum(old_value)'],2).' ie.'.
			date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_from'])).
			' to '.date('d.m.Y', strtotime('0 day', 
			strtotime($lacase['Lacase']['publication_date']))).
			' ('.$period.')',0,1);
			
	$y_axis = $fpdf->GetY();
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format((float)$comp2,2),0,1);
			
			
	
	$periodforAdditionalCompensation3 = 
			$this->NisCalc->Get_Date_Difference($lacase['Lacase']['publication_date'],
			$lacase['Lacase']['period_of_interest_to']);
	$year = $periodforAdditionalCompensation3['1']['0'];
				$month = $periodforAdditionalCompensation3['1']['1'];
				$day =  $periodforAdditionalCompensation3['1']['2'];
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp3=$total_eighty_paid_new*$year*0.12;
	$period=$periodforAdditionalCompensation3[0];
	
	$fpdf->MultiCell(13,0.5,'(3) From the tentative metirial date to tentative date of Award @ 12% 
				p.a on Rs. '.number_format((float)$total_of_lands['0']['0']['sum(newvalue)'],2).' ie.'.
				date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])).
				' to '.date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to'])).
				' ('.$period.')',0,1);	

	
	$y_axis = $fpdf->GetY();
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format($plotEstimate['0']['0']['sum(interest3)'],2),0,1);
	
	
	$solatium=$total_new_value*0.3;
	$y_axis = $fpdf->GetY();
	$y_axis+=0.2;
	$fpdf->Text($left_column,$y_axis,'Solatium');	
	$fpdf->MultiCell(13,0.5,'Solatium @ 30% on Rs. ',0,1);
	$y_axis = $fpdf->GetY();
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format((float)$plotEstimate['0']['0']['sum(solatium)'],2),0,1);
	
	

	/* Barga */
	$y_axis = $fpdf->GetY();
	$y_axis+=0.2;
	$fpdf->Text($left_column,$y_axis,'Bargder');
	//debug($est_barga[0][0]['sum(value)']);	
	$fpdf->MultiCell(13,0.5,'Total Barga Amount  ',0,1);
	$y_axis = $fpdf->GetY();
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format((float)$est_barga[0][0]['sum(value)'],2),0,1);
	
	/* End of Barga */

	

	$y_axis = $fpdf->GetY();
	$fpdf->Text($left_column,$y_axis+0.3,'Total Awarded Amount');
$fpdf->MultiCell(20,0.5,number_format((float)$total_of_lands['0']['0']['sum(newvalue)'],2).' + '.		number_format((float)$plotEstimate['0']['0']['sum(interest1)'],2).' + '.
	number_format((float)$plotEstimate['0']['0']['sum(interest2)'],2).
	' + '.number_format((float)$plotEstimate['0']['0']['sum(interest3)'],2).
	' + '.number_format($plotEstimate['0']['0']['sum(solatium)'],2).' + '.
	number_format($est_barga[0][0]['sum(value)'],2),0,1);
	
	$y_axis = $fpdf->GetY();
	$grand_total = $total_of_lands['0']['0']['sum(newvalue)']+
									$plotEstimate['0']['0']['sum(interest1)']+
									$plotEstimate['0']['0']['sum(interest2)']+
									$plotEstimate['0']['0']['sum(interest3)']+
									$plotEstimate['0']['0']['sum(solatium)']+					
									$est_barga[0][0]['sum(value)'];
	$fpdf->Text($right_column+12,
				$y_axis-0.1,' = Rs. '.number_format((float)$grand_total,2),0,1);
				
	$y_axis = $fpdf->GetY();
	$y_axis+=0.3;
	$fpdf->Text($left_column,$y_axis,'80% Paid, if any');
	//$fpdf->MultiCell(13,0.5,"Rs.".$total_eighty);
	
	
		$fpdf->Text($right_column+12,
				$y_axis,' = Rs. '.number_format((float)$total_of_lands['0']['0']['sum(eighty_paid)'],2),0,1);
	
	//$y_axis = $fpdf->GetY();	
	$fpdf->Text($left_column,$y_axis+0.8,'Net amount to be paid');
	
	
	//$y_axis = $fpdf->GetY();
	//$y_axis = $fpdf->GetY();
	//$y_axis=+0.3;
	$fpdf->Text($right_column+12,
				$y_axis+0.7,' = Rs. '.number_format((float)
					$grand_total-$total_of_lands['0']['0']['sum(eighty_paid)'],2),0,1);
	
	//debug($total_new_value+$comp1+$comp2+$comp3+$solatium+							$est_barga[0][0]['sum(value)']-$total_eighty);
	
	$fpdf->Ln(0.4);
	$fpdf->SetFont('Times','',8);
	$fpdf->MultiCell(13,1.1,$c2w->translateInWords(
					round(($grand_total-$total_of_lands['0']['0']['sum(eighty_paid)']),2)),0,1);
					
	$fpdf->SetFont('Times','',8);
#============ Right Hand Side End =============
#=====================Footer =================
$fpdf->Line($left_column,27.5,20,27.5); //Horizental line 1
//$fpdf->Text($left_column,25.1,'Prepared By');
	$fpdf->Text(0.7,28.5,'Asstt. L.A.O, Tamluk');
	$fpdf->Text(0.9,28.8,'Purba Midnapore');
	$fpdf->Text(5,28.5,'Addl. L.A.O, Tamluk');
	$fpdf->Text(5.2,28.8,'Purba Midnapore');
	$fpdf->Text(9,28.5,'Spl. Land Acq Off, Tamluk');
	$fpdf->Text(9.4,28.8,'Purba Midnapore');
	$fpdf->Text(13,28.5,'Add. Dist Magst(LA), Tamluk');
	$fpdf->Text(13.5,28.8,'Purba Midnapore');
	$fpdf->Text(17,28.5,'Dist Magistrate & Collector');
	$fpdf->Text(17.1,28.8,'Tamluk, Purba Midnapore');
//$fpdf->Cell(4,3.7,'XXXXXXXXXXXXXXXXXXXXXXXXXX',1,0);

//$fpdf->Cell(0.8,3.7,'1',1,1);



		#============ left Hand Side End =============

		#============ Right Hand Side =============
	//$cell_width = 5;
	//$fpdf->Cell(5.5,1,'xxxx',1,'L');
	
	#====== Table start here ================
$fpdf->Output();
?>