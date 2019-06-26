@extends('assets.pagina.en.layouts.master')

@section('content')
 
   <!-- page header -->
            <!--<section class="header header-bg-8">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-8 col-md-offset-2">-->
            <!--                <div class="header-content">-->
            <!--                    <div class="header-content-inner">-->
            <!--                        <h1>Testimonios</h1>-->
                      
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
        
            <!-- blog -->
            <br><br><br>
                <section class="destination">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="title">
                                <h2>TESTIMONY</h2>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row thm-margin">
                         @foreach($testimonio as $item)
                            <div class="col-md-3 col-sm-4 thm-padding">
                                <div class="destination-grid">
                                    <a href="#"><img src="/admin/testimonio/{{$item->id}}.{{$item->photo}}" class="img-responsive" style="height: 300px;width: 450px;" alt=""></a>
                                    <div class="mask">
                                        <h2>{{ $item->name}}</h2>
                                        <p>{{str_limit($item->testimonial, 150)}}</p>
                                        <!--<a href="#" class="thm-btn">Read More</a>-->
                                    </div>
                                    <div class="dest-name">
                                        <h5>{{ $item->name}}</h5>
                                        <h4>Testimonio</h4>
                                    </div>
                                    <div class="dest-icon">
                                        <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                                        
                                    </div>
                                </div>
                            </div>
                       
                        @endforeach  
                        
                    </div>
                    {{ $testimonio->links() }}
                </div>
            </section>
            <!-- Newsletter -->
            <!-- <section class="get-offer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <span>Subscribe to our Newsletter</span>
                            <h2>& Discover the best offers!</h2>
                        </div>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Your Email" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="flaticon-paper-plane"></i> Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
        </div>

@endsection

