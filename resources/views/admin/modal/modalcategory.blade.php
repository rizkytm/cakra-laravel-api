<!-- Modal -->
<div class="modal modal-danger fade" id="deletecategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Category Confirmation</h4>
      </div>
      <form action="{{route('categoriesadmin.destroy', $category)}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-warning">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editcategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="myModalLabel">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <form action="{{route('update.kategori', $category)}}" method="post">
            {{method_field('PATCH')}}
            {{csrf_field()}}
          <div class="modal-body">
              <input type="text" name="kategori" class="form-control" value="{{ $category->name }}">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ya, Edit</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak, kembali</button>
          </div>
      </form>
    </div>
  </div>
</div>