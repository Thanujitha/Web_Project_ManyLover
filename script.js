function changpaswordIcon() {
    var pwtxt = document.getElementById("pwtxt");
    var pwbtn = document.getElementById("button-addon2");

    if (pwtxt.type == "text") {

        pwtxt.type = "password";
        pwbtn.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";


    } else {

        pwtxt.type = "text";
        pwbtn.innerHTML = "<i class='bi bi-eye-fill'></i>";

    }


}

function changpaswordIcon1() {
    var pwtxt = document.getElementById("pwtxt1");
    var pwbtn = document.getElementById("button-addon1");

    if (pwtxt.type == "text") {

        pwtxt.type = "password";
        pwbtn.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";

    } else {

        pwtxt.type = "text";
        pwbtn.innerHTML = "<i class='bi bi-eye-fill'></i>";

    }

}

function changpaswordIcon2() {
    var pwtxt2 = document.getElementById("pwtxt2");
    var pwbtn2 = document.getElementById("button-addon3");

    if (pwtxt2.type == "text") {

        pwtxt2.type = "password";
        pwbtn2.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";

    } else {

        pwtxt2.type = "text";
        pwbtn2.innerHTML = "<i class='bi bi-eye-fill'></i>";

    }

}

function loginChange(id) {

    var loginDiv = document.getElementById("loginDiv");
    var joinDiv = document.getElementById("joinDiv");
    var title = document.getElementById("title");



    if (id == 1) {
        // loginDiv.classList.toggle("d-none");
        loginDiv.className = "d-block";
        joinDiv.className = "d-none";
        title.className = "d-none d-lg-block"

    } else if (id == 2) {
        joinDiv.className = "d-block";
        loginDiv.className = "d-none";
        title.className = "d-none d-lg-block"

    }


}

// function JoinChange() {

//     var loginDiv = document.getElementById("loginDiv");
//     var joinDiv = document.getElementById("joinDiv");

//     joinDiv.classList.toggle("d-none");
//     loginDiv.className = "d-none";

// }


function signUp() {
    var email = document.getElementById("email");
    var password = document.getElementById("pwtxt");
    var repassword = document.getElementById("pwtxt1");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("rp", repassword.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "e1") {
                document.getElementById("msgemail").innerHTML = "Please enter your Email Address.";
                document.getElementById("msgpassword").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "e2") {
                document.getElementById("msgemail").innerHTML = "Email Address should contain less than 100 characters.";
                document.getElementById("msgpassword").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "e3") {
                document.getElementById("msgemail").innerHTML = "Invalid Email Address.";
                document.getElementById("msgpassword").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "p1") {
                document.getElementById("msgpassword").innerHTML = "Please enter your Password.";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "p2") {
                document.getElementById("msgpassword").innerHTML = "length 6-20";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "pr1") {
                document.getElementById("msgrePassword").innerHTML = "Please enter your RePassword";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgpassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "pr2") {
                document.getElementById("msgrePassword").innerHTML = "Invalid RePassword";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgpassword").innerHTML = "";
                document.getElementById("msg").innerHTML = "";
            } else if (text == "ae") {
                document.getElementById("msg").innerHTML = "User with the same Email Address already exists.";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgpassword").innerHTML = "";
            } else if (text = "success") {

                loginChange(1);

                document.getElementById("msg").innerHTML = "";
                document.getElementById("msgrePassword").innerHTML = "";
                document.getElementById("msgemail").innerHTML = "";
                document.getElementById("msgpassword").innerHTML = "";
                email.value = "";
                password.value = "";
                repassword.value = "";
            }
        }
    };

    r.open("POST", "signupProsess.php", true);
    r.send(f);


}

function logIn() {
    var email = document.getElementById("emaill");
    var password = document.getElementById("pwtxt2");
    var rememberMe = document.getElementById("rememberMe");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "e1") {
                document.getElementById("msgemaill").innerHTML = "Please enter your Email Address.";
                document.getElementById("msgpasswordl").innerHTML = "";
                document.getElementById("msg1").innerHTML = "";
            } else if (t == "p1") {
                document.getElementById("msgemaill").innerHTML = "";
                document.getElementById("msgpasswordl").innerHTML = "Please enter your password.";
                document.getElementById("msg1").innerHTML = "";
            } else if (t == "in") {
                document.getElementById("msgemaill").innerHTML = "";
                document.getElementById("msgpasswordl").innerHTML = "";
                document.getElementById("msg1").innerHTML = "Invalid Email or Password";
            } else if (t == "success") {
                document.getElementById("msgemaill").innerHTML = "";
                document.getElementById("msgpasswordl").innerHTML = "";
                document.getElementById("msg1").innerHTML = "";

                window.location = "home.php";
            }

        }
    };

    r.open("POST", "logInProsess.php", true);
    r.send(f);
}

var bm;
function openModel() {
    var m = document.getElementById("cordSend");
    bm = new bootstrap.Modal(m);
    bm.show();

}
var bm1
function newPasword() {

    var email = document.getElementById("femaill");
    var vcord = document.getElementById("verifiCord");

    var f = new FormData();
    f.append("e", email.value);
    f.append("v", vcord.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "sucsess") {

                var m = document.getElementById("fogetpassword");
                bm1 = new bootstrap.Modal(m);
                bm.hide();
                bm1.show();
                document.getElementById("msgfoget").innerHTML = "";
            } else {
                document.getElementById("msgfoget").innerHTML = t;
            }

        }
    }


    r.open("POST", "chackCord.php", true);
    r.send(f);

}

function sendCode() {
    var email = document.getElementById("femaill");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                document.getElementById("msgfoget").innerHTML = "";
                document.getElementById("msgchak").innerHTML = "Verification Code has sent to your email. Please check inbox.";
            } else {
                document.getElementById("msgfoget").innerHTML = t;
            }

        }

    };

    r.open("GET", "sendVerificationCord.php?e=" + email.value, true);
    r.send();

}

function changePassword() {
    var password = document.getElementById("fpassword");
    var repassword = document.getElementById("frePassword");
    var email = document.getElementById("femaill");
    var vcord = document.getElementById("verifiCord");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("rp", repassword.value);
    f.append("vc", vcord.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                window.location.reload();

            } else {
                document.getElementById("msgfoget1").innerHTML = t;

            }


        }

    };

    r.open("POST", "ChangePassword.php", true);
    r.send(f);

}


// product view next and prev

const gap = 16;

const carousel = document.getElementById("carousel"),
    content = document.getElementById("content"),
    next = document.getElementById("next"),
    prev = document.getElementById("prev");

next.addEventListener("click", e => {
    carousel.scrollBy(width + gap, 0);
    if (carousel.scrollWidth !== 0) {
        prev.style.display = "flex";
    }
    if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
        next.style.display = "none";
    }
});
prev.addEventListener("click", e => {
    carousel.scrollBy(-(width + gap), 0);
    if (carousel.scrollLeft - width - gap <= 0) {
        prev.style.display = "none";
    }
    if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
        next.style.display = "flex";
    }
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));

// product view next and prev


function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            }
        }
    };

    r.open("GET", "signOutProsess.php", true);
    r.send();

}

function edit() {
    var name = document.getElementById("fn1");
    var namet = document.getElementById("fn");
    var contact = document.getElementById("cn");
    var contactT = document.getElementById("cn1");
    var about = document.getElementById("ay");
    var aboutT = document.getElementById("ay1");
    var fb = document.getElementById("fb");
    var fb1 = document.getElementById("fb1");
    var twit = document.getElementById("twit");
    var twitT = document.getElementById("twit1");
    var linkedin = document.getElementById("linkedin");
    var linkedinT = document.getElementById("linkedin1");
    var ytube = document.getElementById("ytube");
    var ytubeT = document.getElementById("ytube1");
    var education = document.getElementById("ed");
    var educationT = document.getElementById("ed1");
    var save = document.getElementById("save");
    var edit = document.getElementById("edit");

    save.classList.toggle("d-none");
    edit.classList.toggle("d-none");

    name.classList.toggle("d-none");
    namet.classList.toggle("d-none");

    contact.classList.toggle("d-none");
    contactT.classList.toggle("d-none");

    about.classList.toggle("d-none");
    aboutT.classList.toggle("d-none");

    fb.classList.toggle("d-none");
    fb1.classList.toggle("d-none");

    twit.classList.toggle("d-none");
    twitT.classList.toggle("d-none");

    linkedin.classList.toggle("d-none");
    linkedinT.classList.toggle("d-none");

    ytube.classList.toggle("d-none");
    ytubeT.classList.toggle("d-none");

    education.classList.toggle("d-none");
    educationT.classList.toggle("d-none");


}

function updateProfile() {

    var name = document.getElementById("fn");
    var contact = document.getElementById("cn");
    var about = document.getElementById("ay");
    var fb = document.getElementById("fb");
    var twit = document.getElementById("twit");
    var linkedin = document.getElementById("linkedin");
    var ytube = document.getElementById("ytube");
    var education = document.getElementById("ed");

    var f = new FormData();

    f.append("n", name.value);
    f.append("c", contact.value);
    f.append("a", about.value);
    f.append("f", fb.value);
    f.append("t", twit.value);
    f.append("l", linkedin.value);
    f.append("y", ytube.value);
    f.append("ed", education.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "sucsess") {
                document.getElementById("alart").classList.toggle("d-none");
                window.location = "userProfile.php";
            }
        }
    };

    r.open("POST", "userProfileUpdateProcess.php", true);
    r.send(f);


}

function changeImage() {

    var view = document.getElementById("viewimg");//image tag
    var file = document.getElementById("profileimg");//file chooser

    file.onchange = function () {

        var file1 = this.files[0];
        var url1 = window.URL.createObjectURL(file1);
        view.src = url1;

        var f = new FormData();

        f.append("u", file.files[0])

        var r = new XMLHttpRequest

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                alert(t);
            }
        };

        r.open("POST", "profileImagesavePrasecc.php", true);
        r.send(f);
    }

}


function nextDescription() {
    var p = document.getElementById("pricing");
    var d = document.getElementById("description");
    var title = document.getElementById("title");
    var brand = document.getElementById("brandselect");
    var price = document.getElementById("price");

    var f = new FormData();

    f.append("t", title.value);
    f.append("b", brand.value);
    f.append("p", price.value);

    var errortitle = document.getElementById("errortitle");
    var errorbrand = document.getElementById("errorc");
    var errorprice = document.getElementById("errorprice");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Please enter the title of your GIG" || t == "Max Text Legnth 80 and Min Text Legnth 10") {
                errortitle.innerHTML = t;
                errorbrand.innerHTML = "";
                errorprice.innerHTML = "";

            } else if (t == "Please select the Brand") {
                errortitle.innerHTML = "";
                errorbrand.innerHTML = t;
                errorprice.innerHTML = "";

            } else if (t == "Please enter GIG price" || t == "Please enter valide price") {
                errortitle.innerHTML = "";
                errorbrand.innerHTML = "";
                errorprice.innerHTML = t;

            } else if (t == "sucsess") {
                errortitle.innerHTML = "";
                errorbrand.innerHTML = "";
                errorprice.innerHTML = "";
                p.classList.toggle("d-none");
                d.classList.toggle("d-none");

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "nextDescription.php", true);
    r.send(f);

}
function backDescription() {
    var p = document.getElementById("pricing");
    var d = document.getElementById("description");

    p.classList.toggle("d-none");
    d.classList.toggle("d-none");
}

function nextGallery() {
    var g = document.getElementById("gallery");
    var d = document.getElementById("description");
    var description = document.getElementById("descriptionarea");

    var f = new FormData();

    f.append("d", description.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "sucsess") {
                g.classList.toggle("d-none");
                d.classList.toggle("d-none");
            } else {
                document.getElementById("errord").innerHTML = t;
            }

        }
    };

    r.open("POST", "nextgalery.php", true);
    r.send(f);

}

function backtGallery() {
    var g = document.getElementById("gallery");
    var d = document.getElementById("description");

    g.classList.toggle("d-none");
    d.classList.toggle("d-none");
}


function catagaryChange() {
    var cid = document.getElementById("cid");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            document.getElementById("brand").innerHTML = r.responseText;
        }
    }

    r.open("GET", "BrandChange.php?cid=" + cid.value, true);
    r.send();

}

function changeProductImage() {

    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("preview0").src = url;

    }

}

function changeProductImage1() {

    var image = document.getElementById("imageuploader1");

    image.onchange = function () {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("preview1").src = url;

    }

}

function changeProductImage2() {

    var image = document.getElementById("imageuploader2");

    image.onchange = function () {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("preview2").src = url;

    }

}


function addnewgig() {
    var title = document.getElementById("title");
    var brandselect = document.getElementById("brandselect");
    var price = document.getElementById("price");
    var descriptionarea = document.getElementById("descriptionarea");
    var imageuploader = document.getElementById("imageuploader");
    var imageuploader1 = document.getElementById("imageuploader1");
    var imageuploader2 = document.getElementById("imageuploader2");


    var f = new FormData();

    f.append("t", title.value);
    f.append("b", brandselect.value);
    f.append("p", price.value);
    f.append("d", descriptionarea.value);
    f.append("i1", imageuploader.files[0]);
    f.append("i2", imageuploader1.files[0]);
    f.append("i3", imageuploader2.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "sucsess") {
                window.location = "Gig.php";
            } else {

                alert(t);
            }
        }
    };

    r.open("POST", "addprodctProcess.php", true);
    r.send(f);

}

function loadminimg(url) {

    var url1 = document.getElementById(url).src;
    var mainimage = document.getElementById("mainimage");

    mainimage.style.backgroundImage = "url(" + url1 + ")";

}


function updateGig(id) {

    var preview0 = document.getElementById("preview0").src;
    var preview1 = document.getElementById("preview1").src;
    var preview2 = document.getElementById("preview2").src;

    var gig_id = id;
    var title = document.getElementById("title");
    var brandselect = document.getElementById("brandselect");
    var price = document.getElementById("price");
    var descriptionarea = document.getElementById("descriptionarea");

    var imageuploader = document.getElementById("imageuploader");
    var imageuploader1 = document.getElementById("imageuploader1");
    var imageuploader2 = document.getElementById("imageuploader2");


    var f = new FormData();

    f.append("v1", preview0);
    f.append("v2", preview1);
    f.append("v3", preview2);

    f.append("id", gig_id);
    f.append("t", title.value);
    f.append("b", brandselect.value);
    f.append("p", price.value);
    f.append("d", descriptionarea.value);
    f.append("i1", imageuploader.files[0]);
    f.append("i2", imageuploader1.files[0]);
    f.append("i3", imageuploader2.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "sucsess") {
                window.location = "Gig.php";
            } else {

                alert(t);
            }
        }
    };

    r.open("POST", "UpdateProsess.php", true);
    r.send(f);

}


function PlashOrder(gigId) {

    var msa = document.getElementById("msa");
    var file1 = document.getElementById("file1");
    var delivaryDate = document.getElementById("todate");

    var f = new FormData();

    f.append("msa", msa.value);
    f.append("file1", file1.files[0]);
    f.append("gigid", gigId);
    f.append("dd", delivaryDate.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "home.php";
            } else {
                alert(t);

            }
        }
    };

    r.open("POST", "PlashOrderProcess.php", true);
    r.send(f);
}

var uplodm;
function openFinalProjectUploardModel() {

    var m = document.getElementById("UploadProject");
    uplodm = new bootstrap.Modal(m);
    uplodm.show();
}

function uploadFinalProject() {
    alert("id");
}

function addMyFavorite(id) {
    var gid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "MyFavorite.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "addMyFavoritProcess.php?id=" + gid, true);
    r.send();
}

function sendmessage(s, me) {

    var message = document.getElementById("m");

    var f = new FormData();

    f.append("m", message.value);
    f.append("to", s);
    f.append("me", me);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "Message.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "SendMessageProcess.php", true);
    r.send(f);

}


function viweMessage(to, send) {

    var f = new FormData();

    f.append("to", to);
    f.append("send", send);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("messageView").innerHTML = t;

        }
    }

    r.open("POST", "MessageViewProcess.php", true);
    r.send(f);

}


function sendmessage1(s, t) {
    var message = document.getElementById("m");

    var f = new FormData();

    f.append("m", message.value);
    f.append("to", t);
    f.append("me", s);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "Message.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "SendMessageProcess.php", true);
    r.send(f);
}

function search() {
    var searchtext = document.getElementById("Search").value;

    window.location = "search.php?s=" + searchtext;
}

function change(id) {

    var gig = document.getElementById("gig");
    var feedback = document.getElementById("feedback");

    var gigb = document.getElementById("gigb");
    var feedbackb = document.getElementById("feedbackb");

    if (id == 1) {
        gig.className = "d-block";
        feedback.className = "d-none";

        gigb.classList.add("active");
        feedbackb.classList.remove("active");

    } else if (id == 2) {
        gig.className = "d-none";
        feedback.className = "d-block";

        feedbackb.classList.add("active");
        gigb.classList.remove("active");
    }


    // gig.classList.toggle("d-none");
    // feedback.classList.toggle("d-none");
}
function finishOrder(gigId, uid) {

    var file1 = document.getElementById("file1");

    var f = new FormData();

    f.append("file1", file1.files[0]);
    f.append("gigid", gigId);
    f.append("uid", uid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "CompleteOrder.php";
            } else {
                alert(t);

            }
        }
    };

    r.open("POST", "FinishOrderProcess.php", true);
    r.send(f);

}


function cancelOrder(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "cancelOrder.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "CancelOrderProcess.php?id=" + id, true);
    r.send();
}

function printDiv() {
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

function serchearning(uid) {

    var todate = document.getElementById("todate");
    var fromdate = document.getElementById("fromdate");

    var f = new FormData();
    f.append("uid", uid);
    f.append("todate", todate.value);
    f.append("fromdate", fromdate.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("v").innerHTML = t;

        }
    }

    r.open("POST", "EarningSearch.php", true);
    r.send(f);

}

function sendfeedbak(id) {

    var feedback = document.getElementById("feedback");

    var f = new FormData();
    f.append("id", id);
    f.append("feedback", feedback.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                alert("send Feedback Sucsess");
                window.location = "home.php";

            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "FeedbackProsecc.php", true);
    r.send(f);
}

function adminCode() {

    var email = document.getElementById("email");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                openModel();
            } else {
                document.getElementById("msg").innerHTML = t;
            }

        }
    }

    r.open("GET", "AdminCordSend.php?email=" + email.value, true);
    r.send();

}

function ReSendadminCode() {
    bm.hide();
    adminCode();
}

function AdminLogin() {

    var verifiCord = document.getElementById("verifiCord");
    var email = document.getElementById("email");

    
    var f = new FormData();
    f.append("code", verifiCord.value );
    f.append("email",  email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "AdminDashboard.php";
            } else {
                document.getElementById("msgfoget").innerHTML=t;
            }

        }
    };

    r.open("POST", "AdminloginProcess.php" , true);
    r.send(f);
}

function AdminSignOut(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "AdminSignIn.php";
            }
            alert (t);
        }
    };

    r.open("GET", "AdminSignOutProsess.php", true);
    r.send();

}

function HistorySearch() {

    var todate = document.getElementById("todate");
    var fromdate = document.getElementById("fromdate");

    var f = new FormData();
    f.append("todate", todate.value);
    f.append("fromdate", fromdate.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("view").innerHTML = t;

        }
    }

    r.open("POST", "HistorySearchProcess.php", true);
    r.send(f);

}
