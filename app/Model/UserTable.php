<?php
class UserTable extends CommonTable {
    
  public function getIntroduction() {
    return nl2br($this->introduction);
  }
  
  public function getPhotoSrc() {
    if($this->photo){
      return 'img/uploads/thumb_'.$this->photo;
    }else{
      return 'img/no_profile_img.jpg';
    }
  }
  
  public function getUsername() {
    return '@'.$this->username;
  }
  
  public function getRegisteredDate() {
    return date('F j, Y',strtotime($this->created_at));
  }

}