function makeTextNode(text) {
	return document.createTextNode(text);
}


function makeLabel(label, id) {
	var newLabel = document.createElement("label");
	if (id !== undefined && id != "") {
		newLabel.setAttribute("for", id);
	}
	newLabel.appendChild(makeTextNode(label));
	return newLabel;
}

function makeInput(type, id, value, label)
{
	var newElement = document.createElement("input");
	newElement.setAttribute("type", type);
	if (id !== undefined && id != "")
	{
		newElement.setAttribute("id", id);
	}
	if (value !== undefined && value != "")
	{
		newElement.setAttribute("value", value);
	}
	if (label !== undefined && label != "")
	{
		var newLabel = makeLabel(label, id);
		var newDiv = document.createElement("div");
		newDiv.appendChild(newLabel);
		newDiv.appendChild(newElement);
		return newDiv;
	}
	else
	{
		return newElement;
	}
}

function makeSelect(id, values, label)
{
	var newSelect = document.createElement("select");
	var newDiv = document.createElement("div");
	if (id !== undefined && id != "")	
	{
		newSelect.setAttribute("id", id);
		newSelect.setAttribute("name", id);
	}
	for(var i = 0; i < values.length; i++)
	{
		var newOption = document.createElement("option");
		newOption.setAttribute("value", values[i]);
		newOption.appendChild(makeTextNode(values[i]));
		newSelect.appendChild(newOption);
	}
	if (label !== undefined && label != "")
	{
		var newLabel = makeLabel(label, id);
		var newDiv = document.createElement("div");
		newDiv.appendChild(newLabel);
		newDiv.appendChild(newSelect);
		return newDiv;
	}
	else
	{
			return newSelect;
	}
}

function makeArray(start, end)
{
	var myArray = [];
	//var x;
	for (var x = start; x <= end; x++)
	{
		var myString = x.toString();
		myArray.push(myString);
	}
	return myArray;
}

function checkInputs(event)
{
	var inputsArray = document.querySelectorAll("div input");
	for (var i = 0; i < inputsArray.length; i++)
	{
		if (inputsArray[i].value == "")
		{			
			inputsArray[i].parentNode.setAttribute("class", "error");
			event.preventDefault();
		}
		else
		{
				inputsArray[i].parentNode.setAttribute("class", "");
		}
	}
}