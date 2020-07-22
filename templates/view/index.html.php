<div class="container mt-5">
  <h1 class="text-center h1">Petite surprise moussaillons... </h1>
  <figure class="figure w-100 text-center">
    <img src="libraries\Public\images\pirate.png" class="figure-img img-fluid z-depth-1 w-25" alt="pirate">
  </figure>
  <p class="text-center">Nous allons faire quelques petits détours pour consolider nos ressources humaines et materielles afin de mener a bien notre coup d'état ! Pour se faire nous allons recruter de la main d'oeuvre ! Vous etes interessé ? indiquez moi votre nom et le grade souhaité ! vous avez le choix entre :</p>
  <ul class=" text-center list-unstyled d-flex justify-content-around">
    <li class="font-weight-bold">Canonier</li>
    <li class="font-weight-bold">Tortionaire</li>
    <li class="font-weight-bold">Infanterie</li>
  </ul>
  <div class="row mb-5">
    <div class="col-12 col-xl-6">
      <form class="text-center border border-light p-5 m-auto" action="index.php?controller=recrue&task=insertNewRecuit" method="post">
        <p class="h4 mb-4">Se faire enroller</p>
        <input type="text" id="name" class="form-control mb-4" placeholder="Votre nom" name="nom">
        <input type="text" id="grave" class="form-control mb-4" placeholder="Grade désiré" name="grade">
        <button class="btn btn-info btn-block" type="submit">Rejoindre l'équipage</button>
      </form>
    </div>
    <div class="col-12 col-xl-6 text-center border border-light p-5">
      <p class="h4"> Conditions climatiques actuelles :</p>
      <p>Metéo : <span id="weather"></span></p>
      <p>Temperature actuelle : <span id="temperature"></span></p>
      <p>Vitesse du vent : <span id="windspeed"></span></p>
      <p>Humidité : <span id="humidity"></span></p>
    </div>
  </div>
  <h2 class="text-center font-bold mb-5 h2">Liste des potentielles Recrues :</h2>
  <div class="row">
    <?php foreach ($recrues as $recrue) : ?>
      <div class=' col-xl-4 col-12 text-center'>
        <div class="card">
          <img class="card-img-top p-2 m-auto w-50" src="libraries\Public\images\pirate.png" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><a>Nom de la recrue: </a></h4>
            <p class="card-text"><?= $recrue['nom'] ?>.</p>
            <h4 class="card-title"><a>Grade voulu par la recrue </a></h4>
            <p class="card-text"><?= $recrue['grade'] ?>.</p>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>


  <script>
    function weatherData() {
      fetch(`http://api.weatherapi.com/v1/current.json?key=864c19fc12ed4afa838120142202207&q=paris`)
      fetch("http://api.weatherapi.com/v1/current.json?key=864c19fc12ed4afa838120142202207&q=paris")
        .then(response => response.json())
        .then(response => {
          JSON.stringify(response),
            document.getElementById("weather").innerHTML = `<p class="d-inline"><img id="icon" src="${response.current.condition.icon}" alt="weather icon"></p> `
          document.getElementById("temperature").textContent = `${response.current.temp_c} °C`
          document.getElementById("windspeed").textContent = `${response.current.wind_kph} km/h`
          document.getElementById("humidity").textContent = `${response.current.humidity} g/m3`
        })
        .catch(error => alert("Erreur : " + error))
    }
    weatherData()
  </script>

  ;