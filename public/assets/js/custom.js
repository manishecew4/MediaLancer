$(document).ready(function () {
    $('.bannerSlide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
    });


    $('.reviewSlide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
    });


    $('.pcSlide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1000,
        arrows: false,
    });

    $('.pcSlide').mouseover(function () {
        $(this).slick('play')
    });
    $('.pcSlide').mouseout(function () {
        $(this).slick('pause')
    });

    $('.vcSlide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1000,
        arrows: false,
    });

    $('.workSlide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        fade: true,
    });
    $('.workSlidefor').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.workSlide',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
    });


    $('.photographerSlide').slick({
        slidesToShow: 4,
        slidesToScroll: 3,
        autoplay: false,
        autoplaySpeed: 5000,
        arrows: false,
        // variableWidth: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
                prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
                prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            }
        }
        ]


    });




    $('.videographerSlide').slick({
        slidesToShow: 4,
        slidesToScroll: 3,
        autoplay: false,
        autoplaySpeed: 5000,
        arrows: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 2,
                arrows: true,
                nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
                prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            }
        },

        ]
    });

    // Clone Div
    function multiplyNode(node, count, deep) {
        for (var i = 0, copy; i < count - 1; i++) {
            copy = node.cloneNode(deep);
            node.parentNode.insertBefore(copy, node);
        }
    }

    multiplyNode(document.querySelector('.searchResultCard'), 20, true);

    // Back to top button
    var btn = $('#top_btn');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    var empRating = $(".empRating").text;
    console.log(empRating);

    ScrollReveal({ reset: true });
    ScrollReveal().reveal(".slide-right", {
        duration: 3000,
        origin: "left",
        distance: "300px",
        easing: "ease-in-out"
    });



    AOS.init();
});

// Tabs Js
function openPlan(evt, planName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(planName).style.display = "block";
    evt.currentTarget.className += " active";
}
function openPlanVideo(evt, planName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab_content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("switch_tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(planName).style.display = "block";
    evt.currentTarget.className += " active";
}

$("document").ready(function () {
    $(".tab-slider--body").hide();
    $(".tab-slider--body:first").show();
});

$(".tab-slider--nav li").click(function () {
    $(".tab-slider--body").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();
    if ($(this).attr("rel") == "tab2") {
        $('.tab-slider--tabs').addClass('slide');
    } else {
        $('.tab-slider--tabs').removeClass('slide');
    }
    $(".tab-slider--nav li").removeClass("active");
    $(this).addClass("active");
});


lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'disableScrolling': true,
    'showImageNumberLabel': false,
})
// Login Animation Start


function gotoSignin() {
    const loginPage = document.getElementById("log_in");
    const signupPage = document.getElementById("sign_up");
    loginPage.classList.remove("d-none");
    signupPage.classList.remove("d-block");

}

function gotoSignup() {
    const loginPage = document.getElementById("log_in");
    const signupPage = document.getElementById("sign_up");
    loginPage.classList.add("d-none");
    signupPage.classList.add("d-block");
}

function ru_vendor() {
    location.href = ".././vendorContact.html";
}



// Login Animation End
var btnUpload = $("#upload_file"),
    btnOuter = $(".button_outer");
btnUpload.on("change", function (e) {
    var ext = btnUpload.val().split(".").pop().toLowerCase();
    if ($.inArray(ext, ["gif", "png", "jpg", "jpeg"]) == -1) {
        $(".error_msg").text("Not an Image...");
    } else {
        $(".error_msg").text("");
        btnOuter.addClass("file_uploading");
        setTimeout(function () {
            btnOuter.addClass("file_uploaded");
        }, 3000);
        var uploadedFile = URL.createObjectURL(e.target.files[0]);
        setTimeout(function () {
            $("#uploaded_view")
                .append('<img src="' + uploadedFile + '" />')
                .addClass("show");
        }, 3500);
    }
});
$(".file_remove").on("click", function (e) {
    $("#uploaded_view").removeClass("show");
    $("#uploaded_view").find("img").remove();
    btnOuter.removeClass("file_uploading");
    btnOuter.removeClass("file_uploaded");
});
function openSignin(){
    $('#signinMain').modal('show');
    $('#fp_email').modal('hide');
    $('#fp_newPass').modal('hide');
    $('#otp_email').modal('hide')
}
function openModal() {
    $('#fp_email').modal('show');
    $('#fp_newPass').modal('hide');
    $('#otp_email').modal('hide')
}
function go_to_newPass() {
    $('#fp_newPass').modal('show');
    $('#fp_email').modal('hide');
    console.log("clicked");
}
function go_to_otp() {
    $('#fp_email').modal('hide')
    $('#fp_newPass').modal('hide');
    $('#otp_email').modal('show')
}
function submit_to_newPass() {
    $('#fp_email').modal('hide')
    $('#fp_newPass').modal('hide');
    $('#otp_email').modal('hide');
}
////////////////////////////////////////////////



