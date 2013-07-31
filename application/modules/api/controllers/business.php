<?php

class Viven_Api_Business extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  /**
   * Get Enquiry details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getEnquiries($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/business/controllers/enquiry.php';
    $businessController = new Viven_Business_Enquiry;
    return $businessController -> getEnquiriesAction($from, $to, $branch);
  }
  
  
  /**
   * Get Enrollment details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getEnrollments($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/business/controllers/enroll.php';
    $businessController = new Viven_Business_Enroll;
    return $businessController -> getEnrollmentsAction($from, $to, $branch);
  }
  
  
  /**
   * Get Followup details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getFollowups($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/business/controllers/followup.php';
    $businessController = new Viven_Business_Followup;
    return $businessController -> getEnrollmentsAction($from, $to, $branch);
  }
  
  
  /**
   * Get Customer Attendance details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getCustomerAttendance($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/customer/controllers/attendance.php';
    $customerController = new Viven_Customer_Attendance;
    return $customerController -> getAttendanceAction($from, $to, $branch);
  }
  
  
  /**
   * Get Staff Attendance details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getStaffAttendance($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/staff/controllers/attendance.php';
    $staffController = new Viven_Customer_Attendance;
    return $staffController -> getAttendanceAction($from, $to, $branch);
  }
  
}