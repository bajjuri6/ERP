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
  PRIMARY KEY (`_branch_id`),
  KEY `_branch_name` (`_branch_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `viv_branch_en` (`_branch_id`, `_branch_name`, `_branch_manager`, `_branch_addr`, `_branch_cmnts`, `_branch_ot`, `_branch_ct`, `_branch_active`, `_branch_addedby`, `_branch_addedon`, `_branch_lastmodby`, `_branch_lastmodon`) VALUES
(1, 'Nagole', 'Wahed', 'Shubhodaya Towers, 3rd Floor, Alakapuri, Nagole, Hyderabad - 500068', 'NONE', '6:00 AM', '10:00 PM', 1, 'admin', 1376568769, 'admin', 1376568769);

CREATE TABLE IF NOT EXISTS `viv_branch_tmngs_en` (
  `_branch_tmngs_id` int(11) NOT NULL AUTO_INCREMENT,
  `_branch_tmngs_name` varchar(30) NOT NULL,
  `_branch_tmngs_ot` varchar(30) NOT NULL,
  `_branch_tmngs_ct` varchar(30) NOT NULL,
  `_branch_tmngs_cmnts` text,
  `_branch_tmngs_addedby` varchar(40) NOT NULL,
  `_branch_tmngs_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_branch_tmngs_id`),
  KEY `_branch_tmngs_name` (`_branch_tmngs_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_cust_attach_id`),
  KEY `_cust_attach_un` (`_cust_attach_un`),
  KEY `_cust_status` (`_cust_attach_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_att_en` (
  `_cust_att_id` int(11) NOT NULL,
  `_cust_att_un` varchar(40) NOT NULL,
  `_cust_att_date` date NOT NULL,
  `_cust_att_remarks` text NOT NULL,
  `_cust_att_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_att_addedby` varchar(40) NOT NULL,
  `_cust_att_addedon` int(11) NOT NULL,
  `_cust_att_lastmodby` varchar(40) NOT NULL,
  `_cust_att_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_att_id`),
  KEY `_cust_att_un` (`_cust_att_un`),
  KEY `_cust_status` (`_cust_att_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `viv_cust_det_en` (
  `_cust_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_det_un` varchar(40) NOT NULL,
  `_cust_det_ph` varchar(15) NOT NULL,
  `_cust_det_addr` text NOT NULL,
  `_cust_det_email` varchar(40) NOT NULL,
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
  PRIMARY KEY (`_cust_det_id`),
  KEY `_cust_det_un` (`_cust_det_un`),
  KEY `_cust_status` (`_cust_det_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_cust_due_id`),
  KEY `_cust_due_un` (`_cust_due_un`),
  KEY `_cust_status` (`_cust_due_status`)
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
  PRIMARY KEY (`_cust_emer_id`),
  KEY `_cust_emer_un` (`_cust_emer_un`),
  KEY `_cust_status` (`_cust_emer_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_cust_en` (
  `_cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_un` varchar(40) NOT NULL,
  `_cust_name` varchar(40) NOT NULL,
  `_cust_branch` varchar(30) NOT NULL,
  `_cust_service` varchar(20) NOT NULL,
  `_cust_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_addedby` varchar(40) NOT NULL,
  `_cust_addedon` int(11) NOT NULL,
  `_cust_lastmodby` varchar(40) NOT NULL,
  `_cust_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_cust_id`),
  KEY `_cust_un` (`_cust_un`),
  KEY `_cust_status_pri` (`_cust_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_cust_enr_id`),
  KEY `_cust_enr_un` (`_cust_enr_un`),
  KEY `_cust_status` (`_cust_enr_status`)
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
  PRIMARY KEY (`_cust_fdb_id`),
  KEY `_cust_fdb_un` (`_cust_fdb_un`),
  KEY `_cust_status` (`_cust_fdb_status`)
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
  PRIMARY KEY (`_cust_med_id`),
  KEY `_cust_med_un` (`_cust_med_un`),
  KEY `_cust_status` (`_cust_med_status`)
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
  PRIMARY KEY (`_cust_phy_id`),
  KEY `_cust_phy_un` (`_cust_phy_un`),
  KEY `_cust_status` (`_cust_phy_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_dept_id`),
  KEY `_dept_branch` (`_dept_branch`)
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
  PRIMARY KEY (`_emp_attach_id`),
  KEY `_emp_attach_un` (`_emp_attach_un`),
  KEY `_emp_status` (`_emp_attach_status`)
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
  PRIMARY KEY (`_emp_att_id`),
  KEY `_emp_status` (`_emp_att_status`),
  KEY `_emp_un` (`_emp_att_un`)
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
  PRIMARY KEY (`_emp_emer_id`),
  KEY `_emp_un` (`_emp_emer_un`),
  KEY `_emp_status` (`_emp_emer_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_en` (
  `_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_name` varchar(30) NOT NULL,
  `_emp_branch` varchar(30) NOT NULL,
  `_emp_un` varchar(48) NOT NULL,
  `_emp_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_addedby` varchar(40) NOT NULL,
  `_emp_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_id`),
  UNIQUE KEY `_emp_un_pri` (`_emp_un`),
  KEY `_emp_branch` (`_emp_branch`),
  KEY `_emp_status_pri` (`_emp_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `viv_emp_en` (`_emp_id`, `_emp_name`, `_emp_branch`, `_emp_un`, `_emp_status`, `_emp_addedby`, `_emp_addedon`) VALUES
(1, 'Pallav Bajjuri', 'Nagole', 'bajjuri6', 1, 'admin', 1376568769);

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
  PRIMARY KEY (`_emp_fdb_id`),
  KEY `_emp_un` (`_emp_fdb_un`),
  KEY `_emp_status` (`_emp_fdb_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_emp_perks_en` (
  `_emp_perk_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_perk_un` varchar(40) NOT NULL,
  `_emp_perk_type` tinyint(4) NOT NULL,
  `_emp_perk_detail` int(11) NOT NULL,
  `_emp_perk_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_perk_addedby` varchar(40) NOT NULL,
  `_emp_perk_addedon` int(11) NOT NULL,
  `_emp_perk_lastmodby` varchar(40) NOT NULL,
  `_emp_perk_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_emp_perk_id`),
  KEY `_emp_un` (`_emp_perk_un`),
  KEY `_emp_status` (`_emp_perk_status`)
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
  PRIMARY KEY (`_emp_per_id`),
  KEY `_emp_un` (`_emp_per_un`),
  KEY `_emp_status` (`_emp_per_status`)
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
  PRIMARY KEY (`_emp_pro_id`),
  KEY `_emp_un` (`_emp_pro_un`),
  KEY `_emp_status` (`_emp_pro_status`),
  KEY `_emp_pro_branch` (`_emp_pro_branch`)
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
  PRIMARY KEY (`_emp_sal_id`),
  KEY `_emp_un` (`_emp_sal_un`),
  KEY `_emp_status` (`_emp_sal_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_det_en` (
  `_exp_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_det_tn` varchar(20) NOT NULL,
  `_exp_det_phone_number` varchar(20) NOT NULL,
  `_exp_det_payment_mode` varchar(20) NOT NULL,
  `_exp_det_payment_mode_details` text NOT NULL,
  `_exp_det_remarks` text NOT NULL,
  `_exp_det_addedby` varchar(40) NOT NULL,
  `_exp_det_addedon` int(11) NOT NULL,
  `_exp_det_lastmodby` varchar(40) NOT NULL,
  `_exp_det_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_exp_det_id`),
  KEY `_exp_tn` (`_exp_det_tn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_en` (
  `_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_tn` varchar(20) NOT NULL,
  `_exp_owed_to` varchar(40) NOT NULL,
  `_exp_branch` varchar(20) NOT NULL,
  `_exp_type` varchar(20) NOT NULL,
  `_exp_amount` decimal(10,2) NOT NULL,
  `_exp_date` int(11) NOT NULL,
  `_exp_remarks` text NOT NULL,
  `_exp_status` tinyint(4) NOT NULL DEFAULT '1',
  `_exp_addedby` varchar(40) NOT NULL,
  `_exp_addedon` int(11) NOT NULL,
  `_exp_lastmodby` varchar(40) NOT NULL,
  `_exp_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_exp_id`),
  KEY `_exp_tn_pri` (`_exp_tn`),
  KEY `_exp_branch` (`_exp_branch`),
  KEY `_exp_tn` (`_exp_tn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_exp_type_en` (
  `_exp_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_type_text` varchar(40) NOT NULL,
  `_exp_type_comments` text NOT NULL,
  `_exp_type_status` tinyint(4) NOT NULL DEFAULT '1',
  `_exp_type_addedby` varchar(40) NOT NULL,
  `_exp_type_addedon` int(11) NOT NULL,
  `_exp_type_lastmodby` varchar(40) NOT NULL,
  `_exp_type_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_exp_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_inq_id`),
  KEY `_inq_branch` (`_inq_branch`),
  KEY `_inq_emp_un` (`_inq_emp_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_inq_flw_id`),
  KEY `_inq_flw_emp_un` (`_inq_flw_emp_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_lgn_rec_en` (
  `_lgn_id` int(11) NOT NULL AUTO_INCREMENT,
  `_lgn_un` varchar(40) NOT NULL,
  `_lgn_ip` varchar(20) NOT NULL,
  `_lgn_loc` varchar(40) NOT NULL,
  `_lgn_time` int(11) NOT NULL,
  PRIMARY KEY (`_lgn_id`),
  KEY `_lgn_un` (`_lgn_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_payment_en` (
  `_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_tn` varchar(20) NOT NULL,
  `_payment_un` varchar(40) NOT NULL,
  `_payment_branch` varchar(30) NOT NULL,
  `_payment_date` int(11) NOT NULL,
  `_payment_amt` decimal(10,2) NOT NULL,
  `_payment_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_comments` text NOT NULL,
  `_payment_addedby` varchar(40) NOT NULL,
  `_payment_addedon` int(11) NOT NULL,
  `_payment_lastmodby` varchar(40) NOT NULL,
  `_payment_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_id`),
  UNIQUE KEY `_payment_tn` (`_payment_tn`),
  KEY `_payment_un` (`_payment_un`),
  KEY `_payment_branch` (`_payment_branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_payment_md_en` (
  `_payment_md_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_md_name` varchar(20) NOT NULL,
  `_payment_md_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_md_branch` varchar(20) NOT NULL,
  `_payment_md_comments` text NOT NULL,
  `_payment_md_addedby` varchar(40) NOT NULL,
  `_payment_md_addedon` int(11) NOT NULL,
  `_payment_md_lastmodby` varchar(40) NOT NULL,
  `_payment_md_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_md_id`),
  KEY `_payment_md_branch` (`_payment_md_branch`),
  KEY `_payment_md_name` (`_payment_md_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_payment_peri_en` (
  `_payment_peri_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_peri_tn` varchar(20) NOT NULL,
  `_payment_peri_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_peri_rcvdby` varchar(40) NOT NULL,
  `_payment_peri_mode` varchar(20) NOT NULL,
  `_payment_peri_details` text NOT NULL,
  `_payment_peri_due` decimal(10,2) NOT NULL,
  `_payment_peri_bal` decimal(10,2) NOT NULL,
  `_payment_peri_next` int(11) NOT NULL,
  `_payment_peri_incharge` varchar(40) NOT NULL,
  `_payment_peri_addedby` varchar(40) NOT NULL,
  `_payment_peri_addedon` int(11) NOT NULL,
  `_payment_peri_lastmodby` varchar(40) NOT NULL,
  `_payment_peri_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_payment_peri_id`),
  KEY `_payment_peri_tn` (`_payment_peri_tn`),
  KEY `_payment_peri_mode` (`_payment_peri_mode`),
  KEY `_payment_peri_incharge` (`_payment_peri_incharge`),
  KEY `_payment_peri_rcvdby` (`_payment_peri_rcvdby`)
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
  PRIMARY KEY (`_srv_id`),
  KEY `_srv_branch` (`_srv_branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`_srv_sub_id`),
  KEY `_srv_sub_cust` (`_srv_sub_cust`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_usr_en` (
  `_usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_un` varchar(10) NOT NULL,
  `_usr_pw` varchar(36) NOT NULL,
  `_usr_branch` varchar(30) NOT NULL,
  `_usr_level` varchar(20) NOT NULL,
  `_usr_status` tinyint(4) NOT NULL DEFAULT '1',
  `_usr_addedby` varchar(40) NOT NULL,
  `_usr_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_usr_id`),
  KEY `_usr_un` (`_usr_un`),
  KEY `_usr_status` (`_usr_status`),
  KEY `_usr_branch` (`_usr_branch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `viv_usr_en` (`_usr_id`, `_usr_un`, `_usr_pw`, `_usr_branch`, `_usr_level`, `_usr_status`, `_usr_addedby`, `_usr_addedon`) VALUES
(3, 'bajjuri6', '1bbf5e556f1c8a09f52150430443d10f', 'Nagole', 'admin', 1, 'admin', 1376568769);

CREATE TABLE IF NOT EXISTS `viv_usr_level_en` (
  `_usr_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_level_name` varchar(10) NOT NULL,
  `_usr_level_active` tinyint(4) NOT NULL DEFAULT '1',
  `_usr_level_addedby` varchar(40) NOT NULL,
  `_usr_level_addedon` int(11) NOT NULL,
  PRIMARY KEY (`_usr_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `viv_usr_level_perm_en` (
  `_usr_level_perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_level_perm_name` varchar(10) NOT NULL,
  `_usr_level_perm_val` varchar(10) NOT NULL,
  `_usr_level_perm_addedby` varchar(40) NOT NULL,
  `_usr_level_perm_addedon` int(11) NOT NULL,
  `_usr_level_perm_lastmodby` varchar(40) NOT NULL,
  `_usr_level_perm_lastmodon` int(11) NOT NULL,
  PRIMARY KEY (`_usr_level_perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


ALTER TABLE `viv_branch_tmngs_en`
  ADD CONSTRAINT `viv_branch_tmngs_en_ibfk_1` FOREIGN KEY (`_branch_tmngs_name`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_attach_en`
  ADD CONSTRAINT `viv_cust_attach_en_ibfk_1` FOREIGN KEY (`_cust_attach_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_attach_en_ibfk_2` FOREIGN KEY (`_cust_attach_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_att_en`
  ADD CONSTRAINT `viv_cust_att_en_ibfk_1` FOREIGN KEY (`_cust_att_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_att_en_ibfk_2` FOREIGN KEY (`_cust_att_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_det_en`
  ADD CONSTRAINT `viv_cust_det_en_ibfk_1` FOREIGN KEY (`_cust_det_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_det_en_ibfk_2` FOREIGN KEY (`_cust_det_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_due_en`
  ADD CONSTRAINT `viv_cust_due_en_ibfk_1` FOREIGN KEY (`_cust_due_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_due_en_ibfk_2` FOREIGN KEY (`_cust_due_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_emer_en`
  ADD CONSTRAINT `viv_cust_emer_en_ibfk_1` FOREIGN KEY (`_cust_emer_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_emer_en_ibfk_2` FOREIGN KEY (`_cust_emer_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_enr_en`
  ADD CONSTRAINT `viv_cust_enr_en_ibfk_1` FOREIGN KEY (`_cust_enr_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_enr_en_ibfk_2` FOREIGN KEY (`_cust_enr_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_fdb_en`
  ADD CONSTRAINT `viv_cust_fdb_en_ibfk_1` FOREIGN KEY (`_cust_fdb_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_fdb_en_ibfk_2` FOREIGN KEY (`_cust_fdb_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_med_en`
  ADD CONSTRAINT `viv_cust_med_en_ibfk_1` FOREIGN KEY (`_cust_med_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_med_en_ibfk_2` FOREIGN KEY (`_cust_med_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_cust_phy_en`
  ADD CONSTRAINT `viv_cust_phy_en_ibfk_1` FOREIGN KEY (`_cust_phy_un`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_cust_phy_en_ibfk_2` FOREIGN KEY (`_cust_phy_status`) REFERENCES `viv_cust_en` (`_cust_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_dept_en`
  ADD CONSTRAINT `viv_dept_en_ibfk_1` FOREIGN KEY (`_dept_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_attach_en`
  ADD CONSTRAINT `viv_emp_attach_en_ibfk_1` FOREIGN KEY (`_emp_attach_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_attach_en_ibfk_2` FOREIGN KEY (`_emp_attach_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_att_en`
  ADD CONSTRAINT `viv_emp_att_en_ibfk_1` FOREIGN KEY (`_emp_att_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_att_en_ibfk_2` FOREIGN KEY (`_emp_att_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_emer_en`
  ADD CONSTRAINT `viv_emp_emer_en_ibfk_1` FOREIGN KEY (`_emp_emer_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_emer_en_ibfk_2` FOREIGN KEY (`_emp_emer_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_en`
  ADD CONSTRAINT `viv_emp_en_ibfk_1` FOREIGN KEY (`_emp_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_fdb_en`
  ADD CONSTRAINT `viv_emp_fdb_en_ibfk_1` FOREIGN KEY (`_emp_fdb_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_fdb_en_ibfk_2` FOREIGN KEY (`_emp_fdb_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_perks_en`
  ADD CONSTRAINT `viv_emp_perks_en_ibfk_1` FOREIGN KEY (`_emp_perk_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_perks_en_ibfk_2` FOREIGN KEY (`_emp_perk_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_per_en`
  ADD CONSTRAINT `viv_emp_per_en_ibfk_1` FOREIGN KEY (`_emp_per_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_per_en_ibfk_2` FOREIGN KEY (`_emp_per_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_pro_en`
  ADD CONSTRAINT `viv_emp_pro_en_ibfk_1` FOREIGN KEY (`_emp_pro_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_pro_en_ibfk_2` FOREIGN KEY (`_emp_pro_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_pro_en_ibfk_3` FOREIGN KEY (`_emp_pro_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_emp_sal_en`
  ADD CONSTRAINT `viv_emp_sal_en_ibfk_1` FOREIGN KEY (`_emp_sal_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_emp_sal_en_ibfk_2` FOREIGN KEY (`_emp_sal_status`) REFERENCES `viv_emp_en` (`_emp_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_exp_det_en`
  ADD CONSTRAINT `viv_exp_det_en_ibfk_1` FOREIGN KEY (`_exp_det_tn`) REFERENCES `viv_exp_en` (`_exp_tn`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_inq_en`
  ADD CONSTRAINT `viv_inq_en_ibfk_1` FOREIGN KEY (`_inq_emp_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_inq_en_ibfk_2` FOREIGN KEY (`_inq_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_inq_flw_en`
  ADD CONSTRAINT `viv_inq_flw_en_ibfk_1` FOREIGN KEY (`_inq_flw_emp_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_lgn_rec_en`
  ADD CONSTRAINT `viv_lgn_rec_en_ibfk_1` FOREIGN KEY (`_lgn_un`) REFERENCES `viv_usr_en` (`_usr_un`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_payment_md_en`
  ADD CONSTRAINT `viv_payment_md_en_ibfk_1` FOREIGN KEY (`_payment_md_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_payment_peri_en`
  ADD CONSTRAINT `viv_payment_peri_en_ibfk_1` FOREIGN KEY (`_payment_peri_tn`) REFERENCES `viv_payment_en` (`_payment_tn`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_payment_peri_en_ibfk_2` FOREIGN KEY (`_payment_peri_rcvdby`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_payment_peri_en_ibfk_3` FOREIGN KEY (`_payment_peri_incharge`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_payment_peri_en_ibfk_4` FOREIGN KEY (`_payment_peri_mode`) REFERENCES `viv_payment_md_en` (`_payment_md_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_srv_sub_en`
  ADD CONSTRAINT `viv_srv_sub_en_ibfk_1` FOREIGN KEY (`_srv_sub_cust`) REFERENCES `viv_cust_en` (`_cust_un`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `viv_usr_en`
  ADD CONSTRAINT `viv_usr_en_ibfk_2` FOREIGN KEY (`_usr_un`) REFERENCES `viv_emp_en` (`_emp_un`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `viv_usr_en_ibfk_1` FOREIGN KEY (`_usr_branch`) REFERENCES `viv_branch_en` (`_branch_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
