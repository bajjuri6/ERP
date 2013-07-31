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
  
  public function Viven_ArrangeForm($list, $num_btns, $num_cols = 0, $hidden=TRUE){
    $org = ''; 
    $col_count = $hidden? count($list)-1 : count($list);
    
    //count($list) < 4 || 
    if($num_cols > 0){
      
      $org .= '<table>';
      
      foreach($list as $name => $field){
        $org .= '<tr><td>';
        $org .= '<label for="'.$name.'">'.$name.'</label>';
        $org .= '<td>'.$field.'</td>';
        $org .= '</td></tr>';
      }
      
      $org .= '</table>';
      
    } else{
      $tbl1 = array_slice($list, 0, $col_count/2);
      $tbl2 = array_slice($list, $col_count/2,($col_count/2)+1);
      
      $org .= '<div style="float:left;"><table>';
      foreach($tbl1 as $name => $field){
        $org .= '<tr><td>';
        $org .= '<label for="'.$name.'">'.$name.'</label>';
        $org .= '<td>'.$field.'</td>';
        $org .= '</td></tr>';
      }
      $org .= '</table></div>';
      
      $org .= '<div><table>';
      foreach($tbl2 as $name => $field){
        $org .= '<tr><td>';
        $org .= '<label for="'.$name.'">'.$name.'</label>';
        $org .= '<td>'.$field.'</td>';
        $org .= '</td></tr>';
      }
      $org .= '</table></div>';
  
    }
    
    /**
      * Add Submit and Clear Buttons
      * $num_btns decides the number of buttons needed
      * num_btns -> 1 - Only Submit Button
      * num_btns -> 2 - Need Submit and Clear Buttons
      */
     if($num_btns == 1){
       $org .= '<div style="clear:both; margin:6px 0px">';

       $sub = array("type" => "submit", 
                   "name" => "Submit",
                   "id" => "Submit",
                   "Value" => "Submit",
                   "class" => "flat custom");
       $org .= $this->Viven_AddInput($sub);     

       $org .= '</div>';
     }elseif($num_btns == 2){
       $org .= '<div style="clear:both; margin:16px 0px">';

       $sub = array("type" => "submit", 
                   "name" => "Submit",
                   "id" => "Submit",
                   "Value" => "Submit",
                   "class" => "flat custom");
       $org .= $this->Viven_AddInput($sub);     

       $res = array("type" => "reset", 
                   "name" => "Reset",
                   "id" => "Reset",
                   "Value" => "Clear Form",
                   "class" => "flat custom");
       $org .= $this->Viven_AddInput($res);     

       $org .= '</div>';
     }

    return $org;
  }
  
}