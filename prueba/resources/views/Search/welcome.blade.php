<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="../css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="s002">
      <form>
        <fieldset>
          <legend>CATALOGO</legend>
        </fieldset>
        <div class="inner-form">

          <div class="input-field fouth-wrap">
            <select id="Shipowner" onchange="goSearch()" data-trigger="" name="choices-single-defaul">
                @forelse ($Armadoras as $Armadora)
                    <option value="{{ $Armadora->id }}"><a href="/searchByShipowner/{{ $Armadora->id }}"> {{ $Armadora->name }} </a></option>
                @empty
                    <option value="">No hay registros</option>
                @endforelse

            </select>
          </div>
          <div class="input-field first-wrap">
            <input id="texto" type="text" placeholder="¿Cual es tu auto?" />
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="button">BUSCAR</button>
          </div>
          <div id = "resultados"></div>

        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script>
        flatpickr(".datepicker",{});
        function goSearch() {
            var x = document.getElementById('Shipowner').value;
            window.open("/searchByShipowner/" + x, "_self");
        }
        ///Keyup
        window.addEventListener("load", function(){
            document.getElementById("texto").addEventListener("keyup", function(){
                fetch(`/searchBySearch?texto=${document.getElementById("texto").value}`,{
                    method:'get'
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById("resultados").innerHTML = html
                })
            })
        })
    </script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
