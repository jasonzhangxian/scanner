 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>检测店铺商品</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="../css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="../css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-3 m-b-xs">
                                <label class="control-label">扫描位置：</label>
                                <div data-toggle="buttons" class="btn-group" id="scan_fields" >
                                    <label class="btn btn-sm btn-white active">
                                        <input type="checkbox" id="option1" value="title" name="options" checked="">宝贝标题</label>
                                    <label class="btn btn-sm btn-white">
                                        <input type="checkbox" id="option2" value="sell_point" name="options">宝贝卖点</label>
                                    <label class="btn btn-sm btn-white">
                                        <input type="checkbox" id="option3" value="skus" name="options">宝贝Sku</label>
                                    <label class="btn btn-sm btn-white">
                                        <input type="checkbox" id="option4" value="desc" name="options">宝贝描述</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" onclick="do_scan()" class="btn btn-sm btn-primary"> 开始检测</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="reportTable" class="table table-striped" data-toggle="table" data-mobile-responsive="true" data-url="/frontend/web/index/doscan" data-sort-stable="false" data-method="post">
                                <thead>
                                    <tr>
                                        <th data-field="title">宝贝名称</th>
                                        <th data-field="approve_status">状态</th>
                                        <th data-field="scan_result">检测结果</th>
                                        <th data-field="oper">操作</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../js/jquery.min.js?v=2.1.4"></script>
    <script src="../js/bootstrap.min.js?v=3.3.5"></script>
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/content.min.js?v=1.0.0"></script>
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
    <script src="../js/demo/peity-demo.min.js"></script>
    <script src="../js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="../js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="../js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="../js/demo/bootstrap-table-demo.min.js"></script>
    <script>
        $(document).ready(function(){
            //$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})

        });
        function do_scan()
        {
            var fields = [];
            $("#scan_fields").find("input[type='checkbox']:checked").each(function(idx,chk){
                fields.push(chk.value);
            });

            if(fields.length > 0)
            {
                $('#reportTable').bootstrapTable('showLoading');
                $.ajax({
                    type: "POST",
                    url:"/frontend/web/index/doscan",
                    data: {fields: fields},
                    dataType: "json",
                    success: function(data){
                        $('#reportTable').bootstrapTable('hideLoading');
                        $('#reportTable').bootstrapTable('load', data.rows);
                    }
                });
            }else{
                alert("请选择要扫描的位置！");
            }
        }
    </script>
</body>

</html>