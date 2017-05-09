function entryChange1(){
     radio = document.getElementsByName('machine_code')
     if(radio[1].checked) {
         //フォーム
         document.getElementById('firstBox').style.display = "";
         document.getElementById('firstElement').style.display = "";
         document.getElementById('secondBox').style.display = "none";
         document.getElementById('secondElement').style.display = "none";
         document.getElementById('thirdBox').style.display = "none";
         document.getElementById('thirdElement').style.display = "none";
         document.getElementById('fourthBox').style.display = "none";
         document.getElementById('fourthElement').style.display = "none";
         document.getElementById('fifthBox').style.display = "none";
         document.getElementById('fifthElement').style.display = "none";
         //特典
         document.getElementById('firstNotice').style.display = "";
     } else if(radio[2].checked) {
         //フォーム
         document.getElementById('firstBox').style.display = "none";
         document.getElementById('firstElement').style.display = "none";
         document.getElementById('secondBox').style.display = "";
         document.getElementById('secondElement').style.display = "";
         document.getElementById('thirdBox').style.display = "none";
         document.getElementById('thirdElement').style.display = "none";
         document.getElementById('fourthBox').style.display = "none";
         document.getElementById('fourthElement').style.display = "none";
         document.getElementById('fifthBox').style.display = "none";
         document.getElementById('fifthElement').style.display = "none";
         //特典
         document.getElementById('firstNotice').style.display = "none";
     } else if(radio[3].checked) {
    	 // フォーム
    	 document.getElementById('firstBox').style.display = "none";
    	 document.getElementById('firstElement').style.display = "none";
    	 document.getElementById('secondBox').style.display = "none";
    	 document.getElementById('secondElement').style.display = "none";
    	 document.getElementById('thirdBox').style.display = "";
    	 document.getElementById('thirdElement').style.display = "";
    	 document.getElementById('fourthBox').style.display = "none";
    	 document.getElementById('fourthElement').style.display = "none";
    	 document.getElementById('fifthBox').style.display = "none";
    	 document.getElementById('fifthElement').style.display = "none";
     } else if(radio[4].checked) {
    	 // フォーム
    	 document.getElementById('firstBox').style.display = "none";
    	 document.getElementById('firstElement').style.display = "none";
    	 document.getElementById('secondBox').style.display = "none";
    	 document.getElementById('secondElement').style.display = "none";
    	 document.getElementById('thirdBox').style.display = "none";
    	 document.getElementById('thirdElement').style.display = "none";
    	 document.getElementById('fourthBox').style.display = "";
    	 document.getElementById('fourthElement').style.display = "";
    	 document.getElementById('fifthBox').style.display = "none";
    	 document.getElementById('fifthElement').style.display = "none";

     } else if(radio[5].checked) {
    	 // フォーム
    	 document.getElementById('firstBox').style.display = "none";
    	 document.getElementById('firstElement').style.display = "none";
    	 document.getElementById('secondBox').style.display = "none";
    	 document.getElementById('secondElement').style.display = "none";
    	 document.getElementById('thirdBox').style.display = "none";
    	 document.getElementById('thirdElement').style.display = "none";
    	 document.getElementById('fourthBox').style.display = "none";
    	 document.getElementById('fourthElement').style.display = "none";
    	 document.getElementById('fifthBox').style.display = "";
    	 document.getElementById('fifthElement').style.display = "";

     }
 }
 //オンロードさせ、リロード時に選択を保持
 window.onload = entryChange1;

