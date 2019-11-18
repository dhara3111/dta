<!--SCRIPT FILES-->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/materialize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('success'))
    <script>
        swal("Success", "{{ Session::get('success') }}", "success");
    </script>
@endif

@if(Session::has('error'))
    <script>
        swal("Oops...!", "{{ Session::get('error') }}", "error");
    </script>
@endif

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5d56822c77aa790be32f2f12/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->