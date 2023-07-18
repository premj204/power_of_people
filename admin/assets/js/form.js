let baseURL = "";
var LOCAL_DOMAINS_1 = ["localhost", "127.0.0.1", "::1"];
if (LOCAL_DOMAINS_1.includes(window.location.hostname)) {
    baseURL = "http://localhost/power/admin/";
} else {
    baseURL = "";
}

function checkLocalhost() {
    let LOCAL_DOMAINS = ["localhost", "127.0.0.1", "::1"];
    if (LOCAL_DOMAINS.includes(window.location.hostname)) {
        return true;
    } else {
        return false;
    }
}

function onkeydown(event) {
    var ch = String.fromCharCode(event.keyCode);
    var filter = /[a-zA-Z]/;
    if (!filter.test(ch)) {
        event.returnValue = false;
    }
}

function formatDate(dt) {
    const today = new Date(dt);
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1; // Months start at 0!
    let dd = today.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    const formattedToday = dd + '-' + mm + '-' + yyyy;
    return formattedToday;
}

function showErrorTD(msg, id) {
    if ($("#" + id).closest("td").hasClass("error")) {
        $("#" + id).closest("td").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("td").addClass("error");
        $("#" + id).closest("td").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeErrorTD(id) {
    $("#" + id).closest("td").removeClass("error");
    $("#" + id).closest("td").find("span.errorMsgArrow").remove();
    $("#" + id).removeClass("errElement");
}

function showError(msg, id) {
    if ($("#" + id).closest("div").hasClass("error")) {
        $("#" + id).closest("div").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("div").addClass("error");
        $("#" + id).closest("div").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeError(id) {
    $("#" + id).closest("div").removeClass("error");
    $("#" + id).closest("div").find("span.errorMsgArrow").remove();
}

function showErrorplan(msg, id) {
    if ($("#" + id).closest("td").hasClass("error")) {
        $("#" + id).closest("td").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("td").addClass("error");
        $("#" + id).closest("td").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeErrorplan(id) {
    $("#" + id).closest("td").removeClass("error");
    $("#" + id).closest("td").find("span.errorMsgArrow").remove();
}


function showSuccess(msg, id) {
    if ($("#" + id).closest("div").hasClass("error")) {
        $("#" + id).closest("div").find("span.successMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("div").addClass("error");
        $("#" + id).closest("div").append("<span class='successMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeSuccess(id) {
    $("#" + id).closest("div").removeClass("error");
    $("#" + id).closest("div").find("span.successMsgArrow").remove();
}

function showDateError(msg, id) {
    if ($("#" + id).closest(".input-group").hasClass("error")) {
        $("#" + id).closest(".input-group").closest(".datediv").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest(".input-group").addClass("error");
        $("#" + id).closest(".input-group").after("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeDateError(id) {
    $("#" + id).closest(".input-group").removeClass("error");
    $("#" + id).closest(".input-group").closest(".datediv").find("span.errorMsgArrow").remove();
}

function showFGError(msg, id) {
    if ($("#" + id).closest("div.fg").hasClass("error")) {
        $("#" + id).closest("div.fg").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest("div.fg").addClass("error");
        $("#" + id).closest("div.fg").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeFGError(id) {
    $("#" + id).closest("div.fg").removeClass("error");
    $("#" + id).closest("div.fg").find("span.errorMsgArrow").remove();
}

function showErrorOnElement(id) {
    if ($("#" + id).hasClass("errElement")) {
    } else {
        $("#" + id).addClass("errElement");
    }
}

function changeErrorOnElement(id) {
    $("#" + id).removeClass("errElement");
}

function showErrorArrow(msg, id) {
    if ($("#" + id).closest(".form-group").hasClass("error")) {
        $("#" + id).closest(".form-group").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest(".form-group").addClass("error");
        $("#" + id).closest(".form-group").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function changeErrorArrow(id) {
    $("#" + id).closest(".form-group").removeClass("error");
    $("#" + id).closest(".form-group").find("span.errorMsgArrow").remove();
}

function show_error_arrow(msg, id) {
    if ($("#" + id).closest(".input-group").hasClass("error")) {
        $("#" + id).closest(".input-group").find("span.errorMsgArrow").html("<em class='ar-icon'></em>" + msg);
    } else {
        $("#" + id).closest(".input-group").addClass("error");
        $("#" + id).closest(".input-group").append("<span class='errorMsgArrow'><em class='ar-icon'></em>" + msg + "</span>");
    }
}

function change_error_arrow(id) {
    $("#" + id).closest(".input-group").removeClass("error");
    $("#" + id).closest(".input-group").find("span.errorMsgArrow").remove();
}

function trim(str) {
    return (("" + str).replace(/^\s*([\s\S]*\S+)\s*$|^\s*$/, '$1'));
}

function isValidEmail(value) {
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (filter.test(trim(value)))
        return true;
    else
        return false;
}

function validateName(value) {
    var filter = /^[a-zA-Z\s]*$/;
    if (filter.test(trim(value))) {
        return true;
    } else {
        return false;
    }
}

function isValidMobileNbr(value) {
    var filter = /^[6-9][0-9]{9}$/i;
    if (filter.test(trim(value)))
        return true;
    else
        return false;
}

function isValidAddress(value) {
    //Letters, numbers, comma, dot(period), hash, hyphen, underscore, space, 
    var regex = /^[a-zA-Z0-9,#\-._\s]*$/i;
    return regex.test(trim(value));
}

function isPhone(value) {
    var iChars = "0123456789+-#/() ";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isNumber(value) {
    var iChars = "0123456789";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isNumDigit(value) {
    var iChars = "0123456789.";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
}

function isPincode(value) {
    var iChars = "0123456789() ";
    for (var i = 0; i < value.length; i++) {
        if (iChars.indexOf(value.charAt(i)) == -1) {
            return false;
        }
    }
    return true;
} //End of isPinocde()


function is_int(value) {
    if (value > 0 && (value / 1) == 0) {
        return true;
    } else {
        return false;
    }
}

function isUserEmailExist(email) {
    var user = {};
    user.account = {};
    user.account.emailaddress = email;
    var q = JSON.stringify(user);

    var result = jQuery.ajax({
        url: "login/checkUserEmailAddress",
        type: 'POST',
        data: { 'jsonObj': q },
        cache: false,
        async: false,
        success: function (eMsg) { }
    }).responseText;
    return result;
}

function startTimer() {
    var counter = 60;
    var interval = setInterval(function () {
        counter--;
        if (counter <= 0) {
            clearInterval(interval);
            $('#timer').html('<span id="time">00</span> SEC</span>');
            jQuery(".btnResendOTP").prop('disabled', false).css({ "backgroundColor": "skyblue" });
            return;
        } else {
            $('#time').text(counter);
        }
    }, 1000);

}

function returnFormattedDate(dob) {
    var d = new Date(dob);
    dobString = ("0" + d.getDate()).slice(-2) + "-" + ("0" + (d.getMonth() + 1)).slice(-2) + "-" + d.getFullYear();
    return dobString;
}

jQuery(document).on('change', 'select#state_id', function (e) {
    e.preventDefault();
    var stateID = jQuery(this).val();
    getCityList(stateID);

});


function validateLogin(ele) {
    let hasError = 0;
    let email = jQuery("#email").val();
    let password = jQuery("#password").val();

    if (jQuery.trim(email) == "") {
        showErrorArrow("Please enter email Id.", "email"); hasError = 1;
    } else if (!isValidEmail(email)) {
        showErrorArrow("Please enter valid email Id.", "email"); hasError = 1;
    } else { changeErrorArrow("email"); }

    if (jQuery.trim(password) == "") { showErrorArrow("Please enter password.", "password"); hasError = 1; } else { changeErrorArrow("password"); }


    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;

    }
}

function validateRegister(ele) {
    let hasError = 0;
    let name = jQuery("#name").val();
    let email = jQuery("#email").val();
    let password = jQuery("#password").val();

    if (jQuery.trim(name) == "") { showErrorArrow("Please enter your name.", "name"); hasError = 1; } else { changeErrorArrow("name"); }
    if (jQuery.trim(email) == "") {
        showErrorArrow("Please enter your email Id.", "email"); hasError = 1;
    } else if (!isValidEmail(email)) {
        showErrorArrow("Please enter valid email Id.", "email"); hasError = 1;
    } else { changeErrorArrow("email"); }

    if (jQuery.trim(password) == "") { showErrorArrow("Please enter your secret  password.", "password"); hasError = 1; } else { changeErrorArrow("password"); }


    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;

    }
}


function validateBlogsFrm(ele) {
    let hasError = 0;
    let headline = jQuery("#headline").val();
    let description = jQuery("#description").val();
    let uploadFile = jQuery("#uploadFile").val();
    let category = jQuery("#category").val();
    
    if (jQuery.trim(headline) == "") { showErrorArrow("Please enter headline.", "headline"); hasError = 1; } else { changeErrorArrow("headline"); } 
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(uploadFile) == "") { showErrorArrow("Please upload image.", "uploadFile"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    
    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {
            let newFormData = jQuery("#BlogFrm").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "blog/add_blog",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("BlogFrm").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}

function ValidateEditblog(ele) {
    let hasError = 0;
    let headline = jQuery("#headline").val();
    let description = jQuery("#description").val();
    let uploadFile = jQuery("#uploadFile").val();
    let category = jQuery("#category").val();
    
    if (jQuery.trim(headline) == "") { showErrorArrow("Please enter headline.", "headline"); hasError = 1; } else { changeErrorArrow("headline"); } 
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(uploadFile) == "") { showErrorArrow("Please upload image.", "uploadFile"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    
    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {

        let newFormData = jQuery("#frmEditblog").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "blog/update_blog",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("frmEditblog").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}







































function validateInterviewFrm(ele) {
    let hasError = 0;
    let video_link = jQuery("#video_link").val();
    let details = jQuery("#details").val();
    let description = jQuery("#description").val();
    let category = jQuery("#category").val();
    let uploadThumbnail = jQuery("#uploadThumbnail").val();
    
    if (jQuery.trim(video_link) == "") { showErrorArrow("Please enter video link.", "video_link"); hasError = 1; } else { changeErrorArrow("video_link"); } 
    if (jQuery.trim(details) == "") { showErrorArrow("Please enter details.", "details"); hasError = 1; } else { changeErrorArrow("details"); }    
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("category"); }    
    if (jQuery.trim(uploadThumbnail) == "") { showErrorArrow("Please upload image.", "uploadThumbnail"); hasError = 1; } else { changeErrorArrow("uploadThumbnail"); }    
    
    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {

        let newFormData = jQuery("#InterviewFrm").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "interview/add_interview",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("InterviewFrm").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}


function ValidateEditinterview(ele) {
    let hasError = 0;
   
    let video_link = jQuery("#video_link").val();
    let details = jQuery("#details").val();
    let description = jQuery("#description").val();
    let category = jQuery("#category").val();
    let uploadThumbnail = jQuery("#uploadThumbnail").val();
    
    if (jQuery.trim(video_link) == "") { showErrorArrow("Please enter video link.", "video_link"); hasError = 1; } else { changeErrorArrow("video_link"); } 
    if (jQuery.trim(details) == "") { showErrorArrow("Please enter details.", "details"); hasError = 1; } else { changeErrorArrow("details"); }    
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("category"); }    
    if (jQuery.trim(uploadThumbnail) == "") { showErrorArrow("Please upload image.", "uploadThumbnail"); hasError = 1; } else { changeErrorArrow("uploadThumbnail"); }    
    

    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {

        let newFormData = jQuery("#IntereditFrm").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "interview/update_interview",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("IntereditFrm").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}



// story 

function validatestoryFrm(ele) {
    let hasError = 0;
    let title = jQuery("#title").val();
    let description = jQuery("#description").val();
    let uploadFile = jQuery("#uploadFile").val();
    let type = jQuery("#type").val();
    let category = jQuery("#category").val();
    // let tags = jQuery("#tags").val();
 
    
    if (jQuery.trim(title) == "") { showErrorArrow("Please enter title.", "title"); hasError = 1; } else { changeErrorArrow("title"); } 
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(uploadFile) == "") { showErrorArrow("Please upload image.", "uploadFile"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    if (jQuery.trim(type) == "") { showErrorArrow("Please select type.", "type"); hasError = 1; } else { changeErrorArrow("type"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("category"); }    
    // if (jQuery.trim(tags) == "") { showErrorArrow("Please enter category.", "tags"); hasError = 1; } else { changeErrorArrow("tags"); }    
   
   
    
    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {

        let newFormData = jQuery("#StoryFrm").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "story/add_story",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("StoryFrm").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}

function validateeditFrm(ele) {
    let hasError = 0;
    let title = jQuery("#title").val();
    let description = jQuery("#description").val();
    let uploadFile = jQuery("#uploadFile").val();
    let type = jQuery("#type").val();
    let category = jQuery("#category").val();
    // let tags = jQuery("#tags").val();
 
    
    if (jQuery.trim(title) == "") { showErrorArrow("Please enter title.", "title"); hasError = 1; } else { changeErrorArrow("title"); } 
    if (jQuery.trim(description) == "") { showErrorArrow("Please enter description.", "description"); hasError = 1; } else { changeErrorArrow("description"); }    
    if (jQuery.trim(uploadFile) == "") { showErrorArrow("Please upload image.", "uploadFile"); hasError = 1; } else { changeErrorArrow("uploadFile"); }    
    if (jQuery.trim(type) == "") { showErrorArrow("Please select type.", "type"); hasError = 1; } else { changeErrorArrow("type"); }    
    if (jQuery.trim(category) == "") { showErrorArrow("Please select category.", "category"); hasError = 1; } else { changeErrorArrow("category"); }    
    // if (jQuery.trim(tags) == "") { showErrorArrow("Please enter category.", "tags"); hasError = 1; } else { changeErrorArrow("tags"); }    
   
   
    
    if (hasError == 1) {
        $(".alert-success").css('display', 'none').find("span").html("");
        $(".alert-danger").css('display', 'none').find("span").html("");
        return false;
    } else {

        let newFormData = jQuery("#StoryeditFrm").serialize();
            jQuery.ajax({
            dataType: 'json',
            url: baseURL + "story/update_story",
            type: "POST",
            data: newFormData,
            cache: false,
            success: function (res) {
                if (typeof (res.status) != "undefined" && res.status == 200) {
                    $(".alert-success").css('display', 'block').find("span").html(res.msg);
                    $(".alert-danger").css('display', 'none').find("span").html("");
                    document.getElementById("StoryeditFrm").reset();
                } else {
                    $(".alert-success").css('display', 'none').find("span").html("");
                    $(".alert-danger").css('display', 'block').find("span").html(res.msg);
                }
            }
        });
        return false;
    }
}






// function ValidateDonation(ele) {
//     let hasError = 0;
//     let name = jQuery("#name").val();
//     let mobile = jQuery("#mobile").val();
//     let email = jQuery("#email").val();
//     let location = jQuery("#location").val();
//     let amount = jQuery("#amount").val();

//     if (jQuery.trim(name) == "") { showErrorArrow("Please enter society name.", "name"); hasError = 1; } else { changeErrorArrow("name"); }

//     if (jQuery.trim(mobile) == "") {
//         showErrorArrow("Please enter mobile no.", "mobile"); hasError = 1;
//     } else if (!isValidMobileNbr(contact_no)) {
//         showErrorArrow("Please enter valid mobile no.", "mobile"); hasError = 1;
//     } else { changeErrorArrow("mobile"); }

//     if (jQuery.trim(email) == "") {
//         showErrorArrow("Please enter email Id.", "email"); hasError = 1;
//     } else if (!isValidEmail(email_id)) {
//         showErrorArrow("Please enter valid email Id.", "email"); hasError = 1;
//     } else { changeErrorArrow("email"); }

//     if (jQuery.trim(location) == "") { showErrorArrow("Please enter address.", "location"); hasError = 1; } else { changeErrorArrow("location"); }


//     if (jQuery.trim(amount) == "") { showErrorArrow("Please enter amount.", "amount"); hasError = 1; } else { changeErrorArrow("amount"); }




//     if (hasError == 1) {
//         $(".alert-success").css('display', 'none').find("span").html("");
//         $(".alert-danger").css('display', 'none').find("span").html("");
//         return false;

//     }
// }