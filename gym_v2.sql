-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2013 at 03:29 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17-1~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gym_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `viv_app_en`
--

CREATE TABLE IF NOT EXISTS `viv_app_en` (
  `_app_id` int(11) NOT NULL AUTO_INCREMENT,
  `_app_comp` varchar(30) NOT NULL,
  `_app_numbranches` tinyint(4) NOT NULL,
  `_app_status` tinyint(4) NOT NULL DEFAULT '1',
  `_app_expiry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_branch_en`
--

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
  `_branch_addedon` timestamp NULL DEFAULT NULL,
  `_branch_lastmodby` varchar(40) NOT NULL,
  `_branch_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_branch_tmngs_en`
--

CREATE TABLE IF NOT EXISTS `viv_branch_tmngs_en` (
  `_branch_tmngs_id` int(11) NOT NULL AUTO_INCREMENT,
  `_branch_tmngs_name` varchar(30) NOT NULL,
  `_branch_tmngs_ot` varchar(30) NOT NULL,
  `_branch_tmngs_ct` varchar(30) NOT NULL,
  `_branch_tmngs_cmnts` text,
  `_branch_tmngs_addedby` varchar(40) NOT NULL,
  `_branch_tmngs_addedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_branch_tmngs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_attach_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_attach_en` (
  `_cust_attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_attach_un` varchar(40) NOT NULL,
  `_cust_attach_date` int(11) NOT NULL,
  `_cust_attach_url` varchar(100) NOT NULL,
  `_cust_attach_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_attach_addedby` varchar(40) NOT NULL,
  `_cust_attach_addedon` timestamp NULL DEFAULT NULL,
  `_cust_attach_lastmodby` varchar(40) NOT NULL,
  `_cust_attach_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_attach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_att_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_att_en` (
  `_cust_att_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_att_un` varchar(40) NOT NULL,
  `_cust_att_date` date NOT NULL,
  `_cust_att_remarks` text NOT NULL,
  `_cust_att_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_att_addedby` varchar(40) NOT NULL,
  `_cust_att_addedon` timestamp NULL DEFAULT NULL,
  `_cust_att_lastmodby` varchar(40) NOT NULL,
  `_cust_att_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_att_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_det_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_det_en` (
  `_cust_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_det_un` varchar(40) NOT NULL,
  `_cust_det_sex` tinyint(4) NOT NULL,
  `_cust_det_dob` int(11) NOT NULL,
  `_cust_det_ref` varchar(40) NOT NULL,
  `_cust_det_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_det_addedby` varchar(40) NOT NULL,
  `_cust_det_addedon` timestamp NULL DEFAULT NULL,
  `_cust_det_lastmodby` varchar(40) NOT NULL,
  `_cust_det_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_det_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_due_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_due_en` (
  `_cust_due_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_due_un` varchar(40) NOT NULL,
  `_cust_due_amt` varchar(40) NOT NULL,
  `_cust_due_lastdate` int(11) NOT NULL,
  `_cust_due_flw` varchar(40) NOT NULL,
  `_cust_due_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_due_addedby` varchar(40) NOT NULL,
  `_cust_due_addedon` timestamp NULL DEFAULT NULL,
  `_cust_due_lastmodby` varchar(40) NOT NULL,
  `_cust_due_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_due_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_emer_en`
--

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
  `_cust_emer_addedon` timestamp NULL DEFAULT NULL,
  `_cust_emer_lastmodby` varchar(40) NOT NULL,
  `_cust_emer_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_emer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_en`
--

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
  `_cust_addedon` timestamp NULL DEFAULT NULL,
  `_cust_lastmodby` varchar(40) NOT NULL,
  `_cust_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_enr_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_enr_en` (
  `_cust_enr_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_enr_un` varchar(40) NOT NULL,
  `_cust_enr_srv` varchar(40) NOT NULL,
  `_cust_enr_start` int(11) NOT NULL,
  `_cust_enr_end` int(11) NOT NULL,
  `_cust_enr_ref` varchar(40) NOT NULL,
  `_cust_enr_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_enr_addedby` varchar(40) NOT NULL,
  `_cust_enr_addedon` timestamp NULL DEFAULT NULL,
  `_cust_enr_lastmodby` varchar(40) NOT NULL,
  `_cust_enr_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_enr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_fdb_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_fdb_en` (
  `_cust_fdb_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_fdb_un` varchar(40) NOT NULL,
  `_cust_fdb_date` int(11) NOT NULL,
  `_cust_fdb_remarks` text NOT NULL,
  `_cust_fdb_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_fdb_addedby` varchar(40) NOT NULL,
  `_cust_fdb_addedon` timestamp NULL DEFAULT NULL,
  `_cust_fdb_lastmodby` varchar(40) NOT NULL,
  `_cust_fdb_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_fdb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_med_en`
--

CREATE TABLE IF NOT EXISTS `viv_cust_med_en` (
  `_cust_med_id` int(11) NOT NULL AUTO_INCREMENT,
  `_cust_med_un` varchar(40) NOT NULL,
  `_cust_med_date` int(11) NOT NULL,
  `_cust_med_detail` text NOT NULL,
  `_cust_med_status` tinyint(4) NOT NULL DEFAULT '1',
  `_cust_med_addedby` varchar(40) NOT NULL,
  `_cust_med_addedon` timestamp NULL DEFAULT NULL,
  `_cust_med_lastmodby` varchar(40) NOT NULL,
  `_cust_med_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_med_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_cust_phy_en`
--

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
  `_cust_phy_addedon` timestamp NULL DEFAULT NULL,
  `_cust_phy_lastmodby` varchar(40) NOT NULL,
  `_cust_phy_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_cust_phy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_dept_en`
--

CREATE TABLE IF NOT EXISTS `viv_dept_en` (
  `_dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `_dept_name` varchar(30) NOT NULL,
  `_dept_branch` varchar(30) NOT NULL,
  `_dept_manager` text NOT NULL,
  `_dept_cmnts` text NOT NULL,
  `_dept_addedby` varchar(40) NOT NULL,
  `_dept_addedon` timestamp NULL DEFAULT NULL,
  `_dept_lastmodby` varchar(40) NOT NULL,
  `_dept_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_attach_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_attach_en` (
  `_emp_attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_attach_un` varchar(40) NOT NULL,
  `_emp_attach_date` int(11) NOT NULL,
  `_emp_attach_url` varchar(100) NOT NULL,
  `_emp_attach_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_attach_addedby` varchar(40) NOT NULL,
  `_emp_attach_addedon` timestamp NULL DEFAULT NULL,
  `_emp_attach_lastmodby` varchar(40) NOT NULL,
  `_emp_attach_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_attach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_att_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_att_en` (
  `_emp_att_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_att_un` varchar(40) NOT NULL,
  `_emp_att_date` date NOT NULL,
  `_emp_att_mark` tinyint(4) NOT NULL,
  `_emp_att_remarks` text,
  `_emp_att_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_att_addedby` varchar(40) NOT NULL,
  `_emp_att_addedon` timestamp NULL DEFAULT NULL,
  `_emp_att_lastmodby` varchar(40) NOT NULL,
  `_emp_att_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_att_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_emer_en`
--

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
  `_emp_emer_addedon` timestamp NULL DEFAULT NULL,
  `_emp_emer_lastmodby` varchar(40) NOT NULL,
  `_emp_emer_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_emer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_en` (
  `_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_branch` varchar(30) NOT NULL,
  `_emp_un` varchar(30) NOT NULL,
  `_emp_pw` varchar(48) NOT NULL,
  `_emp_level` tinyint(4) NOT NULL,
  `_emp_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_lastlogin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`_emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_fdb_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_fdb_en` (
  `_emp_fdb_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_fdb_un` varchar(40) NOT NULL,
  `_emp_fdb_date` int(11) NOT NULL,
  `_emp_fdb_remarks` text NOT NULL,
  `_emp_fdb_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_fdb_addedby` varchar(40) NOT NULL,
  `_emp_fdb_addedon` timestamp NULL DEFAULT NULL,
  `_emp_fdb_lastmodby` varchar(40) NOT NULL,
  `_emp_fdb_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_fdb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_level_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_level_en` (
  `_emp_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_level_text` varchar(40) NOT NULL,
  `_emp_level_remarks` text NOT NULL,
  `_emp_level_addedby` varchar(40) NOT NULL,
  `_emp_level_addedon` timestamp NULL DEFAULT NULL,
  `_emp_level_lastmodby` varchar(40) NOT NULL,
  `_emp_level_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_perks_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_perks_en` (
  `_emp_perk_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_perk_un` varchar(40) NOT NULL,
  `_emp_perk_type` tinyint(4) NOT NULL,
  `_emp_perk_detail` int(11) NOT NULL,
  `_emp_perks_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_perk_addedby` varchar(40) NOT NULL,
  `_emp_perk_addedon` timestamp NULL DEFAULT NULL,
  `_emp_perk_lastmodby` varchar(40) NOT NULL,
  `_emp_perk_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_perk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_per_en`
--

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
  `_emp_per_addedon` timestamp NULL DEFAULT NULL,
  `_emp_per_lastmodby` varchar(40) NOT NULL,
  `_emp_per_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_pro_en`
--

CREATE TABLE IF NOT EXISTS `viv_emp_pro_en` (
  `_emp_pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `_emp_pro_un` varchar(40) NOT NULL,
  `_emp_pro_branch` varchar(30) NOT NULL,
  `_emp_pro_shift` varchar(1) NOT NULL,
  `_emp_pro_type` varchar(2) NOT NULL,
  `_emp_pro_supervisor_un` varchar(40) NOT NULL,
  `_emp_pro_doj` int(11) NOT NULL,
  `_emp_pro_designation` varchar(60) NOT NULL,
  `_emp_pro_sal` decimal(10,2) NOT NULL,
  `_emp_pro_remarks` text,
  `_emp_pro_status` tinyint(4) NOT NULL DEFAULT '1',
  `_emp_pro_addedby` varchar(40) NOT NULL,
  `_emp_pro_addedon` int(11) DEFAULT NULL,
  `_emp_pro_lastmodby` varchar(40) NOT NULL,
  `_emp_pro_lastmodon` int(11) DEFAULT NULL,
  PRIMARY KEY (`_emp_pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_emp_sal_en`
--

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
  `_emp_sal_addedon` timestamp NULL DEFAULT NULL,
  `_emp_sal_lastmodby` varchar(40) NOT NULL,
  `_emp_sal_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_emp_sal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_exp_det_en`
--

CREATE TABLE IF NOT EXISTS `viv_exp_det_en` (
  `_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_type` tinyint(4) NOT NULL,
  `_exp_amount` decimal(10,2) NOT NULL,
  `_exp_paid_to` varchar(40) NOT NULL,
  `_exp_paid_by` varchar(40) NOT NULL,
  `_exp_paid_on` int(11) NOT NULL,
  `_exp_payment_mode` tinyint(4) NOT NULL,
  `_exp_remarks` text NOT NULL,
  `_exp_addedby` varchar(40) NOT NULL,
  `_exp_addedon` timestamp NULL DEFAULT NULL,
  `_exp_lastmodby` varchar(40) NOT NULL,
  `_exp_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_exp_type_en`
--

CREATE TABLE IF NOT EXISTS `viv_exp_type_en` (
  `_exp_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `_exp_type_text` varchar(40) NOT NULL,
  `_exp_type_remarks` text NOT NULL,
  `_exp_type_addedby` varchar(40) NOT NULL,
  `_exp_type_addedon` timestamp NULL DEFAULT NULL,
  `_exp_type_lastmodby` varchar(40) NOT NULL,
  `_exp_type_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_exp_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_inq_en`
--

CREATE TABLE IF NOT EXISTS `viv_inq_en` (
  `_inq_id` int(11) NOT NULL AUTO_INCREMENT,
  `_inq_emp_un` varchar(40) NOT NULL,
  `_inq_branch` varchar(30) NOT NULL,
  `_inq_cus_name` varchar(40) NOT NULL,
  `_inq_cus_email` varchar(100) NOT NULL,
  `_inq_cus_pnum` int(13) NOT NULL,
  `_inq_time` int(11) NOT NULL,
  `_inq_ref` varchar(60) NOT NULL,
  `_inq_ref_cmnts` text NOT NULL,
  `_inq_type` varchar(30) NOT NULL,
  `_inq_cmnts` text NOT NULL,
  `_inq_status` tinyint(4) NOT NULL DEFAULT '1',
  `_inq_addedby` varchar(40) NOT NULL,
  `_inq_addedon` int(11) DEFAULT NULL,
  `_inq_lastmodby` varchar(40) NOT NULL,
  `_inq_lastmodon` int(11) DEFAULT NULL,
  PRIMARY KEY (`_inq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_inq_flw_en`
--

CREATE TABLE IF NOT EXISTS `viv_inq_flw_en` (
  `_inq_flw_id` int(11) NOT NULL AUTO_INCREMENT,
  `_inq_flw_emp_un` varchar(40) NOT NULL,
  `_inq_flw_cus_name` varchar(40) NOT NULL,
  `_inq_flw_time` int(11) NOT NULL,
  `_inq_flw_status` tinyint(4) NOT NULL,
  `_inq_flw_cmnts` text NOT NULL,
  `_inq_flw_addedby` varchar(40) NOT NULL,
  `_inq_flw_addedon` timestamp NULL DEFAULT NULL,
  `_inq_flw_lastmodby` varchar(40) NOT NULL,
  `_inq_flw_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_inq_flw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_lgn_rec_en`
--

CREATE TABLE IF NOT EXISTS `viv_lgn_rec_en` (
  `_lgn_id` int(11) NOT NULL AUTO_INCREMENT,
  `_lgn_un` varchar(40) NOT NULL,
  `_lgn_ip` varchar(20) NOT NULL,
  `_lgn_loc` varchar(40) NOT NULL,
  `_lgn_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`_lgn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_payment_en`
--

CREATE TABLE IF NOT EXISTS `viv_payment_en` (
  `_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_branch` varchar(30) NOT NULL,
  `_payment_un` varchar(40) NOT NULL,
  `_payment_date` int(11) NOT NULL,
  `_payment_amt` decimal(10,2) NOT NULL,
  `_payment_mode` tinyint(4) NOT NULL,
  `_payment_rcvdby` decimal(10,2) NOT NULL,
  `_payment_det` text NOT NULL,
  `_payment_addedby` varchar(40) NOT NULL,
  `_payment_addedon` timestamp NULL DEFAULT NULL,
  `_payment_lastmodby` varchar(40) NOT NULL,
  `_payment_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_payment_md_en`
--

CREATE TABLE IF NOT EXISTS `viv_payment_md_en` (
  `_payment_md_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_md_name` varchar(30) NOT NULL,
  `_payment_md_fields` text NOT NULL,
  `_payment_md_status` tinyint(4) NOT NULL DEFAULT '1',
  `_payment_md_branches` text NOT NULL,
  `_payment_md_level` text NOT NULL,
  `_payment_md_addedby` varchar(40) NOT NULL,
  `_payment_md_addedon` timestamp NULL DEFAULT NULL,
  `_payment_md_lastmodby` varchar(40) NOT NULL,
  `_payment_md_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_payment_md_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_payment_peri_en`
--

CREATE TABLE IF NOT EXISTS `viv_payment_peri_en` (
  `_payment_peri_id` int(11) NOT NULL AUTO_INCREMENT,
  `_payment_peri_fk` int(11) NOT NULL,
  `_payment_peri_due` decimal(10,2) NOT NULL,
  `_payment_peri_bal` decimal(10,2) NOT NULL,
  `_payment_peri_part` tinyint(4) NOT NULL,
  `_payment_peri_next` int(11) NOT NULL,
  `_payment_peri_incharge` varchar(40) NOT NULL,
  `_payment_peri_addedby` varchar(40) NOT NULL,
  `_payment_peri_addedon` timestamp NULL DEFAULT NULL,
  `_payment_peri_lastmodby` varchar(40) NOT NULL,
  `_payment_peri_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_payment_peri_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_srv_en`
--

CREATE TABLE IF NOT EXISTS `viv_srv_en` (
  `_srv_id` int(11) NOT NULL AUTO_INCREMENT,
  `_srv_branch` varchar(30) NOT NULL,
  `_srv_unq_id` varchar(40) NOT NULL,
  `_srv_type` tinyint(4) NOT NULL,
  `_srv_name` varchar(40) NOT NULL,
  `_srv_start` int(11) NOT NULL,
  `_srv_end` int(11) NOT NULL,
  `_srv_tnc` text,
  `_srv_active` tinyint(4) NOT NULL DEFAULT '1',
  `_srv_addedby` varchar(40) NOT NULL,
  `_srv_addedon` timestamp NULL DEFAULT NULL,
  `_srv_lastmodby` varchar(40) NOT NULL,
  `_srv_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_srv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_srv_sub_en`
--

CREATE TABLE IF NOT EXISTS `viv_srv_sub_en` (
  `_srv_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `_srv_sub_unq_id` tinyint(4) NOT NULL,
  `_srv_sub_cust` varchar(40) NOT NULL,
  `_srv_sub_date` int(11) NOT NULL,
  `_srv_sub_start` int(11) NOT NULL,
  `_srv_sub_end` int(11) NOT NULL,
  `_srv_sub_addedby` varchar(40) NOT NULL,
  `_srv_sub_addedon` timestamp NULL DEFAULT NULL,
  `_srv_sub_lastmodby` varchar(40) NOT NULL,
  `_srv_sub_lastmodon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_srv_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_usr_role_en`
--

CREATE TABLE IF NOT EXISTS `viv_usr_role_en` (
  `_usr_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_role_name` varchar(10) NOT NULL,
  `_usr_role_active` tinyint(4) NOT NULL DEFAULT '1',
  `_usr_role_addedby` varchar(40) NOT NULL,
  `_usr_role_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`_usr_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `viv_usr_role_perm_en`
--

CREATE TABLE IF NOT EXISTS `viv_usr_role_perm_en` (
  `_usr_role_perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `_usr_role_perm_name` varchar(10) NOT NULL,
  `_usr_role_perm_val` varchar(10) DEFAULT NULL,
  `_usr_role_perm_addedby` varchar(40) NOT NULL,
  `_usr_role_perm_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `_usr_role_perm_lastmodby` varchar(40) NOT NULL,
  `_usr_role_perm_lastmodon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`_usr_role_perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
