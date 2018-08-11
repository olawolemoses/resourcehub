<div class="col-md-3 sideBin">
    
    <button class="btn topSand" type="button" data-toggle="collapse" data-target="#locationcollapseExample" aria-expanded="false" aria-controls="locationcollapseExample">
        Location <i class="material-icons" style="float: right;">arrow_drop_down</i>
    </button>

        <div class="locationShow" id="locationcollapseExample">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control locationSearcher" placeholder="Search a location">
                </div>
            </form>

            @foreach($locations as $location =>$count)
            <label class="containers">&emsp;{{ $location }}( {{ $count }})
                <input type="checkbox" onchange="filterByLocation('{{ $location }}');" value="{{ $location }}">
                <span class="checkmark"></span>
            </label>
            @endforeach

            <a href="#" class="all">see all</a>
            
        </div>


		<button class="btn topSand" type="button" data-toggle="collapse" data-target="#categorycollapseExample" aria-expanded="false" aria-controls="categorycollapseExample">
			Service Category <i class="material-icons" style="float: right;">arrow_drop_down</i>
        </button>

         <div class="locationShow" id="categorycollapseExample">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control locationSearcher" placeholder="Search a Category">
                </div>
            </form>

            @foreach($categories as $k => $category)
            <label class="containers">&emsp;{{ $category['name'] }}( {{ $category['count'] }})
                <input type="checkbox" onchange="filterByCategory('{{ $k }}');" value="{{ $k }}">
                <span class="checkmark"></span>
            </label>
            @endforeach

            <a href="#" class="all">see all</a>
            
        </div>





		<button class="btn topSand" type="button" data-toggle="collapse" data-target="#pricecollapseExample" aria-expanded="false" aria-controls="pricecollapseExample">
            Price <i class="material-icons" style="float: right;">arrow_drop_down</i>
        </button>

        <div class="locationShow" id="pricecollapseExample">
            <label class="containers">&emsp;15,000 - 20,000
                <input type="checkbox" onchange="filterByPrice(15000, 20000);">
                <span class="checkmark"></span>
            </label>

            <label class="containers">&emsp;10,000 -15,000
                <input type="checkbox" onchange="filterByPrice(10000, 15000);">
                <span class="checkmark"></span>
            </label>

            <label class="containers">&emsp;5,000 - 10,000
                <input type="checkbox" onchange="filterByPrice(5000, 10000);">
                <span class="checkmark"></span>
            </label>

            <label class="containers">&emsp;1,000 - 5,000
                <input type="checkbox" onchange="filterByPrice(1000, 5000);">
                <span class="checkmark"></span>
            </label>

            <label class="containers">&emsp;0 - 1,000
                <input type="checkbox" onchange="filterByPrice(0, 1000);">
                <span class="checkmark"></span>
            </label>								
            <a href="#" class="all">see all</a>
            
        </div>
</div>