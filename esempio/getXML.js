function getXML() {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            var txt = this.responseText;
            
            document.getElementById('xml').innerHTML = txt;
            var xml = this.responseXML;
            
            x = xml.getElementsByTagName("login");
                for (i = 0; i < x.length; i++) {
                    this += x[i].textContent + "<br>";
                }
            console.log(txt);
            
            y = xml.getElementsByTagName("cmd");
            console.log(y[0].getAttribute('att01'));
        }
        
    };
    
    xmlhttp.open("GET", "xml.php?q=xml", true);
    xmlhttp.send();
    
    return true;

}