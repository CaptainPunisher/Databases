IF ((SELECT COUNT(*) FROM inv_rep ir where ir.inv_id = pid) > 1) THEN
	SELECT sum(repair.price * ir.qty) AS lsubtot
ELSE 
	SELECT (repair.price * ir.qty) as lsubtot
END IF

IF ((SELECT COUNT(*) FROM inv_part ip WHERE ip.inv_id = pid) > 1)
THEN SELECT SUM(parts.price * ip.qty) as psubTot
ELSE SELECT (parts.price * ip.qty) as psubTot
END IF;

SELECT round((SUM(p.price * ip.qty) * .0725),2) as taxTot,
round((sum(r.price * ir.qty) + SUM(p.price * ip.qty) + (SUM(p.price * ip.qty) * .0725)),2) as total

FROM `inv_rep` ir join `invoice` i on
ir.inv_id=i.id

join repair r on 
ir.rep_id = r.repId

join `inv_part` ip ON
ip.inv_id = i.id

JOIN `parts` p on 
ip.part_id = p.id

WHERE i.ID = pid

GROUP by i.id