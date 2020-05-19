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

function makeInput(id, type, value, label, required)
{
	var newElement = document.createElement("input");
	newElement.setAttribute("type", type);
	if (id !== undefined && id != "")
	{
		newElement.setAttribute("id", id);
        newElement.setAttribute("name", id)
	}
	if (value !== undefined && value != "")
	{
		newElement.setAttribute("value", value);
	}
    if (required == true)
    {
        newElement.setAttribute("class", "required");        
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

function makeSelect(id, values, label, required)
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
    if (required == true)
    {
        newSelect.setAttribute("class", "required");
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

function makeRadio(name, values, label, require)
{
    var newDiv = document.createElement("div");
    var newLabel = makeLabel(label, name);
    newDiv.appendChild(newLabel);
    var newSpan = document.createElement("span");
    newSpan.setAttribute("id", name);
	for (var i = 0; i < values.length; i++)
    {
        var newRadio = document.createElement("input");
        newRadio.setAttribute("type", "radio");
        newRadio.setAttribute("value", values[i]);
        newRadio.setAttribute("id", values[i]);
        newRadio.setAttribute("name", name);
        var newLabel = makeLabel(values[i], values[i]);
        newSpan.appendChild(newRadio);
        newSpan.appendChild(newLabel);
        newSpan.appendChild(document.createElement("br"));
        
    }
    if (require == true)
    {
        newSpan.setAttribute("class", "required");        
    }
    newDiv.appendChild(newSpan);
    return newDiv;
}

function makeCheckbox(name, values, label, require)
{
    var newDiv = document.createElement("div");
    var newLabel = makeLabel(label, name);
    newDiv.appendChild(newLabel);
    var newSpan = document.createElement("span");
    newSpan.setAttribute("id", name);
	for (var i = 0; i < values.length; i++)
    {
        var newCheck = document.createElement("input");
        newCheck.setAttribute("type", "checkbox");
        newCheck.setAttribute("value", values[i]);
        newCheck.setAttribute("id", values[i]);
        newCheck.setAttribute("name", name);
        var newLabel = makeLabel(values[i], values[i]);
        newSpan.appendChild(newCheck);
        newSpan.appendChild(newLabel);
        newSpan.appendChild(document.createElement("br"));
        
    }
    if (require == true)
    {
        newSpan.setAttribute("class", "required");        
    }
    newDiv.appendChild(newSpan);
    return newDiv;
}

function makeButton(id, type, value, label)
{
    var newButton = document.createElement("input");
    newButton.setAttribute("id", id);
    newButton.setAttribute("type", type);
    newButton.setAttribute("value", value);
    return newButton;
}

function checkForm(event)
{
	var inputsArray = document.querySelectorAll("input.required, select.required");
	for (var i = 0; i < inputsArray.length; i++)
	{
		if (inputsArray[i].value == "" || inputsArray[i].value == "Hate" || inputsArray[i].value == "hate")
		{			
			inputsArray[i].parentNode.style.color = "red";
            inputsArray[i].parentNode.style.border = "1px solid red";
			event.preventDefault();
		}
		else
		{
				inputsArray[i].parentNode.style.color = "black";
                inputsArray[i].parentNode.style.border = "1px solid black";
		}
	}
    var selectArray = document.querySelectorAll("span.required");
    for (var i = 0; i < selectArray.length; i++)
    {
        var inputsArray = selectArray[i].querySelectorAll("input");
        var isChecked = false;
        for(var j = 0; j < inputsArray.length; j++)
        {
            if (inputsArray[j].checked)
            {
                selectArray[i].parentNode.style.color = "black";
                selectArray[i].parentNode.style.border = "1px solid black";
                isChecked = true;
                break;
            }
        }
        if (!isChecked)
        {
            selectArray[i].parentNode.style.color = "red";
            selectArray[i].parentNode.style.border = "1px solid red";
            event.preventDefault();         
        }
    }
}