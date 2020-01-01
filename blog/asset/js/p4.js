s=5

for(var i=1; i<=s; i++){

	for(var j=1;j<=s-i;j++){
		document.write('&nbsp;');
	}
	

	for(var k=1;k<=(2*i)-1;k++){

		document.write("*");
	}
	document.write("<br>");
}


// var x=10;
// function p1(){
// var x = 5; 
// document.write(x + "<br>");
// }

// p1(); //function call

// document.write(x);


// function sum(x,y){
// sum=x+y;
// }
// function sub(x,y){
// sub=x-y;
// }
// function multi(x,y){
// multi=x*y;
// }

// function div(x,y){
// 	if(y==0){
// document.write("Can not divide by ZERO");
// 	}
// else{
// 	div=x/y;
// 	document.write(div+"<br>");
// 	}
// }

// sum(5,6);
// document.write(sum+"<br>");

// sub(5,4);
// document.write(sub+"<br>");


// multi(5,7);
// document.write(multi+"<br>");


// div(5,50);


// function toCelsius(fahr){

// 	cel=(5/9)*(fahr-32);
// }


// toCelsius(104);
// document.write("Celsius " + cel);



// document.getElementById().innerHTML=book();

// function book(){

// 	function title(){
// 		document.write("JavaScript");
// 	}
// 	title();
// } 


// book();




