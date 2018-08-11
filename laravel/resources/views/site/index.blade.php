@extends('layouts.layout')
@section('content')
<div class="backky" style="background: url('img/balance.png') fixed 100% 0% no-repeat;">
    <div class="whot">
    
        <div class="container">
        
            <div class="row">
                
                <div class="col-md-8" style="margin-top: 150px;">

                <h2 class="bounceInLeft animated"  style="-moz-animation-delay: 0.25s; -webkit-animation-delay: 0.25s; animation-delay: 0.25s;">
                    Hire top notch professionals for your projects
                </h2>

                <p class="bounceInLeft animated"  style="-moz-animation-delay: 0.5s; -webkit-animation-delay: 0.5s; animation-delay: 0.5s;">
                    get your product and services to potential clients.
                </p>

                    <form action="{{ route('search') }}" method="get" class="bounceInLeft animated hint-form"  style="-moz-animation-delay: 0.75s; -webkit-animation-delay: 0.75s; animation-delay: 0.75s;">


                    <div class="input-group mb-3">
                        @csrf
                        <input type="text" name="search" class="form-control" placeholder="E.g. ‘ graphic designers ‘ or ‘ web designers’" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        <input name="location" type="text" class="form-control" placeholder="Location" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        
                        <div class="input-group-append">
                        <button class="btn sadbtn" type="submit">HIRE NOW</button>
                        </div>

                    </div>


                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row tchala">
        
        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 9]) }}"><img src="img/law1.png" alt="">
            <div class="stan">BUSINESS<br> LAW</div></a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 16]) }}"><img src="img/law2.png" alt="">
            <div class="stan">CRIMINAL<br> LAW</div></a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 25]) }}"><img src="img/law3.png" alt="">
            <div class="stan">FAMILY<br> LAW</div></a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 43]) }}"><img src="img/law4.png" alt="">
            <div class="stan">PROPERTY<br> LAW</div></a>
        </div>


        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 37]) }}"><img src="img/law5.png" alt="">
            <div class="stan">MEDICAL<br> LAW</div></a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('showCategory', ['category' => 1]) }}"><img src="img/law6.png" alt="">
            <div class="stan">ADMINISTRATIVE<br> LAW</div></a>
        </div>

    </div>
</div>


<div class="container" style="padding-top: 50px;padding-bottom: 50px;">

    <div class="row">
    <div class="col-md-4 offset-md-4 text-center">
        <h3>WHAT WE DO<br>&nbsp;</h3>
    </div>
        <div class="col-md-8">
            <div class="tab-content">
            <div class="tab-pane neg active" id="docu" role="tabpanel">
                <h3>SELL ILLEGAL MATERIALS</h3>
                <p> Legal Concierge offers you quick steps to purchase on-demand documents, law text-books and resources at an affordable fee!</p>
            </div>
            <div class="tab-pane neg" id="pro" role="tabpanel">
                <h3>PROFESSIONAL SERVICES</h3>

                <a href="#">
                <p>SEARCH FOR PROFESSIONAL SERVICES WE OFFER &emsp; <i class="material-icons">keyboard_arrow_right</i></p>
                </a>

                <span>Explore our marketplace with skilled 
                    professionals who are willing to go the extra mile 
                    to get your job done</span>
            </div>
            <div class="tab-pane neg" id="advice" role="tabpanel">
                <h3>LEGAL ADVICE</h3>
                <p>You don’t have to drive a long distance to meet with an attorney!
                Select preferred lawyers within your location and get professional legal counsel on 
                criminal law, family law, land law or immigration law at a negotiable fee.</p>
            </div>
            <div class="tab-pane neg" id="rep" role="tabpanel">
                <h3>LEGAL REPRESENTATION</h3>
                <p> Do you need help getting represented for;
                <ul>
                    <li> criminal charges,</li>
                    <li> prison cases,</li>
                    <li> child protection matters,</li>
                    <li> immigration problems.</li>
                </ul>
                 Or at risk of being alienated from your own property?
                Apply to be eligible to be represented by one of our lawyers.</p>
            </div>
            <div class="tab-pane neg" id="counselling" role="tabpanel">
                     <h3>COUNSELLING</h3>
                        <p>Take legal steps the right way! Our attorneys are a click away 
                            from guidance through contract creation, will writing and the creation of legal documents.
                        </p>
            </div>
        </div>

    </div>
        <div class="col-md-4">    
            
            <div class="list-group mini-tab" id="myList" role="tablist">
                <a class="list-group-item list-group-item-action soup active" data-toggle="list" href="#docu" role="tab">SELL LEGAL DOCUMENTS</a>
                <a class="list-group-item list-group-item-action soup" data-toggle="list" href="#pro" role="tab">OFFER PROFESSIONAL SERVICES</a>
                <a class="list-group-item list-group-item-action soup" data-toggle="list" href="#advice" role="tab">LEGAL ADVICE</a>
                <a class="list-group-item list-group-item-action soup" data-toggle="list" href="#rep" role="tab">LEGAL REPRESENTATION</a>
                <a class="list-group-item list-group-item-action soup" data-toggle="list" href="#counselling" role="tab">COUNSELLING</a>
            </div>

        </div>
    </div>


</div>

<div class="container-fluid" style="background: #333; padding-top: 50px;padding-bottom: 50px;">


<div class="container">

        

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h5 style="color: #fff;"> &emsp; &emsp; BUY LEGAL DOCUMENTS</h5>
            </div>
        </div>

        
        
    @include('includes.booksales')


        
    </div>


</div>


<div class="container-fluid" style="background: #ecedef;padding-bottom: 20px;">


<div class="container" style="padding-top: 30px; padding-bottom: 30px;"> 


    
 

</div>




<div class="container" style="padding-top: 50px; padding-bottom: 100px;">

    <div class="row">
    
    <div class="col-md-12 text-center">
    <h4 style="width: 100%;">WHAT OUR CUSTOMERS ARE SAYING</h4>
    <p style="margin-bottom: 50px;">A few of our clients told us ehat they think of legal concierge and heres what they have to say</p>
    </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">


            <div class="carousel-item active">
                
                <div class="row">
                    <div class="col-md-6 testimonyText">

                        <p>
                            The first Place I think of when asked to recommend an attorney is legal concierge. lot of  lawyers who are thoroughness, dedication to their clients, and command of the law are a perfect complement to their availability and genuine concern for humanity. 

                            <br><br>
                            JHUD EJIKE<br>
                            Lagos Nigeria
                        </p>

                    </div>
                    <div class="col-md-6">  

                        <img src="img/testi1.png" alt="">

                    </div>
                    
                    
                </div>

            </div>




            <div class="carousel-item">
                
                <div class="row">
                    <div class="col-md-6 testimonyText">

                        <p>
                            The first Place I think of when asked to recommend an attorney is legal concierge. lot of  lawyers who are thoroughness, dedication to their clients, and command of the law are a perfect complement to their availability and genuine concern for humanity. 

                            <br><br>
                            JHUD EJIKE<br>
                            Lagos Nigeria
                        </p>

                    </div>
                    <div class="col-md-6">  

                        <img src="img/testi1.png" alt="">

                    </div>
                    

                    
                </div>

            </div>



            <div class="carousel-item">
                
                <div class="row">
                    <div class="col-md-6 testimonyText">

                        <p>
                            The first Place I think of when asked to recommend an attorney is legal concierge. lot of  lawyers who are thoroughness, dedication to their clients, and command of the law are a perfect complement to their availability and genuine concern for humanity. 

                            <br><br>
                            JHUD EJIKE<br>
                            Lagos Nigeria
                        </p>

                    </div>
                    <div class="col-md-6">  

                        <img src="img/testi1.png" alt="">

                    </div>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="container">
          <div class="h5 text-center">FEATURED IN</div>
          <div class="row tana justify-content-center">
            <div class="col-md-2"><a href="#"><img src="img/brand1.png" alt=""></a></div>
            <div class="col-md-2"><a href="#"><img src="img/brand2.png" alt=""></a></div>
            <div class="col-md-2"><a href="#"><img src="img/brand3.png" alt=""></a></div>
            <div class="col-md-2"><a href="#"><img src="img/brand4.png" alt=""></a></div>
            <div class="col-md-2"><a href="#"><img src="img/brand5.png" alt=""></a></div>
          </div>
        </div>
</div>




<script>
  $(document).ready(function() {
      

        var n = 2;


        $('.mini-tab .soup:nth-child(1)').click(function() {
            n = 1;

            santa(n);
        });

        $('.mini-tab .soup:nth-child(2)').click(function() {
            n = 2;

            santa(n);
        });

        $('.mini-tab .soup:nth-child(3)').click(function() {
            n = 3;

            santa(n);
        });


        $('.mini-tab .soup:nth-child(4)').click(function() {
            n = 4;

            santa(n);
        });


        $('.mini-tab .soup:nth-child(5)').click(function() {
            n = 5;

            santa(n);
        });



        setInterval(function() {
            
            $('.tab-content .neg').removeClass('active');
            $('.tab-content .neg:nth-child(' + n + ')').addClass('active');

            $('.mini-tab .soup').removeClass('active');
            $('.mini-tab .soup:nth-child(' + n + ')').addClass('active');

            if(n == 5) {
               n = 1;
            }
            else {
              n = n + 1;
            }

        }, 5000);  


        function santa(p) {

            $('.tab-content .neg').removeClass('active');
            $('.tab-content .neg:nth-child(' + p + ')').addClass('active');

            $('.mini-tab .soup').removeClass('active');
            $('.mini-tab .soup:nth-child(' + p + ')').addClass('active');

            if(p == 5) {
               n = 1;
            }
            else {
              n = n + 1;
            }

        } 
        
        
  

  });
</script>

      
@endsection