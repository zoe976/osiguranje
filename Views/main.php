<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/css/app.css">
	<script src="/public/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="/public/js/bootstrap.min.js" type="text/javascript"></script> 
	<script src="/public/js/main.js" type="text/javascript"></script> 
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
	    		<a class="nav-link" href="/">Forma</a>
	    	</li>
	     	<li class="nav-item">
	        	<a class="nav-link" href="/tabela">Tabela</a>
	      	</li>
		</ul>
	</div>
	  <!-- Navbar content -->
	</nav>
	<div class="container">
		<div class="jumbotron" style="width: 70%; margin:0 auto; margin-top: 10px;">
			<h1 class="display-6">Putno osiguranje</h1>
			<hr class="my-4">
		  <form action="dodaj_polisu" method="POST">
		  	   <div class="form-group">
			    <label for="ime">Ime</label>
			    <input type="tekst" class="form-control" id="ime_nosilac" name="ime_nosilac" placeholder="Unesite ime" required="required">
			  </div>
			  <div class="form-group">
			    <label for="ime">Prezime</label>
			    <input type="tekst" class="form-control" id="prezime_nosilac" name="prezime_nosilac" placeholder="Unesite prezime" required="required">
			  </div>
			  <div class="form-group">
			  	<label for="datum_rodjenja">Datum rodjenja</label>
			  	<input type="date" class="form-control" id="datum_rodjenja_nosilac" name="datum_rodjenja_nosilac" placeholder="Datum rodjenja" required="required">
			  </div>
			  <div class="form-group">
			    <label for="osiguranje">Vrsta osiguranja</label>
			    <select class="form-control" id="osiguranje" name="osiguranje" onchange="addButton()" required="required">
				  <option></option>
				  <option value="0">Pojedinacno</option>
				  <option value="1">Grupno</option>
				</select>
			  </div>
			  <div class="form-group">
			    <label for="ime">Telefon</label>
			    <input type="tekst" class="form-control" id="telefon_nosilac" name="telefon_nosilac" placeholder="Unesite telefon" required="required">
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email_nosilac" name="email_nosilac" placeholder="Unesite email" required="required">
			  </div>
			  <label>Izaberite datum putovanja: </label>
			  <div class="form-group row datum">
			    <div class="col-md-6">
			    	<label for="pocetak_putovanja">Od:</label>
			    	<input type="date" class="form-control" id="pocetak_putovanja" name="pocetak_putovanja" min=<?php echo date('Y-m-d') ?> required="required" value=<?php echo date('Y-m-d') ?> >			    	
			    </div>
			    <div class="col-md-6 ">
			    	<label for="kraj_putovanja">Do:</label>
			    	<input type="date" class="form-control" id="kraj_putovanja" name="kraj_putovanja"  min=<?php echo date('Y-m-d') ?> required="required">
			    </div>
			    <span id="broj_dana"></span>
			  </div>
			  <div id="for_apend"></div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>		
	</div>

</body>
</html>