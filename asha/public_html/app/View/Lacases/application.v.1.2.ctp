<?php
$fpdf->SetFont('Times','',8);

$i=0; 
$x_axis=5.2;
$y_axis=4.0;
$total=0.00;
$records_per_page = 5;
	$total_carried_over=0;
	
//	debug($owners);
	
	foreach($owners as $owner):
		
		if($i%$records_per_page == 0)
		{
			
			$fpdf->AddPage('','',$lacase);
			
			############ Printing Header ###################
	
			$fpdf->Text(9.5,1.7,'FROM 13 A');
			$fpdf->Text(9.0,2,'(See paragraph No. 94)');
			$fpdf->Text(9.1,2.3,'LAND AQUISITION');
		
			$fpdf->Text(8.5,2.7,'L.A. Case No. '. $lacase['Lacase']['la_case_number']);
			$fpdf->Text(5.5,3.0,$lacase['Lacase']['project']);
			
			$fpdf->Text(4.0,3.5,"Sl. No.");
			$fpdf->Text(4.9,3.5,"Owner & Compensation Details");
			$fpdf->Text(10.5,3.5,"Estimates (Rs.)");
			$fpdf->Text(14.5,3.5,"Verified/ Unverified");
		
			############ Done Printing Header #############
			
			$fpdf->Line(4,4.0,18,4); //horizental line 
		
			$fpdf->Line(4.9,4,4.9,27); //vartical line 1
			$fpdf->Line(10.5,4,10.5,27); //vartical line 2
			$fpdf->Line(12.5,4,12.5,27); //vartical line 3
			$fpdf->Line(13.5,4,13.5,27); //vartical line 3
			
			$x_axis=5.2;
			$y_axis=4.6;
			
			
			$fpdf->Line(4,26.3,18,26.3); //horizental line 
			
			
			$fpdf->Line(4,27,18,27); //horizental line 
			
			
			############### Printing Footer Text #########################
			
			$fpdf->Text(4.8,28,'Checked by');
			$fpdf->Text(7.9,28,'Asstt. LAO,');
			$fpdf->Text(9.9,28,'L.A. Collector,');
			$fpdf->Text(12.4,28,'ADM(LA)');
			$fpdf->Text(14.4,28,'Collector, Purba Madinipur');

			
			##############  Done Printing Footer Text ####################
			
		}
		
			/* Fetching and printing data */
			
			$fpdf->Text(4.2,$y_axis,$i+1);	
			
			$fpdf->Text($x_axis,$y_axis,strtoupper($owner['Owner']['name']));
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['relation'].' '.$owner['Owner']['parent']));
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['address']));
			$fpdf->Text($x_axis,$y_axis+=0.3,'Mz. '.strtoupper($owner['Land'][0]['mouja']));
			$fpdf->Text($x_axis,$y_axis+=0.3,'JL no. '.strtoupper($owner['Land'][0]['jl_no']));
			$k=$i;
			
			if($owner['Owner']['varified']==1)
				$fpdf->Text($x_axis+10,$y_axis,'V');
			else
				$fpdf->Text($x_axis+10,$y_axis,'NV');
						
			
			if(count($owner['LandsOwner']) > 1)
			{
					$j=0;
				
				foreach($owner['LandsOwner'] as $landowner)
				{
					$classification=$fpdf->requestAction('Classifications/getclassificationbyid/'.$owner['Land'][$j]['classification_id']);
					
					$estvalues=$fpdf->requestAction('Estimates/getbylandid/'.$owner['Land'][$j]['id'].'/'.$owner['Owner']['id']);
					
					$fpdf->Text($x_axis,$y_axis+=0.5,'PL. '.strtoupper($owner['Land'][$j]['rsplot_no']).', Ar. '.
					$owner['Land'][$j]['acquisitioned_areas_value'].' Acr, '.$classification['Classification']['name']);
					
					$fpdf->Text($x_axis,$y_axis+=0.3,'10 Thou.Sh: '.strtoupper($landowner['shared_area']));
					
					$fpdf->Text($x_axis,$y_axis+=0.3,'L.Rate: '.$classification['Classification']['new_value'].
					', L-Value: '.($sh_area*$classification['Classification']['new_value']));
					
					$solm=$addl_comp=0;
					
					foreach($estvalues as $estvalue)
					{
						if($estvalue['Estimate']['calculation_type']=='land')
						{
							$solm=$estvalue['Estimate']['solatium'];
							$addl_comp=$estvalue['Estimate']['interest1']+$estvalue['Estimate']['interest2']+$estvalue['Estimate']['interest3'];
						}
						if($estvalue['Estimate']['calculation_type']=='structure')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'S-Value: '.$estvalue['Estimate']['value']);
							$svalue=$estvalue['Estimate']['value'];
						}
						if($estvalue['Estimate']['calculation_type']=='tree')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'T-Value: '.$estvalue['Estimate']['value']);
							$tvalue=$estvalue['Estimate']['value'];
						}
						if($estvalue['Estimate']['calculation_type']=='pan-baroz')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'Pan-Boroz-Value: '.$estvalue['Estimate']['value']);
							$pvalue=$estvalue['Estimate']['value'];
						}
					}
					$fpdf->Text($x_axis,$y_axis+=0.3,'Solatium: '.$solm);
					$fpdf->Text($x_axis,$y_axis+=0.3,'Addl Comp.: '.$addl_comp);
					$total_plot_wise=($sh_area*$classification['Classification']['new_value'])+$svalue+$tvalue+$pvalue;
					$fpdf->Text($x_axis+5.7,$y_axis-1.5,$total_plot_wise);
					$total_carried_over+=$total_plot_wise;
					
					$j++;
					$i++;
					
			
					$y_axis+=0.2;
					if($i%5 == 0)
					{
						if($i!=0)
							//$fpdf->Text($x_axis+5.7,26.7,$total.'.00');
							$fpdf->AddPage();
							
							
							$fpdf->Line(4.9,3.5,4.9,27); //vartical line 1
							$fpdf->Line(10.5,3.5,10.5,27); //vartical line 2
							$fpdf->Line(12.5,3.5,12.5,27); //vartical line 3
							$fpdf->Line(13.5,3.5,13.5,27); //vartical line 3
							$x_axis=5.2;
							$y_axis=4.0;
							//$fpdf->Text(4.9,3.2,"Brought Forward **********");
							//$fpdf->Text(10.5,3.2,"Brought Forward Amount");
							$fpdf->Text($x_axis,26.7,'Carried Over *******');
							
							$fpdf->Line(4,27,18,27); //horizental line 
			
					}
					
				}
				$fpdf->Line(4,$y_axis,18,$y_axis); //horizental lione
				$fpdf->Text($x_axis,$y_axis+=0.4,'Total of '.strtoupper($owner['Owner']['name']));
				$fpdf->Text(4.2,$y_axis,$i);
				
				//$y_axis+=0.1;
			}
			else
			{
				$j=0;
				
				foreach($owner['LandsOwner'] as $landowner)
				{
					$classification=$this->requestAction('Classifications/getclassificationbyid/'.$owner['Land'][$j]['classification_id']);
					$estvalues=$this->requestAction('Estimates/getbylandid/'.$owner['Land'][$j]['id'].'/'.$owner['Owner']['id']);
					$fpdf->Text($x_axis,$y_axis+=0.5,'PL. '.strtoupper($owner['Land'][$j]['rsplot_no']).', Ar. '.
					$owner['Land'][$j]['acquisitioned_areas_value'].' Acr, '.$classification['Classification']['name']);
					$sh_area=($owner['Land'][$j]['acquisitioned_areas_value']*$landowner['shared_area'])/10000;
					$fpdf->Text($x_axis,$y_axis+=0.3,'10 Thou.Sh: '.strtoupper($landowner['shared_area']).', '.
					$sh_area.' Acres');
					$fpdf->Text($x_axis,$y_axis+=0.3,'L.Rate: '.$classification['Classification']['new_value'].
					', L-Value: '.($sh_area*$classification['Classification']['new_value']));
					$solm=$addl_comp=$svalue=$tvalue=$pvalue=0;
					foreach($estvalues as $estvalue)
					{
						if($estvalue['Estimate']['calculation_type']=='land')
						{
							$solm=$estvalue['Estimate']['solatium'];
							$addl_comp=$estvalue['Estimate']['interest1']+$estvalue['Estimate']['interest2']+$estvalue['Estimate']['interest3'];
						}
						if($estvalue['Estimate']['calculation_type']=='structure')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'S-Value: '.$estvalue['Estimate']['value']);
							$svalue=$estvalue['Estimate']['value'];
						}
						if($estvalue['Estimate']['calculation_type']=='tree')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'T-Value: '.$estvalue['Estimate']['value']);
							$tvalue=$estvalue['Estimate']['value'];
						}
						if($estvalue['Estimate']['calculation_type']=='pan-baroz')
						{
							$fpdf->Text($x_axis,$y_axis+=0.3,'Pan-Boroz-Value: '.$estvalue['Estimate']['value']);
							$pvalue=$estvalue['Estimate']['value'];
						}
					}
					$fpdf->Text($x_axis,$y_axis+=0.3,'Solatium: '.$solm);
					$fpdf->Text($x_axis,$y_axis+=0.3,'Addl Comp.: '.$addl_comp);
					$total_plot_wise=($sh_area*$classification['Classification']['new_value'])+$svalue+$tvalue+$pvalue;
					$fpdf->Text($x_axis+5.7,$y_axis-2.4,$total_plot_wise);
					$total_carried_over+=$total_plot_wise;
					$j++;
					$i++;
				}
				
				$fpdf->Text(7,26.7,'Carried Over *******');
				$fpdf->Text($x_axis+5.5,26.7,$total_carried_over);

	
			}
			
				
			
			$fpdf->Line(4,$y_axis+=0.3,18,$y_axis); //horizental lione 
			$y_axis+=0.3;

	
	endforeach;
	$fpdf->SetLeftMargin(4);
	$fpdf->Output();
?>