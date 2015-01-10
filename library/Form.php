<?php

class Form {
  
  protected $inp_open = "<input ";
  protected $inp_close = "</input>";
  
  protected $txt_open = "<textarea ";
  protected $txt_close = "</textarea>";
  
  protected $sel_open = "<select ";
  protected $sel_close = "</select>";
  
  protected $opt_open = "<option ";
  protected $opt_close = "</option>";
  
  protected $simpl_close = " >";
  protected $end_close = " />";
  
  
  /**
   * 
   * @param type $arr: Assoc Array of Attributes for Input Tag
   * @return type String: A string of Input Field
   * 
   * Example Usage
   * ******************
        $un = array("type" => "text", 
                      "name" => "un",
                       "id" => "un",
                       "class" => "none");
         $uname = $form -> Viven_AddInput($un);
   */
  
  public function Viven_AddInput($arr){
    $ret = '';
    $ret .= $this -> inp_open;
    foreach ($arr as $key => $val){
      $ret .= $key.'='.'"'.$val.'"'.' ';
    }
    $ret .= $this -> end_close;
    return $ret;
  } 
  
    
  /**
   * 
   * @param type $arr: Assoc Array of Attributes for Input Tag
   * @return type String: A string of Input Field
   * 
   * Example Usage
   * ******************
        $un = array("type" => "text", 
                      "name" => "un",
                       "id" => "un",
                       "class" => "none");
         $uname = $form -> Viven_AddInput($un);
   */
  
  public function Viven_AddText($arr){
    $ret = '';
    $ret .= $this -> txt_open;
    foreach ($arr as $key => $val){
      $ret .= $key.'='.'"'.$val.'"'.' ';
    }
    $ret .= $this -> simpl_close;
    $ret .= $this -> txt_close;
    return $ret;
  } 
  
  
  /**
   * 
   * @param type $arr: Assoc Array of Attributes for Select Tag. Options must be specified with 'Options' key
   * @return type String: A string of HTML Select Tag with all options and attributes defined.
   * 
   * Example Usage:
   * ****************
       $arr5 = array("name" => "sel5",
                    "id" => "selid5",
                    "class" => "selclass",
                    "options" => array("1" => array("attone" => "one"),
                                        "2" => array("atttwo" => "two",
                                                    "attthree" => "three")
                      ));
        $temp5 = $form ->Viven_AddSelect($arr5);
   */
  
  public function Viven_AddSelect($arr){
    $ret = '';
    
    /**
     * Open the SELECT tag and append all attributes
     */
    $ret .= $this -> sel_open;
    foreach ($arr as $attrib => $val){
      if($attrib != 'options'){
        $ret .= $attrib . '=' . '"' . $val . '"' . ' ';
      }
    }
    $ret .= $this -> simpl_close;
    
    /**
     * Create all OPTIONS under the select
     */
    $optArr = $arr['options'];
    
    if(!isset($arr["multiple"])){
      $ret .= $this -> opt_open;
      $ret .= 'value="0"';
      $ret .= $this -> simpl_close;
      $ret .= "-- Select --";
      $ret .= $this -> opt_close;
    }
    foreach ($optArr as $option => $attribs){
      $ret .= $this -> opt_open;
      
      /**
       * Append all Attributes of the current OPTION
       */
      foreach($attribs as $name => $sval){
        $ret .= $name.'='.'"'.$sval.'"'.' ';
      }
      $ret .= $this -> simpl_close;
      $ret .= $option;
      
      /**
       * Close the OPTION TAG
       */
      $ret .= $this -> opt_close;
    }
    /**
     * Close SELECT tag
     */
    $ret .= $this -> sel_close;
    return $ret;
  }
  
  
  public function Viven_AddButtons($num_btns){
    
    /**
    * Add Submit and Clear Buttons
    * $num_btns decides the number of buttons needed
    * num_btns -> 1 - Only Submit Button
    * num_btns -> 2 - Need Submit and Clear Buttons
    */
    
    $org = '<div style="clear:both; margin:16px 0px">';

    $sub = array("type" => "submit", 
                "name" => "Submit",
                "id" => "Submit",
                "Value" => "Submit",
                "class" => "btn btn-primary btn-lg");
    $org .= $this->Viven_AddInput($sub);
    
    if($num_btns == 2){
      $res = array("type" => "reset", 
                  "name" => "Reset",
                  "id" => "Reset",
                  "Value" => "Clear Form",
                  "class" => "btn btn-primary btn-lg");
      $org .= $this->Viven_AddInput($res);
    }

    $org .= '</div>';
    return $org;
    
  }
    
  
  /**
   * 
   * @param type $list - List of all the form elements (minus the submit and reset buttons)
   * @param type $num_btns - Number of control buttons required for the form (Just SUBMIT or both SUBMIT & RESET)
   * @param type $num_cols - Number of colums, 0 => 2-Column, >0 => 1-Column layout
   * @param type $hidden - Indicates if the form contains a Hidden Field. Helps in clean formatting
   * 
   * 
   * @return string - A string of the entire form laid out in a single or double column layout
   * 
   */
  
  public function Viven_ArrangeForm($list, $num_btns,  $formparams, $num_cols = 0, $hidden=TRUE){
    $org = ''; 
    $col_count = $hidden? count($list)-1 : count($list);
    
    /**
    * Build <form> tag with given ID and Class Parameters
    */

    $org .= "<form";
    if(!empty($formparams)){
      
      foreach($formparams as $fp => $fv){
        $org .= " " . $fp . " = '" . $fv . "' ";
      }
      
    }
    
    $org .= " method = 'POST'>";
    $org .= "<div class='row'>";
    $org .= "<div class='row-fluid'>";

    if($num_cols == 1){      
      
      //$list = array_slice($list, 0, -1);
      foreach($list as $name => $field){
        
        $org .= "<div class='col-md-12'>";
        
        $org .= "<div class='form-group'>";
        $org .= "<label class='col-lg-5 control-label'>$name</label>";
        $org .= "<div class='col-lg-7'>";
        $org .= $field;
        $org .= "</div></div></div>";
      
      }
      
    } else{
      $tbl1 = array_slice($list, 0, $col_count/2);
      $tbl2 = array_slice($list, $col_count/2,($col_count/2)+1);
      
      $org .= "<div class='col-md-12'>";
      $org .= "<div class='col-md-6'>";
      foreach($tbl1 as $name => $field){
        
        $org .= "<div class='form-group'>";
        $org .= "<label for='$name' class='col-lg-5 control-label'>$name</label>";
        $org .= "<div class='col-lg-7'>";
        $org .= $field;
        $org .= "</div></div>";
      }      
      $org .= "</div>";
      
      
      $org .= "<div class='col-md-6'>";
      foreach($tbl2 as $name => $field){
        $org .= "<div class='form-group'>";
        $org .= "<label for='$name' class='col-lg-5 control-label'>$name</label>";
        $org .= "<div class='col-lg-7'>";
        $org .= $field;
        $org .= "</div></div>";
      }
      $org .= "</div></div>"; //Close col-md-6
  
    }
    
    $org .= '</div></div>'; //Close row-fluid and span12
    $org .= $this -> Viven_AddButtons($num_btns);
    $org .= '</form>';

    return $org;
  }
  
}