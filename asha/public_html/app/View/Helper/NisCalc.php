<?php
# A helper to generate custom ajax links based on supplied arguments
App::uses('AppHelper', 'View/Helper');

class NisCalcHelper extends AppHelper {
	
	public $helpers = array('Html','Js');
	
   	public	function Get_Date_Difference($start_date, $end_date)
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
			return $period;
		
    }

	
}