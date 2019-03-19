

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

// Appelle des fonctions

buyButAnim();
displayComWrapper();

var form = document.getElementById('postComment');

form.addEventListener('submit',function(event){
	
	event.preventDefault();
	var form = this;
	
	var data = new FormData(form);
	var url = form.action;
	
	
	ajaxPost(url,data,function(json){
		
		var response = JSON.parse(json);
		
		if(response.success == true){
			
			var template = document.createElement('div');
			template.innerHTML = response.template;
			template = template.querySelector('.comment')
			document.querySelector('#comments').appendChild(template);
			form.reset();
			alert('Merci pour votre commentaire.')
			
		}
		else{
			alert(response.message);
		}
	} )
	
})




