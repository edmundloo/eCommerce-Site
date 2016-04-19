var image1 = new Image()
image1.src = "media/slide-one.jpg"
var image2 = new Image()
image2.src = "media/slide-two.jpg"
var image3 = new Image()
image3.src = "media/slide-three.jpg"


/*this function changes the slide images on the homepage*/
/*var step=1;
function slideit()
{
	document.images.slide.src = eval("image"+step+".src");
	if(step<3)
		step++;
	else
		step=1;
	setTimeout("slideit()",2500);
}

slideit();*/


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function showDropdown() {
	document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

	var dropdowns = document.getElementsByClassName("dropdown-content");
	var i;
	for (i = 0; i < dropdowns.length; i++) {
	  var openDropdown = dropdowns[i];
	  if (openDropdown.classList.contains('show')) {
		openDropdown.classList.remove('show');
	  }
	}
  }
}


function productImage(){
	var x = document.getElementById("image-container").children;
	
	for(var i = 0; i < x.length; i++){
		x[i].onclick = changeActive;
	}
	
	function changeActive() {
		document.getElementById("active-image")["src"] = this["src"];
	}
}

productImage();