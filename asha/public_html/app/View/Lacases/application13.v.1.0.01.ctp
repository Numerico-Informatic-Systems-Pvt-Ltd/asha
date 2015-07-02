<?php
//$fpdf=new FPDF();
$fpdf->AddPage();
//$fpdf->Header();
$fpdf->SetFont('Times','',8);
//$fpdf->Ln(10);
//$fpdf->Line(0.7,3.6,0.7,20.7); //vartical line 1
$fpdf->Line(0.7,3.6,20,3.6); //Horizental line 1
$fpdf->Line(5.0,3.6,5.0,24); //vartical line 1
$fpdf->SetLeftMargin(5.1);	//set the margin of left side

#============ Header =====================

$fpdf->SetFont('Times','',16);
$fpdf->Text(9.5,1.7,'FORM 13');
$fpdf->SetFont('Times','',11);
$fpdf->Text(8.8,2.2,'[See Paragraph No. 60]');
$fpdf->SetFont('Times','',8);
$fpdf->Text(8.9,2.7,"L.A. Case No. ".strtoupper($lacase['Lacase']['la_case_number']));
$fpdf->Text(5.8,3.3,"Proceedings under Section 9(3A)/9(3B) of Land Acquisition Amendment Act 1997, read with 1999.");
	
#============ left Hand Side =============

$fpdf->SetFont('Times','',8);
$fpdf->Text(0.7,4,'L.A. Case No.');
$fpdf->Text(0.7,4.4,'Mouza');
$fpdf->Text(0.7,5,'Name of Project');
$fpdf->Text(0.7,5.4,'Name of the R.B.');
$fpdf->Text(0.7,5.8,'Name of the Mouza(s)');
$fpdf->Text(0.7,6.4,'Tentative Meterial Date');
$fpdf->Text(0.7,6.8,'Date of Possession');
$fpdf->Text(0.7,7.2,'Date of 80% Payment');
$fpdf->Text(0.7,7.6,'Tentative Date of Award');

$fpdf->Text(0.7,8.4,'Description of Land');

$fpdf->Text(0.7,11.8,'Basis of Calculation');

$fpdf->Text(0.7,19,'Additional Compensation');

$fpdf->Text(0.7,22.1,'Solatium');

$fpdf->Text(0.7,22.6,'Bargader');

$fpdf->Text(0.7,23.1,'Total Awarded Ammount');

#============ left Hand Side End =============

#============ Right Hand Side =============
	$fpdf->Text(5.2,4,strtoupper($lacase['Lacase']['la_case_number']));
	$fpdf->Text(5.2,4.4,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
	strtoupper($lacase['Lacase']['jl_number']).', PS. '.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
	strtoupper($lacase['Lacase']['district']));
	$fpdf->Text(5.2,5,strtoupper($lacase['Lacase']['project']));
	$fpdf->Text(5.2,5.4,'');
	$fpdf->Text(5.2,5.8,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
	strtoupper($lacase['Lacase']['jl_number']).', PS. '.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
	strtoupper($lacase['Lacase']['district']));
	$fpdf->Text(5.2,6.4,date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])));
	$fpdf->Text(5.2,6.8,date('d.m.Y',strtotime($lacase['Lacase']['possession_date'])));
	$fpdf->Text(5.2,7.2,date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_from'])));
	$fpdf->Text(5.2,7.6,date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to'])));
	$fpdf->Text(5.2,8.4,'MOUZA -'.strtoupper($lacase['Lacase']['mouza']).', J.L. NO. '.
	strtoupper($lacase['Lacase']['jl_number']).', PS. '.strtoupper($lacase['Lacase']['police_station']).', DIST. '.
	strtoupper($lacase['Lacase']['district']));
	//$fpdf->Text(5.2,8.8,'Full Plot No.');
	/*$fpdf->Text(7.2,8.8,wordwrap('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',15,"\n",TRUE));*/
	$fpdf->ln(7.5);
	$full_land=$part_land=array();
	foreach($lacase['Land'] as $land)
	{
		if($land['status']=='Full')
			$full_land[]=$land['rsplot_no'];
		else
			$part_land[]=$land['rsplot_no'];
	}
	
	$fpdf->MultiCell(15,0.5,'Full Plot No.  '.implode($full_land,", "),0);
	//$fpdf->Text(5.2,12,'Part Plot No.');
	//$fpdf->ln(0.1);
	$fpdf->MultiCell(15,0.5,'Part Plot No.  '.implode($part_land,", "),0);
	
	$fpdf->ln(1.7);
	$fpdf->Cell(3.4,1,'',1,0);
	//$fpdf->Cell(6.8,1,'',1,0);


	$possession_date=date('d.m.Y',strtotime($lacase['Lacase']['possession_date']));
	$perior_transative_metitial_date= date('d.m.Y', strtotime('-1 day', strtotime($lacase['Lacase']['publication_date'])));
	$fpdf->MultiCell(6.5,0.5,'The date of possession to prior tentative metirial date('.date('d.m.Y',strtotime($lacase['Lacase']['possession_date'])).' to '.$perior_transative_metitial_date.')',1,1);
	
	$current_y = $fpdf->GetY();
	$current_x = $fpdf->GetX();
	//$cell_width = 5;
	$fpdf->SetXY($current_x + 9.9, $current_y-1);

	$fpdf->MultiCell(5.4,0.5,'The tentative metirial date to date of Award('.date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])).' to '.date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to'])).')',1,1);
	//$fpdf->Cell(5.5,1,'xxxx',1,'L');
	
	#====== Table start here ================
	
	$fpdf->Cell(1.9,0.5,'Class',1,0,'C');
	$fpdf->Cell(1.5,0.5,'Acquir',1,0,'C');
	$fpdf->Cell(1.6,0.5,'Old rate',1,0,'C');
	$fpdf->Cell(1.6,0.5,'Old value',1,0,'C');
	$fpdf->Cell(1.6,0.5,'Paid 80%',1,0,'C');
	$fpdf->Cell(1.7,0.5,'Old value',1,0,'C');
	$fpdf->Cell(1.8,0.5,'New rate',1,0,'C');
	$fpdf->Cell(1.8,0.5,'New value',1,0,'C');
	$fpdf->Cell(1.8,0.5,'New value',1,1,'C');
	
	#loop start here
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
	$structure_eighty_total=0;
	$panbaroz_total=0;
	$panbaroz_eighty_total=0;
	foreach($lands as $land)
	{
		$fpdf->Cell(1.9,0.5,$land['Classification']['name'],1,0,'C');
		$fpdf->Cell(1.5,0.5,number_format($land[0]['sum(`Land`.`acquisitioned_areas_value`)'],3),1,0,'C');
		$total_aqu=$total_aqu+number_format($land[0]['sum(`Land`.`acquisitioned_areas_value`)'],3);
		$fpdf->Cell(1.6,0.5,number_format($land['Classification']['old_value'],2),1,0,'R');
		$old_value=$land[0]['sum(`Land`.`acquisitioned_areas_value`)']*$land['Classification']['old_value'];
		$total_old_value=$total_old_value+$old_value;
		$fpdf->Cell(1.6,0.5,number_format($old_value,2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($estimates[$i][0][0]['sum(`Estimate`.`eighty_paid`)'],2),1,0,'R');
		$total_eighty=$total_eighty+$estimates[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		$eighty_paid_old=$old_value-$estimates[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		$total_eighty_paid_old=$total_eighty_paid_old+$eighty_paid_old;
		$fpdf->Cell(1.7,0.5,number_format($eighty_paid_old,2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format($land['Classification']['new_value'],2),1,0,'R');
		$new_value=$land[0]['sum(`Land`.`acquisitioned_areas_value`)']*$land['Classification']['new_value'];
		$total_new_value=$total_new_value+$new_value;
		$fpdf->Cell(1.8,0.5,number_format($new_value,2),1,0,'R');
		$eighty_paid_new=$new_value-$estimates[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		$total_eighty_paid_new=$total_eighty_paid_new+$eighty_paid_new;
		$fpdf->Cell(1.8,0.5,number_format($eighty_paid_new,2),1,1,'R');
		//if($estimates_tree[$i][0][0]['sum(old_value)'])
		if($estimates_tree)
		{
			$total_old_value=$total_old_value+$estimates_tree[$i][0][0]['sum(old_value)'];
			$total_eighty=$total_eighty+$estimates_tree[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
			$total_eighty_paid_old=$total_eighty_paid_old+($estimates_tree[$i][0][0]['sum(old_value)']-$estimates_tree[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			//$total_eighty_paid_old=$total_eighty_paid_old+$eighty_paid_old;
			$total_new_value=$total_new_value+$estimates_tree[$i][0][0]['sum(old_value)'];
			$total_eighty_paid_new=$total_eighty_paid_new+($estimates_tree[$i][0][0]['sum(old_value)']-$estimates_tree[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			$tree_total=$tree_total+$estimates_tree[$i][0][0]['sum(old_value)'];
			$tree_eighty_total=$tree_eighty_total+$estimates_tree[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		}
		//if($estimates_structure[$i][0][0]['sum(old_value)'])
		if($estimates_structure)
		{
			$total_old_value=$total_old_value+$estimates_structure[$i][0][0]['sum(old_value)'];
			$total_eighty=$total_eighty+$estimates_structure[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
			$total_eighty_paid_old=$total_eighty_paid_old+($estimates_structure[$i][0][0]['sum(old_value)']-$estimates_structure[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			$total_new_value=$total_new_value+$estimates_structure[$i][0][0]['sum(old_value)'];
			$total_eighty_paid_new=$total_eighty_paid_new+($estimates_structure[$i][0][0]['sum(old_value)']-$estimates_structure[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			$structure_total=$structure_total+$estimates_structure[$i][0][0]['sum(old_value)'];
			$structure_eighty_total=$structure_eighty_total+$estimates_structure[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		}
		//if($estimates_panbaroz[$i][0][0]['sum(old_value)'])
		if($estimates_panbaroz)
		{
			$total_old_value=$total_old_value+$estimates_panbaroz[$i][0][0]['sum(old_value)'];
			$total_eighty=$total_eighty+$estimates_panbaroz[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
			$total_eighty_paid_old=$total_eighty_paid_old+($estimates_panbaroz[$i][0][0]['sum(old_value)']-$estimates_panbaroz[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			$total_new_value=$total_new_value+$estimates_panbaroz[$i][0][0]['sum(old_value)'];
			$total_eighty_paid_new=$total_eighty_paid_new+($estimates_panbaroz[$i][0][0]['sum(old_value)']-$estimates_panbaroz[$i][0][0]['sum(`Estimate`.`eighty_paid`)']);
			$panbaroz_total=$panbaroz_total+$estimates_panbaroz[$i][0][0]['sum(old_value)'];
			$panbaroz_eighty_total=$panbaroz_eighty_total+$estimates_panbaroz[$i][0][0]['sum(`Estimate`.`eighty_paid`)'];
		}
		$i++;
	}
	if($tree_total)
	{
		$fpdf->Cell(1.9,0.5,'Tree',1,0,'C');
		$fpdf->Cell(1.5,0.5,'',1,0,'C');
		$fpdf->Cell(1.6,0.5,'',1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($tree_total,2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($tree_eighty_total,2),1,0,'R');
		$fpdf->Cell(1.7,0.5,number_format(($tree_total-$tree_eighty_total),2),1,0,'R');
		$fpdf->Cell(1.8,0.5,'',1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format($tree_total,2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format(($tree_total-$tree_eighty_total),2),1,1,'R');
	}
	if($structure_total)
	{
		$fpdf->Cell(1.9,0.5,'Structure',1,0,'C');
		$fpdf->Cell(1.5,0.5,'',1,0,'C');
		$fpdf->Cell(1.6,0.5,'',1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($structure_total,2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($structure_eighty_total,2),1,0,'R');
		$fpdf->Cell(1.7,0.5,number_format(($structure_total-$tree_eighty_total),2),1,0,'R');
		$fpdf->Cell(1.8,0.5,'',1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format($structure_total,2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format(($structure_total-$structure_eighty_total),2),1,1,'R');
	}
	if($panbaroz_total)
	{
		$fpdf->Cell(1.9,0.5,'Panbaroz',1,0,'C');
		$fpdf->Cell(1.5,0.5,'',1,0,'C');
		$fpdf->Cell(1.6,0.5,'',1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($panbaroz_total,2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($panbaroz_eighty_total,2),1,0,'R');
		$fpdf->Cell(1.7,0.5,number_format(($panbaroz_total-$tree_eighty_total),2),1,0,'R');
		$fpdf->Cell(1.8,0.5,'',1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format($panbaroz_total,2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format(($panbaroz_total-$panbaroz_eighty_total),2),1,1,'R');
	}
		$fpdf->Cell(1.9,0.5,'Total',1,0,'C');
		$fpdf->Cell(1.5,0.5,$total_aqu,1,0,'C');
		$fpdf->Cell(1.6,0.5,'',1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($total_old_value,2),1,0,'R');
		$fpdf->Cell(1.6,0.5,number_format($total_eighty,2),1,0,'R');
		$fpdf->Cell(1.7,0.5,number_format(($total_eighty_paid_old),2),1,0,'R');
		$fpdf->Cell(1.8,0.5,'',1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format($total_new_value,2),1,0,'R');
		$fpdf->Cell(1.8,0.5,number_format(($total_eighty_paid_new),2),1,1,'R');
#==================End of table =================
	function Get_Date_Difference($start_date, $end_date)
    {		/* Substraction of Day */
			if(strtotime($start_date) > strtotime($end_date))
			{
				$t=$start_date;
				$start_date=$end_date;
				$end_date=$t;
			}
			$startDay=(int)(substr($start_date,8,2));
			$endDay=(int)(substr($end_date,8,2));
			/* Substraction of Month */
			$startMonth=substr($start_date,5,2);
			$endMonth=substr($end_date,5,2);
			/* Substraction of Year */
			$startYear=substr($start_date,0,4);
			$endYear=substr($end_date,0,4);
			/* Date Difference */
			$differenceDay=0;
			$differenceMonth=0;
			$differenceYear=0;
					
			if($endDay < $startDay )
			{
				$startDay=$endDay+30-$startDay;
				$differenceMonth=1;							
			}
			else
			{
				$startDay=$endDay-$startDay;		
				
			}		
			if($endMonth < $startMonth )
			{
				$startMonth = $endMonth + 12-$startMonth-$differenceMonth;
				$differenceYear=1;			
			}
			else
			{
				$startMonth=$endMonth-$startMonth-$differenceMonth;				
			}

			$startYear=$endYear-$startYear-$differenceYear;
			
			$total_time_involded = $startYear." Year ".$startMonth." Month ".$startDay." Day";
			$time_for_calculation = array($startYear,$startMonth,$startDay);
			$period = array('0'=>$total_time_involded,'1'=>$time_for_calculation);
			//$period=$total_time_involded;
			return $period;
		
/*        $diff = abs(strtotime($end_date) - strtotime($start_date));
        echo $diff;
		$years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years.' Years '.$months.' Month '.$days.' Days';
		*/
		
    }
	
	$fpdf->ln(3);
	$periodforAdditionalCompensation1 = Get_Date_Difference($lacase['Lacase']['possession_date'] ,date('Y-m-d', strtotime('0 day', strtotime($lacase['Lacase']['period_of_interest_from']))));
	
	$year = $periodforAdditionalCompensation1['1']['0'];
				$month = $periodforAdditionalCompensation1['1']['1'];
				$day =  $periodforAdditionalCompensation1['1']['2'];
				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp1=$total_old_value*$year*0.12;
	$period=$periodforAdditionalCompensation1[0];
	
	date('d.m.Y', strtotime('-1 day', strtotime($lacase['Lacase']['period_of_interest_from'])));
	$fpdf->MultiCell(13,0.5,'(1) The date of possession to prior date of 80% payment @ 12% p.a on Rs. '.number_format($total_old_value,2).' ie.'.date('d.m.Y',strtotime($lacase['Lacase']['possession_date'])).' to '.date('d.m.Y', strtotime('-1 day', strtotime($lacase['Lacase']['period_of_interest_from']))).' ('.$period.') =                        Rs. '.number_format($comp1,2),0,1);
	
	
	$periodforAdditionalCompensation2 = Get_Date_Difference($lacase['Lacase']['period_of_interest_from'] ,date('Y-m-d', strtotime('0 day', strtotime($lacase['Lacase']['publication_date']))));
	$year = $periodforAdditionalCompensation2['1']['0'];
				$month = $periodforAdditionalCompensation2['1']['1'];
				$day =  $periodforAdditionalCompensation2['1']['2'];
				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp2=$total_eighty_paid_old*$year*0.12;
	$period=$periodforAdditionalCompensation2[0];
	
	$fpdf->MultiCell(13,0.5,'(2) From the date of 80% payment to prior tentative metirial date @ 12% p.a on Rs. '.number_format($total_eighty_paid_old,2).' ie.'.date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_from'])).' to '.date('d.m.Y', strtotime('0 day', strtotime($lacase['Lacase']['publication_date']))).' ('.$period.') =                       Rs. '.number_format($comp2,2),0,1);
	
	$periodforAdditionalCompensation3 = Get_Date_Difference($lacase['Lacase']['publication_date'] ,$lacase['Lacase']['period_of_interest_to']);
	$year = $periodforAdditionalCompensation3['1']['0'];
				$month = $periodforAdditionalCompensation3['1']['1'];
				$day =  $periodforAdditionalCompensation3['1']['2'];
				
				$m1= (($month)/12);
						$d1= (($day)/365);
						$year=(($year) + $m1 + $d1);
	$comp3=$total_eighty_paid_new*$year*0.12;
	$period=$periodforAdditionalCompensation3[0];
	
	
	$fpdf->MultiCell(13,0.5,'(3) From the tentative metirial date to tentative date of Award @ 12% p.a on Rs. '.number_format($total_eighty_paid_new,2).' ie.'.date('d.m.Y',strtotime($lacase['Lacase']['publication_date'])).' to '.date('d.m.Y',strtotime($lacase['Lacase']['period_of_interest_to'])).' ('.$period.') =                       Rs. '.number_format($comp3,2),0,1);
	
	$solatium=$total_new_value*0.3;
	$fpdf->MultiCell(13,0.5,'Solatium @ 30% on Rs. '.number_format($total_new_value,2).' =                       Rs. '.
	number_format($solatium,2),0,1);

	$fpdf->MultiCell(13,0.5,'Nil',0,1);
	$fpdf->MultiCell(13,0.5,number_format($total_new_value,2).' + '.number_format($comp1,2).' + '.
	number_format($comp2,2).' + '.number_format($comp3,2).' + '.number_format($solatium,2).' =  Rs. '.
	number_format(($total_new_value+$comp1+$comp2+$comp3+$solatium),2),0,1);
	$fpdf->SetFont('Times','',10);
	$fpdf->MultiCell(13,0.5,$c2w->translateInWords(round(($total_new_value+$comp1+$comp2+$comp3+$solatium),2)),0,1);
	$fpdf->SetFont('Times','',8);
#============ Right Hand Side End =============
#=====================Footer =================
$fpdf->Line(0.7,24,20,24); //Horizental line 1
$fpdf->Text(0.7,24.9,'Prepared By');
	$fpdf->Text(0.7,26.5,'Asstt. L.A.O, Tamluk');
	$fpdf->Text(0.9,26.8,'Purba Midnapore');
	$fpdf->Text(5,26.5,'Addl. L.A.O, Tamluk');
	$fpdf->Text(5.2,26.8,'Purba Midnapore');
	$fpdf->Text(9,26.5,'Spl. Land Acq Off, Tamluk');
	$fpdf->Text(9.4,26.8,'Purba Midnapore');
	$fpdf->Text(13,26.5,'Add. Dist Magst(LA), Tamluk');
	$fpdf->Text(13.5,26.8,'Purba Midnapore');
	$fpdf->Text(17,26.5,'Dist Magistrate & Collector');
	$fpdf->Text(17.1,26.8,'Tamluk, Purba Midnapore');
//$fpdf->Cell(4,3.7,'XXXXXXXXXXXXXXXXXXXXXXXXXX',1,0);

//$fpdf->Cell(0.8,3.7,'1',1,1);
$fpdf->Output();
?>