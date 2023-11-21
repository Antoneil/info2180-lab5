// Wait for the window to load before executing the JavaScript code
window.onload = function() {
  var lookup = document.getElementById("lookup");
  var countryname = document.getElementById("country");
  var result = document.getElementById("result");
  var lookupcities = document.getElementById("lookupcities");

  var httpRequest = new XMLHttpRequest();
  var url;

  lookup.onclick = function() {
    url = "http://localhost/info2180-lab5/world.php" + "?country=" + countryname.value + "&context=none";
    httpRequest.onreadystatechange = dothis;
    httpRequest.open('GET', url);
    httpRequest.send();
  };

  
  function dothis() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var response = httpRequest.responseText;
        result.innerHTML = response; // Update the result element with the response
      } else {
        alert('There was a problem with the request.');
      }
    }
  }

  lookupcities.onclick = function() {
    url = "http://localhost/info2180-lab5/world.php" + "?country=" + countryname.value + "&context=cities";
    httpRequest.onreadystatechange = dothis;
    httpRequest.open('GET', url);
    httpRequest.send();
  };
};
