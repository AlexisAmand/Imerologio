<?php

/* ---------------------- */
/* calendrier républicain */
/* ---------------------- */

class republics
    {
    public $day;
    public $month;
    public $monthInLetters;
	public $year;

	/* Conversion du numéro du mois en lettre (ex : 1 devient Vendémiaire) */

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
   	
	/* Conversion du numéro d'année en lettre (ex : 9 devient IX) */

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

/* -------------------- */
/* calendrier grégorien */
/* -------------------- */
    
class gregorians
    {
    public $day;
    public $month;
	public $monthInLetters;
    public $year;

	/* A quel jour correspond une date ? */

	public function gregorianDay()
		{
		if ($this->month >= 3)
			{
			$z = $this->year;
			$day = ((floor(23 * $this->month) / 9) + $this->day + 4 + $this->year + floor($z / 4) - floor($z / 100) + floor($z / 400) - 2 ) % 7;
			}
		else
			{
			$z = $this->year - 1;
			$day =  ((floor(23 * $this->month) / 9)+ $this->day + 4 + $this->year + floor($z / 4) - floor($z / 100) + floor($z / 400) ) % 7;
			}

		return $day;	
		}

	/* Date de Paques */
	/* Je n'ai pas utilisé la fonction easter_date() */
    /* car elle est limité à une date en 1970 et 2037 */
	
	public function dateDePaques()
		{
		/*
        $quotient = (int)($divisor / $dividend);
        $remainder = $divisor % $dividend;
        */
            		
        /* cycle de Méton */
            		
		$n = $this->year % 19;
		
		/* centaine et rang de l'année */
		
		$u = $this->year % 100;
		$c = (int)($this->year / 100);
		
		/* siècle bissextile */
		
		$t = $c % 4;
		$s = (int)($c / 4);
		
		/* cycle de proemptose */

		$p = (int)(($c + 8) / 25);
		
		/* proemptose */
		
		$q = (int)(($c - $p + 1 ) / 3);
		
		/* épacte */
		
		$e = (19 * $n + $c - $s - $q + 15) % 30;
		
		/* année bissextile */
		
		$d = $u % 4;
		$b = (int)($u / 4);
		
		/* lettre dominicale */
		
		$L = (2 * $t + 2 * $b - $e - $d + 32) % 7;
		
		/* correction */
		
		$h = (int)(($n + 11 * $e + 22 * $L) / 451);
		
		/* mois et quantième du Samedi saint */
		
		$j = ($e + $L - 7 * $h + 114) % 31;
		$m = (int)(($e + $L - 7 * $h + 114) / 31);
		
		/* mois et quantième de pâques */
						
		$this->day = $j + 1;
		$this->month = $this->MoisEnLettre($m);
									
		echo "<p class='alert alert-success'>En ".$this->year.", Pâques est le ".$this->day." ".$this->month."</strong></p>";  	
		}

	/* année bissextile ? */
	
	public function Bissextile()
		{
		if (($this->year % 4 == 0) and ($this->year % 100 != 0) or ($this->year % 400 == 0 )) 
			{
			echo "<p class='alert alert-success'>L'année ".$this->year." est bissextile.</p>";
			}
		else 
			{
			echo "<p class='alert alert-success'>L'année ".$this->year." n'est pas bissextile.</p>";
			}
		}

	/* Calcul de l'épacte */		

    public function Epacte($a)
    	{
    	$c = (int)($a / 100);
    	$e = (11 * ($a % 19) + 8 - $c + (int)($c / 4) + (int)((8 * $c + 13) / 25)) % 30;
    	
    	return $e;
    	}

	/* Conversion du numéro du jour en lettre (ex : 1 devient lundi) */
    
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

	/* Conversion du numéro du mois en lettre (ex : 1 devient janvier) */
    
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