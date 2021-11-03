"use strict";

$(document).ready(function () {
  var userAgent = navigator.userAgent.toLowerCase();
  var InternetExplorer = false;
  if (/mozilla/.test(userAgent) && !/firefox/.test(userAgent) && !/chrome/.test(userAgent) && !/safari/.test(userAgent) && !/opera/.test(userAgent) || /msie/.test(userAgent)) InternetExplorer = true;

  if (InternetExplorer === true) {
    document.location.href = "http://localhost:3000/html/upgrade.html";
  }
});