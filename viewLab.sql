CREATE viewLab
	SELECT inv_id, SUM(price * qty) AS lsubTot
    FROM inv_rep JOIN repair on rep_id=repid
    
    GROUP BY inv_id;