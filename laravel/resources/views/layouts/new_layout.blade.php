@include('includes.header')



@yield( 'content' )


@yield('scripts')

<!-- livezilla.net PLACE SOMEWHERE IN BODY -->
<script type="text/javascript" id="c6bad30971ef9dcf2d9c0089961c8bb3" src="//sbscdemo.com/livezilla/script.php?id=c6bad30971ef9dcf2d9c0089961c8bb3" defer></script>
<!-- livezilla.net PLACE SOMEWHERE IN BODY -->

<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us16.list-manage.com","uuid":"ac11eb4f3a7ed90e34b270d05","lid":"5954f22d2e"}) })</script>

@include('includes.footer')

