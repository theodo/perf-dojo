function setCookie(name,value,days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}
function eraseCookie(name) {   
  document.cookie = name+'=; Max-Age=-99999999;';  
}

var container = document.createElement("div");
container.style="position: fixed;bottom: 0;background:lightgray;padding: 2em;margin: 0;min-height: 30%;text-align: center;";
container.id='cookie-consent';

var p = document.createElement("p");
p.textContent = "Ce site utilise en plus de tout le reste des cookies de tracking. Pour être conforme avec la loi en vigueur dans votre pays, nous devons demander votre autorisation avant de pouvoir continuer."

var button = document.createElement("button");
button.value = "Accepter";
button.textContent = "Accepter";
button.onclick = giveConsent;

var buttonReject = document.createElement("button");
buttonReject.value = "Refuser";
buttonReject.textContent = "Refuser";
buttonReject.onclick = rejectConsent;

function giveConsent()
{
  setCookie('cookieConsent', true, 365);
  document.getElementById('cookie-consent').hidden = 'hidden';
}

function rejectConsent()
{
  setCookie('cookieConsent', false, 365);
  document.getElementById('cookie-consent').hidden = 'hidden';
}

container.appendChild(p)
container.appendChild(button)
container.appendChild(buttonReject)

window.onload = function() {
  if(getCookie('cookieConsent') === "") {
    document.body.appendChild(container);
  }
}
