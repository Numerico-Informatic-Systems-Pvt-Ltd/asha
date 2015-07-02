<?php
    class CurrencyToWords
    {
      public function translateInWords($amount)
      {
         $CurnStr = '';
         $amtArr = explode('.', $amount);
         $rupee = $this->numbers2words($amtArr[0]);
         $paisa = $this->numbers2words($amtArr[1]);
         $CurnStr .= 'Rupees '.$rupee;
         $CurnStr .= (trim($paisa) != 'Zero' && trim($paisa) != '')?' & Paisa '.$paisa.' Only':' Only';
         return $CurnStr;
      }
     
      public function numbers2words($number2convert)
      {
         $CodeArray = array(
                           'upto10' => array("Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten"),
                           'upto20' => array("Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen", "Twenty"),
                           'series10' => array("", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"),
                           'suffixwords' =>array("Thousand", "Lakh", "Crore"),
                           );
         $divisor = 100;
         $Counter = 0;
         $Rslt = "";
         $cNum = (float)$number2convert;
         $rNum = floor($cNum%1000);
         $cNum = floor($cNum/1000);
         $Rslt .= $this->lowerThousandInWords($rNum, $CodeArray);
         while($cNum > 0)
         {
            if($Counter == (count($CodeArray['suffixwords']) - 1))
            {
               $Rslt = $this->numbers2words($cNum).' '.$CodeArray['suffixwords'][$Counter].' '.$Rslt;
               break;
            }
            $rNum = floor($cNum%$divisor);
            $cNum = floor($cNum/$divisor);
            if($rNum !=0)
            {
               $Rslt = $this->lowerHundredInWords($rNum, $CodeArray).' '.$CodeArray['suffixwords'][$Counter].' '.$Rslt;
            }
            $Counter++;
         }
         return $Rslt;
      }
     
      public function lowerHundredInWords($num, $codeArray)
      {
         $rStr = "";
         if($num >= 100)
         {
            return FALSE; // number is higher than 100
         }
         if($num <= 10)
         {
            return $codeArray['upto10'][$num];
         }
         if($num <= 20)
         {
            return $codeArray['upto20'][$num - 10 - 1];
         }
         $lsd = floor($num%10);
         $num /= 10;
         $msd = floor($num%10);
         $rStr .= ($msd > 0)?$codeArray['series10'][$msd]:'';
         $rStr .= ' ';
         $rStr .= ($lsd > 0)?$codeArray['upto10'][$lsd]:'';
         return $rStr;
      }
     
      public function lowerThousandInWords($num, $codeArray)
      {
         if ($num >= 1000)
         {
            return FALSE; //number is higher than 1000
         }
         $rStr = $this->lowerHundredInWords(floor($num%100), $codeArray);
         $num = floor($num/100);
         $hund = floor($num%10);
         $rStr = ($hund > 0 ? ($codeArray['upto10'][$hund].' Hundred ') : '').$rStr;
         return $rStr;
      }
    }
?>