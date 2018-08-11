@extends('layouts.new_layout')
@section('content')

    <div class="container-fluid" style="margin-top: 50px;"> 
        
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators mish">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-caption d-none d-md-block mini">
              <h3>Need a LEGAL service ?</h3>
              <p>The State-Of-The-Art Solution is here </p>

              <button id='buydoc' class="btn real">BUY LEGAL DOCUMENT</button> <button id='findalawyer' class="btn inverse" style="margin-left: 20px;">FIND A LAWYER</button>
          </div>

        <div class="carousel-item active">
          <img src="/img/body1.png" alt="...">
          
      </div>

      <div class="carousel-item">
          <img src="/img/body1.png" alt="...">
          
      </div>

      <div class="carousel-item">
          <img src="/img/body1.png" alt="...">
          
      </div>

      <div class="carousel-item">
          <img src="/img/body1.png" alt="...">
          
      </div>
      </div>
      
    </div>

  </div>
  
      <div class="container services" style="padding-top: 50px;padding-bottom: 50px;">
        
          <div class="row">
            
                <div class="col-md-3">
                   <h4>Our<br>Services</h4>


                   <div class="navigate">
                      <i class="material-icons">keyboard_arrow_left</i>
                      <i class="material-icons active">keyboard_arrow_right</i>
                   </div>
                </div>

                <div class="col-md-3 saint">
                    <img src="/img/group1.png" alt="">
                    <h6>Bankruptcy case</h6>
                    <p>
                      A bankruptcy case normally begins by the debtor filing a petition with the bankruptcy court. A petition may be filed by an individual.
                    </p>
                </div>

                <div class="col-md-3 saint">
                  <img src="/img/group2.png" alt="">
                  <h6>International Law</h6>
                  <p>
                    International law is the set of rules generally regarded and accepted as binding in relations between states and between nations. 
                  </p>
                </div>

                <div class="col-md-3 saint">
                  <img src="/img/group3.png" alt="">
                  <h6>Administrative case</h6>
                  <p>
                    A bankruptcy case normally begins by the debtor filing a petition with the bankruptcy court. A petition may be filed by an individual.
                  </p>
                </div>


          </div>

      </div>

      <div class="container-fluid" style="background: #f5f5f5; padding-top: 20px;padding-bottom: 20px;">
    
  
        <div class="container documents">

          <div class="row">
            <div class="col-md-3">
                <h5 class="">Buy legal document</h5>
            </div>

            <div class="col-md-3 offset-md-6" style="text-align: right;">
               <a href="#" style="text-decoration: none;color: #707bea;font-size: 13px;">view all</a>
            </div>

            <div class="col-md-3 docs">
              
               <img src="/img/doc1.png" alt="">
               <div class="col-md-12">
                   <a href="{{ route('configdocuments', ['document'=>1] ) }}">LETTER OF CONFIRMATION</a>
               </div>
             
            </div>

            <div class="col-md-3 docs">
              <img src="/img/doc2.png" alt="">
              <div class="col-md-12">
                <a href="{{ route('configdocuments', ['document'=>2] ) }}">TENANCY AGREEMENT</a>
              </div>
            </div>

            <div class="col-md-3 docs">
              <img src="/img/doc3.png" alt="">
              <div class="col-md-12">
                <a href="{{ route('configdocuments', ['document'=>4] ) }}">EMPLOYEE AGREEMENT</a>
              </div>
            </div>

            <div class="col-md-3 docs">
              <img src="/img/doc4.png" alt="">
              <div class="col-md-12">
                <a href="{{ route('configdocuments', ['document'=>3] ) }}">PRIVACY POLICY</a>
              </div>
            </div>
          </div>
 
             
          </div>

        </div>

      <div class="container" style="padding-top: 30px; padding-bottom: 30px;"> 

          <!---<div class="col-md-12">
             <img src="/img/banner.png" style="width: 100%;" alt="">
          </div>-->
          
          <div class="col-md-12">
              <div id="rollon" style="width:100%;">
                  @foreach($home as $homes)
                 <div style="width:100%;"><img src="{{asset('/img/'.$homes->banner_file_name)}}" style="width: 100%;" alt=""></div>
                 @endforeach
              </div>
          </div>
              
      </div>
    
      <div class="container-fluid" style="padding: 0;">
        
          <div class="row" style="padding: 0;">

               <div class="col-md-6" style="padding: 0;">
                  <img src="{{asset('/img/woman.png')}}" alt="" style="width: 100%;">
               </div>

               <div class="col-md-6 testi" style="padding: 0;background: #141a35;">

                    <h5>Client Testimonials</h5>
                    
                    <div id="carouselExampleIndicators" class="carousel slide peanut" data-ride="carousel">
                      <ol class="carousel-indicators mish2">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                      </ol>
                      <div class="carousel-inner">

                        

                        <div class="carousel-item active">
                          <div class="carousel-caption d-none d-md-block mini2">
                              <p>
                                The first place I think of when asked to recommend an attorney is Legal concierge. 
                                their thoroughness, dedication to their client, and command of the law are a perfect 
                                complement to their availability and genuine concern for humanity. This platform wins for me.
                            </p>
                            <span>Farah Williams</span>
                          </div>
                          
                      </div>

                      <div class="carousel-item">
                          <div class="carousel-caption d-none d-md-block mini2">
                              <p>
                                The first place I think of when asked to recommend an attorney is Legal concierge. 
                                their thoroughness, dedication to their client, and command of the law are a perfect 
                                complement to their availability and genuine concern for humanity. This platform wins for me.
                            </p>
                            <span>Farah Williams</span>
                           </div>
                      </div>

                      <div class="carousel-item">
                          <div class="carousel-caption d-none d-md-block mini2">
                             <p>
                                The first place I think of when asked to recommend an attorney is Legal concierge. 
                                their thoroughness, dedication to their client, and command of the law are a perfect 
                                complement to their availability and genuine concern for humanity. This platform wins for me.
                            </p>
                            <span>Farah Williams</span>
                          </div>
                          
                      </div>

                      <div class="carousel-item">
                          <div class="carousel-caption d-none d-md-block mini2">
                            <p>
                                The first place I think of when asked to recommend an attorney is Legal concierge. 
                                their thoroughness, dedication to their client, and command of the law are a perfect 
                                complement to their availability and genuine concern for humanity. This platform wins for me.
                            </p>
                            <span>Farah Williams</span>
                          </div>
                          
                      </div>


                      </div>
                      
                    </div>

               </div>

          </div>


      </div>

<div class="container">
  <div class="row tana justify-content-center">
    <div class="col-md-2"><a href="#"><img src="/img/brand1.png" alt=""></a></div>
    <div class="col-md-2"><a href="#"><img src="/img/brand2.png" alt=""></a></div>
    <div class="col-md-2"><a href="#"><img src="/img/brand3.png" alt=""></a></div>
    <div class="col-md-2"><a href="#"><img src="/img/brand4.png" alt=""></a></div>
    <div class="col-md-2"><a href="#"><img src="/img/brand5.png" alt=""></a></div>
  </div>
</div>
@endsection

        
@section('scripts')
<script>
  $(document).ready(function() {
      
      
      
        $('#findalawyer').click(function() {
            window.location="{{ route('findalawyer') }}";
        });
        
        $('#buydoc').click(function() {
            window.location="{{ route('documents') }}";
        });        
  

		$("#rollon").cycle({
		    fx:"fade",
		    delay:0000,
		    timeout:6000,
		});



  });
</script>
@endsection