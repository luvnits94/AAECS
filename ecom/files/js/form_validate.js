var xx1 = false;
var xx2 = false;
var xx3 = false;
function phone_no_check() {
    var x, text, y;
    x = document.getElementById("phno").value;
	y=x.toString().length;
    if (isNaN(x) || y<10 || y>10) {
        text = "Please Enter 10 digit Phone Number";
        xx1 = false;
    } else {
        text = "";
        xx1 = true;
    }   
    document.getElementById("ph_check").innerHTML = text;
    document.getElementById("ph_check").style.color = "red";
}

function password_check(){
    var x, text, y;
    x1 = document.getElementById("password_1").value;
	y1=x1.toString().length;

	x2 = document.getElementById("password_2").value;
	y2=x2.toString().length;

    if (y1<8) 
    {
        text = "Please Enter password of minimum length of 8";
        xx2 = false;
    }
    else
    {
    	xx2 = true;
    	text = "";
    }
    document.getElementById("pass_check").innerHTML = text;
    document.getElementById("pass_check").style.color = "red";
    if(x1===x2)
    {
    	text2="";
    	xx3 = true;
    }
    else
    {
    	text = "Please re-enter password correctly";
    	xx3 = false;
    }
    document.getElementById("pass_recheck").innerHTML = text;
    document.getElementById("pass_recheck").style.color = "red";

}

function email_check() {
    var x, text, y;
    x = document.getElementById("email").value;
	y=x.toString();
    if (y.lastIndexOf(".com")>0 && y.lastIndexOf("@")>0 && y.lastIndexOf(".com")-y.lastIndexOf("@")>1) 
    {
        text = "";
    }
    else
    {
    	text = "Enter Valid Email .......@domain-name.com";
    }
    document.getElementById("email_check").innerHTML = text;
    document.getElementById("email_check").style.color = "red";
}
function overall_chechk(e)
{
	e.preventDefault();
	if(xx3 == true && xx3 == true && xx3 == true)	
	{
		return true;
	}
	else
	{
		return false;
	}
}