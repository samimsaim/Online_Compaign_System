<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?=base_url()?>index.php/mainPageController/index">صفحه اصلی</a>
                    <i class="fa fa-angle-left"></i>
                </li>
             
                <li>
                    <b>نمایش مردم</b>
                </li>
            </ul>
        </div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">معلومات مردم</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-default" href="<?=base_url()?>index.php/PeopleController/index" style="font-size: 16px;">
                        <i class="fa fa-share"></i>برگشت</a>
                    </a>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="table-scrollable">
                                <?php foreach($data as $row){?>
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>اسم</th>
                                        <td><?=ucfirst($row->po_name)?></td>
                                    </tr>
                                    <tr>
                                        <th>تخلص</th>
                                        <td><?=ucfirst($row->po_last_name)?></td>
                                    </tr>
                                   
                                    <tr>
                                        <th>ایمل آدرس</th>
                                        <td><?=$row->po_email?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="col-md-3">
                        <br/>

                        <span class="thumbnail">
                            <img src="<?php  echo base_url().$row->po_photo;?>" alt="<?php echo base_url().$row->po_name." photo"?>">
                        </span>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>







