<!-- search modal -->
<div class="modal" id="SearchModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content p-5">
      <form action="{{ route('member.search.view') }}" method="POST">
        @csrf
        <div class="form-group">
          <div class="row">
            <div class="col-md-10">
              <input class=" form-control form" type="search" placeholder="Search" name="query">

            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info"><i class='bx bx-search'></i></button>
            </div>
          </div>
        </div>

      </form>

    </div>
  </div>
  <!-- end search modal -->