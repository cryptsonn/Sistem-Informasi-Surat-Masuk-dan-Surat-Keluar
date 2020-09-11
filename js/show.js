function myFunction() {
  var x = document.getElementById("passwordjs");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}