<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>H+ 后台主题UI框架 - 基本表单</title>
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
                    <div class="ibox-title">
                        <h5>检测文案内容 </h5>
                    </div>
                    <div class="ibox-content">
                        <form method="get" class="form-horizontal">
                            <div class="form-group" id="scan_content">
                                <label class="col-sm-2 control-label">文案内容</label>

                                <div class="col-sm-10">
                                    <textarea name="textarea" id="content" class="form-control" rows="14"></textarea>
                                </div>
                            </div>
                            <div class="form-group" id="scan_result" style="display: none">
                                <label class="col-sm-2 control-label">检测结果</label>

                                <div class="col-sm-10">
                                    <div class="alert" id="result_content"></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="button" onclick="do_scan()">提交检测</button>
                                    <button class="btn btn-default" type="button" onclick="re_scan()">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js?v=2.1.4"></script>
    <script src="../js/bootstrap.min.js?v=3.3.5"></script>
    <script src="../js/content.min.js?v=1.0.0"></script>
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){


        });
        function do_scan()
        {
            var content = $("#content").val();

            if(content.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url:"/frontend/web/index/doscan",
                    data: {content: content},
                    dataType: "json",
                    success: function(data){
                        $("#scan_content").hide();
                        $("#scan_result").show();
                        if(data.words.length > 0)
                            $("#result_content").removeClass().addClass("alert alert-warning");
                        else
                            $("#result_content").removeClass().addClass("alert alert-success");

                        $("#result_content").html(data.content);
                    }
                });
            }else{
                alert("请输入要检测的文案内容！");
            }
        }

        function re_scan()
        {
            $("#content").val("");
            $("#scan_content").show();
            $("#result_content").html("");
            $("#scan_result").hide();
        }
    </script>
</body>

</html>