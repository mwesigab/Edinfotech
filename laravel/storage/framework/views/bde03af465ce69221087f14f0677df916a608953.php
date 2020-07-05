<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin.new_employee')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

<?php if( ! empty(session('ErrorEmail'))): ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo e(trans('admin.email_exists')); ?></strong>
</div>
<?php endif; ?>

<?php if( ! empty(session('ErrorUsername'))): ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo e(trans('admin.username')); ?></strong>
</div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <div id="main" class="tab-pane active">
            <form method="post" action="/admin/manager/new/store" class="form-horizontal form-bordered">

                <div class="form-group">
                    <label class="col-md-3 control-label">Type Of Staff</label>
                    <div class="col-md-6">
                        <select name="admin" class="form-control populate" id="staff">
                            <option>Select---</option>
                            <option value="1">System Staff</option>
                            <option value="2">School Staff</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none" id="school_div">
                    <label class="col-md-3 control-label">School</label>
                    <div class="col-md-6">
                        <select name="school" class="form-control" id="school_select">
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none" id="department_div">
                    <label class="col-md-3 control-label">Department</label>
                    <div class="col-md-6">
                        <select name="department" class="form-control populate" id="department_select">
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('main.full_name')); ?></label>
                    <div class="col-md-6">
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"
                               id="full_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly"><?php echo e(trans('admin.username')); ?></label>
                    <div class="col-md-6">
                        <input type="text" name="username" class="form-control text-left" dir="ltr" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly"><?php echo e(trans('admin.password')); ?></label>
                    <div class="col-md-6">
                        <input type="text" name="password" class="form-control text-left" dir="ltr" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputReadOnly"><?php echo e(trans('admin.email')); ?></label>
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control text-left" dir="ltr" id="head_email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo e(trans('admin.th_status')); ?></label>
                    <div class="col-md-6">
                        <select name="mode" class="form-control populate">
                            <option value="active"><?php echo e(trans('admin.active')); ?></option>
                            <option value="deactive"><?php echo e(trans('admin.banned')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(function () {
        let department_list = [];

        $("#staff").on("change", function (e) {
            e.preventDefault();
            let val = $("#staff").val();

            /*
           * ParamOne: URL
           * ParamTwo: HTTP Method
           * ParamThree: PostValue
           * ParamFour: CarrierVariable: 1 Stands for School dropDown, 2 for the department dropdown
           * */

            if (val == 2) {
                $("#school_div").show();
                $("#department_div").show();
                createPlaceHolderElement("#school_select");
                ajaxPostOrGetCall("/school/get_school_list", "post", val, 1);
            } else {
                $("#school_div").hide();
                $("#department_div").hide();
            }

        });

        //Get Department List For Each Selected School
        $("#school_select").on("change", function (e) {
                e.preventDefault();

                let val = $("#school_select").val();
                createPlaceHolderElement("#department_select");
                ajaxPostOrGetCall("/school/get_department_list", "post", val, 2);
            }
        )

        //Set Head Of Department
        $("#department_select").on("change", function (e) {
                e.preventDefault();
                let selectedDept = $("#department_select").val();
                if (department_list.length > 0) {
                    let returnObj = department_list.filter(value => value.id == selectedDept);
                    $("#full_name").val(returnObj[0].dept_head_name);
                    $("#head_email").val(returnObj[0].dept_head_email);
                }
            }
        )

        function createPlaceHolderElement(selector) {
            let option = document.createElement('option')
            option.text = "Select --";
            $(selector).find('option')
                .remove()
                .end()
                .append(option);
        }

        function formElements(result, carrierVar) {

            if (carrierVar === 1) {
                let x = document.getElementById("school_select");
                if (result.length > 0) {
                    result.forEach(val => {
                        var option = document.createElement('option')
                        option.text = val.school_name;
                        option.value = val.id;
                        x.add(option);
                    })
                }
            } else if (carrierVar === 2) {
                department_list = result;
                let y = document.getElementById("department_select");
                if (result.length > 0) {
                    result.forEach(val => {
                        var option = document.createElement('option')
                        option.text = val.dept_name;
                        option.value = val.id;
                        y.add(option);
                    })
                }
            }
        }

        function ajaxPostOrGetCall(url_string, http_method, postValue, carrierVar) {
            $.ajax({
                url: url_string,
                method: http_method,
                data: {
                    postValue
                },
                success: function (result) {
                    formElements(result, carrierVar);
                }
            });
        }
    })
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Employees','New Employee']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>