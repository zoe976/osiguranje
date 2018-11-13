
<!DOCTYPE html>
<html>
<head>
	<title>Tabela</title>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/css/app.css">
	<script src="/public/js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="/public/js/bootstrap.min.js" type="text/javascript"></script> 
	<script src="/public/js/tabela.js" type="text/javascript"></script> 
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
	<div class="row">
		<h1>Tabela</h1>
	</div>
	<div class="row">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Vrsta polise</th>
      <th scope="col">Pocetak putovanja</th>
      <th scope="col">Kraj putovanja</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">Telefon</th>
      <th scope="col">E-mail</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($podaci as $key=>$value): ?>
    <tr>
        <td><?php echo $value['id']; ?></td>
        <td><?php echo $value['vrsta'] == 1 ? 'Grupna': 'Pojedinacna' ; ?></td>
        <td><?php echo $value['pocetak_putovanja']; ?></td>
        <td><?php echo $value['kraj_putovanja']; ?></td>
        <td><?php echo $value['ime']; ?></td>
        <td><?php echo $value['prezime']; ?></td>
        <td><?php echo $value['telefon']; ?></td>
        <td><?php echo $value['email']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
	</div>
</div>


</body>
</html>