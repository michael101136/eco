@extends('assets.pagina.en.layouts.master')

@section('content')
 
    <!-- page header -->
     <div id="map" class="destination-map"></div>
            <!--<section class="header header-bg-10" style="margin-top: -200px;">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-8 col-md-offset-2">-->
            <!--                <div class="header-content">-->
            <!--                    <div class="header-content-inner">-->
            <!--                        <h1>CONTACTO</h1>-->
                                
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            <!-- contact -->
            <section class="contact-inner">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-sm-8">
                            <div class="contact-form">
                                {!! Form::open(['route' => ['contacto-reserva.store'] , 'method' => 'POST']) !!}
                                    <h2>CONTACT US</h2>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter your first name
">
                                                <p style="color:red;">{{ $errors->first('name') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" placeholder="Enter your last name
">
                                                <p style="color:red;">{{ $errors->first('apellido') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter your email">
                                                <p style="color:red;">{{ $errors->first('email') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control" id="phone" name="phone"   value="{{old('phone')}}" placeholder="Enter your phone number">
                                                <p style="color:red;">{{ $errors->first('phone') }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"   value="{{old('nacionalidad')}}" placeholder="Nationality">
                                                <p style="color:red;">{{ $errors->first('nacionalidad') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label></label>
                                        <textarea class="form-control" id="message" name="message"  value="{{old('message')}}"  placeholder="Enter your query" rows="5"></textarea>
                                        <p style="color:red;">{{ $errors->first('message') }}</p>
                                    </div>
                              
                                    <button type="submit" class="thm-btn" > Send </button> 
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-details">
                                <h2>FIND US</h2>
                                <div class="contact-content">
                                    <h4>ADDRESS</h4>
                                    <p>
                                        Av. 28 de Julio Mz. R-2
                                        Oficina 201 - Cusco
                                    </p>
                                </div>
                                <div class="contact-content">
                                    <h4>EMAIL</h4>
                                    <p>
                                        <a href="reservas@machupicchugolden.com">reservas@machupicchugolden.com</a>
                                        <a href="info@machupicchugolden.com">info@machupicchugolden.com</a>
                                        <a href="ventas@machupicchugolden.com">ventas@machupicchugolden.com </a>   
                                    </p>
                                </div>
                                
                                <div class="contact-content">
                               
                                    <p>
                                        
                                  
                                    <SMALL> <b>TEL : </b> 0051 084 584 272</SMALL><br/>
                                    <SMALL> <b>MOVISTAR : </b> +051 984 987 798</SMALL><br/>
                                    <SMALL> <b> CLARO : </b> +051 982 505 892</SMALL><br/>
                                    <SMALL> <b> ENTEL : </b> 0051 084 584 272</SMALL><br/>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           
        </div>

@endsection

@section('script')
   
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxJnaq8H2Ib6E0bBT1sTnSnGZ5tqONxFI"></script>

  <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 16, scrollwheel: false,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(-13.5325399, -71.9628923), //turkey
                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{"color": "#444444"}]}, {"featureType": "administrative.locality", "elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative.locality", "elementType": "labels.icon", "stylers": [{"visibility": "on"}, {"color": "#f1c40f"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": -100}, {"lightness": 45}]}, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"}]}, {"featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "all", "stylers": [{"color": "#fec107"}, {"visibility": "on"}]}]
                };
                // image from external URL

                var myIcon = '/plantilla/assets/images/marker.png';

               
                var catIcon = {
                    url: myIcon,
                }

              
                var mapElement = document.getElementById('map');

              
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
           
                

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(-13.5325399,-71.9628923), //spain
                    map: map,
                    icon: catIcon,
                    title: 'MACHUPICCHU GOLDEN',
                    animation: google.maps.Animation.DROP,
                });
            }
        </script>
@endsection