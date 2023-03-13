SELECT *
FROM tb_details
INNER JOIN tb_financial ON tb_details.id = tb_financial.details_id
INNER JOIN tb_guarantor ON tb_details.id = tb_guarantor.details_id
INNER JOIN tb_liabilities ON tb_details.id = tb_liabilities.details_id
INNER JOIN tb_loan ON tb_details.id = tb_loan.details_id
INNER JOIN tb_pdetails ON tb_details.id = tb_pdetails.details_id
INNER JOIN tb_sign ON tb_details.id = tb_sign.details_id
INNER JOIN tb_user ON tb_details.user_id = tb_user.id
