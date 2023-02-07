window.onload = function(){

var modal = document.getElementById("locselect-Modal");
var btn = document.getElementById("locselect-Btn");
var span = document.getElementsByClassName("locselect-close")[0];
var locitems = document.getElementsByClassName("locselect-item");

var isSetloc = BX.getCookie(
	"user_location"
   );

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

for (var j = 0; j < locitems.length; j++)
{
	BX.bind(locitems[j], 'click', function(e){
		BX.setCookie(
			"user_location",
			e.target.dataset.loc,
			[]
		   );
	btn.lastElementChild.innerText = e.target.innerText;
	modal.style.display = "none";
	});
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

if (isSetloc === undefined){
	btn.click()
}

}