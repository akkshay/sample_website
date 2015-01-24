
function callAHAH(url, pageElement, callMessage, errorMessage, param, param2,param3,param4) { 
	if (callMessage)
     	document.getElementById(pageElement).innerHTML = callMessage;
     try {
     req = new XMLHttpRequest(); /* e.g. Firefox */
     } catch(e) {
       try {
       req = new ActiveXObject("Msxml2.XMLHTTP");  /* some versions IE */
       } catch (e) {
         try {
         req = new ActiveXObject("Microsoft.XMLHTTP");  /* some versions IE */
         } catch (E) {
          req = false;
         } 
       } 
     }
	req.onreadystatechange = function() {responseAHAH(pageElement, errorMessage, param, param2, param3);};
	req.open("GET",url,true);
	req.send(null);
}

function responseAHAH(pageElement, errorMessage, param, param2, param3) {
   var output = '';
   if(req.readyState == 4) {
      if(req.status == 200) {
         output = req.responseText;


		 if (pageElement == 'updateComments') {
		 	document.getElementById(pageElement).innerHTML = output;
		 }

		 
	 
		// (empty string)
		 if (pageElement == '') {
		 }


      } else {
		 if (pageElement)
         	document.getElementById(pageElement).innerHTML = errorMessage + " (" + req.status + ")\n"+output;
      }
   }
}
