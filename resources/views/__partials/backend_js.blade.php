 <!-- Global Vendor -->
 <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

 <!-- Plugins -->
 <script src="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
 <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
 <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
 <!-- Initialization  -->
 <script src="{{ asset('assets/js/sidebar-nav.js') }}"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/js/dashboard-page-scripts.js') }}"></script>
 <!--<script src="assets/js/scripts.js"></script>-->

 {{-- <script>

     $(document).ready(function(){
        $(document).on('change','#class_menu', function(){
            let menuId = $(this).val();
            $.ajax({
                url: '/class-wise-subject/' + menuId,
                type: 'GET',
                success: function(response){

                },
                error: function(error)
                {

                }
            });
        });
     });


 </script> --}}
<script>

    $('#class_menu').change(function(){
            let menuId = $(this).val();
            if (menuId) {
                $.ajax({
                    type:'GET',
                    url:"/class-wise-subject/"+menuId,
                    success:function(e){
                        if (e) {
                            $('#subject_menu').empty();
                            $.each(e,function(key,value){
                                $('#subject_menu').append('<option value="'+value.id+'">'+value.subject_name+'</option>')
                            })
                        } else {
                            $('#subject_menu').empty();
                        }
                    }
                })
            } else {
                $('#subject_menu').empty();
            }
        });


        $('#class_menu').change(function(){
            let menuId = $(this).val();
            if (menuId) {
                $.ajax({
                    type:'GET',
                    url:"/class-wise-student/"+menuId,
                    success:function(e){
                        if (e) {
                            $('#student_menu').empty();
                            $.each(e,function(key,value){
                                $('#student_menu').append('<option value="'+value.id+'">'+value.student_name+'</option>')
                            })
                        } else {
                            $('#student_menu').empty();
                        }
                    }
                })
            } else {
                $('#student_menu').empty();
            }
        });
</script>
