							<div class="col-md-12 venor">
								<div class="row">
									<div class="col-4">
										<img src="/img/{{ $service->service_photo_image }}" alt="..." class="rounded-0" style="width: 100%;">
									</div>

									<div class="col-8">
										<h6><a href="{{ $service->path() }}">{{ $service->service_name }}</a></h6> 
										<small>{{$service->merchant->store_name }}</small>
										<p class="statement">
											{{ \App\Helpers::trim_characters( $service->merchant->store_about_us ) }}
                                            {{--  <strong>category</strong>: {{ $service->category->category_name }}<br />
											{{ $service->service_description }} <br />
											 <strong>location</strong>: {{ $service->merchant->city .', ' . $service->merchant->state . ', ' . $service->merchant->country }} <br />
											 <strong>tags</strong>: {{ $service->tags }}  --}}
										</p>
										
										<div class="row saver">
											<div class="col-6">
												<p>&#8358; {{ number_format($service->price, 2) }} per session</p>
												<p><i class="material-icons vote">star</i><span>{{ number_format ($service->averageRatings, 1) }} ( {{ $service->totalRatings }} )</span> </p>
											</div>	
											<div class="col-6">
												<button type="button" onclick="location.href='{{ $service->path() }}';" class="btn">HIRE</button>
											</div>
										</div>
										
									</div>
								</div>
								
								
                            </div>
                            <!--vendor -->