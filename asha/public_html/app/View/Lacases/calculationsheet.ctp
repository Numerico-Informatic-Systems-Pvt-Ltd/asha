<?php
$fpdf->AddPage();			
$fpdf->SetFont('Arial','',10);
$fpdf->SetWidths(array(1,1,4.5,0.8,3,2,2.3,1,1,1.2,1.2,1.2,2,1.7,1.5,1.5,2,2,2.3,1.9,1.4,1.8,1.8));
$fpdf->Row(array("SL. NO","Plot No","Owner","S/W.D","S/O, W/O, D/O","ADDRESS","CLASS","Acq. Area","Old Rate","Old Value","Paid 80%","Old Value-80%","Int. on 10 @ 12%","Int on 12 @ 12%","New Rate","New Value","New Value-80%","Int on 17 @ 12%","Solatium @30% on 16","Total 13+14+17+18+19","lnd-Sh","Indiv. Amt","Remarks"));
$fpdf->Row(array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23"));
//Table with 20 rows and 4 columns
$fpdf->SetFont('Arial','',8);
srand(microtime()*1000000);
$i=1;

 	$plotEstimates = $this->requestAction("PlotEstimates/get_by_lacase_id/".$lacase['Lacase']['id']."/".$type);

	$total_value = 0.00;
	$total_paid_eighty = 0.00;
	$total_due = 0.00;
	
	foreach ($plotEstimates as $plotEstimate):
	
	$cur_plot_number = $plotEstimate['Land']['rsplot_no'];
	$cur_classification = $plotEstimate['Classification']['name'];

	$plotEstimateOwner['Estimate'] = $this->requestAction('estimates/get_by_plot_estimate/'.
	
														$plotEstimate['PlotEstimate']['id']."/".$type);

	if(!empty($plotEstimateOwner['Estimate'])):	
	$fpdf->Row(array("",
					$plotEstimate['Land']['rsplot_no'],
					"---------",
					"--",
					"---------",
					"---",
					$plotEstimate['Classification']['name'],
					$plotEstimate['PlotEstimate']['shared_area'],
					$plotEstimate['PlotEstimate']['old_rate'],
					$plotEstimate['PlotEstimate']['old_value'],
					number_format((float)$plotEstimate['PlotEstimate']['eighty_paid'],2),
					$plotEstimate['PlotEstimate']['old_eighty'],
					$plotEstimate['PlotEstimate']['interest1'],
					
					$plotEstimate['PlotEstimate']['interest2'],
					$plotEstimate['PlotEstimate']['newrate'],
					$plotEstimate['PlotEstimate']['newvalue'],
					$plotEstimate['PlotEstimate']['newvalue'] - $plotEstimate['PlotEstimate']['eighty_paid'],
					$plotEstimate['PlotEstimate']['interest3'],	
					$plotEstimate['PlotEstimate']['solatium'],
					$plotEstimate['PlotEstimate']['value'],
					"",
					"",
					""
					));
	
	$total_value 		+= $plotEstimate['PlotEstimate']['value'];
	$total_paid_eighty 	+= $plotEstimate['PlotEstimate']['eighty_paid'];;
	
	foreach($plotEstimateOwner['Estimate'] as $estimate):
	
		$fpdf->Row(array($i,
					$cur_plot_number,
					$estimate['Owner']['name'],
					$estimate['Owner']['relation'],
					$estimate['Owner']['parent'],
					$estimate['Owner']['address'],
					$cur_classification,
					$estimate['Estimate']['shared_area'],
					$estimate['Estimate']['old_rate'],
					$estimate['Estimate']['old_value'],
					number_format((float)$estimate['Estimate']['eighty_paid'],2),
					$estimate['Estimate']['old_eighty'],
					$estimate['Estimate']['interest1'],
					
					$estimate['Estimate']['interest2'],
					$estimate['Estimate']['newrate'],
					$estimate['Estimate']['newvalue'],
					$estimate['Estimate']['newvalue'] - $estimate['Estimate']['eighty_paid'],
					$estimate['Estimate']['interest3'],	
					$estimate['Estimate']['solatium'],
					"",
					$estimate['Estimate']['shared_area'],
					$estimate['Estimate']['value'],
					""
					));
		$i++;	
	endforeach;

		endif; // END OF if(!empty($plotEstimateOwner['Estimate'])
	endforeach;
	

	
/* 	debug($plotTotal); /* This field stores the total of all plots
						Information may be used to tally the result obtained by 
							applying recursive sum fucntion in calculationsheet.ctp
								file and the sum of records in the database */

/* Ref. LaCases::application13() */

$total_of_lands = $this->requestAction("Estimates/get_grand_total/".$lacase['Lacase']['id']."/".$type);

$grand_total = $total_of_lands['0']['newvalue']+
				$total_of_lands['0']['interest1']+
				$total_of_lands['0']['interest2']+
				$total_of_lands['0']['interest3']+
				$total_of_lands['0']['solatium'];

	if($type == 'Total Barga'):
		$grand_total = $total_of_lands['0']['value'];
	endif;
	 
$fpdf->SetFont('Arial','',6);
$fpdf->Row(array("","","","","","","","","","","","","","","","","","","","",
								"Total Rs.",$grand_total,""));
$fpdf->Row(array("","","","","","","","","","","","","","","","","","","","",
								"Paid 80% Rs.",$total_of_lands['0']['eighty_paid'],""));

$fpdf->Row(array("","","","","","","","","","","","","","","","","","","","",
								"Total Payable Rs.",$grand_total - $total_of_lands['0']['eighty_paid'],""));

$fpdf->Output();

?>