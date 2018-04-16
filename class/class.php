<?php

/* calendrier républicain */

class republics
    {
    public $day;
    public $month;
    public $year;
    
    public function MoisEnLettre($m)
    	{
    	switch($m)
    		{
    			case '1': return "Vendémiaire"; Break;
    			case '2': return "Brumaire"; Break;
    			case '3': return "Frimaire"; Break;
    			case '4': return "Nivose"; Break;
    			case '5': return "Pluviose"; Break;
    			case '6': return "Ventose"; Break;
    			case '7': return "Germinal"; Break;
    			case '8': return "Floréal"; Break;
    			case '9': return "Prairial"; Break;
    			case '10': return "Messidor"; Break;
    			case '11': return "Thermidor"; Break;
    			case '12': return "Fructidor"; Break;
    			case '13': return "Sansculottide"; Break;
    		}
    		
   		}
   		
   	public function AnneeEnLettre($y)
   		{
   		switch($y)
   			{
   				case '1': return "I"; Break;
   				case '2': return "II"; Break;
   				case '3': return "III"; Break;
   				case '4': return "IV"; Break;
   				case '5': return "V"; Break;
   				case '6': return "VI"; Break;
   				case '7': return "VII"; Break;
   				case '8': return "VIII"; Break;
   				case '9': return "IX"; Break;
   				case '10': return "X"; Break;
   				case '11': return "XI"; Break;
   				case '12': return "XII"; Break;
   				case '13': return "XIII" ; Break;
   			}
   		}
   	}
        
/* calendrier grégorien */
    
class gregorians
    {
    public $day;
    public $month;
    public $year;
    
    public function JourEnLettre($j)
    	{
		switch($j)
		    {
		    	case '0': return "dimanche"; Break;
		    	case '1': return "lundi"; Break;
		    	case '2': return "mardi"; Break;
		    	case '3': return "mercredi"; Break;
		    	case '4': return "jeudi"; Break;
		    	case '5': return "vendredi"; Break;
		    	case '6': return "samedi"; Break;
		    }
	    }
    
    public function MoisEnLettre($m)
    	{
    	switch($m)
    		{
    			case '1': return "janvier"; Break;
    			case '2': return "février"; Break;
    			case '3': return "mars"; Break;
    			case '4': return "avril"; Break;
    			case '5': return "mai"; Break;
    			case '6': return "juin"; Break;
    			case '7': return "juillet"; Break;
    			case '8': return "août"; Break;
    			case '9': return "septembre"; Break;
    			case '10': return "octobre"; Break;
    			case '11': return "novembre"; Break;
    			case '12': return "décembre"; Break;
    		}
    	}
       
    }