var i=0;
var images=[];
var time=3000;
images[0]='slideshow1.jpg';
images[1]='slideshow2.jpg';
images[2]='slideshow3.jpg';
images[3]='slideshow4.jpg';
images[4]='slideshow5.jpg';
images[5]='slideshow6.jpg';
images[6]='slideshow7.jpg';
images[7]='slideshow8.jpg';
images[8]='slideshow9.jpg';
images[9]='slideshow10.jpg';
images[10]='slideshow11.jpg';

function changeImg(){
	document.slide.src=images[i];
	if(i < images.length-1){
		i++;
	}
	else{
		i=0;
	}
	setTimeout("changeImg()", time);
}
window.onload = changeImg;
