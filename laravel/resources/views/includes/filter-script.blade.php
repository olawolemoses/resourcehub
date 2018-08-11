<script>
    function getUrlPaths( refUrl )
    {
        var uri = URI(  refUrl );
		normalizeSearch = uri.query();
		return URI.parseQuery( normalizeSearch );	
    }

    function getUrl( refUrl )
    {
        var uri = URI(  refUrl );
        var furi = uri.fragment(true);        
        url =  furi.origin() + '' + furi.pathname();
        return url
    }

	function filterByLocation( loci )
	{
        queyrParts = getUrlPaths( location.href );
        query=( queyrParts.search != undefined ) ? "?search=" + queyrParts.search + "&location=" : "?location=";
        query += loci;
		location.href =  getUrl( location.href ) + query;
	}

	function filterByCategory( loci )
	{
        queyrParts = getUrlPaths( location.href );
        query=( queyrParts.search != undefined ) ? "?search=" + queyrParts.search + "&category=" : "?category=";
        query += loci;
        location.href = getUrl( location.href ) + query;
	}

	function filterByPrice( min, max )
	{
        queyrParts = getUrlPaths( location.href );
        query=( queyrParts.search != undefined ) ? "?search=" + queyrParts.search + "&price=" : "?price=";
        query +=  min + '--' + max ;
        location.href = getUrl( location.href ) + query;
	}	
</script>