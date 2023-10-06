<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{URL('css/profile.css')}}">
	<link rel="stylesheet" href="{{URL('css/style.css')}}">
	<title>Land Lab </title>
	<style>
		table{
			background-color:white;
		}
	</style>
</head>

<body onload="showSection(1)">
<script>
	// Trigger onchange event when the page is loaded
	window.addEventListener('DOMContentLoaded', function() {
		var selectElement = document.getElementById('typedem');
		selectElement.dispatchEvent(new Event('change'));
	});
	window.addEventListener('DOMContentLoaded', function() {
		var selectElement = document.getElementById('mySelect');
		selectElement.dispatchEvent(new Event('change'));
	});
</script>
<script src="{{URL('js/script.js')}}"></script>
<?php
switch (Auth::user()->id_role){
	case 2 : { 
	?>
	<script>
		function showSection(x){
			for (let i=0;i<3;i++){
				document.getElementById('section'+i).style.display = "none"
				document.getElementById('btnSection'+i).classList.remove('active')
			}
			document.getElementById('section'+x).style.display = ""
			document.getElementById('btnSection'+x).classList.add('active')
		}	
	</script>
	<?php 
	break ;
	}
	
	case 1:{
		?>
		<script>
		function showSection(x){
			for (let i=0;i<4;i++){
				document.getElementById('section'+i).style.display = "none"
				document.getElementById('btnSection'+i).classList.remove('active')
			}
			document.getElementById('section'+x).style.display = ""
			document.getElementById('btnSection'+x).classList.add('active')
		}	
	</script>
		<?php
		break;
	}
	
	default : {
		break;
	}

}
?>

<!-- If User Is A Admin  -->
@php 
switch (Auth::user()->id_role){
	case 2 : {
@endphp


<!-- If User Is A Normal User  -->
<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand bg-success text-decoration-none">
          			<span class="align-middle ">Land Lab</span>
        		</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item" id="btnSection0" onclick="showSection(0)">
						<a class="sidebar-link">
						<i class="align-middle" data-feather="user"></i> 
							<span class="align-middle">Profile</span>
            			</a>
					</li>
					<li class="sidebar-item" id="btnSection1" onclick="showSection(1)">
						<a class="sidebar-link">
							<i class="fa-sharp fa-solid fa-gears"></i> 
							<span class="align-middle">Operation</span>
            			</a>
					</li>
					<li class="sidebar-item" id="btnSection2" onclick="showSection(2)">
						<a class="sidebar-link">
							<i class="fa-sharp fa-solid fa-hammer"></i> 
							<span class="align-middle">Historique</span>
            			</a>
					</li>
				</ul>
				<div class="sidebar-cta w-100">
					<div class="sidebar-cta-content">
						<div class="d-grid">
							<a href="{{ url('/logoutPerform') }}" class="btn btn-primary">Déconnexion</a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
                
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="navbar-collapse collapse">
                    
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
                        {{ Auth::user()->name }}
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
			  <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
			  </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#" onclick="">
									<i class="align-middle me-1" data-feather="pie-chart"></i> Dashboard
								</a>
								<a class="dropdown-item" href="#" onclick="">
									<i class="align-middle me-1" data-feather="user"></i> Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" onclick="">
									<i class="align-middle me-1" data-feather="settings">
								</i> Demande</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ url('/logoutPerform') }}">Déconnexion</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<section class="content" id="section0">
                <h2>Votre profile</h2>
				<?php 
					$user = Auth::user();
				?>
				<form action={{'update/'.$user->id}} method="post">
					@csrf
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Nom</label>
								<input class="form-control" type="text" name="name" value={{$user->name}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Email</label>
								<input class="form-control" type="text" name="email" value={{$user->email}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Registre Sociale</label>
								<input class="form-control" type="text" name="rs" value={{$user->rs}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Registre Commerce</label>
								<input class="form-control" type="text" name="rc" value={{$user->rc}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">ICE</label>
								<input class="form-control" type="text" name="ice" value={{$user->ice}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Ville</label>
								<input class="form-control" type="text" name="ville" value={{$user->ville}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Forme Juridique</label>
								<input class="form-control" type="text" name="fj" value={{$user->fj}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Mot de passe</label>
								<input class="form-control" type="text" name="password">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 my-2">
							<button type="submit" class="btn btn-success">Modifier</button>
						</div>
					</div>
				</form>
			</section>

			<section class="content" id="section1" style="display:none;">
			@if(session('success'))
				<div class="alert alert-success .container my-4">
					{{ session('success') }}
				</div>
			@endif
                <form action="{{route('envoyer')}}" method="POST"> 
					@csrf
					<!---------------------------------------- Bloc 0  ------------------------------------------->
					<!-- General Info  -->
					<div class="info mb-4">
						<input type="text" name="id_user" value="{{ Auth::user()->id }}" style="display:none;">
						<h2>Informations generale</h2>
						<div class="row">
							<div class="col-md-6 my-2">
								<div class="d-flex flex-column">
									<label class="form-label fw-bold" for="">Lettre d'ouvrage' : </label>
									<input class="form-control" type="text" name="lo" id="lo" placeholder="Lettre d'Ouvrage">
								</div>
							</div>
							<div class="col-md-6 my-2">
								<div class="d-flex flex-column">
									<label class="form-label fw-bold" for="">Numéro du marché : </label>
									<input class="form-control" type="number" name="numMarche" id="numMarche" placeholder="Entrer le numero du marché">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 my-2">
								<div class="d-flex flex-column">
									<label class="form-label fw-bold" for="">Objet de marché : </label>
									<textarea class="form-control" name="nomMarche" placeholder="Objet de marché : " id="floatingTextarea2" style="height: 70px"></textarea>
								</div>
							</div>
						</div>
					</div>
					<!---------------------------------------- Bloc 1  ------------------------------------------->
                    <div class="row border-top border-3 border-secondary pt-4">
						<h2>Calcul I0 : </h2>
                        <div class="col-md-6 form-group">
                            <label for="formGroupExampleInput">Date d ouverture : </label>
                            <input type="date" name="dateOuverture" id="dateOuverture" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="formGroupExampleInput2">Index de base : </label>
                            <select class="form-select" id="indexBase" aria-label="Floating label select example" name="indexBase">
							<?php
								$bats = DB::table('bats')->get();
								$i = 0;
								
								while ($i < count($bats)) {
									echo '<option value="' . $bats[$i]->id . '">' . $bats[$i]->btp . '</option>';
									$b = $bats[$i]->btp;
									$i++;
									while ($i < count($bats) && $bats[$i]->btp == $b) {
										$i++;
									}
								}
								
							?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-5">
						<div class="col-1"></div>
                        <button class="col-5 btn btn-primary " onclick="afficheri0(event)">Afficher i0 </button>
                        <div class="col-6 fw-bold pt-2 text-center" id="i0" style="display:none;">i0</div>
                    </div>
                    <script>
                        function afficheri0(event){
                            var DO = document.getElementById('dateOuverture').value ;
							const indexBase = document.getElementById('indexBase');
							const selectedOption = indexBase.options[indexBase.selectedIndex];
							const ib = selectedOption.textContent;
                            event.preventDefault();
                            var dateParts = DO.split('-');
                            if (dateParts.length === 3) {
                                var month = dateParts[0];
                                var year = dateParts[1];
                                DO = year + '-' + month;
                            }
							var bats = <?php echo json_encode($bats); ?>;
							var index = 0;
							for (var i = 0; i < bats.length; i++) {
								var dateParts = bats[i]['DO'].split('-');
								if (dateParts.length === 3) {
									var month = dateParts[0];
									var year = dateParts[1];
									var newDO = year + '-' + month;
									if (newDO === DO && bats[i]['btp'] === ib) {
										document.getElementById('i0').innerHTML = '<span class="alert alert-success">' + bats[i]['i0'] + '</span>';
										index = 1;
									}
								}
							}
							if (index === 0) {
								document.getElementById('i0').innerHTML = '<span class="alert alert-danger">N existe Pas </span>';
							}
                            document.getElementById('i0').style.display = "";
						}
                    </script>
                   
					<!---------------------------------- Bloc 2  -------------------------------------------->
					<script>
						let tasks = [];
						let interruptions = [];
						function addTask() {
							let ds = document.getElementById('ds').value;
							let stopDate = document.getElementById("stopDate").value;
							let resumeDate = document.getElementById("resumeDate").value;
							function champsNonVides() {
								if (ds == '' || stopDate == '' || resumeDate == '') {
									if (ds == '') {
										document.getElementById('ds').style.border = '2px solid red';
									} else {
										document.getElementById('ds').style.border = ''; // Clear the border
									}
									if (stopDate == '') {
										document.getElementById('stopDate').style.border = '2px solid red';
									} else {
										document.getElementById('stopDate').style.border = ''; // Clear the border
									}
									if (resumeDate == '') {
										document.getElementById('resumeDate').style.border = '2px solid red';
									} else {
										document.getElementById('resumeDate').style.border = ''; // Clear the border
									}
									return false;
								}
								return true;
							}
							if (champsNonVides()) {
								if (interruptions.length == 0) {
									let inputDate = new Date(resumeDate);
									let otherInputDate = new Date(stopDate);
									let givenDate = new Date(ds);
									if (otherInputDate < givenDate) {
										alert("L'ordre d'arret doit etre supérieur au date de service : " + givenDate.toLocaleDateString());
										document.getElementById("stopDate").value = "";
									}
									else if (inputDate < otherInputDate) {
										alert("L'ordre de reprise doit etre supérieur au ordre de d'arret ! ");
										document.getElementById("resumeDate").value = "";
									}
									else {
										const taskList = document.getElementById("taskList");
										const taskText = stopDate.trim()+'/'+resumeDate.trim();
										if (taskText !== "") {
											interruptions.push([stopDate,resumeDate]);
											tasks.push(taskText);
											const taskId = tasks.length - 1;
											const li = document.createElement("li");
											li.className = "col-md-6 list-group-item";
											li.innerHTML = `
												<span>${taskText}</span>
												<span class="btn btn-danger btn-sm ms-2 float-end" onclick="deleteTask(${taskId})">Delete</span>
											`;
											taskList.appendChild(li);
											document.getElementById("stopDate").value = "";
											document.getElementById("resumeDate").value = "";
										}
										document.getElementById('listreferences').value = tasks.join(" | ");
									}
								} 
								else {
									let lastDatePair = interruptions[interruptions.length - 1];
									let endDateOfLastItem = lastDatePair[1];
									let inputDate = new Date(stopDate);
									let givenDate = new Date(endDateOfLastItem);
									if (inputDate < givenDate) {
										alert("L'ordre d'arret doit etre supérieur au dernière ordre de reprise : " + givenDate.toLocaleDateString());
										document.getElementById("stopDate").value = "";
										document.getElementById("resumeDate").value = "";
										document.getElementById('ds').style.border = '1px solid grey';
										document.getElementById('stopDate').style.border = '1px solid grey';
										document.getElementById('resumeDate').style.border = '1px solid grey';
									}
									else {
										const taskList = document.getElementById("taskList");
										const taskText = stopDate.trim()+'/'+resumeDate.trim();
										if (taskText !== "") {
											interruptions.push([stopDate,resumeDate]);
											tasks.push(taskText);
											const taskId = tasks.length - 1;
											const li = document.createElement("li");
											li.className = "col-md-6 list-group-item";
											li.innerHTML = `
												<span>${taskText}</span>
												<span class="btn btn-danger btn-sm ms-2 float-end" onclick="deleteTask(${taskId})">Delete</span>
											`;
											taskList.appendChild(li);
											document.getElementById("stopDate").value = "";
											document.getElementById("resumeDate").value = "";
											document.getElementById('ds').style.border = '1px solid grey';
											document.getElementById('stopDate').style.border = '1px solid grey';
											document.getElementById('resumeDate').style.border = '1px solid grey';
										}
										document.getElementById('listreferences').value = tasks.join(" | ");
									}
								}
							} 
							else {
								alert('Merci de remplir les champs !');
							}
						}
						function deleteTask(taskId) {
							tasks.splice(taskId, 1);
							interruptions.splice(taskId, 1);
							document.getElementById('listreferences').value = tasks.join(" | ");
							const taskList = document.getElementById("taskList");
							taskList.removeChild(taskList.childNodes[taskId]);
						}
					</script>
					<div class="col-md-12 mt-2 border-top border-secondary border-3 py-2">
					<div class="my-1">
						<label for="form-label my-4 fw-bold">Date de service : </label>
						<input type="date" class="form-control mt-3" id="ds" name="ds" placeholder="Montant decontant" >
						<input type="date" class="form-control mt-3" id="listeArrets" name="listeArrets" style="display:none;">
					</div>
						<h3>Veuillez Entrer lea arrets s'il y'a des arrtes : </h4>
						<div class="input-group mb-1">
							<div class="row">
								<div class="col-md-5">
									<span>Arret : </span>
									<input type="date" class="form-control" id="stopDate" placeholder="Arret ">
								</div>
								<div class="col-md-5">
									<span>Reprendre : </span>
									<input type="date" class="form-control" id="resumeDate" placeholder="Reprendre ">
								</div>
								<div class="col-md-2 mt-3 py-1">
									<span class="btn btn-primary" onclick="addTask()">+</span>
								</div>
							</div> 
						</div> 
						<ul class="list-group">
							<div id="taskList" class="row"></div>
						</ul>
						<input type="hidden" type="text" name="listreferences" id="listreferences">
					</div>

					<div class="my-1">
						<label for="form-label my-4 fw-bold">Date de décompte : </label>
						<input type="date" class="form-control mt-3" id="dd" placeholder="Montant decontant"name="dd" >
					</div>

					<script>
					</script>
					<button class="btn btn-success my-3" onclick="calculateOnDays(event)" id="calculateButton">NTJ</button>
					<div class="textcenter">
						<div class="alert alert-success" id="NTJ"></div>
						<input type="number" style="display:none;" name="inputNTJ" id="inputNTJ">
					</div>
					 <script>
						function calculateOnDays(event) {
							event.preventDefault();
							var ds = document.getElementById('ds').value;
							var dd = document.getElementById('dd').value;
							if (ds == '' || dd == '' ) {
								if (ds == '') {
									alert("Merci de saisir l'ordre de service !");
									document.getElementById('ds').style.border = '2px solid red';
								} 
								else {
									alert("Merci de saisir l'ordre de décompte !");
									document.getElementById('ds').style.border = ''; // Clear the border
								}
								if (dd == '') {
									document.getElementById('dd').style.border = '2px solid red';
								} else {
									document.getElementById('dd').style.border = ''; // Clear the border
								}
							}
							else if (interruptions.length == 0) {
								let inputDate = new Date(dd);
								let givenDate = new Date(ds);
								if (inputDate < givenDate) {
									alert("L'ordre de décompte doit etre supérieur au ordre de service : " + givenDate.toLocaleDateString());
									document.getElementById("dd").value = "";
								}
								else {
									const moroccanHolidays = [];
									function isMoroccanHoliday(dateStr) {
										return moroccanHolidays.includes(dateStr);
									}
									function getDaysWithoutSundaysAndHolidays(x, y) {
										var dsStr = x;
										var ddStr = y;
										var s = new Date(dsStr);
										var d = new Date(ddStr);
										var daysDifference = 0;
										while (s < d) {
											if (!isMoroccanHoliday(s.toLocaleDateString("en-GB"))) {
												daysDifference++;
											}
											s.setDate(s.getDate() + 1); // Move to the next day
										}
										return daysDifference;
									}
									let daysOf = 0;
									if (interruptions.length > 0) {
										for (const [interruptionStartStr, interruptionEndStr] of interruptions) {
											daysOf = daysOf + getDaysWithoutSundaysAndHolidays(interruptionStartStr, interruptionEndStr)+1;
										}
									}
									document.getElementById('NTJ').innerText = (getDaysWithoutSundaysAndHolidays(ds,dd) - daysOf) + 1 +' : nbr de jours';
									document.getElementById('inputNTJ').value = getDaysWithoutSundaysAndHolidays(ds, dd) - daysOf + 1;
								}
							}
							else {
								let inputDate = new Date(dd);
								let givenDate = new Date(ds);
								if (inputDate < givenDate) {
									alert("L'ordre de décompte doit etre supérieur au ordre de service : " + givenDate.toLocaleDateString());
									document.getElementById("dd").value = "";
								}
								else {
									const moroccanHolidays = [];
									function isMoroccanHoliday(dateStr) {
										return moroccanHolidays.includes(dateStr);
									}
									function getDaysWithoutAndHolidays(x, y){
										function diffDays(x, y) {
											var dsStr = x;
											var ddStr = y;
											var s = new Date(dsStr);
											var d = new Date(ddStr);
											var daysDifference = 0;
											while (s < d) {
												if (!isMoroccanHoliday(s.toLocaleDateString("en-GB"))) {
													daysDifference++;
												}
												s.setDate(s.getDate() + 1); // Move to the next day
											}
											return daysDifference;
										}
										let days = 0 ; 
										let firstDatePair = interruptions[0];
										let startDateOfFirstItem = firstDatePair[0];
										days += diffDays(x,startDateOfFirstItem);
										let lastDatePair = interruptions[interruptions.length-1];
										let endDateOfLastItem = lastDatePair[1];
										days += diffDays(endDateOfLastItem,y)+1;
										for (let i=0;i<interruptions.length-1;i++){
											let d1 = interruptions[i];
											let d2 = interruptions[i+1];
											days += diffDays(d1[1],d2[0])+1;
										}
										return days;
									}
									document.getElementById('NTJ').innerText = (getDaysWithoutAndHolidays(ds,dd)) + ' : nbr de jours';
									document.getElementById('inputNTJ').value = getDaysWithoutAndHolidays(ds, dd);
								}
							}
						}
					</script>

    

					<!---------------------------------- Bloc 3  --------------------------------------->
					<script>
					function calculer( event ) {
						event.preventDefault();
						// Récupérer la valeur du montant de décompte (MD) depuis l'input
						const mdInput = document.getElementById('md');
						const MD = parseFloat(mdInput.value);
						if(mdInput.value == ""){
							alert('Entrer Montant Decompte !!')
						}
						else {
							// Autres variables nécessaires
							const Nbrj = parseFloat(document.getElementById('NTJ').innerText); // Vous devrez définir la valeur correcte de Nbrj

							var DS = document.getElementById('ds').value ;
							const indexBase = document.getElementById('indexBase');
							const selectedOption = indexBase.options[indexBase.selectedIndex];
							const ib = selectedOption.textContent;
							event.preventDefault();
							var dateParts = DS.split('-'); // Split the string into an array
							if (dateParts.length === 3) {
								var month = dateParts[0];
								var year = dateParts[1];
								DS = year + '-' + month;
							}
							var bats = <?php echo json_encode($bats); ?>;
							var index = 0;
							for (var i = 0; i < bats.length; i++) {
								var dateParts = bats[i]['DO'].split('-');
								if (dateParts.length === 3) {
									var month = dateParts[0];
									var year = dateParts[1];
									var newDO = year + '-' + month;
									if (newDO === DS && bats[i]['btp'] === ib) {
										BAT = bats[i]['i0'];
										index = 1;
									}
								}
							}
							if (index === 0) {
								alert('Cet index de base n existe pas!');
							}
							document.getElementById('i0').style.display = "";
							const I0 = parseFloat(document.getElementById('i0').innerText); // Vous devrez définir la valeur correcte de I0
							// Calculs selon les formules données
							const P0 = MD / Nbrj;
							const I = BAT / I0;
							const P_P0 = Math.pow(0.15 + 0.85 * I, -1);
							const MR = P0 * P_P0;
							const MTRP = MR;
							const M_TVA = MTRP * 1.2;
							const MTRP_TTC = MTRP + M_TVA;
							// Mettre à jour les valeurs affichées dans le HTML
							document.getElementById('mr').value =  MR.toFixed(2);
							document.getElementById('mtva').value = M_TVA.toFixed(2);
							document.getElementById('mtrp-ttc').value = MTRP_TTC.toFixed(2);
						}
					}

					</script>
					<div class="border-top border-secondary border-3 my-4 py-3">
						<div >
							<label for="form-label my-4 fw-bold">Montant Décontant : </label>
							<input type="text" class="form-control mt-3" id="md" name="md" placeholder="Montant decontant" >
						</div>
						<button class="btn btn-success my-3" onclick="calculer(event)">Calculer</button>
						<div class="row mt-3">
							<table >
								<tr>
									<td>MR :</td>
									<td><input id="mr" name="mr"></td>
									<td>M.TVA :</td>
									<td><input id="mtva" name="mtva"  ></td>
								</tr>
								<tr>
									<td>MTRP.TTC :</td>
									<td><input id="mtrp-ttc" name="mtrp-ttc" ></td>
								</tr>
							</table>
						</div>
					</div>
					<!---------------------------------------- Envoyer ------------------------------------>
					<div class="row">
						<input type="text" id="trs" name="trs" style="display:none;">
						<input type="text" id="mds" name="mds" style="display:none;">
						<div class="col-3"></div>
						<button type="submit" class="col-6 btn btn-success w-80 fw-bold">Imprimer</button>
						<div class="col-3"></div>
					</div>


                            
                        
                </form>
	        </section>

			
			<section class="content" id="section2" style="display:none;">
             	<h2>Historique des operations</h2>
				<table class="table shadow">
					<thead>
						<tr>
							<th scope="col">Objet du marché</th>
							<th scope="col">Mettre d ouvrage</th>
							<th scope="col">Numéro du marche</th>
							<th scope="col">Supprimer</th>
							<th scope="col">Imprimer</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $items)
							<tr>
								<td>{{$items->nomMarche}}</td>
								<td>{{$items->numMarche}}</td>
								<td>{{$items->lo}}</td>
								<td>
									<a href={{"delete/".$items->id}}>
									<i class="fa-solid fa-trash"></i>
									</a>
								</td>
								<td>
									<a href={{"imprimer/".$items->id}}>
										<i class="fa-solid fa-print"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</section>

























@php		
	break ;
	}
	case  1 : {
		@endphp
		
<!-- If User Is A Normal User  -->
<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand bg-success text-decoration-none">
          			<span class="align-middle ">Land Lab</span>
        		</a>
				<ul class="sidebar-nav">
					
					<li class="sidebar-item" id="btnSection0" onclick="showSection(0)">
						<a class="sidebar-link">
						<!-- data-bs-toggle="modal" data-bs-target="#ex1" -->
						<i class="align-middle" data-feather="user"></i> 
							<span class="align-middle">Profile</span>
            			</a>
					</li>
					<li class="sidebar-item" id="btnSection1" onclick="showSection(1)">
						<a class="sidebar-link">
							<i class="fa-sharp fa-solid fa-gears"></i> 
							<span class="align-middle">Users</span>
            			</a>
					</li>
					<li class="sidebar-item" id="btnSection2" onclick="showSection(2)">
						<a class="sidebar-link">
							<i class="fa-sharp fa-solid fa-hammer"></i> 
							<span class="align-middle">Table Bats</span>
            			</a>
					</li>
					<li class="sidebar-item" id="btnSection3" onclick="showSection(3)">
						<a class="sidebar-link">
							<i class="fa-sharp fa-solid fa-hammer"></i> 
							<span class="align-middle">Jours Ferriers</span>
            			</a>
					</li>
				</ul>
				<div class="sidebar-cta w-100">
					<div class="sidebar-cta-content">
						<div class="d-grid">
							<a href="{{ url('/logoutPerform') }}" class="btn btn-primary">Déconnexion</a>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
                
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="navbar-collapse collapse">
                    
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
                        {{ Auth::user()->name }}
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>
			  <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
			  </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#" onclick="">
									<i class="align-middle me-1" data-feather="pie-chart"></i> Dashboard
								</a>
								<a class="dropdown-item" href="#" onclick="">
									<i class="align-middle me-1" data-feather="user"></i> Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" onclick="">
									<i class="align-middle me-1" data-feather="settings">
								</i> Demande</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ url('/logoutPerform') }}">Déconnexion</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<section class="content" id="section0">
                <h2>Votre profile</h2>
				<?php 
					$user = Auth::user();
				?>
				<form action={{'update/'.$user->id}} method="post">
					@csrf
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Nom</label>
								<input class="form-control" type="text" name="name" value={{$user->name}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Email</label>
								<input class="form-control" type="text" name="email" value={{$user->email}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Registre Sociale</label>
								<input class="form-control" type="text" name="rs" value={{$user->rs}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Registre Commerce</label>
								<input class="form-control" type="text" name="rc" value={{$user->rc}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">ICE</label>
								<input class="form-control" type="text" name="ice" value={{$user->ice}}>
							</div>
						</div>
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Ville</label>
								<input class="form-control" type="text" name="ville" value={{$user->ville}}>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Forme Juridique</label>
								<input class="form-control" type="text" name="fj" value={{$user->fj}}>
							</div>
						</div>
					</div>
					<h3>Modifier votre mots de passe</h3>
					<div class="row">
						<div class="col-md-6 my-2">
							<div class="d-flex flex-column">
								<label class="form-label fw-bold">Mot de passe</label>
								<input class="form-control" type="text" name="password">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 my-2">
							<button type="submit" class="btn btn-success">Modifier</button>
						</div>
					</div>
				</form>
			</section>

			<section class="content" id="section1" style="display:none;">
				<div class="container">
					@if(session('success'))
						<div class="alert alert-success .container my-4">
							{{ session('success') }}
						</div>
					@endif
					<h2>Les Utilisateurs : </h1>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Non</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<style>
								.isHvered{
									cursor:pointer ;
								}
							</style>
							<?php
							// Récupérez tous les utilisateurs
							$users = \App\Models\User::all();
							?>
							@foreach ($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>
									<?php
										if ($user->id_role == 1 || $user->id_role == 2){
									?>
											<i class="isHvered fa-solid fa-eye mx-1 fs-3 fw-bold text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Details" onclick="window.location='{{ route("userProfile", ["id" => $user->id]) }}'"></i>
											<i class="isHvered fa-solid fa-trash mx-1 fs-3 fw-bold text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer cet utilisateur" onclick="window.location='{{ route("supprimer", ["id" => $user->id]) }}'"></i>
											<i class="isHvered fa-solid fa-ban mx-1 fs-3 fw-bold text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Suspendre cet utilisateur" onclick="window.location='{{ route("suspendre", ["id" => $user->id]) }}'"></i>
									<?php
										}
										else if ($user->id_role == 3){
									?>
										<button onclick="window.location.href = '{{ route('activer', ['id' => $user->id]) }}';" class="btn btn-primary position-relative">
											Activer
											<span class="position-absolute top-0 start-100 translate-middle p-2 bg-secondary border border-light rounded-circle">
												<span class="visually-hidden">New alerts</span>
											</span>
										</button>
									<?php
										}
										else {
									?>
											<button onclick="window.location.href = '{{ route('activer', ['id' => $user->id]) }}';" class="btn btn-primary position-relative">
												Activer
												<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
													<span class="visually-hidden">New alerts</span>
												</span>
											</button>
									<?php
										}
									?>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
	        </section>

			
			<section class="content" id="section2" style="display:none;">
				<div class="row">
					<h2>Instructions : </h2>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae pariatur repellendus magni ipsa, voluptatum ea dicta minima. Quia quaerat vitae inventore in eius unde sit aut, ut perferendis rem. Quod?</p>
				</div>
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif
				@if(session('fail'))
					<div class="alert alert-success">
						{{ session('fail') }}
					</div>
				@endif
				<form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group my-2">
						<label for="excel_file">Importer Le fichier :</label>
						<input type="file" name="excel_file" class="form-control my-2">
					</div>
					<button type="submit" class="btn btn-primary my-2">Importer</button>
				</form>
			</section>
			<section class="content" id="section3" style="display:none;">
			<div class="row my-2">
				<div class="col-11"><h3>Les jours ferriers</h3></div>
				<div class="col-1"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				+
				</button></div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ajouter Jours Ferrier</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<form method="POST" action="{{ route('addJours')}}">
						@csrf
						<label class="form-label my-2" for="name">Evénement :</label>
						<input class="form-control" type="text" id="label" name="label" required>
						<label class="form-label my-2" for="name">Jour :</label>
						<input class="form-control" type="date" id="jour" name="jour" required>
						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						<button type="submit" class="btn btn-primary">Ajouter</button>
					</div>
					</form>
					</div>
					</div>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Jour</th>
					<th scope="col">date</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					// Récupérez tous les utilisateurs
					$jours = \App\Models\jours_ferrie::all();
					?>
					@foreach($jours as $jour)
						<tr>
							<th scope="row">{{$jour->id}}</th>
							<td>{{$jour->label}}</td>
							<td >{{$jour->jour}}</td>
							<td><a href="{{ route('deleteJour', ['id' => $jour->id]) }}" class="text-danger float-start fw-bold">Supprimer</a></td>
						</tr>
					@endforeach
				</tbody>
				</table>
			</section>
@php
		break;
	}
	default : 
		echo 'hello' ;
		break;
}
@endphp












			












			  <!-- Bootstrap core JS-->
			  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
				<!-- Core theme JS-->
				<script src="js/scripts.js"></script>
				<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
				<!-- * *                               SB Forms JS                               * *-->
				<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
				<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
				<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
			
			

					




			
			
			
			
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>