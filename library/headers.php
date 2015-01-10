<?php

//Login Records Headers and Indices =============
$TH = array("type-string,User Name","type-string,IP Address","type-float,Location", "type-string, Login Time");
$TI = array("_lgn_un",	"_lgn_ip",	"_lgn_loc",	"_lgn_time");
//=============================


//Enquiries =============
$TH = array("type-string,Date","type-string,Customer Name","type-string,Phone Number", "type-string, Enquiry Type", 
            "type-string, Question", "type-string, Followup Date", "type-string, Followup Incharge", 
            "type-string, Comments");

$TI = array("_lgn_un",	"_lgn_ip",	"_lgn_loc",	"_lgn_time");
//=============================


//Enrollments Report Headers and Indices=============

$ERH = array("type-string,Customer ID","type-string,Customer Name","type-string,Branch","type-string,Enrolled For","type-int,Status", "type-string,Added By", "type-date,Added On");

$ERI = array("_cust_un", "_cust_name", "_cust_branch", "_cust_service", "_cust_status", "_cust_addedby", "_cust_addedon");


//Active Revenue Headers and Indices=============

$ARH = array("type-string,T Num","type-string,Paid By","type-string,Branch", "type-date,Date", "type-int,Amount", "type-string,Comments", "type-string,Added By", "type-date,Added On");

$ARI = array("_payment_tn", "_payment_un", "_payment_branch", "_payment_date", "_payment_amt", "_payment_comments", "_payment_addedby", "_payment_addedon");


//Active Expenses Header and Indices=============
$AEH = array("type-date,Date", "type-string,T Num","type-string,Payable To","type-string,Branch", "type-string,Type", "type-int,Amount", "type-string,Comments", "type-string,Added By", "type-date,Added On");

$AEI = array("_exp_date","_exp_tn", "_exp_owed_to", "_exp_branch", "_exp_type", "_exp_amount", "_exp_remarks", "_exp_addedby", "_exp_addedon");

$TH = array("type-string,User Name","type-string,IP Address","type-float,Location", "type-string, Login Time");
$TI = array("_lgn_un",	"_lgn_ip",	"_lgn_loc",	"_lgn_time");

?>

