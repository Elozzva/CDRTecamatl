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
                   @if ($Armadora->id == $id)
                        <option selected value="{{ $Armadora->id }}"><a href="/searchByShipowner/{{ $Armadora->id }}"> {{ $Armadora->name }} </a></option>
                   @else
                        <option value="{{ $Armadora->id }}">{{ $Armadora->name }}</option>
                   @endif

                @empty
                    <option value="">No hay registros</option>
                @endforelse

            </select>
          </div>
          <div class="input-field fouth-wrap">
            <div class="icon-wrap">
            </div>
            <select id="Car" onchange="searchYear()" data-trigger="" name="choices-single-defaul">
                dd();
                @forelse ($Carros as $Carro)
                @if ($Carro['id'] == $id)
                     <option selected value="{{ $Carro['name'] }}">{{ $Carro['name'] }}<a href="/searchByYears/{{ $Carro['name'] }}"> {{ $Carro['name'] }} </a></option>
                @else
                     <option value="{{ $Carro['name'] }}">{{ $Carro['name'] }}</option>
                @endif

             @empty
                 <option value="">No hay registros</option>
             @endforelse



            </select>
          </div>

          <div class="input-field first-wrap">
{{--             <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
              </svg>
            </div> --}}
            <input id="search" type="text" placeholder="¿Cual es tu auto?" />
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="button">SEARCH</button>
          </div>
        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",{});

      function goSearch() {
            var x = document.getElementById('Shipowner').value;
            //alert(x);
            window.open("/searchByShipowner/" + x, "_self");
        }

        function searchYear() {
            var x = document.getElementById('Car').value;
            //alert(x);
            window.open("/searchByYears/" + x, "_self");
        }
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
