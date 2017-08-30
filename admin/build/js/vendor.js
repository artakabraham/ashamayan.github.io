/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var USERID;
var today = new Date();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
var yyyymm = yyyy + '0' + mm;

var spinner = '<div class="col-md-12 col-sm-12 col-xs-12"><div class="x_panel"><img src="images/spinner.gif" alt="spinner" width="40"></div></div>';

function datatable() {
    $(document).ready(function() {
        $('#datatable-checkbox').dataTable({
            "fnDrawCallback": function(oSettings) {
            },
            "order": []
        });
    });
}

function deleteImage(imgID) {

    var conf = confirm("Delete image ?");
    if (conf === true) {
        var formdata = new FormData();
        formdata.append("imgID", imgID);
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "gallery/delete", true);
        ajax.send(formdata);
        ajax.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var e = document.getElementById("folder");
                var strUser = e.options[e.selectedIndex].value;
                getImages(strUser);
            }
        };
    }
}


function swapeMenu(id) {

    document.getElementById("main").style.opacity = 0.6;

    if (id !== "") {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onload = function() {
            document.getElementById("main").style.opacity = 1;
        };
        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "menu/swape/" + id, true);
        xmlhttp.send();
    }
}

function changeState(id) {

    document.getElementById("main").style.opacity = 0.6;

    if (id !== "") {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onload = function() {
            document.getElementById("main").style.opacity = 1;
        };

        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "menu/state/" + id, true);
        xmlhttp.send();
    }
}

function setSubmenu(id, type) {

    document.getElementById("main").style.opacity = 0.6;

    if (id !== "") {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onload = function() {
            document.getElementById("main").style.opacity = 1;
        };
        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", type + "/setsubmenu/" + id, true);
        xmlhttp.send();
    }
}

function loadGrid(alias) {

    document.getElementById("main").innerHTML = spinner;

    if (alias !== "") {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("main").innerHTML = this.responseText;
                datatable();
            }
        };
        xmlhttp.open("GET", "/admin/" + alias, true);
        xmlhttp.send();
    }

}

function loadTrash() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            datatable();
        }
    };
    xmlhttp.open("GET", "/admin/trash", true);
    xmlhttp.send();
}

function postNew() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();

        }
    };
    xmlhttp.open("GET", "/admin/posts/new", true);
    xmlhttp.send();
}

function build() {
    eval(CKEDITOR.replace('editor1'));
    eval($(document).ready(function() {
        $('#single_cal1').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_4",
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    }));


}

function isChecked(id) {

    var isPaid = document.getElementById(id);

    if (isPaid.value === '' || isPaid.value === 0) {
        isPaid.value = 1;
    } else {
        isPaid.value = '';
    }
}

function postInsert() {

    var title = document.getElementById("title").value;
    var editor1 = CKEDITOR.instances.editor1.getData();
    var type = document.getElementById("type").value;
    var startdate = document.getElementById("single_cal1").value;

    var formdata = new FormData();
    formdata.append("submit", "save");
    formdata.append("title", title);
    formdata.append("editor1", editor1);
    formdata.append("type", type);
    formdata.append("startdate", startdate);


    var ajax = new XMLHttpRequest();
    ajax.open("POST", "posts/new", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
}

function getPostById(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
    xmlhttp.open("GET", "/admin/posts/" + id, true);
    xmlhttp.send();
}


function getBookById(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };

    xmlhttp.onload = function() {
        ///////////////////////////////
        $('#pdfUpload').ajaxForm({
            beforeSend: function() {
                $('#progress').show();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('.progress-bar').width(percentComplete + '%');

            },
            success: function() {
                $('#progress').hide();
                $('#response').html(response.responseText);
            },
            complete: function(response) {
                $('.progress-bar').width(0 + '%');
                $('#flname').html(response.responseText);
            }
        });
    };
    xmlhttp.open("GET", "/admin/books/update/" + id, true);
    xmlhttp.send();
}


function postUpdate() {

    var id = document.getElementById("id").value;
    var isPaid = document.getElementById("isPaid").value;
    var price = document.getElementById("price").value;
    var title = document.getElementById("title").value;
    var editor1 = CKEDITOR.instances.editor1.getData();
    var type = document.getElementById("type").value;
    var startdate = document.getElementById("single_cal1").value;

    var formdata = new FormData();
    formdata.append("submit", "Update");
    formdata.append("id", id);
    formdata.append("isPaid", isPaid);
    formdata.append("title", title);
    formdata.append("editor1", editor1);
    formdata.append("type", type);
    formdata.append("price", price);
    formdata.append("startdate", startdate);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "posts/update", true);
    ajax.send(formdata);

    document.getElementById("main").innerHTML = spinner;

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
}

/////////////////////
function bookUpdate() {

    var id = document.getElementById("id").value;
    var title = document.getElementById("title").value;
    var price = document.getElementById("price").value;
    var editor1 = CKEDITOR.instances.editor1.getData();
    var startdate = document.getElementById("single_cal1").value;

    var formdata = new FormData();
    formdata.append("submit", "Update");
    formdata.append("id", id);
    formdata.append("title", title);
    formdata.append("editor1", editor1);
    formdata.append("price", price);
    formdata.append("startdate", startdate);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "books/update/" + id, true);
    ajax.send(formdata);

    document.getElementById("main").innerHTML = spinner;

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
}

/////////////////////

function getImages(yyyymm) {
    //document.getElementById("loading").setAttribute("style", "display: block;");
    if (yyyymm === "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onload = function() {
            document.getElementById("loading").setAttribute("style", "display:none;");
        };

        xmlhttp.onreadystatechange = function() {

            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "gallery/", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("q=" + yyyymm);
    }
}

function getImagesByDate(str) {

    document.getElementById("loading").setAttribute("style", "display: block;");
    var formdata = new FormData();
    formdata.append("upload", "upload");
    formdata.append("imgDt", str);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "posts/modal", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("hint").innerHTML = ajax.responseText;
            /*console.log(ajax.responseText); */
        }
    };

    ajax.onload = function() {
        document.getElementById("loading").setAttribute("style", "display:none;");
    };

}

function setImage(imgId) {
    document.getElementById("loading").setAttribute("style", "display: block;");
    var postId = document.getElementById("id").value;
    var fImg = document.getElementById("featuredImg");
    var imgSrc = document.getElementById(imgId).value;
    var formdata = new FormData();
    formdata.append("submit", "submit");
    formdata.append("imgId", imgId);
    formdata.append("postID", postId);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "posts/setimage", true);
    ajax.send(formdata);
    ajax.onload = function() {
        document.getElementById("loading").setAttribute("style", "display:none;");
        fImg.setAttribute("src", imgSrc);
    };
}

function getUsers() {

    document.getElementById("main").innerHTML = spinner;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            datatable();
        }
    };
    xmlhttp.open("GET", "/admin/user", true);
    xmlhttp.send();

}

function getUserPermissions(userId) {

    document.getElementById("userData").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("userData").innerHTML = this.responseText;
            USERID = userId;
        }
    };
    xmlhttp.open("GET", "user/userpermissions/" + userId, true);
    xmlhttp.send();


}

function userCreate() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "user/create", true);
    xmlhttp.send();
}

function userInsert() {

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    var formdata = new FormData();
    formdata.append("submit", "submit");
    formdata.append("name", name);
    formdata.append("email", email);
    formdata.append("phone", phone);

    xmlhttp.open("POST", "user/create", true);
    xmlhttp.send(formdata);

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
}


function setPermission(pageId) {

    document.getElementById("userData").style.opacity = 0.6;

    var formdata = new FormData();
    formdata.append("checkPermission", "checkPermission");
    formdata.append("pageId", pageId);
    formdata.append("userId", USERID);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "user/checkpermission", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.innerHTML = ajax.responseText;
            document.getElementById("userData").style.opacity = 1;
            //console.log(ajax.responseText);
        }
    };
}

function getSubscribers() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "user/subscribers", true);
    xmlhttp.send();
}

function getUnsubscribed() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "user/unsubscribed", true);
    xmlhttp.send();
}

function getMessages() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "messages", true);
    xmlhttp.send();
}

function getMenu() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "menu", true);
    xmlhttp.send();
}

function userSettings() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "user/settings", true);
    xmlhttp.send();

}

function updateUserData() {

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;

    var formdata = new FormData();
    formdata.append("update", "update");
    formdata.append("name", name);
    formdata.append("email", email);
    formdata.append("phone", phone);
    formdata.append("password", password);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            //document.innerHTML = console.log("aa");
        }
    };
    xmlhttp.open("POST", "user/settings", true);
    xmlhttp.send(formdata);
}

function updateUserPassword() {

    var oldPassword = document.getElementById("oldPassword").value;
    var newPassword = document.getElementById("newPassword").value;
    var reNewPassword = document.getElementById("reNewPassword").value;

    var formdata = new FormData();
    formdata.append("updatePassword", "updatePassword");
    formdata.append("oldPassword", oldPassword);
    formdata.append("newPassword", newPassword);
    formdata.append("reNewPassword", reNewPassword);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            //document.innerHTML = console.log("aa");
        }
    };
    xmlhttp.open("POST", "user/settings", true);
    xmlhttp.send(formdata);
}

function getMessageById(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(id) {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
    xmlhttp.open("GET", "/admin/message/" + id, true);
    xmlhttp.send();

}

function messageNew() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();

        }
    };
    xmlhttp.open("GET", "/admin/message/new", true);
    xmlhttp.send();
}
function messageSend() {

    var subject = document.getElementById("subject").value;
    var editor1 = CKEDITOR.instances.editor1.getData();

    var formdata = new FormData();
    formdata.append("submit", "submit");
    formdata.append("subject", subject);
    formdata.append("editor1", editor1);

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "message/new", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
}

function messageDelete(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "message/delete/" + id, true);
    xmlhttp.send();
}

function loadGallery() {
    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            getImages('201703');
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "gallery", true);
    xmlhttp.send();
}

function upload() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onload = function() {
        ///////////////////////////////
        $('#imgUpload').ajaxForm({
            beforeSend: function() {
                $('#progress').show();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('.progress-bar').width(percentComplete + '%');

            },
            success: function() {
                $('#progress').hide();
                $('.progress-bar').width(0 + '%');

            },
            complete: function(response) {
                $('#img').attr("src", response.responseText);
                console.log(response.responseText);
            }
        });
        ///////////////////////////////////////    
    };
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "gallery/new", true);
    xmlhttp.send();
}
///////////////
function postTrash(id, type) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = xmlhttp.responseText;
            loadGrid(type);
        }
    };
    xmlhttp.open("GET", "post/delete/" + id, true);
    xmlhttp.send();
}

function postRestore(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            loadTrash();
            document.getElementById("main").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "post/restore/" + id, true);
    xmlhttp.send();
}

function postRemove(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            loadTrash();
            document.getElementById("main").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "post/remove/" + id, true);
    xmlhttp.send();
}

function loadSlider() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            datatable();
        }
    };
    xmlhttp.open("GET", "slider", true);
    xmlhttp.send();
}

function sliderEdit(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onload = function() {
        ///////////////////////////////
        $('#imgUpload').ajaxForm({
            beforeSend: function() {
                $('#progress').show();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('.progress-bar').width(percentComplete + '%');

            },
            success: function() {
                $('#progress').hide();
                $('.progress-bar').width(0 + '%');

            },
            complete: function(response) {
                $('#img').attr("src", response.responseText);
                $('.progress-bar').width(0 + '%');
            }
        });
        ///////////////////////////////////////    
    };
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "slider/edit/" + id, true);
    xmlhttp.send();

}

function sliderRemove(id, type) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = this.responseText;
            loadGrid(type);
            datatable();
        }
    };
    xmlhttp.open("GET", "slider/remove/" + id, true);
    xmlhttp.send();

}

function bookNew() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onload = function() {
        ///////////////////////////////
        $('#pdfUpload').ajaxForm({
            beforeSend: function() {
                $('#progress').show();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('.progress-bar').width(percentComplete + '%');

            },
            success: function() {
                $('#progress').hide();
                $('#response').html(response.responseText);
            },
            complete: function(response) {
                $('.progress-bar').width(0 + '%');
                $('#flname').html(response.responseText);
            }
        });
    };

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
    xmlhttp.open("GET", "books/new", true);
    xmlhttp.send();

}

function bookInsert() {

    var title = document.getElementById("title").value;
    var editor1 = CKEDITOR.instances.editor1.getData();
    var startdate = document.getElementById("single_cal1").value;

    var formdata = new FormData();
    formdata.append("submit", "save");
    formdata.append("title", title);
    formdata.append("editor1", editor1);
    formdata.append("startdate", startdate);

    var ajax = new XMLHttpRequest();
    xmlhttp.open("POST", "books/new", true);
    xmlhttp.send(formdata);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
}

function getMenuById(id) {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "menu/update/" + id, true);
    xmlhttp.send();
}

function menuNew() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "menu/new", true);
    xmlhttp.send();
}

function menuInsert() {

    var name = document.getElementById("name").value;
    var alias = document.getElementById("alias").value;

    var formdata = new FormData();
    formdata.append("submit", "save");
    formdata.append("name", name);
    formdata.append("alias", alias);

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "menu/new", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = this.responseText;
        }
    };
}
function getMailing() {

    document.getElementById("main").innerHTML = spinner;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {

        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
    xmlhttp.open("GET", "mailing/lastnews", true);
    xmlhttp.send();
}

function sendNews(){
    
    var editor1 = CKEDITOR.instances.editor1.getData();
    
    var formdata = new FormData();
    formdata.append("submit", "send");
    formdata.append("editor1", editor1);
    
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "mailing/lastnews", true);
    ajax.send(formdata);

    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            document.getElementById("main").innerHTML = this.responseText;
            build();
        }
    };
   
    
}