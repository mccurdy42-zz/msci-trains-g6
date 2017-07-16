$sql = " select E.`e_id`, E.`yrs_exp`" 
. " FROM employee E, `operating_comp` C" 
. " WHERE E.`c_id` = ?"  
. " GROUP BY E.`yrs_exp`" 
. " HAVING(E.`yrs_exp`>=10)";