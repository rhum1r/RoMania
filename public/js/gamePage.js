

function buyButAnim() {

	var wrapper = document.getElementById("butWrapper");
	wrapper.style.position = "relative";
	var leftPos = 0;

	wrapper.addEventListener("mouseover", function (e) {
		var but1 = document.getElementById("buyBut");
		var but2 = document.getElementById("buyButArrow");
		
		but1.style.backgroundColor = "#ffa700";
		but2.style.backgroundColor = "#ffa700";

		document.getElementById("butWrapper").addEventListener("mouseout", function (e) {
			
			but1.style.backgroundColor = "#FF5400";
			but2.style.backgroundColor = "#FF5400";
		});	
	});
}


function displayComWrapper() {
	
	var tabs = document.getElementById("tabMenu").childNodes;
	var infos = tabs[1];
	var conf = tabs[3];
	var com = tabs[5];
	
	var middleContent = document.getElementById("middleContent").childNodes;
	var infosContent = middleContent[3];
	var confContent = middleContent[5];
	var comContent = middleContent[7];
	
	infos.addEventListener("click", function (e) {
	
		infos.id = "selectedTab";
		conf.id = "";
		com.id = "";
		
		infosContent.style.display = "block";
		confContent.style.display = "none";
		comContent.style.display = "none";
		e.preventDefault();
		
	});
	
	conf.addEventListener("click", function (e) {
		
		infos.id = "";
		conf.id = "selectedTab";
		com.id = "";
		
		infosContent.style.display = "none";
		confContent.style.display = "block";
		comContent.style.display = "none";
		e.preventDefault();
		
	});
	
	com.addEventListener("click", function (e) {
		
		infos.id = "";
		conf.id = "";
		com.id = "selectedTab";
		
		infosContent.style.display = "none";
		confContent.style.display = "none";
		comContent.style.display = "block";
		e.preventDefault();
		
	});
}



function displayStars() {
	var div = document.getElementById('marks')
	
	for (i=0; i<5; i++) {
		var inputDiv = document.createElement("div");
		var input = document.createElement("input");
		input.type = "radio";
		input.className = "radioBut";
		input.name = "mark";
		input.id = i + 1 + " stars";
		input.value = i + 1;
		
		var label = document.createElement("label");
		label.setAttribute("for", i + 1 + " stars");
		
			for (y=0; y<=i; y++) {
				
				var img = document.createElement("img");
				img.src ="../images/CommentNotes/staroff.gif";
				img.className = i + 1 + " stars";
				label.appendChild(img)			
			}
			
		inputDiv.appendChild(input)
		inputDiv.appendChild(label)
		
		div.appendChild(inputDiv)
	}
}

function starsAnim() {
	
	// On récupère les inputs de type radio qui ont pour nom "mark"
	var radio = $( "input[name='mark']" );
	
	for(i=0; i<5; i++){
		// Pr chacun des input on surveille un changement d'état
		radio[i].addEventListener("change", function (e) {
			var target = e.target;
			
			// On récupère le form
			var form = document.getElementById("marks");
			// On répertori l'ensemble des images contenues dans le form
			var img = form.getElementsByTagName("img");
			
			// Autant de fois qu'il n'y a d'images
			for(y=0; y<img.length; y++) {
				// Si l'id de l'élément ciblé est égal à la classe de l'image alors on applique l'img correspondante
				// à "ON"
				if (target.id == img[y].className) {
					img[y].src = "../images/CommentNotes/staron.gif";
				}
				// Sinon l'élément doit être "OFF"
				else {
					img[y].src = "../images/CommentNotes/staroff.gif";
				}
			}
		});
	}
}

function stars () {
	displayStars()
	starsAnim()
}


// Appelle des fonctions

buyButAnim();
displayComWrapper();
stars();


