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
                    <b>لیست پوست ها</b>
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
                                        <span class="caption-subject bold uppercase"> لیست پوست ها</span>
                                    </div>
                                    <div class="actions">
                                   
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                  <a href="<?=base_url()?>index.php/KandidController/AddPost?id=<?=$_GET['id'];?>"><button id="sample_editable_1_new" class="btn sbold green"> اضافه نمودن
                                                        <i class="fa fa-plus"></i>
                                                    </button></a>  
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; font-size: 20px;"> پوست ها</th>
                                                <th style="text-align: center; font-size: 20px;"> عملیات</th >
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row ) { ?>
                                            <tr class="odd gradeX">
                                               <td style="text-align: center;"><?=$row->post_details?></td>
                                               <td style="text-align: center;">
                                           <a href="<?=base_url()?>index.php/KandidController/PostDetail?id=<?=$row->post_id?>" class="btn btn-circle btn-icon-only btn-defualt"><span class="glyphicon glyphicon-eye-open" title="مشخصات"></a>
                                              <a href="<?=base_url()?>index.php/KandidController/EditPost?id=<?=$row->post_id?>" class="btn btn-circle btn-icon-only btn-success"><span class="fa fa-pencil" title="ویرایش"></a>
                                                 <a href="<?=base_url()?>index.php/KandidController/DeletPost?id=<?=$row->post_id?>" class="fa fa-trash-o dropdown-toggle btn btn-circle btn-icon-only btn-danger" title="حذف"></a>
                                              </td>
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
