
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                                <a href="<?=base_url()?>index.php/studentController/index">کاندیدان</a>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                               <b>معلومات کاندید</b>
                            </li>

                        </ul>
                        </div>
                   <?php foreach ($data as  $row)  {}?>
                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="profile-content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات کاندید</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/mainPageController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                         <div class="">
                                <div class="portlet-title">
                                  
                                    <div class="tools">
                                       
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-5 col-md-push-1 col-sm-5 col-sm-push-1">
                                                <div class="profile-userpic">
                                                    <img class="img-rounded" src="<?php if(!empty($row->kan_profile_photo)){ echo base_url().$row->kan_profile_photo;} else{ if($row->gender=='m'){ echo base_url()."assets/img/users/male.jpg";} elseif($row->gender=='f'){ echo base_url()."assets/img/students/female.jpg";}}?>" style="height: 120px; width: 120px;" >
                                                    <h3 style="margin-right: 10px;">عکس کاندید</h3>
                                                </div>
                                                <div class="container"></div>
                                            </div>
                                            <div class="col-md-2 col-md-push-4 col-sm-2 col-sm-push-4">
                                                <div class="profile-userpic">
                                                    <a href="">
                                                        <img class="img-rounded" src="<?php if(!empty($row->kan_cover)){ echo base_url().$row->kan_cover;} else{echo base_url()."assets/img/kandid/document.svg"; }?>" style="height: 120px; width: 120px;" >
                                                    </a>
                                                    <h3 style="margin-right: 15px;">نشان انتخاباتی</h3>
                                                </div>
                                                <div class="container"></div>
                                            </div>
                                        </div>


                              <table class="table table-bordered table-hover"> 
                                                <tr >
                                                    <th> اسم </th>
                                                    <td><?=$row->kan_name?></td>
                                                     <th>تخلص</th>
                                                    <td><?=$row->kan_last_name?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> شماره انتخاباتی </th>
                                                    <td><?=$row->kan_number?></td>
                                                      <th> صفحه انتخاباتی</th>
                                                    <td><?=$row->kan_page_number?></td>
                                                </tr>
                                               
                                                 <tr>
                                                    <th>جنسیت</th>
                                                    <td><?php if($row->gender=='m') echo 'مرد'; if($row->gender=='f') echo 'زن';?></td>
                                                    <th>نوعیت کاندید</th>
                                                    <td><?=$row->kan_typeOfkan?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>کاندید</th>
                                                    <td><?=$row->kan_type?></td>
                                                    <th>ایمیل آدرس</th>
                                                    <td><?=$row->kan_email?></td>
                                                    <td>
                                                       
                                                    </td>

                                                </tr>
                                               
                                                <tr>
                                                    <th>شماره تماس</th>
                                                    <td><?=$row->kan_phone?>
                                                    </td>
                                                    <th>ولایت</th>
                                                    <td><?=$row->kan_province?>
                                                </tr>
                                                
                                                <tr>
                                                    <th>تاریخ ثبت</th>
                                                    <td><?=$row->create_at?>
                                                    <th>تاریخ ویرایش</th>
                                                    <td><?=$row->update_at?></td>
                                                    
                                                </tr>
                                                
                                                
                                               
                                        </table>
                                    </div>
</div>
       
          
                        

               
                   
               
      
         
       
 
    