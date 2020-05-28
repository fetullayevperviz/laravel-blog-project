</div>
</div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><strong>Copyright &copy; Blog Site Admin Panel {{date("Y")}}</strong></span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('admin.logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="{{asset('back/')}}/vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('back/')}}/js/demo/chart-area-demo.js"></script>
  <script src="{{asset('back/')}}/js/demo/chart-pie-demo.js"></script>
  <!-- Page level plugins -->
  <script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>
  <script type="text/javascript">
     $('#orders').sortable({
          handle:'.handle',
          update:function()
          {
             var siralama = $('#orders').sortable('serialize');
             $.get("{{route('admin.page.orders')}}?"+siralama,function(data,status){
                $('#orderSuccess').show();
                setTimeout(function(){
                  $('#orderSuccess').hide();
                },2000);
             });
          }
     });
  </script>
  @yield('summertnote_js')
  @toastr_js
  @toastr_render
  <script>
  $(function(){
       $('.editCategory').click(function(){
            id = $(this)[0].getAttribute('category_id');
            $.ajax({
                type : 'GET',
                url  : '{{route('admin.category.getCategory')}}',
                data : {id:id},
                success : function(data)
                {
                    $('#category_name').val(data.category_name);
                    $('#category_id').val(data.id);
                    $('#editCategoryModal').modal();
                }
            });
       });

       $('.deleteCategory').click(function(){
            id = $(this)[0].getAttribute('category_id');
            categoryCount = $(this)[0].getAttribute('categoryCount');
            categoryName = $(this)[0].getAttribute('categoryName');
            if(id==1)
            {
              $('#articleAlert').html(categoryName+' category cannot be deleted');
              $('#modalBody').show();
              $('#deleteCategory').hide();
              $('#deleteCategoryModal').modal();
              return;
            }

            $('#deleteCategory').show();
            $('#delete_id').val(id);
            $('#articleAlert').html('');
            $('#modalBody').hide();
            if(categoryCount > 0)
            {
               $('#articleAlert').html('There are ' +categoryCount+ ' articles in this category. Are you sure ?');
               $('#modalBody').show();
            }
            $('#deleteCategoryModal').modal();
       });
  });
</script>
</body>
</html>