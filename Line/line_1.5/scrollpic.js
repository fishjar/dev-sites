// JavaScript Document
var rundiv = document.getElementById("rundiv")
var run1 = document.getElementById("run1")
var run2 = document.getElementById("run2")
var speed=50
run2.innerHTML=run1.innerHTML
function Marquee(){
	if(run2.offsetWidth-rundiv.scrollLeft<=0)
		rundiv.scrollLeft-=run1.offsetWidth
		else{
		rundiv.scrollLeft++
	}
}
var MyMar=setInterval(Marquee,speed)
rundiv.onmouseover=function() {clearInterval(MyMar)}
rundiv.onmouseout=function() {MyMar=setInterval(Marquee,speed)}