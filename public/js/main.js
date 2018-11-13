


var j = 0;
function addButton() {
    var x = document.getElementById("osiguranje").value;
    if (x == 1)
    {
    	$( ".datum" ).append( '<div style="padding-top:10px;padding-right:5px;"><input type="button" id="dodaj" onclick="dodajOsiguranika()" value="Dodaj osiguranika" class="btn btn-outline-secondary btn-sm"><div>');
    	$( ".datum" ).append( '<div style="padding-top:10px;"><input type="button" id="izbrisi" onclick="izbrisiOsiguranika()" value="Izbrisi osiguranika" class="btn btn-outline-secondary btn-sm"><div>');

    }else
    {
    	$('#dodaj').remove();
    	$('#izbrisi').remove();
    	for (var i = 1; i <= j; i++) {
    		$('.num'+i).remove();
    	}
    	j=0;
    }
}

function dodajOsiguranika() {
	if(j<6)
	{
		j++;
		var $osiguranik = $('<div class="num'+j+'"><hr class="my-4"><p>Osiguranik'+j+'</p><div class="form-group"><label for="ime">Ime</label><input type="tekst" class="form-control" id="ime" name="osiguranik[osiguranik'+j+'][]" placeholder="Unesite ime" required="required"></div><div class="form-group"><label for="prezime">Prezime</label><input type="tekst" class="form-control" id="prezime" name="osiguranik[osiguranik'+j+'][]" placeholder="Unesite prezime" required="required"></div><div class="form-group"><label for="email">Email</label><input type="email" class="form-control" id="email" name="osiguranik[osiguranik'+j+'][]" placeholder="Unesite email" required="required"></div><div class="form-group"><label for="datum_rodjenja">Datum rodjenja</label><input type="date" class="form-control" id="datum_rodjenja" name="osiguranik[osiguranik'+j+'][]" placeholder="Datum rodjenja" required="required"></div></div>');
		
	    $("#for_apend").append($osiguranik);
	    
    }
}

function izbrisiOsiguranika() {
	if(j>0)
	{
		$('.num'+j).remove();
	    j--;
	}
    
}
$(document).ready(function()
{
	var datum1;
	var datum2;
	var oneDay = 24*60*60*1000;
 // document.getElementById("pocetak_putovanja").min= Date.now();
$("#kraj_putovanja").change(function(){
	datum1 = new Date (document.getElementById("pocetak_putovanja").value);
	console.log(datum1);
    datum2 =new Date( document.getElementById("kraj_putovanja").value);   
    //console.log(datum2);

	var diffDays = Math.round(Math.abs((datum1.getTime() - datum2.getTime())/(oneDay)));
	console.log(diffDays); 

document.getElementById("broj_dana").innerText = "Vase putovanje ce trajati "+ diffDays+ " dana."
   
});


$( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  var url =$( this ).attr('action');
 // console.log(url);
  var  data = $( this ).serialize();

  $.ajax({
           type: "POST",
           url: url,
           data: data, // serializes the form's elements.
           dataType : 'json',
           success: function(result)
           {
           		//console.log("response:", result);
              	alert("Uspesno ste poslali podatke. Polisa ce vam biti poslata na mail!"); // show response from the php script.
           },
           error: function(err)
           {
           		console.log(err);
           }
         });


});


 });








