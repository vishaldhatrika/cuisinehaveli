var i=0;
var slides=[];

slides[0]="tf.jpg";
slides[1]="tf1.jpg";
slides[2]="tf2.jpg";
slides[3]="tf3.jpg";

function slideImg(){
    // var ele=document.getElementsByName('slideimg');
    document.slideimg.src="https://cuisinehaveli.000webhostapp.com/media/"+slides[i];
    if(i<slides.length-1){
        i++;
    }
    else{
        i=0;
    }

    setTimeout("slideImg()",3000);
}
window.onload=slideImg;