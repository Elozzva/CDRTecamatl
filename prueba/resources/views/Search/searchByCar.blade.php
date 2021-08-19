<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Productos</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="/">INICIO</a></li>
            /*<li><a href="/searchByYears">ATRAS</a>*/
            </li>
        </ul>
    </nav>
    <div class="container mydiv">
        <h1>{{ $Carro->shipowner->name }} - {{ $Carro->name }}  <small> {{ $Carro->model }}</small></h1>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Equivalencia</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($Productos as $Producto )
                    <tr>
                        <th scope="row">{{ $Producto->key_prod }}</th>
                        <td>{{ $Producto->mark->name }}</td>
                        <td>{{ $Producto->name }}</td>
                        <td>{{ $Producto->description }}</td>
                        <td>{{ $Producto->equivalence }}</td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No hay coincidencias
                            </td>
                        </tr>
                    @endforelse

                </tbody>
              </table>
        </div>

 {{--         <div class="row">
            <div class="col-md-4">
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>4</span></div>
                    <div class="bbb_deals_title">Today's Combo Offer</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img src="https://i.imgur.com/9UYzfny.png" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#">Laptops</a></div>
                                    <div class="bbb_deals_item_price_a ml-auto"><strike>₹30,000</strike></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name">HP Notebook</div>
                                    <div class="bbb_deals_item_price ml-auto">₹25,550</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Available: <span>6</span></div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>2</span></div>
                    <div class="bbb_deals_title">Today's Combo Offer</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img src="https://i.imgur.com/9UYzfny.png" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#">Laptops</a></div>
                                    <div class="bbb_deals_item_price_a ml-auto"><strike>₹40,000</strike></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name">HP Envy</div>
                                    <div class="bbb_deals_item_price ml-auto">₹35,550</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Available: <span>6</span></div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>3</span></div>
                    <div class="bbb_deals_title">Today's Combo Offer</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img src="https://i.imgur.com/9UYzfny.png" alt=""></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category"><a href="#">Laptops</a></div>
                                    <div class="bbb_deals_item_price_a ml-auto"><strike>₹30,000</strike></div>
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name">Toshiba B77</div>
                                    <div class="bbb_deals_item_price ml-auto">₹27,550</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Available: <span>6</span></div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    </div>
</body>
</html>

