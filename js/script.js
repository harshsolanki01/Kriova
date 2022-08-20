//========================= Define Universal Variables ===================
let siteTite = "Kriova";
let siteURL = "http://"+ location.host +"/kriova/";
let ajax_url = siteURL + "ajax";

// ================================ Log Out The User =========================================
function logout() {
  var data = {};
  data.logout = true;

  $.ajax({
    url: ajax_url,
    method: "post",
    data: data,
    success: function (res) {
      if (res == "Logout Success") {
        location.reload();
      } else if (res == "Logout Failed") {
        alert("Logout Failed");
      }
    },
  });
}

// ================================ Email Phone Toggle In Login/Signup Form =========================================
$("#select_email").click(function () {
  $("#email").attr("type", "email");
  $("#email").removeAttr("pattern");
  $("#email").attr("placeholder", "example@some.com");
});
$("#select_phone").click(function () {
  $("#email").attr("type", "tel");
  $("#email").attr("pattern", "[+]{1}[0-9]{12}");
  $("#email").attr("placeholder", "+919876543210");
});

if (typeof error === undefined) {
  var error = false;
}

if (error) {
  $("#toggle").click();
}

//================================= Change image in profile template after image selection ==============================

$(document).ready(function () {
  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".avatar").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  };

  $(".file-upload").on("change", function () {
    readURL(this);
  });
});

// Initialise AOS Animarion Library
AOS.init();
