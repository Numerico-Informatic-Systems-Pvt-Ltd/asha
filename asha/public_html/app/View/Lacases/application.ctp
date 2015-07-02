<?php
$fpdf->SetFont('Times','',8);

$i=0; 
$x_axis=5.2;
$y_axis=4.0;
$total=0.00;
$page_no=1;
$records_per_page = 4;
$total_carried_over=0;  

/* Variables to find and display owner serial number */
$prev_owner_id = ''; // Variable to show previous owner id 
$cur_owner_id = ''; // Variable to store current owner id3	
										// while circulating through owner table
					
	$owner_serial_number = 1; // Starting value of owner serial number 
	
	foreach($owners as $owner):
	
		$owner_wise_total_compensation = 0;
		/* Header for first Page */  
		if($i == 0)
				{		
					$fpdf->AddPage();			
					############ Printing Header ###################
			
					$fpdf->Text(9.5,1.7,'FROM 13 A');
					$fpdf->Text(9.0,2,'(See paragraph No. 94)');
					$fpdf->Text(9.1,2.3,'LAND AQUISITION');
				
					$fpdf->Text(8.5,2.7,'L.A. Case No. '. $lacase['Lacase']['la_case_number']);
					$fpdf->Text(5.5,3.0,$lacase['Lacase']['project']);
					
					$fpdf->Text(4.0,3.5,"Sl. No.");
												
					$fpdf->Text(4.9,3.5,"Owner & Compensation Details");
					$fpdf->Text(12.5,3.5,"Estimates (Rs.)");
					$fpdf->Text(15.,3.5,"Verified/ Unverified");
				
					############ Done Printing Header #############
					
					$fpdf->Line(4,4.0,18,4); //horizental line 
				
					$fpdf->Line(4.9,4,4.9,27); //vartical line 1
					$fpdf->Line(12.5,4,12.5,27); //vartical line 2
					$fpdf->Line(15.5,4,15.5,27); //vartical line 3
					
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
					
							
					}  // END OF IF($i)
						

			/* Fixing owner serial number */
					if(empty($prev_owner_id))
						$prev_owner_id = $owner['Owner']['id'];
						
					$cur_owner_id = $owner['Owner']['id'];
				
					if($prev_owner_id <> $cur_owner_id):
					
						$prev_owner_id = $owner['Owner']['id'];
						$owner_serial_number++;
						
					endif;
					/* Done fixing of owner serial number */
					

			/* $fpdf->Text(4.2,$y_axis,$page_no);*/
			
			$fpdf->Text(4.2,$y_axis,$owner_serial_number);
			$fpdf->Text($x_axis,$y_axis,strtoupper($owner['Owner']['name']));
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper(
						$owner['Owner']['relation'].' '.$owner['Owner']['parent']));
			$fpdf->Text($x_axis,$y_axis+=0.3,strtoupper($owner['Owner']['address']));
			$fpdf->Text($x_axis,$y_axis+=0.3,'Mz. '.strtoupper($owner['Land'][0]['mouja']));
			$fpdf->Text($x_axis,$y_axis+=0.3,'JL no. '.strtoupper($owner['Land'][0]['jl_no']));
			$k=$i;
			
			if($owner['Owner']['varified']==1)
				$fpdf->Text($x_axis+12,$y_axis+0.6,'V');
			else
				$fpdf->Text($x_axis+12,$y_axis+0.6,'NV');
						
			$j=0;
								
			
			foreach($owner['LandsOwner'] as $landowner)
			{		
					
					$classification=$this->requestAction('Classifications/getclassificationbyid/'
							.$owner['Land'][$j]['classification_id']);
					$estvalues=$this->requestAction('Estimates/getbylandid/'
							.$owner['Land'][$j]['id'].'/'.$owner['Owner']['id']);
					$fpdf->Text($x_axis,$y_axis+=0.5,'PL. '.strtoupper($owner['Land'][$j]['rsplot_no'])
						.', Ar. '.$owner['Land'][$j]['acquisitioned_areas_value']
						.' Acr, '.$classification['Classification']['name']);
					$sh_area = ($owner['Land'][$j]['acquisitioned_areas_value']*
								$landowner['shared_area'])/10000;
					
					$fpdf->Text($x_axis,$y_axis+=0.3,'L. New Rate: Rs.'.
										$classification['Classification']['new_value']);
					$solm=$addl_comp=$svalue=$tvalue=$pvalue=0;
					$solm=$addl_comp=0;
					$total_plot_wise=0;
					$svalue=$tvalue=$pvalue=0;
					$addl_comp1=$addl_comp2=$addl_comp3=0;
					$l_p80=$t_p80=$s_p80=$p_p80=0;
					
					/* Reset All Values */
					$bvalue = 0.00;					
					$svalue = 0.00;	
					$s_p80  = 0.00;					
					$tvalue = 0.00;
					$t_p80  = 0.00;					
					$pvalue = 0.00;
					$p_p80  = 0.00;
				
					$land_new_value = 0.00;
					foreach($estvalues as $estvalue)
					{
											
						if($estvalue['Estimate']['calculation_type']=='land')
						{
					
							$fpdf->Text($x_axis,$y_axis+=0.3,
							'L- New Value: Rs.'.($estvalue['Estimate']['newvalue']));
							$land_new_value = $estvalue['Estimate']['newvalue'];
							$solm=$estvalue['Estimate']['solatium'];

							$addl_comp1=$estvalue['Estimate']['interest1'];
							$addl_comp2=$estvalue['Estimate']['interest2'];
							$addl_comp3=$estvalue['Estimate']['interest3'];							
							
							$addl_comp=$estvalue['Estimate']['interest1']
									+$estvalue['Estimate']['interest2']+$estvalue['Estimate']['interest3'];
							$l_p80=$estvalue['Estimate']['eighty_paid'];							
						}
						
						if($estvalue['Estimate']['calculation_type']=='structure')
						{
							$svalue=$estvalue['Estimate']['value'];
							$s_p80=$estvalue['Estimate']['eighty_paid'];	
						}
						
						if($estvalue['Estimate']['calculation_type']=='tree')
						{
							$tvalue=$estvalue['Estimate']['value'];
							$t_p80=$estvalue['Estimate']['eighty_paid'];								
						}
						
						if($estvalue['Estimate']['calculation_type']=='panbaroz')
						{
							$pvalue=$estvalue['Estimate']['value'];
							$p_p80=$estvalue['Estimate']['eighty_paid'];								
						}
						
						if($estvalue['Estimate']['calculation_type']=='barga')
						{
							$bvalue=$estvalue['Estimate']['value'];
							$b_p80=$estvalue['Estimate']['eighty_paid'];
							$b_percentage = $estvalue['Estimate']['barga_percentage'];	
							$b_old_rate = $estvalue['Estimate']['old_rate'];							
						}
					}
				

					$fpdf->Text($x_axis,$y_axis+=0.3,'T-Value: Rs.'.$tvalue);
					$fpdf->Text($x_axis,$y_axis+=0.3,'S-Value: Rs.'.$svalue);
					$fpdf->Text($x_axis,$y_axis+=0.3,'Pan-Boroz-Value: Rs.'.$pvalue);
					
					$fpdf->Text($x_axis,$y_axis+=0.3,'Solatium: Rs.'.$solm);
					
					$fpdf->Text($x_axis,$y_axis+=0.3,'Addl Comp. Rs.: ('.
								$addl_comp1."+".$addl_comp2."+".$addl_comp3.')='.$addl_comp);
					$fpdf->Text($x_axis,$y_axis+=0.3,'10 Thou.Sh: '.
								strtoupper($landowner['shared_area']).', '.
					$sh_area.' Acres');
					
					if($bvalue>0){
						$fpdf->Text($x_axis,$y_axis+=0.3,'Barga-Value: Rs.'.$bvalue);
						
					}
					
					$total_plot_wise = $land_new_value + $svalue + $tvalue + $pvalue + $addl_comp + $solm + $bvalue;
					
					# debug($total_plot_wise);					
					$fpdf->Text($x_axis,$y_axis+=0.3,'Total Plot Value: Rs. '.$total_plot_wise);
					$fpdf->Text($x_axis,$y_axis+=0.3,'Less- Paid (80%): Rs. ('.
									number_format($l_p80,2)."+"
									.number_format($t_p80,2)."+"
									.number_format($s_p80,2)."+"
									.number_format($p_p80,2).")="
									.number_format($l_p80+$t_p80+$s_p80+$p_p80),2);
									
					/*Printing of toatal Payment of Plot Value */				
					$fpdf->Text($x_axis+7.7,$y_axis-2.5,number_format(
										$total_plot_wise-($l_p80+$t_p80+$s_p80+$p_p80),2
								));
					$owner_wise_total_compensation+=$total_plot_wise-($l_p80+$t_p80+$s_p80+$p_p80);
					## Hack by sid
					## Remove number format
					## 12/23/2013
					## $total_carried_over+=number_format($total_plot_wise-($l_p80+$t_p80+$s_p80+$p_p80),2);
					$total_carried_over+=$total_plot_wise-($l_p80+$t_p80+$s_p80+$p_p80);										
					$j++;
					$i++;
					$y_axis+=0.2;

					if($i%$records_per_page == 0  && $i !=0){			

							$fpdf->Text($x_axis,26.7,'Carried Over *******');
							$fpdf->Text($x_axis+7.5,26.7,number_format($total_carried_over,2));
							$fpdf->Line(4,27,18,27); //horizental line 
							$fpdf->AddPage();
								
						
							############ Printing Header ###################
					
							$fpdf->Text(9.5,1.7,'FROM 13 A');
							$fpdf->Text(9.0,2,'(See paragraph No. 94)');
							$fpdf->Text(9.1,2.3,'LAND AQUISITION');
						
							$fpdf->Text(8.5,2.7,'L.A. Case No. '. $lacase['Lacase']['la_case_number']);
							$fpdf->Text(5.5,3.0,$lacase['Lacase']['project']);
							
							$fpdf->Text(4.0,3.5,"Sl. No.");

							$fpdf->Text(4.9,3.5,"Owner & Compensation Details");
							$fpdf->Text(12.5,3.5,"Estimates (Rs.)");
							$fpdf->Text(15.,3.5,"Verified/ Unverified");
							
							$fpdf->Text(4.9,3.8,'Brought Forward *******');
							$fpdf->Text(8.9,3.8,number_format($total_carried_over,2));

						
							############ Done Printing Header #############
							
							

							$fpdf->Line(4,4.0,18,4); //horizental line 
		
							$fpdf->Line(4.9,4,4.9,27); //vartical line 1
							$fpdf->Line(12.5,4,12.5,27); //vartical line 2
				//			$fpdf->Line(14.5,4,14.5,27); //vartical line 3
							$fpdf->Line(15.5,4,15.5,27); //vartical line 3
							
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
				
				
				}

					
			
					$fpdf->Line(4,$y_axis,18,$y_axis); //horizental lione
					if($j>1)
					{						
						$fpdf->Text($x_axis,$y_axis+=0.4,'Total of '.strtoupper($owner['Owner']['name']));
						$fpdf->Text($x_axis+7.7,$y_axis,number_format($owner_wise_total_compensation,2));
						//$fpdf->Text(4.2,$y_axis,$page_no);
						$y_axis+=0.3;
						$page_no++;
						$fpdf->Line(4,$y_axis,18,$y_axis); //horizental lione		
	
						
					}	
					$y_axis+=0.3;

	
	endforeach;
							$fpdf->Text($x_axis,26.7,'Carried Over *******');
							$fpdf->Text($x_axis+7.5,26.7,$total_carried_over);
							$fpdf->Line(4,27,18,27); //horizental line 

	$fpdf->SetLeftMargin(4);
	$fpdf->Output();
?>