SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `viv_app_en` (
  `_app_id` int(11) NOT NULL AUTO_INCREMENT,
  `_app_comp` varchar(30) NOT NULL,
  `_app_numbranches` tinyint(4) NOT NULL,
  `_app_status` tinyint(4) NOT NULL DEFAULT '1',
  `_app_expiry` int(11) NOT NULL,
  PRIMARY KEY (`_app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_branch_en` (
  `_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `_branch_name` varchar(30) NOT NULL,
  `_branch_manager` varchar(30) NOT NULL,
  `_branch_addr` text NOT NULL,
  `_branch_cmnts` text NOT NULL,
  `_branch_ot` varchar(30) NOT NULL,
  `_branch_ct` varchar(30) NOT NULL,
  `_branch_active` tinyint(4) NOT NULL DEFAULT '1',
  `_branch_addedby` varchar(40) NOT NULL,
  `_branch_addedon` int(11) NOT NULL,
  `_branch_lastmodby` varchar(40) NOT NULL,
  `_branch_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `viv_branch_tmngs_en` (
  `_branch_tmngs_id` int(11) NOT NULL AUTO_INCREMENT,
  `_branch_tmngs_name` varchar(30) NOT NULL,
  `_branch_tmngs_ot` varchar(30) NOT NULL,
  `_branch_tmngs_ct` varchar(30) NOT NULL,
  `_branch_tmngs_cmnts` text,
  `_branch_tmngs_addedby` varchar(40) NOT NULL,
  `_branch_tmngs_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_branch_tmngs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `viv_cust_attach_en` (
  `_cust_attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_attach_un` varchar(40) NOT NULL,
  `_cust_attach_date` int(11) NOT NULL,
  `_cust_attach_url` varchar(100) NOT NULL,
  `_cust_attach_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_attach_addedby` varchar(40) NOT NULL,
  `_cust_attach_addedon` int(11) NOT NULL,
  `_cust_attach_lastmodby` varchar(40) NOT NULL,
  `_cust_attach_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_attach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_att_en` (
  `_cust_att_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_att_un` varchar(40) NOT NULL,
  `_cust_att_date` date NOT NULL,
  `_cust_att_remarks` text NOT NULL,
  `_cust_att_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_att_addedby` varchar(40) NOT NULL,
  `_cust_att_addedon` int(11) NOT NULL,
  `_cust_att_lastmodby` varchar(40) NOT NULL,
  `_cust_att_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_att_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_det_en` (
  `_cust_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_det_un` varchar(40) NOT NULL,
  `_cust_det_pro` varchar(30) NOT NULL,
  `_cust_det_sex` tinyint(4) NOT NULL,
  `_cust_det_dob` int(11) NOT NULL,
  `_cust_det_marital` tinyint(4) NOT NULL,
  `_cust_det_ref` varchar(40) NOT NULL,
  `_cust_det_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_det_addedby` varchar(40) NOT NULL,
  `_cust_det_addedon` int(11) NOT NULL,
  `_cust_det_lastmodby` varchar(40) NOT NULL,
  `_cust_det_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `viv_cust_due_en` (
  `_cust_due_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_due_un` varchar(40) NOT NULL,
  `_cust_due_amt` varchar(40) NOT NULL,
  `_cust_due_lastdate` int(11) NOT NULL,
  `_cust_due_flw` varchar(40) NOT NULL,
  `_cust_due_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_due_addedby` varchar(40) NOT NULL,
  `_cust_due_addedon` int(11) NOT NULL,
  `_cust_due_lastmodby` varchar(40) NOT NULL,
  `_cust_due_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_due_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_emer_en` (
  `_cust_emer_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_emer_un` varchar(40) NOT NULL,
  `_cust_emer_name` varchar(40) NOT NULL,
  `_cust_emer_ph` varchar(15) NOT NULL,
  `_cust_emer_email` varchar(40) NOT NULL,
  `_cust_emer_addr` text NOT NULL,
  `_cust_emer_remarks` text NOT NULL,
  `_cust_emer_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_emer_addedby` varchar(40) NOT NULL,
  `_cust_emer_addedon` int(11) NOT NULL,
  `_cust_emer_lastmodby` varchar(40) NOT NULL,
  `_cust_emer_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_emer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `viv_cust_en` (
  `_cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_un` varchar(40) NOT NULL,
  `_cust_name` varchar(40) NOT NULL,
  `_cust_ph` varchar(15) NOT NULL,
  `_cust_addr` text NOT NULL,
  `_cust_email` varchar(40) NOT NULL,
  `_cust_branch` varchar(30) NOT NULL,
  `_cust_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_addedby` varchar(40) NOT NULL,
  `_cust_addedon` int(11)  NOT NULL,
  `_cust_lastmodby` varchar(40) NOT NULL,
  `_cust_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


CREATE TABLE IF NOT EXISTS `viv_cust_enr_en` (
  `_cust_enr_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_enr_un` varchar(40) NOT NULL,
  `_cust_enr_srv` varchar(40) NOT NULL,
  `_cust_enr_start` int(11) NOT NULL,
  `_cust_enr_end` int(11) NOT NULL,
  `_cust_enr_ref` varchar(40) NOT NULL,
  `_cust_enr_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_enr_addedby` varchar(40) NOT NULL,
  `_cust_enr_addedon` int(11) NOT NULL,
  `_cust_enr_lastmodby` varchar(40) NOT NULL,
  `_cust_enr_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_enr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_fdb_en` (
  `_cust_fdb_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_fdb_un` varchar(40) NOT NULL,
  `_cust_fdb_date` int(11) NOT NULL,
  `_cust_fdb_remarks` text NOT NULL,
  `_cust_fdb_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_fdb_addedby` varchar(40) NOT NULL,
  `_cust_fdb_addedon` int(11) NOT NULL,
  `_cust_fdb_lastmodby` varchar(40) NOT NULL,
  `_cust_fdb_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_fdb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_med_en` (
  `_cust_med_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_med_un` varchar(40) NOT NULL,
  `_cust_med_date` int(11) NOT NULL,
  `_cust_med_detail` text NOT NULL,
  `_cust_med_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_med_addedby` varchar(40) NOT NULL,
  `_cust_med_addedon` int(11) NOT NULL,
  `_cust_med_lastmodby` varchar(40) NOT NULL,
  `_cust_med_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_med_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_phy_en` (
  `_cust_phy_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_phy_un` varchar(40) NOT NULL,
  `_cust_phy_wt` decimal(10,2) NOT NULL,
  `_cust_phy_ht` decimal(10,2) NOT NULL,
  `_cust_phy_chest` decimal(10,2) NOT NULL,
  `_cust_phy_shoulder` decimal(10,2) NOT NULL,
  `_cust_phy_waist` decimal(10,2) NOT NULL,
  `_cust_phy_bicep` decimal(10,2) NOT NULL,
  `_cust_phy_calf` decimal(10,2) NOT NULL,
  `_cust_phy_date` int(11) NOT NULL,
  `_cust_phy_remarks` text NOT NULL,
  `_cust_phy_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_phy_addedby` varchar(40) NOT NULL,
  `_cust_phy_addedon` int(11) NOT NULL,
  `_cust_phy_lastmodby` varchar(40) NOT NULL,
  `_cust_phy_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_phy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `viv_dept_en` (
  `_dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `_dept_name` varchar(30) NOT NULL,
  `_dept_branch` varchar(30) NOT NULL,
  `_dept_manager` text NOT NULL,
  `_dept_cmnts` text NOT NULL,
  `_dept_addedby` varchar(40) NOT NULL,
  `_dept_addedon` int(11) NOT NULL,
  `_dept_lastmodby` varchar(40) NOT NULL,
  `_dept_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_attach_en` (
  `_emp_attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_attach_un` varchar(40) NOT NULL,
  `_emp_attach_date` int(11) NOT NULL,
  `_emp_attach_url` varchar(100) NOT NULL,
  `_emp_attach_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_attach_addedby` varchar(40) NOT NULL,
  `_emp_attach_addedon` int(11) NOT NULL,
  `_emp_attach_lastmodby` varchar(40) NOT NULL,
  `_emp_attach_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_attach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_att_en` (
  `_emp_att_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_att_un` varchar(40) NOT NULL,
  `_emp_att_date` date NOT NULL,
  `_emp_att_mark` tinyint(4) NOT NULL,
  `_emp_att_remarks` text,
  `_emp_att_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_att_addedby` varchar(40) NOT NULL,
  `_emp_att_addedon` int(11) NOT NULL,
  `_emp_att_lastmodby` varchar(40) NOT NULL,
  `_emp_att_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_att_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_emer_en` (
  `_emp_emer_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_emer_un` varchar(40) NOT NULL,
  `_emp_emer_name` varchar(40) NOT NULL,
  `_emp_emer_relation` varchar(20) NOT NULL,
  `_emp_emer_phone` varchar(20) NOT NULL,
  `_emp_emer_address` text NOT NULL,
  `_emp_emer_remarks` text,
  `_emp_emer_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_emer_addedby` varchar(40) NOT NULL,
  `_emp_emer_addedon` int(11) NOT NULL,
  `_emp_emer_lastmodby` varchar(40) NOT NULL,
  `_emp_emer_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_emer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_en` (
  `_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_branch` varchar(30) NOT NULL,
  `_emp_un` varchar(30) NOT NULL,
  `_emp_pw` varchar(48) NOT NULL,
  `_emp_level` varchar(20) NOT NULL,
  `_emp_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_lastlogin` int(11) NOT NULL,
  PRIMARY KEY (`_emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

CREATE TABLE IF NOT EXISTS `viv_emp_fdb_en` (
  `_emp_fdb_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_fdb_un` varchar(40) NOT NULL,
  `_emp_fdb_date` int(11) NOT NULL,
  `_emp_fdb_remarks` text NOT NULL,
  `_emp_fdb_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_fdb_addedby` varchar(40) NOT NULL,
  `_emp_fdb_addedon` int(11) NOT NULL,
  `_emp_fdb_lastmodby` varchar(40) NOT NULL,
  `_emp_fdb_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_fdb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_level_en` (
  `_emp_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_level_text` varchar(40) NOT NULL,
  `_emp_level_remarks` text NOT NULL,
  `_emp_level_addedby` varchar(40) NOT NULL,
  `_emp_level_addedon` int(11) NOT NULL,
  `_emp_level_lastmodby` varchar(40) NOT NULL,
  `_emp_level_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_perks_en` (
  `_emp_perk_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_perk_un` varchar(40) NOT NULL,
  `_emp_perk_type` tinyint(4) NOT NULL,
  `_emp_perk_detail` int(11) NOT NULL,
  `_emp_perks_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_perk_addedby` varchar(40) NOT NULL,
  `_emp_perk_addedon` int(11) NOT NULL,
  `_emp_perk_lastmodby` varchar(40) NOT NULL,
  `_emp_perk_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_perk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_per_en` (
  `_emp_per_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_per_un` varchar(40) NOT NULL,
  `_emp_per_name` varchar(40) NOT NULL,
  `_emp_per_sex` tinyint(4) NOT NULL,
  `_emp_per_marital` tinyint(4) NOT NULL,
  `_emp_per_dob` int(11) NOT NULL,
  `_emp_per_address` text NOT NULL,
  `_emp_per_phone` varchar(15) NOT NULL,
  `_emp_per_attach` smallint(6) NOT NULL,
  `_emp_per_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_per_addedby` varchar(40) NOT NULL,
  `_emp_per_addedon` int(11) NOT NULL,
  `_emp_per_lastmodby` varchar(40) NOT NULL,
  `_emp_per_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_pro_en` (
  `_emp_pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_pro_un` varchar(40) NOT NULL,
  `_emp_pro_branch` varchar(30) NOT NULL,
  `_emp_pro_shift` tinyint(4) NOT NULL,
  `_emp_pro_type` tinyint(4) NOT NULL,
  `_emp_pro_supervisor_un` varchar(40) NOT NULL,
  `_emp_pro_doj` int(11) NOT NULL,
  `_emp_pro_designation` varchar(60) NOT NULL,
  `_emp_pro_sal` decimal(10,2) NOT NULL,
  `_emp_pro_remarks` text,
  `_emp_pro_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_pro_addedby` varchar(40) NOT NULL,
  `_emp_pro_addedon` int(11) NOT NULL,
  `_emp_pro_lastmodby` varchar(40) NOT NULL,
  `_emp_pro_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_sal_en` (
  `_emp_sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_sal_un` varchar(40) NOT NULL,
  `_emp_sal_date` int(11) NOT NULL,
  `_emp_sal_amt` decimal(10,2) NOT NULL,
  `_emp_sal_diff` decimal(10,2) NOT NULL,
  `_emp_sal_paid_on` int(11) NOT NULL,
  `_emp_sal_paid_by` varchar(40) NOT NULL,
  `_emp_sal_remarks` text,
  `_emp_sal_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_sal_addedby` varchar(40) NOT NULL,
  `_emp_sal_addedon` int(11) NOT NULL,
  `_emp_sal_lastmodby` varchar(40) NOT NULL,
  `_emp_sal_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_sal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_det_en` (
  `_exp_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_det_fk` varchar(20) NOT NULL,
  `_exp_det_paid_to` varchar(40) NOT NULL,
  `_exp_det_phone_number` varchar(20) NOT NULL,
  `_exp_det_date` int(11) NOT NULL,
  `_exp_det_payment_mode` varchar(20) NOT NULL,
  `_exp_det_payment_mode_details` text NOT NULL,
  `_exp_det_bal` decimal(10,0) NOT NULL,
  `_exp_det_remarks` text NOT NULL,
  `_exp_det_addedby` varchar(40) NOT NULL,
  `_exp_det_addedon` int(11)  NOT NULL,
  `_exp_det_lastmodby` varchar(40) NOT NULL,
  `_exp_det_lastmodon` int(11)  NOT NULL,
  PRIMARY KEY (`_exp_det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_en` (
  `_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_tn` int(11) NOT NULL,
  `_exp_owed_to` varchar(40) NOT NULL,
  `_exp_branch` varchar(20) NOT NULL,
  `_exp_type` varchar(20) NOT NULL,
  `_exp_amount` decimal(10,2) NOT NULL,
  `_exp_date` int(11) NOT NULL,
  `_exp_remarks` text NOT NULL,
  `_exp_status` tinyint(4) NOT NULL DEFAULT '1',
  `_exp_addedby` varchar(40) NOT NULL,
  `_exp_addedon` int(11)  NOT NULL,
  `_exp_lastmodby` varchar(40) NOT NULL,
  `_exp_lastmodon` int(11)  NOT NULL,
  PRIMARY KEY (`_exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_type_en` (
  `_exp_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_type_text` varchar(40) NOT NULL,
  `_exp_type_comments` text NOT NULL,
  `_exp_type_status` tinyint(4) NOT NULL DEFAULT '1',
  `_exp_type_addedby` varchar(40) NOT NULL,
  `_exp_type_addedon` int(11)  NOT NULL,
  `_exp_type_lastmodby` varchar(40) NOT NULL,
  `_exp_type_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_exp_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `viv_inq_en` (
  `_inq_id` int(11) NOT NULL AUTO_INCREMENT,
  `_inq_emp_un` varchar(40) NOT NULL,
  `_inq_branch` varchar(30) NOT NULL,
  `_inq_cus_name` varchar(40) NOT NULL,
  `_inq_cus_email` varchar(100) NOT NULL,
  `_inq_cus_pnum` int(13) NOT NULL,
  `_inq_time` int(11) NOT NULL,
  `_inq_type` varchar(30) NOT NULL,
  `_inq_inq_cmnts` text NOT NULL,
  `_inq_flwup_inc` varchar(60) NOT NULL,
  `_inq_flwup_date` int(11) NOT NULL,
  `_inq_cmnts` text NOT NULL,
  `_inq_status` tinyint(4) NOT NULL DEFAULT '1',
  `_inq_addedby` varchar(40) NOT NULL,
  `_inq_addedon` int(11) NOT NULL,
  `_inq_lastmodby` varchar(40) NOT NULL,
  `_inq_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_inq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `viv_inq_flw_en` (
  `_inq_flw_id` int(11) NOT NULL AUTO_INCREMENT,
  `_inq_flw_emp_un` varchar(40) NOT NULL,
  `_inq_flw_cus_name` varchar(40) NOT NULL,
  `_inq_flw_time` int(11) NOT NULL,
  `_inq_flw_status` tinyint(4) NOT NULL,
  `_inq_flw_cmnts` text NOT NULL,
  `_inq_flw_addedby` varchar(40) NOT NULL,
  `_inq_flw_addedon` int(11) NOT NULL,
  `_inq_flw_lastmodby` varchar(40) NOT NULL,
  `_inq_flw_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_inq_flw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_lgn_rec_en` (
  `_lgn_id` int(11) NOT NULL AUTO_INCREMENT,
  `_lgn_un` varchar(40) NOT NULL,
  `_lgn_ip` varchar(20) NOT NULL,
  `_lgn_loc` varchar(40) NOT NULL,
  `_lgn_time` int(11) NOT NULL,
  PRIMARY KEY (`_lgn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

CREATE TABLE IF NOT EXISTS `viv_payment_en` (
  `_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_tn` int(11) NOT NULL,
  `_payment_un` varchar(40) NOT NULL,
  `_payment_branch` varchar(30) NOT NULL,
  `_payment_date` int(11) NOT NULL,
  `_payment_amt` decimal(10,2) NOT NULL,
  `_payment_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_comments` text NOT NULL,
  `_payment_addedby` varchar(40) NOT NULL,
  `_payment_addedon` int(11)  NOT NULL,
  `_payment_lastmodby` varchar(40) NOT NULL,
  `_payment_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_payment_md_en` (
  `_payment_md_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_md_name` varchar(30) NOT NULL,
  `_payment_md_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_md_branch` varchar(20) NOT NULL,
  `_payment_md_comments` text NOT NULL,
  `_payment_md_addedby` varchar(40) NOT NULL,
  `_payment_md_addedon` int(11) NOT NULL,
  `_payment_md_lastmodby` varchar(40) NOT NULL,
  `_payment_md_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_md_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_payment_peri_en` (
  `_payment_peri_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_peri_fk` int(11) NOT NULL,
  `_payment_peri_status` tinyint(4) NOT NULL,
  `_payment_peri_rcvdby` decimal(10,2) NOT NULL,
  `_payment_peri_due` decimal(10,2) NOT NULL,
  `_payment_peri_bal` decimal(10,2) NOT NULL,
  `_payment_peri_next` int(11) NOT NULL,
  `_payment_peri_incharge` varchar(40) NOT NULL,
  `_payment_peri_addedby` varchar(40) NOT NULL,
  `_payment_peri_addedon` int(11) NOT NULL,
  `_payment_peri_lastmodby` varchar(40) NOT NULL,
  `_payment_peri_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_peri_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_srv_en` (
  `_srv_id` int(11) NOT NULL AUTO_INCREMENT,
  `_srv_branch` varchar(30) NOT NULL,
  `_srv_unq_id` varchar(40) NOT NULL,
  `_srv_type` tinyint(4) NOT NULL,
  `_srv_name` varchar(40) NOT NULL,
  `_srv_start` int(11) NOT NULL,
  `_srv_length` int(11) NOT NULL,
  `_srv_price` decimal(10,2) NOT NULL,
  `_srv_tnc` text,
  `_srv_status` tinyint(4) NOT NULL DEFAULT '1',
  `_srv_addedby` varchar(40) NOT NULL,
  `_srv_addedon` int(11) NOT NULL,
  `_srv_lastmodby` varchar(40) NOT NULL,
  `_srv_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_srv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `viv_srv_sub_en` (
  `_srv_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `_srv_sub_unq_id` varchar(20) NOT NULL,
  `_srv_sub_cust` varchar(40) NOT NULL,
  `_srv_sub_date` int(11) NOT NULL,
  `_srv_sub_incharge` varchar(40) NOT NULL,
  `_srv_sub_start` int(11) NOT NULL,
  `_srv_sub_end` int(11) NOT NULL,
  `_srv_sub_addedby` varchar(40) NOT NULL,
  `_srv_sub_addedon` int(11) NOT NULL,
  `_srv_sub_lastmodby` varchar(40) NOT NULL,
  `_srv_sub_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_srv_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `viv_usr_role_en` (
  `_usr_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_role_name` varchar(10) NOT NULL,
  `_usr_role_active` tinyint(4) NOT NULL DEFAULT '1',
  `_usr_role_addedby` varchar(40) NOT NULL,
  `_usr_role_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_usr_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

CREATE TABLE IF NOT EXISTS `viv_usr_role_perm_en` (
  `_usr_role_perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_role_perm_name` varchar(10) NOT NULL,
  `_usr_role_perm_val` varchar(10)  NOT NULL,
  `_usr_role_perm_addedby` varchar(40) NOT NULL,
  `_usr_role_perm_addedon` int(11) NOT NULL,
  `_usr_role_perm_lastmodby` varchar(40) NOT NULL,
  `_usr_role_perm_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_usr_role_perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `viv_branch_en` (`_branch_id`, `_branch_name`, `_branch_manager`, `_branch_addr`, `_branch_cmnts`, `_branch_ot`, `_branch_ct`, `_branch_active`, `_branch_addedby`, `_branch_addedon`, `_branch_lastmodby`, `_branch_lastmodon`) VALUES
(1, 'Green Hills Colony', 'Sandeep Reddy', 'Hyderabad', 'The rocking world of SaddaHaq!', '10:30', '9:40', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888),
(2, 'Hitech City', 'Ranjith', 'Hyderabad', 'Itu raaye', '10:00 AM', '11:00 PM', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888),
(3, 'Vijayalakshmi', 'Sandeep Reddy', 'LB Nagar', 'hey, there!', '10:30', '9:40', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888);


INSERT INTO `viv_usr_role_en` (`_usr_role_id`, `_usr_role_name`, `_usr_role_active`, `_usr_role_addedby`, `_usr_role_addedon`) VALUES
(1, 'Admin', 1, 'bajjuri6', 1375123844),
(2, 'Standard', 1, 'bajjuri6', 1375123844),
(3, 'Manager', 1, 'bajjuri6', 1375123844);

INSERT INTO `viv_srv_sub_en` (`_srv_sub_id`, `_srv_sub_unq_id`, `_srv_sub_cust`, `_srv_sub_date`, `_srv_sub_incharge`, `_srv_sub_start`, `_srv_sub_end`, `_srv_sub_addedby`, `_srv_sub_addedon`, `_srv_sub_lastmodby`, `_srv_sub_lastmodon`) VALUES
(2, '1', 'odel_rag', 1375123947, '', 1375123947, 1634323947, 'bajjuri6', 1375123947, 'bajjuri6', 1375123947),
(5, 'dgfd', 'odel_pallav', 1375475355, '0', 1375475355, 1375734555, 'bajjuri6', 1375475355, 'bajjuri6', 1375475355);



INSERT INTO `viv_srv_en` (`_srv_id`, `_srv_branch`, `_srv_unq_id`, `_srv_type`, `_srv_name`, `_srv_start`, `_srv_length`, `_srv_price`, `_srv_tnc`, `_srv_status`, `_srv_addedby`, `_srv_addedon`, `_srv_lastmodby`, `_srv_lastmodon`) VALUES
(3, 'DSNR', 'sdfd', 0, 'dgfd', 2013, 3, 100.00, 'fdsa', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888),
(4, 'Hitech City', 'sdfd', 0, 'dgfd', 2013, 3, 150.00, 'fdsa', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888),
(5, 'Vijayalakshmi', 'sdfd', 0, 'dgfd', 2013, 3, 200.00, 'fdsa', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888);


INSERT INTO `viv_lgn_rec_en` (`_lgn_id`, `_lgn_un`, `_lgn_ip`, `_lgn_loc`, `_lgn_time`) VALUES
(1, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(2, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(3, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(4, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(5, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(6, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888),
(7, 'bajjuri6', '127.0.0.1', 'Hyderabad/India', 1375818888);


INSERT INTO `viv_inq_en` (`_inq_id`, `_inq_emp_un`, `_inq_branch`, `_inq_cus_name`, `_inq_cus_email`, `_inq_cus_pnum`, `_inq_time`, `_inq_type`, `_inq_inq_cmnts`, `_inq_flwup_inc`, `_inq_flwup_date`, `_inq_cmnts`, `_inq_status`, `_inq_addedby`, `_inq_addedon`, `_inq_lastmodby`, `_inq_lastmodon`) VALUES
(1, 'bajjuri6', 'DSNR', 'asd', 'dsf', 0, 1375818888, 'dsfs', 'dsf', '0', 2013, 'fsdf', 1, 'bajjuri6', 1375818888, 'bajjuri6', 1375818888);


INSERT INTO `viv_exp_type_en` (`_exp_type_id`, `_exp_type_text`, `_exp_type_comments`, `_exp_type_status`, `_exp_type_addedby`, `_exp_type_addedon`, `_exp_type_lastmodby`, `_exp_type_lastmodon`) VALUES
(2, 'Misc', 'Hello', 1, 'bajjuri6', 0, 'bajjuri6', 0),
(3, 'random', 'hello', 1, 'bajjuri6', 1375308209, 'bajjuri6', 1375308209);


INSERT INTO `viv_emp_en` (`_emp_id`, `_emp_branch`, `_emp_un`, `_emp_pw`, `_emp_level`, `_emp_status`, `_emp_lastlogin`) VALUES
(12, 'DSNR', 'bajjuri6', 'ceee3fb19521ed6bf264663ad58838d4', 'Admin', 1, NULL),
(14, 'DSNR', 'prasad', 'fa1d87bc7f85769ea9dee2e4957321ae', 'Admin', 1, NULL),
(15, 'Nagole', 'sandeep', '00dcf16d903e5890aaba465b0b1ba51f', 'Manager', 1, NULL),
(16, 'Green Hills Colony', 'venu', '8997716da5c109c645ab3b7d8921342f', 'Standard', 1, NULL),
(17, 'Hitech City', 'dev', 'e77989ed21758e78331b20e477fc5582', 'Standard', 1, NULL);

INSERT INTO `viv_cust_phy_en` (`_cust_phy_id`, `_cust_phy_un`, `_cust_phy_wt`, `_cust_phy_ht`, `_cust_phy_chest`, `_cust_phy_shoulder`, `_cust_phy_waist`, `_cust_phy_bicep`, `_cust_phy_calf`, `_cust_phy_date`, `_cust_phy_remarks`, `_cust_phy_status`, `_cust_phy_addedby`, `_cust_phy_addedon`, `_cust_phy_lastmodby`, `_cust_phy_lastmodon`) VALUES
(1, '', 66.00, 5.80, 132.00, 234.00, 32.00, 16.00, 9.00, 2013, 'pretty sexy, huh?', 1, 'bajjuri6', 1375126021, 'bajjuri6', 1375126021);


INSERT INTO `viv_branch_tmngs_en` (`_branch_tmngs_id`, `_branch_tmngs_name`, `_branch_tmngs_ot`, `_branch_tmngs_ct`, `_branch_tmngs_cmnts`, `_branch_tmngs_addedby`, `_branch_tmngs_addedon`) VALUES
(1, 'Green Hills Colony', '10:30', '9:40', 'The rocking world of SaddaHaq!', 'bajjuri6', '2013-07-19 07:34:34'),
(2, 'Hitech City', '10:00 AM', '11:00 PM', 'Itu raaye', 'bajjuri6', '2013-07-19 07:38:48'),
(3, 'Vijayalakshmi', '10:30', '9:40', 'hey, there!', 'bajjuri6', '2013-07-19 07:41:11');

INSERT INTO `viv_cust_emer_en` (`_cust_emer_id`, `_cust_emer_un`, `_cust_emer_name`, `_cust_emer_ph`, `_cust_emer_email`, `_cust_emer_addr`, `_cust_emer_remarks`, `_cust_emer_status`, `_cust_emer_addedby`, `_cust_emer_addedon`, `_cust_emer_lastmodby`, `_cust_emer_lastmodon`) VALUES
(1, 'odel_pallav', 'Vijaya Bajjuri', '9440667391', 'none@saddahaq.com', 'Green Hills Colony', 'Mother', 1, 'bajjuri6', 1375123844, 'bajjuri6', 1375123844);

INSERT INTO `viv_cust_en` (`_cust_id`, `_cust_un`, `_cust_name`, `_cust_ph`, `_cust_addr`, `_cust_email`, `_cust_branch`, `_cust_status`, `_cust_addedby`, `_cust_addedon`, `_cust_lastmodby`, `_cust_lastmodon`) VALUES
(1, 'odel_pallav', 'Pallav Bajjuri', '9160044559', 'Green Hills Colony, Hyderabad', 'bajjuri6@gmail.com', 'Nagole', 1, 'ADMIN', 2013, 'ADMIN', 2013),
(9, 'odel_rag', 'Raghavulu Bajjuri', '9849544559', 'Hello', 'bajjuri27@gmail.com', 'DSNR', 1, 'bajjuri6', 1375123844, 'bajjuri6', 1375123844);


INSERT INTO `viv_cust_det_en` (`_cust_det_id`, `_cust_det_un`, `_cust_det_pro`, `_cust_det_sex`, `_cust_det_dob`, `_cust_det_marital`, `_cust_det_ref`, `_cust_det_status`, `_cust_det_addedby`, `_cust_det_addedon`, `_cust_det_lastmodby`, `_cust_det_lastmodon`) VALUES
(2, 'odel_pallav', 'Business', 0, 2013, 0, 'Sandeep', 1, 'bajjuri6', 1375123844, 'bajjuri6', 1375123844);

