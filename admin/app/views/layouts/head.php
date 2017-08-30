<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <!-- Bootstrap -->    
        <link href="<?= PATH ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->    
        <link href="<?= PATH ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->    
        <link href="<?= PATH ?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->    
        <link href="<?= PATH ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->    
        <link href="<?= PATH ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->    
        <link href="<?= PATH ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->    
        <link href="<?= PATH ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- Datatables -->    
        <link href="<?= PATH ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?= PATH ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?= PATH ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?= PATH ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?= PATH ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- CKEditor -->    
        <script type="text/javascript" src="<?= PATH ?>vendors/ckeditor/ckeditor.js"></script>            
        <!-- Custom Theme Style -->    
        <link href="<?= PATH ?>build/css/custom.css" rel="stylesheet">
        <script>


//            function uploadFile() {
//                document.getElementById("prg").setAttribute("style", "display:block;");
//                var file = document.getElementById("file1").files[0]; /* alert(file.name+" | "+file.size+" | "+file.type); */
//                var formdata = new FormData();
//                formdata.append("file1", file);
//                formdata.append("submit", "submit");
//                var ajax = new XMLHttpRequest();
//                ajax.upload.addEventListener("progress", progressHandler, false);
//                ajax.addEventListener("load", completeHandler, false);
//                ajax.addEventListener("error", errorHandler, false);
//                ajax.addEventListener("abort", errorHandler, false);
//                ajax.open("POST", "gallery/", true);
//                ajax.send(formdata);
//                document.getElementById("aaa").setAttribute("src", "../images/" + file.name);
//            }
//
//            function progressHandler(event) {
//                document.getElementById("prg").setAttribute("style", "display:block;");
//                document.getElementById("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
//                var percent = (event.loaded * 100) / event.total;
//                document.getElementById("status").innerHTML = Math.round(percent) + "% uploaded";
//                document.getElementById("progressBar1").setAttribute("style", "width: " + Math.round(percent) + "%;");
//                document.getElementById("progressBar1").setAttribute("data-transitiongoal", Math.round(percent));
//                document.getElementById("progressBar1").setAttribute("aria-valuenow", Math.round(percent));
//            }
//
//            function completeHandler(event) {
//                document.getElementById("status").innerHTML = event.target.responsText;
//                document.getElementById("prg").setAttribute("style", "display:none;");
//                document.getElementById("progressBar1").setAttribute("style", "width:0;");
//                document.getElementById("progressBar1").setAttribute("data-transitiongoal", "0");
//                document.getElementById("progressBar1").setAttribute("aria-valuenow", "0");
//                document.getElementById("img").setAttribute("style", "display:block;");
//            }
//
//            function errorHandler() {
//                document.getElementById("status").innerHTML = "Upload failed";
//            }
//
//            function abortHandler() {
//                document.getElementById("status").innerHTML = "Upload canceled";
//            }

        </script>  	  
    </head>