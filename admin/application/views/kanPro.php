<!-- BEGIN CONTENT -->
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
                    <b>لیست کاندیدان</b>
                </li>
            </ul>
        </div>
                <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> لیست کاندیدان</span>
                                    </div>
                                    <div class="actions">
                                   
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- <div class="btn-group">
                                                  <a href="<?=base_url()?>index.php/KandidController/index"><button id="sample_editable_1_new" class="btn sbold green"> اضافه نمودن
                                                        <i class="fa fa-plus"></i>
                                                    </button></a>  
                                                </div> -->
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead style="text-align: center;">
                                            <tr style="text-align: center;">
                                                <th style="text-align: center;"> اسم </th>
                                                <th style="text-align: center;"> تخلص </th>
                                                <th style="text-align: center;"> شماره انتخاباتی </th>
                                                <th style="text-align: center;"> صفحه رای دهی </th>
                                                <th style="text-align: center;"> ایمیل آدرس </th>
                                                <th style="text-align: center;"> شماره تماس </th>
                                                <th style="text-align: center;"> پوست ها  </th>
                                                <th style="text-align: center;"> بیوگرافی </th>
                                                <th style="text-align: center;"> عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row ) { ?>

                                            <tr class="odd gradeX">
                                              <td><?=$row->kan_name?></td> 
                                              <td><?=$row->kan_last_name?></td> 
                                              <td><?=$row->kan_number?></td> 
                                              <td><?=$row->kan_page_number?></td> 
                                              <td><a href=""><?=$row->kan_email?></a></td> 
                                              <td><?=$row->kan_phone?></td>
                                              <td><a href="<?=base_url()?>index.php/KandidController/Posts?id=<?=$row->kan_id?>" class="btn btn-circle btn-icon-only btn-defualt"><span class="glyphicon glyphicon-eye-open "></a></td>
                                              <td>
                                              <a href="<?=base_url()?>index.php/KandidController/KandidBio?id=<?=$row->kan_id?>" class="fa fa-plus dropdown-toggle btn btn-circle btn-icon-only btn-defualt"></a>
                                              <a href="<?=base_url()?>index.php/KandidController/EditBio?id=<?=$row->kan_id?>" class="btn btn-circle btn-icon-only btn-success"><span class="fa fa-pencil"></a>
                                          </td> 
                                              <td><a href="<?=base_url()?>index.php/KandidController/KanDetail?id=<?=$row->kan_id?>" class="btn btn-circle btn-icon-only btn-defualt"><span class="glyphicon glyphicon-eye-open "></a>
                                              <!-- <a href="<?=base_url()?>index.php/KandidController/DeletKanData?id=<?=$row->kan_id?>" class="fa fa-trash-o dropdown-toggle btn btn-circle btn-icon-only btn-danger"></a> -->
                                              <a href="<?=base_url()?>index.php/KandidController/EditKanData?id=<?=$row->kan_id?>" class="btn btn-circle btn-icon-only btn-success"><span class="fa fa-pencil"></a></td> 
                                            </tr>
                                           <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
    </div>
</div>
