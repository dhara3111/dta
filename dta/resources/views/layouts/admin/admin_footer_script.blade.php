
<!--begin::Base Scripts -->
<script src="{{asset('theme/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('theme/demo/demo12/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Base Scripts -->
<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<!--begin::Page Snippets -->
<script src="{{asset('assets/demo/default/custom/components/base/sweetalert2.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->

<script src="{{asset('js/toast/toast.js')}}"></script>

<script type="text/javascript">
    var baseUrl = $('meta[name="_url"]').attr('content');
    var token  = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        $('body').removeClass('swal2-height-auto');
    } );

    /** loading overlay start */
    function showLoading() {
        $('.loading').css('display', 'block');
    }

    function hideLoading() {
        $('.loading').css('display', 'none');
    }

    /** loading overlay end */

    @if(Session::has('success'))
    swal({
        title: "Success",
        text: "{{ Session::get('success') }}",
        type: 'success'
    });
    @endif

    @if(Session::has('socket'))
    // alert('Socket in session');
    socket.emit('notification', {
        userId: "{{ Session::get('socket') }}"

    });
    @endif

    @if(Session::has('error'))

    swal({
        title: "Oops...!",
        text: "{{ Session::get('error') }}",
        type: 'error'
    });
    @endif

    $('textarea').each(function () {
            $(this).val($(this).val().trim());
        }
    );

    function digitOnly(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode < 48 || iKeyCode > 57)
            return false;

        return true;
    }

    function digitAndPoint(evt, id) {
        try {
            var charCode = (evt.which) ? evt.which : event.keyCode;

            if (charCode == 46) {
                var txt = document.getElementById(id).value;
                if (!(txt.indexOf(".") > -1)) {

                    return true;
                }
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        } catch (w) {
            // alert(w);
        }
    }

    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            }
            else if (e) {
                var charCode = e.which;
            }
            else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                return true;
            else
                return false;
        }
        catch (err) {
            //alert(err.Description);
        }
    }

</script>