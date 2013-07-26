<link rel="stylesheet" type="text/css" href="/public/css/style.css">
<?php
  if(VivenAuth::sessionExists()){
?>
<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
<script src="/public/js/jquery/jquery.min.js"></script>

<div class="ibar">
	<div class="nav">	
		<ul>
			<li class='dataEntryHead'><a  href='#' id="morebutton" class="gn"><i class="icon-edit icon-white"></i>Business</a>
				<ul class='stayontop'>
					<li><a class="gn" href="/business/enquiry/new"> Enquiry</a></li>
     <li><a class="gn" href="/business/followup/new"> Follow-up</a></li>
					<li><a class="gn" href="/finance/expense/new">Expense </a></li>
     <li><a class="gn" id="add-service" onclick="fetchform('New Service','/business/service/new')">New Service </a></li>
    </ul>
			</li>
   
   <li class='customerEntryHead'><a  href='#' id="morebutton" class="gn"><i class="icon-user icon-white"></i>Customer</a>
				<ul>
      <li><a class="gn" onclick="fetchform('Customer Attendance','/customer/attendance/new')">Attendance </a></li>
      <li><a class="gn" href="/customer/training/new">Personal Training </a></li>
      <li><a class="gn" href="/business/enroll/new">Enrollment</a></li>
      <li><a class="gn" href="/finance/revenue/new">Payment </a></li>
      <li><a class="gn" href="/customer/physical/new">Physical </a></li>
     <li><a class="gn" onclick="fetchform('Forgot ID','/customer/account/forgot')">Forgot ID </a></li>
     <li><a class="gn" onclick="fetchform('Customer Feedback','/customer/feedback/new')">Feedback </a></li>
				</ul>
			</li>
   
						
			<li class="reportEntry"><a  href='#' id="reports" class="gn"><i class="icon-tasks icon-white"></i>Reports </a>
				<ul class='stayontop'>
      
      <!-- Business -->
					<li><a class="gn" href="/business/enroll/report">Enrollments </a></li>
     <li><a class="gn" href="/business/enquiry/report">Enquiries </a></li>
     <li><a class="gn" href="/business/followup/report">Followup </a></li>
     <li><a class="gn" href="/business/service/report">Services</a></li>
     <li><a class="gn" href="/customer/feedback/report">Feedback</a></li>
     
     <!-- Internal & HR -->
					<li><a class="gn" href="/staff/employee/report"> Employees </a></li>
     
     <!-- Financials -->
     <li><a class="gn" href="/finance/revenue/report">Payments </a></li>
					<li><a class="gn" href="/finance/expense/report"> Expenses </a></li>
     <li><a class="gn" href="/finance/report/dueslist">Dues List </a></li>     
     <li><a class="gn" href="/finance/report/balancesheet"> Balance Sheet </a></li>
					
				</ul>
			</li>
   
   
   <li class="reportEntry"><a  href='#' id="reports" class="gn"><i class="icon-user icon-white"></i>Staff </a>
				<ul class='stayontop'>
      
      <!-- Business -->
      <li><a class="gn" onclick="fetchform('Staff Attendance','/staff/attendance/new')">Staff Attendance</a></li>
					<li><a class="gn" href="/business/enroll/report">New Employee </a></li>
     <li><a class="gn" id="add-feedback" onclick="fetchform('Staff Feedback','/staff/feedback/new')">Staff Feedback </a></li>    
           
					
				</ul>
			</li>
   
			
			<li class="manageEntry"><a href="#" id="manage" class="gn"><i class="icon-eye-open icon-white"></i>Manage</a>
				<ul class='stayontop'>					
					<li><a class="gn" href="/business/service/report">Services & Offers</a></li>
     <li><a class="gn" href="/data/user/report">Software Users</a></li>
     <li><a class="gn" href="/business/branch/report">Branches</a></li>     
     <li><a class="gn" href="/data/logins">Login Records</a></li>
				</ul>
			</li>
			<li><i class="icon-briefcase icon-white"></i> <a id="subs" class="gn" href="/subscribe"> Subscriptions </a> </li>
				
		</ul>
	</div>
	
	<div class="nav usrFull">			
		
				<ul>
					
						<li><a  href='#' id="tinyadd" class="gn"><i class="icon-plus icon-white"></i>Add</a>
          
          <ul class='stayontop'>
           <li><a class="gn" id="add-employee" onclick="fetchform('Software User','/user/register/new')">User </a></li>
           <li><a class="gn" id="add-user-role" onclick="fetchform('Software User Role','/user/roles/new')">User Role</a></li>	
           <li><a class="gn" id="add-user-role" onclick="fetchform('New Payment Mode','/finance/mode/new')">Payment Mode</a></li>	
           <li><a class="gn" id="add-branch" onclick="fetchform('New Branch','/business/branch/new')">Branch </a></li> 
           <li><a class="gn" id="add-dept" onclick="fetchform('New Department','/business/department/new')">Department </a></li>
          </ul>			
          
      </li>
      <li><a class="userAccount" onclick="fetchform('User Account','/user/account/password')">
          <i class="icon-wrench icon-white"></i>Account </a></li>
      <li><a class="Logout" href="/user/logout"><i class="icon-off icon-white"></i>Logout</a></li>
      
      </ul>
					</li>
				</ul>
	</div>
</div>

  
<div id="popupbox">
   <strong>Please wait while we try to load form</strong>    
</div>
<div id="lightbox"></div>
<?php
  }
?>