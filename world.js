window.onload = function() {
  var lookup = document.getElementById("lookup");
  var lookupcities = document.getElementById("lookupcities");  
  var countryname = document.getElementById("country");
  var result = document.getElementById("result");

  var httpRequest = new XMLHttpRequest();
  var url;

  lookup.onclick = function() {
    url = "http://localhost/info2180-lab5/world.php" + "?country=" + countryname.value + "&context=none";
    httpRequest.onreadystatechange = dothis;
    httpRequest.open('GET', url);
    httpRequest.send();
  };

  lookupcities.onclick = function() {
    url = "http://localhost/info2180-lab5/world.php" + "?country=" + countryname.value + "&context=cities";
    httpRequest.onreadystatechange = dothis;
    httpRequest.open('GET', url);
    httpRequest.send();
  };

  function dothis() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var response = httpRequest.responseText;
        result.innerHTML = response; 
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
};
