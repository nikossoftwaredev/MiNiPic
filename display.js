function display(){	
	var images = ["assets/pictures/gunaikes1.jpg", "assets/pictures/gunaikes2.jpg", "assets/pictures/gunaikes3.jpg", "assets/pictures/topio1.jpg", "assets/pictures/topio2.jpg", "assets/pictures/prosopo1.jpg", "assets/pictures/prosopo2.jpg", "assets/pictures/antikeim.jpg", "assets/pictures/aksio2.jpg", "assets/pictures/aksio2.jpg"];
	for(int i =0;i<images.length;i++);
	
	document.write("<table class = "left">");
	document.write("<tr ><td rowspan="7"><img class = "mikro" src = "images[i]"></td></tr>");
	document.write("<tr><td width = "40%" height="8.3%">Name</td></tr>");
	document.write("<tr><td height="8.3%">Χρήστης</td></tr>");
	document.write("<tr><td height="8.3%">Κατηγορία:</td></tr>");
	document.write("<tr><td valign="top"  height="41.5%">Περιγραφή:</td></tr>");
	document.write("<tr><td height="8.3%">Χάρτης:</td></tr>");
	document.write("<tr><td valign="top" height="24.9%">Μ.Ο. Βαθμολογίας: <br># Ψήφων:<br>Ψήφισε: </td>");
	document.write("</tr>");
	document.write("</table>");
		
}