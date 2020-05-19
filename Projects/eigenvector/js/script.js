var btns = document.querySelectorAll(".btn-delete");
for (var i = 0; i < btns.length; i++)
{
	btns[i].addEventListener("click",ajaxDelete);
}

function ajaxDelete() 
{
	var id = this.id;
	//alert(id);
	id = id.substring(1);
	//alert(id);
	var request = new XMLHttpRequest();
	request.addEventListener("load", removeQuestion);
	request.open("POST", "delete_trivia.php", true);
	request.setRequestHeader("Content-Type", "application/json");
	request.send(id);
}

function removeQuestion() 
{
	var id = this.response;
	//alert(id);
	var btn = document.querySelector("#"+id);
	var card = btn.parentNode.parentNode;
	card.parentNode.removeChild(card);
}