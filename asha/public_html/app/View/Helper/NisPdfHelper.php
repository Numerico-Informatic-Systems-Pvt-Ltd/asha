<?php
# A helper to generate custom ajax links based on supplied arguments
App::uses('AppHelper', 'View/Helper');

class NisPdfHelper extends AppHelper {
		
   	public	function award_print_header_footer($lacase) 
    {		/* Substraction of Day */

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

		
    }

	
}