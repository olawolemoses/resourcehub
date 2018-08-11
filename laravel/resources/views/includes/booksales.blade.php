    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">

                    @foreach($documents as $document)
                        <div class="item col-md-3 col-sm-6 col-xs-12">
                            <div class="pad15">
                                <a href="{{ route('showDocument', ['document' => $document->id ]) }}">
                                    <img src="/file/documents/uploaded/{{ $document->photo }}" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <button class="btn leftLst"><-PREV</button>
                <button class="btn rightLst">NEXT -></button>
            </div>


            <h6 class="text-center" style="width: 100%;"><a href="{{ route('resource_list') }}" class="text-info">Read more ></a></h6>
    </div>