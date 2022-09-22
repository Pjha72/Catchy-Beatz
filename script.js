const body = document.querySelector("body"),
	sidebar = body.querySelector(".sidebar"),
	toggle = body.querySelector(".toggle"),
	searchBtn = body.querySelector(".search-box"),
	modeSwitch = body.querySelector(".toggle-switch"),
	modeText = body.querySelector(".mode-text");


toggle.addEventListener("click", () => {
	sidebar.classList.toggle("close");

});
searchBtn.addEventListener("click", () => {
	sidebar.classList.remove("close");

});
modeSwitch.addEventListener("click", () => {
	body.classList.toggle("dark");

	if (body.classList.contains("dark")) {
		modeText.innerText = "Light Mode"
	} else {
		modeText.innerText = "dark Mode"
	}

});


// Search button from here

function myFunction() {
    var input, filter, icons, figure, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    icons = document.getElementById("myICONS");
    figure = myICONS.getElementsByClassName("card");

    for (i = 0; i < figure.length; i++) {
        a = figure[i].getElementsByClassName("card_title")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            figure[i].style.display = "";
        } else {
            figure[i].style.display = "none";
        }
    }
}

