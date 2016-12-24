function leaderboard()
{
	document.getElementById('LB').click();
	setTimeout(function(){leaderboard();},5000);
}

function show(str,f)
{

   // window.alert(f);
		               
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
			if(f==1){
                        document.getElementById(str).innerHTML=xmlhttp.responseText;
						document.getElementById('l_'+str).innerHTML="<img src=\"..\/images\/close.png\" />";
			} 
			else if(f==0){
                        document.getElementById(str).innerHTML=xmlhttp.responseText;
						document.getElementById('l_'+str).innerHTML="<img src=\"..\/images\/like.png\" />";
			} 	         
        }
   }
   var arr = str.split('|');
    for(i=0;i<10;i++)
	arr[1] = arr[1].replace('^%',' ');
    var params = 'flag='+f+'&topic='+arr[1]+'&wemail='+arr[0].replace('^%',' ')+'&uname=$uname';
    xmlhttp.open('POST', 'likes.php', true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader('Content-length', params.length);
    xmlhttp.setRequestHeader('Connection', 'close');
    xmlhttp.send(params);
}          
          
  function hide(str)
{
			window.alert("hide");
				return true;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById(str).innerHTML=xmlhttp.responseText;
						document.getElementById('l_'+str).innerHTML="<img src=\"..\/images\/like.png\" />";
                    }
                }
                var arr = str.split('|');
				for(i=0;i<10;i++)
					arr[1] = arr[1].replace('^%',' ');
                var params ='flag=0'+'&topic='+arr[1]+'&wemail='+arr[0].replace('^%',' ')+'&uname=$uname';
                xmlhttp.open('POST', 'likes.php', true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.setRequestHeader('Content-length', params.length);
                xmlhttp.setRequestHeader('Connection', 'close');
                xmlhttp.send(params);
            }
function setbackground()
{
	changeid('abh','black');
}
function removebackground()
{
	changeid('black','abh');
}
function changeid(obj,obj1)
{
	document.getElementById(obj).id = obj1;
} 

function show_coords(event)
{
var limit =window.innerHeight;

setbackground();
var top = window.pageYOffset;
var left = window.pageXOffset;
var x=event.clientX;
var y=event.clientY;
//alert("X coords: " +x + ", Y coords: " + y + "X offset: "+left + "Y offset: "+top + "     " +limit);
if(top-y>100)
top=top-y;
$("#black").css("padding-top", top);
$("#black").css("padding-left", x);

//document.getElementById('pop_up').style.padding=x;
//document.getElementById('pop_up').style.padding-top=y;
}

function show_post(obj,event)
{	
 
	
	//document.getElementById('pop_up').innerHTML=obj.id;
	//obj.style.color="black";
	comment1(obj)
}

function comment1(str)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('pop_up').innerHTML=xmlhttp.responseText;
		}
		if (xmlhttp.readyState!=4 || xmlhttp.status!=200)
		{
			document.getElementById('pop_up').innerHTML=" Loading Comments Please Wait...";
		}
	}
	var arr = str.split('#');
	for(i=0;i<10;i++)
		arr[1] = arr[1].replace('^%',' ');
	var params = 'topic='+arr[1]+'&wemail='+arr[0].replace('^%',' ');
	xmlhttp.open('POST', 'post.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', params.length);
	xmlhttp.setRequestHeader('Connection', 'close');
	xmlhttp.send(params);
//	setTimeout(function(){comment1(str);},5000);
}
function comment3(str)
{
	str=str.id;
	//window.alert('here');
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('status').innerHTML=xmlhttp.responseText;
//refresh_comment(params);
		}
		else
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('status').innerHTML="wait...";
		}
	}
	var arr = str.split('~');
	for(i=0;i<10;i++)
		arr[1] = arr[1].replace('^%',' ');
	comment=document.getElementById('user_comment').value;
	window.alert(comment);
	var params = 'topic='+arr[1]+'&wemail='+arr[0].replace('^%',' ')+'&comment='+comment;
	xmlhttp.open('POST', 'comment.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.setRequestHeader('Content-length', params.length);
	xmlhttp.setRequestHeader('Connection', 'close');
	xmlhttp.send(params);
}
