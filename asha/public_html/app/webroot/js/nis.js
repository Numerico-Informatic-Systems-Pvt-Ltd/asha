/*Javascript function to block Submit if Grand Total And Grand Total of individual is notch matched*/

function modify_barga_compensation(){
	
	document.getElementById('Land017').value
	
	
}
function calculate_plot_barga_compensation(countOwners)
{
	if(document.getElementById('Land0BargaPercentage').value == '')
	{
		
		alert("Pleae write percentage of barga compensation. Write 0.0 for default.");
		return false;
	}
	var LandArea = Number(document.getElementById('Land0Area').value);
		
	if(document.getElementById('Land0BargaPercentage').value != '')
	{
		var barga_plot_compensation = (LandArea*(
				Number(document.getElementById('Land01').value)
									*Number(document.getElementById('Land0BargaPercentage').value)))/100;
		document.getElementById('Land017').value = barga_plot_compensation;
		for(rowID = 101; rowID < Number(countOwners) + 101; rowID++) 
		{
			if(document.getElementById('Land'+rowID+'17') != '')
			{
				var owner_share = document.getElementById('Land'+rowID+'AreaClone').value;
				document.getElementById('Land'+rowID+'BargaPercentage').value = 
							document.getElementById('Land0BargaPercentage').value;
				document.getElementById('Land'+rowID+'17').value = 
							barga_plot_compensation*owner_share*(1/10000);
			}
		}
		
	}
}

function validate_total_amount(count_of_land_owners)
{
	var count = 101;
	var OwnerCount = Number(count_of_land_owners) + 101;
	PlotTotal = document.getElementById('Land017').value;
		if( PlotTotal == null || PlotTotal == "")
		{
			alert("Pleae calculate plot total");	
			return false;
		}	
	
	if(Number(document.getElementById('Land0Area').value) > 0.0 
			&& (document.getElementById('Land02').readOnly == false))
	{
		if(PlotTotal == 0.0){
			alert('Old value cannot be ZERO for this plot.');
			return false;	
		}
	}
		
	OwnerTotal = 0.00;
	
	for(count = 101; count < OwnerCount; count++) 
	{
		if(document.getElementById('Land'+count+'17').value == '') {
			alert('Owner share cannot be empty.');
			return false;
		}
		
		OwnerTotal = OwnerTotal + Number(document.getElementById('Land'+count+'17').value); 
		/* Get Total Compensation of Current Owners */
	}
	
	var PlotTotalRoundedOff = Number(PlotTotal).toFixed(2);
	var OwnerTotalRoundedOff = Number(OwnerTotal).toFixed(2);
	
	
	if(Math.abs(PlotTotalRoundedOff - OwnerTotalRoundedOff)>1)
	
	{
		alert("Plot total does not match with total compensation for all owners");
		return false;	
	}
	else
	{	count--;
		var total = Number(document.getElementById('Land'+count+'17').value)
		
		total += Number(PlotTotalRoundedOff - OwnerTotalRoundedOff); 
				
		document.getElementById('Land'+count+'17').value = total.toFixed(2);
		
	
	}
	return true;
}	

/*Javascript function to perform solation calculation for all */

function check_value(count,calculatle_old_value)
{	
		var LandArea = Number(document.getElementById('Land'+count+'Area').value); /* Get Land Area */
		var OldRate = Number(document.getElementById('Land'+count+'1').value);    /* Old Rate */
				
		
		if(typeof(calculatle_old_value)=="undefined")			
		{
				
				if(document.getElementById('Land'+count+'1').value != '')
				{
					var OldValue =	Number(LandArea * OldRate);	/* Old Value */
					OldValue = OldValue.toFixed(2);					
					document.getElementById('Land'+count+'2').value=OldValue;
				}
				else
				{
					var OldValue = Number(document.getElementById('Land'+count+'2').value);
					OldValue = OldValue.toFixed(2);
				}
				/*calculation and replacement of 80% payment */
				var EightyPercentPaid = OldValue * 0.8;			/* Paid 80% */
				EightyPercentPaid = EightyPercentPaid.toFixed(2);		
									
				/* IF 80% Payment Field is EMPTY, then only SET the value for paid 80 */
				
				if(document.getElementById('Land'+count+'3').value == '' || 
						Number(document.getElementById('Land'+count+'3').value) == 0)
				{
					document.getElementById('Land'+count+'3').value =  EightyPercentPaid;
				}
				else
				{
					EightyPercentPaid = document.getElementById('Land'+count+'3').value;
					EightyPercentPaid = EightyPercentPaid.toFixed(2);
				}			
				/*Commented out on 19.10.2013 by Sid as 
				 logic did not work. 
			
			if ((document.getElementById('Land'+count+'3').value != EightyPercentPaid ) 
					&& document.getElementById('Land'+count+'3').value != '')
			{
				
				var x = window.confirm("Do you really want to Change the value of 80% Paid Amount");
				if(x == true)
				{
					EightyPercentPaid = document.getElementById('Land'+count+'3').value; 
				} else {
					
					document.getElementById('Land'+count+'3').value = EightyPercentPaid;
				}
			}*/
					
		} 
		else 
		{		
			var OldValue = 	Number(document.getElementById('Land'+count+'2').value);
			EightyPercentPaid = Number(document.getElementById('Land'+count+'3').value);
		}	
					
			/*calculation and replacement of oldvalue - 80% payment */

			var Old_Eighty = Number(OldValue - EightyPercentPaid); 
			Old_Eighty = Old_Eighty.toFixed(2);
			document.getElementById('Land'+count+'5').value=Old_Eighty; /* Old Value - 80% */

			/*calculation and replacement of oldvalue - 80% payment + tree [ tree all time 0] */
			var tree=0;
			var Old_EightyTree = Number(Number(tree) + OldValue - EightyPercentPaid);		
			Old_EightyTree = Old_EightyTree.toFixed(2);
			document.getElementById('Land'+count+'7').value=Old_EightyTree;
			
			/*Period of Additional Compensation [Duration 1] */
			var First_Interest_Duration=Number(document.getElementById('Land'+count+'Dur1').value);	
			
			
			/*Additional compensation 1*/
			var Value_First_Interest = Number(0.12 * OldValue * First_Interest_Duration);
			
			
			Value_First_Interest = Value_First_Interest.toFixed(2);
			document.getElementById('Land'+count+'9').value=Value_First_Interest;	

			/*Period of Additional Compensation [Duration 2] */
			var Second_Interest_Duration = Number(document.getElementById('Land'+count+'Dur2').value);			
			/*Additional Compensation 2*/
			var Value_Second_Interest = Number(0.12 * Old_EightyTree * Second_Interest_Duration);
			Value_Second_Interest = Value_Second_Interest.toFixed(2);
			document.getElementById('Land'+count+'10').value=Value_Second_Interest;	
			
			/*Land New Rate*/			
			
			var LandNewRate = document.getElementById('Land'+count+'11').value;		
			/*Land new value [New Rate * Land Area Acquisition]*/
			var LandNewValue = Number(LandNewRate * LandArea) ;  
			
			/*calculation and replacement new value */
			/* For other case - tree, pan, struncture - New Value is EQUAL to Old Value */
			/* For other cases Old Rate is EMPTY & set to readonly */
			if(document.getElementById('Land'+count+'1').value == '')
			 {
				document.getElementById('Land'+count+'12').value = LandNewValue = OldValue.toFixed(2);
				LandNewValue = Number(LandNewValue);
				
			} else {
			document.getElementById('Land'+count+'12').value=LandNewValue.toFixed(2) ; /*New Value*/
			}
			
			/*calculation and replacement of newvalue - 80% payment */
			document.getElementById('Land'+count+'14').value=(LandNewValue-EightyPercentPaid).toFixed(2); 
	

			/*Period of Additional Compensation [Duration 3] */			
			var Third_Interest_Duration=Number(document.getElementById('Land'+count+'Dur3').value); 
			/*calculation and replecement of dditional Compensation 3 */
			var Third_Interest_Value = Number(0.12 * Third_Interest_Duration * Number(LandNewValue-
																				  EightyPercentPaid));						
			Third_Interest_Value = Third_Interest_Value.toFixed(2);
			document.getElementById('Land'+count+'15').value=Third_Interest_Value;
		

			/* Setting Total Value */
			var New_Value_Less_Eighty = Number(LandNewValue-EightyPercentPaid);
			New_Value_Less_Eighty.toFixed(2);

				
			/* Solatium Calculation */
			
			var solatium = Number(0.3 * LandNewValue);			
			solatium = solatium.toFixed(2);
			document.getElementById('Land'+count+'16').value=solatium;	
			
			/*Grand Total Calculation */
			var total = Number(Value_First_Interest) + Number(Value_Second_Interest) + Number(Third_Interest_Value) + 
					  Number ( New_Value_Less_Eighty ) + Number(solatium);		
			  			
			document.getElementById('Land'+count+'17').value=total.toFixed(2);
}


/*Javascript function to recalculate payable total of plot and owner on check box "check/uncheck"*/
function paid80(e,count)
{
	/* Owner land value based on his/her share*/
	var LandArea = Number(document.getElementById('Land'+count+'Area').value); /* Get Land Area */
	var OldRate = Number(document.getElementById('Land'+count+'1').value);    /* Old Rate */
	//var OldValue =	parseFloat(LandArea * OldRate);	/* Old Value */
	var OldValue = Number(document.getElementById('Land'+count+'2').value);
	/* Paid 80% */	
	var owner_paid80 = Number(OldValue * 0.8);		/* Paid 80% */		
	var plot_paid80 = Number(document.getElementById('Land03').value);

	/*if ot recalculate paybel amount if 80% is done*/
	if(e.checked)
	{		
			check_value(count);
			
			var plot_increased_paid80 = Number(Number(plot_paid80) + Number(owner_paid80)); 
			plot_increased_paid80 = plot_increased_paid80.toFixed(2);
			document.getElementById('Land03').value=plot_increased_paid80;
			
			check_value(0,"GO TO ELSE");				
						
	}
	else
	{
			var plot_increased_paid80 = Math.abs(Number(plot_paid80.toFixed(2) - owner_paid80.toFixed(2))); 
			var countOwners = document.getElementById("countOwners").value;
			//alert(countOwners);
						
			
			plot_increased_paid80 = plot_increased_paid80.toFixed(2);
			document.getElementById('Land03').value=plot_increased_paid80; /* Old Value - 80% */
			document.getElementById('Land'+count+'3').value = 0.0;
			var uncheck_all_paid_eighty = 0;
			for(rowID = 101; rowID < Number(countOwners) + 101; rowID++) 
			{	
				if(document.getElementById('Land'+rowID+'18').checked == true)
				{
					
					uncheck_all_paid_eighty = uncheck_all_paid_eighty + 1;
				}
			}
			if (uncheck_all_paid_eighty == 0 )
			{
				document.getElementById('Land03').value = 0.00;	
				
			}
			
			
			
			check_value(count,"GO TO ELSE");
			check_value(0,"GO TO ELSE");
	}
}
	
	
function check_value_for_owner(count)
{
	var OldValue=parseFloat(document.getElementById('Land02').value);
	//alert(OldValue);
	var OwnerShare=parseFloat(document.getElementById('Land'+count+'AreaClone').value);
	//alert(document.getElementById('Land'+count+'AreaClone'));
	var share=(OldValue*OwnerShare)/10000;
	document.getElementById('Land'+count+'2').value=share.toFixed(2);
	
}


function check_value_new_rate(count)
{
	// alert('hoii');
	
	var OldValue=document.getElementById('Land'+count+'2').value;
	
	var EightyPercentPaid =parseFloat(document.getElementById('Land'+count+'3').value);	
	
	//document.getElementById('Land'+count+'3').value=EightyPercentPaid.toFixed(2);
	document.getElementById('Land'+count+'3Check').value=EightyPercentPaid.toFixed(2); /* Paid 80% */
	
	var Old_Eighty= parseFloat(OldValue - EightyPercentPaid);
	//alert(Old_Eighty); 
	document.getElementById('Land'+count+'5').value=Old_Eighty.toFixed(2); /* Old Value - 80% */
	var tree=0;
	var Old_EightyTree=parseFloat(tree + Old_Eighty);		/* Old value - 80% plus tree value */
	document.getElementById('Land'+count+'7').value=Old_EightyTree.toFixed(2);
		var First_Interest_Duration=parseFloat(document.getElementById('Land'+count+'Dur1').value);	/* Duration 1 */
	var Value_First_Interest=parseFloat(0.12 * OldValue * First_Interest_Duration);	/*ADDITIONAL COMPENSATION 1*/
	document.getElementById('Land'+count+'9').value=Value_First_Interest.toFixed(2);	/*Additional compensation 1*/
	var Second_Interest_Duration=parseFloat(document.getElementById('Land'+count+'Dur2').value);	/*Period for Additional Compensation 2*/
	var Value_Second_Interest=parseFloat(0.12 * Old_EightyTree * Second_Interest_Duration);
	document.getElementById('Land'+count+'10').value=Value_Second_Interest.toFixed(2);	/*Additional compensation 2*/
	var LandNewRate=document.getElementById('Land'+count+'11').value;		/*New Rate*/
	var LandNewValue=parseFloat(document.getElementById('Land'+count+'12').value) ;
	//var LandNewValue=parseFloat(LandNewRate * LandArea) ;  /*New Rate X Land Area Acquisition */
	//document.getElementById('Land'+count+'12').value=LandNewValue.toFixed(2) ; /*New Value*/
	document.getElementById('Land'+count+'14').value=(LandNewValue-EightyPercentPaid).toFixed(2); /*New value + trees - 80% */
	var Third_Interest_Duration=parseFloat(document.getElementById('Land'+count+'Dur3').value); /* Duration 3 */					
	var Third_Interest_Value=(0.12 * Third_Interest_Duration * parseFloat(LandNewValue-EightyPercentPaid));						
	document.getElementById('Land'+count+'15').value=Third_Interest_Value.toFixed(2);
	var solatium=(0.3 * LandNewValue.toFixed(2));
	document.getElementById('Land'+count+'16').value=solatium.toFixed(2);	
	var total=Value_First_Interest+Value_Second_Interest+LandNewValue+Third_Interest_Value+solatium;
	document.getElementById('Land'+count+'17').value=total.toFixed(2);
}

	function checktotal()
	{
		//alert('Hii');
		//return false;
		var total_land=Number(document.getElementById('PresentShare').innerHTML);
		var total_tree=Number(document.getElementById('PresentTreeShare').innerHTML);
		var total_structure=Number(document.getElementById('PresentStructureShare').innerHTML);
		var total_pan_baroz=Number(document.getElementById('PresentPanBarozShare').innerHTML);
		var total_barga=Number(document.getElementById('PresentBargaShare').innerHTML);
		
		var total_barga_affected_area = Number(document.getElementById('total_barga_effected_area').value);
	
		
		//alert(total_tree);
		if(total_land != 10000)
		{
			alert('Total Land Share must be equals to 10000');
			return false;
		}
		else if((total_tree > 0 && total_tree != 10000) || total_tree > 10000)
		{
			alert('Total Tree Share must be either 0 or 10000');
			return false;
		}
		else if((total_structure  > 0 && total_structure != 10000) || total_structure > 10000)
		{
			alert('Total Structure Share must be either 0 or 10000');
			return false;
		}
		else if((total_pan_baroz > 0 && total_pan_baroz != 10000) || total_pan_baroz > 10000)
		{
			alert('Total Pan-Baroz Share must be either 0 or 10000');
			return false;
		}
		else if((total_barga_affected_area > 0 && total_barga != 10000))
		{
			alert('Total Barga Share must be 10000');
			return false;
		}
		
		else
		{
			return true;
		}
	}
	
	
	function showTotalShare(rowID) 
				{	
			
				    var total = 0.00;	
					var total_tree=0.00;
					var total_structure=0.00;
					var total_pan_baroz=0.00;
					var total_barga = 0.00;
							 
					for(i=0;i<20;i++){
						var total = total + 
							Number(document.getElementById('owner'+(i)+'Share').value);
						var total_tree = total_tree + 
							Number(document.getElementById('owner'+(i)+'Treeshare').value);
						var total_structure = total_structure + 
							Number(document.getElementById('owner'+(i)+'Structureshare').value);
						var total_pan_baroz = total_pan_baroz + 
							Number(document.getElementById('owner'+(i)+'Panbarozshare').value);
						var total_barga = total_barga +
							Number(document.getElementById('owner'+(i)+'Bargashare').value);	
						
					}
						document.getElementById('PresentTotalFormShare').innerHTML = total;
						document.getElementById('PresentShare').innerHTML = 
							total + Number(document.getElementById('PresentTotalShare').innerHTML);
							
						document.getElementById('PresentTreeTotalFormShare').innerHTML = total_tree;
						document.getElementById('PresentTreeShare').innerHTML = 
							total_tree + Number(document.getElementById('PresentTreeTotalShare').innerHTML);
						
						//alert(total_structure);
						document.getElementById('PresentStructureTotalFormShare').innerHTML = total_structure;
						//alert(document.getElementById('PresentStructureTotalFormShare').innerHTML);
						document.getElementById('PresentStructureShare').innerHTML = 
							total_structure + Number(document.getElementById('PresentStructureTotalShare').innerHTML);
						
						//alert(total_pan_baroz);
						document.getElementById('PresentPanBarozTotalFormShare').innerHTML = total_pan_baroz;
						//alert(document.getElementById('PresentPanBarozTotalFormShare').innerHTML);
			//			document.getElementById('PresentPanBarozShare').innerHTML =total_pan_baroz;
						document.getElementById('PresentPanBarozShare').innerHTML = 
							total_pan_baroz + Number(document.getElementById('PresentPanBarozTotalShare').innerHTML);
				
						document.getElementById('PresentBargaTotalFormShare').innerHTML = total_barga;
						document.getElementById('PresentBargaShare').innerHTML =Number(document.getElementById('PresentBargaTotalShare').innerHTML) + total_barga;
						
						/* If value exceeds 10,000, reset it to zero */
						
						if(document.getElementById('PresentShare').innerHTML > 10000){
							alert("Total share cannot exceed 10,000");
							document.getElementById('PresentShare').innerHTML =
								document.getElementById('PresentShare').innerHTML - 
									document.getElementById('owner'+rowID+'Share').value;		
							document.getElementById('owner'+rowID+'Share').value = 0;
							return false;
						}
						
		
						if(document.getElementById('PresentTreeShare').innerHTML > 10000){
							
							document.getElementById('PresentTreeShare').innerHTML = 
								document.getElementById('PresentTreeShare').innerHTML - 
									document.getElementById('owner'+rowID+'Treeshare').value;		
							alert("Tree total share cannot exceed 10,000");
							document.getElementById('owner'+rowID+'Treeshare').value = 0;
							return false;
						}
						
						if(document.getElementById('PresentStructureShare').innerHTML > 10000){
							document.getElementById('PresentStructureShare').innerHTML = 
								document.getElementById('PresentStructureShare').innerHTML - 
									document.getElementById('owner'+rowID+'Structureshare').value;	
							alert("Structure total share cannot exceed 10,000");
							document.getElementById('owner'+rowID+'Structureshare').value = 0;
							return false;
						}

						if(document.getElementById('PresentPanBarozShare').innerHTML > 10000){
							alert("Panbaroz total share cannot exceed 10,000");
							document.getElementById('PresentPanBarozShare').innerHTML =
								document.getElementById('PresentPanBarozShare').innerHTML - 
									document.getElementById('owner'+rowID+'PanBarozshare').value;	 
							document.getElementById('owner'+rowID+'PanBarozshare').value = 0;
							return false;
						}
						
						if(document.getElementById('PresentBargaShare').innerHTML > 10000){
							alert("Barga total share cannot exceed 10,000");
							document.getElementById('PresentBargaShare').innerHTML = 
								document.getElementById('PresentBargaShare').innerHTML - 
									document.getElementById('owner'+rowID+'Bargashare').value;	
							document.getElementById('owner'+rowID+'Bargashare').value = 0;
							return false;
						}
						
						
					
						if(document.getElementById('PresentBargaShare').innerHTML > 10000){
							alert("Barga total share cannot exceed 10,000");
							document.getElementById('owner'+rowID+'Bargashare').value = 0;
							return false;
						}
						
				}
				
				
				
				function copyValueParent(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('owner'+rowID+'Parent').value == "" ||
							document.getElementById('owner'+rowID+'Parent').value == null){
					document.getElementById('owner'+rowID+'Parent').value
							 = document.getElementById('owner'+(rowID-1)+'Parent').value;
					}
				
				}
				
				
				function copyValueAddress(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('owner'+rowID+'Address').value == "" ||
							document.getElementById('owner'+rowID+'Address').value == null){
					document.getElementById('owner'+rowID+'Address').value
							 = document.getElementById('owner'+(rowID-1)+'Address').value;
					}
				
				}


				function copyValuePoliceStation(rowID) 
				{
					if(rowID > 0)
					
					if(document.getElementById('owner'+rowID+'PoliceStation').value == "" ||
							document.getElementById('owner'+rowID+'PoliceStation').value == null){
					document.getElementById('owner'+rowID+'PoliceStation').value
							 = document.getElementById('owner'+(rowID-1)+'PoliceStation').value;
					}
				
				}
				function checkvalue(e)
				{
					if(e.value > 10000)
					{
						alert('Value Can not be more than 10000');
						e.value='';
					}
				}
				
				function toggleBargaShare(e,rowID) {
				
				if(e.options[e.selectedIndex].innerHTML == "Y")
				{
						document.getElementById("owner"+rowID+"Bargashare").readOnly = false;
						document.getElementById("owner"+rowID+"Share").value = 0.0;
						document.getElementById("owner"+rowID+"Share").readOnly = true;
						
				} else {
						document.getElementById("owner"+rowID+"Bargashare").readOnly = true;
						document.getElementById("owner"+rowID+"Share").value = 0.0;
						document.getElementById("owner"+rowID+"Share").readOnly = false;
				
				}
				
				
				
				}