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
                </li>
                <li>
                    <b>لیست مردم</b>
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
                                        <span class="caption-subject bold uppercase"> لیست مردم</span>
                                    </div>
                                    <div class="actions">
                                   
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                  <a href="<?=base_url()?>index.php/PeopleController/AddPeople"><button id="sample_editable_1_new" class="btn sbold green"> اضافه نمودن
                                                        <i class="fa fa-plus"></i>
                                                    </button></a>  
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th> اسم </th>
                                                <th> تخلص </th>
                                                <th> ایمیل آدرس </th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach ($data as $row ) { ?>
                                            <tr class="odd gradeX">
                                             <td><?=$row->po_name?></td>
                                              <td><?=$row->po_last_name?></td>
                                              <td><?=$row->po_email?></td>
                                              <td><a class="btn btn-circle btn-icon-only btn-default" href="<?=base_url()?>index.php/PeopleController/PeopleDetail?id=<?=$row->po_id?>" ><span class="glyphicon glyphicon-eye-open?"></a>
                                                <a href="<?=base_url()?>index.php/PeopleController/EditPeopl?id=<?=$row->po_id?>>" class="btn btn-circle btn-icon-only btn-success"><span class="fa fa-pencil"></a>
                                              <a href="<?=base_url()?>index.php/PeopleController/DeletePeople?id=<?=$row->po_id?>" class="fa fa-trash-o dropdown-toggle btn btn-circle btn-icon-only btn-danger"></a>
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
